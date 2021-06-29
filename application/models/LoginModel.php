<?php

class LoginModel extends CI_Model {

    public function checkauth($user,$pass) {
        $result = array();
        $sql = "SELECT * FROM customer_registeration
         WHERE emailId = '$user' AND upassword='$pass' AND isactive=1";
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
}
