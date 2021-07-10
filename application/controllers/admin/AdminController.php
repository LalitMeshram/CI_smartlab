<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class AdminController extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
//		$this->load->view('welcome_message');
        
    }

     
    public function pricing() {
        $this->load->view('header');
        $this->load->view('menu_bar');
        $this->load->view('pricing/pricing');
        $this->load->view('footer');
        $this->load->view('pricing/pricing_js');
    }
    public function dashboard() {
        $this->load->view('header');
        $this->load->view('menu_bar');
        $this->load->view('dashboard/dashboard');
        $this->load->view('footer');
    }
    public function labRegistration() {
        $this->load->view('header');
        $this->load->view('menu_bar');
        $this->load->view('setup/lab_registration');
        $this->load->view('footer');
        $this->load->view('setup/get_lab_registration_js');
        $this->load->view('setup/lab_registration_js');
    }
    public function userLogin() {
        $this->load->view('user_login/login');
        $this->load->view('user_login/login_js');
    }
    public function userRegistration() {
        $this->load->view('user_registration/registration');
        $this->load->view('user_registration/registration_js');
        $this->load->view('user_registration/validation');
    }
    public function letterHead() {
        $this->load->view('header');
        $this->load->view('menu_bar');
        $this->load->view('setup/letter_head');
        $this->load->view('footer');
        $this->load->view('setup/letter_head_js');
        $this->load->view('setup/get_letter_head_js');
    }
    public function addTest() {
        $this->load->view('header');
        $this->load->view('menu_bar');
        $this->load->view('setup/add_test');
        $this->load->view('footer');
    }
    public function testDatabase() {
        $this->load->view('header');
        $this->load->view('menu_bar');
        $this->load->view('setup/test_database');
        $this->load->view('footer');
    }
    
    public function patient() {
        $this->load->view('header');
        $this->load->view('menu_bar');
        $this->load->view('patient/patient');
        $this->load->view('footer');
        $this->load->view('patient/patient_registration_modal');
        $this->load->view('patient/add_range_modal');
        $this->load->view('patient/patient_show_js');
        $this->load->view('patient/patient_registration_js');
    }
    public function createCase() {
        $this->load->view('header');
        $this->load->view('menu_bar');
        $this->load->view('patient/create_case');
        $this->load->view('footer');
    }
    public function invoice() {
        $this->load->view('header');
        $this->load->view('menu_bar');
        $this->load->view('patient/invoice');
        $this->load->view('footer');
    }
}
