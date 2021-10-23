<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class UserMasterController extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UserMasterModel', 'user');
        $this->load->model("AdminModel", "login");
        $this->load->model("CopyModel", "copy");
    }

    public function customers_list_get($id = 0) {
        $response = array();
        $data = $this->user->get_customers($id);
        if (!empty($data)) {
            $response['data'] = $data;
            $response['msg'] = 'All Data Fetch successfully!';
            $response['status'] = 200;
        } else {
            $response['msg'] = 'Data not Found!';
            $response['status'] = 404;
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function center_reg_post() {
        $response = array();
        $user_data = array();
        $data['fullname'] = $this->post('fullname');
        $data['emailId'] = $this->post('emailId');
        $data['contact_number'] = $this->post('contact_number');
        $data['upassword'] = $this->post('upassword');
        $id = $this->user->customer_reg($data);

        //session data
        $user_data['username'] = $data['fullname'];
        $user_data['emailid'] = $data['emailId'];
        $user_data['contact_number'] = $data['contact_number'];
        $user_data['centerId'] = $id;
        $user_data['logged_in'] = true;
        
        //session data
        if (!empty($id)) {
            $data = array();
            $this->login->callsp_unit($id);
            // $this->login->callsp_data($id);
            $this->copy->copy_test_panel($id);
            $this->copy->copy_tests($id);
            $data = $this->user->get_customers($id);
            $response['msg'] = 'Customer Registration is successfully Done!';
            $response['data'] = $data;
            $response['status'] = 200;
            $this->session->set_userdata('lsesson', $user_data);
        } else {
            $response['msg'] = 'Bad Request!';
            $response['id'] = $id;
            $response['status'] = 400;
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function center_update_post() {
        $response = array();
        //if user id is present then execute if otherwise else block will execute
        if (!empty($this->user->get_user($this->post('uId')))) {
            $data['centerId'] = $this->post('centerId');
            $data['emailid'] = $this->post('emailid');
            $data['contact_number'] = $this->post('contact_number');
            $data['upassword'] = $this->post('upassword');
            $this->user->update_customer_center($data);
            $response['msg'] = 'Center Data Updated successfully!';
            $response['status'] = 200;
        } else {
            $response['msg'] = 'Data not Found!';
            $response['status'] = 404;
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function center_deactivate_delete($id) {
        $response = array();
        if (!empty($this->user->get_customers($id))) {
            $result = $this->user->delete_user($id);
            if ($result == 1) {
                $response['msg'] = 'user successfully deleted!';
                $response['status'] = 200;
            } else {
                $response['msg'] = 'Bad request!';
                $response['status'] = 400;
            }
        } else {
            $response['msg'] = 'Record not Found!';
            $response['status'] = 404;
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

}
