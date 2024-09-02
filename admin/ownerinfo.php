<?php  
	include "inc/header.php";
?>

<div class="page-wrapper">
	<div class="page-content">
		<?php  
			$do = isset($_GET['do']) ? $_GET['do'] : "Manage";

			if ( $do == "Manage" ) { ?>
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Owner Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Owner Manage</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Manage All Owner</h6>
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
									      <th scope="col">Owner Name</th>
									      <th scope="col">Email</th>
									      <th scope="col">Phone</th>
									      <th scope="col">Address</th>
									      <th scope="col">Join Date</th>
									      <th scope="col">Status</th>
									      <th scope="col">Action</th>
									    </tr>
									  </thead>

									  <tbody>
									  	<?php  
											$aboutSql = "SELECT * FROM owner_info WHERE status=1 ORDER BY id DESC";
									  		$aboutQuery = mysqli_query( $db, $aboutSql );
									  		$aboutCount = mysqli_num_rows($aboutQuery);

									  		if ($aboutCount == 0) { ?>
									  			<div class="alert alert-warning text-center" role="alert">
												  Sorry! No Data Found into the Database.
												</div>
									  		<?php }

									  		else {
									  			$i = 0;

										  		while ($row = mysqli_fetch_assoc($aboutQuery)) {
										  			$id  		= $row['id'];
										  			$name 		= $row['name'];
										  			$email 		= $row['email'];
										  			$phone 		= $row['phone'];
										  			$image 		= $row['image'];
										  			$address 	= $row['address'];
										  			$status 	= $row['status'];
										  			$join_date 	= $row['join_date'];
										  			$i++;
										  			?>

										  			<tr>
												      <th scope="row"><?php echo $i; ?></th>
												      <td>
												      	<?php  
												      		if (!empty($image)) {
																echo '<img src="assets/images/aboutUs/' . $image . '" style="width: 60px";>';
															}
															else {
																echo 'No Image';
															}
												      	?>
												      </td>
												      <td><?php echo $name; ?></td>
												      <td><?php echo $email; ?></td>
												      <td><?php echo $phone; ?></td>
												      <td><?php echo substr($address, 0, 15); ?>...</td>
												      <td><?php echo $join_date; ?></td>
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
															      <a href="ownerinfo.php?do=Edit&uId=<?php echo $id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
															    </li>
															    <li>
															      <a href=""  data-bs-toggle="modal" data-bs-target="#uId<?php echo $id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
															    </li>
															</ul>
														</div>

														<!-- Modal Start -->
														<div class="modal fade" id="uId<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
														  <div class="modal-dialog">
														    <div class="modal-content">
														      <div class="modal-header">
														        <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Sure?? To Move <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $name; ?></span> Trash folder!!</h1>
														        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														      </div>
														      <div class="modal-body">
														        <div class="modal-btn">
														        	<a href="ownerinfo.php?do=Trash&tId=<?php echo $id; ?>"class="btn btn-danger me-3">Trash</a>
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
					<div class="breadcrumb-title pe-3">Owner Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Owner Manage</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Add New Owner</h6>
				<hr>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<div id="example3_wrapper" class="dataTables_wrapper dt-bootstrap5">
								<div class="row">
									
									<!-- ########## START: FORM ########## -->
									<form action="ownerinfo.php?do=Store" method="POST" enctype="multipart/form-data">
										<div class="row">
											<div class="col-lg-6">
												<div class="mb-3">
													<label for="">Name</label>
													<input type="text" name="name" class="form-control" placeholder="enter title" required autocomplete="off">
												</div>

												<div class="mb-3">
													<label for="">Email</label>
													<input type="email" name="email" class="form-control" placeholder="email.." required autocomplete="off">
												</div>

												<div class="mb-3">
													<label for="">Phone</label>
													<input type="tel" name="phone" class="form-control" placeholder="phone.." required autocomplete="off">
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
													<label for="">Address</label>
													<textarea name="address" class="form-control" id="" cols="30" rows="7" autocomplete="off" placeholder="address...."></textarea>
												</div>

												<div class="mb-3">
													<label for="">Image</label>
													<input class="form-control" name="image" type="file">
												</div>

												<div class="mb-3">
													<div class="d-grid gap-2">
														<input type="submit" name="addOwner" class="btn btn-primary" value="Create new Owner">
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
				if (isset($_POST['addOwner'])) {
					$name 			= mysqli_real_escape_string($db, $_POST['name']);
					$email 			= mysqli_real_escape_string($db, $_POST['email']);
					$phone 			= mysqli_real_escape_string($db, $_POST['phone']);					
					$status 		= mysqli_real_escape_string($db, $_POST['status']);
					$address 		= mysqli_real_escape_string($db, $_POST['address']);
					
					$image 			= mysqli_real_escape_string($db,$_FILES['image']['name']);
					$temp_img 		= $_FILES['image']['tmp_name'];

					if (!empty($image)) {
							$img = rand(0, 999999) . "_" . $image;
							move_uploaded_file($temp_img, 'assets/images/aboutUs/' . $img);
					}
					else {
						$img = '';
					}

					$addSql = "INSERT INTO owner_info (name, email,	phone, image, address, status, join_date ) VALUES('$name', '$email', '$phone', '$img', '$address','$status', now())";
					$addQuery = mysqli_query($db, $addSql);

					if ($addQuery) {
						header("Location: ownerinfo.php?do=Manage");
					}
					else {
						die ("Mysql Error." .mysqli_error($db) );
					}
				}
			}

			else if ( $do == "Edit" ) {
				if (isset($_GET['uId'])) {
					$upId = $_GET['uId'];
					$upReadSql = "SELECT * FROM owner_info WHERE id='$upId'";
					$upReadQuery = mysqli_query($db, $upReadSql);

					while ( $row = mysqli_fetch_assoc($upReadQuery) ) {
						$id  		= $row['id'];
			  			$name 		= $row['name'];
			  			$email 		= $row['email'];
			  			$phone 		= $row['phone'];
			  			$image 		= $row['image'];
			  			$address 	= $row['address'];
			  			$status 	= $row['status'];
			  			?>
			  				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
								<div class="breadcrumb-title pe-3">Edit Owner Info Management</div>
								<div class="ps-3">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb mb-0 p-0">
											<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
											</li>
											<li class="breadcrumb-item active" aria-current="page">Edit Owner 	Info</li>
										</ol>
									</nav>
								</div>
							</div>
							<!--end breadcrumb-->
							<h6 class="mb-0 text-uppercase">Update <span style="color: firebrick;"><?php echo $name; ?></span> Info</h6>
							<hr>
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<div id="example3_wrapper" class="dataTables_wrapper dt-bootstrap5">
											<div class="row">
												
												<!-- ########## START: FORM ########## -->
												<form action="ownerinfo.php?do=Update" method="POST" enctype="multipart/form-data">
													<div class="row">
														<div class="col-lg-6">
															<div class="mb-3">
																<label for="">Name</label>
																<input type="text" name="name" class="form-control" placeholder="enter title" required autocomplete="off" value="<?php echo $name; ?>">
															</div>

															<div class="mb-3">
																<label for="">Email</label>
																<input type="email" name="email" class="form-control" placeholder="email.." required autocomplete="off" value="<?php echo $email; ?>">
															</div>

															<div class="mb-3">
																<label for="">Phone</label>
																<input type="tel" name="phone" class="form-control" placeholder="phone.." required autocomplete="off" value="<?php echo $phone; ?>">
															</div>

															<div class="mb-3">
																<label for="">Status</label>
																<select class="form-select" name="status">
																  <option value="1">Please select the Status</option>
																  <option value="1" <?php if ( $status == 1 ){ echo "selected";} ?>>Active</option>
																  <option value="0" <?php if ( $status == 0 ){ echo "selected";} ?>>InActive</option>
																</select>
															</div>
															
														</div>
														<div class="col-lg-6">

															<div class="mb-3">
																<label for="">Address</label>
																<textarea name="address" class="form-control" id="" cols="30" rows="7" autocomplete="off"><?php echo $address; ?></textarea>
															</div>

															<div class="mb-3">
																<label for="">Image</label>
																<br>
																<?php  
														      		if (!empty($image)) {
																		echo '<img src="assets/images/aboutUs/' . $image . '" style="width: 100%; height:200px;";>';
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
																	<input type="hidden" name="updateOwnerId" value="<?php echo $id; ?>">
																	<input type="submit" name="updateOwner" class="btn btn-primary" value="Update Owner Info">
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
				if (isset($_POST['updateOwner'])) {
					$updateOwnerId 	= mysqli_real_escape_string($db, $_POST['updateOwnerId']);
					$name 			= mysqli_real_escape_string($db, $_POST['name']);
					$email 			= mysqli_real_escape_string($db, $_POST['email']);
					$phone 			= mysqli_real_escape_string($db, $_POST['phone']);					
					$status 		= mysqli_real_escape_string($db, $_POST['status']);
					$address 		= mysqli_real_escape_string($db, $_POST['address']);
					
					$image 			= mysqli_real_escape_string($db,$_FILES['image']['name']);
					$temp_img 		= $_FILES['image']['tmp_name'];


					// Only Image Chnage
					if (!empty($image)) {

						// Delete Old Image From  Folder
						$oldImgSql = "SELECT * FROM owner_info WHERE id='$updateOwnerId'";
						$oldImageQuery = mysqli_query($db, $oldImgSql);

						while ( $row = mysqli_fetch_assoc($oldImageQuery) ) {
							$oldImage 	= $row['image'];
							unlink("assets/images/aboutUs/$img" . $oldImage);
						}

						$img = rand(0, 999999) . "_" . $image;
						move_uploaded_file($temp_img, 'assets/images/aboutUs/' . $img);

						$updateSql = "UPDATE owner_info SET name='$name', email='$email', phone='$phone', image='$img', address='$address', status='$status' WHERE id='$updateOwnerId'";
						$updateQuery = mysqli_query($db, $updateSql);

						if ($updateQuery) {
							header("Location: ownerinfo.php?do=Manage");
						}
						else {
							die ("Mysql Error." .mysqli_error($db) );
						}
					}
					else if (empty($image)) {

						$updateSql = "UPDATE owner_info SET name='$name', email='$email', phone='$phone', address='$address', status='$status' WHERE id='$updateOwnerId'";
						$updateQuery = mysqli_query($db, $updateSql);

						if ($updateQuery) {
							header("Location: ownerinfo.php?do=Manage");
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
					$trushSql = "UPDATE owner_info SET status=0 WHERE id='$trushId'";
					$trushQuery = mysqli_query( $db, $trushSql );

					if ($trushQuery) {
						header("Location: ownerinfo.php?do=Manage");
					}
					else {
						die("mysql error" . mysqli_error($db));
					}

				}
			}

			else if ( $do == "ManageTrash" ) { ?>
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Trash Owner Info Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Trash Owner Manage</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Trash Manage Owner Info</h6>
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
									      <th scope="col">Owner Name</th>
									      <th scope="col">Email</th>
									      <th scope="col">Phone</th>
									      <th scope="col">Address</th>
									      <th scope="col">Join Date</th>
									      <th scope="col">Status</th>
									      <th scope="col">Action</th>
									    </tr>
									  </thead>

									  <tbody>
									  	<?php  
											$aboutSql = "SELECT * FROM owner_info WHERE status=0 ORDER BY id DESC";
									  		$aboutQuery = mysqli_query( $db, $aboutSql );
									  		$aboutCount = mysqli_num_rows($aboutQuery);

									  		if ($aboutCount == 0) { ?>
									  			<div class="alert alert-warning text-center" role="alert">
												  Sorry! No Data Found into the Database.
												</div>
									  		<?php }

									  		else {
									  			$i = 0;

										  		while ($row = mysqli_fetch_assoc($aboutQuery)) {
										  			$id  		= $row['id'];
										  			$name 		= $row['name'];
										  			$email 		= $row['email'];
										  			$phone 		= $row['phone'];
										  			$image 		= $row['image'];
										  			$address 	= $row['address'];
										  			$status 	= $row['status'];
										  			$join_date 	= $row['join_date'];
										  			$i++;
										  			?>

										  			<tr>
												      <th scope="row"><?php echo $i; ?></th>
												      <td>
												      	<?php  
												      		if (!empty($image)) {
																echo '<img src="assets/images/aboutUs/' . $image . '" style="width: 60px";>';
															}
															else {
																echo 'No Image';
															}
												      	?>
												      </td>
												      <td><?php echo $name; ?></td>
												      <td><?php echo $email; ?></td>
												      <td><?php echo $phone; ?></td>
												      <td><?php echo substr($address, 0, 15); ?>...</td>
												      <td><?php echo $join_date; ?></td>
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
															      <a href="ownerinfo.php?do=Edit&uId=<?php echo $id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
															    </li>
															    <li>
															      <a href=""  data-bs-toggle="modal" data-bs-target="#uId<?php echo $id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
															    </li>
															</ul>
														</div>

														<!-- Modal Start -->
														<div class="modal fade" id="uId<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
														  <div class="modal-dialog">
														    <div class="modal-content">
														      <div class="modal-header">
														        <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Sure?? To Delete <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $name; ?></span> !!</h1>
														        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														      </div>
														      <div class="modal-body">
														        <div class="modal-btn">
														        	<a href="ownerinfo.php?do=Delete&DId=<?php echo $id; ?>"class="btn btn-danger me-3">Delete</a>
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
					$deleteSql = "DELETE FROM owner_info WHERE id='$deleteId' ";
					$deleteQuery = mysqli_query($db, $deleteSql);

					if ($deleteQuery) {
						header("Location: ownerinfo.php?do=Manage");
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