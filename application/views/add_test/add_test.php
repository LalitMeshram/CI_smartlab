<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add New Test
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Setup</a></li>
            <li class="breadcrumb-item active">Add Test</li>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <center>
                                                <h5 class="box-title title">New Test Details</h5>
                                            </center>
                                            <marquee direction="left">
                                                <blink>
                                                    <h6>At least one parameter is required to create a test
                                                        successfully. If parameter is not available, test name will be
                                                        used as parameter.</h6>
                                                </blink>
                                            </marquee>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Select Category</label>
                                                        <div class="input-group mb-3">
                                                            <select class="form-control" id="categoryId"
                                                                name="categoryId">

                                                            </select>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-primary btn-sm"
                                                                    data-toggle="modal" data-target="#add_category"
                                                                    type="button">Add New</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Test Name</label>
                                                        <div class="controls">
                                                            <input type="text" class="form-control" name="test_name"
                                                                id="test_name" placeholder="Enter Test Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Short Name</label>
                                                        <div class="controls">
                                                            <input type="text" class="form-control" name="short_name"
                                                                id="short_name" placeholder="Enter Short Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Test For</label>
                                                        <div class="controls">
                                                            <select class="form-control" id="gender" name="gender">
                                                                <option>Male</option>
                                                                <option>Female</option>
                                                                <option>All</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>General Fees</label>
                                                        <div class="controls">
                                                            <input type="text" class="form-control" name="fees"
                                                                id="fees" placeholder="Enter General Fees">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <div class="form-check" style="margin-top:16%;">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="outsourceCheck" name="outsourceCheck">
                                                                <label class="form-check-label" for="outsourceCheck">
                                                                    Outsource
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Select Lab Name</label>
                                                        <div class="input-group mb-3">
                                                            <select class="form-control" id="outsourcelabId"
                                                                name="outsourcelabId" disabled="">

                                                            </select>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-primary btn-sm"
                                                                    data-toggle="modal" data-target="#add_lab"
                                                                    type="button">Add New</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Outsource Amount</label>
                                                        <div class="controls">
                                                            <input type="text" class="form-control"
                                                                name="outsourcelabAmount" id="outsourcelabAmount"
                                                                placeholder="Enter Outsource Amount" disabled="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>

                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Method</label>
                                                        <div class="controls">
                                                            <input type="text" class="form-control" name="method"
                                                                id="method" placeholder="Enter Method">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Instrument</label>
                                                        <div class="controls">
                                                            <input type="text" class="form-control" name="instrument"
                                                                id="instrument" placeholder="Enter Instrument">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="col-md-12">
                                <div class="">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <center>
                                                <h5 class="box-title title">Parameter Details</h5>
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
                                                    <label>Parameter</label>
                                                    <div class="controls">
                                                        <input type="text" class="form-control" name="parameter"
                                                            id="parameter" placeholder="Enter Subtype Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Select Unit</label>
                                                    <div class="input-group mb-3">
                                                        <select class="form-control" id="unitId" name="unitId">

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
                                                                <th scope="col">Subtype</th>
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
                                                            <textarea id="editor1" name="desc_text" rows="10" cols="58">
                                            
                    </textarea>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /.box -->

                                            </div>
                                        </div>
                                        <!-- ck Editor -->
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