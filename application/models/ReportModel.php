<?php

class ReportModel extends CI_Model
{
    
    public function get_finding_data($caseId){
        // $sql = "SELECT cm.categoryId,lc.category,cm.test_name,cs.test_name,cu.unit,10 lower,40 upper FROM case_tests ct 
        // INNER JOIN center_test_master cm ON cm.testId = ct.testId 
        // INNER JOIN lab_center_categories lc ON lc.categoryid = cm.categoryId 
        // INNER JOIN center_test_subtypes cs ON cs.testId = ct.testId 
        // INNER JOIN center_unit_master cu ON cu.unitId = cs.unitId WHERE ct.caseId = $caseId";
        $sql = "SELECT cm.testId,cm.categoryId,lc.category,cm.test_name,cp.testName,
        cu.unit,10 lower,40 upper,cs.isgroup,cs.label,cs.label,cs.flag_sequence,cp.panelId
         FROM case_tests ct 
        INNER JOIN center_test_master cm ON cm.testId = ct.testId 
        INNER JOIN lab_center_categories lc ON lc.categoryid = cm.categoryId 
        INNER JOIN center_test_group_panel cs ON cs.testId = ct.testId
        INNER JOIN center_test_panel cp ON cs.panelId = cp.panelId
        INNER JOIN center_unit_master cu ON cu.unitId = cp.unitId WHERE ct.caseId = $caseId";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function get_ranges($gender,$age,$panelId){
       $sql = "SELECT sr.rangeId,sr.lower_limit,sr.upper_limit,sr.words FROM center_test_subtypes_ranges sr INNER JOIN center_test_group_panel cp ON cp.panelId = sr.subtypeId
       WHERE cp.panelId = $panelId AND gender = $gender AND $age BETWEEN sr.lower_age AND sr.upper_age";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_category_findings($caseId){
        $sql = "SELECT  lc.category,cm.test_name,cm.short_name FROM case_tests ct 
        INNER JOIN center_test_master cm ON cm.testId = ct.testId 
        INNER JOIN lab_center_categories lc ON lc.categoryid = cm.categoryId 
        WHERE ct.caseId = $caseId
        GROUP BY lc.category,cm.test_name";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function submited_report($caseId){
        $sql = "SELECT * FROM `case_report_master` WHERE caseId = $caseId";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function submited_report_data($reportId){
        $sql = "SELECT * FROM `case_report_data` WHERE reportId = $reportId";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function add_report($data){
        $case_data  = $data['data'];
        $report_data = $data['report_data'];

        $this->db->trans_begin();
        $this->db->insert('case_report_master', $case_data);
        $reportId = $this->db->insert_id();
        $this->add_report_data($report_data,$reportId);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_report_data($data,$reportId){
        $case_data  = $data['data'];
        $report_data = $data['report_data'];

        $this->db->trans_begin();
        $this->db->where('reportId', $reportId);
        $this->db->update('case_report_master', $case_data);
        $this->db->where('reportId', $reportId);
        $this->db->delete('case_report_data');
        $this->add_report_data($report_data,$reportId);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function add_report_data($test_data, $reportId)
    {
        foreach ($test_data as $contact) {
            $tests             = array(
                'parameterId'=>$contact->parameterId,
                'parameter'=>$contact->parameter,
                'testId'=>$contact->testId,
                'testName'=>$contact->testName,
                'finding_value'=> $contact->finding_value,
                'categoryid'=> $contact->categoryid,
                'category' => $contact->category,
                'unit' => $contact->unit,
                'label' => $contact->label,
                'reference_value'=> $contact->reference_value,
                'reportId' => $reportId,
                'isgroup'=> $contact->isgroup
            );
            $subtypeId            = $this->db->insert('case_report_data', $tests);
        }
    }
    
}