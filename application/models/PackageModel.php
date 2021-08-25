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

    public function add_package_data($data)
    {
        $result   = array();
        $package_data = $data['package_data'];
        $package_details = $data['package_details'];
    

        $this->db->trans_begin();
        $this->db->insert('center_packages', $package_data);
        $result['packageId'] = $this->db->insert_id();
       
        $this->add_package_details($package_details,$result['packageId']);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $result['status'] = false;
        } else {
            $this->db->trans_commit();
            $result['status'] = true;
            return $result;
        }
    }

    public function add_package_details($test_data, $packageId)
    {
        foreach ($test_data as $contact) {
            $tests             = array(
                'details' => $contact->details,
                'packageId' => $packageId
            );
            $subtypeId            = $this->db->insert('center_package_details', $tests);
        }
    }

    public function update_package($data,$packageId)
    {
        $result   = array();
        $package_data = $data['package_data'];
        $package_details = $data['package_details'];


        $this->db->trans_begin();

        $this->db->where('packageId', $packageId);
        $this->db->update('center_packages', $package_data);
       
       
        $this->db->where('packageId', $packageId);
        $this->db->delete('center_package_details');

        $this->add_package_details($package_details,$packageId);
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
