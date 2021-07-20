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
    
}