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
        $this->load->model('OutsourceLabModel', 'outsource');
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
            "amt_recieved" => $this->post('receivedAmt'),
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
        $caseId = $this->post('caseId');
//        print_r($data);
       
        if(!empty($caseId) && $caseId!=0){
            $result = $this->case->update_case($data,$caseId);
        }else{
            $result        = $this->case->add_case_data($data);
        }
        if ($result['status']) {
            $response = array(
                'Message' => 'New case added successfully',
                'Data' => $result,
                'status' => 200
            );
        } else {
            $response = array(
                'Message' => 'Error try again',
                'Data' => $result,
                'status' => 404
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
                'status' => 200
            ); 
        }else{
            $response = array(
                'Message' => 'Data not found',
                'Data' => $data,
                'status' => 204
            );  
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
    
    public function get_all_cases_get($centerId=0){
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

    public function get_case_data_get($caseId=0){
        $response = array();
        $data     = $this->case->get_case_details($caseId);
        if(!empty($data)){
                $test_data = array(
                    'tests' => array()
                );
                $transaction_data = array(
                    'transactions' => array()
                );
                $test_data = [];
                $outsource_data = $this->case->get_case_tests($data[0]['caseId']);
                if(!empty($outsource_data)){
              for($i=0;$i<count($outsource_data);$i++){
                $temp3 = array("outsourcetest"=>[],"outsource"=>false);
                $outsource = $this->outsource->center_outsource_lab_tests($outsource_data[$i]['testId']);
                if(!empty($outsource)){
                    $temp3 = array("outsourcetest"=>$outsource,"outsource"=>true);
                }
               $test_data[] = array_merge($outsource_data[$i],$temp3);
              }
              $test = array("test"=>$test_data);
               
                }
                $transaction = $this->case->get_case_transaction($data[0]['paymentId']);
                if(!empty($transaction)){
                    $transaction_data = array(
                        'transactions' => $transaction
                    );  
                }
                $records = array_merge($data[0],$test,$transaction_data);
            $response = array(
                'Message' => 'All cases loaded successfully',
                'data' => $records,
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

    public function check_sum_get($caseId){
        $records = array();
        $records = $this->case->get_sum_transaction($caseId);
        $this->response($records, REST_Controller::HTTP_OK);
       
    }
    
}