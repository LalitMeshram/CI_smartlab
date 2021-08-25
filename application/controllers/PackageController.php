<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class PackageController extends REST_Controller
{
    
    public function __construct()
    {
        
        parent::__construct();
        $this->load->model('PackageModel', 'package');
    }
    
    public function package_list_get($id = 0)
    {
        $response = array();
        $records  = array();
        $data     = $this->package->get_packages();
        if (!empty($data)) {
            for ($i = 0; $i < count($data); $i++) {
                $temp      = array(
                    'package_details' => array()
                );
                $p_details = $this->package->get_package_details($data[$i]['packageId']);
                if (!empty($p_details)) {
                    $temp = array(
                        'package_details' => $p_details
                    );
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

    public function package_add_post()
    {
        $response      = array();
        $package_data     = array(
            "plan_name" => $this->post('plan_name'),
            "amount" => $this->post('amount'),
            "duration" => $this->post('duration'),
            "isactive" => $this->post('isactive')
        );
        $package_details = $this->input->post('package_details');//send body [{"details":"Test 1"},{"details":"Test 2"}]
        $package_details = json_decode($package_details);
        $data          = array(
            'package_data' => $package_data,
            'package_details' => $package_details
        );
        $packageId = $this->post('packageId');
        if(!empty($packageId) && $packageId!=0){
            $result = $this->package->update_package($data,$packageId);
            $msg = "Package Data updated successfully";
        }else{
            $result        = $this->package->add_package_data($data);
            $msg ='New Package added successfully';
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