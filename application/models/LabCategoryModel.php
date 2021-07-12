<?php

class LabCategoryModel extends CI_Model {

    public function center_category_reg($data) {
        $this->db->insert('lab_center_categories', $data);
        return $this->db->insert_id();
    }

    public function get_center_categories($centerId) {
       // $data = $this->db->get('lab_center_categories')->result_array();
        $data = $query = $this->db->get_where('lab_center_categories', array(
            'centerId' => $centerId
        ))->result_array();
        return $data;
    }

    public function center_category_update($data) {
        $this->db->where('categoryId', $data['categoryId']);
        $this->db->update('lab_center_categories', $data);
    }

    public function center_category($categoryId)
    {
            $data = $query = $this->db->get_where('lab_center_categories', array(
                'categoryId' => $categoryId
            ))->row_array();
        return $data;
    }

}
