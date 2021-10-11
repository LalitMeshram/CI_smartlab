<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class TestController_new extends REST_Controller
{
    
    public function __construct()
    {
        
        parent::__construct();
        $this->load->model('LabTestModel_new', 'test');
    }
    
    public function index_get() {
        
    }
    
    public function test_list_get()
    {
        $response = array();
        $records  = array();
        $data     = $this->test->get_center_tests();
        if (!empty($data)) {
            $temp = array();
            $temp1 = array();
            for ($i = 0; $i < count($data); $i++) {
                $subtypes_test = array(
                    'subtypes_test' => array()
                );
                $p_details     = $this->test->get_subtypes_test($data[$i]['testId']);
                if (!empty($p_details)) {
                    $temp1= array("subtype_test"=>$p_details );  
                }
                $records[] = array_merge($data[$i], $temp1);
            }
            $response['data']   = $records;
            $response['msg']    = 'All Data Fetch successfully!';
            $response['status'] = 200;
        } else {
            $response['msg']    = 'Data not Found!';
            $response['status'] = 404;
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
    
    public function test_add_post()
    {
        $response      = array();
        $test_data     = array(
            "categoryId" => $this->post('categoryId'),
            "test_name" => $this->post('test_name'),
            "short_name" => $this->post('short_name'),
            "method" => $this->post('method'),
            "instrument" => $this->post('instrument'),
            "gender" => $this->post('gender'),
            "fees" => $this->post('fees'),
            "desc_text" => $this->post('desc_text')
        );
        $subtypes_test = $this->input->post('subtypes_test');
        //[{"panelId":2,"isgroup":1,"label":"Generic","flag_sequence":1},{"panelId":3,"isgroup":1,"label":"Generic","flag_sequence":1},{"panelId":4,"isgroup":0,"label":"","flag_sequence":0}]
        $subtypes_test = json_decode($subtypes_test);
        
        $data          = array(
            'test_data' => $test_data,
            'subtypes_test' => $subtypes_test
        );
        $testId = $this->post('testId');
        if(!empty($testId) && $testId !=0){
            $result        = $this->test->update_test_data($data,$testId);
            $msg = 'Test Data updated successfully';
        }else{
            $result        = $this->test->add_test_data($data); 
            $msg = 'Test Data added successfully';
        }
        if ($result['status']) {
            $response = array(
                'Message' => $msg,
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
    
    public function get_panel_test($centerId = 0){

        $data = $this->panel->get_panel_test($centerId);
        if(!empty($data)){
            $response = array(
                'Message' => 'Test panel loaded successful',
                'Data' => $data,
                'status' => 200
            ); 
        }else{
            $response = array(
                'Message' => 'Add Test panel first',
                'Data' => $data,
                'status' => 204
            );  
        }
        $this->response($response, REST_Controller::HTTP_OK); 
    }
    
    
}