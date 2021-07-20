<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class CaseController extends REST_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CaseModel', 'case');
        $this->load->model('TestModel', 'test');
    }
    
 public function case_add_post()
    {
        $response      = array();
        $case_data     = array(
            "centerId" => $this->post('centerId'),
            "patientId" => $this->post('patientId'),
            "referenceId" => $this->post('referenceId'),
            "collection_center" => $this->post('collection_center'),
            "collection_source" => $this->post('collection_source'),
            "total_amt" => $this->post('total_amt'),
            "amt_recieved" => $this->post('amt_recieved'),
            "discount" => $this->post('discount'),
            "paymentmode"=>$this->post('paymentmode'),
            "paymentdetails"=>$this->post('paymentdetails')
        );
        $test_data = $this->input->post('test_data');//send body [{"testId":1},{"testId":2}]
        $test_data = json_decode($test_data);
        $data          = array(
            'test_data' => $test_data,
            'case_data' => $case_data
        );
        $result        = $this->case->add_case_data($data);
        if ($result['status']) {
            $response = array(
                'Message' => 'New case added successfully',
                'Data' => $result,
                'Responsecode' => 200
            );
        } else {
            $response = array(
                'Message' => 'Error try again',
                'Data' => $result,
                'Responsecode' => 404
            );
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function test_for_cases_get($centerId = 0){
        $response = array();
        $records = array();
        $data     = $this->test->get_center_tests($centerId);
        if(!empty($data)){
            $count = count($data);
           // $records = $data;
            for($i = 0; $i < $count; $i++){
                $outsource = array(
                    'outsource' => array()
                );
                $outsource_data = $this->test->get_outsource_amounts($data[$i]['testId']);
                if(!empty($outsource_data)){
                    $outsource = array(
                        'outsource' => $outsource_data
                    ); 
                }
                $records[] = array_merge($data[$i],$outsource);
            }
            $response = array(
                'Message' => 'Test loaded successfully',
                'Data' => $records,
                'count' =>$count,
                'Responsecode' => 200
            ); 
        }else{
            $response = array(
                'Message' => 'Data not found',
                'Data' => $data,
                'Responsecode' => 204
            );  
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
    
    
    
}