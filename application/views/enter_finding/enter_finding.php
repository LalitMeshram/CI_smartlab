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
                    <center><h2 class="d-inline">INVOICE</h2></center>
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
            <div class="col-12 table-responsive">
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
            </div>



            <!-- /.col -->
        </div>
        <!-- /.row -->


    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
</div>
<!-- /.content-wrapper -->