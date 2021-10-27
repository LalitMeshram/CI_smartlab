<?php
defined("BASEPATH") or exit("No direct script access allowed");
require APPPATH . "libraries/REST_Controller.php";

class LoginController extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("LoginModel", "login");
        $this->load->model("PaymentModel", "payment");
        $this->load->model("AdminModel", "adminmodel");
        $this->load->model("CopyModel", "copy");
        $this->load->model("LabModel", "lab");
    }
    public function login_auth_post()
    {
        $user       = $this->post("username");
        $pass       = $this->post("pass");
        $mainResult = array();
        $user_data  = array();
        if (!empty($user) && !empty($pass)) {
            $result = $this->login->checkauth($user, $pass);
            if ($result["status"]) {
                $user_data['username']       = $result["data"]["fullname"];
                $user_data['emailid']        = $result["data"]["emailId"];
                $user_data['contact_number'] = $result["data"]["contact_number"];
                $user_data['centerId']       = $result["data"]["centerId"];
                $user_data['logged_in']      = true;
                $payment                     = $this->payment->check_center_is_active($user_data["centerId"]);
                
                if ($payment["status"]) {
                    $user_data["payment"] = true;
                } else {
                    $user_data["payment"] = false;
                }
                $targetPath = "logos/" . $centerId . ".jpg"; // Target path where file is to be stored
        if(file_exists( $targetPath)) {
           $user_data["logo"] = $targetPath;
           $user_data["logoflag"] = true;
        }else{
            $centerData = $this->lab->get_lab_data($data['centerId']);
            if(!empty($centerData)){
                if(!empty($centerData['brandName'])){
                    $user_data["logo"] = $centerData['brandName'];
                }else{
                    $user_data["logo"] = 'NULL'; 
                }
               
            }
            $user_data["logoflag"] = false;
        }
                $this->adminmodel->callsp_data($user_data['centerId']);
                $this->copy->copy_test_panel($user_data['centerId']);
                $this->copy->copy_tests($user_data['centerId']);
                $this->session->set_userdata('lsesson',$user_data);
                $response['Message']      = "Logged in successfully";
                $response['Data']         = $user_data;
                $response['Responsecode'] = 200;
            } else {
                $response['Message']      = "Invalid username or password";
                $response['Responsecode'] = 404;
            }
        } else {
            $response['Message']      = "Parameter Missing";
            $response['Responsecode'] = 204;
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
    public function logout_get() {
        $this->load->driver('cache');
        $this->session->sess_destroy();
        $this->cache->clean();
        redirect(base_url('/'));
    }
}