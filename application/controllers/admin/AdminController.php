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
        echo base_url();
    }

     
    public function pricing() {
        $this->load->view('header');
        $this->load->view('menu_bar');
        $this->load->view('pricing/pricing');
        $this->load->view('footer');
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
        $this->load->view('lab_registration/lab_registration');
        $this->load->view('footer');
    }
    public function userLogin() {
        $this->load->view('user_login/login');
    }
    public function userRegistration() {
        $this->load->view('user_registration/registration');
    }
    public function setup() {
        $this->load->view('header');
        $this->load->view('menu_bar');
        $this->load->view('lab_registration/lab_registration');
        $this->load->view('footer');
    }
}
