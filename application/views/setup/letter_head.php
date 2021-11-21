<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Letter Head
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Setup</a></li>
            <li class="breadcrumb-item active">Letter Head</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <center><h3 class="box-title">Letter Head Generation</h3></center>


            </div>
            <div class="box-body">
                <div class="row">

                    <div class="col-md-8">
                        <form method="post" id="letterHeadForm">
                            <center><img src="<?php echo base_url(); ?>resource/img/letter_head.png" class="img-fluid" id="headerpre"></center>
                            <div class="form-group">
                                <div class="controls">
                                    <input type="file" name="header" id="header" class="form-control" onchange="loadFile(event, 'headerpre')">
                                </div>
                            </div>

                            <div class="row" style="margin-top: 30%;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <img src="<?php echo base_url(); ?>resource/img/sign.png" id="inchargesignpre"><br>
                                            <label>Lab Incharge Signature Image(size 130x60)</label>
                                            <input type="file" name="lab_incharge_sign" id="lab_incharge_sign" class="form-control" onchange="loadFile(event, 'inchargesignpre')">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <img src="<?php echo base_url(); ?>resource/img/sign.png" id="drsignpre"><br>
                                            <label>Doctor Signature Image(size 130x60) </label>
                                            <input type="file" name="doctor_sign" id="doctor_sign" class="form-control" onchange="loadFile(event, 'drsignpre')">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="text" name="lab_incharge_name" id="lab_incharge_name" class="form-control" placeholder="Lab Incharge Name" required data-validation-required-message="This field is required">
                                            <br>
                                        <textarea name="lab_incharge_degree" id="lab_incharge_degree" class="form-control" placeholder="Lab Incharge Degree" required data-validation-required-message="This field is required"></textarea>
                                            <!-- <input type="text" name="lab_incharge_degree" id="lab_incharge_degree" class="form-control" placeholder="Lab Incharge Degree" required data-validation-required-message="This field is required"> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="text" name="lab_doctor_name" id="lab_doctor_name" class="form-control" placeholder="Doctor Name">
                                            <br>
                                            <textarea  name="lab_doctor_degree" id="lab_doctor_degree" class="form-control" placeholder="Doctor Degree"></textarea>
                                            <!-- <input type="text" name="lab_doctor_degree" id="lab_doctor_degree" class="form-control" placeholder="Doctor Degree"> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <img src="<?php echo base_url(); ?>resource/img/footer.png" class="img-fluid" id="footerpre">
                                </div>
                                <div class="form-group">
                                    <div class="controls">
                                        <input type="file" name="footer" id="footer" class="form-control" onchange="loadFile(event, 'footerpre')">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <center><button class="btn btn-success" type="submit">Save</button></center>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <li>Upload letter head header of standard size (720x200) as mentioned on sample image</li>
                        <br>
                        <li>Soft Copies of lab incharge as well as the doctor can also be uploaded. This is optional field. The Signatures can also be done after getting the print out of report</li>
                        <br>
                        <li>Mention Lab Incharge Name as Well As Doctor's Name and Degree in the bottom text field given.</li>
                        <br>
                        <li>Upload letter head footer of standard size (720x100) as mentioned on sample image</li>
                    </div>
                </div>  
            </div>
            <!-- /.box-body -->

            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->