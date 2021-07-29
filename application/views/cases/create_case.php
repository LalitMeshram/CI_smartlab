 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create/Edit Case
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
		  
		<div class="col-12">
		  	<div class="box">

		<div class="box-body" style="background: url(create_case.jpg);">
		<div class="row">
			<div class="col-md-12">
				
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>Select Patient</label>
								
							<div class="input-group mb-4" >
                                                            <select class="form-control" id="patientId" name="patientId">
									
								</select>
								<div class="input-group-append">
									<!--<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_refferer">Add New</button>-->	
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Referrer</label>
								
							<div class="input-group mb-4">
                                                            <select class="form-control" id="referenceId" name="referenceId">
									
								</select>
								<div class="input-group-append">
									<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_refferer">Add New</button>	
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-3">	
						<div class="form-group">
							<label>Collection Center</label>
							<div class="controls">
                                                            <select class="form-control" id="collection_center" name="collection_center">
									<option>Home</option>
									<option>Lab</option>
									<option>Hospital</option>
								</select>	
							</div>
						</div>
					</div>
					<div class="col-md-3">	
						<div class="form-group">
							<label>Collection Source</label>
							<div class="controls">
                                                            <input type="text" class="form-control" name="collection_source" id="collection_source" placeholder="Enter Colection Source">		
							</div>
						</div>	
					</div>
					<div class="col-md-4">	
						<div class="form-group">
							<label>Select Test</label>
							<div class="input-group mb-3">
                                                            <select class="form-control" id="test" name="test">

                                                            </select>
								<div class="input-group-append">
									<!--<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_test">Add New</button>-->	
								</div>
							</div>
						</div>	
					</div>
					<div class="col-md-12">	
						<div class="form-group">
							<div class="controls">
                                                            <center><button class="btn btn-success" id="addTestbtn">Add</button></center>
							</div>
						</div>	
					</div>
				</div>
				<br>
					<div class="row">
						<div class="col-md-1">
						</div>
						<div class="col-md-10">
							<div class="table-responsive box">
                                                            <table class="table table-bordered mb-0" id="testTable">
								  <thead>
									<tr>
									  <th scope="col">Test Name</th>
									  <th scope="col">Category</th>
									  
									  <th scope="col">Fee</th>
									  <th scope="col" style="width: 10%;">Action</th>
									</tr>
								  </thead>
                                                                  <tbody id="testList">
                                                                      <tr id="trNaN">
                                                                          <td colspan="4" align="center">Data not present</td>
                                                                      </tr>
									</tbody>
								</table>
							</div>
							</div>
							<div class="col-md-1">
							</div>
					</div>
					<center>
					<div class="row">
						<div class="col-md-2">
						</div>
						<div class="col-md-4">
							<div class="table-responsive box">
							  <table class="table table-bordered mb-0">
								  <tbody>
									<tr>
									  <th>Total Billed Amount</th>
									  <td>Rs. 5000</td>
									</tr>
									<tr>
									  <th>Discount</th>
									  <td><input type="text" class="form-control" name=""></td>
									</tr>
									<tr>
									  <th>Amount Received</th>
									  <td><input type="text" class="form-control" name=""></td>
									</tr>
									<tr>
									  <th>Payment Mode</th>
									  <td>
									  	<select class="form-control" id="">
											<option>Cash</option>
											<option>Card</option>
											<option>Cheque</option>
											<option>UPI</option>
										</select>
										<input type="text" class="form-control" name="" style="margin-top: 3px;">
									  </td>
									</tr>
									<tr>
									  <th>Total Amount Received</th>
									  <td>Rs</td>
									</tr>
									<tr>
									  <th>Pending Amount</th>
									  <td>Rs</td>
									</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-md-4">
							<div class="table-responsive box">
							  <table class="table table-bordered mb-0">
								  <tbody>
									<tr>
									  <th>Outsourced Amount</th>
									  <td>Rs. 5000</td>
									</tr>
									<tr>
									  <th>My Profit</th>
									  <td>Rs. 5000</td>
									</tr>
									</tbody>
								</table>
							</div>
						</div>
	            	</div>
	            	</center>
	            </div>
	            <!-- /.box-body -->
	          </div>
	          <!-- /.box -->
	        <center><button class="btn btn-success">Save</button></center>
	        </div>			  
          
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