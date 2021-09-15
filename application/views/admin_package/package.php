<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Package List
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active">Category List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="col-12">
                <div class="box">
                    <div class="box-body">
                        <!--<button class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#myModal">Add New</button>-->
                        <a href="<?php echo base_url();?>create_package" class="btn btn-success" style="float: right;">Add Package</a>
                        <div class="table-responsive">
                            <table id="pkgTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Package Id</th>
                                        <th>Package</th>
                                        <th>Duration</th>
                                        <th>Features</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="pkgList">



                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Package Id</th>
                                        <th>Package</th>
                                        <th>Duration</th>
                                        <th>Features</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->