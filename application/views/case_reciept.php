<?php
/* include autoloader */
require_once 'dompdf/autoload.inc.php';
/* reference the Dompdf namespace */
use Dompdf\Dompdf;

/* instantiate and use the dompdf class */
$dompdf = new Dompdf();

$html = '<link rel="stylesheet" href="dompdf/style.css">
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <div class="">

    <section class="">

      <div class="row invoice-info">
        <div class="col-md-2">
        </div>
        <div class="col-sm-8 invoice-col invoice printableArea">
        	<center><img src="resource/img/letter_head.png" class="img-fluid"></center>
			<div class="invoice-details row mx-0 my-15">
			  <div class="col-md-4 col-lg-4">
			  	<h6>Invoice No: 35125</h6>
			  	<h6>Invoice Date: </h6>
			  	<h6>PAN No.: </h6>
			  </div>
			  <div class="col-md-4 col-lg-4">
			  	<h6>Patient Id: </h6>
			  	<h6>Patient Name: </h6>
			  	<h6>Patient Gender: </h6>
			  </div>
			  <div class="col-md-4 col-lg-4">
			  	<h6>Reffered By: </h6>
			  	<h6>Mob No.: </h6>
			  	<h6>Email: </h6>
			  </div>
			</div>
			<div class="table-responsive">
					<center><h4 style="background-color: #fff;margin-top: 2%;"><b>Bill Details</b></h4></center>
		          <table class="table table-bordered" style="background-color: #ffffffd4;">
		            <tbody>
		            <tr>
		              <th>Lab Investigations</th>
		              <th>Fee</th>
		            </tr>
		            </tbody>
		            <tbody>
		            <tr>
		              <td>Milk Powder</td>
		              <td>$52.00</td>
		            </tr>
		            <tr>
		              <td>Milk Powder</td>
		              <td>$52.00</td>
		            </tr>
		            <tr>
		              <td>Milk Powder</td>
		              <td>$52.00</td>
		            </tr>
		            </tbody>
		          </table>
		        <div class="row">
		        	<div class="col-md-8">
			        </div>
			        <div class="col-md-4 text-right">	
			        	<div class="table-responsive">
				          <table class="table table-bordered">
				            <tbody>
				            <tr>
				              <th>Total Amount</th>
				              <th style="width: 40%;">Rs.xyz</th>
				            </tr>
				            </tbody>
				            <tbody>
				            <tr>
				              <th>Paid Amount</th>
				              <th>Rs.52.00</th>
				            </tr>
				            <tr>
				              <th>Pending Amount</th>
				              <th>Rs.52.00</th>
				            </tr>
				           
				            </tbody>
				          </table>
				        </div>		
			        </div>
		        </div>
		    </div>
		    <center><img src="resource/img/footer.png" class="img-fluid"></center>
		</div>
        <div class="col-md-2">
        </div>
        <div class="col-md-3">
		</div>
      </div>
      <div class="row">
      	<div class="col-md-2">
      	</div>
      	<div class="col-md-8 table-responsive">
        
        </div>
        <div class="col-md-2">
      	</div>
      </div>

      <div class="row">
        
        
      </div>
    </section>
    <div class="clearfix"></div>
  </div>
    <div class="control-sidebar-bg"></div>
</div>
</body>
</html>
';
set_time_limit(600);
$dompdf->setPaper('A4', 'portrait');

$dompdf->loadHtml($html);
/* Render the HTML as PDF */
$dompdf->render();

/* Output the generated PDF to Browser */
// $dompdf->stream();
$dompdf->stream("payment.pdf", array(
    "Attachment" => false
));
exit(0);
?> 