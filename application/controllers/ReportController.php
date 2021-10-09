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
        $mainResult = $this->report->get_category_findings($caseId);
        if ($result != NULL && count($result) > 0) {
            // foreach ($result as $key => $server) {
            //     $Category = $server->category;
            //     $temp = $server;

            //     if (array_key_exists($Category, $mainResult)) {
            //         $mainResult["$Category"] = $Category;
            //     } else {
            //         $mainResult["$Category"] = $Category;
            //     }
            // }
        }
     $fdata =   array_merge($result,$mainResult);
        $response = array(
            "ResponseCode"=>200,
            "Data"=>$result,
            "category"=>$mainResult
        );
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function add_report_post(){
        $response      = array();
        $case     = array(
            "centerId" => $this->post('centerId'),
            "caseId" => $this->post('caseId'),
            "patientId" => $this->post('patientId'),
            "casedate" => date('Y-m-d'),
            "finding_details"=>$this->post('findingDetails'),
        );
        $report_data = $this->post('report_data');
        $report_data = json_decode($report_data);
//{"paremeterId":1,"parameter":"Entomology","testName":"Test One","testId":1,value:"10","unit":KG,Reference:10-40,groupname:"-",categoryId:1,categoryName:Biochemistry}
        $data =array(
            'data'=>$case,
            'report_data'=>$report_data
        );
        $result = $this->report->add_report($data);
        if($result){
            $response = array(
                "ResponseCode"=>200,
                "Message"=>"Report Generated Successfully",
                "Data"=>$result
            );
        }else{
            $response = array(
                "ResponseCode"=>404,
                "Message"=>"Report Not Generated",
                "Data"=>$result
            );
        }
        
        $this->response($response, REST_Controller::HTTP_OK);
    }

}