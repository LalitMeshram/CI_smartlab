<?php

class LabUnitModel extends CI_Model {

    public function center_unit_reg($data) {
        $this->db->insert('center_unit_master', $data);
        return $this->db->insert_id();
    }

    public function get_center_units($centerId) {
        $data = $query = $this->db->get_where('center_unit_master', array(
            'centerId' => $centerId
        ))->result_array();
        return $data;
    }

    public function center_unit_update($data) {
        $this->db->where('unitId', $data['unitId']);
        $this->db->update('center_unit_master', $data);
    }

    public function center_unit($unitId)
    {
            $data = $query = $this->db->get_where('center_unit_master', array(
                'unitId' => $unitId
            ))->row_array();
        return $data;
    }

}
