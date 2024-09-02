<?php include "inc/header.php"; ?>

	<div role="main" class="main">

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

						<h1 class="text-white font-weight-bold text-8">Farmer Details</h1>
					</div>

					<div class="col-md-12 align-self-center order-1">

						<ul class="breadcrumb d-block text-center" >
							<li><a href="index.php" class="text-white">HOME</a></li>
							<li class="active text-white" >FARMER DETAILS</li>
						</ul>
					</div>					
				</div>
			</div>
		</section>
		<!-- ########## END: TOP HEADING ########## -->

		<!-- START: FARMER ABOUT PART -->
		<section class="py-5">
					<?php  
						if (isset($_GET['fid'])) {
							$fid = $_GET['fid'];

							$farmerSql = "SELECT * FROM farmer WHERE status=1 AND farm_id='$fid'";
					  		$farmerQuery = mysqli_query( $db, $farmerSql );

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
					  			?>
					  			<div class="container">
					  				<div class="row align-items-center">
					  					<div class="col-lg-6">
					  						<?php  
									      		if (!empty($farm_image)) {
													echo '<img src="admin/assets/images/farmer/' . $farm_image . '" style="width: 100%; border-radius: 10px;";>';
												}
												else {
													echo '<img src="admin/assets/images/farmer/default.jpg" style="width: 100%; border-radius:10px;";>';
												}
									      	?>
					  					</div>
					  					<div class="col-lg-6">
					  						<h1 class="welcome"><?php echo $farm_name; ?></h1>
					  						<p class="text-dark font-weight-normal appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300" style="font-size: 16px; margin: 0;"> <?php echo $farm_about; ?></p>
					  						<div class="d-flex align-items-center py-3">
					  							<div class="px-3">
					  								<i class="fa-solid fa-phone" style="font-size: 25px; color: #75B16C;"></i>
					  							</div>
					  							<div>
					  								<p class="year" style="margin: 0; font-size:16px;">Phone Number</p>
					  								<h3 class="font-weight-bold text-4 line-height-5 mb-1"><?php echo $farm_phone; ?></h3>
					  							</div>
					  						</div>

					  						<div class="d-flex align-items-center">
					  							<div class="px-3">
					  								<i class="fa-solid fa-envelope" style="font-size: 25px; color: #75B16C;"></i>
					  							</div>
					  							<div>
					  								<p class="year" style="margin: 0; font-size:16px;">Email Address</p>
					  								<h3 class="font-weight-bold text-4 line-height-5 mb-1"><?php echo $farm_email; ?></h3>
					  							</div>
					  						</div>

					  						<div class="d-flex align-items-center py-3">
					  							<div class="px-3">
					  								<i class="fa-solid fa-location-dot" style="font-size: 25px; color: #75B16C;"></i>
					  							</div>
					  							<div>
					  								<p class="year" style="margin: 0; font-size:16px;">Address</p>
					  								<h3 class="font-weight-bold text-4 line-height-5 mb-1"><?php echo $farm_address; ?></h3>
					  							</div>
					  						</div>
					  					</div>
					  				</div>
					  			</div>
					  			<?php

					  		}
						}
					?>
		</section>
		<!-- END: FARMER ABOUT PART -->


		<!-- START: OWNER ABOUT PART -->
		<section class="pb-5">
			
					<?php  
						if (isset($_GET['oid'])) {
							$fid = $_GET['oid'];

							$farmerSql = "SELECT * FROM owner_info WHERE status=1 AND id='$fid'";
					  		$farmerQuery = mysqli_query( $db, $farmerSql );

					  		while ($row = mysqli_fetch_assoc($farmerQuery)) {
					  			$id  		= $row['id'];
					  			$name 		= $row['name'];
					  			$email 		= $row['email'];
					  			$phone 		= $row['phone'];
					  			$image 		= $row['image'];
					  			$address 	= $row['address'];
					  			$status 	= $row['status'];
					  			$join_date 	= $row['join_date'];
					  			?>
					  			<div class="container pb-5">
									<div class="row">
										<div class="col-lg-12">
											<h1 class="welcomes " style="font-size: 40px;">Owner Details</h1>
										</div>
									</div>
								</div>
					  			<div class="container">
					  				<div class="row align-items-center">
					  					<div class="col-lg-6">
					  						<?php   
									      		if (!empty($image)) {
													echo '<img src="admin/assets/images/aboutUs/' . $image . '" style="width: 100%; border-radius: 10px;";>';
												}
												else {
													echo '<img src="admin/assets/images/farmer/default.jpg" style="width: 100%; border-radius:10px;";>';
												}
									      	?>
					  					</div>
					  					<div class="col-lg-6">
					  						<h1 class="welcome"><?php echo $name; ?></h1>
					  						<p class="text-dark font-weight-normal appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300" style="font-size: 16px; margin: 0;">As the steward of our cherished cow farm, I take immense pride in curating a haven where cows thrive and the land flourishes. Our dedication to sustainable practices and ethical care ensures that each bovine companion receives the utmost respect. Through every sunrise and sunset, I am committed to nurturing a bond between humans, cows, and the environment. Join me in celebrating the authenticity of farm life, where the heart of the land beats in harmony with the gentle lowing of our cherished herd.</p>
					  						<div class="d-flex align-items-center py-3">
					  							<div class="px-3">
					  								<i class="fa-solid fa-phone" style="font-size: 25px; color: #75B16C;"></i>
					  							</div>
					  							<div>
					  								<p class="year" style="margin: 0; font-size:16px;">Phone Number</p>
					  								<h3 class="font-weight-bold text-4 line-height-5 mb-1"><?php echo $phone; ?></h3>
					  							</div>
					  						</div>

					  						<div class="d-flex align-items-center">
					  							<div class="px-3">
					  								<i class="fa-solid fa-envelope" style="font-size: 25px; color: #75B16C;"></i>
					  							</div>
					  							<div>
					  								<p class="year" style="margin: 0; font-size:16px;">Email Address</p>
					  								<h3 class="font-weight-bold text-4 line-height-5 mb-1"><?php echo $email; ?></h3>
					  							</div>
					  						</div>

					  						<div class="d-flex align-items-center py-3">
					  							<div class="px-3">
					  								<i class="fa-solid fa-location-dot" style="font-size: 25px; color: #75B16C;"></i>
					  							</div>
					  							<div>
					  								<p class="year" style="margin: 0; font-size:16px;">Address</p>
					  								<h3 class="font-weight-bold text-4 line-height-5 mb-1"><?php echo $address; ?></h3>
					  							</div>
					  						</div>
					  					</div>
					  				</div>
					  			</div>
					  			<?php

					  		}
						}
					?>
		</section>
		<!-- END: OWNER ABOUT PART -->

		<!-- START: IMAGE SHOWCASE PART -->
		<section class="image_show py-5">
			<div class="conatiner py-3">
				<div class="row text-center pt-3 d-flex align-items-center">
					<div class="col-md-10 mx-md-auto">							
						<h1 class="welcomes">Our Gallary</h1>
					</div>
				</div>
			</div>

			<!-- START: image Show -->
			<div class="container">
				<div class="row">
					<?php  
						$overviewSql = "SELECT * FROM farm_overview WHERE ov_category=1 AND status=1 ORDER BY title ASC";
				  		$overviewQuery = mysqli_query( $db, $overviewSql );
					  		while ($row = mysqli_fetch_assoc($overviewQuery)) {
					  			$ov_id  		= $row['ov_id'];
					  			$title 			= $row['title'];
					  			$descrive 		= $row['descrive'];
					  			$ov_category 	= $row['ov_category'];
					  			$ov_image 		= $row['ov_image'];
					  			$status 		= $row['status'];
					  			?>
					  				<div class="col-lg-3 py-3">
										<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-lighten thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-dark-linear thumb-info-centered-icons">
											<span class="thumb-info-wrapper">
												<?php  
													if (!empty($ov_image)) { 
														echo '<img src="admin/assets/images/overview_img/' . $ov_image . '" style="width: 100%";>'; 
														?>
														<span class="thumb-info-title">
															<span class="thumb-info-inner line-height-1 galery"><?php echo $title; ?></span>
															<span class="thumb-info-type galerys"><?php echo substr($descrive, 0, 30); ?>...</span>
														</span>

													<?php }
												?>
												
											</span>
										</span>
									</div>
					  			<?php
					  		}
					?>
					
				</div>
			</div>
			<!-- END: image Show -->
		</section>
		<!-- END: IMAGE SHOWCASE PART -->
		
		
	
	</div>
 
<?php include "inc/footer.php"; ?>