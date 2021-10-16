<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            Case ID:<span id="caseId"><?php echo $caseId;?></span>
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Case</a></li>
            <li class="breadcrumb-item active">Enter Findings</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="invoice printableArea">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <div class="page-header">
                    <center>
                        <h2 class="d-inline">Enter Findings</h2>
                        <input type="hidden" name="reportId" id="reportId">
                    </center>
                </div>
            </div>
            <!-- /.col -->
        </div>

        <!-- Table row -->
        <div id="testList">
            
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
        </div>
        <!--/. row -->

        <!-- ck editor -->
                                        <div class="row">
                                            <div class="col-md-2">
                                            </div>
                                            <div class="col-md-8">

                                                <div class="box">
                                                    <div class="box-header">
                                                        <h4 class="box-title">Other Details<br>
                                                            <!-- <small>Advanced and full of features</small> -->
                                                        </h4>
                                                        <!-- <ul class="box-controls pull-right">
                                                            <li><a class="box-btn-close" href="#"></a></li>
                                                            <li><a class="box-btn-slide" href="#"></a></li>
                                                            <li><a class="box-btn-fullscreen" href="#"></a></li>
                                                        </ul> -->
                                                    </div>
                                                    <!-- /.box-header -->
                                                    <div class="box-body">
                                                        <form>
                                                            <textarea id="editor1" name="findingDetails" rows="10" cols="58">
                                            
                    </textarea>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /.box -->

                                            </div>
                                        </div>
                                        <!-- ck Editor -->



        <!-- /.row -->
        <div class="row">

            <div class="col-12 text-center">
                <button class="btn btn-success" type="button" id="saveFinding">Save</button>
            </div>

        </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
</div>
<!-- /.content-wrapper -->