<div class="modal fade bs-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--form start-->
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">User Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <form class="form" id="addUserForm" method="post">
                    <div class="box-body">
                        <h4 class="box-title text-info"><i class="ti-user mr-15"></i> User Info </h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><span class="error">*</span>Business Name</label>
                                    <input type="text" class="form-control" placeholder="Business Name" id="business_name" name="business_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><span class="error">*</span>Client Name</label>
                                    <input type="text" class="form-control" placeholder="Client Name" id="owner_name" name="owner_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><span class="error">*</span>Client E-mail</label>
                                    <input type="text" class="form-control" placeholder="Owner Email" id="emailid" name="emailid">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Contact Number 1</label>
                                    <input type="text" class="form-control" placeholder="Phone" id="contact1" name="contact1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Contact Number 2</label>
                                    <input type="text" class="form-control" placeholder="Phone" id="contact2" name="contact2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="addressline1"><span class="error">*</span>Address :</label>
                                    <input type="text" class="form-control" id="address" name="address"> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><span class="error">*</span>City</label>
                                    <input type="text" class="form-control" placeholder="City" id="city" name="city">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Highway</label>
                                    <input type="text" class="form-control" placeholder="Highway" id="highway" name="highway">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Status</label>
                                    <div class="radio">
                                        <input name="is_active" type="radio" id="active" value="1" checked>
                                        <label for="active">Active</label>                    
                                    </div>
                                    <div class="radio">
                                        <input name="is_active" type="radio" id="inactive" value="0">
                                        <label for="inactive">Inactive</label>   
                                    </div>
                                </div>
                            </div>

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