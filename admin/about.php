<?php  
	include "inc/header.php";
?>

<div class="page-wrapper">
	<div class="page-content">
		<?php  
			$do = isset($_GET['do']) ? $_GET['do'] : "Manage";

			if ( $do == "Manage" ) { ?>
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">About Us Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">About Us Manage</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Manage All About Us</h6>
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
									      <th scope="col">Per Year</th>
									      <th scope="col">Firm Total Age</th>
									      <th scope="col">Status</th>
									      <th scope="col">Action</th>
									    </tr>
									  </thead>

									  <tbody>
									  	<?php  
											$aboutSql = "SELECT * FROM about WHERE status=1 ORDER BY title ASC";
									  		$aboutQuery = mysqli_query( $db, $aboutSql );
									  		$aboutCount = mysqli_num_rows($aboutQuery);

									  		if ($aboutCount == 0) { ?>
									  			<div class="alert alert-warning text-center" role="alert">
												  Sorry! No Product Found into the Database.
												</div>
									  		<?php }

									  		else {
									  			$i = 0;

										  		while ($row = mysqli_fetch_assoc($aboutQuery)) {
										  			$id  		= $row['id'];
										  			$title 		= $row['title'];
										  			$descrive 	= $row['descrive'];
										  			$year 		= $row['year'];
										  			$total_age 	= $row['total_age'];
										  			$a_image 	= $row['a_image'];
										  			$status 	= $row['status'];
										  			$i++;
										  			?>

										  			<tr>
												      <th scope="row"><?php echo $i; ?></th>
												      <td>
												      	<?php  
												      		if (!empty($a_image)) {
																echo '<img src="assets/images/aboutUs/' . $a_image . '" style="width: 60px";>';
															}
															else {
																echo 'No Image';
															}
												      	?>
												      </td>
												      <td><?php echo $title; ?></td>
												      <td><?php echo substr($descrive, 0, 15); ?>...</td>
												      <td><?php echo $year; ?></td>
												      <td><?php echo $total_age; ?></td>
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
															      <a href="about.php?do=Edit&uId=<?php echo $id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
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
														        <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Sure?? To Move <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $title; ?></span> Trash folder!!</h1>
														        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														      </div>
														      <div class="modal-body">
														        <div class="modal-btn">
														        	<a href="about.php?do=Trash&tId=<?php echo $id; ?>"class="btn btn-danger me-3">Trash</a>
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
					<div class="breadcrumb-title pe-3">About Us Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">About Us Manage</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Add New for About Us</h6>
				<hr>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<div id="example3_wrapper" class="dataTables_wrapper dt-bootstrap5">
								<div class="row">
									
									<!-- ########## START: FORM ########## -->
									<form action="about.php?do=Store" method="POST" enctype="multipart/form-data">
										<div class="row">
											<div class="col-lg-6">
												<div class="mb-3">
													<label for="">Title</label>
													<input type="text" name="title" class="form-control" placeholder="enter title" required autocomplete="off">
												</div>

												<div class="mb-3">
													<label for="">Per Year</label>
													<input type="text" name="per_year" class="form-control" placeholder="per year.." required autocomplete="off">
												</div>

												<div class="mb-3">
													<label for="">Farm Total Age [5 Years Running..]</label>
													<input type="text" name="ft_age" class="form-control" placeholder="total age..." autocomplete="off" value="5 years">
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
													<textarea name="describe" class="form-control" id="" cols="30" rows="7" autocomplete="off" placeholder="describe...."></textarea>
												</div>

												<div class="mb-3">
													<label for="">Image</label>
													<input class="form-control" name="image" type="file">
												</div>

												<div class="mb-3">
													<div class="d-grid gap-2">
														<input type="submit" name="addAbout" class="btn btn-primary" value="Create new About Us">
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
				if (isset($_POST['addAbout'])) {
					$title 			= mysqli_real_escape_string($db, $_POST['title']);
					$per_year 		= mysqli_real_escape_string($db, $_POST['per_year']);
					$ft_age 		= mysqli_real_escape_string($db, $_POST['ft_age']);					
					$status 		= mysqli_real_escape_string($db, $_POST['status']);
					$describe 		= mysqli_real_escape_string($db, $_POST['describe']);
					
					$image 			= mysqli_real_escape_string($db,$_FILES['image']['name']);
					$temp_img 		= $_FILES['image']['tmp_name'];

					if (!empty($image)) {
							$img = rand(0, 999999) . "_" . $image;
							move_uploaded_file($temp_img, 'assets/images/aboutUs/' . $img);
					}
					else {
						$img = '';
					}

					$addSql = "INSERT INTO about (title, descrive, year, total_age,	a_image, status) VALUES('$title', '$describe', '$per_year', '$ft_age', '$img','$status')";
					$addQuery = mysqli_query($db, $addSql);

					if ($addQuery) {
						header("Location: about.php?do=Manage");
					}
					else {
						die ("Mysql Error." .mysqli_error($db) );
					}
				}
			}

			else if ( $do == "Edit" ) {
				if (isset($_GET['uId'])) {
					$upId = $_GET['uId'];
					$upReadSql = "SELECT * FROM about WHERE id='$upId'";
					$upReadQuery = mysqli_query($db, $upReadSql);

					while ( $row = mysqli_fetch_assoc($upReadQuery) ) {
						$id  		= $row['id'];
			  			$title 		= $row['title'];
			  			$descrive 	= $row['descrive'];
			  			$year 		= $row['year'];
			  			$total_age 	= $row['total_age'];
			  			$a_image 	= $row['a_image'];
			  			$status 	= $row['status'];
			  			?>
			  				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
								<div class="breadcrumb-title pe-3">Edit About Us Management</div>
								<div class="ps-3">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb mb-0 p-0">
											<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
											</li>
											<li class="breadcrumb-item active" aria-current="page">Edit About Us</li>
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
												<form action="about.php?do=Update" method="POST" enctype="multipart/form-data">
													<div class="row">
														<div class="col-lg-6">
															<div class="mb-3">
																<label for="">Title</label>
																<input type="text" name="title" class="form-control" placeholder="enter title" required autocomplete="off" value="<?php echo $title; ?>">
															</div>

															<div class="mb-3">
																<label for="">Per Year</label>
																<input type="text" name="per_year" class="form-control" placeholder="per year.." required autocomplete="off" value="<?php echo $year; ?>">
															</div>

															<div class="mb-3">
																<label for="">Describe</label>
																<textarea name="describe" class="form-control" id="" cols="30" rows="8" autocomplete="off" placeholder="describe...."><?php echo $descrive; ?></textarea>
															</div>

															
															
														</div>
														<div class="col-lg-6">

															<div class="mb-3">
																<label for="">Status</label>
																<select class="form-select" name="status">
																  <option value="1">Please select the Status</option>
																  <option value="1" <?php if( $status == 1 ) { echo "selected"; } ?>>Active</option>
																  <option value="0" <?php if( $status == 0 ) { echo "selected"; } ?>>InActive</option>
																</select>
															</div>

															<div class="mb-3">
																<label for="">Image</label>
																<br>
																<?php  
														      		if (!empty($a_image)) {
																		echo '<img src="assets/images/aboutUs/' . $a_image . '" style="width: 100%; height:200px;";>';
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
																	<input type="hidden" name="updateAboutId" value="<?php echo $id; ?>">
																	<input type="submit" name="updateAbout" class="btn btn-primary" value="Update About Us">
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
				if (isset($_POST['updateAbout'])) {
					$updateAboutId 		= mysqli_real_escape_string($db, $_POST['updateAboutId']);
					$title 				= mysqli_real_escape_string($db, $_POST['title']);
					$per_year 			= mysqli_real_escape_string($db, $_POST['per_year']);
										
					$status 			= mysqli_real_escape_string($db, $_POST['status']);
					$describe 			= mysqli_real_escape_string($db, $_POST['describe']);
					
					$image 				= mysqli_real_escape_string($db,$_FILES['image']['name']);
					$temp_img 			= $_FILES['image']['tmp_name'];

					// Only Image Chnage
					if (!empty($image)) {

						// Delete Old Image From  Folder
						$oldImgSql = "SELECT * FROM about WHERE id='$updateAboutId'";
						$oldImageQuery = mysqli_query($db, $oldImgSql);

						while ( $row = mysqli_fetch_assoc($oldImageQuery) ) {
							$oldImage 	= $row['m_image'];
							unlink("assets/images/aboutUs/$img" . $oldImage);
						}

						$img = rand(0, 999999) . "_" . $image;
						move_uploaded_file($temp_img, 'assets/images/aboutUs/' . $img);

						$upAboutSql = "UPDATE about SET title='$title', descrive='$describe', year='$per_year', a_image='$img', status='$status' WHERE id='$updateAboutId'";
						$upAboutQuery = mysqli_query($db, $upAboutSql);

						if ($upAboutQuery) {
							header("Location: about.php?do=Manage");
						}
						else {
							die ("Mysql Error." .mysqli_error($db) );
						}
					}
					else if (empty($image)) {

						$upAboutSql = "UPDATE about SET title='$title', descrive='$describe', year='$per_year', status='$status' WHERE id='$updateAboutId'";
						$upAboutQuery = mysqli_query($db, $upAboutSql);

						if ($upAboutQuery) {
							header("Location: about.php?do=Manage");
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
					$trushSql = "UPDATE about SET status=0 WHERE id='$trushId'";
					$trushQuery = mysqli_query( $db, $trushSql );

					if ($trushQuery) {
						header("Location: about.php?do=Manage");
					}
					else {
						die("mysql error" . mysqli_error($db));
					}

				}
			}

			else if ( $do == "ManageTrash" ) { ?>
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Trash About Us Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Trash About Us Manage</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Trash Manage All About Us</h6>
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
									      <th scope="col">Per Year</th>
									      <th scope="col">Firm Total Age</th>
									      <th scope="col">Status</th>
									      <th scope="col">Action</th>
									    </tr>
									  </thead>

									  <tbody>
									  	<?php  
											$aboutSql = "SELECT * FROM about WHERE status=0 ORDER BY title ASC";
									  		$aboutQuery = mysqli_query( $db, $aboutSql );
									  		$aboutCount = mysqli_num_rows($aboutQuery);

									  		if ($aboutCount == 0) { ?>
									  			<div class="alert alert-warning text-center" role="alert">
												  Sorry! No Product Found into the Database.
												</div>
									  		<?php }

									  		else {
									  			$i = 0;

										  		while ($row = mysqli_fetch_assoc($aboutQuery)) {
										  			$id  		= $row['id'];
										  			$title 		= $row['title'];
										  			$descrive 	= $row['descrive'];
										  			$year 		= $row['year'];
										  			$total_age 	= $row['total_age'];
										  			$a_image 	= $row['a_image'];
										  			$status 	= $row['status'];
										  			$i++;
										  			?>

										  			<tr>
												      <th scope="row"><?php echo $i; ?></th>
												      <td>
												      	<?php  
												      		if (!empty($a_image)) {
																echo '<img src="assets/images/aboutUs/' . $a_image . '" style="width: 60px";>';
															}
															else {
																echo 'No Image';
															}
												      	?>
												      </td>
												      <td><?php echo $title; ?></td>
												      <td><?php echo substr($descrive, 0, 15); ?>...</td>
												      <td><?php echo $year; ?></td>
												      <td><?php echo $total_age; ?></td>
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
															      <a href="about.php?do=Edit&uId=<?php echo $id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
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
														        <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Sure?? To Delete <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $title; ?></span></h1>
														        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														      </div>
														      <div class="modal-body">
														        <div class="modal-btn">
														        	<a href="about.php?do=Delete&DId=<?php echo $id; ?>"class="btn btn-danger me-3">Delete</a>
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
					$deleteSql = "DELETE FROM about WHERE id='$deleteId' ";
					$deleteQuery = mysqli_query($db, $deleteSql);

					if ($deleteQuery) {
						header("Location: about.php?do=Manage");
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