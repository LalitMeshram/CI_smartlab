 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             Invoice
             <small>Bill NO:<span id="billNo"></span></small>
         </h1>
         <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
             <li class="breadcrumb-item"><a href="#">Examples</a></li>
             <li class="breadcrumb-item active">Invoice</li>
         </ol>
     </section>

     <!-- Main content -->
     <section class="invoice printableArea">
         <!-- title row -->
         <div class="row">
             <div class="col-12">
                 <div class="page-header">
                     <center>
                         <h2 class="d-inline">INVOICE</h2>
                     </center>
                 </div>
             </div>
             <!-- /.col -->
         </div>
         <!-- info row -->
         <div class="row invoice-info">
             <!-- /.col -->
             <div class="col-sm-12 invoice-col">
                 <div class="invoice-details row mx-0 my-15">
                     <div class="col-md-4 col-lg-4">
                         <h6>Invoice No:<span id="invoiceNo"></span></h6>
                         <h6>Invoice Date: <span id="invoiceDate"></span></h6>
                         <!--<h6>PAN No.:<span id="panNo"></span> </h6>-->
                     </div>
                     <div class="col-md-4 col-lg-4">
                         <h6>Patient Id:<span id="patientId"></span> </h6>
                         <h6>Patient Name: <span id="pName"></span></h6>
                         <h6>Patient Gender:<span id="pGender"></span> </h6>
                     </div>
                     <div class="col-md-4 col-lg-4">
                         <h6>Reffered By:<span id="refBy"></span> </h6>
                         <h6>Mob No.: <span id="mobiNo"></span></h6>
                         <h6>Email:<span id="emailId"></span> </h6>
                     </div>
                 </div>
             </div>
             <!-- /.col -->
         </div>
         <!-- /.row -->

         <!-- Table row -->
         <div class="row" style="background: url(generate_invoice_bg.jpg);">
             <div class="col-6 table-responsive">
                 <center>
                     <h4 style="background-color: #fff;margin-top: 2%;"><b>Bill Details</b></h4>
                 </center>
                 <table class="table table-bordered" style="background-color: #ffffffd4;" id="testTable">
                     <thead>
                         <tr>

                             <th>Lab Investigations</th>
                             <th>Fee</th>
                         </tr>
                     </thead>
                     <tbody id="testList">


                     </tbody>
                 </table>
             </div>
             <div class="col-md-6">
                 <center>
                     <h4 style="background-color: #fff;margin-top: 2%;"><b>Payment History</b></h4>
                 </center>
                 <div class="table-responsive" style="background-color: #ffffffd4;">
                     <table class="table table-bordered" id="transactionTable">
                         <thead>
                             <tr>
                                 <th>Date</th>
                                 <th>Type</th>
                                 <th>Amount</th>
                                 <th>Received By</th>
                                 <th>Mode</th>
                             </tr>
                         </thead>
                         <tbody id="transactionList">

                         </tbody>
                     </table>
                 </div>
             </div>
             <div class="col-md-3">
                 <div class="row">
                     <div class="col-md-6">
                         <div class="form-group">
                             <a href="<?php echo base_url('RecieptController/pdfdetails/'.$caseId);?>" target="_blank"
                                 id="#printInvoice" class="btn btn-success" style="margin-right: 5px;">
                                 <i class="fa fa-print"></i> Print Invoice
                             </a>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-group">
                             <a href="#" id="enterFinding" class="btn btn-warning" style="margin-right: 5px;">
                                 <i class="fa fa-sticky-note-o"></i> Enter Findings
                             </a>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-group">
                             <a href="<?php echo base_url('update_case/'.$caseId);?>" class="btn btn-primary"
                                 style="margin-right: 5px;">
                                 <i class="fa fa-pencil-square-o"></i> Modify Case
                             </a>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-group">
                             <a href="<?php echo base_url('update_case/'.$caseId);?>" class="btn btn-danger"
                                 style="margin-right: 5px;">
                                 <i class="fa fa-money"></i> Get Pending
                             </a>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-md-3 text-right">
                 <div class="table-responsive">
                     <table class="table table-bordered">
                         <tbody>
                             <tr style="background: #1e9a9a; color: #fff;">
                                 <th>Total Amount</th>
                                 <th id="tamt">Rs.xyz</th>
                             </tr>
                         </tbody>
                         <tbody>
                             <tr style="background: #7faf1d; color: #fff;">
                                 <th>Paid Amount</th>
                                 <th id="paidamt">Rs.52.00</th>
                             </tr>
                             <tr style="background: #ec1414; color: #fff;">
                                 <th>Pending Amount</th>
                                 <th id="pamt">Rs.52.00</th>
                             </tr>

                         </tbody>
                     </table>
                 </div>
             </div>
             <!--        <div class="col-md-6" style="margin-bottom: 1%;">
        	<center><h4 style="background-color: #fff;margin-top: 2%;"><b>Recent Activity</b></h4></center>
        	<div class="table-responsive" style="background-color: #ffffffd4;">
	          <table class="table table-bordered">
	            <tbody>
	            <tr>
	              <th>Date</th>
	              <th>Time</th>
	              <th>Summary</th>
	              <th>Done By</th>
	            </tr>
	            </tbody>
	            <tbody>
	            <tr>
	              <td>XYZ</td>
	              <td>XYZ</td>
	              <td>XYZ</td>
	              <td>XYZ</td>
	            </tr>
	            <tr>
	              <td>XYZ</td>
	              <td>XYZ</td>
	              <td>XYZ</td>
	              <td>XYZ</td>
	            </tr>
	            <tr>
	              <td>XYZ</td>
	              <td>XYZ</td>
	              <td>XYZ</td>
	              <td>XYZ</td>
	            </tr>
	            </tbody>
	          </table>
	        </div>
        </div>-->
             <!-- /.col -->
         </div>
         <!-- /.row -->

         <div class="row">


             <!-- /.col -->
         </div>
         <!-- /.row -->
     </section>
     <!-- /.content -->
     <div class="clearfix"></div>
 </div>
 <!-- /.content-wrapper -->