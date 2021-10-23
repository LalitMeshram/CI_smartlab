<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class AdminTestPanel extends REST_Controller
{
    
    public function __construct()
    {
        
        parent::__construct();
        $this->load->model('AdminTestPanelModel', 'panel');
    }
    
    public function index_get() {
        
    }
    
    public function panel_list_get()
    {
        $response = array();
        $records  = array();
        $data     = $this->panel->get_panel_test();
        if (!empty($data)) {
            $temp = array();
            $temp1 = array();
                    for ($j = 0; $j < count($data); $j++) {
                        $subtypes_test_ranges = array(
                            'subtypes_test_ranges' => array()
                        );
                        $s_details            = $this->panel->get_subtypes_ranges($data[$j]['panelId']);
                        if (!empty($s_details)) {
                            $subtypes_test_ranges = array(
                                'subtypes_test_ranges' => $s_details
                            );
                        }
                         $temp[]    = array_merge($data[$j],$subtypes_test_ranges);
                    }
                $records = $temp;
            $response['data']   = $records;
            $response['msg']    = 'All Data Fetch successfully!';
            $response['status'] = 200;
        } else {
            $response['msg']    = 'Data not Found!';
            $response['status'] = 404;
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
    
    public function panel_test_add_post()
    {
        $response      = array();
        $panel_data     = array(
            "testName" => $this->post('testName'),
            "unitId" => $this->post('unitId')
        );
        $subtypes_test = $this->input->post('subtypes_test');//refer testdata.json
        $subtypes_test = json_decode($subtypes_test);
        $data          = array(
            'panel_data' => $panel_data,
            'subtypes_test' => $subtypes_test
        );
        $panelId = $this->post('panelId');
        if(!empty($panelId) && $panelId !=0){
            $result        = $this->panel->update_panel_data($data,$panelId);
            $msg = 'Parameter Data updated successfully';
        }else{
            $result        = $this->panel->add_panel_data($data); 
            $msg = 'Parameter Data added successfully';
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

    
    
}