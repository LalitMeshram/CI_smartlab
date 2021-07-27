<?php

class OutsourceLabModel extends CI_Model {

    public function center_outsource_lab_reg($data) {
        $this->db->insert('outsource_lab', $data);
        return $this->db->insert_id();
    }

    public function get_center_outsource_labs($centerId) {
        $data = $this->db->get_where('outsource_lab', array(
            'centerId' => $centerId
        ))->result_array();
        return $data;
    }

    public function center_outsource_lab_update($data) {
        $this->db->where('outsource_lab_id', $data['outsource_lab_id']);
        $this->db->update('outsource_lab', $data);
        return $this->db->get_where('outsource_lab', array(
            'outsource_lab_id' => $data['outsource_lab_id']
        ))->row_array();
    }

    public function center_outsource_lab($outsource_lab_id)
    {
            $data =  $this->db->get_where('outsource_lab', array(
                'outsource_lab_id' => $outsource_lab_id
            ))->row_array();
        return $data;
    }

    public function center_outsource_lab_tests($testId)
    {
            $data =  $this->db->get_where('center_outsource_test', array(
                'testId' => $testId
            ))->row_array();
        return $data;
    }

}
