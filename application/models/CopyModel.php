<?php

class CopyModel extends CI_Model {

    public function copy_test_panel($centerId) {
        $this->db->trans_begin();
        $sql = "SELECT panelId,testName,unitId
        FROM lab_test_panel A
        WHERE NOT EXISTS (
                  SELECT testName,unitId
                  FROM center_test_panel B
                  WHERE A.unitId = B.unitId AND A.testName = B.testName
            AND B.centerId = $centerId
             )";
        $query = $this->db->query($sql);  
        if($query->num_rows() > 0)  
        {  
           
           $result = $query->result();
           foreach($result as $row) {
               $insert_panel = array(
                   'centerId'=>$centerId,
                   'testName'=>$row->testName,
                   'unitId'=>$row->unitId
               );
               $this->db->insert('center_test_panel', $insert_panel);
              $panelId = $this->db->insert_id();
              $this->add_panel_ranges($row->panelId, $panelId,$centerId);
           }
        }  
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $result['status'] = false;
        } else {
            $this->db->trans_commit();
            $result['status'] = true;
            return $result;
        } 
        return $result;
    }

    public function add_panel_ranges($mainId, $panelId,$centerId)
    {
        $sql = "SELECT subtypeId, gender, lower_age,lower_age_period,upper_age,upper_age_period,lower_limit,upper_limit,words
        FROM lab_tests_subtypes_ranges A
        WHERE NOT EXISTS (
                  SELECT subtypeId,gender, lower_age,lower_age_period,upper_age,upper_age_period,lower_limit,upper_limit,words
                  FROM center_test_subtypes_ranges B INNER JOIN center_test_panel C ON B.subtypeId = C.panelId
                  WHERE A.subtypeId= B.subtypeId AND A.gender = B.gender AND A.lower_age = B.lower_age AND A.upper_age = B.upper_age
            AND C.centerId = $centerId
             )
             AND A.subtypeId = $mainId";
        $query = $this->db->query($sql);  
        if($query->num_rows() > 0)  
        {  
            $result = $query->result();
            foreach ($result as $row) {
                $insert_ranges             = array(
                    'subtypeId' =>$panelId,
                    'gender' => $row->gender,
                    'lower_age' => $row->lower_age,
                    'upper_age' => $row->upper_age,
                    'lower_age_period' => $row->lower_age_period,
                    'upper_age_period' =>$row->upper_age_period,
                    'lower_limit'=>$row->lower_limit,
                    'upper_limit'=>$row->upper_limit,
                    'words'=>$row->words
                );
                $this->db->insert('center_test_subtypes_ranges', $insert_ranges);
        }
        
        }
    }

    public function copy_tests($centerId) {
        $this->db->trans_begin();
        $sql = "SELECT testId,categoryId,test_name,short_name,method,instrument,gender,fees,desc_text
        FROM lab_tests A
        WHERE NOT EXISTS (
                  SELECT categoryId,test_name,short_name,method,instrument,gender,fees,desc_text
                  FROM center_test_master B
                  WHERE A.categoryId = B.categoryId AND A.test_name = B.test_name 
                  AND A.gender=B.gender AND A.fees=B.fees
            AND B.centerId = $centerId
             )";
        $query = $this->db->query($sql);  
        if($query->num_rows() > 0)  
        {  
           
           $result = $query->result();
           foreach($result as $row) {
               $insert_panel = array(
                   'centerId'=>$centerId,
                   'categoryId'=>$row->categoryId,
                   'test_name'=>$row->test_name,
                   'short_name'=>$row->short_name,
                   'method'=>$row->method,
                   'instrument'=>$row->instrument,
                   'gender'=>$row->gender,
                   'fees'=>$row->fees,
                   'desc_text'=>$row->desc_text
               );
               $this->db->insert('center_test_master', $insert_panel);
              $testId = $this->db->insert_id();
              $this->add_test_group_panel($row->testId, $testId,$centerId);
           }
        }  
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $result['status'] = false;
        } else {
            $this->db->trans_commit();
            $result['status'] = true;
            return $result;
        } 
        return $result;
    }
    public function add_test_group_panel($mainId, $testId,$centerId)
    {
        $sql = "SELECT testId, panelId, isgroup,label,flag_sequence,jsid
        FROM lab_test_group_panel A
        WHERE NOT EXISTS (
                  SELECT B.testId,panelId, isgroup,label,flag_sequence,jsid
                  FROM center_test_group_panel B INNER JOIN center_test_master C ON C.testId = B.testId
                  WHERE A.testId = B.testId AND  A.panelId = B.panelId AND A.isgroup = B.isgroup AND A.label = B.label
            AND C.centerId = $centerId
             ) AND A.testId  = $mainId";
        $query = $this->db->query($sql);  
        if($query->num_rows() > 0)  
        {  
            $result = $query->result();
            foreach ($result as $row) {
                $insert_ranges             = array(
                    'testId' =>$testId,
                    'panelId' => $row->panelId,
                    'isgroup' => $row->isgroup,
                    'label' => $row->label,
                    'flag_sequence' => $row->flag_sequence,
                    'jsid' =>$row->jsid
                );
                $this->db->insert('center_test_group_panel', $insert_ranges);
        }
        
        }
    }

}
