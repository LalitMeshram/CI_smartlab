<?php

class LabTestModel_new extends CI_Model
{
    
    public function get_outsource_amounts($testId){
        $data = $this->db->get_where('center_outsource_test', array(
            'testId' => $testId
        ))->result_array();
        return $data;  
    }
    public function get_center_tests()
    {
        $sql = "SELECT ct.testId,ct.categoryId,ct.test_name,ct.short_name,ct.method,ct.instrument,ct.gender,ct.fees,ct.fees,ct.centerId,lc.category
        FROM lab_tests ct INNER JOIN lab_category lc ON lc.categoryid = ct.categoryId";
         $query = $this->db->query($sql);
         return $query->result_array();
    }
    
    public function get_subtypes_test($testId)
    {
        $sql = "SELECT ct.groupId,ct.testId,ct.panelId,ct.isgroup,ct.label,ct.jsid,ct.flag_sequence,cp.testName
        FROM lab_test_group_panel ct
        INNER JOIN lab_test_panel cp ON cp.panelId = ct.panelId
        WHERE ct.testId  =$testId";
         $query = $this->db->query($sql);
         return $query->result_array();
    }
    
    public function get_subtypes_ranges($subtypeId)
    {
        $data = $this->db->get_where('center_test_subtypes_ranges', array(
            'subtypeId' => $subtypeId
        ))->result_array();
        return $data;
    }
    
    public function add_test_data($data)
    {
        $result   = array();
        $testdata = $data['test_data'];
       
        $this->db->trans_begin();
        $this->db->insert('lab_tests', $testdata);
        $result['testId'] = $this->db->insert_id();
       
        $this->add_subtype_test($data['subtypes_test'], $result['testId']);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $result['status'] = false;
        } else {
            $this->db->trans_commit();
            $result['status'] = true;
            return $result;
        }
    }
    public function update_test_data($data,$testId){
        $testdata = $data['test_data'];
        $this->db->trans_begin();
        $this->db->where('testId', $testId);
        $this->db->update('lab_tests', $testdata);

        $this->db->where('testId', $testId);
        $this->db->delete('lab_test_group_panel');

        $this->add_subtype_test($data['subtypes_test'], $testId);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $result['status'] = false;
            return $result;
        } else {
            $this->db->trans_commit();
            $result['status'] = true;
            return $result;
        }

    }
    public function add_subtype_test($partner_data, $testId)
    {
        foreach ($partner_data as $contact) {
            $partners             = array(
                'panelId' => $contact->panelId,
                'isgroup' => $contact->isgroup,
                'testId' => $testId,
                'label' => $contact->label,
                'flag_sequence'=>$contact->flag_sequence,
                'jsid'=>$contact->jsid
            );
            $this->db->insert('lab_test_group_panel', $partners);
        }
    }
    
    
}