<?php

class CaseModel extends CI_Model
{
    
    public function get_all_cases($centerId){
        $sql = "SELECT cm.caseId,cm.centerId,cm.patientId,cm.createdat,CONCAT(pm.first_name,' ',pm.last_name) username,pm.contact_number,cp.total_amt,
        cp.amt_recieved,cp.pending_amt,COALESCE(cot.outsource_amt,0) AS outsourceamt,COALESCE(ol.lab_name,'NA') AS labname,COALESCE(crm.ref_name,'NA') AS refername
                FROM case_master cm
                INNER JOIN patient_master pm ON pm.patientId = cm.patientId
                INNER JOIN case_payments cp ON cp.caseId = cm.caseId
                INNER JOIN case_tests ct ON ct.caseId = cm.caseId
                INNER JOIN center_test_master ctm ON ctm.testId = ct.testId
                LEFT JOIN center_reference_master crm ON crm.ref_id = cm.referenceId
                LEFT JOIN center_outsource_test cot ON cot.testId = ct.testId
                LEFT JOIN outsource_lab ol ON ol.outsource_lab_id = cot.outsource_lab_id
                WHERE cm.centerId =$centerId
                GROUP BY cm.caseId ORDER BY cm.caseId DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }
}