<div class="modal fade bs-example-modal-lg" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--form start-->
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Issue Master Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form" id="addIssuemasterForm" method="post">

                    <div class="box-body"> 
                        <h4 class="box-title text-info"><i class="fa fa-shopping-cart"></i> Issue Master Info </h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Client Name</label>
                                    <select class="form-control" id="client_id" name="client_id">
                                        <!--                                        <option> Karan </option>
                                                                                <option> Shubham </option>
                                                                                <option> Somu </option>
                                                                                <option> Ravi </option>-->
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <select class="form-control" id="product_id" name="product_id">
                                        <!--                                        <option> Krushi </option>
                                                                                <option> abc </option>
                                                                                <option> Soul </option>
                                                                                <option> abcd </option>-->
                                    </select>
                                </div>
                            </div>

                            <!--<div class="row">-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Isuue</label>
                                    <textarea rows="2" class="form-control" placeholder="Isuue" id="issue" name="issue"></textarea>
                                </div>
                            </div>                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Call Date</label>
                                    <input type="date" class="form-control" id="call_date" name="call_date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Solution</label>
                                    <textarea rows="2" class="form-control" placeholder="Solution" id="solution" name="solution"></textarea>
                                </div>
                            </div>                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option> DONE </option>
                                        <option> RUNNING </option>
                                        <option> HOLD </option>
                                        <option> IDEAL </option>
                                        <option> PENDING </option>
                                        <option> REJECTED </option>
                                    </select>
                                </div>
                            </div>                                                       
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input type="date" name="close_date" id="close_date" class="form-control">
                                </div>
                            </div>

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
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

</div>