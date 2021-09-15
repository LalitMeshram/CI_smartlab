<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Subscription Plans
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
                <center>
                    <h3 class="box-title">Create Subscription Plans</h3>
                </center>


            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="controls">
										<input type="hidden" id="packageId">
                                        <input type="text" name="plan_name" class="form-control"
                                            placeholder="Package Name" required
                                            data-validation-required-message="This field is required" id="plan_name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="controls">
                                        <input type="text" name="amount" class="form-control"
                                            placeholder="Package Amount" required
                                            data-validation-required-message="This field is required" id="amount">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" name="duration" class="form-control" placeholder="Duration"
                                            required data-validation-required-message="This field is required" id="duration">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary btn-sm">Days</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <center><label>Package Feature</label></center>
                                <select class="form-control" id="featureCombo">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>

                        <center><button class="btn btn-success" style="margin-top: 1%" id="addFeatureBtn">Add
                                Feature</button></center>

                        <br>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="featureTable">
                                    <thead>
                                        <tr>
                                            <th>Feature</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="featureList">
                                        <!-- <tr>
                                            <td>asdasi aasdas asdasdai afafaoi</td>
                                            <td><button class="btn btn-danger btn-xs">X</button></td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <center><button class="btn btn-success" id="savepkgBtn">Save Package</button></center>
                    </div>
                    <div class="col-md-3">
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
<!-- /.content-wrapper -->