<div class="modal fade bs-example-modal-lg" id="updateProductModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--form start-->
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Product Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
            <form class="form" id="updateProductForm">

                    <div class="box-body">
                        <h4 class="box-title text-info"><i class="fa fa-shopping-cart"></i> Product Info </h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" class="form-control" placeholder="Product Name" id="uname" name="uname">
                                    <input type="hidden" id="pId" name="pId">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Type</label>
                                    <select class="form-control" id="utype" name="utype">
                                        <option>ONLINE </option>
                                        <option>OFFLINE</option>
                                    </select>
                                </div>
                            </div>
                            <!--<div class="row">-->                       
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Technology</label>
                                    <select class="form-control" id="utechnology" name="utechnology">
                                        <option>C#.NET</option>
                                        <option>PHP</option>
                                        <option>JAVA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Description</label>
                                    <textarea rows="2" class="form-control" placeholder="" id="udescription" name="udescription"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-success">
                                        <input id="uweb" name="uweb" type="checkbox">
                                        <label for="uweb"> Web </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-success">
                                        <input id="uandroid" name="uandroid" type="checkbox">
                                        <label for="uandroid"> Android </label>
                                    </div>
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