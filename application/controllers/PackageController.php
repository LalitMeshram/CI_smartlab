<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class PackageController extends REST_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('PackageModel', 'package');
    }

    public function package_list_get($id = 0) {
        $response = [];
        $records = [];
        $data = $this->package->get_packages($id);
        if (!empty($data)) {
            $temp = array('package_details'=>[]);
            for($i=0;$i<count($data);$i++){
               $p_details= $this->package->get_package_details($data[$i]->packageId); 
               if(!empty($p_details)){
                $temp = array('package_details'=>$p_details);
               }
               $records[] = array_merge($data[$i],$temp); 
            }
           
            $response['data'] = $records;
            $response['msg'] = 'All Data Fetch successfully!';
            $response['status'] = 200;
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
            $response['msg'] = 'Data not Found!';
            $response['status'] = 404;
            $this->response($response, REST_Controller::HTTP_OK);
        }
    }

    
}
