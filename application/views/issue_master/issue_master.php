<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Issue Master
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Master</a></li>
            <li class="breadcrumb-item active">Issue Master</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Issue Master List</h3>

                <ul class="box-controls pull-right">
                    <li><a class="box-btn-close" href="#"></a></li>
                    <li><a class="box-btn-slide" href="#"></a></li>	
                    <li><a class="box-btn-fullscreen" href="#"></a></li>
                </ul>
            </div>
            <div class="box-body">
                <!--table start-->
                <div class="col-12">         
                    <div class="box">
                        <div class="box-header with-border box-controls pull-right">
                            
                            <!--<div class="box-controls pull-right">-->
                                <!--<button id="row-count" class="btn btn-xs btn-primary">Row count</button>-->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal5" id="addIssuemaster">Add Issue Master</button>
                            <!--</div>-->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="issueTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Client Name</th>
                                            <th>Product Name</th>
                                            <th>Issue</th>
                                            <th>Status</th>
                                            <th>Call Date</th>                                            
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="issueList">
<!--                                        <tr>
                                            <td>1</td>
                                            <td>Rohit</td>
                                            <td>Krushi</td>
                                            <td>QUOTATION (GST) NOT WORK</td>
                                            <td>Running</td>                                            
                                            <td>3021-03-03</td>
                                            <td>2018-04-01</td>
                                            <td>CRUD</td>
                                        </tr>-->


                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Client Name</th>
                                            <th>Product Name</th>
                                            <th>Issue</th>
                                            <th>Status</th>
                                            <th>Call Date</th>                                            
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    
                    <!-- /.box -->          
                </div>
                <!--table end-->
            </div>
            <!-- /.box-body -->
            
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->