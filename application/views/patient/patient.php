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
		  			<center><h3>Patient List</h3></center>
		  		</div>
		  	</div>	  
		  
		<div class="col-12">
		  	<div class="box">
				<div class="box-body">
					<!--<button class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#myModal">Add New</button>-->
                                        <button class="btn btn-success" style="float: right;" id="addNew">Add New</button>
					  <div class="table-responsive">
						<table id="patientList" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Patient Id</th>
									<th>Name</th>
									<th>Gender</th>
									<th>Aadhar No</th>
									<th>Age</th>
									<th>Mobile No</th>
									<th>Email</th>
									<th>Action</th>
								</tr>
							</thead>
                                                        <tbody id="patientData">
<!--								<tr>
									<td>1111</td>
									<td>Darsh</td>
									<td>Male</td>
									<td>9009</td>
									<td>30</td>
									<td><a href="tel:7058420909">7058420909</a></td>
									<td><a href="mailto:darshanvnikumbh@gmail.com">darshanvnikumbh@gmail.com</a></td>
									<td>
                                                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i>
                                                                            </button> <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></td>
								</tr>-->
								
								
							</tbody>
							<tfoot>
								<tr>
									<th>Patient Id</th>
									<th>Name</th>
									<th>Gender</th>
									<th>Aadhar No</th>
									<th>Age</th>
									<th>Mobile No</th>
									<th>Email</th>
									<th>Action</th>
								</tr>
							</tfoot>
						  </table>
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
  
  
  
  