<?php

class AdminTestPanelModel extends CI_Model
{
    //first
    public function get_panel_test()
    {
        $sql = "SELECT cp.panelId,cp.testName,cp.unitId,cu.unit 
        FROM lab_test_panel cp 
        INNER JOIN lab_unit_master cu ON cp.unitId = cu.unitId";
         $query = $this->db->query($sql);
         return $query->result_array();
    }
    //second
    public function get_subtypes_ranges($subtypeId)
    {
        $data = $this->db->get_where('lab_tests_subtypes_ranges', array(
            'subtypeId' => $subtypeId
        ))->result_array();
        return $data;
    }
    
    //first api for panel add data
    public function add_panel_data($data)
    {
        $result   = array();
        $testdata = $data['panel_data'];
       
        $this->db->trans_begin();
        $this->db->insert('lab_test_panel', $testdata);
        $result['panelId'] = $this->db->insert_id();
        $this->add_subtypes_test_ranges($data['subtypes_test'], $result['panelId']);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $result['status'] = false;
        } else {
            $this->db->trans_commit();
            $result['status'] = true;
            return $result;
        }
    }
    //second
    public function update_panel_data($data,$panelId){
        $testdata = $data['panel_data'];
        $this->db->trans_begin();
        $this->db->where('panelId', $panelId);
        $this->db->update('lab_test_panel', $testdata);


        $this->db->where('subtypeId', $panelId);
        $this->db->delete('lab_tests_subtypes_ranges');

        $this->add_subtypes_test_ranges($data['subtypes_test'], $panelId);

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
    //third
    public function add_subtypes_test_ranges($partner_data, $panelId)
    {
        foreach ($partner_data as $contact) {
            $lower_duration             = 0;
            $upper_duration = 0;
            if($contact->lower_age_period == 'Month'){
                $lower_duration = $contact->lower_age * 30;
            }elseif($contact->lower_age_period =='Year'){
                $lower_duration = $contact->lower_age * 365;
            }else{
                $lower_duration = $contact->lower_age;
            }
            if($contact->upper_age_period == 'Month'){
                $upper_duration = $contact->upper_age * 30;
            }elseif($contact->upper_age_period =='Year'){
                $upper_duration = $contact->upper_age * 365;
            }else{
                $upper_duration = $contact->upper_age;
            }
            $partners = array(
                'gender' => $contact->gender,
                'lower_age' => $contact->lower_age,
                'lower_age_period'=>$contact->lower_age_period,
                'upper_age' => $contact->upper_age,
                'upper_age_period'=>$contact->upper_age_period,
                'lower_limit' => $contact->lower_limit,
                'upper_limit' => $contact->upper_limit,
                'subtypeId' => $panelId,
                'words'=>$contact->words,
                'lower_duration' => $lower_duration,
                'upper_duration' => $upper_duration
            );
            $this->db->insert('lab_tests_subtypes_ranges', $partners);
        }
    }
    
}