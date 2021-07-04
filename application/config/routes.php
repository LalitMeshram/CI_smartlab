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
$route['lab_register_data/(:num)']     = 'LabController/lab_register_data/$1';
$route['lab_reg']                      = 'LabController/lab_reg';
$route['letter_head_details_register'] = 'LabController/letter_head_details_register';
$route['letter_head_details/(:num)']   = 'LabController/letter_head_details/$1';



$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;