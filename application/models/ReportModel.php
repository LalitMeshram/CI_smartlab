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
        cu.unit,cs.isgroup,cs.label,cs.label,cs.flag_sequence,cp.panelId,pm.patientId,cm.desc_text
         FROM case_tests ct 
        INNER JOIN center_test_master cm ON cm.testId = ct.testId 
        INNER JOIN lab_center_categories lc ON lc.categoryid = cm.categoryId 
        INNER JOIN center_test_group_panel cs ON cs.testId = ct.testId
        INNER JOIN center_test_panel cp ON cs.panelId = cp.panelId
        INNER JOIN center_unit_master cu ON cu.unitId = cp.unitId 
        INNER JOIN case_master cmd ON cmd.caseId = ct.caseId
        INNER JOIN patient_master pm ON pm.patientId = cmd.patientId
        WHERE ct.caseId  = $caseId";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function get_ranges($patientId,$panelId){
       $sql = "SELECT ct.lower_limit,ct.upper_limit FROM center_test_subtypes_ranges ct INNER JOIN center_test_panel ctp ON ctp.panelId = ct.subtypeId
       WHERE ctp.panelId = $panelId AND 
       (SELECT DATEDIFF(CURRENT_DATE,pm.dob) AS days FROM patient_master pm WHERE pm.patientId = $patientId) BETWEEN ct.lower_duration AND ct.upper_duration
       ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_category_findings($caseId){
        $sql = "SELECT  lc.category,cm.test_name,cm.short_name,cm.desc_text FROM case_tests ct 
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
            $ref = $contact->reference_value;
            if(!empty($contact->words)){
                $ref = $contact->reference_value.'('.$contact->reference_value.')';
            }
            $tests             = array(
                'parameterId'=>$contact->parameterid,
                'parameter'=>$contact->parameter,
                'testId'=>$contact->testId,
                'testName'=>$contact->test_name,
                'finding_value'=> $contact->finding_value,
                'categoryid'=> $contact->categoryid,
                'category' => $contact->category,
                'unit' => $contact->unit,
                'label' => $contact->label,
                'reference_value'=> $ref,
                'reportId' => $reportId,
                'isgroup'=> $contact->isgroup,
                'level'=> $contact->level,
                'test_desc'=> $contact->test_desc
            );
            $subtypeId            = $this->db->insert('case_report_data', $tests);
        }
    }
    
}