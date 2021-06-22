<div class="modal fade bs-example-modal-lg" id="updateProductinvestModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--form start-->
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Product Investment Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form" id="updateProductInvestForm" method="post">

                    <div class="box-body">
                        <h4 class="box-title text-info"><i class="fa fa-shopping-cart"></i> Product Investment Info </h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <select class="form-control" id="uproduct_id" name="uproduct_id">
                                        <!--                                        <option> krushi </option>
                                                                                <option> abc </option>
                                                                                <option> soulsoft </option>
                                                                                <option> abcd </option>-->
                                    </select>
                                    <input type="hidden" name="uId" id="uId">
                                </div>
                            </div>

                            <!--<div class="row">-->                       
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Development Points</label>
                                    <textarea rows="2" class="form-control" placeholder="Development Points" id="udev_point" name="udev_point"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" id="ustatus" name="ustatus">
                                        <option> DONE </option>
                                        <option> RUNNING </option>
                                        <option> HOLD </option>
                                        <option> CANCEL </option>
                                        <option> START </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Description</label>
                                    <textarea rows="2" class="form-control" placeholder="Description" id="udescription" name="udescription"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Dead Line</label>
                                    <input type="date" class="form-control" id="udeadline" name="udeadline">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Investment Amount</label>
                                    <input type="text" class="form-control" placeholder="Investment Amount" id="uinvestment" name="uinvestment">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="date" class="form-control" id="ustart_date" name="ustart_date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input type="date" class="form-control" name="uclose_date" id="uclose_date">
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