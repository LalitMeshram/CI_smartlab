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
        $result_1 = array();
        $mainResult = $this->report->get_category_findings($caseId);
        if ($result != NULL && count($result) > 0) {
        
           for($var = 0; $var < count($result); $var++) {
               $lower = 0;
               $upper = 0;
            $limit = $this->report->get_ranges($result[$var]['patientId'],$result[$var]['panelId']);
            if(!empty($limit) && count($limit)>0) {
                if(count($limit)>1){
                    $lower = $limit[0]['lower_limit'];
                    $upper = $limit[0]['upper_limit'];
                }else{
                    $lower = $limit[0]['lower_limit'];
                    $upper = $limit[0]['upper_limit'];
                }
            }
            
            $array = array('lower'=>$lower,'upper'=>$upper);
            
           $result_1[] =  array_merge($result[$var],$array);
           }
        }
     $fdata =   array_merge($result_1,$mainResult);
        $response = array(
            "ResponseCode"=>200,
            "Data"=>$result_1,
            "category"=>$mainResult
        );
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function get_submiited_report_get($caseId){
        $result = $this->report->submited_report($caseId);
        $records = array();
        $reportdata = array();
        if(!empty($result)){
            $reportdata = $this->report->submited_report_data($result[0]['reportId']);
            if(!empty($reportdata)){
                $temp = array('reports'=>$reportdata);
            }
            else{
                $temp = array('reports'=>array());
            }

            $records = array_merge($result[0], $temp);
            $response = array(
                "ResponseCode"=>200,
                "Data"=>$records
            );
        }else{
            $response = array(
                "ResponseCode"=>204,
                "Data"=>$records,
            );
        }
       
       
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
//{"paremeterId":1,"parameter":"Entomology","testName":"Test One","testId":1,value:"10","unit":KG,Reference:10-40,groupname:"-",categoryId:1,categoryName:Biochemistry,level:"H"}
        $data =array(
            'data'=>$case,
            'report_data'=>$report_data
        );
        $reportId = $this->post('reportId');
        if(!empty($reportId) && $reportId !=0){
            $result        = $this->report->update_report_data($data,$reportId);
            $msg = 'Report Data updated successfully';
        }else{
            $result = $this->report->add_report($data);
        }
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