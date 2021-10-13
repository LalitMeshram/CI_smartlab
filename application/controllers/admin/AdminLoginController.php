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
        $data['title']='Dashboard';
        $this->load->view('admin_header/header',$data);
        $this->load->view('admin_menubar/menu_bar');
        $this->load->view('admin_dashboard/dashboard');
        $this->load->view('footer');
    }


    public function predefinedCategory() {
        $data['title']='Category';
        $this->load->view('admin_header/header',$data);
        $this->load->view('admin_menubar/menu_bar');
        $this->load->view('predefined_category/lab_category');
        $this->load->view('predefined_category/add_category_modal');
        $this->load->view('footer');
        $this->load->view('predefined_category/show_js');
        $this->load->view('predefined_category/new_js');
    }

    public function predefinedUnit() {
        $data['title']='Unit';
        $this->load->view('admin_header/header',$data);
        $this->load->view('admin_menubar/menu_bar');
        $this->load->view('predefined_unit/lab_unit');
        $this->load->view('predefined_unit/add_unit_modal');
        $this->load->view('footer');
        $this->load->view('predefined_unit/show_js');
        $this->load->view('predefined_unit/new_js');
    }

    public function addPredefinedTest() {
        $data['title']='Add Test';
        $this->load->view('admin_header/header',$data);
        $this->load->view('admin_menubar/menu_bar');
        $this->load->view('predefined_test/add_test');
        $this->load->view('footer');
        $this->load->view('predefined_test/add_test_modals');
        $this->load->view('predefined_test/get_testpanellist_js');
        $this->load->view('predefined_test/is_group_js');
        $this->load->view('predefined_test/add_test_js');
        $this->load->view('predefined_test/parameter_details_js');
        $this->load->view('predefined_test/add_range_js');
        $this->load->view('predefined_test/category_js');
        $this->load->view('predefined_test/unit_js');
        $this->load->view('predefined_test/outsource_lab_js');
    }
    
    public function updatePredefinedTest($id) {
        $data['id']=$id;
        $data['title']='Update Test';
        $this->load->view('admin_header/header',$data);
        $this->load->view('admin_menubar/menu_bar');
        $this->load->view('predefined_test/update_test');
        $this->load->view('footer');
        $this->load->view('predefined_test/add_test_modals');
        $this->load->view('predefined_test/get_testpanellist_js');
        $this->load->view('predefined_test/update_test_js',$data);
        $this->load->view('predefined_test/parameter_details_js');
        $this->load->view('predefined_test/add_range_js');
        $this->load->view('predefined_test/category_js');
        $this->load->view('predefined_test/unit_js');
        $this->load->view('predefined_test/outsource_lab_js');
        $this->load->view('predefined_test/set_update_test_js',$data);
    }
    
    public function testPredefinedDatabase() {
        $data['title']='Test Database';
        $this->load->view('admin_header/header',$data);
        $this->load->view('admin_menubar/menu_bar');
        $this->load->view('predefined_test/test_database');
        $this->load->view('footer');
        $this->load->view('predefined_test/test_database_js');
    }


    public function createPackage($id=0)
    {
        $data['pkgId']=$id;
        $data['title']='Create Package';
        $this->load->view('admin_header/header',$data);
        $this->load->view('admin_menubar/menu_bar');
        $this->load->view('admin_package/create_package');
        $this->load->view('footer');
        $this->load->view('admin_package/create_package_js');
        $this->load->view('admin_package/setpkgDetails',$data);
    }


    public function package()
    {
        $data['title']='Package';
        $this->load->view('admin_header/header',$data);
        $this->load->view('admin_menubar/menu_bar');
        $this->load->view('admin_package/package');
        $this->load->view('footer');
        $this->load->view('admin_package/package_js');
    }
  

    public function testPanel()
    {
      $data['title']='Test Panel';
      $this->load->view('admin_header/header',$data);
      $this->load->view('admin_menubar/menu_bar');
      $this->load->view('admin_testpanel/test_panel',$data);
      $this->load->view('footer');
      $this->load->view('admin_testpanel/test_panel_js');
    }
  
    public function addTestPanel() {
      $data['title']='Add Test Parameter';
      $this->load->view('admin_header/header',$data);
      $this->load->view('admin_menubar/menu_bar');
      $this->load->view('admin_testpanel/add_test');
      $this->load->view('footer');
      $this->load->view('admin_testpanel/add_test_modals');
      $this->load->view('admin_testpanel/add_test_js');
      $this->load->view('admin_testpanel/parameter_details_js');
      $this->load->view('admin_testpanel/add_range_js');
      
      $this->load->view('admin_testpanel/unit_js');
      
  }
  
  
  public function updateTestPanel($id) {
      $data['id']=$id;
      $data['title']='Update Test';
      $this->load->view('admin_header/header',$data);
      $this->load->view('admin_menubar/menu_bar');
      $this->load->view('admin_testpanel/update_test');
      $this->load->view('footer');
      $this->load->view('admin_testpanel/add_test_modals');
      $this->load->view('admin_testpanel/update_test_js',$data);
      $this->load->view('admin_testpanel/parameter_details_js');
      $this->load->view('admin_testpanel/add_range_js');
      
      $this->load->view('admin_testpanel/unit_js');
      
      $this->load->view('admin_testpanel/set_update_test_js',$data);
  }
  


}