<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class BusinessReportController extends REST_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BusinessModel', 'case');
    }

    public function business_report_get($centerId=0){
        $response = array();
        $data     = $this->case->get_all_cases($centerId);
        if(!empty($data)){
            $response = array(
                'Message' => 'All cases loaded successfully',
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