<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class PatientController extends REST_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PatientModel', 'patient');
    }
    public function patient_register_data_get($patientId = 0)
    {
        $response = array();
        $data     = $this->patient->get_patient_data($patientId);
        if (!empty($data)) {
            $response['data']   = $data;
            $response['msg']    = 'Patient Data Fetch successfully!';
            $response['status'] = 200;
        } else {
            $response['msg']    = 'Data not Found!';
            $response['status'] = 404;
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
    
    public function patient_reg_post()
    {
        $response = array();
        
        $data['patient_title']    = $this->post('patient_title');
        $data['first_name']       = $this->post('first_name');
        $data['last_name']        = $this->post('last_name');
        $data['gender']           = $this->post('gender');
        $data['aadhar_number']    = $this->post('aadhar_number');
        $data['dob']              = $this->post('dob');
        $data['age']              = $this->post('age');
        $data['contact_number']   = $this->post('contact_number');
        $data['alternate_number'] = $this->post('alternate_number');
        $data['emailId']          = $this->post('emailId');
        $data['patient_address']  = $this->post('patient_address');
        $data['centerId']         = $this->post('centerId');
        
        if (!empty($_FILES['patient_profile']['name'])) {
            $patient_profile = $this->upload_docs($_FILES['patient_profile']['name'], $_FILES['patient_profile']['tmp_name']);
        }
        $data['patient_profile'] = $patient_profile;
        if (!empty($this->post('patientId'))) {
            $data['patientId']         = $this->post('patientId');
            $id                 = $this->patient->update_patient_data($data);
            $response['msg']    = 'Patient data is updated successfully!';
            $response['data']   = $id;
            $response['status'] = 200;
        } else {
            $id = $this->patient->patient_reg($data);
            if (!empty($id)) {
                $response['msg']    = 'Patient Registration is successfully Done!';
                $response['data']   = $id;
                $response['status'] = 200;
            } else {
                $response['msg']    = 'Bad Request!';
                $response['status'] = 400;
            }
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
    
    public function upload_docs($filename, $file)
    {
        $ext        = pathinfo($filename, PATHINFO_EXTENSION);
        $time       = date('Y_m_d_hisu');
        $sourcePath = $file; // Storing source path of the file in a variable
        $targetPath = "./documents/" . $time . $filename; // Target path where file is to be stored
        if (move_uploaded_file($sourcePath, $targetPath)) {
            return $targetPath;
        } else {
            return false;
        }
    }
    
}