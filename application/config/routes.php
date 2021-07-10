<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//login page ui
$route['default_controller'] = 'welcome';
$route['pricing']            = 'admin/Admincontroller/pricing';
$route['dashboard']          = 'admin/Admincontroller/dashboard';
$route['lab_registration']   = 'admin/Admincontroller/labRegistration';
$route['login']              = 'admin/Admincontroller/userLogin';
$route['registration']       = 'admin/Admincontroller/userRegistration';
$route['letter_head']        = 'admin/Admincontroller/letterHead';
$route['add_test']           = 'admin/Admincontroller/addTest';
$route['test_database']      = 'admin/Admincontroller/testDatabase';
$route['patient']      = 'admin/Admincontroller/patient';
$route['create_case']      = 'admin/Admincontroller/createCase';
$route['invoice']      = 'admin/Admincontroller/invoice';
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

//Center Test Master Controller
$route['get_center_tests/(:num)']     = 'TestController/test_list/$1';



$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;