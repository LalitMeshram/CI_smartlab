<?php
$session_data=$this->session->userdata('lsesson');
    if($session_data!=NULL){
//        redirect(base_url('/dashboard'));
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
        <!--<link rel="icon" href="../../../images/favicon.ico">-->

        <title>Smart Lab -Registration </title>

        <!-- Bootstrap 4.1-->
        <link rel="stylesheet" href="<?php echo base_url() . 'resource/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css'; ?>">

        <!-- Bootstrap extend-->
        <link rel="stylesheet" href="<?php echo base_url() . 'resource/css/bootstrap-extend.css'; ?>">	

        <!-- Data Table-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'resource/assets/vendor_components/datatable/datatables.min.css' ?>"/>

        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url() . 'resource/css/master_style.css'; ?>">

        <!--alerts CSS -->
        <link href="<?php echo base_url() . 'resource'; ?>/assets/vendor_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">


        <!-- SoftMaterial admin skins -->
        <link rel="stylesheet" href="<?php echo base_url() . 'resource/css/skins/_all-skins.css'; ?>">	
        <style>
            .error{
                color: red;
            }
            .errorTxt{
                border: 1px solid red;
                min-height: 20px;
            }
        </style>
    </head>


    <body class="hold-transition bg-img" style="background-image: url(<?php base_url() ?>resource/img/login_bg.jpg)" data-overlay="4">

        <div class="container h-p100">
            <div class="row align-items-center justify-content-md-center h-p100">

                <div class="col-lg-5 col-md-8 col-12">
                    <div class="content-top-agile">
                        <h2>Get started with Us</h2>
                        <p class="text-white">Register a new membership</p>
                    </div>
                    <div class="p-40 mt-10 content-bottom" style="background-color: #f0f8ffc2!important;">
                        <form id="register" method="post">
                            <div class="form-group col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info border-info"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Full Name" name="fullname" id="fullname">
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info border-info"><i class="ti-email"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Email" name="emailId" id="emailId">
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info border-info"><i class="ti-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info border-info"><i class="ti-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="Retype Password" name="upassword" id="upassword">
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info border-info"><i class="ti-mobile"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Mobile No." name="contact_number" id="contact_number">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="checkbox">
                                        <input type="checkbox" id="basic_checkbox_1" >
                                        <label for="basic_checkbox_1">I agree to the <a href="#" class="text-warning"><b>Terms</b></a></label>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-info btn-block margin-top-10">REGISTER</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>			

                        <div class="text-center">
                            <p class="mb-0">Already have an account?<a href="login.html" class="text-danger m-l-5"> Sign In</a></p>
                        </div>
                    </div>
                </div>


            </div>
        </div>


        <!-- jQuery 3 -->
        <script src="<?php echo base_url() . 'resource'; ?>/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>
        <script src="<?php echo base_url() . 'resource/js/ajax-jquery.js'; ?>"></script>
        <!-- popper --><script src="<?php echo base_url() . 'resource/js/jquery.validate.js'; ?>"></script>
        <script src="<?php echo base_url() . 'resource'; ?>/assets/vendor_components/popper/dist/popper.min.js"></script>

        <!-- Bootstrap 4.1-->
        <script src="<?php echo base_url() . 'resource'; ?>/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Sweet-Alert  -->
        <script src="<?php echo base_url() . 'resource'; ?>/assets/vendor_components/sweetalert/sweetalert.min.js"></script>
        <script src="<?php echo base_url() . 'resource'; ?>/assets/vendor_components/sweetalert/jquery.sweet-alert.custom.js"></script>

    </body>
</html>