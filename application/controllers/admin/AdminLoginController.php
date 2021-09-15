<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class AdminLoginController extends CI_Controller {
    public function adminLogin() {
        $this->load->view('admin_login/login');
        $this->load->view('admin_login/login_js');
    }

    // public function forgate_password() {
    //     $this->load->view('forgate_password');
    // }

    // public function reset_password() {
    //     $this->load->view('reset_password');
    // }

    public function adminDashboard() {
        $this->load->view('admin_header/header');
        $this->load->view('admin_menubar/menu_bar');
        $this->load->view('admin_dashboard/dashboard');
        $this->load->view('footer');
    }


    public function predefinedCategory() {
        $this->load->view('admin_header/header');
        $this->load->view('admin_menubar/menu_bar');
        $this->load->view('predefined_category/lab_category');
        $this->load->view('predefined_category/add_category_modal');
        $this->load->view('footer');
        $this->load->view('predefined_category/show_js');
        $this->load->view('predefined_category/new_js');
    }

    public function predefinedUnit() {
        $this->load->view('admin_header/header');
        $this->load->view('admin_menubar/menu_bar');
        $this->load->view('predefined_unit/lab_unit');
        $this->load->view('predefined_unit/add_unit_modal');
        $this->load->view('footer');
        $this->load->view('predefined_unit/show_js');
        $this->load->view('predefined_unit/new_js');
    }

    public function addPredefinedTest() {
        $this->load->view('admin_header/header');
        $this->load->view('admin_menubar/menu_bar');
        $this->load->view('predefined_test/add_test');
        $this->load->view('footer');
        $this->load->view('predefined_test/add_test_modals');
        $this->load->view('predefined_test/add_test_js');
        $this->load->view('predefined_test/parameter_details_js');
        $this->load->view('predefined_test/add_range_js');
        $this->load->view('predefined_test/category_js');
        $this->load->view('predefined_test/unit_js');
        $this->load->view('predefined_test/outsource_lab_js');
    }
    
    public function updatePredefinedTest($id) {
        $data['id']=$id;
        $this->load->view('admin_header/header');
        $this->load->view('admin_menubar/menu_bar');
        $this->load->view('predefined_test/update_test');
        $this->load->view('footer');
        $this->load->view('predefined_test/add_test_modals');
        $this->load->view('predefined_test/update_test_js',$data);
        $this->load->view('predefined_test/parameter_details_js');
        $this->load->view('predefined_test/add_range_js');
        $this->load->view('predefined_test/category_js');
        $this->load->view('predefined_test/unit_js');
        $this->load->view('predefined_test/outsource_lab_js');
        $this->load->view('predefined_test/set_update_test_js',$data);
    }
    
    public function testPredefinedDatabase() {
        $this->load->view('admin_header/header');
        $this->load->view('admin_menubar/menu_bar');
        $this->load->view('predefined_test/test_database');
        $this->load->view('footer');
        $this->load->view('predefined_test/test_database_js');
    }


    public function createPackage($id=0)
    {
        $data['pkgId']=$id;
        $this->load->view('admin_header/header');
        $this->load->view('admin_menubar/menu_bar');
        $this->load->view('admin_package/create_package');
        $this->load->view('footer');
        $this->load->view('admin_package/create_package_js');
        $this->load->view('admin_package/setpkgDetails',$data);
    }


    public function package()
    {
        $this->load->view('admin_header/header');
        $this->load->view('admin_menubar/menu_bar');
        $this->load->view('admin_package/package');
        $this->load->view('footer');
        $this->load->view('admin_package/package_js');
    }



}