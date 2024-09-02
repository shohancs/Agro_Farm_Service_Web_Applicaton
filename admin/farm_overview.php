<?php  
	include "inc/header.php";
?>

<div class="page-wrapper">
	<div class="page-content">
		<?php  
			$do = isset($_GET['do']) ? $_GET['do'] : "Manage";

			if ( $do == "Manage" ) { ?>
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Farm Overview Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Farm Overview Manage</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Manage All Farm Overview</h6>
				<hr>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<div id="example3_wrapper" class="dataTables_wrapper dt-bootstrap5">
								<div class="row">
									<div class="col-sm-12">
									<table id="example3" class="table table-striped table-hover table-bordered dataTable" role="grid" aria-describedby="example3_info">
										<thead class="table-dark">
									    <tr>
									      <th scope="col">#Sl.</th>
									      <th scope="col">Image</th>
									      <th scope="col">Title</th>
									      <th scope="col">Description</th>
									      <th scope="col">Category</th>
									      <th scope="col">Status</th>
									      <th scope="col">Action</th>
									    </tr>
									  </thead>

									  <tbody>
									  	<?php  
											$overviewSql = "SELECT * FROM farm_overview WHERE ov_category=1 AND status=1 ORDER BY title ASC";
									  		$overviewQuery = mysqli_query( $db, $overviewSql );
									  		$overviewCount = mysqli_num_rows($overviewQuery);

									  		if ($overviewCount == 0) { ?>
									  			<div class="alert alert-warning text-center" role="alert">
												  Sorry! No Overview Found into the Database.
												</div>
									  		<?php }

									  		else {
									  			$i = 0;
										  		while ($row = mysqli_fetch_assoc($overviewQuery)) {
										  			$ov_id  		= $row['ov_id'];
										  			$title 			= $row['title'];
										  			$descrive 		= $row['descrive'];
										  			$ov_category 	= $row['ov_category'];
										  			$ov_image 		= $row['ov_image'];
										  			$status 		= $row['status'];
										  			$i++;
										  			?>

										  			<tr>
												      <th scope="row"><?php echo $i; ?></th>
												      <td>
												      	<?php  
												      		if (!empty($ov_image)) {
																echo '<img src="assets/images/overview_img/' . $ov_image . '" style="width: 60px";>';
															}
															else {
																echo 'No Image';
															}
												      	?>
												      </td>
												      <td><?php echo $title; ?></td>
												      <td><?php echo substr($descrive, 0, 15); ?>...</td>
												      <td>
												      	<?php  
												      		if ($ov_category == 1) { ?>
												      			<span class="badge text-bg-primary">PARENT CATEGORY</span>
												      		<?php }
												      	?>
												      </td>
												      <td>
												      	<?php  
												      		if ($status == 1) { ?>
												      			<span class="badge text-bg-info">ACTIVE</span>
												      		<?php }
												      		else if ($status == 0) { ?>
												      			<span class="badge text-bg-danger">INACTIVE</span>
												      		<?php }
												      	?>
												      </td>
												      <td>
												      	<div class="action-btn">
															<ul>
															    <li>
															      <a href="farm_overview.php?do=Edit&uId=<?php echo $ov_id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
															    </li>
															    <li>
															      <a href=""  data-bs-toggle="modal" data-bs-target="#uId<?php echo $ov_id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
															    </li>
															</ul>
														</div>

														<!-- Modal Start -->
														<div class="modal fade" id="uId<?php echo $ov_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
														  <div class="modal-dialog">
														    <div class="modal-content">
														      <div class="modal-header">
														        <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Sure?? To Move <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $title; ?></span> Trash folder!!</h1>
														        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														      </div>
														      <div class="modal-body">
														        <div class="modal-btn">
														        	<a href="farm_overview.php?do=Trash&tId=<?php echo $ov_id; ?>"class="btn btn-danger me-3">Trash</a>
														        	<a href="" class="btn btn-success" data-bs-dismiss="modal">Close</a>
														        </div>
														      </div>
														    </div>
														  </div>
														</div>
														<!-- Modal End -->

												      </td>
												    </tr>

										  			<?php

										  			// Sub Category Use Start
													$subOverviewSql = "SELECT * FROM farm_overview WHERE ov_category='$ov_id' AND status=1 ORDER BY title ASC";
													$subOverviewQuery = mysqli_query( $db, $subOverviewSql );
													$subOverviewCount = mysqli_num_rows($overviewQuery);

														while ($row = mysqli_fetch_assoc($subOverviewQuery)) {
															$ov_id  		= $row['ov_id'];
															$title 			= $row['title'];
															$descrive 		= $row['descrive'];
															$ov_category 	= $row['ov_category'];
															$ov_image 		= $row['ov_image'];
															$status 		= $row['status'];
															$i++;
															?>

															<tr>
														      <th scope="row"><?php echo $i; ?></th>
														      <td>
														      	<?php  
														      		if (!empty($ov_image)) {
																		echo '<img src="assets/images/overview_img/' . $ov_image . '" style="width: 60px";>';
																	}
																	else {
																		echo 'No Image';
																	}
														      	?>
														      </td>
														      <td> -- <?php echo $title; ?></td>
														      <td><?php echo substr($descrive, 0, 15); ?>...</td>
														      <td>

														      	<?php  
														      		if ($ov_category == 1) { ?>
														      			<span class="badge text-bg-primary">PARENT CATEGORY</span>
														      		<?php }
														      		else { ?>
														      			<span class="badge text-bg-secondary">CHILD CATEGORY</span>
														      		<?php }
														      	?>
														      </td>
														      <td>
														      	<?php  
														      		if ($status == 1) { ?>
														      			<span class="badge text-bg-info">ACTIVE</span>
														      		<?php }
														      		else if ($status == 0) { ?>
														      			<span class="badge text-bg-danger">INACTIVE</span>
														      		<?php }
														      	?>
														      </td>
														      <td>
														      	<div class="action-btn">
																	<ul>
																	    <li>
																	      <a href="farm_overview.php?do=Edit&uId=<?php echo $ov_id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
																	    </li>
																	    <li>
																	      <a href=""  data-bs-toggle="modal" data-bs-target="#uId<?php echo $ov_id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
																	    </li>
																	</ul>
																</div>

																<!-- Modal Start -->
																<div class="modal fade" id="uId<?php echo $ov_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
																  <div class="modal-dialog">
																    <div class="modal-content">
																      <div class="modal-header">
																        <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Sure?? To Move <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $title; ?></span> Trash folder!!</h1>
																        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																      </div>
																      <div class="modal-body">
																        <div class="modal-btn">
																        	<a href="farm_overview.php?do=Trash&tId=<?php echo $ov_id; ?>"class="btn btn-danger me-3">Trash</a>
																        	<a href="" class="btn btn-success" data-bs-dismiss="modal">Close</a>
																        </div>
																      </div>
																    </div>
																  </div>
																</div>
																<!-- Modal End -->

														      </td>
														    </tr>
														    <?php
										  			// Sub Category Use Start

										  		} //2nd
										  	} // 1st
									  	}
									  	?>
									    
									  </tbody>
										
									</table>

									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			
		<?php }

			else if ( $do == "Add" ) { ?>
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Add Farm Overview</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Farm Overview</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Add Farm Overview</h6>
				<hr>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<div id="example3_wrapper" class="dataTables_wrapper dt-bootstrap5">
								<div class="row">
									
									<!-- ########## START: FORM ########## -->
									<form action="farm_overview.php?do=Store" method="POST" enctype="multipart/form-data">
										<div class="row">
											<div class="col-lg-6">
												<div class="mb-3">
													<label for="">Title</label>
													<input type="text" name="title" class="form-control" placeholder="enter title" required autocomplete="off">
												</div>

												<div class="mb-3">
													<label for="">Select the Parent Category [ If Any ]</label>
													<select class="form-select" name="fov_category">
													  <option value="1">Please select the parent category</option>
													  <?php  
													  	$sql = "SELECT * FROM farm_overview WHERE ov_category=1 AND status=1 ORDER BY title ASC ";
													  	$query = mysqli_query($db, $sql);

													  	while( $row = mysqli_fetch_assoc($query) ){
													  		$ov_id  		= $row['ov_id'];
															$title	 		= $row['title'];
																?>

																<option value="<?php echo $ov_id; ?>"><?php echo $title; ?></option>

																<?php
													  	}
													  ?>
													</select>
												</div>

												<div class="mb-3">
													<label for="">Status</label>
													<select class="form-select" name="status">
													  <option value="1">Please select the Status</option>
													  <option value="1">Active</option>
													  <option value="0">InActive</option>
													</select>
												</div>
												
											</div>
											<div class="col-lg-6">

												<div class="mb-3">
													<label for="">Describe</label>
													<textarea name="describe" class="form-control" id="" cols="30" rows="4" autocomplete="off" placeholder="describe...."></textarea>
												</div>

												<div class="mb-3">
													<label for="">Image</label>
													<input class="form-control" name="image" type="file">
												</div>

												<div class="mb-3">
													<div class="d-grid gap-2">
														<input type="submit" name="addOverview" class="btn btn-primary" value="Create new Farm Overview">
													</div>
												</div>
											</div>
										</div>													
									</form>
									<!-- ########## END: FORM ########## -->
									
								</div>										
							</div>
						</div>
					</div>
				</div>
			<?php }

			else if ( $do == "Store" ) {
				if (isset($_POST['addOverview'])) {
					$title 			= mysqli_real_escape_string($db, $_POST['title']);
					$fov_category 	= mysqli_real_escape_string($db, $_POST['fov_category']);
					$status 		= mysqli_real_escape_string($db, $_POST['status']);					
					$status 		= mysqli_real_escape_string($db, $_POST['status']);
					$describe 		= mysqli_real_escape_string($db, $_POST['describe']);
					
					$image 			= mysqli_real_escape_string($db,$_FILES['image']['name']);
					$temp_img 		= $_FILES['image']['tmp_name'];

					if (!empty($image)) {
							$img = rand(0, 999999) . "_" . $image;
							move_uploaded_file($temp_img, 'assets/images/overview_img/' . $img);
					}
					else {
						$img = '';
					}

					$addSql = "INSERT INTO farm_overview (title, descrive, ov_category, ov_image, status) VALUES('$title', '$describe', '$fov_category', '$img', '$status')";
					$addQuery = mysqli_query($db, $addSql);

					if ($addQuery) {
						header("Location: farm_overview.php?do=Manage");
					}
					else {
						die ("Mysql Error." .mysqli_error($db) );
					}
				}
			}

			else if ( $do == "Edit" ) {
				if (isset($_GET['uId'])) {
					$upId = $_GET['uId'];
					$upReadSql = "SELECT * FROM farm_overview WHERE ov_id='$upId'";
					$upReadQuery = mysqli_query($db, $upReadSql);

					while ( $row = mysqli_fetch_assoc($upReadQuery) ) {
						$ov_id  		= $row['ov_id'];
			  			$title 			= $row['title'];
			  			$descrive 		= $row['descrive'];
			  			$ov_category 	= $row['ov_category'];
			  			$ov_image 		= $row['ov_image'];
			  			$status 		= $row['status'];
			  			?>
			  				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
								<div class="breadcrumb-title pe-3">Edit Farm Overview Management</div>
								<div class="ps-3">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb mb-0 p-0">
											<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
											</li>
											<li class="breadcrumb-item active" aria-current="page">Edit Farm Overview Manage</li>
										</ol>
									</nav>
								</div>
							</div>
							<!--end breadcrumb-->
							<h6 class="mb-0 text-uppercase">Update <span style="color: firebrick;"><?php echo $title; ?></span> Info</h6>
							<hr>
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<div id="example3_wrapper" class="dataTables_wrapper dt-bootstrap5">
											<div class="row">
												
												<!-- ########## START: FORM ########## -->
												<form action="farm_overview.php?do=Update" method="POST" enctype="multipart/form-data">
													<div class="row">
														<div class="col-lg-6">
															<div class="mb-3">
																<label for="">Title</label>
																<input type="text" name="title" class="form-control" placeholder="enter title" required autocomplete="off" value="<?php echo $title; ?>">
															</div>

															<div class="mb-3">
																<label for="">Select the Parent Category [ If Any ]</label>
																<select class="form-select" name="fov_category">
																  <option value="1">Please select the parent category</option>
																  <?php  
																  	$p_sql = "SELECT * FROM farm_overview WHERE ov_category=1 AND status=1 ORDER BY title ASC ";
																  	$p_query = mysqli_query($db, $p_sql);

																  	while( $row = mysqli_fetch_assoc($p_query) ){
																  		$p_cat_id  		= $row['ov_id'];
																		$p_cat_name 	= $row['title'];
																		?>

																		<option value="<?php echo $p_cat_id; ?>" <?php if( $p_cat_id == $ov_category ){ echo "selected"; } ?> ><?php echo $p_cat_name; ?></option>

																		<?php
																  	}
																  ?>
																</select>
															</div>

															<div class="mb-3">
																<label for="">Describe</label>
																<textarea name="describe" class="form-control" id="" cols="30" rows="7" autocomplete="off" placeholder="describe...."><?php echo $descrive; ?></textarea>
															</div>
															
														</div>
														<div class="col-lg-6">

															<div class="mb-3">
																<label for="">Status</label>
																<select class="form-select" name="status">
																  <option value="1">Please select the Status</option>
																  <option value="1" <?php if( $status == 1 ){ echo "selected"; } ?>>Active</option>
																  <option value="0" <?php if( $status == 0 ){ echo "selected"; } ?>>InActive</option>
																</select>
															</div>	

															

															<div class="mb-3">
																<label for="">Image</label>
																<br>
																<?php  
														      		if (!empty($ov_image)) {
																		echo '<img src="assets/images/overview_img/' . $ov_image . '" style="width: 100%; height: 200px;";>';
																	}
																	else {
																		echo 'No Image';
																	}
														      	?>
																<br><br>
																<input class="form-control" name="image" type="file">
															</div>

															<div class="mb-3">
																<div class="d-grid gap-2">
																	<input type="hidden" name="updateOverviewId" value="<?php echo $ov_id; ?>">
																	<input type="submit" name="updateOverview" class="btn btn-primary" value="Update Farm Overview">
																</div>
															</div>
														</div>
													</div>													
												</form>
												<!-- ########## END: FORM ########## -->
												
											</div>										
										</div>
									</div>
								</div>
							</div>
			  			<?php 
					}
				}
				
			}

			else if ( $do == "Update" ) {
				if (isset($_POST['updateOverview'])) {
					$updateOverviewId 	= mysqli_real_escape_string($db, $_POST['updateOverviewId']);
					$title 				= mysqli_real_escape_string($db, $_POST['title']);
					$fov_category 		= mysqli_real_escape_string($db, $_POST['fov_category']);
					$status 			= mysqli_real_escape_string($db, $_POST['status']);					
					$status 			= mysqli_real_escape_string($db, $_POST['status']);
					$describe 			= mysqli_real_escape_string($db, $_POST['describe']);
					
					$image 				= mysqli_real_escape_string($db,$_FILES['image']['name']);
					$temp_img 			= $_FILES['image']['tmp_name'];

					// Only Image Chnage
					if (!empty($image)) {

						// Delete Old Image From  Folder
						$oldImgSql = "SELECT * FROM farm_overview WHERE ov_id='$updateOverviewId'";
						$oldImageQuery = mysqli_query($db, $oldImgSql);

						while ( $row = mysqli_fetch_assoc($oldImageQuery) ) {
							$oldImage 	= $row['ov_image'];
							unlink("assets/images/overview_img/$img" . $oldImage);
						}

						$img = rand(0, 999999) . "_" . $image;
						move_uploaded_file($temp_img, 'assets/images/overview_img/' . $img);

						$upadteSql = "UPDATE farm_overview SET title='$title', descrive='$describe', ov_category='$fov_category', ov_image='$img', status='$status' WHERE ov_id='$updateOverviewId'";
						$upadteQuery = mysqli_query($db, $upadteSql);

						if ($upadteQuery) {
							header("Location: farm_overview.php?do=Manage");
						}
						else {
							die ("Mysql Error." .mysqli_error($db) );
						}
					}
					else if (empty($image)) {
						$upadteSql = "UPDATE farm_overview SET title='$title', descrive='$describe', ov_category='$fov_category', status='$status' WHERE ov_id='$updateOverviewId'";
						$upadteQuery = mysqli_query($db, $upadteSql);

						if ($upadteQuery) {
							header("Location: farm_overview.php?do=Manage");
						}
						else {
							die ("Mysql Error." .mysqli_error($db) );
						}
					}
				}
			}

			else if ( $do == "Trash" ) {
				if (isset($_GET['tId'])) {
					$trushId = $_GET['tId'];
					$trushSql = "UPDATE farm_overview SET status=0 WHERE ov_id='$trushId'";
					$trushQuery = mysqli_query( $db, $trushSql );

					if ($trushQuery) {
						header("Location: farm_overview.php?do=Manage");
					}
					else {
						die("mysql error" . mysqli_error($db));
					}

				}
			}

			else if ( $do == "ManageTrash" ) { ?>
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Farm Overview Trash Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Farm Overview Trash Manage</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Trash Manage All Farm Overview</h6>
				<hr>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<div id="example3_wrapper" class="dataTables_wrapper dt-bootstrap5">
								<div class="row">
									<div class="col-sm-12">
									<table id="example3" class="table table-striped table-hover table-bordered dataTable" role="grid" aria-describedby="example3_info">
										<thead class="table-dark">
									    <tr>
									      <th scope="col">#Sl.</th>
									      <th scope="col">Image</th>
									      <th scope="col">Title</th>
									      <th scope="col">Description</th>
									      <th scope="col">Category</th>
									      <th scope="col">Status</th>
									      <th scope="col">Action</th>
									    </tr>
									  </thead>

									  <tbody>
									  	<?php  
											$overviewSql = "SELECT * FROM farm_overview WHERE status=0 ORDER BY title ASC";
									  		$overviewQuery = mysqli_query( $db, $overviewSql );
									  		$overviewCount = mysqli_num_rows($overviewQuery);

									  		if ($overviewCount == 0) { ?>
									  			<div class="alert alert-warning text-center" role="alert">
												  Sorry! No Overview Found into the Database.
												</div>
									  		<?php }

									  		else {
									  			$i = 0;
										  		while ($row = mysqli_fetch_assoc($overviewQuery)) {
										  			$ov_id  		= $row['ov_id'];
										  			$title 			= $row['title'];
										  			$descrive 		= $row['descrive'];
										  			$ov_category 	= $row['ov_category'];
										  			$ov_image 		= $row['ov_image'];
										  			$status 		= $row['status'];
										  			$i++;
										  			?>

										  			<tr>
												      <th scope="row"><?php echo $i; ?></th>
												      <td>
												      	<?php  
												      		if (!empty($ov_image)) {
																echo '<img src="assets/images/overview_img/' . $ov_image . '" style="width: 60px";>';
															}
															else {
																echo 'No Image';
															}
												      	?>
												      </td>
												      <td><?php echo $title; ?></td>
												      <td><?php echo substr($descrive, 0, 15); ?>...</td>
												      <td>
												      	<?php  
												      		if ($ov_category == 1) { ?>
												      			<span class="badge text-bg-primary">PARENT CATEGORY</span>
												      		<?php }
												      		else { ?>
												      			<span class="badge text-bg-secondary">CHILD CATEGORY</span>
												      		<?php }
												      	?>
												      </td>
												      <td>
												      	<?php  
												      		if ($status == 1) { ?>
												      			<span class="badge text-bg-info">ACTIVE</span>
												      		<?php }
												      		else if ($status == 0) { ?>
												      			<span class="badge text-bg-danger">INACTIVE</span>
												      		<?php }
												      	?>
												      </td>
												      <td>
												      	<div class="action-btn">
															<ul>
															    <li>
															      <a href="farm_overview.php?do=Edit&uId=<?php echo $ov_id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
															    </li>
															    <li>
															      <a href=""  data-bs-toggle="modal" data-bs-target="#uId<?php echo $ov_id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
															    </li>
															</ul>
														</div>

														<!-- Modal Start -->
														<div class="modal fade" id="uId<?php echo $ov_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
														  <div class="modal-dialog">
														    <div class="modal-content">
														      <div class="modal-header">
														        <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Sure?? To Delete <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $title; ?></span> </h1>
														        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														      </div>
														      <div class="modal-body">
														        <div class="modal-btn">
														        	<a href="farm_overview.php?do=Delete&DId=<?php echo $ov_id; ?>"class="btn btn-danger me-3">Delete</a>
														        	<a href="" class="btn btn-success" data-bs-dismiss="modal">Close</a>
														        </div>
														      </div>
														    </div>
														  </div>
														</div>
														<!-- Modal End -->

												      </td>
												    </tr>

										  			<?php

										  			// Sub Category Use Start
													$subOverviewSql = "SELECT * FROM farm_overview WHERE ov_category='$ov_id' AND status=1 ORDER BY title ASC";
													$subOverviewQuery = mysqli_query( $db, $subOverviewSql );
													$subOverviewCount = mysqli_num_rows($overviewQuery);

														while ($row = mysqli_fetch_assoc($subOverviewQuery)) {
															$ov_id  		= $row['ov_id'];
															$title 			= $row['title'];
															$descrive 		= $row['descrive'];
															$ov_category 	= $row['ov_category'];
															$ov_image 		= $row['ov_image'];
															$status 		= $row['status'];
															$i++;
															?>

															<tr>
														      <th scope="row"><?php echo $i; ?></th>
														      <td>
														      	<?php  
														      		if (!empty($ov_image)) {
																		echo '<img src="assets/images/overview_img/' . $ov_image . '" style="width: 60px";>';
																	}
																	else {
																		echo 'No Image';
																	}
														      	?>
														      </td>
														      <td> -- <?php echo $title; ?></td>
														      <td><?php echo substr($descrive, 0, 15); ?>...</td>
														      <td>

														      	<?php  
														      		if ($ov_category == 1) { ?>
														      			<span class="badge text-bg-primary">PARENT CATEGORY</span>
														      		<?php }
														      		else { ?>
														      			<span class="badge text-bg-secondary">CHILD CATEGORY</span>
														      		<?php }
														      	?>
														      </td>
														      <td>
														      	<?php  
														      		if ($status == 1) { ?>
														      			<span class="badge text-bg-info">ACTIVE</span>
														      		<?php }
														      		else if ($status == 0) { ?>
														      			<span class="badge text-bg-danger">INACTIVE</span>
														      		<?php }
														      	?>
														      </td>
														      <td>
														      	<div class="action-btn">
																	<ul>
																	    <li>
																	      <a href="farm_overview.php?do=Edit&uId=<?php echo $ov_id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
																	    </li>
																	    <li>
																	      <a href=""  data-bs-toggle="modal" data-bs-target="#uId<?php echo $ov_id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
																	    </li>
																	</ul>
																</div>

																<!-- Modal Start -->
																<div class="modal fade" id="uId<?php echo $ov_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
																  <div class="modal-dialog">
																    <div class="modal-content">
																      <div class="modal-header">
																        <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Sure?? To Delete <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $title; ?></span> </h1>
																        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																      </div>
																      <div class="modal-body">
																        <div class="modal-btn">
																        	<a href="farm_overview.php?do=Delete&DId=<?php echo $ov_id; ?>"class="btn btn-danger me-3">Delete</a>
																        	<a href="" class="btn btn-success" data-bs-dismiss="modal">Close</a>
																        </div>
																      </div>
																    </div>
																  </div>
																</div>
																<!-- Modal End -->

														      </td>
														    </tr>
														    <?php
										  			// Sub Category Use Start

										  		} //2nd
										  	} // 1st
									  	}
									  	?>
									    
									  </tbody>
										
									</table>

									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			
		<?php }

			else if ( $do == "Delete" ) {
				if (isset($_GET['DId'])) {
					$deleteId = $_GET['DId'];
					$deleteSql = "DELETE FROM farm_overview WHERE ov_id='$deleteId' ";
					$deleteQuery = mysqli_query($db, $deleteSql);

					if ($deleteQuery) {
						header("Location: farm_overview.php?do=Manage");
					}
					else {
						die("Mysql Error." . mysqli_error($db));
					}
				}
			}
		?>

	</div>
</div>


<?php  
	include "inc/footer.php";
?>