<div class="modal fade bs-example-modal-lg" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--form start-->
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Product Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form" id="addProductForm" method="post">

                    <div class="box-body">
                        <h4 class="box-title text-info"><i class="fa fa-shopping-cart"></i> Product Info </h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><span class="error">*</span> Product Name</label>
                                    <input type="text" class="form-control" placeholder="Product Name" name="name" id="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Type</label>
                                    <select class="form-control" name="type" id="type">
                                        <option>ONLINE </option>
                                        <option>OFFLINE</option>
                                    </select>
                                </div>
                            </div>
                            <!--<div class="row">-->                       
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Technology</label>
                                    <select class="form-control" name="technology" id="technology">
                                        <option>PHP</option>
                                        <option>C#.NET</option>
                                        <option>JAVA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Description</label>
                                    <textarea rows="2" class="form-control" placeholder="Description" name="description" id="description"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-success">
                                        <input id="checkbox2" type="checkbox" name="web" id="web">
                                        <label for="checkbox2"> Web </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-success">
                                        <input id="checkbox3" type="checkbox" name="android" id="android">
                                        <label for="checkbox3"> Android </label>
                                    </div>
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