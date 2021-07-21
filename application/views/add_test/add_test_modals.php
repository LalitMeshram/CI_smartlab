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
							<form>
							<div class="modal-body">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<div class="row">
										<div class="col-md-12">
											<center>
													<div class="controls">
														<input type="text" placeholder="Enter Lab Name" class="form-control" name="">
													</div>
											</center>
										</div>
									</div>
							</div>
							<div class="modal-footer">
								<center><button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Save</button></center>
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
							<form>
							<div class="modal-body">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<div class="row">
										<div class="col-md-12">
											<center>
													<div class="controls">
														<input type="text" placeholder="Enter Unit" class="form-control" name="">
													</div>
											</center>
										</div>
									</div>
							</div>
							<div class="modal-footer">
								<center><button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Save</button></center>
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
								<form>
									<div class="row">
										<div class="col-md-2">
											<div class="form-group">
												<label>Gender</label>
												<div class="controls">
													<select class="form-control" id="">
														<option>option 1</option>
														<option>option 2</option>
														<option>option 3</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-3">	
											<div class="form-group">
												<label>Min Age</label>	
												<div class="input-group mb-3">
													<input type="text" class="form-control">
													<div class="input-group-append">
														<select class="form-control" id="">
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
													<input type="text" class="form-control">
													<div class="input-group-append">
														<select class="form-control" id="">
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
													<input type="text" class="form-control" name="">
												</div>
											</div>
										</div>
										<div class="col-md-2">	
											<div class="form-group">
												<label>Upper</label>
												<div class="controls">
													<input type="text" class="form-control" name="">
												</div>
											</div>
										</div>
										<div class="col-md-3">
										</div>
										<div class="col-md-6">	
											<div class="form-group">
												<label>Words</label>
												<div class="controls">
													<textarea class="form-control"></textarea>
												</div>
											</div>
										</div>
										<div class="col-md-12">	
													<center><button class="btn btn-primary">Add</button></center>
										</div>
									</div>
								</form>
								<br>

									<div class="table-responsive box">
									  <table class="table table-bordered mb-0">
										  <tbody>
											<tr>
											  <th scope="col">Gender</th>
											  <th scope="col" style="width: 14%;">Age</th>
											  <th scope="col" style="width: 15%;">Range</th>
											  <th scope="col">Words</th>
											  <th scope="col">Action</th>
											</tr>
										  </tbody>
										  <tbody>
											<tr>
											  <td>Male</td>
											  <td>xyz yr/mon/days</td>
											  <td>10-40 </td>
											  <td>xyz</td>
											  <td><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></td>
											</tr>
											<tr>
											  <td>Female</td>
											  <td>Thornton</td>
											  <td>@fat</td>
											  <td>xyz</td>
											</tr>
											<tr>
											  <td>Others</td>
											  <td>@twitter</td>
											  <td>xyz</td>
											</tr>
										  </tbody>
										</table>
									</div>
							</div>
							<div class="modal-footer">
								<center><button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Save</button></center>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>