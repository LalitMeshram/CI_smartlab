<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class LabUnitController extends REST_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LabUnitModel', 'unit');
    }
    
    public function unit_list_get($centerId = 0)
    {
        $response = array();
        $data     = $this->unit->get_center_units($centerId);
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

    public function add_lab_units_post()
    {
        $response = array();
          $unit_data = array(
            "unit"=>$this->post('unit'),
            "centerId"=> $this->post('centerId'),
            "unitId"=>$this->post('unitId')
        );
        $result = $this->unit->center_unit($unit_data['unitId']);
      
        if(empty($result)){
            $result = $this->unit->center_unit_reg($unit_data);
            $response = array(
                'Message' => 'Unit added successfully',
                'Data' => $result,
                'Responsecode' => 200
            );
        }else{
            $result = $this->unit->center_unit_update($unit_data);
            $response = array(
                'Message' => 'Unit Data updated successfully',
                'Data' => $result,
                'Responsecode' => 200
            ); 
        }
        $this->response($response, REST_Controller::HTTP_OK);
    } 
    
}