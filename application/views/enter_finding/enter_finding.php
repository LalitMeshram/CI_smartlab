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
            <li class="breadcrumb-item active">Invoice Details</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="invoice printableArea">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <div class="page-header">
                    <center>
                        <h2 class="d-inline">INVOICE Details</h2>
                    </center>
                </div>
            </div>
            <!-- /.col -->
        </div>

        <!-- Table row -->
        <div class="row" id="testList" style="background: url(generate_invoice_bg.jpg);">
            <!-- <div class="col-12 table-responsive">
                <center><h4 style="background-color: #fff;margin-top: 2%;"><b>Dermitology</b></h4></center>
                <table class="table with-border" style="background-color: #ffffffd4;" id="testTable">
                    <thead>
                        <tr>

                            <th style="width: 20%">Test</th>
                            <th style="width: 20%">Value</th>
                            <th style="width: 10%">Unit</th>
                            <th style="width: 10%">Reference</th>
                        </tr>
                    </thead>
                    <tbody id="testList">
                        <tr>
                            <td>Hemoglobin</td>
                            <td>
                                <div class="controls">
                                    <input type="text" placeholder="Enter value" class="form-control"  id="">
                                </div>
                            </td>
                            <td>kg</td>
                            <td>10-20</td>
                        </tr>
                        <tr>
                            <td>Hemoglobin</td>
                            <td>
                                <div class="controls">
                                    <input type="text" placeholder="Enter value" class="form-control"  id="">
                                </div>
                            </td>
                            <td>kg</td>
                            <td>10-20</td>
                        </tr>
                    </tbody>
                </table>
            <hr/>
            </div>
            <div class="col-12 table-responsive">
                <center><h4 style="background-color: #fff;margin-top: 2%;"><b>Hametology</b></h4></center>
                <table class="table with-border" style="background-color: #ffffffd4;" id="testTable">
                    <thead>
                        <tr>

                            <th style="width: 20%">Test</th>
                            <th style="width: 20%">Value</th>
                            <th style="width: 10%">Unit</th>
                            <th style="width: 10%">Reference</th>
                        </tr>
                    </thead>
                    <tbody id="testList">
                        <tr>
                            <td>Hemoglobin</td>
                            <td>
                                <div class="controls">
                                    <input type="text" placeholder="Enter value" class="form-control"  id="">
                                </div>
                            </td>
                            <td>kg</td>
                            <td>10-20</td>
                        </tr>
                        <tr>
                            <td>Hemoglobin</td>
                            <td>
                                <div class="controls">
                                    <input type="text" placeholder="Enter value" class="form-control"  id="">
                                </div>
                            </td>
                            <td>kg</td>
                            <td>10-20</td>
                        </tr>
                    </tbody>
                </table>
            </div> -->



            <!-- /.col -->
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