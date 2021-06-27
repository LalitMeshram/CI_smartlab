<?php

class PackageModel extends CI_Model {

    public function package_reg($data) {

        $this->db->insert('center_packages', $data);
        return $this->db->insert_id();
    }

    public function get_packages() {
        $data = $this->db->get('center_packages')->result_array();
        return $data;
    }

    public function get_package_details($packageId) {
        $data = $this->db->get_where('center_package_details', array('packageId' => $packageId))->result_array();
        return $data;
    }

}
