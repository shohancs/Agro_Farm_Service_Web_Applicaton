<?php  
	include "inc/header.php";
?>

<div class="page-wrapper">
	<div class="page-content">
		<?php  
			$do = isset($_GET['do']) ? $_GET['do'] : "Manage";

			if ( $do == "Manage" ) { ?>
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Farmer Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Farmer Manage</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Manage All Farmer</h6>
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
									      <th scope="col">Full Name</th>
									      <th scope="col">Email</th>
									      <th scope="col">Phone No.</th>
									      <th scope="col">Address</th>
									      <th scope="col">About Farmer</th>
									      <th scope="col">Status</th>
									      <th scope="col">Join date</th>
									      <th scope="col">Action</th>
									    </tr>
									  </thead>

									  <tbody>
									  	<?php  
									  		$farmerSql = "SELECT * FROM farmer WHERE status=1 ORDER BY farm_name ASC";
									  		$farmerQuery = mysqli_query( $db, $farmerSql );
									  		$farmerCount = mysqli_num_rows($farmerQuery);

									  		if ($farmerCount == 0) { ?>
									  			<div class="alert alert-warning text-center" role="alert">
												  Sorry! No Farmer Found into the Database.
												</div>
									  		<?php }

									  		else {
									  			$i = 0;

										  		while ($row = mysqli_fetch_assoc($farmerQuery)) {
										  			$farm_id 		= $row['farm_id'];
										  			$farm_name 		= $row['farm_name'];
										  			$farm_phone 	= $row['farm_phone'];
										  			$farm_email 	= $row['farm_email'];
										  			$farm_address 	= $row['farm_address'];
										  			$farm_about 	= $row['farm_about'];
										  			$status 		= $row['status'];
										  			$farm_image 	= $row['farm_image'];
										  			$join_date 		= $row['join_date'];
										  			$i++;
										  			?>

										  			<tr>
												      <th scope="row"><?php echo $i; ?></th>
												      <td>
												      	<?php  
												      		if (!empty($farm_image)) {
																echo '<img src="assets/images/farmer/' . $farm_image . '" style="width: 60px";>';
															}
															else {
																echo '<img src="assets/images/farmer/default.jpg" style="width: 60px";>';
															}
												      	?>
												      </td>
												      <td><?php echo $farm_name; ?></td>
												      <td><?php echo $farm_email; ?></td>
												      <td><?php echo $farm_phone; ?></td>
												      <td><?php echo substr($farm_address, 0, 15); ?>...</td>
												      <td><?php echo substr($farm_about, 0, 15); ?>... </td>
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
												      <td><?php echo $join_date; ?></td>
												      <td>
												      	<div class="action-btn">
															<ul>
															    <li>
															      <a href="farmer.php?do=Edit&uId=<?php echo $farm_id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
															    </li>
															    <li>
															      <a href=""  data-bs-toggle="modal" data-bs-target="#uId<?php echo $farm_id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
															    </li>
															</ul>
														</div>

														<!-- Modal Start -->
														<div class="modal fade" id="uId<?php echo $farm_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
														  <div class="modal-dialog">
														    <div class="modal-content">
														      <div class="modal-header">
														        <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Sure?? To Move <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $farm_name; ?></span> Trash folder!!</h1>
														        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														      </div>
														      <div class="modal-body">
														        <div class="modal-btn">
														        	<a href="farmer.php?do=Trash&tId=<?php echo $farm_id; ?>"class="btn btn-danger me-3">Trash</a>
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
										  		}

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
					<div class="breadcrumb-title pe-3">Farmer Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Farmer</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Add New Farmer</h6>
				<hr>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<div id="example3_wrapper" class="dataTables_wrapper dt-bootstrap5">
								<div class="row">
									
									<!-- ########## START: FORM ########## -->
									<form action="farmer.php?do=Store" method="POST" enctype="multipart/form-data">
										<div class="row">
											<div class="col-lg-4">
												<div class="mb-3">
													<label for="">Full Name</label>
													<input type="text" name="fname" class="form-control" placeholder="enter farmer name" required autocomplete="off">
												</div>

												<div class="mb-3">
													<label for="">Email Address</label>
													<input type="email" name="email" class="form-control" placeholder="enter user email" required autocomplete="off">
												</div>

												<div class="mb-3">
													<label for="">Address</label>
													<textarea name="address" class="form-control" id="" cols="30" rows="3" autocomplete="off" placeholder="address...."></textarea>
												</div>
												
											</div>
											<div class="col-lg-4">
												<div class="mb-3">
													<label for="">Phone No.</label>
													<input type="tel" name="phone" class="form-control" placeholder="enter phone no.." required autocomplete="off">
												</div>

												<div class="mb-3">
													<label for="">About Farmer</label>
													<textarea name="about" class="form-control" id="" cols="30" rows="6" autocomplete="off" placeholder="about...."></textarea>
												</div>
											</div>
											<div class="col-lg-4">
												

												<div class="mb-3">
													<label for="">Status</label>
													<select class="form-select" name="status">
													  <option value="1">Please select the Status</option>
													  <option value="1">Active</option>
													  <option value="0">InActive</option>
													</select>
												</div>

												<div class="mb-3">
													<label for="">Image</label>
													<input class="form-control" name="image" type="file">
												</div>

												<div class="mb-3">
													<div class="d-grid gap-2">
														<input type="submit" name="addFarmer" class="btn btn-primary" value="Add New Farmer">
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
				if (isset($_POST['addFarmer'])) {
					$fname 			= mysqli_real_escape_string($db, $_POST['fname']);
					$email 			= mysqli_real_escape_string($db, $_POST['email']);					
					$address 		= mysqli_real_escape_string($db, $_POST['address']);
					$phone 			= mysqli_real_escape_string($db, $_POST['phone']);
					$about 			= mysqli_real_escape_string($db, $_POST['about']);
					$status 		= mysqli_real_escape_string($db, $_POST['status']);
					
					$image 			= mysqli_real_escape_string($db,$_FILES['image']['name']);
					$temp_img 		= $_FILES['image']['tmp_name'];


						if (!empty($image)) {
							$img = rand(0, 999999) . "_" . $image;
							move_uploaded_file($temp_img, 'assets/images/farmer/' . $img);
						}
						else {
							$img = '';
						}


						$farmAddSql = "INSERT INTO farmer (farm_name, farm_phone, farm_email, farm_address,	farm_about, farm_image, status,	join_date) VALUES('$fname', '$phone', '$email', '$address', '$about', '$img', '$status', now())";
						$farmAddQuery = mysqli_query($db, $farmAddSql);

						if ($farmAddQuery) {
							header("Location: farmer.php?do=Manage");
						}
						else {
							die ("Mysql Error." .mysqli_error($db) );
						}

				}
			}

			else if ( $do == "Edit" ) {
				if (isset($_GET['uId'])) {
					$upId = $_GET['uId'];
					$upReadSql = "SELECT * FROM farmer WHERE farm_id='$upId'";
					$upReadQuery = mysqli_query($db, $upReadSql);

					while ( $row = mysqli_fetch_assoc($upReadQuery) ) {
						$farm_id 		= $row['farm_id'];
			  			$farm_name 		= $row['farm_name'];
			  			$farm_phone 	= $row['farm_phone'];
			  			$farm_email 	= $row['farm_email'];
			  			$farm_address 	= $row['farm_address'];
			  			$farm_about 	= $row['farm_about'];
			  			$status 		= $row['status'];
			  			$farm_image 	= $row['farm_image'];
			  			$join_date 		= $row['join_date'];
			  			?>
			  				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
								<div class="breadcrumb-title pe-3">Farmer Management</div>
								<div class="ps-3">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb mb-0 p-0">
											<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
											</li>
											<li class="breadcrumb-item active" aria-current="page">Edit Farmer</li>
										</ol>
									</nav>
								</div>
							</div>
							<!--end breadcrumb-->
							<h6 class="mb-0 text-uppercase">Update <span style="color: firebrick;"><?php echo $farm_email; ?></span> Info</h6>
							<hr>
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<div id="example3_wrapper" class="dataTables_wrapper dt-bootstrap5">
											<div class="row">
												
												<!-- ########## START: FORM ########## -->
												<form action="farmer.php?do=Update" method="POST" enctype="multipart/form-data">
													<div class="row">
														<div class="col-lg-4">
															<div class="mb-3">
																<label for="">Full Name</label>
																<input type="text" name="fname" class="form-control" placeholder="enter farmer name" required autocomplete="off" value="<?php echo $farm_name; ?>">
															</div>

															<div class="mb-3">
																<label for="">Email Address</label>
																<input type="email" name="email" class="form-control" placeholder="enter user email" required autocomplete="off" value="<?php echo $farm_email; ?>">
															</div>

															<div class="mb-3">
																<label for="">Phone No.</label>
																<input type="tel" name="phone" class="form-control" placeholder="enter phone no.." required autocomplete="off" value="<?php echo $farm_phone; ?>">
															</div>

															<div class="mb-3">
																<label for="">Status</label>
																<select class="form-select" name="status">
																  <option value="1">Please select the Status</option>
																  <option value="1" <?php if( $status == 1 ) { echo "selected"; } ?>>Active</option>
																  <option value="0" <?php if( $status == 0 ) { echo "selected"; } ?>>InActive</option>
																</select>
															</div>														
															
														</div>
														<div class="col-lg-4">								
															<div class="mb-3">
																<label for="">About Farmer</label>
																<textarea name="about" class="form-control" id="" cols="30" rows="6" autocomplete="off" placeholder="about...."><?php echo $farm_about; ?></textarea>
															</div>

															<div class="mb-3">
																<label for="">Address</label>
																<textarea name="address" class="form-control" id="" cols="30" rows="3" autocomplete="off" placeholder="address...."><?php echo $farm_address; ?></textarea>
															</div>
														</div>
														<div class="col-lg-4">
															<div class="mb-3">
																<label for="">Image</label>
																<br>
																<?php  
																if (!empty($farm_image)) {
																	echo '<img src="assets/images/farmer/' . $farm_image . '" style="width: 100%; height:200px;";>';
																}
																else {
																	echo 'Not Image Found';
																}
																?>
																<br><br>
																<input class="form-control" name="image" type="file">
															</div>

															<div class="mb-3">
																<div class="d-grid gap-2">
																	<input type="hidden" name="updateFarmerId" value="<?php echo $farm_id; ?>">
																	<input type="submit" name="updateFarmer" class="btn btn-primary" value="Update Farmer Info">
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
				if (isset($_POST['updateFarmer'])) {
					$updateFarmerId 	= mysqli_real_escape_string($db, $_POST['updateFarmerId']);
					$fname 				= mysqli_real_escape_string($db, $_POST['fname']);
					$email 				= mysqli_real_escape_string($db, $_POST['email']);				
					$address 			= mysqli_real_escape_string($db, $_POST['address']);
					$phone 				= mysqli_real_escape_string($db, $_POST['phone']);
					$about 				= mysqli_real_escape_string($db, $_POST['about']);
					$status 			= mysqli_real_escape_string($db, $_POST['status']);
					
					$image 				= mysqli_real_escape_string($db,$_FILES['image']['name']);
					$temp_img 			= $_FILES['image']['tmp_name'];

					if (!empty($image)) {

						// Delete Old Image From  Folder
						$oldImgSql = "SELECT * FROM farmer WHERE farm_id='$updateFarmerId'";
						$oldImageQuery = mysqli_query($db, $oldImgSql);

						while ( $row = mysqli_fetch_assoc($oldImageQuery) ) {
							$oldImage 	= $row['farm_image'];
							unlink("assets/images/farmer/$img" . $oldImage);
						}

						$img = rand(0, 999999) . "_" . $image;
						move_uploaded_file($temp_img, 'assets/images/farmer/' . $img);

						$updatefarmerSql = "UPDATE farmer SET farm_name='$fname', farm_phone='$phone', farm_email='$email', farm_address='$address', farm_about='$about', farm_image='$img', status='$status' WHERE farm_id='$updateFarmerId'";
						$upatefarmerQuery = mysqli_query($db, $updatefarmerSql);

						if ($upatefarmerQuery) {
							header("Location: farmer.php?do=Manage");
						}
						else {
							die ("Mysql Error." .mysqli_error($db) );
						}
					}
					else if (empty($image)) {

						$updatefarmerSql = "UPDATE farmer SET farm_name='$fname', farm_phone='$phone', farm_email='$email', farm_address='$address', farm_about='$about', status='$status' WHERE farm_id='$updateFarmerId'";
						$upatefarmerQuery = mysqli_query($db, $updatefarmerSql);

						if ($upatefarmerQuery) {
							header("Location: farmer.php?do=Manage");
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
					$trushSql = "UPDATE farmer SET status=0 WHERE farm_id='$trushId'";
					$trushQuery = mysqli_query( $db, $trushSql );

					if ($trushQuery) {
						header("Location: farmer.php?do=Manage");
					}
					else {
						die("mysql error" . mysqli_error($db));
					}

				}
			}

			else if ( $do == "ManageTrash" ) { ?>
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Farmer Trash Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Farmer Trash Manage</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Trash Manage Farmer</h6>
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
									      <th scope="col">Full Name</th>
									      <th scope="col">Email</th>
									      <th scope="col">Phone No.</th>
									      <th scope="col">Address</th>
									      <th scope="col">About Farmer</th>
									      <th scope="col">Status</th>
									      <th scope="col">Join date</th>
									      <th scope="col">Action</th>
									    </tr>
									  </thead>

									  <tbody>
									  	<?php  
									  		$farmerSql = "SELECT * FROM farmer WHERE status=0 ORDER BY farm_name ASC";
									  		$farmerQuery = mysqli_query( $db, $farmerSql );
									  		$farmerCount = mysqli_num_rows($farmerQuery);

									  		if ($farmerCount == 0) { ?>
									  			<div class="alert alert-warning text-center" role="alert">
												  Sorry! No Farmer Found into the Database.
												</div>
									  		<?php }

									  		else {
									  			$i = 0;

										  		while ($row = mysqli_fetch_assoc($farmerQuery)) {
										  			$farm_id 		= $row['farm_id'];
										  			$farm_name 		= $row['farm_name'];
										  			$farm_phone 	= $row['farm_phone'];
										  			$farm_email 	= $row['farm_email'];
										  			$farm_address 	= $row['farm_address'];
										  			$farm_about 	= $row['farm_about'];
										  			$status 		= $row['status'];
										  			$farm_image 	= $row['farm_image'];
										  			$join_date 		= $row['join_date'];
										  			$i++;
										  			?>

										  			<tr>
												      <th scope="row"><?php echo $i; ?></th>
												      <td>
												      	<?php  
												      		if (!empty($farm_image)) {
																echo '<img src="assets/images/farmer/' . $farm_image . '" style="width: 60px";>';
															}
															else {
																echo '<img src="assets/images/farmer/default.jpg" style="width: 60px";>';
															}
												      	?>
												      </td>
												      <td><?php echo $farm_name; ?></td>
												      <td><?php echo $farm_email; ?></td>
												      <td><?php echo $farm_phone; ?></td>
												      <td><?php echo substr($farm_address, 0, 15); ?>...</td>
												      <td><?php echo substr($farm_about, 0, 15); ?>... </td>
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
												      <td><?php echo $join_date; ?></td>
												      <td>
												      	<div class="action-btn">
															<ul>
															    <li>
															      <a href="farmer.php?do=Edit&uId=<?php echo $farm_id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
															    </li>
															    <li>
															      <a href=""  data-bs-toggle="modal" data-bs-target="#uId<?php echo $farm_id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
															    </li>
															</ul>
														</div>

														<!-- Modal Start -->
														<div class="modal fade" id="uId<?php echo $farm_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
														  <div class="modal-dialog">
														    <div class="modal-content">
														      <div class="modal-header">
														        <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Sure?? To Delete <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $farm_name; ?></span></h1>
														        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														      </div>
														      <div class="modal-body">
														        <div class="modal-btn">
														        	<a href="farmer.php?do=Delete&DId=<?php echo $farm_id; ?>"class="btn btn-danger me-3">Delete</a>
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
										  		}

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
					$deleteSql = "DELETE FROM farmer WHERE farm_id='$deleteId' ";
					$deleteQuery = mysqli_query($db, $deleteSql);

					if ($deleteQuery) {
						header("Location: farmer.php?do=Manage");
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