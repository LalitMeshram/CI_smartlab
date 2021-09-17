<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class AdminController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CaseModel', 'case');
        $this->load->model('TestModel', 'test');
        $this->load->model('OutsourceLabModel', 'outsource');
    }
    public function index() {
//		$this->load->view('welcome_message');
        
    }

    public function load_reciept(){
        $data['title']='Receipt';
     $this->load->view('case_reciept',$data);
    //    $this->load->view('report_reciept');
    }
     
    public function pricing() {
        $data['title']='Pricing';
        $this->load->view('header',$data);
        $this->load->view('menu_bar');
        $this->load->view('pricing/pricing');
        $this->load->view('footer');
        $this->load->view('pricing/pricing_js');
    }
    public function dashboard() {
        $data['title']='Dashboard';
        $this->load->view('header',$data);
        $this->load->view('menu_bar');
        $this->load->view('dashboard/dashboard');
        $this->load->view('footer');
    }
    public function labRegistration() {
        $data['title']='Lab Registration';
        $this->load->view('header',$data);
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
        $data['title']='Letter Head';
        $this->load->view('header',$data);
        $this->load->view('menu_bar');
        $this->load->view('setup/letter_head');
        $this->load->view('footer');
        $this->load->view('setup/letter_head_js');
        $this->load->view('setup/get_letter_head_js');
    }
    public function addTest() {
        $data['title']='Add Test';
        $this->load->view('header',$data);
        $this->load->view('menu_bar');
        $this->load->view('add_test/add_test');
        $this->load->view('footer');
        $this->load->view('add_test/add_test_modals');
        $this->load->view('add_test/add_test_js');
        $this->load->view('add_test/parameter_details_js');
        $this->load->view('add_test/add_range_js');
        $this->load->view('add_test/category_js');
        $this->load->view('add_test/unit_js');
        $this->load->view('add_test/outsource_lab_js');
    }
    
    public function updateTest($id) {
        $data['id']=$id;
        $data['title']='Update Test';
        $this->load->view('header',$data);
        $this->load->view('menu_bar');
        $this->load->view('add_test/update_test');
        $this->load->view('footer');
        $this->load->view('add_test/add_test_modals');
        $this->load->view('add_test/update_test_js',$data);
        $this->load->view('add_test/parameter_details_js');
        $this->load->view('add_test/add_range_js');
        $this->load->view('add_test/category_js');
        $this->load->view('add_test/unit_js');
        $this->load->view('add_test/outsource_lab_js');
        $this->load->view('add_test/set_update_test_js',$data);
    }
    
    public function testDatabase() {
        $data['title']='Test Database';
        $this->load->view('header',$data);
        $this->load->view('menu_bar');
        $this->load->view('add_test/test_database');
        $this->load->view('footer');
        $this->load->view('add_test/test_database_js');
    }

    
    
    public function patient() {
        $data['title']='Patient';
        $this->load->view('header',$data);
        $this->load->view('menu_bar');
        $this->load->view('patient/patient');
        $this->load->view('footer');
        $this->load->view('patient/patient_registration_modal');
        $this->load->view('patient/patient_show_js');
        $this->load->view('patient/patient_registration_js');
        $this->load->view('patient/calculate_age_js');
    }
    public function createCase() {
        $data['title']='Create Case';
        $this->load->view('header',$data);
        $this->load->view('menu_bar');
        $this->load->view('cases/create_case');
        $this->load->view('cases/create_case_modal');
        $this->load->view('footer');
        $this->load->view('cases/get_patient_js');
        $this->load->view('cases/get_refferal_doctor_js');
        $this->load->view('cases/get_test_js');
        $this->load->view('cases/test_details_js');
        $this->load->view('cases/create_case_js');
        $this->load->view('cases/add_referrer_dr_js');
        $this->load->view('cases/paymentmode_js');
    }
    public function updateCase($id) {
        $data['caseId']=$id;
        $data['title']='Update Case';
        $this->load->view('header',$data);
        $this->load->view('menu_bar');
        $this->load->view('cases/update_case');
        $this->load->view('cases/create_case_modal');
        $this->load->view('footer');
        $this->load->view('cases/get_patient_js');
        $this->load->view('cases/get_refferal_doctor_js');
        $this->load->view('cases/get_test_js');
        $this->load->view('cases/test_details_js');
        $this->load->view('cases/create_case_js');
        $this->load->view('cases/update_case_js',$data);
    }
    
    
    
    public function invoice($id) {
        $data['caseId']=$id;
        $data['title']='Invoice';
        $this->load->view('header',$data);
        $this->load->view('menu_bar');
        $this->load->view('invoice/invoice');
        $this->load->view('footer');
        $this->load->view('invoice/invoice_js',$data);
    }
    public function allCases() {
        $data['title']='All Cases';
        $this->load->view('header',$data);
        $this->load->view('menu_bar');
        $this->load->view('cases/all_cases');
        $this->load->view('footer');
        $this->load->view('cases/all_cases_js');
    }
    
    public function labCategory() {
        $data['title']='Lab Category';
        $this->load->view('header',$data);
        $this->load->view('menu_bar');
        $this->load->view('lab_category/lab_category');
        $this->load->view('lab_category/add_category_modal');
        $this->load->view('footer');
        $this->load->view('lab_category/show_js');
        $this->load->view('lab_category/new_js');
    }
    
    public function labUnit() {
        $data['title']='Lab Unit';
        $this->load->view('header',$data);
        $this->load->view('menu_bar');
        $this->load->view('lab_unit/lab_unit');
        $this->load->view('lab_unit/add_unit_modal');
        $this->load->view('footer');
        $this->load->view('lab_unit/show_js');
        $this->load->view('lab_unit/new_js');
    }
    
    public function outsourceLab() {
        $data['title']='Outsource Lab';
        $this->load->view('header',$data);
        $this->load->view('menu_bar');
        $this->load->view('outsource_lab/outsource_lab');
        $this->load->view('outsource_lab/add_outsource_lab_modal');
        $this->load->view('footer');
        $this->load->view('outsource_lab/show_js');
        $this->load->view('outsource_lab/new_js');
    }
    
    public function referalDoctor() {
        $data['title']='Referal Doctor';
        $this->load->view('header',$data);
        $this->load->view('menu_bar');
        $this->load->view('referal_doctor/referal_doctor');
        $this->load->view('referal_doctor/add_referal_doctor_modal');
        $this->load->view('footer');
        $this->load->view('referal_doctor/show_js');
        $this->load->view('referal_doctor/new_js');
    }
    
    public function allReceipt() {
        $data['title']='All Receipt';
        $this->load->view('header',$data);
        $this->load->view('menu_bar');
        $this->load->view('all_receipt/show');
        $this->load->view('footer');
    }
    public function enterFinding($id) {
        $data['caseId']=$id;
        $data['title']='Enter finding';
        $this->load->view('header',$data);
        $this->load->view('menu_bar');
        $this->load->view('enter_finding/enter_finding',$data);
        $this->load->view('footer');
        $this->load->view('enter_finding/enter_finding_js',$data);
        $this->load->view('enter_finding/save_finding_js');
    }
    
}
