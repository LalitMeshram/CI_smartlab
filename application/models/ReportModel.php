<?php

class ReportModel extends CI_Model
{
    
    public function get_finding_data($caseId){
        $sql = "SELECT cm.categoryId,lc.category,cm.test_name,cs.test_name,cu.unit,10 lower,40 upper FROM case_tests ct 
        INNER JOIN center_test_master cm ON cm.testId = ct.testId 
        INNER JOIN lab_center_categories lc ON lc.categoryid = cm.categoryId 
        INNER JOIN center_test_subtypes cs ON cs.testId = ct.testId 
        INNER JOIN center_unit_master cu ON cu.unitId = cs.unitId WHERE ct.caseId = $caseId";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_category_findings($caseId){
        $sql = " SELECT  lc.category FROM case_tests ct 
        INNER JOIN center_test_master cm ON cm.testId = ct.testId 
        INNER JOIN lab_center_categories lc ON lc.categoryid = cm.categoryId 
        WHERE ct.caseId = $caseId
        GROUP BY lc.category";
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

    public function add_report_data($test_data, $reportId)
    {
        foreach ($test_data as $contact) {
            $tests             = array(
                'category' => $contact->category,
                'unit' => $contact->unit,
                'findings' => $contact->findings,
                'reportId' => $reportId
            );
            $subtypeId            = $this->db->insert('case_report_data', $tests);
        }
    }
    
}