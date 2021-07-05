<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Patient
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Examples</a></li>
        <li class="breadcrumb-item active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="">
        <div class="box-header with-border box">
          <center><h3 class="box-title">Create/Edit Patient</h3></center>

          
        </div>
        <div class="box-body">
        	<div class="row">
        		<div class="col-md-2">
        		</div>
        		<div class="col-md-8 box">
        			<div class="row" style="padding: 3%;">
        				<div class="col-md-2">
        					<div class="form-group">
								<div class="controls">
		        					<label>Patient id</label>
		        					<input type="text" name="maxChar" class="form-control" placeholder="" disabled="">
        						</div>
        					</div>
        				</div>
        				<div class="col-md-6">
        				</div>
        				<div class="col-md-4">
        					<div class="form-group">
	        					<center><img src="placeholder.png" class="img-fluid" style="width: 128px;"></center>
	        					<input type="file" class="form-control" name="" style="float: right;margin-bottom: 4%;">
        					</div>
        				</div>
        				<div class="col-md-2">
        					<div class="form-group">
								<label>Title</label>	
								<div class="input-group mb-3">
									<div class="input-group-append">
										<select class="form-control" id="">
											<option>Mr</option>
											<option>Mrs</option>
											<option>Smt</option>
										</select>
									</div>
									<button class="btn btn-success btn-xs">+</button>
								</div>
							</div>
        				</div>
        				<div class="col-md-3">
        					<label>First Name</label>
        					<input type="text" name="maxChar" class="form-control" placeholder="Enter First Name" required data-validation-required-message="This field is required">
        				</div>
        				<div class="col-md-3">
        					<label>Last Name</label>
        					<input type="text" name="maxChar" class="form-control" placeholder="Enter Last Name" required data-validation-required-message="This field is required">
        				</div>
        				<div class="col-md-4">
							<div class="form-group">
								<label>Gender</label><br>
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
								  <label class="form-check-label" for="inlineRadio1">Male</label>
								</div>
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
								  <label class="form-check-label" for="inlineRadio2">Female</label>
								</div>
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
								  <label class="form-check-label" for="inlineRadio2">Others</label>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<label>Aadhar No</label>
        					<input type="text" name="maxChar" class="form-control" placeholder="Enter Patient Aadhar No." required data-validation-required-message="This field is required">
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<div class="controls">
									<label>Date Of Birth</label>
									<input type="date" class="form-control" name="">
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Age</label>	
								<div class="input-group mb-3">
									<input type="text" class="form-control">
									<div class="input-group-append">
										<select class="form-control" id="">
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
									<input type="text" class="form-control" style="text-align: center;" placeholder="+91" disabled="">
									<div class="input-group-append">
										<input type="text" name="maxChar" class="form-control" placeholder="Enter Primary Mob. No." required data-validation-required-message="This field is required">
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Alternate Mobile No.</label>	
								<div class="input-group mb-3">
									<input type="text" style="text-align: center;" class="form-control" placeholder="+91" disabled="">
									<div class="input-group-append">
										<input type="text" name="maxChar" class="form-control" placeholder="Enter Alternate Mob. No." required data-validation-required-message="This field is required">
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Email</label>	
								<input type="email" class="form-control" name="">
							</div>
						</div>
						<div class="col-md-6">
							<label>Address</label>
							<textarea class="form-control"></textarea>
						</div>
					</div>
        			<center>
        				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-center">Search</button>
        				<button class="btn btn-success">Save</button> 
        			</center>
        			<br>
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