 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editable Tables
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Tables</a></li>
        <li class="breadcrumb-item active">Editable Tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
      <div class="row">
		  	<div class="box">
		  		<div class="box-body">
		  			<center><h3>Add New Test</h3></center>
		  		</div>
		  	</div>	  
		  
		<div class="col-12">
		  	<div class="box">

                            <div class="box-body" style="background: url(<?php echo base_url();?>resource/img/add_test.jpg);">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<center><h5 class="box-title title">New Test Details</h5></center>
					</div>
				</div>
				<br>

				<div class="row">
					<div class="col-md-4">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
									<label>Category</label>
									<div class="input-group mb-3">
										<select class="form-control" id="">
											<option>option 1</option>
											<option>option 2</option>
											<option>option 3</option>
										</select>
										<div class="input-group-append">
											<button class="btn btn-primary btn-sm">Add New</button>	
										</div>
									</div>
									</div>		
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Test Name</label>
										<div class="controls">
											<input type="text" class="form-control" name="" placeholder="Enter Test Name">	
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
											<label>Short Name</label>
											<div class="controls">
												<input type="text" class="form-control" name="" placeholder="Enter Short Name">	
											</div>
									</div>	
								</div>
								<div class="col-md-6">
									<div class="form-group">
									<label>Test For</label>
									<div class="controls">
										<select class="form-control" id="">
											<option>Male</option>
											<option>Female</option>
											<option>All</option>
										</select>		
									</div>
									</div>	
								</div>
							</div>
					</div>
					<div class="col-md-4">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label>General Fees</label>
								<div class="controls">
									<input type="text" class="form-control" name="" placeholder="Enter General Fees">		
								</div>
							    </div>
							</div>
							<div class="col-md-6">
									<div class="form-group">
										<div class="controls">
											<div class="form-check"style="margin-top:16%;">
											  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
											  <label class="form-check-label" for="flexCheckDefault">
											    Outsource
											  </label>
											</div>		
										</div>
									</div>
							</div>
							<div class="col-md-12">
									<div class="form-group">
										<label>Lab Name</label>
										<div class="input-group mb-3">
											<select class="form-control" id="" disabled="">
												<option>option 1</option>
												<option>option 2</option>
												<option>option 3</option>
											</select>
											<div class="input-group-append">
												<button class="btn btn-primary btn-sm">Add New</button>	
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Outsource Amount</label>
										<div class="controls">
											<input type="text" class="form-control" name="" placeholder="Enter Outsource Amount" disabled="">		
										</div>
									</div>
								</div>
						</div>
						
						

					</div>
					
					<div class="col-md-4">	
						<div class="row">
								<div class="col-md-12">
									<div class="form-group">
									<label>Method</label>
									<div class="controls">
										<input type="text" class="form-control" name="" placeholder="Enter Method">		
									</div>
								</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
									<label>Instrument</label>
									<div class="controls">
										<input type="text" class="form-control" name="" placeholder="Enter Instrument">		
									</div>
									</div>
								</div>
						</div>
					</div>
				</div>
				</div>	

			</div>
			<hr>
			<div class="col-md-12">
	          <div class="">
	          	<div class="row">
					<div class="col-md-12">
						<center><h5 class="box-title title">Subtypes With Unit</h5></center>
					</div>
					
				</div>
	            
	            	
	            <!-- /.box-header -->
	            <div class="box-body">
	            <div class="row">
	            	<div class="col-md-2">
	            	</div>
	            	<div class="col-md-4">
	            		<div class="form-group">
							<label>Subtype</label>
							<div class="controls">
								<input type="text" class="form-control" name="" placeholder="Enter Subtype Name">		
							</div>
						</div>
	            	</div>
	            	<div class="col-md-3">
	            		<div class="form-group">
							<label>Unit</label>
							<div class="input-group mb-3">
									<select class="form-control" id="">
										<option>option 1</option>
										<option>option 2</option>
										<option>option 3</option>
									</select>
									<div class="input-group-append">
										<button class="btn btn-primary btn-sm">Add New</button>	
									</div>
							</div>
						</div>
	            	</div>
	            	<div class="col-md-1">
	            		<center><button class="btn btn-success subtype_add_button">Add</button></center>
	            	</div>
	            </div>
	         	<div class="row">
	         		<div class="col-md-2">
	         		</div>
	         		<div class="col-md-8">
	         			<div class="table-responsive box">
						  <table class="table table-bordered mb-0">
							  <tbody>
								<tr>
								  <th scope="col">Subtype</th>
								  <th scope="col">Unit</th>
								  <th scope="col">Action</th>
								</tr>
							  </tbody>
							  <tbody>
								<tr>
								  <td>PCO2</td>
								  <td>xyz </td>
								  <td><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button> <button class="btn btn-success btn-xs"><i class="fa fa-plus"></i></button></td>
								</tr>
								<tr>
								  <td>Total CO2 Contents (TCO2)</td>
								  <td>xyz</td>
								  <td><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></td>
								</tr>
								<tr>
								  <td>Total CO2 Contents (TCO2)</td>
								  <td>xyz</td>
								  <td><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></td>
								</tr>
							</tbody>
							</table>
						</div>
	         		</div>
	         		<div class="col-md-2">
	         		</div>
	         	</div>
	         	
	            </div>
	            <!-- /.box-body -->
	          </div>
	          <!-- /.box -->
	        </div>			  
          <center><button class="btn btn-success">Save</button></center>
          </div>
          
        </div>
		</div>  
		  
      </div>
		
	  <div class="row">
	  			
	  </div>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->