<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class TestController extends REST_Controller
{
    
    public function __construct()
    {
        
        parent::__construct();
        $this->load->model('TestModel', 'test');
    }
    
    public function test_list_get($centerId = 0)
    {
        $response = array();
        $records  = array();
        $data     = $this->test->get_center_tests($centerId);
        if (!empty($data)) {
            $temp      = array();
            for ($i = 0; $i < count($data); $i++) {
                $subtypes_test      = array(
                    'subtypes_test' => array()
                );
                $p_details = $this->test->get_subtypes_test($data[$i]['testId']);
                if (!empty($p_details)) {
                  
                    for($j=0;$j<count($p_details);$j++){
                        $subtypes_test_ranges      = array(
                            'subtypes_test_ranges' => array()
                        );
                        $s_details = $this->test->get_subtypes_ranges($p_details[$j]['subtypeId']);
                        if(!empty($s_details)){
                            $subtypes_test_ranges      = array(
                                'subtypes_test_ranges' => $s_details
                            ); 
                        }
                        $subtypes_test = array(
                            'subtypes_test' => $p_details[$j]
                        );
                        $temp[] = array_merge($subtypes_test,$subtypes_test_ranges);
                    }
                   
                   
                }
                $records[] = array_merge($data[$i], $temp);
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
        $response = array();
          $test_data = array(
            "categoryId"=> $this->post('categoryId'),
            "test_name"=>$this->post('test_name'),
            "short_name"=> $this->post('short_name'),
            "method"=>$this->post('method'),
            "instrument"=> $this->post('instrument'),
            "gender"=>$this->post('gender'),
            "fees"=> $this->post('fees'),
            "centerId"=>$this->post('centerId')
        );
        $subtypes_test = $this->input->post('subtypes_test');
        $subtypes_test = json_decode($subtypes_test);
        $data = array(
            'test_data' =>$test_data,
            'subtypes_test' =>$subtypes_test
        );
        $result = $this->test->add_test_data($data);
        if($result['status']){
            $response = array(
                'Message' => 'Test added successfully',
                'Data' => $result,
                'Responsecode' => 200
            );
        }else{
            $response = array(
                'Message' => 'Error try again',
                'Data' => $result,
                'Responsecode' => 404
            ); 
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
    
    
}