<?php

class CategoryModel extends CI_Model {

    public function center_category_reg($data) {
        $this->db->insert('lab_category', $data);
        return $this->db->insert_id();
    }

    public function get_center_categories($centerId) {
        $data = $this->db->get('lab_category')->result_array();
        return $data;
    }

    public function center_category_update($data) {
        $this->db->where('categoryId', $data['categoryId']);
        $this->db->update('lab_category', $data);
        return $this->db->get_where('lab_category', array(
            'categoryId' => $data['categoryId']
        ))->row_array();
    }

    public function center_category($categoryId)
    {
            $data =  $this->db->get_where('lab_category', array(
                'categoryId' => $categoryId
            ))->row_array();
        return $data;
    }

}
