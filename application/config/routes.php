<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//login page ui
$route['default_controller'] = 'welcome';
$route['reciept']            = 'admin/AdminController/load_reciept';
$route['pricing']            = 'admin/AdminController/pricing';
$route['dashboard']          = 'admin/AdminController/dashboard';
$route['lab_registration']   = 'admin/AdminController/labRegistration';
$route['login']              = 'admin/AdminController/userLogin';
$route['registration']       = 'admin/AdminController/userRegistration';
$route['letter_head']        = 'admin/AdminController/letterHead';
//deprecated use add_test
$route['add_test_deprecated']           = 'admin/AdminController/addTest';
//modified add test
$route['add_test']           = 'admin/AdminController/modifyAddTest';
//deprecated use update test
$route['update_test_deprecated/(:num)']           = 'admin/AdminController/updateTest/$1';
//modify update test
$route['update_test/(:num)']           = 'admin/AdminController/modifyUpdateTest/$1';
//deprecated use test_database
$route['test_database_deprecated']      = 'admin/AdminController/testDatabase';
//modified test_database
$route['test_database']      = 'admin/AdminController/modifyTestDatabase';

$route['patient']      = 'admin/AdminController/patient';
$route['create_case']      = 'admin/AdminController/createCase';
$route['update_case/(:num)']      = 'admin/AdminController/updateCase/$1';
$route['invoice/(:num)']      = 'admin/AdminController/invoice/$1';
$route['all_cases']      = 'admin/AdminController/allCases';
$route['lab_category']      = 'admin/AdminController/labCategory';
$route['lab_unit']      = 'admin/AdminController/labUnit';
$route['outsource_lab']      = 'admin/AdminController/outsourceLab';
$route['all_receipt']      = 'admin/AdminController/allReceipt';
$route['referal_doctor']      = 'admin/AdminController/referalDoctor';
$route['enter_finding/(:num)']      = 'admin/AdminController/enterFinding/$1';
$route['test_panel']      = 'admin/AdminController/testPanel';
$route['add_test_panel']           = 'admin/AdminController/addTestPanel';
$route['update_test_panel/(:num)']           = 'admin/AdminController/updateTestPanel/$1';
//Admin login
$route['adminLogin']='admin/AdminLoginController/adminLogin';
$route['adminDashboard']='admin/AdminLoginController/adminDashboard';
$route['add_predefined_test']           = 'admin/AdminLogincontroller/addPredefinedTest';
$route['update_predefined_test/(:num)']           = 'admin/AdminLogincontroller/updatePredefinedTest/$1';
$route['test_predefined_database']      = 'admin/AdminLogincontroller/testPredefinedDatabase';
$route['predefined_category']      = 'admin/AdminLogincontroller/predefinedCategory';
$route['predefined_unit']      = 'admin/AdminLogincontroller/predefinedUnit';
$route['create_package']='admin/AdminLogincontroller/createPackage';
$route['create_package/(:num)']='admin/AdminLogincontroller/createPackage/$1';
$route['getPackage']='admin/AdminLogincontroller/package';
$route['admin_test_panel']      = 'admin/AdminLoginController/testPanel';
$route['admin_add_test_panel']           = 'admin/AdminLoginController/addTestPanel';
$route['admin_update_test_panel/(:num)']           = 'admin/AdminLoginController/updateTestPanel/$1';


$route['payment'] = 'Register/index';

//Center Registration master
$route['getcenters']               = 'UserMasterController/customers_list';
$route['center_reg']               = 'UserMasterController/center_reg';
$route['center_update']            = 'UserMasterController/center_update';
$route['center_deactivate/(:num)'] = 'UserMasterController/center_deactivate/$1';

//Payment Registration of center
$route['do_payment']             = 'PaymentController/payment_center_reg';
$route['get_payments_by_center'] = 'PaymentController/payment_list';

//Packages of center
$route['get_packages'] = 'PackageController/package_list';
$route['add_package'] = 'PackageController/package_add';

//login api
$route['login_auth']                   = 'LoginController/login_auth';
$route['logout']                       = 'LoginController/logout';
//center setup
//get center detail respective centerid
$route['lab_register_data/(:num)']     = 'LabController/lab_register_data/$1';

//lab_reg use for insert and update center details
$route['lab_reg']                      = 'LabController/lab_reg';
$route['letter_head_details_register'] = 'LabController/letter_head_details_register';
$route['letter_head_details/(:num)']   = 'LabController/letter_head_details/$1';

//Patient Reg API
$route['patient_reg']             = 'PatientController/patient_reg';
$route['get_patients/(:num)']     = 'PatientController/patient_register_data/$1';
$route['get_patients']     = 'PatientController/patient_register_data';

//Center Test Master Controller
$route['get_center_tests/(:num)']     = 'TestController/test_list/$1';
$route['add_test_user'] = 'TestController/test_add';
$route['get_test_for_cases/(:num)'] = 'CaseController/test_for_cases/$1';

//Center category Controller
$route['get_center_category/(:num)'] = 'LabCategoryController/category_list/$1';
$route['add_center_category'] = 'LabCategoryController/add_lab_catgeory';

//Center Unit Controller
$route['get_center_unit/(:num)'] = 'LabUnitController/unit_list/$1';
$route['add_center_unit'] = 'LabUnitController/add_lab_units';

//Outsource Lab Controller
$route['outsource_lab_list/(:num)'] = 'OutsourceLabController/outsource_lab_list/$1';
$route['add_outsource_lab'] = 'OutsourceLabController/add_outsource_lab';

//Reference Controller
$route['ref_list/(:num)'] = 'LabRefController/ref_list/$1';
$route['add_ref'] = 'LabRefController/add_lab_ref';

//Cases Controller
$route['add_new_case'] = 'CaseController/case_add';
$route['get_all_cases_center/(:num)'] = 'CaseController/get_all_cases/$1';
$route['get_case_data/(:num)'] = 'CaseController/get_case_data/$1';
$route['get_pending_amount/(:num)'] = 'CaseController/update_pending/$1';

//Report Controller
$route['view_finding/(:num)'] = 'ReportController/enter_findings/$1';
$route['save_finding'] = 'ReportController/add_report';
$route['get_report_finding/(:num)'] = 'ReportController/get_submiited_report/$1';

//Admin Controller
$route['admin_login'] = 'AdminController/admin_login';
$route['admin_logout'] = 'AdminController/logout';
//Admin Test Master Controller
$route['get_lab_unit'] = 'UnitController/unit_list';
$route['add_lab_unit'] = 'UnitController/add_lab_units';
$route['get_lab_category'] = 'CategoryController/category_list';
$route['add_lab_category'] = 'CategoryController/add_lab_catgeory';

//DATE:11/10 below 4 for add panel test in admin
$route['get_panel_test_admin'] = 'AdminTestPanel/panel_list';
$route['add_panel_test_admin'] = "AdminTestPanel/panel_test_add";
$route['get_lab_tests']     = 'LabTestController_new/test_list';
$route['add_lab_test'] = 'LabTestController_new/test_add';

//RecieptController
$route['bill_reciept/(:num)'] = 'RecieptController/pdfdetails/$1';

//Test panel_list_get
$route['get_panel_test/(:num)'] = 'TestPanel/panel_list/$1';
$route['add_panel_test'] = "TestPanel/panel_test_add";

//after modified test controller database
$route['get_test_data_new/(:num)'] = "TestController_new/test_list/$1";
$route['add_test_data_new'] = "TestController_new/test_add";

//report sections
$route['get_business_report/(:num)'] = 'BusinessReportController/business_report/$1';
$route['get_profile_data/(:num)'] = 'LabController/profile_data/$1';

$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;
