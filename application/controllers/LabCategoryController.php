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
        $data     = $this->category->get_center_categories($centerId);
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

    public function add_lab_catgeory_post()
    {
        $response = array();
          $category_data = array(
            "category"=>$this->post('category'),
            "centerId"=> $this->post('centerId'),
            "categoryId"=>$this->post('categoryId')
        );
        $result = $this->category->center_category($category_data['categoryId']);
      
        if(empty($result)){
            $result = $this->category->center_category_reg($category_data);
            $response = array(
                'Message' => 'Category added successfully',
                'Data' => $result,
                'status' => 200
            );
        }else{
            $result = $this->category->center_category_update($category_data);
         
                $response = array(
                    'Message' => 'Category Data updated successfully',
                    'Data' => $result,
                    'status' => 200
                ); 
           
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
    
    
    
}