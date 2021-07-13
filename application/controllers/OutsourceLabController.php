<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class OutsourceLabController extends REST_Controller
{
    
    public function __construct()
    {  
        parent::__construct();
        $this->load->model('OutsourceLabModel', 'outsource');
    }
    
    public function outsource_lab_list_get($centerId = 0)
    {
        $response = array();
        $data     = $this->outsource->get_center_outsource_labs($centerId);
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

    public function add_outsource_lab_post()
    {
        $response = array();
          $outsource_data = array(
            "lab_name"=>$this->post('lab_name'),
            "centerId"=> $this->post('centerId'),
            "outsource_lab_id"=>$this->post('outsource_lab_id')
        );
        $result = $this->outsource->center_outsource_lab($outsource_data['outsource_lab_id']);
      
        if(empty($result)){
            $result = $this->outsource->center_outsource_lab_reg($outsource_data);
            $response = array(
                'Message' => 'Outsource Lab added successfully',
                'Data' => $result,
                'Responsecode' => 200
            );
        }else{
            $result = $this->outsource->center_outsource_lab_update($outsource_data);
            if($result){
                $response = array(
                    'Message' => 'Outsource Lab Data updated successfully',
                    'Data' => $result,
                    'Responsecode' => 200
                ); 
            }else{
                $response = array(
                    'Message' => 'Try Again',
                    'Responsecode' => 404
                );   
            }
           
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
    
    
    
}