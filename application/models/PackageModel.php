<?php

class PackageModel extends CI_Model {

    public function package_reg($data) {

        $this->db->insert('center_packages', $data);
        return $this->db->insert_id();
    }

    public function get_packages($id) {
        $data;
        if ($id != 0) {
            $data =  $this->db->get_where('center_packages', array('centerId' => $id))->row_array();
        } else {
            $data = $this->db->get('center_packages')->result();
        }
        return $data;
    }

    public function get_package_details($packageId) {
        $data = $this->db->get_where('center_package_details', array('packageId' => $packageId))->result();
        return $data;
    }

}
