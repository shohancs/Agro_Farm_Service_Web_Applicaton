<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#">	<i class='bx bx-search'></i>
								</a>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">	
								</a>
							</li>
							<li class="nav-item dropdown dropdown-large">
								
								<div class="dropdown-menu dropdown-menu-end">
									<div class="header-notifications-list">
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Notifications</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								
								<div class="dropdown-menu dropdown-menu-end">
									
									<div class="header-message-list">
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<?php  
								$usersReadsql = "SELECT * FROM users WHERE role=1 AND status=1 ORDER BY user_name ASC";
										$usersRead = mysqli_query($db, $usersReadsql);
										
											while ($row = mysqli_fetch_assoc($usersRead)) {
												$user_id 		= $row['user_id'];
									  			$user_name 		= $row['user_name'];
									  			$user_email 	= $row['user_email'];
									  			$user_phone 	= $row['user_phone'];
									  			$user_address 	= $row['user_address'];
									  			$role 			= $row['role'];
									  			$status 		= $row['status'];
									  			$user_image 	= $row['user_image'];
									  			$join_date 		= $row['join_date'];
												
												echo '<img src="assets/images/users/' . $user_image . '" style="width: 40px;">';
											}
							?>
							<div class="user-info ps-3">
								<?php  
										$usersReadsql = "SELECT * FROM users WHERE role=1 AND status=1 ORDER BY user_name ASC";
												$usersRead = mysqli_query($db, $usersReadsql);
												
													while ($row = mysqli_fetch_assoc($usersRead)) {
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
														<p class="user-name mb-0"><?php echo $user_name; ?></p>													<?php }
									?>
								
								<p class="designattion mb-0"><?php echo $_SESSION['user_email']; ?></p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							
							<li><a class="dropdown-item" href="dashboard.php"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="logout.php"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->