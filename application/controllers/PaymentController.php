<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class PaymentController extends REST_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PaymentModel', 'payment');
    }
    
    public function payment_list_get($id = 0)
    {
        $response = array();
        $data     = $this->payment->get_payments($id);
        if (!empty($data)) {
            $response['data']   = $data;
            $response['msg']    = 'All Data Fetch successfully!';
            $response['status'] = 200;
        } else {
            $response['msg']    = 'Data not Found!';
            $response['status'] = 404;
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
    
    public function payment_center_reg_post()
    {
        $response = array();
        
        $data['centerId']           = $this->post('centerId');
        $data['packageId']          = $this->post('packageId');
        $duration                   = $this->post('duration');
        $data['startdate']          = date('Y-m-d');
        $data['enddate']            = date('Y-m-d', strtotime(date('Y-m-d') . ' +' . $duration . ' day'));
        $data['paymentmode']        = $this->post('paymentmode');
        $data['payment_ref_number'] = $this->post('payment_ref_number');
        $id                         = $this->payment->payment_reg($data);
        if (!empty($id)) {
            $response['msg']    = 'Center Payment is successfully Done!';
            $response['id']     = $id;
            $response['status'] = 200;
        } else {
            $response['msg']    = 'Bad Request!';
            $response['id']     = $id;
            $response['status'] = 400;
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
    
}