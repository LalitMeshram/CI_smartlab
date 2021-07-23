<div id="add_category" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
                                                    <form id="categoryForm" method="post" action="#">
							<div class="modal-body">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<div class="row">
										<div class="col-md-12">
											<center>
													<div class="controls">
                                                                                                                <input type="text" placeholder="Enter Category Name" class="form-control" name="category" id="category">
													</div>
											</center>
										</div>
									</div>
							</div>
							<div class="modal-footer">
                                                            <center><button type="submit" class="btn btn-info waves-effect">Save</button></center>
							</div>
							</form>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>


		<div id="add_lab" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
                                                    <form id="outsourceLabFrom" method="post">
							<div class="modal-body">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<div class="row">
										<div class="col-md-12">
											<center>
													<div class="controls">
														<input type="text" placeholder="Enter Outsource Lab Name" class="form-control" name="lab_name" id="lab_name">
													</div>
											</center>
										</div>
									</div>
							</div>
							<div class="modal-footer">
                                                            <center><button type="submit" class="btn btn-info waves-effect">Save</button></center>
							</div>
							</form>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>				



			<div id="add_unit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
                                                    <form id="unitForm" method="post">
							<div class="modal-body">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<div class="row">
										<div class="col-md-12">
											<center>
													<div class="controls">
                                                                                                            <input type="text" placeholder="Enter Unit" class="form-control" name="unit" id="unit">
													</div>
											</center>
										</div>
									</div>
							</div>
							<div class="modal-footer">
                                                            <center><button type="submit" class="btn btn-info waves-effect">Save</button></center>
							</div>
							</form>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>




<div id="add_range" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="myModalLabel">Add Range(Gender & Age Wise) - Parameter Name</h4>
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							</div>
							<div class="modal-body" style="background: url(subtype_range.jpg);">
								<!--<form>-->
                                                                <input type="hidden" id="param_subtype_id">
									<div class="row">
										<div class="col-md-2">
											<div class="form-group">
												<label>Gender</label>
												<div class="controls">
													<select class="form-control" id="rangGender">
                                                                                                            <option value="Male">Male</option>
                                                                                                            <option value="Female">Female</option>
                                                                                                            <option value="Other">Other</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-3">	
											<div class="form-group">
												<label>Min Age</label>	
												<div class="input-group mb-3">
                                                                                                    <input type="number" class="form-control" id="minAge">
													<div class="input-group-append">
														<select class="form-control" id="minAgePeriod">
															<option>Days</option>
															<option>Month</option>
															<option>Year</option>
													</select>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-3">	
											<div class="form-group">
												<label>Max Age</label>
												<div class="input-group mb-3">
                                                                                                    <input type="number" class="form-control" id="maxAge">
													<div class="input-group-append">
														<select class="form-control" id="maxAgePeriod">
															<option>Days</option>
															<option>Month</option>
															<option>Year</option>
													</select>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-2">	
											<div class="form-group">
												<label>Lower</label>
												<div class="controls">
                                                                                                    <input type="text" class="form-control" id="lower">
												</div>
											</div>
										</div>
										<div class="col-md-2">	
											<div class="form-group">
												<label>Upper</label>
												<div class="controls">
                                                                                                    <input type="text" class="form-control" id="upper">
												</div>
											</div>
										</div>
										<div class="col-md-3">
										</div>
										<div class="col-md-6">	
											<div class="form-group">
												<label>Words</label>
												<div class="controls">
                                                                                                    <textarea class="form-control" id="words"></textarea>
												</div>
											</div>
										</div>
										<div class="col-md-12">	
                                                                                    <center><button class="btn btn-primary" id="rangeDetailbtn">Add</button></center>
										</div>
									</div>
								<!--</form>-->
								<br>

									<div class="table-responsive box">
                                                                            <table class="table table-bordered mb-0" id="rangeTable">
										  <thead>
											<tr>
											  <th scope="col">Gender</th>
											  <th scope="col" >Min.Age</th>
											  <th scope="col" >Max.Age</th>
											  <th scope="col" >Upper</th>
											  <th scope="col" >Lower</th>
											  <th scope="col">Words</th>
											  <th scope="col">Action</th>
											</tr>
										  </thead>
                                                                                  <tbody id="rangeList">
											
										  </tbody>
										</table>
									</div>
							</div>
							<div class="modal-footer">
                                                            <center><button type="button" class="btn btn-info waves-effect" id="rangeSavebtn">Save</button></center>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>