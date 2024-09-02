<?php include"inc/header.php"; ?>

	<div class="page-wrapper">
		<div class="page-content">

			<div class="row row-cols-1 row-cols-md-12 row-cols-xl-12">

				<?php  
					$do = isset($_GET['do']) ? $_GET['do'] : "Manage";

					if ( $do == "Manage" ) { ?>
						<!-- Top Icon -->
						<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
							<div class="breadcrumb-title pe-3">Comments Management</div>
							<div class="ps-3">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Comments Management</li>
									</ol>
								</nav>
							</div>					
						</div>
						<!-- Top Icon -->

						<h6 class="mb-3 text-uppercase">Manage All Comments</h6><hr>

						<!-- ########## START: MAIN BODY ########## -->
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table table-striped table-hover table-bordered" style="width:100%">
										<thead class="table-dark">
											<tr>
												<th>Sl.</th>
												<th>User Email</th>
												<th>User Phone</th>
												<th>Subject</th>
												<th>Comments</th>
												<th>Status</th>
												<th>Comments Date</th>
												<th>Action</th>
											</tr>
										</thead>

										<tbody>
											<?php  
												$readComment_sql = "SELECT * FROM comments ORDER BY id DESC";
												$readComment_query = mysqli_query( $db, $readComment_sql );
												$countData = mysqli_num_rows($readComment_query);

												if ($countData == 0) { ?>
													<div class="alert alert-warning text-center" role="alert">
													  Sorry! No Comments Found into the Database!
													</div>
												<?php }

												else{
													$i = 0;
													while ( $row = mysqli_fetch_assoc($readComment_query) ) {
															$id 			= $row['id'];
															$user_id 		= $row['user_id'];
															$user_number 	= $row['user_number'];
															$subject 		= $row['subject'];
															$comments 		= $row['comments'];
															$status 		= $row['status'];
															$cmt_date 		= $row['cmt_date'];
															$i++;
															?>
															<tr>
														      <th scope="row"><?php echo $i; ?></th>
														      <td scope="row"><?php echo $user_id; ?></td>
														      <td scope="row"><?php echo $user_number; ?></td>
														      <td scope="row"><?php echo substr($subject, 0, 15); ?>...</td>
														      
														      <td><?php echo substr($comments, 0, 15); ?>...</td>
														      <td>
														      	<?php  
																		if ($status == 1) { ?>
																			<span class="badge text-bg-success">Active</span>
																		<?php }
																		else if ($status == 0) { ?>
																			<span class="badge text-bg-danger">InActive</span>
																		<?php }
																	?>
														      </td>
														      <td><?php echo $cmt_date; ?></td>
														      <td>
																	<div class="action-btn">
																	  <ul>
																	    <li>
																	      <a href="comments.php?do=Edit&u_id=<?php echo $id; ?>"><i class="fa-solid fa-eye"></i></a>
																	    </li>
																	    <li>
																	      <a href="" data-bs-toggle="modal" data-bs-target="#postDel<?php echo $id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
																	    </li>
																	  </ul>
																	</div>

																	<!-- Modal Start -->
																	<!-- ########## START: MODAL PART ########## -->
										                        <div class="modal fade" id="postDel<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										                          <div class="modal-dialog">
										                            <div class="modal-content">

										                              <div class="modal-header">
										                                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa-regular fa-face-frown"></i> Are You Sure?? To Delete Comment!!</h1>

										                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										                              </div>

										                              <div class="modal-body">
										                                <div class="modal-btn">
										                                  <a href="comments.php?do=Delete&delCmntId=<?php echo $id; ?>" class="btn btn-danger me-3">Delete</a>
										                                  <a href="" class="btn btn-success" data-bs-dismiss="modal">Cancel</a>     
										                                </div>
										                              </div>

										                            </div>
										                          </div>
										                        </div>
										                        <!-- ########## END: MODAL PART ########## -->
																	<!-- Modal End -->
																</td>
														    </tr>
															<?php
													}
												}
												

											?>										    
										</tbody>
									</table>
							</div>
						</div>				
						<!-- ########## END: MAIN BODY ########## -->
					<?php }

					else  if ( $do == "Edit" ) {
						if (isset($_GET['u_id'])) {
							$up_cmnt =  $_GET['u_id'];
							$up_cmnt_sql = "SELECT * FROM comments WHERE id='$up_cmnt'";
							$up_cmnt_query = mysqli_query($db, $up_cmnt_sql);

							while ($row = mysqli_fetch_assoc($up_cmnt_query)) {
								$id 			= $row['id'];
								$user_id 		= $row['user_id'];
								$user_number 	= $row['user_number'];
								$subject 		= $row['subject'];
								$comments 		= $row['comments'];
								$status 		= $row['status'];
								$cmt_date 		= $row['cmt_date'];
								?>
								<!-- Top Icon -->
						<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
							<div class="breadcrumb-title pe-3">View Comments</div>
							<div class="ps-3">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">View Comments</li>
									</ol>
								</nav>
							</div>					
						</div>
						<!-- Top Icon -->

						<h6 class="mb-3 text-uppercase">View Comments Information</h6><hr>

						<!-- ########## START: MAIN BODY ########## -->
						<div class="card">
							<div class="card-body">
								<!-- ########## START: FORM ########## -->
								<form action="" method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="col-lg-6">
											<div class="mb-3">
												<label for="">User Email</label>
												<span class="form-control"><?php echo $user_id; ?></span>
											</div>

											<div class="mb-3">
												<label for="">User Phone</label>
												<span class="form-control"><?php echo $user_number; ?></span>
											</div>

											<div class="mb-3">
												<label for="">Comment Date</label>
												<span class="form-control"><?php echo $cmt_date; ?></span>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="mb-3">
												<label for="">Comments Subject</label>
												<span class="form-control"><?php echo $subject; ?></span>
											</div>

											<div class="mb-3">
												<label for="">Comments</label>
												<span class="form-control"><?php echo $comments; ?></span>
											</div>
										</div>

										
									</div>													
								</form>
								<!-- ########## END: FORM ########## -->
							</div>
						</div>				
						<!-- ########## END: MAIN BODY ########## -->
							<?php }
						}
					}

					else if ( $do == "Update" ) {
						if (isset($_POST['updateComment'])) {
							$commentId 		= mysqli_real_escape_string($db, $_POST['commentId']);			
							$status 		= mysqli_real_escape_string($db, $_POST['status']);

							$commentUpdate_sql = "UPDATE comments SET status='$status' WHERE cmt_id='$commentId' ";
							$commentUpdate_query = mysqli_query($db, $commentUpdate_sql);

							if ($commentUpdate_query) {
								header("Location: comments.php?do=Manage");
							}
							else {
								die("mysqli Error!" . mysqli_error($db));
							}
						}
					}

					else if ( $do == "Delete" ) {
						if (isset($_GET['delCmntId'])) {
							$deleteCmntData = $_GET['delCmntId'];
							$delete_Sql = "DELETE FROM comments WHERE id='$deleteCmntData'";
							$delete_query = mysqli_query($db, $delete_Sql);

							if ($delete_query) {
								header("Location: comments.php?do=Manage");
							}
							else {
								die("mysqli Error!" . mysqli_error($db));
							}
						}
					}

					else { ?>
						<div class="alert alert-info" role="alert">
						  404 Page Not Found. Sorry!! You are trying to wrong access.
						</div>
					<?php }
				?>

			</div>
		</div>
	</div>
	<!--end page wrapper -->
		
<?php include"inc/footer.php"; ?>	