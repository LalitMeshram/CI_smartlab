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
    
}