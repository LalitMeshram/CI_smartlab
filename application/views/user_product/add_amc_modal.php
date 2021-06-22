<div class="modal fade bs-example-modal-lg" id="addAmcModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--form start-->
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">User AMC Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <!--ul-->
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item" id="amcLi"> <a class="nav-link active" data-toggle="tab" href="#amcListTab" role="tab"><span class="hidden-sm-up"><i class="ion-home"></i></span> <span class="hidden-xs-down">AMC LIST</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#addAMCTab" role="tab"><span class="hidden-sm-up"><i class="ion-person"></i></span> <span class="hidden-xs-down">ADD AMC</span></a> </li>
                </ul>
                <!--ul-->
                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">
                    <!--amc list-->
                    <div class="tab-pane pad active" id="amcListTab" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>AMC DATE</th>
                                        <th>AMC AMOUNT</th>
                                        <th>DESCRIPTION</th>
                                    </tr>
                                </thead>
                                <tbody id="amctableList">
<!--                                    <tr>
                                        <td>Lorem Ipsum</td>
                                        <td>$158.00</td>
                                        <td>CH</td>
                                    </tr>-->
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!--amc list-->

                    <!--add amc details-->
                    <div class="tab-pane pad" id="addAMCTab" role="tabpanel">

                        <form class="form" id="addamcForm" method="post">

                            <div class="box-body">
                                <h4 class="box-title text-info"><i class="fa fa-shopping-cart"></i> User AMC Info </h4>
                                <hr class="my-15">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><span class="error">*</span>AMC Amount</label>
                                            <input type="text" class="form-control" placeholder="AMC Amount" id="amc_amount" name="amc_amount">
                                            <input type="hidden" class="form-control" id="upm_id" name="upm_id">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><span class="error">*</span>AMC Date</label>
                                            <input type="date" name="amc_date" class="form-control" id="amc_date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><span class="error">*</span>Description</label>
                                            <textarea rows="2" class="form-control" placeholder="Description" id="description" name="description"></textarea>
                                        </div>
                                    </div>
                                    <!--<div class="row">-->                       
                                    <!--</div>-->
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <div class="modal-footer text-right">
                                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary btn-outline">
                                    <i class="ti-save-alt"></i> Save
                                </button>
                            </div>
                        </form>
                        <!--form end-->

                    </div>
                </div>
                <!-- Tab panes -->




            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

</div>