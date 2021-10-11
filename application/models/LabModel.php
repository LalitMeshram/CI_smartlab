<?php

class LabModel extends CI_Model
{
    
    public function lab_reg($data)
    {
        
        $this->db->insert('center_details', $data);
    }
     
    public function get_lab_data($centerId)
    {
        $data;
        if ($centerId != 0) {
            $data = $query = $this->db->get_where('center_details', array(
                'centerId' => $centerId
            ))->row_array();
        } else {
            $data = $this->db->get('center_details')->result();
        }
        return $data;
    }
    
    public function update_customer_center($data)
    {
        $this->db->where('centerId', $data['centerId']);
        $this->db->update('center_details', $data);
    }
    
    
    
    public function get_header_details($centerId)
    {
        $data;
        if ($centerId != 0) {
            $data = $query = $this->db->get_where('center_letter_head_details', array(
                'centerId' => $centerId
            ))->row_array();
        } else {
            $data = $this->db->get('center_letter_head_details')->result();
        }
        return $data;
    }
    
    public function lab_header_reg($data)
    {
        $this->db->insert('center_letter_head_details', $data);
        return TRUE;
    }
    
    public function  update_header_details($data){
        $this->db->where('centerId', $data['centerId']);
        $this->db->update('center_letter_head_details', $data);
        return TRUE;
    }

    public function  profile_data($centerId){
       $sql = "SELECT cd.centerId,cd.labName,cd.lab_city,cd.lab_postalcode,cpd.startdate,cpd.enddate,cp.plan_name,cr.fullname,cr.emailId,cr.contact_number
       FROM customer_registeration cr 
       LEFT JOIN center_details cd ON cd.centerId = cr.centerId
       LEFT JOIN center_payment_details cpd ON cpd.centerId = cr.centerId
       LEFT JOIN center_packages cp ON cp.packageId = cpd.packageId
       WHERE cr.centerId = $centerId AND cpd.paymentId = (SELECT MAX(paymentId) FROM center_payment_details WHERE centerId = $centerId)";
       $query = $this->db->query($sql);
    return $query->result_array();
    }
}