<?php
/* include autoloader */
require_once 'dompdf/autoload.inc.php';
/* reference the Dompdf namespace */
use Dompdf\Dompdf;

/* instantiate and use the dompdf class */
$dompdf = new Dompdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../images/favicon.ico">

    <title>SoftMaterial admin - Dashboard  Invoice </title>
    <link rel="stylesheet" href="dompdf/style.css">
	
	<style>
		.table>tbody>tr>td, .table>tbody>tr>th{
		    border-top: 1px solid #fff;
		    padding: inherit;
			vertical-align: middle;
		}
		.parameter{
			padding-left: 3%!important;
		}
		.test_section{
			border-bottom: 1px solid;
			margin-bottom: 2%;
		}
		.report_title{
			border-bottom: 1px solid;
		}
	</style>
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

 <!-- Content Wrapper. Contains page content -->
  <div class="">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="">
    
      <!-- info row -->
      <div class="row invoice-info">
        <!-- /.col -->
        <div class="col-md-2">
        </div>
        <div class="col-sm-8 invoice-col invoice printableArea">
        	<center><img src="resource/img/letter_head.png" class="img-fluid"></center>
			<div class="invoice-details row mx-0 my-15" style="padding-left: 1%;">
            <div class="table-responsive">
              <table class="table">
                <tr>
                  <td>
                    <h6>Invoice No: 35125</h6>
                      <h6>Invoice Date: </h6>
                      <h6>PAN No.: </h6>
                    </td>
                  <td>
                    <h6>Patient Id: </h6>
                      <h6>Patient Name: </h6>
                      <h6>Patient Gender: </h6>
                  </td>
                  <td>
                    <h6>Reffered By: </h6>
                      <h6>Mob No.: </h6>
                      <h6>Email: </h6>
                  </td>
                </tr>
              </table>
            </div>
    			
    	</div>
			<div class="test_section">
				<div class="report_title">
					<center><h4 style="background-color: #fff;margin-top: 2%; font-weight: 800;">HAEMATOLOGY</h4></center>
					<center><h5 style="background-color: #fff; font-weight: 700;">CBC WITH ESR</h5></center>
				</div>
				<div class="table-responsive">
					<table class="table">
						<tr>
						<th>TEST</th>
						<th>VALUE</th>
						<th>UNIT</th>
						<th>REFERENCE</th>
					</tr>
					<tr>
						<td>Haemoglobin</td>
						<td>15</td>
						<td>xyz</td>
						<td>xyz</td>
					</tr>
					<tr>
						<td>Differential Leucocyte Count</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td class="parameter">Neutrophils</td>
						<td>xyz</td>
						<td>xyz</td>
						<td>xyz</td>
					</tr>
					<tr>
						<td class="parameter">Neutrophils</td>
						<td>xyz</td>
						<td>xyz</td>
						<td>xyz</td>
					</tr>
					<tr>
						<td class="parameter">Neutrophils</td>
						<td>xyz</td>
						<td>xyz</td>
						<td>xyz</td>
					</tr>	
					</table>
				</div>
			</div>
			<div class="test_section">
				<div class="report_title">
					<center><h4 style="background-color: #fff;margin-top: 2%; font-weight: 800;">HAEMATOLOGY</h4></center>
					<center><h5 style="background-color: #fff; font-weight: 700;">CBC WITH ESR</h5></center>
				</div>
				<div class="table-responsive">
					<table class="table">
						<tr>
						<th>TEST</th>
						<th>VALUE</th>
						<th>UNIT</th>
						<th>REFERENCE</th>
					</tr>
					<tr>
						<td>Haemoglobin</td>
						<td>15</td>
						<td>xyz</td>
						<td>xyz</td>
					</tr>
					<tr>
						<td>Differential Leucocyte Count</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td class="parameter">Neutrophils</td>
						<td>xyz</td>
						<td>xyz</td>
						<td>xyz</td>
					</tr>
					<tr>
						<td class="parameter">Neutrophils</td>
						<td>xyz</td>
						<td>xyz</td>
						<td>xyz</td>
					</tr>
					<tr>
						<td class="parameter">Neutrophils</td>
						<td>xyz</td>
						<td>xyz</td>
						<td>xyz</td>
					</tr>
					<tr>
						<td>Platelet</td>
						<td>15</td>
						<td>xyz</td>
						<td>xyz</td>
					</tr>
					<tr>
						<td>Total RBC</td>
						<td>15</td>
						<td>xyz</td>
						<td>xyz</td>
					</tr>	
					</table>
				</div>
			</div>






		<center><img src="resource/img/footer.png" class="img-fluid"></center>
		</div>
        <div class="col-md-2">
        </div>
        <div class="col-md-3">
        </div>
        
      <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->
 

  
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

	
</body>
</html>';
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