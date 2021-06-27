<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//login page ui
$route['default_controller'] = 'welcome';

//Center Registration master
$route['getcenters'] = 'UserMasterController/customers_list';
$route['center_reg'] = 'UserMasterController/center_reg';
$route['center_update'] = 'UserMasterController/center_update';
$route['center_deactivate/(:num)']='UserMasterController/center_deactivate/$1';

//Payment Registration of center
$route['do_payment'] = 'PaymentController/payment_center_reg';
$route['get_payments_by_center'] = 'PaymentController/payment_list';

//Packages of center
$route['get_packages'] = 'PackageController/package_list';

//login api
$route['login_auth']='LoginController/login_auth';
$route['logout']='LoginController/logout';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
