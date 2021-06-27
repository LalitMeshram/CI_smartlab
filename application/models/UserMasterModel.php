<?php

class UserMasterModel extends CI_Model {

    public function customer_reg($data) {

        $this->db->insert('customer_registeration', $data);
        return $this->db->insert_id();
    }

    public function get_customers($id) {
        $data;
        if ($id != 0) {
            $data = $query = $this->db->get_where('customer_registeration', array('centerId' => $id))->row_array();
        } else {
            $data = $this->db->get('customer_registeration')->result();
        }
        return $data;
    }

    public function update_customer_center($data) {
        $this->db->where('centerId', $data['id']);
        $this->db->update('customer_registeration', $data);
    }
    
    public function delete_user($id) {
        return $this->db->delete('user_master', array('id' => $id));
    }

}
