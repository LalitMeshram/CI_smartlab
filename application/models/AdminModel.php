<?php

class AdminModel extends CI_Model {

    public function checkauth($user,$pass) {
        $result = array();
        $sql = "SELECT * FROM admin
         WHERE email = '$user' AND pwd='$pass'";
        $query = $this->db->query($sql);  
        if($query->num_rows() > 0)  
        {  
            $result['data'] = $query->row_array();
            $result['status']= true;
        }  
        else  
        {  
            $result['data'] = [];
            $result['status']= false;     
        }  
        return $result;
    }
    public function callsp_data($centerId){
        $sql = "CALL copydata(".$centerId.");";
       $query = $this->db->query($sql); 
       if($query){
           return true;
       }else{
           return false;
       }
    }
}
