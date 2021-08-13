<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class ReportController extends REST_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CaseModel', 'case');
        $this->load->model('ReportModel', 'report');
    }
    
 public function enter_findings_get($caseId=0)
    {
        $result = array();
        $result = $this->report->get_finding_data($caseId);
        $temp = array();
        $mainResult = array();
        if ($result != NULL && count($result) > 0) {
            foreach ($result as $key => $server) {
                $Category = $server->category;
                $temp = $server;

                if (array_key_exists($Category, $mainResult)) {
                    $mainResult["$Category"][] = $temp;
                } else {
                    $mainResult["$Category"][] = $temp;
                }
            }
        }
        $response = array(
            "ResponseCode"=>200,
            "Data"=>$mainResult
        );
        $this->response($response, REST_Controller::HTTP_OK);
    }

}