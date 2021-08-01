<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lab Registration
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Examples</a></li>
            <li class="breadcrumb-item active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <center><h3 class="box-title">Lab Registration</h3></center>


            </div>
            <div class="box-body">
                <div class="row">

                    <div class="col-md-8">
                        <form method="post" id="labRegForm">
                            <div class="form-group">
                                <div class="controls">
                                    <input type="text" name="labName" id="labName" class="form-control" placeholder="Laboratory Full Name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="text" name="brandName" id="brandName" class="form-control" placeholder="Brand Name (Max 10 Char) / Logo">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="file" name="file" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="email" name="lab_email" class="form-control" placeholder="Email Id">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="number" name="lab_contact" id="lab_contact" class="form-control" placeholder="Contact No.">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="text" name="lab_city" id="lab_city" class="form-control" placeholder="City">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <textarea name="lab_address" id="lab_address" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="text" name="lab_postalcode" id="lab_postalcode" class="form-control" placeholder="Postal code">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <center><button class="btn btn-success" type="submit">Save</button></center>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <li>"Laboratory Full Name" is to be shown on the invoice. So Mention Full Name Properly</li>
                        <br>
                        <li>"Brand Name" is optional, which is to be mentioned if logo is not available for your firm</li>
                        <br>
                        <li>Mobile No., Mail id and Address is expected to enter accurately, as this will also be displayed on invoice/bill</li>
                    </div>
                </div>  
            </div>
            <!-- /.box-body -->

            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<div id="loader"></div>
<!-- /.content-wrapper -->

