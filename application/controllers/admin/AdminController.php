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

    public function user() {
        $this->load->view('header');
        $this->load->view('side_bar');
        $this->load->view('user/user');
        $this->load->view('user/add_user_modal');
        $this->load->view('user/update_user_modal');
        $this->load->view('footer');
        $this->load->view('user/validation_js');
        $this->load->view('user/show_js');
        $this->load->view('user/new_js');
        $this->load->view('user/update_js');
    }

    public function product() {
        $this->load->view('header');
        $this->load->view('side_bar');
        $this->load->view('product/product');
        $this->load->view('product/add_product_modal');
        $this->load->view('product/update_product_modal');
        $this->load->view('footer');
        $this->load->view('product/validation_js');
        $this->load->view('product/show_js');
        $this->load->view('product/new_js');
        $this->load->view('product/update_js');
        
    }
    
    public function userProduct() {
        $this->load->view('header');
        $this->load->view('side_bar');
        $this->load->view('user_product/user_product');
        $this->load->view('user_product/add_userproduct_modal');
        $this->load->view('user_product/add_amc_modal');
        $this->load->view('user_product/update_userproduct_modal');
        $this->load->view('footer');
        $this->load->view('user_product/validation_js');
        $this->load->view('user_product/show_js');
        $this->load->view('user_product/new_js');
        $this->load->view('user_product/update_js');
        $this->load->view('user_product/add_amc_js');
    }
    public function productInvestment() {
        $this->load->view('header');
        $this->load->view('side_bar');
        $this->load->view('product_investment/product_investment');
        $this->load->view('product_investment/add_productinvest_modal');
        $this->load->view('product_investment/update_productinvest_modal');
        $this->load->view('footer');
        $this->load->view('product_investment/validation_js');
        $this->load->view('product_investment/show_js');
        $this->load->view('product_investment/new_js');
        $this->load->view('product_investment/update_js');
    }

    public function issueMaster() {
        $this->load->view('header');
        $this->load->view('side_bar');
        $this->load->view('issue_master/issue_master');
        $this->load->view('issue_master/add_issuemaster_modal');
        $this->load->view('issue_master/update_issuemaster_modal');
        $this->load->view('footer');
        $this->load->view('issue_master/show_js');
        $this->load->view('issue_master/new_js');
        $this->load->view('issue_master/update_js');
    }
    
    public function dashboard() {
        $this->load->view('header');
        $this->load->view('side_bar');
        $this->load->view('dashboard/dashboard');
        $this->load->view('footer');
        $this->load->view('dashboard/dashboard_js');
    }
}
