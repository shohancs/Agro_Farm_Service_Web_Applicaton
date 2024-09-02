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

						<h1 class="text-white font-weight-bold text-8">About Us</h1>
					</div>

					<div class="col-md-12 align-self-center order-1">

						<ul class="breadcrumb d-block text-center" >
							<li><a href="index.php" class="text-white">HOME</a></li>
							<li class="active text-white" >ABOUT US</li>
						</ul>
					</div>					
				</div>
			</div>
		</section>
		<!-- ########## END: TOP HEADING ########## -->

		<!-- START: ABOUT PART -->
		<section class="py-5">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<?php  
				      		$aboutSql = "SELECT * FROM about WHERE status=1 ORDER BY title ASC";
					  		$aboutQuery = mysqli_query( $db, $aboutSql );
						  		while ($row = mysqli_fetch_assoc($aboutQuery)) {
						  			$id  		= $row['id'];
						  			$a_image 	= $row['a_image'];	
						  			
						  				if (!empty($a_image)) {
											echo '<img src="admin/assets/images/aboutUs/' . $a_image . '" style="width: 100%";>';
										}
										else {
											echo 'No Image';
										}	
						  		}
				      	?>
					</div>
					<div class="col-lg-6">
						<?php  
							$aboutSql = "SELECT * FROM about WHERE status=1 ORDER BY title ASC";
					  		$aboutQuery = mysqli_query( $db, $aboutSql );
						  		while ($row = mysqli_fetch_assoc($aboutQuery)) {
						  			$id  		= $row['id'];
						  			$total_age 	= $row['total_age'];
						  			$descrive 	= $row['descrive'];
						  			?>
						  			<h1 class="welcome" style="">HAVE MORE THAN<br><span style=""><?php echo $total_age; ?></span> </h1>
						  			<p class="text-dark font-weight-normal appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300" style="font-size: 16px; margin: 0;"><?php echo $descrive; ?></a></p>
						  			<?php	
						  		}
						?>

						<?php  
							$aboutSql = "SELECT * FROM owner_info WHERE status=1";
							$aboutQuery = mysqli_query( $db, $aboutSql );

							while ($row = mysqli_fetch_assoc($aboutQuery)) {
					  			$id  		= $row['id'];
					  			$name 		= $row['name'];
					  			$email 		= $row['email'];
					  			$phone 		= $row['phone'];
					  			$image 		= $row['image'];
					  			$address 	= $row['address'];
					  			?>
					  			<div class="row py-3">
					  				<div class="col-lg-2">
					  					<a href="farmers.php?oid=<?php echo $id; ?>">
					  					<?php  
								      		if (!empty($image)) {
												echo '<img src="admin/assets/images/aboutUs/' . $image . '" style="width: 100%;border-radius: 7%;">';
											}
											else {
												echo 'No Image';
											}
								      	?> </a>
					  				</div>
					  				<div class="col-lg-10">
					  					<h3 class="font-weight-bold text-3" style="color: #75B16C; margin:0;">Owner of the Farm</h3>
<h1 class="welcome text-5"><a href="farmers.php?oid=<?php echo $id; ?>"  style=" margin:0; text-decoration: none; color:#212529;"><?php echo $name; ?></a></h1>
					  				</div>
					  			</div>

					  			<?php
					  		}
						?>
						
					</div>
				</div>
			</div>
		</section>
		<!-- END: ABOUT PART -->

		<!-- START: SERVICE PART -->
		<section class="service-part pb-3">
			<div class="container py-3">		
			 	<div class="row text-center pt-3">
					<div class="col-md-10 mx-md-auto pb-5">
						<h1 class="word-rotator slide mb-3 appear-animation service" data-appear-animation="fadeInUpShorter">
							<span>What we provide </span>
							<span class="word-rotator-words">
								<b class="is-visible">Pure Meat</b>
								<b>Fresh Milk</b>
								<b>Dairy Product</b>
								<b>The Whole Cow Deal</b>
							</span>
						</h1>
					</div>

					<div class="col-md-12 py-3">
						<div class="row">
						<?php  
					  		$catSql = "SELECT * FROM category WHERE is_parent=1 AND status=1";
					  		$catQuery = mysqli_query( $db, $catSql );
						  		while ($row = mysqli_fetch_assoc($catQuery)) {
						  			$cat_id  		= $row['cat_id'];
						  			$cat_name 		= $row['cat_name'];
						  			$cat_desc 		= $row['cat_desc'];
						  			$is_parent 		= $row['is_parent'];
						  			$status 		= $row['status'];
						  			$join_date 		= $row['join_date'];
						  			$cat_image 		= $row['cat_image'];	
						  			?>
									
										<div class="col-md-3">
											<div class="card-part">
												<div class="image-container">
													<a href="details.php?do=Manage&did=<?php echo $cat_id; ?>">
												<?php  
													if (!empty($cat_image)) {
														echo '<img src="admin/assets/images/category/' . $cat_image . '" class="rotate-zoom-image">';
													}
												?></a>
												</div>
												<h1 class="cat_head"><a href="details.php?do=Manage&did=<?php echo $cat_id; ?>"><?php echo $cat_name; ?></a></h1>
												<p class="text-dark font-weight-normal appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300" style="font-size: 16px; margin: 0;"><a href="details.php?did=<?php echo $cat_id; ?>" style="font-size: 16px; text-decoration: none; color: #000"><?php echo $cat_desc; ?></a></p>
												
											</div>
										</div>
										
								<?php }

						?>
						</div>
					</div>
				</div>
			</div>
				  		
			
		</section>

		<!-- END: SERVICE PART -->

		<!-- START: HISTORY PART -->
		<section class="py-5">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="welcome text-center">Our Journey</h1>
					</div>
				</div>
			</div>
			<div class="container" style="margin-top: 130px">
				<div class="row">
					<?php  
						$aboutSql = "SELECT * FROM about WHERE status=0 ORDER BY year ASC";
				  		$aboutQuery = mysqli_query( $db, $aboutSql );

					  		while ($row = mysqli_fetch_assoc($aboutQuery)) {
					  			$id  		= $row['id'];
					  			$title 		= $row['title'];
					  			$descrive 	= $row['descrive'];
					  			$year 		= $row['year'];
					  			$total_age 	= $row['total_age'];
					  			$a_image 	= $row['a_image'];
					  			$status 	= $row['status'];
					  			?>
					  			<section class="timeline" id="timeline" style="margin-top: -67px;">
									<div class="timeline-body">

										<div class="timeline-date">
											<h3 class="text-primary font-weight-bold">In <?php echo $year; ?></h3>
										</div>
								
										<article class="timeline-box left">
											<div class="portfolio-item">
												<span class="thumb-info  m-0 py-5" style="border: 2px dashed; text-align: center;">
													<h1 class="welcome"><span style="font-size: 100px;"><?php echo $year; ?></span></h1>
													<h3 class="text-dark appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300" style="font-size: 20px; margin: 0; font-weight: 600;"><?php echo $title; ?></h3>

													<p class="text-dark font-weight-normal appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300" style="font-size: 16px; margin: 0; padding: 6px 13px;"><?php echo $descrive; ?></p>

												</span>
											</div>
										</article>
										<article class="timeline-box right">
											<div class="portfolio-item">
													<span class="thumb-info thumb-info-lighten thumb-info-no-borders m-0">
														<span class="thumb-info-wrapper">
															<?php  
												      		if (!empty($a_image)) {
																echo '<img src="admin/assets/images/aboutUs/' . $a_image . '" class="img-fluid" >';
															}
															else {
																echo 'No Image';
															}
												      	?>
															
															
														</span>
													</span>
											</div>
										</article>

									</div>
								
								</section>
					  			<?php
					  		}
					?>
					
				</div>
			</div>
		</section>
		
		<!-- END: HISTORY PART -->
		
	
	</div>
 
<?php include "inc/footer.php"; ?>