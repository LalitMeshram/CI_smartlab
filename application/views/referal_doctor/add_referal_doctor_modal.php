<!-- sample modal content -->
<div id="add_ref" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Refferal Doctor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" style="background: url(<?php echo base_url();?>resource/img/patient_registration.jpg);">
                <form method="post" id="refForm" action="#">
                    <div class="col-md-12">
                        <div class="row">
                            
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Title</label>	
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <select class="form-control" id="ref_title" name="ref_title">
                                                <option>Dr.</option>
                                                <option>Mr.</option>
                                                <option>Miss.</option>
                                                <option>Mrs.</option>
                                                <option>Smt.</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Dr. Name</label>
                                <input type="hidden" name="ref_id"  id="ref_id">
                                <input type="text" name="ref_name" class="form-control" placeholder="Enter Dr. Name" id="ref_name">
                            </div>
                            <div class="col-md-3">
                                <label>Degree</label>
                                <input type="text" name="ref_degree" id="ref_degree" class="form-control" placeholder="Enter Dr. Degree">
                            </div>
                            
                            <div class="col-md-4">
                                <label>Contact Number</label>
                                <input type="number" name="ref_contact" id="ref_contact" class="form-control" placeholder="Enter Contact No." minlength="10" maxlength="10">
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>	
                                    <input type="email" class="form-control" name="ref_email" id="ref_email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <textarea class="form-control" name="ref_address" id="ref_address" rows="1"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <center><button class="btn btn-info" type="submit">Save</button></center>

                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>