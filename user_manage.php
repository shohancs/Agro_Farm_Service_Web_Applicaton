<?php 
	include "inc/header.php";
?>

	<div role="main" class="main">

		<?php  
			if (isset($_GET['uid'])) {
				$update_us_id = $_GET['uid'];
				$up_idSql = "SELECT * FROM users WHERE user_id='$update_us_id'";
				$up_idQuery = mysqli_query($db, $up_idSql);

				while ($row = mysqli_fetch_assoc($up_idQuery)) {
					$user_id 		= $row['user_id'];
		  			$user_name 		= $row['user_name'];
		  			$user_email 	= $row['user_email'];
		  			$user_phone 	= $row['user_phone'];
		  			$user_address 	= $row['user_address'];
		  			$role 			= $row['role'];
		  			$status 		= $row['status'];
		  			$user_image 	= $row['user_image'];
		  			$join_date 		= $row['join_date'];
					?>

					<!-- ########## START: TOP HEADING ########## -->
					<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md"
					style="background-image: linear-gradient(to left, rgba(0,0,0,0.4), rgba(0,0,0,0.4)) ,url(assets/images/breadcrumb.jpg);
								background-repeat: no-repeat;
								background-size: cover;
								background-position: center;
								
								">
						<div class="container">
							<div class="row">
								<div class="col-md-12 align-self-center p-static order-2 text-center">

									<h1 class="text-white font-weight-bold text-8">Update <span style="color: red;"><?php echo $user_email; ?></span> Info</h1>
								</div>

								<div class="col-md-12 align-self-center order-1">

									<ul class="breadcrumb d-block text-center" >
										<li><a href="index.php" class="text-white">HOME</a></li>
										<li class="active text-white" >UPDATE USER INFO</li>
									</ul>
								</div>					
							</div>
						</div>
					</section>
					<!-- ########## END: TOP HEADING ########## -->

					<section>
						<div class="container py-5">
							<div class="row pb-5">
								<div class="col-lg-12">
									<!-- ########## START: MAIN BODY ########## -->
									<div class="card">
										<div class="card-body" style="box-shadow: 1px 10px 15px #ccc; border-top: 4px solid #08c;; border-radius: 5px; color: #000; background: #F7F7F7; font-size: 16px;">

											<form action="" method="POST" enctype="multipart/form-data">
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group">
															<label for="">Full Name</label>
															<input type="text" name="fname" class="form-control" required autocomplete="off" autofocus value="<?php echo $user_name; ?>">
														</div>

														<div class="form-group">
															<label for="">Password</label>
															<input type="password" name="password" class="form-control" autocomplete="off" autofocus placeholder="password..">
														</div>

														<div class="form-group">
															<label for="">Re-type Password</label>
															<input type="password" name="re_password" class="form-control" autocomplete="off" autofocus placeholder="re-type password..">
														</div>
													</div>

													<div class="col-lg-4">
														<div class="form-group">
															<label for="">Phone No.</label>
															<input type="tel" name="phone" class="form-control" required autocomplete="off" autofocus  value="<?php echo $user_phone; ?>">
														</div>

														<div class="form-group">
															<label for="">Address</label>
															<textarea name="address" class="form-control" autocomplete="off" autofocus cols="30" rows="7"><?php echo $user_address; ?></textarea>
														</div>

														
													</div>

													<div class="col-lg-4">

														<div class="mb-3">
															<!-- User Role -->
															<input type="hidden" value="<?php echo $role; ?>" name="role">
														</div>

														<div class="mb-3">
															<!-- Status -->
															<input type="hidden" value="1" name="status">
														</div>

														<div class="form-group">
															<label for="">Image</label>
															<br>
															<?php  
													      		if (!empty($user_image)) {
																	echo '<img src="admin/assets/images/users/' . $user_image . '" style="width: 100%; height: 200px;">';
																}
																else {
																	echo "Sorry! No Image Uploaded.";
																}
													      	?>	
													      	<br><br>
															<input type="file" name="image" class="form-control-file">
														</div>

														<div class="form-group">
															<input type="hidden" name="updateUserId" value="<?php echo $user_id; ?>">
															<input type="submit" name="updateUser" class="btn btn-primary btn-lg btn-block">
														</div>
													</div>
												</div>
											</form>

											<?php  
					if (isset($_POST['updateUser'])) {
					$updateUserId 	= mysqli_real_escape_string($db, $_POST['updateUserId']);
					$fname 			= mysqli_real_escape_string($db, $_POST['fname']);
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
								unlink("admin/assets/images/users/$img" . $oldImage);
							}

							$img = rand(0, 999999) . "_" . $image;
							move_uploaded_file($temp_img, 'admin/assets/images/users/' . $img);

							$updateUserSql = "UPDATE users SET user_name='$fname', user_password='$hassedPass', user_phone='$phone', user_address='$address', role='$role', status='$status', user_image='$img' WHERE user_id='$updateUserId'";
							$upateUserQuery = mysqli_query($db, $updateUserSql);

							if ($upateUserQuery) {
								header("Location: index.php");
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
								unlink("admin/assets/images/users/$img" . $oldImage);
							}

						$img = rand(0, 999999) . "_" . $image;
						move_uploaded_file($temp_img, 'admin/assets/images/users/' . $img);

						$updateUserSql = "UPDATE users SET user_name='$fname', user_phone='$phone', user_address='$address', role='$role', status='$status', user_image='$img' WHERE user_id='$updateUserId'";
						$upateUserQuery = mysqli_query($db, $updateUserSql);

						if ($upateUserQuery) {
							header("Location: index.php");
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
								header("Location: index.php");
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
							header("Location: index.php");
						}
						else {
							die ("Mysql Error." .mysqli_error($db) );
						}

					}

}
											?>

											

										</div>
									</div>				
									<!-- ########## END: MAIN BODY ########## -->
								</div>
							</div>
						</div>
					</section>
				<?php }
			}
		?>




	</div>

<?php 
	include "inc/footer.php";
?>