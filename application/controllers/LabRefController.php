<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class LabRefController extends REST_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LabRefModel', 'ref');
    }
    
    public function ref_list_get($centerId = 0)
    {
        $response = array();
        $data     = $this->ref->get_center_reference($centerId);
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

    public function add_lab_ref_post()
    {
        $response = array();
          $ref_data = array(
            "ref_title"=>$this->post('ref_title'),
            "centerId"=> $this->post('centerId'),
            "ref_name"=>$this->post('ref_name'),
            "ref_degree"=> $this->post('ref_degree'),
            "ref_contact"=>$this->post('ref_contact'),
            "ref_email"=> $this->post('ref_email'),
            "ref_address"=>$this->post('ref_address'),
            "ref_id"=>$this->post('ref_id')
        );
        $result = $this->ref->center_reference($ref_data['ref_id']);
      
        if(empty($result)){
            $result = $this->ref->center_ref_reg($ref_data);
            $response = array(
                'Message' => 'Reference added successfully',
                'Data' => $result,
                'status' => 200
            );
        }else{
            $result = $this->ref->center_ref_update($ref_data);
            if($result){
            $response = array(
                'Message' => 'Reference Data updated successfully',
                'Data' => $result,
                'status' => 200
            ); 
        }else
        {
            $response = array(
                'Message' => 'Try again',
                'Data' => $result,
                'status' => 204
            );    
        }
        }
        $this->response($response, REST_Controller::HTTP_OK);
    } 
    
}