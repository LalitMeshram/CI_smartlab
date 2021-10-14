<?php

class CaseModel extends CI_Model
{
    
    public function add_case_data($data)
    {
        $result   = array();
        $testdata = $data['test_data'];
        $case_data = $data['case_data'];
        $case_details = array(
            "centerId"=>$case_data['centerId'],
            "patientId"=>$case_data['patientId'],
            "referenceId"=>$case_data['referenceId'],
            "collection_center"=>$case_data['collection_center'],
            "collection_source"=>$case_data['collection_source']
        );

        $this->db->trans_begin();
        $this->db->insert('case_master', $case_details);
        $result['caseId'] = $this->db->insert_id();
        $case_payments = array(
            "caseId"=>$result['caseId'],
            "centerId"=>$case_data['centerId'],
            "patientId"=>$case_data['patientId'],
            "total_amt"=>$case_data['total_amt'],
            "amt_recieved"=>$case_data['amt_recieved'],
            "discount"=>$case_data['discount'],
            "paymentmode"=>$case_data['paymentmode'],
            "paymentdetails"=>$case_data['paymentdetails'],
            "pending_amt"=>$case_data['total_amt'] - ($case_data['discount']+$case_data['amt_recieved']),
            "paymentdate"=>date('Y-m-d')
        );
        $this->db->insert('case_payments', $case_payments);
        $result['paymentId'] = $this->db->insert_id();
        $payment_tran = array(
            "paymentId"=>$result['paymentId'],
            "amount"=>$case_data['amt_recieved'],
            "paymentdate"=>date('Y-m-d'),
            "paymentmode"=>$case_data['paymentmode'],
            "createdby"=>1
        );
        $this->db->insert('case_payment_transactions', $payment_tran);
        $result['paymentId'] = $this->db->insert_id();
        $this->add_case_tests($testdata,$result['caseId'], $case_data['centerId']);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $result['status'] = false;
        } else {
            $this->db->trans_commit();
            $result['status'] = true;
            return $result;
        }
    }
    public function add_case_tests($test_data, $caseId,$centerId)
    {
        foreach ($test_data as $contact) {
            $tests             = array(
                'testId' => $contact->testId,
                'caseId' => $caseId,
                'centerId' => $centerId
            );
            $subtypeId            = $this->db->insert('case_tests', $tests);
        }
    }
    public function get_all_cases($centerId){
        $sql = "SELECT cm.caseId,cm.centerId,cm.patientId,cm.createdat,CONCAT(pm.first_name,' ',pm.last_name) username,pm.contact_number,cp.total_amt,cp.amt_recieved,cp.pending_amt,
        GROUP_CONCAT(ctm.short_name) tests,COALESCE(crm.reportId,0) AS report_flag
        FROM case_master cm
        INNER JOIN patient_master pm ON pm.patientId = cm.patientId
        INNER JOIN case_payments cp ON cp.caseId = cm.caseId
        INNER JOIN case_tests ct ON ct.caseId = cm.caseId
        INNER JOIN center_test_master ctm ON ctm.testId = ct.testId
        LEFT JOIN case_report_master crm ON crm.caseId = cm.caseId
        WHERE cm.centerId =$centerId
        GROUP BY cm.caseId ORDER BY cm.caseId DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_case_details($caseId){
        $sql = "SELECT cm.caseId,cm.centerId,cm.patientId,cm.referenceId,cm.collection_center,cm.collection_source,cm.createdat,cm.updatedat,
        cp.paymentId,cp.total_amt,cp.amt_recieved,cp.discount,cp.paymentmode,cp.paymentdetails,
        cp.pending_amt,cp.paymentdate ,
        pm.first_name,pm.last_name,pm.gender,pm.contact_number,pm.emailId,crm.ref_name,pm.age
        FROM case_master cm 
        INNER JOIN case_payments cp ON cm.caseId = cp.caseId
        INNER JOIN patient_master pm ON cm.patientId = pm.patientId
        LEFT JOIN center_reference_master crm ON crm.ref_id = cm.referenceId
         WHERE cm.caseId = $caseId";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_case_tests($caseId){
        $sql = "SELECT ct.case_test_id,ct.testId,cm.test_name,cm.short_name,cm.fees,lc.category,ot.outsourceId,ot.outsource_amt
        FROM case_tests ct INNER JOIN center_test_master cm ON ct.testId = cm.testId
        INNER JOIN lab_center_categories lc ON lc.categoryid = cm.categoryId
        LEFT JOIN center_outsource_test ot ON ot.testId = ct.testId
        WHERE caseId = $caseId";
        $query = $this->db->query($sql);
        return $query->result_array();
      
    }

    public function get_case_transaction($paymentId){
        $sql = "SELECT * FROM `case_payment_transactions` WHERE paymentId = $paymentId";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_sum_transaction($caseId){
        $sql = "SELECT SUM(amount) amount FROM case_payment_transactions cp 
        INNER JOIN case_payments cm ON cm.paymentId = cp.paymentId   WHERE cm.caseId=$caseId";
       return $this->db->query($sql)->row();
    }

    public function update_case($data,$caseId,$last_amt_rec)
    {
        $result   = array();
      
       $testdata = $data['test_data'];
        $case_data = $data['case_data'];
        $case_details = array(
            "centerId"=>$case_data['centerId'],
            "patientId"=>$case_data['patientId'],
            "referenceId"=>$case_data['referenceId'],
            "collection_center"=>$case_data['collection_center'],
            "collection_source"=>$case_data['collection_source']
        );

        $this->db->trans_begin();

        $this->db->where('caseId', $caseId);
        $this->db->update('case_master', $case_details);
        $result['caseId'] = $caseId;
       
        $case_payments = array(
            "caseId"=>$result['caseId'],
            "centerId"=>$case_data['centerId'],
            "patientId"=>$case_data['patientId'],
            "total_amt"=>$case_data['total_amt'],
            "amt_recieved"=>$case_data['amt_recieved']+$last_amt_rec,
            "discount"=>$case_data['discount'],
            "paymentmode"=>$case_data['paymentmode'],
            "paymentdetails"=>$case_data['paymentdetails'],
            "pending_amt"=>$case_data['total_amt'] -($case_data['discount']+$last_amt_rec+$case_data['amt_recieved']),
            "paymentdate"=>date('Y-m-d')
        );
        $sql = "SELECT paymentId FROM `case_payments` WHERE caseId = $caseId";
        $query = $this->db->query($sql);
        $paymentId = $query->row();
        $paymentId = $paymentId->paymentId;
        $this->db->where('paymentId', $paymentId);
        $this->db->update('case_payments', $case_payments); 
        $result['paymentId'] = $paymentId;
        $payment_tran = array(
            "paymentId"=>$result['paymentId'],
            "amount"=>$case_data['amt_recieved'],
            "paymentdate"=>date('Y-m-d'),
            "paymentmode"=>$case_data['paymentmode'],
            "createdby"=>1
        );
        $this->db->insert('case_payment_transactions', $payment_tran);
        $result['transactionId'] = $this->db->insert_id();

        $this->db->where('caseId', $caseId);
        $this->db->delete('case_tests');

        $this->add_case_tests($testdata,$result['caseId'], $case_data['centerId']);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $result['status'] = false;
        } else {
            $this->db->trans_commit();
            $result['status'] = true;
            return $result;
        }
    }
    public function get_pending_amount($caseId)
    {
       $sql = "UPDATE case_payments cp SET cp.pending_amt = 0 WHERE cp.pending_amt > 0 AND cp.caseId = $caseId";
        $this->db->query($sql);
        if($this->db->affected_rows() > 0){
return true;
        }else{
return false;
        }
    }
    
}