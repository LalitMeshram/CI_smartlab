<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//login page ui
$route['default_controller'] = 'welcome';
//dashboard ui
$route['dashboard']='admin/AdminController/dashboard';
//forgate password ui
$route['forgate-password']='welcome/forgate_password';
//reset password ui
$route['resetpassword']='welcome/reset_password';
//check mail expiration for reset password api
$route['checkmailexpire']='LoginController/checkemailexpire';



//forgate password rest mail link api
$route['send_resetpassword-link']='LoginController/forgate_password_link_sendmail';


//product
$route['products'] = 'ProductController/product';
$route['product-update'] = 'ProductController/product_update';
$route['products/(:num)']='ProductController/product/$1';

//user master
$route['user'] = 'UserMasterController/user';
$route['user-update'] = 'UserMasterController/user_update';
$route['user/(:num)']='UserMasterController/user/$1';

//user product mapping
$route['productMapping'] = 'UserProductMappingController/user_product';
$route['productMapping-update'] = 'UserProductMappingController/user_product_update';
$route['productMapping/(:num)']='UserProductMappingController/user_product/$1';


//user Amc Details
$route['amc'] = 'UserAmcDetailController/user_amc_detail';
$route['amc-update'] = 'UserAmcDetailController/user_amc_detail_update';
$route['amc/(:num)/(:num)']='UserAmcDetailController/user_amc_detail/$1/$2';

//product investment master
$route['investment']='ProductInvestmentController/investment';
$route['investment-update']='ProductInvestmentController/investment_update';
$route['investment/(:num)']='ProductInvestmentController/investment/$1';

//issue master
$route['issue']='IssueMasterController/issue';
$route['issue-update']='IssueMasterController/issue_update';
$route['issue/(:num)']='IssueMasterController/issue/$1';


//user ui
$route['user-list']='admin/AdminController/user';
$route['test']='admin/AdminController/index';

//product ui
$route['product-list']='admin/AdminController/product';
$route['test']='admin/AdminController/index';

//userProduct ui
$route['userProduct-list']='admin/AdminController/userProduct';
$route['test']='admin/AdminController/index';

//userProduct ui
$route['productInvestment-list']='admin/AdminController/productInvestment';
$route['test']='admin/AdminController/index';

//issueMaster ui
$route['issueMaster-list']='admin/AdminController/issueMaster';
$route['test']='admin/AdminController/index';

//cron job api
$route['expiry-alert']='CronjobController/amc_renewal_list';

//login api
$route['login_auth']='LoginController/login_auth';
$route['logout']='LoginController/logout';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
