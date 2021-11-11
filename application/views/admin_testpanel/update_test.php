<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Update Test Parameter
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Setup</a></li>
            <li class="breadcrumb-item active">Update Test Parameter</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <form id="addTestForm" method="post">
            <div class="row">


                <div class="col-12">
                    <div class="box">

                        <div class="box-body"
                            style="background: url(<?php echo base_url()?>resource/img/add_test.jpg);">
                            
                            
                            <div class="col-md-12">
                                <div class="">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <center>
                                                <h5 class="box-title title">Test Parameter Details</h5>
                                            </center>
                                        </div>

                                    </div>


                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Parameter Name</label>
                                                    <div class="controls">
                                                        <input type="text" class="form-control" name="testName"
                                                            id="testName" placeholder="Enter Parameter Name">
															<input type="hidden" name="panelId" id="panelId">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Select Unit</label>
                                                    <div class="input-group mb-3">
                                                        <select class="form-control select2" id="unitId" name="unitId">

                                                        </select>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary btn-sm" data-toggle="modal"
                                                                data-target="#add_unit" type="button">Add New</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <center><button class="btn btn-success subtype_add_button"
                                                        id="addSubtypebtn" type="button">Add</button></center>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="table-responsive box">
                                                    <table class="table table-bordered mb-0" id="subtypeTable">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Parameter Name</th>
                                                                <th scope="col">Unit</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="subtypeList">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- /.box-body 
	          </div>
	          <!-- /.box -->
                                </div>
                                <center><button class="btn btn-success" type="submit">Save</button></center>
                            </div>

                        </div>
                    </div>

                </div>
        </form>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->