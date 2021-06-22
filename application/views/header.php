<?php
$session_data=$this->session->userdata();
if($session_data['loginSession']==NULL){
    redirect(base_url('/'));
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="<?php echo base_url() . 'resource/images/favicon.ico'; ?>">

        <title>Soulsoft-PMS </title>

        <!-- Bootstrap 4.1-->
        <link rel="stylesheet" href="<?php echo base_url() . 'resource/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css'; ?>">

        <!-- Bootstrap extend-->
        <link rel="stylesheet" href="<?php echo base_url() . 'resource/css/bootstrap-extend.css'; ?>">	

        <!-- Data Table-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'resource/assets/vendor_components/datatable/datatables.min.css' ?>"/>

        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url() . 'resource/css/master_style.css'; ?>">



        <!-- SoftMaterial admin skins -->
        <link rel="stylesheet" href="<?php echo base_url() . 'resource/css/skins/_all-skins.css'; ?>">	

        <style>
            .error{
                color: red;
            }
        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo">
                    <span class="text-white">PMS</span>
                </a>
                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top">

                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>	

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">

                            <li class="search-box">
                                <a class="nav-link hidden-sm-down" href="javascript:void(0)"><i class="mdi mdi-magnify"></i></a>
                                <form class="app-search" style="display: none;">
                                    <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                                </form>
                            </li>			

                            <!-- Messages -->
                            <li class="dropdown messages-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="mdi mdi-email faa-horizontal animated"></i>
                                </a>
                                <ul class="dropdown-menu scale-up">
                                    <li class="header">You have <span id="msgCount">0</span> messages</li>
                                    <li id="listNotify">
                                        <!-- inner menu: contains the actual data -->
                                        
                                            
                                            <!-- end message -->
                                           
                                        
                                    </li>
                                    <li class="footer"><a href="#">See all Notification</a></li>
                                </ul>
                            </li>
                           
                            <!-- User Account-->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo base_url(); ?>resource/images/avatar-custom.png" class="user-image rounded-circle" alt="User Image">
                                </a>
                                <ul class="dropdown-menu scale-up">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo base_url(); ?>resource/images/avatar-custom.png" class="float-left rounded-circle" alt="User Image">

                                        <p>
                                            <!--Lalit Meshram-->
                                            <?php
                                            echo $session_data['loginSession']['username'];
                                            
                                            ?>
                                            <small class="mb-5">
                                                <?php
                                            echo $session_data['loginSession']['userid'];
                                            
                                            ?>
                                                
                                            </small>
                                            <!--<a href="#" class="btn btn-danger btn-sm btn-rounded">View Profile</a>-->
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="row no-gutters">
                                            <div role="separator" class="divider col-12"></div>
                                            <div class="col-12 text-left">
                                                <a href="#"><i class="ti-settings"></i> Change Password</a>
                                            </div>
                                            <div role="separator" class="divider col-12"></div>
                                            <div class="col-12 text-left">
                                                <a href="<?php echo base_url('logout');?>"><i class="fa fa-power-off"></i> Logout</a>
                                            </div>				
                                        </div>
                                        <!-- /.row -->
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-cog fa-spin"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
