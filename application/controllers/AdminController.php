<?php
defined("BASEPATH") or exit("No direct script access allowed");
require APPPATH . "libraries/REST_Controller.php";

class AdminController extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("AdminModel", "login");
    }
    public function admin_login_post()
    {
        $user       = $this->post("username");
        $pass       = $this->post("pass");
        $mainResult = array();
        $user_data  = array();
        if (!empty($user) && !empty($pass)) {
            $result = $this->login->checkauth($user, $pass);
            if ($result["status"]) {
                $user_data['username']       = $result["data"]["name"];
                $user_data['emailid']        = $result["data"]["email"];
                $user_data['logged_in']      = true;
            
                $this->session->set_userdata('Asession',$user_data);
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
        redirect(base_url('/adminLogin'));
    }
}