<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//login page ui
$route['default_controller'] = 'welcome';
$route['reciept']            = 'admin/Admincontroller/load_reciept';
$route['pricing']            = 'admin/Admincontroller/pricing';
$route['dashboard']          = 'admin/Admincontroller/dashboard';
$route['lab_registration']   = 'admin/Admincontroller/labRegistration';
$route['login']              = 'admin/Admincontroller/userLogin';
$route['registration']       = 'admin/Admincontroller/userRegistration';
$route['letter_head']        = 'admin/Admincontroller/letterHead';
$route['add_test']           = 'admin/Admincontroller/addTest';
$route['update_test/(:num)']           = 'admin/Admincontroller/updateTest/$1';
$route['test_database']      = 'admin/Admincontroller/testDatabase';
$route['patient']      = 'admin/Admincontroller/patient';
$route['create_case']      = 'admin/Admincontroller/createCase';
$route['update_case/(:num)']      = 'admin/Admincontroller/updateCase/$1';
$route['invoice/(:num)']      = 'admin/Admincontroller/invoice/$1';
$route['all_cases']      = 'admin/Admincontroller/allCases';
$route['lab_category']      = 'admin/Admincontroller/labCategory';
$route['lab_unit']      = 'admin/Admincontroller/labUnit';
$route['outsource_lab']      = 'admin/Admincontroller/outsourceLab';
$route['all_receipt']      = 'admin/Admincontroller/allReceipt';
$route['referal_doctor']      = 'admin/Admincontroller/referalDoctor';
$route['enter_finding/(:num)']      = 'admin/Admincontroller/enterFinding/$1';
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

//Report Controller
$route['view_finding/(:num)'] = 'ReportController/enter_findings/$1';
$route['enter_finding'] = 'ReportController/add_report';

//Admin Controller
$route['admin_login'] = 'AdminController/admin_login';
$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;
