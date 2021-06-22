<div class="modal fade bs-example-modal-lg" id="updateUserModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--form start-->
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">User Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form" id="updateUserForm">

                    <div class="box-body">
                        <h4 class="box-title text-info"><i class="ti-user mr-15"></i> User Info </h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Business Name</label>
                                    <input type="text" class="form-control" placeholder="Business Name" name="ubusiness_name" id="ubusiness_name">
                                    <input type="hidden" name="uId" id="uId">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Client Name</label>
                                    <input type="text" class="form-control" placeholder="Client Name" id="uowner_name" name="uowner_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Client E-mail</label>
                                    <input type="text" class="form-control" placeholder="Owner Email" id="uemailid" name="uemailid">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Contact Number 1</label>
                                    <input type="text" class="form-control" placeholder="Phone" id="ucontact1" name="ucontact1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Contact Number 2</label>
                                    <input type="text" class="form-control" placeholder="Phone" id="ucontact2" name="ucontact2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="addressline1">Address :</label>
                                    <input type="text" class="form-control" id="uaddress" name="uaddress"> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" placeholder="City" id="ucity" name="ucity">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Highway</label>
                                    <input type="text" class="form-control" placeholder="Highway" id="uhighway" name="uhighway">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Status</label>
                                    <div class="radio">
                                        <input name="uis_active" type="radio" id="uactive" value="1">
                                        <label for="uactive">Active</label>                    
                                    </div>
                                    <div class="radio">
                                        <input name="uis_active" type="radio" id="uinactive" value="0">
                                        <label for="uinactive">Inactive</label>   
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