<?php  
	include "inc/header.php";
?>

<div class="page-wrapper">
	<div class="page-content">
		<?php  
			$do = isset($_GET['do']) ? $_GET['do'] : "Manage";

			if ( $do == "Manage" ) { ?>
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Users Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Users Manage</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Manage All Users</h6>
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
									      <th scope="col">Role</th>
									      <th scope="col">Status</th>
									      <th scope="col">Join date</th>
									      <th scope="col">Action</th>
									    </tr>
									  </thead>

									  <tbody>
									  	<?php  
									  		$userSql = "SELECT * FROM users WHERE role=2 AND status=1 ORDER BY user_name ASC";
									  		$userQuery = mysqli_query( $db, $userSql );
									  		$userCount = mysqli_num_rows($userQuery);

									  		if ($userCount == 0) { ?>
									  			<div class="alert alert-warning text-center" role="alert">
												  Sorry! No User Found into the Database.
												</div>
									  		<?php }

									  		else {
									  			$i = 0;

										  		while ($row = mysqli_fetch_assoc($userQuery)) {
										  			$user_id 		= $row['user_id'];
										  			$user_name 		= $row['user_name'];
										  			$user_email 	= $row['user_email'];
										  			$user_phone 	= $row['user_phone'];
										  			$user_address 	= $row['user_address'];
										  			$role 			= $row['role'];
										  			$status 		= $row['status'];
										  			$user_image 	= $row['user_image'];
										  			$join_date 		= $row['join_date'];
										  			$i++;
										  			?>

										  			<tr>
												      <th scope="row"><?php echo $i; ?></th>
												      <td>
												      	<?php  
												      		if (!empty($user_image)) {
																echo '<img src="assets/images/users/' . $user_image . '" style="width: 60px";>';
															}
															else {
																echo '<img src="assets/images/users/default.png" style="width: 60px";>';
															}
												      	?>
												      </td>
												      <td><?php echo $user_name; ?></td>
												      <td><?php echo $user_email; ?></td>
												      <td><?php echo $user_phone; ?></td>
												      <td><?php echo $user_address; ?></td>
												      <td>
												      	<?php  
												      		if ($role == 1) { ?>
												      			<span class="badge text-bg-success">ADMIN</span>
												      		<?php }
												      		else if ($role == 2) { ?>
												      			<span class="badge text-bg-primary">USER</span>
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
												      <td><?php echo $join_date; ?></td>
												      <td>
												      	<div class="action-btn">
															<ul>
															    <li>
															      <a href="users.php?do=Edit&uId=<?php echo $user_id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
															    </li>
															    <li>
															      <a href=""  data-bs-toggle="modal" data-bs-target="#uId<?php echo $user_id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
															    </li>
															</ul>
														</div>

														<!-- Modal Start -->
														<div class="modal fade" id="uId<?php echo $user_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
														  <div class="modal-dialog">
														    <div class="modal-content">
														      <div class="modal-header">
														        <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Sure?? To Move <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $user_name; ?></span> Trash folder!!</h1>
														        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														      </div>
														      <div class="modal-body">
														        <div class="modal-btn">
														        	<a href="users.php?do=Trash&tId=<?php echo $user_id; ?>"class="btn btn-danger me-3">Trash</a>
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

			else if ( $do == "adminManage" ) { ?>
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Admin Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Admin Manage</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Manage Admin</h6>
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
									      <th scope="col">Role</th>
									      <th scope="col">Status</th>
									      <th scope="col">Join date</th>
									      <th scope="col">Action</th>
									    </tr>
									  </thead>

									  <tbody>
									  	<?php  
									  		$userSql = "SELECT * FROM users WHERE role=1 AND status=1 ORDER BY user_name ASC";
									  		$userQuery = mysqli_query( $db, $userSql );
									  		$userCount = mysqli_num_rows($userQuery);

									  		if ($userCount == 0) { ?>
									  			<div class="alert alert-warning text-center" role="alert">
												  Sorry! No User Found into the Database.
												</div>
									  		<?php }

									  		else {
									  			$i = 0;

										  		while ($row = mysqli_fetch_assoc($userQuery)) {
										  			$user_id 		= $row['user_id'];
										  			$user_name 		= $row['user_name'];
										  			$user_email 	= $row['user_email'];
										  			$user_password 	= $row['user_password'];
										  			$user_phone 	= $row['user_phone'];
										  			$user_address 	= $row['user_address'];
										  			$role 			= $row['role'];
										  			$status 		= $row['status'];
										  			$user_image 	= $row['user_image'];
										  			$join_date 		= $row['join_date'];
										  			$i++;
										  			?>

										  			<tr>
												      <th scope="row"><?php echo $i; ?></th>
												      <td>
												      	<?php  
												      		if (!empty($user_image)) {
																echo '<img src="assets/images/users/' . $user_image . '" style="width: 60px";>';
															}
															else {
																echo '<img src="assets/images/users/default.png" style="width: 60px";>';
															}
												      	?>
												      </td>
												      <td><?php echo $user_name; ?></td>
												      <td><?php echo $user_email; ?></td>
												      <td><?php echo $user_phone; ?></td>
												      <td><?php echo $user_address; ?></td>
												      <td>
												      	<?php  
												      		if ($role == 1) { ?>
												      			<span class="badge text-bg-success">ADMIN</span>
												      		<?php }
												      		else if ($role == 2) { ?>
												      			<span class="badge text-bg-primary">USER</span>
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
												      <td><?php echo $join_date; ?></td>
												      <td>
												      	<div class="action-btn">
															<ul>
															    <li>
															      <a href="users.php?do=Edit&uId=<?php echo $user_id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
															    </li>
															    <li>
															      <a href=""  data-bs-toggle="modal" data-bs-target="#uId<?php echo $user_id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
															    </li>
															</ul>
														</div>

														<!-- Modal Start -->
														<div class="modal fade" id="uId<?php echo $user_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
														  <div class="modal-dialog">
														    <div class="modal-content">
														      <div class="modal-header">
														        <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Sure?? To Move <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $user_name; ?></span> Trash folder!!</h1>
														        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														      </div>
														      <div class="modal-body">
														        <div class="modal-btn">
														        	<a href="users.php?do=Trash&tId=<?php echo $user_id; ?>"class="btn btn-danger me-3">Trash</a>
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

			else if ( $do == "sellerManage" ) { ?>
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Seller Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Seller Manage</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Manage Seller</h6>
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
									      <th scope="col">Role</th>
									      <th scope="col">Status</th>
									      <th scope="col">Join date</th>
									      <th scope="col">Action</th>
									    </tr>
									  </thead>

									  <tbody>
									  	<?php  
									  		$userSql = "SELECT * FROM users WHERE role=3 AND status=1 ORDER BY user_name ASC";
									  		$userQuery = mysqli_query( $db, $userSql );
									  		$userCount = mysqli_num_rows($userQuery);

									  		if ($userCount == 0) { ?>
									  			<div class="alert alert-warning text-center" role="alert">
												  Sorry! No User Found into the Database.
												</div>
									  		<?php }

									  		else {
									  			$i = 0;

										  		while ($row = mysqli_fetch_assoc($userQuery)) {
										  			$user_id 		= $row['user_id'];
										  			$user_name 		= $row['user_name'];
										  			$user_email 	= $row['user_email'];
										  			$user_password 	= $row['user_password'];
										  			$user_phone 	= $row['user_phone'];
										  			$user_address 	= $row['user_address'];
										  			$role 			= $row['role'];
										  			$status 		= $row['status'];
										  			$user_image 	= $row['user_image'];
										  			$join_date 		= $row['join_date'];
										  			$i++;
										  			?>

										  			<tr>
												      <th scope="row"><?php echo $i; ?></th>
												      <td>
												      	<?php  
												      		if (!empty($user_image)) {
																echo '<img src="assets/images/seller/' . $user_image . '" style="width: 60px";>';
															}
															else {
																echo '<img src="assets/images/users/default.png" style="width: 60px";>';
															}
												      	?>
												      </td>
												      <td><?php echo $user_name; ?></td>
												      <td><?php echo $user_email; ?></td>
												      <td><?php echo $user_phone; ?></td>
												      <td><?php echo $user_address; ?></td>
												      <td>
												      	<?php  
												      		if ($role == 1) { ?>
												      			<span class="badge text-bg-success">ADMIN</span>
												      		<?php }
												      		else if ($role == 2) { ?>
												      			<span class="badge text-bg-primary">USER</span>
												      		<?php }
												      		else if ($role == 3) { ?>
												      			<span class="badge text-bg-primary">Seller</span>
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
												      <td><?php echo $join_date; ?></td>
												      <td>
												      	<div class="action-btn">
															<ul>
															    <li>
															      <a href="users.php?do=Edit&uId=<?php echo $user_id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
															    </li>
															    <li>
															      <a href=""  data-bs-toggle="modal" data-bs-target="#uId<?php echo $user_id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
															    </li>
															</ul>
														</div>

														<!-- Modal Start -->
														<div class="modal fade" id="uId<?php echo $user_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
														  <div class="modal-dialog">
														    <div class="modal-content">
														      <div class="modal-header">
														        <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Sure?? To Move <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $user_name; ?></span> Trash folder!!</h1>
														        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														      </div>
														      <div class="modal-body">
														        <div class="modal-btn">
														        	<a href="users.php?do=Trash&tId=<?php echo $user_id; ?>"class="btn btn-danger me-3">Trash</a>
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
					<div class="breadcrumb-title pe-3">Users Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add User</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Add New Users</h6>
				<hr>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<div id="example3_wrapper" class="dataTables_wrapper dt-bootstrap5">
								<div class="row">
									
									<!-- ########## START: FORM ########## -->
									<form action="users.php?do=Store" method="POST" enctype="multipart/form-data">
										<div class="row">
											<div class="col-lg-4">
												<div class="mb-3">
													<label for="">Full Name</label>
													<input type="text" name="fname" class="form-control" placeholder="enter user name" required autocomplete="off">
												</div>

												<div class="mb-3">
													<label for="">Email Address</label>
													<input type="email" name="email" class="form-control" placeholder="enter user email" required autocomplete="off">
												</div>

												<div class="mb-3">
													<label for="">Password</label>
													<input type="password" name="password" class="form-control" placeholder="**********" required autocomplete="off">
												</div>

												<div class="mb-3">
													<label for="">Re-Password</label>
													<input type="password" name="re_password" class="form-control" placeholder="**********" required autocomplete="off">
												</div>
											</div>
											<div class="col-lg-4">
												<div class="mb-3">
													<label for="">Phone No.</label>
													<input type="tel" name="phone" class="form-control" placeholder="enter phone no.." required autocomplete="off">
												</div>

												<div class="mb-3">
													<label for="">Address</label>
													<textarea name="address" class="form-control" id="" cols="30" rows="7" autocomplete="off" placeholder="address...."></textarea>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="mb-3">
													<label for="">Role</label>
													<select class="form-select" name="role">
													  <option value="2">Please select the user role</option>
													  <option value="1">Admin</option>
													  <option value="2">User</option>
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

												<div class="mb-3">
													<label for="">Image</label>
													<input class="form-control" name="image" type="file">
												</div>

												<div class="mb-3">
													<div class="d-grid gap-2">
														<input type="submit" name="addUser" class="btn btn-primary" value="Add New User">
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
				if (isset($_POST['addUser'])) {
					$fname 			= mysqli_real_escape_string($db, $_POST['fname']);
					$email 			= mysqli_real_escape_string($db, $_POST['email']);
					$password 		= mysqli_real_escape_string($db, $_POST['password']);
					$re_password 	= mysqli_real_escape_string($db, $_POST['re_password']);
					$phone 			= mysqli_real_escape_string($db, $_POST['phone']);
					$address 		= mysqli_real_escape_string($db, $_POST['address']);
					$role 			= mysqli_real_escape_string($db, $_POST['role']);
					$status 		= mysqli_real_escape_string($db, $_POST['status']);
					
					$image 			= mysqli_real_escape_string($db,$_FILES['image']['name']);
					$temp_img 		= $_FILES['image']['tmp_name'];


					if ($password == $re_password) {
						$hassedPass = sha1($password);

						if (!empty($image)) {
							$img = rand(0, 999999) . "_" . $image;
							move_uploaded_file($temp_img, 'assets/images/users/' . $img);
						}
						else {
							$img = '';
						}

						$addSql = "INSERT INTO users (user_name, user_email, user_password,	user_phone,	user_address, role, status, user_image,	join_date) VALUES('$fname', '$email', '$hassedPass', '$phone', '$address', '$role', '$status', '$img', now())";
						$addQuery = mysqli_query($db, $addSql);

						if ($addQuery) {
							header("Location: users.php?do=Manage");
						}
						else {
							die ("Mysql Error." .mysqli_error($db) );
						}
					}
					else { ?>
						<div class="alert alert-warning text-center" role="alert">
						  Sorry! please password and repassword use same input.
						</div>
					<?php }
				}
			}

			else if ( $do == "Edit" ) {
				if (isset($_GET['uId'])) {
					$upId = $_GET['uId'];
					$upReadSql = "SELECT * FROM users WHERE user_id='$upId'";
					$upReadQuery = mysqli_query($db, $upReadSql);

					while ( $row = mysqli_fetch_assoc($upReadQuery) ) {
						$user_id 		= $row['user_id'];
			  			$user_name 		= $row['user_name'];
			  			$user_email 	= $row['user_email'];
			  			$user_password 	= $row['user_password'];
			  			$user_phone 	= $row['user_phone'];
			  			$user_address 	= $row['user_address'];
			  			$role 			= $row['role'];
			  			$status 		= $row['status'];
			  			$user_image 	= $row['user_image'];
			  			?>
			  				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
								<div class="breadcrumb-title pe-3">Users Management</div>
								<div class="ps-3">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb mb-0 p-0">
											<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
											</li>
											<li class="breadcrumb-item active" aria-current="page">Edit User</li>
										</ol>
									</nav>
								</div>
							</div>
							<!--end breadcrumb-->
							<h6 class="mb-0 text-uppercase">Update <span style="color: firebrick;"><?php echo $user_email; ?></span> Info</h6>
							<hr>
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<div id="example3_wrapper" class="dataTables_wrapper dt-bootstrap5">
											<div class="row">
												
												<!-- ########## START: FORM ########## -->
												<form action="users.php?do=Update" method="POST" enctype="multipart/form-data">
													<div class="row">
														<div class="col-lg-4">
															<div class="mb-3">
																<label for="">Full Name</label>
																<input type="text" name="fname" class="form-control" placeholder="enter user name" required autocomplete="off" value="<?php echo $user_name; ?>">
															</div>

															<div class="mb-3">
																<label for="">Phone No.</label>
																<input type="tel" name="phone" class="form-control" placeholder="enter phone no.." required autocomplete="off" value="<?php echo $user_phone; ?>">
															</div>

															<div class="mb-3">
																<label for="">Password</label>
																<input type="password" name="password" class="form-control" placeholder="**********" autocomplete="off">
															</div>

															<div class="mb-3">
																<label for="">Re-Password</label>
																<input type="password" name="re_password" class="form-control" placeholder="**********" autocomplete="off">
															</div>
														</div>
														<div class="col-lg-4">
															<div class="mb-3">
																<label for="">Address</label>
																<textarea name="address" class="form-control" id="" cols="30" rows="4" autocomplete="off" placeholder="address...."><?php echo $user_address; ?></textarea>
															</div>

															<div class="mb-3">
																<label for="">Role</label>
																<select class="form-select" name="role">
																  <option>Please select the user role</option>
																  <option value="1" <?php if( $role == 1 ){ echo "selected"; } ?>>Admin</option>
																  <option value="2" <?php if( $role == 2 ){ echo "selected"; } ?>>User</option>
																</select>
															</div>

															<div class="mb-3">
																<label for="">Status</label>
																<select class="form-select" name="status">
																  <option value="">Please select the Status</option>
																  <option value="1" <?php if( $status == 1 ){ echo "selected"; } ?>>Active</option>
																  <option value="0" <?php if( $status == 0 ){ echo "selected"; } ?>>InActive</option>
																</select>
															</div>
														</div>
														<div class="col-lg-4">
															

															<div class="mb-3">
																<label for="">Image</label>
																<br><br>
																<?php  
														      		if (!empty($user_image)) {
																		echo '<img src="assets/images/users/' . $user_image . '" style="width: 100%; height: 200px;">';
																	}
																	else {
																		echo "Sorry! No Image Uploaded.";
																	}
														      	?>
														      	<br><br>
																<input class="form-control" name="image" type="file">
															</div>

															<div class="mb-3">
																<div class="d-grid gap-2">
																	<input type="hidden" name="updateUserId" value="<?php echo $user_id; ?>">
																	<input type="submit" name="upUser" class="btn btn-primary" value="Update New User">
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
				if (isset($_POST['upUser'])) {
					$updateUserId 	= mysqli_real_escape_string($db, $_POST['updateUserId']);
					$fname 			= mysqli_real_escape_string($db, $_POST['fname']);
					$email 			= mysqli_real_escape_string($db, $_POST['email']);
					$password 		= mysqli_real_escape_string($db, $_POST['password']);
					$re_password 	= mysqli_real_escape_string($db, $_POST['re_password']);
					$phone 			= mysqli_real_escape_string($db, $_POST['phone']);
					$address 		= mysqli_real_escape_string($db, $_POST['address']);
					$role 			= mysqli_real_escape_string($db, $_POST['role']);
					$status 		= mysqli_real_escape_string($db, $_POST['status']);
					
					$image 			= mysqli_real_escape_string($db,$_FILES['image']['name']);
					$temp_img 		= $_FILES['image']['tmp_name'];

					// Only Password & Only Image Chnage
					if (!empty($password) && !empty($image)) {
						if ($password == $re_password) {
							$hassedPass = sha1($password);

							// Delete Old Image From  Folder
							$oldImgSql = "SELECT * FROM users WHERE user_id='$updateUserId'";
							$oldImageQuery = mysqli_query($db, $oldImgSql);

							while ( $row = mysqli_fetch_assoc($oldImageQuery) ) {
								$oldImage 	= $row['user_image'];
								unlink("assets/images/users/$img" . $oldImage);
							}

							$img = rand(0, 999999) . "_" . $image;
							move_uploaded_file($temp_img, 'assets/images/users/' . $img);

							$updateUserSql = "UPDATE users SET user_name='$fname', user_password='$hassedPass', user_phone='$phone', user_address='$address', role='$role', status='$status', user_image='$img' WHERE user_id='$updateUserId'";
							$upateUserQuery = mysqli_query($db, $updateUserSql);

							if ($upateUserQuery) {
								header("Location: users.php?do=Manage");
							}
							else {
								die ("Mysql Error." .mysqli_error($db) );
							}
						}
						else { ?>
							<div class="alert alert-warning text-center" role="alert">
							  Sorry! please password and repassword use same input.
							</div>
						<?php }
					}

					// Not Password & Only Image Chnage
					else if (empty($password) && !empty($image)) {

						// Delete Old Image From  Folder
							$oldImgSql = "SELECT * FROM users WHERE user_id='$updateUserId'";
							$oldImageQuery = mysqli_query($db, $oldImgSql);

							while ( $row = mysqli_fetch_assoc($oldImageQuery) ) {
								$oldImage 	= $row['user_image'];
								unlink("assets/images/users/$img" . $oldImage);
							}

						$img = rand(0, 999999) . "_" . $image;
						move_uploaded_file($temp_img, 'assets/images/users/' . $img);

						$updateUserSql = "UPDATE users SET user_name='$fname', user_phone='$phone', user_address='$address', role='$role', status='$status', user_image='$img' WHERE user_id='$updateUserId'";
						$upateUserQuery = mysqli_query($db, $updateUserSql);

						if ($upateUserQuery) {
							header("Location: users.php?do=Manage");
						}
						else {
							die ("Mysql Error." .mysqli_error($db) );
						}

					}

					// Only Password & Not Image Chnage
					else if (!empty($password) && empty($image)) {
						if ($password == $re_password) {
							$hassedPass = sha1($password);

							$updateUserSql = "UPDATE users SET user_name='$fname', user_password='$hassedPass', user_phone='$phone', user_address='$address', role='$role', status='$status' WHERE user_id='$updateUserId'";
							$upateUserQuery = mysqli_query($db, $updateUserSql);

							if ($upateUserQuery) {
								header("Location: users.php?do=Manage");
							}
							else {
								die ("Mysql Error." .mysqli_error($db) );
							}
						}
						else { ?>
							<div class="alert alert-warning text-center" role="alert">
							  Sorry! please password and repassword use same input.
							</div>
						<?php }
					}

					// Not Password & Not Image Chnage
					else if (empty($password) && empty($image)) {

						$updateUserSql = "UPDATE users SET user_name='$fname', user_phone='$phone', user_address='$address', role='$role', status='$status' WHERE user_id='$updateUserId'";
						$upateUserQuery = mysqli_query($db, $updateUserSql);

						if ($upateUserQuery) {
							header("Location: users.php?do=Manage");
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
					$trushSql = "UPDATE users SET status=0 WHERE user_id='$trushId'";
					$trushQuery = mysqli_query( $db, $trushSql );

					if ($trushQuery) {
						header("Location: users.php?do=Manage");
					}
					else {
						die("mysql error" . mysqli_error($db));
					}

				}
			}

			else if ( $do == "ManageTrash" ) { ?>
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Users Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Trash Manage</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Manage All Trash</h6>
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
									      <th scope="col">Role</th>
									      <th scope="col">Status</th>
									      <th scope="col">Join date</th>
									      <th scope="col">Action</th>
									    </tr>
									  </thead>

									  <tbody>
									  	<?php  
									  		$userSql = "SELECT * FROM users WHERE status=0 ORDER BY user_name ASC";
									  		$userQuery = mysqli_query( $db, $userSql );
									  		$userCount = mysqli_num_rows($userQuery);

									  		if ($userCount == 0) { ?>
									  			<div class="alert alert-warning text-center" role="alert">
												  Sorry! No User Found into the Database.
												</div>
									  		<?php }

									  		else {
									  			$i = 0;

										  		while ($row = mysqli_fetch_assoc($userQuery)) {
										  			$user_id 		= $row['user_id'];
										  			$user_name 		= $row['user_name'];
										  			$user_email 	= $row['user_email'];
										  			$user_phone 	= $row['user_phone'];
										  			$user_address 	= $row['user_address'];
										  			$role 			= $row['role'];
										  			$status 		= $row['status'];
										  			$user_image 	= $row['user_image'];
										  			$join_date 		= $row['join_date'];
										  			$i++;
										  			?>

										  			<tr>
												      <th scope="row"><?php echo $i; ?></th>
												      <td>
												      	<?php  
												      		if (!empty($user_image)) {
																echo '<img src="assets/images/users/' . $user_image . '" style="width: 60px";>';
															}
															else {
																echo '<img src="assets/images/users/default.png" style="width: 60px";>';
															}
												      	?>
												      </td>
												      <td><?php echo $user_name; ?></td>
												      <td><?php echo $user_email; ?></td>
												      <td><?php echo $user_phone; ?></td>
												      <td><?php echo $user_address; ?></td>
												      <td>
												      	<?php  
												      		if ($role == 1) { ?>
												      			<span class="badge text-bg-success">ADMIN</span>
												      		<?php }
												      		else if ($role == 2) { ?>
												      			<span class="badge text-bg-primary">USER</span>
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
												      <td><?php echo $join_date; ?></td>
												      <td>
												      	<div class="action-btn">
															<ul>
															    <li>
															      <a href="users.php?do=Edit&uId=<?php echo $user_id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
															    </li>
															    <li>
															      <a href=""  data-bs-toggle="modal" data-bs-target="#delId<?php echo $user_id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
															    </li>
															</ul>
														</div>

														<!-- Modal Start -->
														<div class="modal fade" id="delId<?php echo $user_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
														  <div class="modal-dialog">
														    <div class="modal-content">
														      <div class="modal-header">
														        <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Sure?? To Delete <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $user_name; ?></span> !!</h1>
														        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														      </div>
														      <div class="modal-body">
														        <div class="modal-btn">
														        	<a href="users.php?do=Delete&DId=<?php echo $user_id; ?>"class="btn btn-danger me-3">Delete</a>
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
					$deleteSql = "DELETE FROM users WHERE user_id='$deleteId' ";
					$deleteQuery = mysqli_query($db, $deleteSql);

					if ($deleteQuery) {
						header("Location: users.php?do=Manage");
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