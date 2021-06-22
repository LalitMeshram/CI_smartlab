<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class UserMasterController extends REST_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('UserMasterModel', 'user');
    }

    public function user_get($id = 0) {
        $response = [];
        $data = $this->user->get_user($id);
        if (!empty($data)) {
            $response['data'] = $data;
            $response['msg'] = 'All Data Fetch successfully!';
            $response['status'] = 200;
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
            $response['msg'] = 'Data not Found!';
            $response['status'] = 404;
            $this->response($response, REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function user_post() {
        $response = [];

        $data['business_name'] = $this->post('business_name');
        $data['owner_name'] = $this->post('owner_name');
        $data['emailid'] = $this->post('emailid');
        $data['contact1'] = $this->post('contact1');
        $data['contact2'] = $this->post('contact2');
        $data['address'] = $this->post('address');
        $data['highway'] = $this->post('highway');
        $data['city'] = $this->post('city');
        $data['is_active'] = $this->post('is_active');
        $data['created_at'] = date(DATE_ISO8601, time());
        $data['modified_at'] = date(DATE_ISO8601, time());

        $id = $this->user->insert_user($data);
        if (!empty($id)) {
            $response['msg'] = 'user created successfully!';
            $response['id'] = $id;
            $response['status'] = 200;
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
            $response['msg'] = 'Bad Request!';
            $response['id'] = $id;
            $response['status'] = 400;
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function user_update_post() {
        $response = [];
        //if user id is present then execute if otherwise else block will execute
        if (!empty($this->user->get_user($this->post('uId')))) {
            $data['id'] = $this->post('uId');
            $data['business_name'] = $this->post('ubusiness_name');
            $data['owner_name'] = $this->post('uowner_name');
            $data['emailid'] = $this->post('uemailid');
            $data['contact1'] = $this->post('ucontact1');
            $data['contact2'] = $this->post('ucontact2');
            $data['address'] = $this->post('uaddress');
            $data['highway'] = $this->post('uhighway');
            $data['city'] = $this->post('ucity');
            $data['is_active'] = $this->post('uis_active');
            $data['modified_at'] = date(DATE_ISO8601, time());

            $this->user->update_user($data);

            $response['msg'] = 'user Updated successfully!';
            $response['status'] = 200;
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
            $response['msg'] = 'Data not Found!';
            $response['status'] = 404;
            $this->response($response, REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function user_delete($id) {
        $response = [];
        if (!empty($this->user->get_user($id))) {
            $result = $this->user->delete_user($id);
            if ($result == 1) {
                $response['msg'] = 'user successfully deleted!';
                $response['status'] = 200;
                $this->response($response, REST_Controller::HTTP_OK);
            } else {
                $response['msg'] = 'Bad request!';
                $response['status'] = 400;
                $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            $response['msg'] = 'Record not Found!';
            $response['status'] = 404;
            $this->response($response, REST_Controller::HTTP_NOT_FOUND);
        }
    

}
