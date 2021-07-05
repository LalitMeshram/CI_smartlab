<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class LabController extends REST_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LabModel', 'lab');
    }
    public function lab_register_data_get($centerId = 0)
    {
        $response = array();
        $data     = $this->lab->get_lab_data($centerId);
        if (!empty($data)) {
            $response['data']   = $data;
            $response['msg']    = 'Center Data Fetch successfully!';
            $response['status'] = 200;
        } else {
            $response['msg']    = 'Data not Found!';
            $response['status'] = 404;
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
    
    public function lab_reg_post()
    {
        $response = array();
        
        $data['labName']        = $this->post('labName');
        $data['lab_contact']    = $this->post('lab_contact');
        $data['lab_email']      = $this->post('lab_email');
        $data['lab_address']    = $this->post('lab_address');
        $data['lab_city']       = $this->post('lab_city');
        $data['lab_postalcode'] = $this->post('lab_postalcode');
        if (!empty($this->post('centerId'))) {
            $data['centerId']   = $this->post('centerId');
            $id                 = $this->lab->update_customer_center($data);
            $response['msg']    = 'Lab data is updated successfully!';
            $response['data']   = $id;
            $response['status'] = 200;
        } else {
            $id = $this->lab->lab_reg($data);
            if (!empty($id)) {
                $response['msg']    = 'Lab Registration is successfully Done!';
                $response['data']   = $id;
                $response['status'] = 200;
            } else {
                $response['msg']    = 'Bad Request!';
                $response['status'] = 400;
            }
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
    

    public function lab_reg_update_post()
    {
        $response = array();
        
        $data['labName']        = $this->post('labName');
        $data['lab_contact']    = $this->post('lab_contact');
        $data['lab_email']      = $this->post('lab_email');
        $data['lab_address']    = $this->post('lab_address');
        $data['lab_city']       = $this->post('lab_city');
        $data['lab_postalcode'] = $this->post('lab_postalcode');
        $data['centerId']   = $this->post('centerId');
        if (!empty($this->post('centerId'))) {
            $id                 = $this->lab->update_customer_center($data);
            $response['msg']    = 'Lab data is updated successfully!';
            $response['data']   = $id;
            $response['status'] = 200;
        }else{
            $response['msg']    = 'Center Id is null!';
            $response['status'] = 204;
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
    
    public function letter_head_details_get($centerId = 0)
    {
        $response = array();
        $data     = $this->lab->get_header_details($centerId);
        if (!empty($data)) {
            $response['data']   = $data;
            $response['msg']    = 'Header Details Data Fetch successfully!';
            $response['status'] = 200;
        } else {
            $response['msg']    = 'Data not Found!';
            $response['status'] = 404;
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
    
    public function letter_head_details_register_post()
    {
        $response                    = array();
        $data['lab_incharge_name']   = $this->post('lab_incharge_name');
        $data['lab_incharge_degree'] = $this->post('lab_incharge_degree');
        $data['lab_doctor_name']     = $this->post('lab_doctor_name');
        $data['lab_doctor_degree']   = $this->post('lab_doctor_degree');
        $data['centerId']            = $this->post('centerId');
        $header_path                 = '';
        $footer_path                 = '';
        $lab_incharge_sign           = '';
        $doctor_sign                 = '';
        if (!empty($_FILES['header']['name'])) {
            $header_path = $this->upload_docs($_FILES['header']['name'], $_FILES['header']['tmp_name']);
        }
        if (!empty($_FILES['footer']['name'])) {
            $footer_path = $this->upload_docs($_FILES['footer']['name'], $_FILES['footer']['tmp_name']);
        }
        if (!empty($_FILES['lab_incharge_sign']['name'])) {
            $lab_incharge_sign = $this->upload_docs($_FILES['lab_incharge_sign']['name'], $_FILES['lab_incharge_sign']['tmp_name']);
        }
        if (!empty($_FILES['doctor_sign']['name'])) {
            $doctor_sign = $this->upload_docs($_FILES['doctor_sign']['name'], $_FILES['doctor_sign']['tmp_name']);
        }
        $data['header_logo']       = $header_path;
        $data['footer_logo']       = $footer_path;
        $data['lab_incharge_sign'] = $lab_incharge_sign;
        $data['doctor_sign']       = $doctor_sign;
        $id                        = $this->lab->lab_header_reg($data);
        if (!empty($id)) {
            $response['data']   = $id;
            $response['msg']    = 'Letter Head Details Save successfully!';
            $response['status'] = 200;
        } else {
            $response['msg']    = 'Data not Found!';
            $response['status'] = 404;
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
    
    public function upload_docs($filename, $file)
    {
        $ext        = pathinfo($filename, PATHINFO_EXTENSION);
        $time       = date('Y_m_d_hisu');
        $sourcePath = $file; // Storing source path of the file in a variable
        $targetPath = "./documents/" . $filename . $time . "." . $ext; // Target path where file is to be stored
        if (move_uploaded_file($sourcePath, $targetPath)) {
            return $targetPath;
        } else {
            return false;
        }
    }
    
}