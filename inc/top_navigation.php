<!-- START: TOP NAVIGATION PART -->
								<div class="header-row pt-3">									
									<nav class="header-nav-top">
										<ul class="nav nav-pills">
											<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
											<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
											<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>

										
											
											<li class="nav-item nav-item-left-border nav-item-left-border-remove nav-item-left-border-md-show">
												<span class="ws-nowrap"><i class="fas fa-phone"></i>
													<?php  
									  					$userSql = "SELECT * FROM users WHERE role=1 AND status=1 ORDER BY user_name ASC";
												  		$userQuery = mysqli_query( $db, $userSql );

												  		while ($row = mysqli_fetch_assoc($userQuery)) {
												  			$user_phone 	= $row['user_phone'];
												  			?><a href="tel:+<?php echo $user_phone; ?>" style="color: #999; text-decoration:none;"><?php echo $user_phone; ?></a>
								                  					
												  			<?php
														}
								                	?></span>
											</li>

											<li class="nav-item nav-item-left-border nav-item-left-border-remove nav-item-left-border-md-show">
												<a class="nav-link" href="#service"><i class="fas fa-angle-right"></i> All Services</a>
											</li>
										</ul>
									</nav>
									
									
								</div>
								<!-- END: TOP NAVIGATION PART -->