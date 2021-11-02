<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Patient Registration</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" style="background: url(<?php echo base_url();?>resource/img/patient_registration.jpg);">
                <form method="post" id="patientRegForm" action="#">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2" >
                                <div class="form-group">
                                    <div class="controls" id="patientIdStatus">
                                        <label>Patient id</label>
                                        <input type="text" name="patientId" id="patientId" class="form-control" placeholder="" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <center><img src="<?php echo base_url();?>resource/img/placeholder.png" class="img-fluid" style="width: 128px; height: 128px;" id="profilepre"></center>
                                    <input type="file" class="form-control" name="patient_profile" style="float: right;margin-bottom: 4%;" onchange="loadFile(event, 'profilepre')">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Title</label>	
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <select class="form-control" id="placeholder.png" name="patient_title" id="patient_title">
                                                <option>Mr</option>
                                                <option>Mrs</option>
                                                <option>Smt</option>
                                            </select>
                                        </div>
                                        <!-- <button class="btn btn-success btn-xs">+</button> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" id="first_name" required >
                            </div>
                            <div class="col-md-3">
                                <label>Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter Last Name">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Gender</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="1" checked>
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="2">
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="others" value="3">
                                        <label class="form-check-label" for="others">Others</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Aadhar No</label>
                                <input type="text" name="aadhar_number" id="aadhar_number" class="form-control" placeholder="Enter Patient Aadhar No.">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="controls">
                                        <label>Date Of Birth</label>
                                        <input type="date" class="form-control" name="dob" id="dob" oninput="calculateAge()" max="<?php echo date("Y-m-d"); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Age</label>	
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="age" name="age" required>
                                        <div class="input-group-append">
                                            <select class="form-control" id="agestr">
                                                <option>Days</option>
                                                <option>Month</option>
                                                <option>Year</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mobile No.</label>	
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <input type="number" name="contact_number" id="contact_number" class="form-control" placeholder="Enter Primary Mob. No." minlength="10" maxlength="10" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Alternate Mobile No.</label>	
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <input type="number" name="alternate_number" id="alternate_number" class="form-control" placeholder="Enter Alternate Mob. No." minlength="10" maxlength="10">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>	
                                    <input type="email" class="form-control" name="emailId" id="emailId">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <textarea class="form-control" name="patient_address" id="patient_address"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <center><button class="btn btn-info" type="submit">Save</button></center>

                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>