<?php
defined("BASEPATH") or exit("No direct script access allowed");
require APPPATH . "libraries/REST_Controller.php";

class CopyController extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("CopyModel", "copy");
    }
   public function copy_parameters_get($centerId)
   {
      $response = array();
      if($this->copy->copy_test_panel($centerId)){
        $response = array(
            'Message' =>'Data copy successfully');
        }
        else{
            $response = array(
                'Message' =>'Data copy Failed');
        }
        $this->response($response, REST_Controller::HTTP_OK);
      }

      public function copy_tests_get($centerId)
      {
         $response = array();
         if($this->copy->copy_tests($centerId)){
           $response = array(
               'Message' =>'Data copy successfully');
           }
           else{
               $response = array(
                   'Message' =>'Data copy Failed');
           }
           $this->response($response, REST_Controller::HTTP_OK);
         }
}