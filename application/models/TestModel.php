<?php

class TestModel extends CI_Model
{
    
    public function get_outsource_amounts($testId){
        $data = $this->db->get_where('center_outsource_test', array(
            'testId' => $testId
        ))->result_array();
        return $data;  
    }
    public function get_center_tests($centerId)
    {
        $data = $this->db->get_where('center_test_master', array(
            'centerId' => $centerId
        ))->result_array();
        return $data;
    }
    
    public function get_subtypes_test($testId)
    {
        $data = $this->db->get_where('center_test_subtypes', array(
            'testId' => $testId
        ))->result_array();
        return $data;
    }
    
    public function get_subtypes_ranges($subtypeId)
    {
        $data = $this->db->get_where('center_test_subtypes_ranges', array(
            'subtypeId' => $subtypeId
        ))->result_array();
        return $data;
    }
    
    public function add_test_data($data)
    {
        $result   = array();
        $testdata = $data['test_data'];
        $this->db->trans_begin();
        $this->db->insert('center_test_master', $testdata);
        $result['testId'] = $this->db->insert_id();
        $this->add_subtype_test($data['subtypes_test'], $result['testId']);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $result['status'] = false;
        } else {
            $this->db->trans_commit();
            $result['status'] = true;
            return $result;
        }
    }
    public function update_test_data($data,$testId){
        $testdata = $data['test_data'];
        $this->db->trans_begin();
        $this->db->where('testId', $testId);
        $this->db->update('center_test_master', $testdata);

        $this->db->where('testId', $testId);
        $this->db->delete('center_test_subtypes');

        $this->add_subtype_test($data['subtypes_test'], $testId);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $result['status'] = false;
            return $result;
        } else {
            $this->db->trans_commit();
            $result['status'] = true;
            return $result;
        }

    }
    public function add_subtype_test($partner_data, $testId)
    {
        foreach ($partner_data as $contact) {
            $partners             = array(
                'test_name' => $contact->test_name,
                'unitId' => $contact->unitId,
                'testId' => $testId
            );
            $subtypeId            = $this->db->insert('center_test_subtypes', $partners);
            $subtypes_test_ranges = json_encode($contact->subtypes_test_ranges);
            $subtypes_test_ranges = json_decode($subtypes_test_ranges);
            $this->add_subtypes_test_ranges($subtypes_test_ranges, $subtypeId);
        }
    }
    
    public function add_subtypes_test_ranges($partner_data, $subtypeId)
    {
        foreach ($partner_data as $contact) {
            $partners = array(
                'gender' => $contact->gender,
                'lower_age' => $contact->lower_age,
                'upper_age' => $contact->upper_age,
                'lower_limit' => $contact->lower_limit,
                'upper_limit' => $contact->upper_limit,
                'subtypeId' => $subtypeId
            );
            $this->db->insert('center_test_subtypes_ranges', $partners);
        }
    }
    
}