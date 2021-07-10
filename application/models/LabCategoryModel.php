<?php

class LabCategoryModel extends CI_Model {

    public function center_category_reg($data) {
        $this->db->insert('lab_center_categories', $data);
        return $this->db->insert_id();
    }

    public function get_center_categories() {
        $data = $this->db->get('lab_center_categories')->result_array();
        return $data;
    }

}
