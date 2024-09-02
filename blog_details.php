<?php 
	include "inc/header.php";
?>

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

						<h1 class="text-white font-weight-bold text-8">Blog Details</h1>
					</div>

					<div class="col-md-12 align-self-center order-1">

						<ul class="breadcrumb d-block text-center" >
							<li><a href="index.php" class="text-white">HOME</a></li>
							<li class="active text-white" >BLOG DETAILS</li>
						</ul>
					</div>					
				</div>
			</div>
		</section>
		<!-- ########## END: TOP HEADING ########## -->

				<div class="container py-4">

					<div class="row">
						<div class="col-lg-3 order-lg-2">
							<?php include"inc/sidebar.php"; ?>
						</div>
						<div class="col-lg-9 order-lg-1">
							<div class="blog-posts single-post">

								<?php  
									if (isset($_GET['dId'])) {
										$find_postId = $_GET['dId'];

										$sql = "SELECT * FROM post WHERE post_id='$find_postId'";
										$postData = mysqli_query($db, $sql);

										while( $row = mysqli_fetch_assoc($postData) ) {
											$post_id 		= $row['post_id'];
											$title 			= $row['title'];
											$post_desc 		= $row['post_desc'];
											$image 			= $row['image'];
											$category_id 	= $row['category_id'];
											$author_id 		= $row['author_id'];
											$tags 			= $row['tags'];
											$status 		= $row['status'];
											$post_date 		= $row['post_date'];
											$view_count 	= $row['view_count'];

											// <!-- View Couunting  -->
											$updateViewCount = $view_count+1;
											$sql = "UPDATE post SET view_count='$updateViewCount' WHERE post_id='$post_id'";
											$updateViewCount_Query = mysqli_query($db, $sql);
											// <!-- View Couunting  -->
											?>
												<article class="post post-large blog-single-post border-0 m-0 p-0">

													<div class="post-image ml-0">
														<?php 
														if (!empty($image)) {
															echo '<img src="admin/assets/images/posts/' . $image . '" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="'. $title .'">';
														}
														else {
															echo '<img src="admin/img/blog/wide/blog-11.jpg" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />';
														}
													?>
													</div>

													<div class="post-date ml-0" style="margin-top: -2%;">
														<!-- <span class="day">10</span> -->
														<span class="month"><?php echo $post_date; ?></span>
													</div> <br>

													<div class="post-content ml-0">
									
														<h2 class="font-weight-bold"><?php echo $title; ?></h2>
									
														<div class="post-meta">
															<span><i class="far fa-user"></i> By <a href="">
																<?php  
														      		$readUser_Sql = "SELECT * FROM users WHERE user_id ='$author_id'";
														      		$readUser_Quary = mysqli_query($db, $readUser_Sql);

														      		while( $row = mysqli_fetch_assoc($readUser_Quary) ){
														      			$auth_id 	 = $row['user_id'];
														      			$auth_name = $row['user_name'];

														      			echo $auth_name;
														      		}

														      	?>
															</a> </span>

															<span><i class="far fa-folder"></i> <a href="">
																<?php  
														      		$readCat_Sql = "SELECT * FROM category WHERE cat_id='$category_id'";
														      		$readCat_Quary = mysqli_query($db, $readCat_Sql);

														      		while( $row = mysqli_fetch_assoc($readCat_Quary) ){
														      			$cc_id 	 = $row['cat_id'];
														      			$cc_name = $row['cat_name'];

														      			?>
														      			<a href="blog_details.php?do=Manage&did=<?php echo $cc_id; ?>"><?php echo $cc_name; ?></a>
														      			<?php
														      		}

														      	?>
															</a> </span>
															<span><i class="far fa-eye"></i> <a href="#"><?php echo $view_count; ?> Views</a></span>
														</div>

														<p><?php echo $post_desc; ?> </p>
									
														
														</div>
														<!-- Author Details -->
											<?php
										}
										?>
														
											
														
													</div>
												</article>

									<?php }
								?>

								
									
														
											
							
							</div>
						</div>
					</div>

				</div>

				<!-- START: IMAGE SHOWCASE PART -->
		<section class="image_show py-5">
			<div class="conatiner py-3">
				<div class="row text-center pt-3 d-flex align-items-center">
					<div class="col-md-10 mx-md-auto">							
						<h1 class="welcomes">Our Gallary</h1>
					</div>
				</div>
			</div>

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
		</section>
		<!-- END: IMAGE SHOWCASE PART -->

			</div>

<?php include "inc/footer.php"; ?>