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
            
        </div>

       

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