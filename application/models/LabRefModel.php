<?php

class LabRefModel extends CI_Model {

    public function center_ref_reg($data) {
        $this->db->insert('center_reference_master', $data);
        return $this->db->insert_id();
    }

    public function get_center_reference($centerId) {
        $data = $this->db->get_where('center_reference_master', array(
            'centerId' => $centerId
        ))->result_array();
        return $data;
    }

    public function center_ref_update($data) {
        $this->db->where('ref_id', $data['ref_id']);
        $this->db->update('center_reference_master', $data);
        return $this->db->get_where('center_reference_master', array(
            'ref_id' => $data['ref_id']
        ))->row_array();;
    }

    public function center_reference($ref_id)
    {
            $data = $this->db->get_where('center_reference_master', array(
                'ref_id' => $ref_id
            ))->row_array();
        return $data;
    }

}
