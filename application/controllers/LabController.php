<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class LabController extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LabModel', 'lab');
    }

    public function lab_register_data_get($centerId = 0) {
        $response = array();
        $data = $this->lab->get_lab_data($centerId);
        if (!empty($data)) {
            $response['data'] = $data;
            $response['msg'] = 'Center Data Fetch successfully!';
            $response['status'] = 200;
        } else {
            $response['msg'] = 'Data not Found!';
            $response['status'] = 404;
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function lab_reg_post() {
        $response = array();

        $data['labName'] = $this->post('labName');
        $data['brandName'] = $this->post('brandName');
        $data['lab_contact'] = $this->post('lab_contact');
        $data['lab_email'] = $this->post('lab_email');
        $data['lab_address'] = $this->post('lab_address');
        $data['lab_city'] = $this->post('lab_city');
        $data['lab_postalcode'] = $this->post('lab_postalcode');
        $data['centerId'] = $this->post('centerId');
        $centerData = $this->lab->get_lab_data($data['centerId']);
        if (empty($centerData)) {
            //Add New Entry
            if (!empty($_FILES['brandLogo']['name'])) {
                $header_path = $this->upload_brand($data['centerId'],$_FILES['brandLogo']['name'], $_FILES['brandLogo']['tmp_name']);
            }
            $this->lab->lab_reg($data);
            $response['msg'] = 'Lab Details inserted successfully!';
        } else {
            //update existing entry
            if (!empty($_FILES['brandLogo']['name'])) {
                $header_path = $this->upload_brand($data['centerId'],$_FILES['brandLogo']['name'], $_FILES['brandLogo']['tmp_name']);
            }
            $this->lab->update_customer_center($data);
            $response['msg'] = 'Lab Details updated successfully!';
        }
        $response['status'] = 200;
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function letter_head_details_get($centerId = 0) {
        $response = array();
        $data = $this->lab->get_header_details($centerId);
        if (!empty($data)) {
            $response['data'] = $data;
            $response['msg'] = 'Header Details Data Fetch successfully!';
            $response['status'] = 200;
        } else {
            $response['msg'] = 'Data not Found!';
            $response['status'] = 404;
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function letter_head_details_register_post() {
        $response = array();
        $data['lab_incharge_name'] = $this->post('lab_incharge_name');
        $data['lab_incharge_degree'] = nl2br($this->post('lab_incharge_degree'));
        $data['lab_doctor_name'] = $this->post('lab_doctor_name');
        $data['lab_doctor_degree'] = nl2br($this->post('lab_doctor_degree'));
        $data['centerId'] = $this->post('centerId');
        $header_path = '';
        $footer_path = '';
        $lab_incharge_sign = '';
        $doctor_sign = '';

        $letterHeadData = $this->lab->get_header_details($data['centerId']);
        if (empty($letterHeadData)) {
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
            $data['header_logo'] = $header_path;
            $data['footer_logo'] = $footer_path;
            $data['lab_incharge_sign'] = $lab_incharge_sign;
            $data['doctor_sign'] = $doctor_sign;
            

            if ($this->lab->lab_header_reg($data)) {
                $response['data'] = $data['centerId'];
                $response['msg'] = 'Letter Head Details Save successfully!';
                $response['status'] = 200;
            } else {
                $response['msg'] = 'Data not Found!';
                $response['status'] = 404;
            }
        }//if end
        else {
//            delete old file

            if (!empty($_FILES['header']['name'])) {
                unlink($letterHeadData['header_logo']);
                $header_path = $this->upload_docs($_FILES['header']['name'], $_FILES['header']['tmp_name']);
                $data['header_logo'] = $header_path;
            }
            if (!empty($_FILES['footer']['name'])) {
                unlink($letterHeadData['lab_incharge_sign']);
                $footer_path = $this->upload_docs($_FILES['footer']['name'], $_FILES['footer']['tmp_name']);
                $data['footer_logo'] = $footer_path;
            }
            if (!empty($_FILES['lab_incharge_sign']['name'])) {
                unlink($letterHeadData['doctor_sign']);
                $lab_incharge_sign = $this->upload_docs($_FILES['lab_incharge_sign']['name'], $_FILES['lab_incharge_sign']['tmp_name']);
                $data['lab_incharge_sign'] = $lab_incharge_sign;
            }
            if (!empty($_FILES['doctor_sign']['name'])) {
                unlink($letterHeadData['footer_logo']);
                $doctor_sign = $this->upload_docs($_FILES['doctor_sign']['name'], $_FILES['doctor_sign']['tmp_name']);
                $data['doctor_sign'] = $doctor_sign;
            }
            
            if($this->lab->update_header_details($data)){
                 $response['data'] = $data['centerId'];
                $response['msg'] = 'Letter Head Details updated successfully!';
                $response['status'] = 200;
            }else{
                $response['msg'] = 'Data not updated!';
                $response['status'] = 404;
            }
        }//else end

        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function upload_docs($filename, $file) {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $time = date('Y_m_d_hisu');
        $sourcePath = $file; // Storing source path of the file in a variable
        $targetPath = "documents/" . $time . "." . $ext; // Target path where file is to be stored
        if (move_uploaded_file($sourcePath, $targetPath)) {
            return $targetPath;
        } else {
            return false;
        }
    }

    public function upload_brand($centerId,$filename, $file) {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $time = date('Y_m_d_hisu');
        $sourcePath = $file; // Storing source path of the file in a variable
        $targetPath = "logos/" . $centerId . ".jpg"; // Target path where file is to be stored
        if(file_exists( $targetPath)) {
            unlink($targetPath);
        }
        if (move_uploaded_file($sourcePath, $targetPath)) {
            return $targetPath;
        } else {
            return false;
        }
    }

    public function profile_data_get($centerId=0){
        $response = array();
        $data     = $this->lab->profile_data($centerId);
        if(!empty($data)){
            $response = array(
                'Message' => 'All Data loaded successfully',
                'data' => $data,
                'status' => 200
            );
        }else{
            $response = array(
                'Message' => 'Data not found',
                'data' => $data,
                'status' => 204
            );  
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
}
