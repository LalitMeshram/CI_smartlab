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
    }
    public function login_auth_post()
    {
        $user = $this->post("username");
        $pass = $this->post("pass");
        $mainResult = [];
        if (!empty($user) && !empty($pass)) {
            $result = $this->login->checkauth($user, $pass);
            if ($result["status"]) {
                $user_data = [
                    "username" => $result["data"]["fullname"],
                    "emailid" => $result["data"]["emailId"],
                    "contact_number" => $result["data"]["contact_number"],
                    "centerId" => $result["data"]["centerId"],
                    "logged_in" => true,
                ];
                $payment = $this->payment->check_center_is_active(
                    $user_data["centerId"]
                );

                if ($payment["status"]) {
                    $user_data["payment"] = true;
                } else {
                    $user_data["payment"] = false;
                }
                $this->session->set_userdata($user_data);
                $response = [
                    "Message" => "Logged in successfully",
                    "Data" => $user_data,
                    "Responsecode" => 200,
                ];
            } else {
                $response = [
                    "Message" =>
                        "Invalid user id or password or contact adminstrator",
                    "Responsecode" => 204,
                ];
            }
        } else {
            $response = [
                "Message" => "Parameter missing",
                "Responsecode" => 404,
            ];
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
}
