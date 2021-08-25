<?php

class UnitModel extends CI_Model {

    public function center_unit_reg($data) {
        $this->db->insert('lab_unit_master', $data);
        return $this->db->insert_id();
    }

    public function get_center_units() {
        $data =   $this->db->get('lab_unit_master')->result_array();
        return $data;
    }

    public function center_unit_update($data) {
        $this->db->where('unitId', $data['unitId']);
        $this->db->update('lab_unit_master', $data);
        return $this->db->get_where('lab_unit_master', array(
            'unitId' => $data['unitId']
        ))->row_array();
    }

    public function center_unit($unitId)
    {
            $data = $this->db->get_where('lab_unit_master', array(
                'unitId' => $unitId
            ))->row_array();
        return $data;
    }

}
