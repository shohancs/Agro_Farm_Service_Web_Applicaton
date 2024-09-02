<div class="header-row">
									<div class="header-nav pt-1">
										<div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
											<nav class="collapse">
												<ul class="nav nav-pills" id="mainNav">
													<li class="">
														<a class="dropdown-item dropdown-toggle active" href="index.php">
															Home
														</a>
													</li>

													<li class="">
														<a class="dropdown-item dropdown-toggle" href="aboutUs.php">
															About Us
														</a>
													</li>

													<li class="">
														<a class="dropdown-item dropdown-toggle" href="#blog">
															Blog
														</a>
													</li>

													<li class="">
														<a class="dropdown-item dropdown-toggle" href="#contact">
															Contact Us
														</a>
													</li>

													<!-- For users login or nor -->
													<?php  
														if (!empty($_SESSION['user_id'])) { 

															$user_id = $_SESSION['user_id'];
															$readUId_Sql = "SELECT * FROM users WHERE status=1 AND user_id='$user_id'";
															$readUId_Query = mysqli_query($db, $readUId_Sql);

															while( $row = mysqli_fetch_assoc($readUId_Query) ) {
																$user_id 				= $row['user_id'];
																$fullname 				= $row['user_name'];
																$_SESSION['email'] 		= $row['user_email'];
																$password 				= $row['user_password'];
																$role 					= $row['role'];
																$status 				= $row['status'];
																$user_image 			= $row['user_image'];
																?>
																	<li class="dropdown">
																		<a class="dropdown-item dropdown-toggle" href="">
																			<div class="d-flex ">
																				<div>
																					<?php  
																			      		if (!empty($user_image)) {
																							echo '<img src="admin/assets/images/users/' . $user_image . '" style="width: 38px;margin: 0px 10px;">';
																						}
																						else {
																							echo '<img src="admin/assets/images/users/default.png" style="width: 50px;margin: 0px 10px;">';
																						}
																			      	?>
																				</div>
																				<div>
																					<?php echo $fullname; ?>
																				</div>
																			</div>
																			
																		</a>
																		<ul class="dropdown-menu">
																			<li><a class="dropdown-item" href="user_manage.php?uid=<?php echo $_SESSION['user_id']; ?>">Profile Update</a></li>
																			<li><a class="dropdown-item" href="order_history.php">Order List</a></li>
																			<li><a class="dropdown-item" href="logout.php">Log Out</a></li>
																		</ul>
																	</li>

																	<?php  
																		if ($_SESSION['user_id'] && $role == 3) { ?>
																			<li class="">
																				<a class="dropdown-item dropdown-toggle" href="sellerDashboard.php">
																					Seller Dashboard
																				</a>
																			</li>
																		<?php }
																		else { ?>
																			<li class="">
														<a class="dropdown-item dropdown-toggle" href="seller.php">
															Seller Account
														</a>
													</li>
																		<?php }																	?>
																<?php
															}

															?>
															
														<?php }

														else { ?>
															<li class="dropdown">
																<a class="dropdown-item dropdown-toggle" href="login.php">
																	<i class="fa-solid fa-arrow-right-to-bracket px-1"></i> Login
																</a>
															</li>

															<li class="dropdown">
																<a class="dropdown-item dropdown-toggle" href="register.php">
																	<i class="fa-regular fa-address-card px-1"></i> Regsiter
																</a>
															</li>

															<li class="">
																<a class="dropdown-item dropdown-toggle" href="seller.php">
																	Seller Account
																</a>
															</li>
															<?php  

															?>

														<?php }
													?>
													<!-- For users login or nor -->

													
												</ul>
											</nav>
										</div>
										
										<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
											<i class="fas fa-bars"></i>
										</button>
									</div>
								</div>

