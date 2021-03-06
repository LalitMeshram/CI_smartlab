<?php 
$session_data=$this->session->userdata('lsesson');
if(!isset($session_data)){
    redirect(base_url('login'));
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
        <link rel="icon" href="../images/favicon.ico">

        <title>Smartlab-<?php echo $title;?></title>

        <!-- Bootstrap 4.1-->
        <link rel="stylesheet" href="<?php echo base_url() . 'resource/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css'; ?>">

        <!-- Bootstrap extend-->
        <link rel="stylesheet" href="<?php echo base_url() . 'resource/css/bootstrap-extend.css'; ?>">	

        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url() . 'resource/css/master_style.css'; ?>">

        <!-- horizontal menu style -->
        <link rel="stylesheet" href="<?php echo base_url() . 'resource/css/horizontal_menu_style.css'; ?>">

        <!-- SoftMaterial admin skins -->
        <link rel="stylesheet" href="<?php echo base_url() . 'resource/css/skins/_all-skins.css'; ?>">	

        <!--alerts CSS -->
        <link href="<?php echo base_url() . 'resource'; ?>/assets/vendor_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">

        <!-- Select2 -->
	<link rel="stylesheet" href="<?php echo base_url() .'resource/assets/vendor_components/select2/dist/css/select2.min.css';?>">	
        
    <!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() . 'resource'; ?>/css/master_style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .error{
                color: red;
            }
        </style>
    </head>
    <body class="hold-transition skin-blue layout-top-nav">
        <div id="loader"></div>
        <!-- Site wrapper -->
        <div class="wrapper">

            <header class="main-header">
                <div class="inside-header">
                    <!-- Logo -->
                    <a href="#" class="logo">
                        <!-- mini logo for sidebar mini 50x50 pixels -->
                        <b class="logo-mini">
                            <!--<span class="light-logo"><img src="<?php // echo base_url() . 'resource'; ?>/images/logo-light.png" alt="logo"></span>-->
                            <!--<span class="dark-logo"><img src="<?php // echo base_url() . 'resource'; ?>/images/logo-dark.png" alt="logo"></span>-->
                        </b>
                        <!-- logo for regular state and mobile devices -->
                        <span class="logo-lg text-white">
                            <!--<img src="<?php // echo base_url() . 'resource'; ?>/images/logo-light-text.png" alt="logo" class="light-logo">-->
                            <!--<img src="<?php // echo base_url() . 'resource'; ?>/images/logo-dark-text.png" alt="logo" class="dark-logo">-->
                            Smart Lab
                        </span>
                    </a>
                    <!-- Header Navbar -->
                    <nav class="navbar navbar-static-top">
                        <!-- Sidebar toggle button-->

                        <ul class="navbar-nav mr-auto mt-md-0">		
                           
                        </ul>	

                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
<!--
                                <li class="search-box">
                                    <a class="nav-link hidden-sm-down" href="javascript:void(0)"><i class="mdi mdi-magnify"></i></a>
                                    <form class="app-search" style="display: none;">
                                        <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                                    </form>
                                </li>			

                                 Messages 
                                <li class="dropdown messages-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="mdi mdi-email faa-horizontal animated"></i>
                                    </a>
                                    <ul class="dropdown-menu scale-up">
                                        <li class="header">You have 5 messages</li>
                                        <li>
                                             inner menu: contains the actual data 
                                            <ul class="menu inner-content-div">
                                                <li> start message 
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="../images/user2-160x160.jpg" class="rounded-circle" alt="User Image">
                                                        </div>
                                                        <div class="mail-contnet">
                                                            <h4>
                                                                Lorem Ipsum
                                                                <small><i class="fa fa-clock-o"></i> 15 mins</small>
                                                            </h4>
                                                            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                 end message 
                                                <li>
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="../../../images/user3-128x128.jpg" class="rounded-circle" alt="User Image">
                                                        </div>
                                                        <div class="mail-contnet">
                                                            <h4>
                                                                Nullam tempor
                                                                <small><i class="fa fa-clock-o"></i> 4 hours</small>
                                                            </h4>
                                                            <span>Curabitur facilisis erat quis metus congue viverra.</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="../../../images/user4-128x128.jpg" class="rounded-circle" alt="User Image">
                                                        </div>
                                                        <div class="mail-contnet">
                                                            <h4>
                                                                Proin venenatis
                                                                <small><i class="fa fa-clock-o"></i> Today</small>
                                                            </h4>
                                                            <span>Vestibulum nec ligula nec quam sodales rutrum sed luctus.</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="../../../images/user3-128x128.jpg" class="rounded-circle" alt="User Image">
                                                        </div>
                                                        <div class="mail-contnet">
                                                            <h4>
                                                                Praesent suscipit
                                                                <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                            </h4>
                                                            <span>Curabitur quis risus aliquet, luctus arcu nec, venenatis neque.</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="../../../images/user4-128x128.jpg" class="rounded-circle" alt="User Image">
                                                        </div>
                                                        <div class="mail-contnet">
                                                            <h4>
                                                                Donec tempor
                                                                <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                            </h4>
                                                            <span>Praesent vitae tellus eget nibh lacinia pretium.</span>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="footer"><a href="#">See all e-Mails</a></li>
                                    </ul>
                                </li>
                                 Notifications 
                                <li class="dropdown notifications-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="mdi mdi-bell faa-ring animated"></i>
                                    </a>
                                    <ul class="dropdown-menu scale-up">
                                        <li class="header">You have 7 notifications</li>
                                        <li>
                                             inner menu: contains the actual data 
                                            <ul class="menu inner-content-div">
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-users text-success"></i> Curabitur id eros quis nunc suscipit blandit.
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-warning text-warning"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere.
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-users text-red"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat.
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-shopping-cart text-success"></i> In gravida mauris et nisi
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-user text-danger"></i> Praesent eu lacus in libero dictum fermentum.
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-user text-danger"></i> Nunc fringilla lorem 
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-user text-danger"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="footer"><a href="#">View all</a></li>
                                    </ul>
                                </li>
                                 Tasks 
                                <li class="dropdown tasks-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="mdi mdi-message faa-vertical animated"></i>
                                    </a>
                                    <ul class="dropdown-menu scale-up">
                                        <li class="header">You have 6 tasks</li>
                                        <li>
                                             inner menu: contains the actual data 
                                            <ul class="menu inner-content-div">
                                                <li> Task item 
                                                    <a href="#">
                                                        <h3>
                                                            Lorem ipsum dolor sit amet
                                                            <small class="pull-right">30%</small>
                                                        </h3>
                                                        <div class="progress xs">
                                                            <div class="progress-bar progress-bar-aqua" style="width: 30%" role="progressbar"
                                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                                <span class="sr-only">30% Complete</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                 end task item 
                                                <li> Task item 
                                                    <a href="#">
                                                        <h3>
                                                            Vestibulum nec ligula
                                                            <small class="pull-right">20%</small>
                                                        </h3>
                                                        <div class="progress xs">
                                                            <div class="progress-bar progress-bar-danger" style="width: 20%" role="progressbar"
                                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                                <span class="sr-only">20% Complete</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                 end task item 
                                                <li> Task item 
                                                    <a href="#">
                                                        <h3>
                                                            Donec id leo ut ipsum
                                                            <small class="pull-right">70%</small>
                                                        </h3>
                                                        <div class="progress xs">
                                                            <div class="progress-bar progress-bar-light-blue" style="width: 70%" role="progressbar"
                                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                                <span class="sr-only">70% Complete</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                 end task item 
                                                <li> Task item 
                                                    <a href="#">
                                                        <h3>
                                                            Praesent vitae tellus
                                                            <small class="pull-right">40%</small>
                                                        </h3>
                                                        <div class="progress xs">
                                                            <div class="progress-bar progress-bar-yellow" style="width: 40%" role="progressbar"
                                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                                <span class="sr-only">40% Complete</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                 end task item 
                                                <li> Task item 
                                                    <a href="#">
                                                        <h3>
                                                            Nam varius sapien
                                                            <small class="pull-right">80%</small>
                                                        </h3>
                                                        <div class="progress xs">
                                                            <div class="progress-bar progress-bar-red" style="width: 80%" role="progressbar"
                                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                                <span class="sr-only">80% Complete</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                 end task item 
                                                <li> Task item 
                                                    <a href="#">
                                                        <h3>
                                                            Nunc fringilla
                                                            <small class="pull-right">90%</small>
                                                        </h3>
                                                        <div class="progress xs">
                                                            <div class="progress-bar progress-bar-primary" style="width: 90%" role="progressbar"
                                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                                <span class="sr-only">90% Complete</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                 end task item 
                                            </ul>
                                        </li>
                                        <li class="footer">
                                            <a href="#">View all tasks</a>
                                        </li>
                                    </ul>
                                </li>-->
                                <!-- User Account -->
                                <li class="dropdown user user-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="<?php echo base_url();?>resource/img/profile.png" class="user-image rounded-circle" alt="User Image">
                                    </a>
                                    <ul class="dropdown-menu scale-up">
                                        <!-- User image -->
                                        <li class="user-header">
                                            <img src="<?php echo base_url();?>resource/img/profile.png" class="float-left rounded-circle" alt="User Image">

                                            <p>
                                                <?php echo $session_data['username'];?>
                                                
                                                <small class="mb-5"><?php echo $session_data['emailid'];?></small>
                                                <!--<a href="#" class="btn btn-danger btn-sm btn-rounded">View Profile</a>-->
                                            </p>
                                        </li>
                                        <!-- Menu Body -->
                                        <li class="user-body">
                                            <div class="row no-gutters">
                                                <div class="col-12 text-left">
                                                    <a href="#"><i class="ion ion-person"></i> My Profile</a>
                                                </div>
                                                <div role="separator" class="divider col-12"></div>
                                                <div class="col-12 text-left">
                                                    <a href="<?php echo base_url();?>logout"><i class="fa fa-power-off"></i> Logout</a>
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
                </div> 
            </header>  
