<?php

class TestModel extends CI_Model
{
    
    public function patient_reg($data)
    {
        $this->db->insert('patient_master', $data);
        return $this->db->insert_id();
    }
    
    public function get_center_tests($centerId)
    {
        $data = $query = $this->db->get_where('center_test_master', array(
            'centerId' => $centerId
        ))->result_array();
    return $data;
    }

    public function get_subtypes_test($testId)
    {
            $data = $query = $this->db->get_where('center_test_subtypes', array(
                'testId' => $testId
            ))->result_array();
        return $data;
    }

    public function get_subtypes_ranges($subtypeId)
    {
            $data = $query = $this->db->get_where('center_test_subtypes_ranges', array(
                'subtypeId' => $subtypeId
            ))->result_array();
        return $data;
    }
    
    public function update_patient_data($data)
    {
        $this->db->where('patientId', $data['patientId']);
        $this->db->update('patient_master', $data);
    }
}