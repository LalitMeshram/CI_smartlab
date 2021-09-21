<?php

class PatientModel extends CI_Model
{
    
    public function patient_reg($data)
    {
        $this->db->insert('patient_master', $data);
        return $this->db->insert_id();
    }
    
    public function get_patient_data($centerId)
    {
        if ($centerId != 0) {
            $sql = "SELECT * FROM patient_master WHERE centerId = $centerId ORDER BY patientId DESC";
            $query = $this->db->query($sql);
            $data= $query->result();
        } else {
            $data = $this->db->get('patient_master')->result();
        }
        return $data;
    }
    
    public function update_patient_data($data)
    {
        $this->db->where('patientId', $data['patientId']);
        $this->db->update('patient_master', $data);
        return $this->db->get_where('patient_master', array(
            'patientId' => $data['patientId']
        ))->row_array();;
    }
}