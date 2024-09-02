<?php 
	include "inc/header.php";
?>

	<div role="main" class="main shop py-4">

		<div class="container">

			<div class="row">
				<div class="col">
					<div class="featured-boxes">
						<div class="row">
							<div class="col-md-6">
								<div class="featured-box featured-box-primary text-left mt-2">
									<div class="box-content" >
										<h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Seller Login</h4>

										<form action="" method="POST">
                <div class="mb-0">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                </div>
                <div class="input-group form-group">
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="enter your email..." aria-label="emailHelp" aria-describedby="basic-addon2" required autocomplete="off">
                  <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-envelope"></i></span>
                </div>
            

                <div class="mb-0">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                </div>
                <div class="input-group form-group">
                  <input type="password" name="password" class="form-control" id="myInput" placeholder="enter your password..." required autocomplete="off">
                  <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-lock"></i></span>
                </div>

                <div class="form-group form-check">
								    <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="myFunction()">
								    <label class="form-check-label" for="exampleCheck1">Show Password</label>
								    <script>
				                    function myFunction() {
				                      var x = document.getElementById("myInput");
				                      if (x.type === "password") {
				                        x.type = "text";
				                      } else {
				                        x.type = "password";
				                      }
				                    }
				                  </script>
								 </div>

                <div class="form-group">      
                <button type="submit" name="login_btn" class="btn btn-primary btn-lg btn-block">Log in</button>
                </div>
              </form>

              <?php  
								if (isset($_POST['login_btn'])) {
									$userEmail 		= mysqli_real_escape_string($db, $_POST['email']);
									$password 		= mysqli_real_escape_string($db, $_POST['password']);
									$hassedPass 	= sha1($password);

									$sql = "SELECT * FROM users WHERE user_email='$userEmail' AND status=1";
									$findData = mysqli_query($db, $sql);
									$countUser = mysqli_num_rows($findData);

									if ($countUser == 0) { ?>
										<div class="alert alert-danger text-center" role="alert">
										  Sorry! No User found in our System!
										</div>
									<?php }
									
									else {
										while ($row = mysqli_fetch_assoc($findData)) {
											$_SESSION['user_id'] 	= $row['user_id'];
											$fullname 						= $row['user_name'];
											$_SESSION['email'] 		= $row['user_email'];
											$password 						= $row['user_password'];
											$_SESSION['phone']		= $row['user_phone'];
											$role 								= $row['role'];
											$status 							= $row['status'];


											if ($_SESSION['email'] != $userEmail || $password == $hassedPass ) {
												header("Location: index.php");
											}
											else {
												session_destroy();
												header("Location: index.php");
											}

											
										}
									}
									
								}
							?>

									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="featured-box featured-box-primary text-left mt-2">
									<!-- ########## START: MAIN BODY ########## -->
								<div class="card">
									<div class="card-body" style="box-shadow: 1px 10px 15px #ccc; border-top: 4px solid #08c;; border-radius: 5px; color: #000; background: #F7F7F7; font-size: 16px;">

										<h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Seller Register An Account</h4>
 
										<form action="" method="POST" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-6">
													<div class="form-group">
														<label for="">Full Name</label>
														<input type="text" name="fullname" class="form-control" required autocomplete="off" autofocus placeholder="full name..">
													</div>

													<div class="form-group">
														<label for="">Email Address</label>
														<input type="email" name="email" class="form-control" required autocomplete="off" autofocus placeholder="email address..">
													</div>

													<div class="form-group">
														<label for="">Password</label>
														<input type="password" name="password" class="form-control" required autocomplete="off" autofocus placeholder="password..">
													</div>

													<div class="form-group">
														<label for="">Re-type Password</label>
														<input type="password" name="re_password" class="form-control" required autocomplete="off" autofocus placeholder="re-type password..">
													</div>

													<div class="form-group">
														<label for="">Phone No.</label>
														<input type="tel" name="phone" class="form-control" required autocomplete="off" autofocus  placeholder="phone no..">
													</div>
												</div>

												<div class="col-lg-6">
													

													<div class="form-group">
														<label for="">Address</label>
														<textarea name="address" class="form-control" autocomplete="off" autofocus cols="30" rows="4"  placeholder="address.."></textarea>
													</div>

													<div class="mb-3">
														<!-- User Role -->
														<input type="hidden" value="3" name="role">
													</div>

													<div class="mb-3">
														<!-- Status -->
														<input type="hidden" value="1" name="status">
													</div>

													<div class="form-group">
														<label for="">Image</label>
														<input type="file" name="image" class="form-control-file" >
													</div>

													<div class="form-group">
														<input type="submit" name="addUser" class="btn btn-primary btn-lg btn-block">
													</div>

													
												</div>
											</div>
										</form>

										<?php  
											if (isset($_POST['addUser'])) {
												$fullname 		= mysqli_real_escape_string($db, $_POST['fullname']);
												$email 			= mysqli_real_escape_string($db, $_POST['email']);
												$password 		= mysqli_real_escape_string($db, $_POST['password']);
												$re_password 	= mysqli_real_escape_string($db, $_POST['re_password']);
												$phone 			= mysqli_real_escape_string($db, $_POST['phone']);
												$address 		= mysqli_real_escape_string($db, $_POST['address']);
												$role 			= mysqli_real_escape_string($db, $_POST['role']);
												$status 		= mysqli_real_escape_string($db, $_POST['status']);

												$image 			= mysqli_real_escape_string($db,$_FILES['image']['name']);
												$temp_image 	= $_FILES['image']['tmp_name'];

												if ($password == $re_password) {
													$hassedPass = sha1($password);

													if (!empty($image)) {
														$img = rand(1, 9999999). "-" . $image;
														move_uploaded_file($temp_image, 'admin/assets/images/seller/' . $img);
													}
													else {
														$img = '';
													}
													
													$addUserSql = "INSERT INTO users (user_name, user_email, user_password,	user_phone,	user_address, role, status, user_image,	join_date) VALUES ('$fullname', '$email', '$hassedPass', '$phone', '$address', '$role', '$status', '$img', now() )";
													$addUserQuery = mysqli_query($db, $addUserSql);

													if ($addUserQuery) {
														header("Location: index.php");
													}
													else {
														die("mysqli Error!" . mysqli_error($db));
													}

												}

												else { ?>
													<div class="alert alert-warning" role="alert">
													  Please enter same password and repassword!!
													</div>
												<?php }
											}
										?>

									</div>
								</div>				
								<!-- ########## END: MAIN BODY ########## -->
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>

	</div>

<?php 
	include "inc/footer.php";
?>