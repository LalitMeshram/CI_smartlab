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
            "pending_amt"=>$case_data['total_amt'] - $case_data['amt_recieved'],
            "paymentdate"=>date('Y-m-d')
        );
        $this->db->insert('case_payments', $case_payments);
        $result['paymentId'] = $this->db->insert_id();
        $payment_tran = array(
            "paymentId"=>$result['paymentId'],
            "amount"=>$case_data['amt_recieved'],
            "paymentdate"=>date('Y-m-d')
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
        GROUP_CONCAT(ctm.short_name) tests
        FROM case_master cm
        INNER JOIN patient_master pm ON pm.patientId = cm.patientId
        INNER JOIN case_payments cp ON cp.caseId = cm.caseId
        INNER JOIN case_tests ct ON ct.caseId = cm.caseId
        INNER JOIN center_test_master ctm ON ctm.testId = ct.testId
        WHERE cm.centerId = $centerId
        GROUP BY cm.caseId ORDER BY cm.caseId DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_case_details($caseId){
        $sql = "SELECT cm.caseId,cm.centerId,cm.patientId,cm.referenceId,cm.collection_center,cm.collection_source,cm.createdat,cm.updatedat,
         cp.paymentId,cp.total_amt,cp.amt_recieved,cp.discount,cp.paymentmode,cp.paymentdetails,
         cp.pending_amt,cp.paymentdate 
         FROM case_master cm 
         INNER JOIN case_payments cp ON cm.caseId = cp.caseId
          WHERE cm.caseId = $caseId";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_case_tests($caseId){
        $sql = "SELECT * FROM `case_tests` WHERE caseId = $caseId";
        $query = $this->db->query($sql);
        return $query->result_array();
      
    }

    public function get_case_transaction($paymentId){
        $sql = "SELECT * FROM `case_payment_transactions` WHERE paymentId = $paymentId";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function update_case($data,$caseId)
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
        $this->db->update('center_test_master', $case_details);
        $result['caseId'] = $caseId;

        $case_payments = array(
            "caseId"=>$result['caseId'],
            "centerId"=>$case_data['centerId'],
            "patientId"=>$case_data['patientId'],
            "total_amt"=>$case_data['total_amt'],
            "amt_recieved"=>$case_data['amt_recieved'],
            "discount"=>$case_data['discount'],
            "paymentmode"=>$case_data['paymentmode'],
            "paymentdetails"=>$case_data['paymentdetails'],
            "pending_amt"=>$case_data['total_amt'] - $case_data['amt_recieved'],
            "paymentdate"=>date('Y-m-d')
        );
    
        $sql = "SELECT paymentId FROM `case_payments` WHERE caseId = $caseId";
        $query = $this->db->query($sql);
        $paymentId = $query->row();
        $this->db->where('paymentId', $paymentId);
        $this->db->update('case_payments', $case_payments); 
        $result['paymentId'] = $paymentId;
        $payment_tran = array(
            "paymentId"=>$result['paymentId'],
            "amount"=>$case_data['amt_recieved'],
            "paymentdate"=>date('Y-m-d')
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
    
}