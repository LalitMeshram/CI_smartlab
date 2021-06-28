<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class UserMasterController extends REST_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('UserMasterModel', 'user');
    }

    public function customers_list_get($id = 0) {
        $response = [];
        $data = $this->user->get_customers($id);
        if (!empty($data)) {
            $response['data'] = $data;
            $response['msg'] = 'All Data Fetch successfully!';
            $response['status'] = 200;
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
            $response['msg'] = 'Data not Found!';
            $response['status'] = 404;
            $this->response($response, REST_Controller::HTTP_OK);
        }
    }

    public function center_reg_post() {
        $response = [];

        $data['fullname'] = $this->post('fullname');
        $data['emailId'] = $this->post('emailId');
        $data['contact_number'] = $this->post('contact_number');
        $data['upassword'] = $this->post('upassword');
        $id = $this->user->customer_reg($data);
        if (!empty($id)) {
            $response['msg'] = 'Customer Registration is successfully Done!';
            $response['id'] = $id;
            $response['status'] = 200;
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
            $response['msg'] = 'Bad Request!';
            $response['id'] = $id;
            $response['status'] = 400;
            $this->response($response, REST_Controller::HTTP_OK);
        }
    }

    public function center_update_post() {
        $response = [];
        //if user id is present then execute if otherwise else block will execute
        if (!empty($this->user->get_user($this->post('uId')))) {
            $data['centerId'] = $this->post('centerId');
            $data['emailid'] = $this->post('emailid');
            $data['contact_number'] = $this->post('contact_number');
            $data['upassword'] = $this->post('upassword');
            $this->user->update_customer_center($data);

            $response['msg'] = 'Center Data Updated successfully!';
            $response['status'] = 200;
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
            $response['msg'] = 'Data not Found!';
            $response['status'] = 404;
            $this->response($response, REST_Controller::HTTP_OK);
        }
    }

    public function center_deactivate_delete($id) {
        $response = [];
        if (!empty($this->user->get_customers($id))) {
            $result = $this->user->delete_user($id);
            if ($result == 1) {
                $response['msg'] = 'user successfully deleted!';
                $response['status'] = 200;
                $this->response($response, REST_Controller::HTTP_OK);
            } else {
                $response['msg'] = 'Bad request!';
                $response['status'] = 400;
                $this->response($response, REST_Controller::HTTP_OK);
            }
        } else {
            $response['msg'] = 'Record not Found!';
            $response['status'] = 404;
            $this->response($response, REST_Controller::HTTP_OK);
        }
    

}
}
