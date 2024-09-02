<header id="header" class="side-header d-flex">
				<div class="header-body">
					<div class="header-container container d-flex h-100" style="background: azure;">
						<div class="header-column flex-row flex-lg-column justify-content-center h-100">
							<div class="header-row flex-row justify-content-start justify-content-lg-center py-lg-5">
								
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
																	<div class="d-flex align-self-center">
																		<div>
																			<?php  
																	      		if (!empty($user_image)) {
																					echo '<img src="admin/assets/images/seller/' . $user_image . '" style="width: 50px;margin: 0px 10px;">';
																				}
																				else {
																					echo '<img src="admin/assets/images/seller/default.png" style="width: 50px;margin: 0px 10px;">';
																				}
																	      	?>
																		</div>
																		<div>
																			<h3><?php echo $fullname; ?></h3>
																		</div>
																	</div>
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

														<?php }
													?>
													<!-- For users login or nor -->
							</div>
							<div class="header-row header-row-side-header flex-row h-100 pb-lg-5">
								<div class="side-header-scrollable scrollable colored-slider" data-plugin-scrollable>
									<div class="scrollable-content">
										<div class="header-nav header-nav-links header-nav-links-side-header header-nav-links-vertical header-nav-links-vertical-expand header-nav-click-to-open align-self-start">
											<div class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-4 header-nav-main-sub-effect-1">
												<nav class="collapse">
													<ul class="nav nav-pills" id="mainNav">
														<li>
															<a class="dropdown-item dropdown-toggle active" href="index.php" style="font-size: 16px;">
																Home
															</a>
														</li>
														<li class="dropdown">
															<a class="dropdown-item dropdown-toggle" href="" style="font-size: 16px;">
																Products Part
															</a>
															<ul class="dropdown-menu">
																<li class="">
																	<a class="dropdown-item" href="sellerDashboard.php?do=Manage" style="font-size: 16px; font-weight: 500;">Manage All Products</a>
																</li>
																<li class="">
																	<a class="dropdown-item" href="sellerDashboard.php?do=Add" style="font-size: 16px; font-weight: 500;">Add New Product</a>
																</li>
																<li class="">
																	<a class="dropdown-item" href="sellerDashboard.php?do=ManageTrash" style="font-size: 16px; font-weight: 500;">Trash</a>
																</li>
															</ul>
														</li>
														<li>
															<a class="dropdown-item dropdown-toggle" href="user_manage.php?uid=<?php echo $_SESSION['user_id']; ?>" style="font-size: 16px;">
																Profile
															</a>
														</li>
														<li>
															<a class="dropdown-item dropdown-toggle" href="logout.php" style="font-size: 16px;">
																Log Out
															</a>
														</li>
													</ul>
												</nav>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
