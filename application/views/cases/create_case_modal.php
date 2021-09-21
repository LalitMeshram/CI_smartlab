<div id="add_refferer" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Add Referrer</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<form id="refForm" method="post">
					<div class="modal-body" style="background: url(add_referrer_bg.jpg);">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<label>Title</label>
										<select class="form-control" id="ref_title" name="ref_title">
										<option>Mr.</option>
                                                <option>Miss.</option>
                                                <option>Mrs.</option>
                                                <option>Smt.</option>
										</select>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Dr. Name</label>
											<div class="controls">
												<input type="text" class="form-control" placeholder="Enter First & Last Name" name="ref_name" id="ref_name">
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Degree</label>
											<div class="controls">
												<input type="text" class="form-control" placeholder=" Degree" name="ref_degree" id="ref_degree">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-5">
										<div class="form-group">
											<label>Mob No.</label>
											<div class="controls">
												<input type="number" placeholder="Enter Mobile" class="form-control" name="ref_contact" id="ref_contact">
											</div>
										</div>
									</div>
									<div class="col-md-7">
										<div class="form-group">
											<label>Email</label>
											<div class="controls">
												<input type="email" class="form-control" placeholder="Enter Mail Id" name="ref_email" id="ref_email">
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="form-group">
									<label>Address</label>
									<div class="controls">
									<textarea class="form-control" placeholder="Enter Full Address" name="ref_address" id="ref_address" rows="3"></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<center><button type="submit" class="btn btn-info waves-effect">Save</button></center>
					</div>
				</form>
			</div>
		</div>
	</div>	



	<div id="add_test" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Add New Test</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<form>
				<div class="modal-body" style="background: url(add_test.jpg);">
					<div class="row">
						<div class="col-md-3">
									<div class="form-group">
									<label>Category</label>
									<div class="input-group mb-3">
										<select class="form-control" id="">
											<option>option 1</option>
											<option>option 2</option>
											<option>option 3</option>
										</select>
									</div>
									</div>	
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Test Name</label>
										<div class="controls">
											<input type="text" class="form-control" name="" placeholder="Enter Test Name">	
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
											<label>Short Name</label>
											<div class="controls">
												<input type="text" class="form-control" name="" placeholder="Enter Short Name">	
											</div>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
									<label>Test For</label>
									<div class="controls">
										<select class="form-control" id="">
											<option>Male</option>
											<option>Female</option>
											<option>All</option>
										</select>		
									</div>
									</div>
								</div>
								<div class="col-md-3">
										<div class="form-group">
										<label>General Fees</label>
										<div class="controls">
											<input type="text" class="form-control" name="" placeholder="Enter General Fees">		
										</div>
									    </div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<div class="controls">
											<div class="form-check"style="margin-top:30%;">
											  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
											  <label class="form-check-label" for="flexCheckDefault">
											    Outsource
											  </label>
											</div>		
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Lab Name</label>
										<div class="input-group mb-3">
											<select class="form-control" id="" disabled="">
												<option>option 1</option>
												<option>option 2</option>
												<option>option 3</option>
											</select>
										</div>
									</div>
								</div>	
								<div class="col-md-3">
									<div class="form-group">
										<label>Outsource Amount</label>
										<div class="controls">
											<input type="text" class="form-control" name="" placeholder="Enter Outsource Fee" disabled="">		
										</div>
									</div>
								</div>
					</div>
				</div>
				<div class="modal-footer">
					<center><button type="button" class="btn btn-info waves-effect">Save</button></center>
				</div>
			</form>
			</div>
		</div>
	</div>							