<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class LabCategoryController extends REST_Controller
{
    
    public function __construct()
    {
        
        parent::__construct();
        $this->load->model('LabCategoryModel', 'category');
    }
    
    public function category_list_get($centerId = 0)
    {
        $response = array();
        $data     = $this->category->category_list($centerId);
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
    
    
}