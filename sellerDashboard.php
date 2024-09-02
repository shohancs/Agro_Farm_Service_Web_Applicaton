<?php 
	session_start(); 
	ob_start();
	include "admin/inc/db.php";
?>

<!DOCTYPE html>
<html class="side-header side-header-disable-offcanvas">
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>DASHBOARD | HOME</title>	

		<meta name="keywords" content="HTML5 Template" />
		<meta name="description" content="Porto - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/vendor/fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="assets/vendor/animate/animate.min.css">
		<link rel="stylesheet" href="assets/vendor/simple-line-icons/css/simple-line-icons.min.css">
		<link rel="stylesheet" href="assets/vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/vendor/owl.carousel/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.min.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/css/theme.css">
		<link rel="stylesheet" href="assets/css/theme-elements.css">
		<link rel="stylesheet" href="assets/css/theme-blog.css">
		<link rel="stylesheet" href="assets/css/theme-shop.css">

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="assets/vendor/rs-plugin/css/settings.css">
		<link rel="stylesheet" href="assets/vendor/rs-plugin/css/layers.css">
		<link rel="stylesheet" href="assets/vendor/rs-plugin/css/navigation.css">
		
		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/css/skins/skin-corporate-12.css"> 

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/css/custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.min.js"></script>

		<!-- DATATABLE CSS LINK -->
		<link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">

		<!-- FONT AWESOME CDN LINK -->
		<script src="https://kit.fontawesome.com/0c66e46c25.js" crossorigin="anonymous"></script>

		<style>
			/* Google font linking */
           @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,300;1,400;1,500;1,600&family=Quicksand:wght@300;400;500;600;700&display=swap');
           /* Google font linking */
           
		</style>

	</head>

	<body class="loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 500}">

		<div class="body">
			<!-- START: LEFT MENU -->
			<?php include "inc/sellerLeftMenu.php" ?>
			<!-- END: LEFT MENU -->
			
			<div role="main" class="main">
				<h1 class="text-center py-5 font-weight-bold" style="letter-spacing: 1px;">SELLER DASHBOARD</h1>

				<hr>

				<?php  
					$do = isset( $_GET['do'] ) ? $_GET['do'] : "Manage";

					if ( $do == "Manage" ) { ?>
						<div class="container pb-5">
							<div class="row">
								<div class="col-lg-12">
									<h4 class="text-uppercase">Manage All Products</h4>
									<hr>

									<!-- START: TABLE -->
									<div class="table-responsive" style="padding: 30px; box-shadow: 0px 1px 8px #ccc; border-radius: 10px;">
										<table id="example" class="table table-striped table-hover table-bordered">
										  <thead class="thead-dark">
										    <tr>
										      <th scope="col">#Sl.</th>
										      <th scope="col">Product Image</th>
										      <th scope="col">Product Name</th>
										      <th scope="col">Price (Taka)</th>
										      <th scope="col">Parent/Child Category</th>
										      <th scope="col">Category Name</th>
										      <th scope="col">Status</th>
										      <th scope="col">Join Date</th>
										      <th scope="col">Action</th>
										    </tr>
										  </thead>

										  <tbody>
										  	<?php  
										  		if (!empty($_SESSION['email'])) {
										  			$sellerId = $_SESSION['email'];

										  			$sellerReadSql = "SELECT * FROM category WHERE status !=0 AND seller_email='$sellerId' ORDER BY cat_name ASC";
										  			$sellerReadQuery = mysqli_query( $db, $sellerReadSql );
										  			$sellerCount = mysqli_num_rows($sellerReadQuery);

										  			if ( $sellerCount == 0 ) { ?>
										  				<div class="alert alert-info text-center" role="alert">
														  Sorry! No Product Found!.
														</div>
										  			<?php }

										  			else {
										  				$i = 0;

												  		while ($row = mysqli_fetch_assoc($sellerReadQuery)) {
												  			$cat_id  		= $row['cat_id'];
												  			$cat_name 		= $row['cat_name'];
												  			$cat_desc 		= $row['cat_desc'];
												  			$is_parent 		= $row['is_parent'];
												  			$status 		= $row['status'];
												  			$join_date 		= $row['join_date'];
												  			$cat_image 		= $row['cat_image'];				
												  			$price 			= $row['price'];				
												  			$seller_name 	= $row['seller_name'];				
												  			$seller_email 	= $row['seller_email'];				
												  			$i++;
												  			?>

												  			<tr>
												  			  <th scope="row" class="text-center"><?php echo $i; ?></th>
														      <td class="text-center">
														      	<?php  
														      		if (!empty($cat_image)) {
																		echo '<img src="admin/assets/images/category/' . $cat_image . '" style="width: 60px";>';
																	}
																	else {
																		echo '<img src="admin/assets/images/category/default.jpg" style="width: 60px";>';
																	}
														      	?>
														      </td>
														      <td class="text-center"><?php echo $cat_name; ?></td>
														      <td class="text-center"><?php echo $price; ?> Taka</td>
														      <td class="text-center">
														      	<?php  
														      		if ($is_parent == 1) { ?>
														      			<span class="badge badge-pill badge-primary">PARENT CATEGORY</span>
														      		<?php }
														      	?>
														      </td>
														      <td class="text-center">
												      			<?php  

														      		$readCat_Sql = "SELECT * FROM category WHERE cat_id='$is_parent'";
														      		$readCat_Quary = mysqli_query($db, $readCat_Sql);

														      		while( $row = mysqli_fetch_assoc($readCat_Quary) ){
														      			$cc_id 	 = $row['cat_id'];
														      			$cc_name = $row['cat_name'];
														      			?>
														      			<span class="badge-pill badge-secondary"><?php echo "$cc_name"; ?></span>
														      			<?php

														      			
														      		}

														      	?>
												      </td>
														      <td class="text-center">
														      	<?php  
														      		if ($status == 1) { ?>
														      			<span class="badge badge-pill badge-success">ACTIVE</span>
														      		<?php }
														      		else if ($status == 0) { ?>
														      			<span class="badge badge-pill badge-danger">INACTIVE</span>
														      		<?php }
														      		else if ($status == 2) { ?>
														      			<span class="badge badge-pill badge-warning">PENDING</span>
														      		<?php }
														      	?>
														      </td>
														      <td class="text-center"><?php echo $join_date; ?></td>
														      <td>
																	<div class="action-btn">
																		<ul>
																		    <li>
																		      <a href="sellerDashboard.php?do=Edit&uId=<?php echo $cat_id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
																		    </li>
																		    <li>
																		      <a href=""  data-toggle="modal" data-target="#uId<?php echo $cat_id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
																		    </li>
																		</ul>
																	</div>

																	<!-- Modal Start -->
																	<div class="modal fade" id="uId<?php echo $cat_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
																	  <div class="modal-dialog" role="document">
																	    <div class="modal-content">
																	      <div class="modal-header">
																	        <h3 class="modal-title" id="exampleModalLabel">Are You Sure?? To Move <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $cat_name; ?></span> Trash folder!!</h3>
																	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	          <span aria-hidden="true">&times;</span>
																	        </button>
																	      </div>
																	      <div class="modal-body">
																	        <div class="modal-btn">
																	        	<a href="sellerDashboard.php?do=Trash&tId=<?php echo $cat_id; ?>"class="btn btn-danger me-3">Trash</a>
																	        	<a href="" class="btn btn-success" data-dismiss="modal">Close</a>
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






										  			
										  		}
										  	?>
										    
										  </tbody>
										</table>
									</div>
									<!-- END: TABLE -->

								</div>
							</div>
						</div>
					<?php }

					else if ( $do == "Add" ) { ?>
						<div class="container pb-5">
							<div class="row">
								<div class="col-lg-12">
									<h4 class="text-uppercase">ADD NEW PRODUCT</h4>
									<hr>

									<!-- ########## START: FORM ########## -->
									<form action="sellerDashboard.php?do=Store" method="POST" enctype="multipart/form-data" style="padding: 30px; box-shadow: 0px 1px 8px #ccc; border-radius: 10px;">
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label for="">Product Name</label>
													<input type="text" name="catName" class="form-control" placeholder="enter product name" required autocomplete="off">
												</div>

												<div class="form-group">
													<label for="">Price (Taka)</label>
													<input type="text" name="price" class="form-control" placeholder="enter price amount" required autocomplete="off">
												</div>

												<div class="form-group">
													<label for="">Select the Parent Category [ If Any ]</label>
													<select class="form-control" name="is_parent">
													  <option value="1">Please select the parent category</option>
													  <?php  
													  	$sql = "SELECT * FROM category WHERE is_parent=1 AND status=1 ORDER BY cat_name ASC ";
													  	$query = mysqli_query($db, $sql);

													  	while( $row = mysqli_fetch_assoc($query) ){
													  		$cat_id  		= $row['cat_id'];
															$cat_name 		= $row['cat_name'];
																?>

																<option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>

																<?php
													  	}
													  ?>
													</select>
												</div>
												

												<div class="form-group">
													<label for="">Category Image</label>
													<input class="form-control-file" name="image" type="file">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="">Category Description</label>
													<textarea name="desc" class="form-control" id="" cols="30" rows="8"></textarea>
												</div>

												<div class="form-group">
													<input type="hidden" value="2" name="status">
													<input type="hidden" name="seller_email" value="<?php echo $_SESSION['email']; ?>">
												</div>

												<div class="form-group">
													<div class="d-grid gap-2">
														<input type="submit" name="addCategory" class="btn btn-primary btn-lg btn-block" value="Add New Product">
													</div>
												</div>
											</div>
										</div>
									</div>													
									</form>
									<!-- ########## END: FORM ########## -->

								</div>
							</div>
						</div>
					<?php }

					else if ( $do == "Store" ) {
						if (isset($_POST['addCategory'])) {
							$catName 		= mysqli_real_escape_string($db, $_POST['catName']);
							$price 			= mysqli_real_escape_string($db, $_POST['price']);
							$is_parent 		= mysqli_real_escape_string($db, $_POST['is_parent']);
							$status 		= mysqli_real_escape_string($db, $_POST['status']);
							$seller_email 	= mysqli_real_escape_string($db, $_POST['seller_email']);
							$desc 			= mysqli_real_escape_string($db, $_POST['desc']);

							
							$image 			= mysqli_real_escape_string($db,$_FILES['image']['name']);
							$temp_img 		= $_FILES['image']['tmp_name'];


							if (!empty($image)) {
								$img = rand(0, 999999) . "_" . $image;
								move_uploaded_file($temp_img, 'admin/assets/images/category/' . $img);
							}
							else {
								$img = '';
							}

							$addSql = "INSERT INTO category (cat_name, cat_desc, is_parent,	status, cat_image, join_date, price, seller_email) VALUES('$catName', '$desc', '$is_parent', '$status', '$img', now(), '$price', '$seller_email')";
							$addQuery = mysqli_query($db, $addSql);

							if ($addQuery) {
								header("Location: sellerDashboard.php?do=Manage");
							}
							else {
								die ("Mysql Error." .mysqli_error($db) );
							}

						}

					}

					else if ( $do == "Edit" ) { 
						if (isset($_GET['uId'])) {
							$upId = $_GET['uId'];
							$upReadSql = "SELECT * FROM category WHERE cat_id='$upId'";
							$upReadQuery = mysqli_query($db, $upReadSql);

							while ( $row = mysqli_fetch_assoc($upReadQuery) ) {
								$cat_id  		= $row['cat_id'];
					  			$cat_name 		= $row['cat_name'];
					  			$cat_desc 		= $row['cat_desc'];
					  			$is_parent 		= $row['is_parent'];
					  			$status 		= $row['status'];
					  			$join_date 		= $row['join_date'];
					  			$cat_image 		= $row['cat_image'];
					  			$price 			= $row['price'];
					  			$seller_email 	= $row['seller_email'];
					  			?>
					  				<div class="container pb-5">
										<div class="row">
											<div class="col-lg-12">
												<h4 class="text-uppercase">UPDATE PRODUCT</h4>
												<hr>

												<!-- ########## START: FORM ########## -->
												<form action="sellerDashboard.php?do=Update" method="POST" enctype="multipart/form-data" style="padding: 30px; box-shadow: 0px 1px 8px #ccc; border-radius: 10px;">
													<div class="row">
														<div class="col-lg-6">
															<div class="form-group">
																<label for="">Product Name</label>
																<input type="text" name="catName" class="form-control" placeholder="enter product name" required autocomplete="off" value="<?php echo $cat_name; ?>">
															</div>

															<div class="form-group">
																<label for="">Price (Taka)</label>
																<input type="text" name="price" class="form-control" placeholder="enter price amount" required autocomplete="off" value="<?php echo $price; ?>">
															</div>

															<div class="form-group">
																<label for="">Select the Parent Category [ If Any ]</label>
																<select class="form-control" name="is_parent">
																  <option value="1">Please select the parent category</option>
																  <?php  
																  	$p_sql = "SELECT * FROM category WHERE is_parent=1  ORDER BY cat_name ASC ";
																  	$p_query = mysqli_query($db, $p_sql);

																  	while( $row = mysqli_fetch_assoc($p_query) ){
																  		$p_cat_id  		= $row['cat_id'];
																		$p_cat_name 	= $row['cat_name'];
																		?>

																		<option value="<?php echo $p_cat_id; ?>" <?php if( $p_cat_id == $is_parent ){ echo "selected"; } ?> ><?php echo $p_cat_name; ?></option>

																		<?php
																  	}
																  ?>
																</select>
															</div>
															

															<div class="form-group">
																<label for="">Category Image</label>
																<br><br>

																<?php  
														      		if (!empty($cat_image)) {
																		echo '<img src="admin/assets/images/category/' . $cat_image . '" style="width: 100%; height: 200px;">';
																	}
																	else {
																		echo 'No Image Found';
																	}
														      	?>
														      	<br><br>
																<input class="form-control-file" name="image" type="file">
															</div>
														</div>
														<div class="col-lg-6">
															<div class="form-group">
																<label for="">Category Description</label>
																<textarea name="desc" class="form-control" id="" cols="30" rows="8"><?php echo $cat_desc; ?></textarea>
															</div>

															<div class="form-group">
																<input type="hidden" value="2" name="status">
																<input type="hidden" name="seller_email" value="<?php echo $_SESSION['email']; ?>">
															</div>

															<div class="form-group">
																<div class="d-grid gap-2">
																	<input type="hidden" name="updateCategoryId" value="<?php echo $cat_id; ?>">
																	<?php  
																		if ( $status != 0 ) { ?>
																			<input type="submit" name="updateCategory" class="btn btn-primary btn-lg btn-block" value="Update Product">
																		<?php }
																		else { ?>
																			<input type="submit" name="updateCategory" class="btn btn-primary btn-lg btn-block" value="Return Product">
																		<?php }
																	?>
																	
																</div>
															</div>
														</div>
													</div>
												</div>													
												</form>
												<!-- ########## END: FORM ########## -->

											</div>
										</div>
									</div>
					  			<?php
							}
						}
						
					}

					else if ( $do == "Update" ) {
						if (isset($_POST['updateCategory'])) {
							$updateCategoryId 	= mysqli_real_escape_string($db, $_POST['updateCategoryId']);
							$catName 			= mysqli_real_escape_string($db, $_POST['catName']);
							$is_parent 			= mysqli_real_escape_string($db, $_POST['is_parent']);
							$status 			= mysqli_real_escape_string($db, $_POST['status']);
							$desc 				= mysqli_real_escape_string($db, $_POST['desc']);
							$price 				= mysqli_real_escape_string($db, $_POST['price']);
							$seller_email 		= mysqli_real_escape_string($db, $_POST['seller_email']);
							
							$image 				= mysqli_real_escape_string($db,$_FILES['image']['name']);
							$temp_img 			= $_FILES['image']['tmp_name'];

							if (!empty($image)) {
								$oldImageSql = "SELECT * FROM category WHERE cat_id='$updateCategoryId'";
								$oldImgQuery = mysqli_query( $db, $oldImageSql );

								while( $row = mysqli_fetch_assoc($oldImgQuery) ) {
									$oldcat_image = $row['cat_image'];
									unlink( "admin/assets/images/category/$img" . $oldcat_image );						
								}

								$img = rand(0, 999999) . "_" . $image;
								move_uploaded_file($temp_img, 'admin/assets/images/category/' . $img);

								$upSql = "UPDATE category SET cat_name='$catName', cat_desc='$desc', is_parent='$is_parent', status='$status', cat_image='$img', price='$price', seller_email='$seller_email' WHERE cat_id='$updateCategoryId' ";
			
								$updateQuery = mysqli_query($db, $upSql);

								if ($updateQuery) {
									header("Location: sellerDashboard.php?do=Manage");
								}
								else {
									die ("Mysql Error." .mysqli_error($db) );
								}

							}
							else if (empty($image)){

								$upSql = "UPDATE category SET cat_name='$catName', cat_desc='$desc', is_parent='$is_parent', status='$status', price='$price', seller_email='$seller_email' WHERE cat_id='$updateCategoryId' ";
								$updateQuery = mysqli_query($db, $upSql);

								if ($updateQuery) {
									header("Location: sellerDashboard.php?do=Manage");
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
							$trushSql = "UPDATE category SET status=0 WHERE cat_id='$trushId'";
							$trushQuery = mysqli_query( $db, $trushSql );

							if ($trushQuery) {
								header("Location: sellerDashboard.php?do=Manage");
							}
							else {
								die("mysql error" . mysqli_error($db));
							}

						}
					}

					else if ( $do == "ManageTrash" ) { ?>
						<div class="container pb-5">
							<div class="row">
								<div class="col-lg-12">
									<h4 class="text-uppercase">Trash Manage All Products</h4>
									<hr>

									<!-- START: TABLE -->
									<div class="table-responsive" style="padding: 30px; box-shadow: 0px 1px 8px #ccc; border-radius: 10px;">
										<table id="example" class="table table-striped table-hover table-bordered">
										  <thead class="thead-dark">
										    <tr>
										      <th scope="col">#Sl.</th>
										      <th scope="col">Product Image</th>
										      <th scope="col">Product Name</th>
										      <th scope="col">Price (Taka)</th>
										      <th scope="col">Parent/Child Category</th>
										      <th scope="col">Category Name</th>
										      <th scope="col">Status</th>
										      <th scope="col">Join Date</th>
										      <th scope="col">Action</th>
										    </tr>
										  </thead>

										  <tbody>
										  	<?php  
										  		if (!empty($_SESSION['email'])) {
										  			$sellerId = $_SESSION['email'];

										  			$sellerReadSql = "SELECT * FROM category WHERE status=0 AND seller_email='$sellerId' ORDER BY cat_name ASC";
										  			$sellerReadQuery = mysqli_query( $db, $sellerReadSql );
										  			$sellerCount = mysqli_num_rows($sellerReadQuery);

										  			if ( $sellerCount == 0 ) { ?>
										  				<div class="alert alert-info text-center" role="alert">
														  Sorry! No Product Found!.
														</div>
										  			<?php }

										  			else {
										  				$i = 0;

												  		while ($row = mysqli_fetch_assoc($sellerReadQuery)) {
												  			$cat_id  		= $row['cat_id'];
												  			$cat_name 		= $row['cat_name'];
												  			$cat_desc 		= $row['cat_desc'];
												  			$is_parent 		= $row['is_parent'];
												  			$status 		= $row['status'];
												  			$join_date 		= $row['join_date'];
												  			$cat_image 		= $row['cat_image'];				
												  			$price 			= $row['price'];				
												  			$seller_name 	= $row['seller_name'];				
												  			$seller_email 	= $row['seller_email'];				
												  			$i++;
												  			?>

												  			<tr>
												  			  <th scope="row" class="text-center"><?php echo $i; ?></th>
														      <td class="text-center">
														      	<?php  
														      		if (!empty($cat_image)) {
																		echo '<img src="admin/assets/images/category/' . $cat_image . '" style="width: 60px";>';
																	}
																	else {
																		echo '<img src="admin/assets/images/category/default.jpg" style="width: 60px";>';
																	}
														      	?>
														      </td>
														      <td class="text-center"><?php echo $cat_name; ?></td>
														      <td class="text-center"><?php echo $price; ?> Taka</td>
														      <td class="text-center">
														      	<?php  
														      		if ($is_parent == 1) { ?>
														      			<span class="badge badge-pill badge-primary">PARENT CATEGORY</span>
														      		<?php }
														      	?>
														      </td>
														      <td class="text-center">
												      	<?php  
														      		$readCat_Sql = "SELECT * FROM category WHERE cat_id='$is_parent'";
														      		$readCat_Quary = mysqli_query($db, $readCat_Sql);

														      		while( $row = mysqli_fetch_assoc($readCat_Quary) ){
														      			$cc_id 	 = $row['cat_id'];
														      			$cc_name = $row['cat_name'];
														      			?>
														      			<span class="badge-pill badge-secondary"><?php echo "$cc_name"; ?></span>
														      			<?php

														      			
														      		}

														      	?>
												      </td>
														      <td class="text-center">
														      	<?php  
														      		if ($status == 1) { ?>
														      			<span class="badge badge-pill badge-success">ACTIVE</span>
														      		<?php }
														      		else if ($status == 0) { ?>
														      			<span class="badge badge-pill badge-danger">INACTIVE</span>
														      		<?php }
														      		else if ($status == 2) { ?>
														      			<span class="badge badge-pill badge-warning">PENDING</span>
														      		<?php }
														      	?>
														      </td>
														      <td class="text-center"><?php echo $join_date; ?></td>
														      <td>
																	<div class="action-btn">
																		<ul>
																		    <li>
																		      <a href="sellerDashboard.php?do=Edit&uId=<?php echo $cat_id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
																		    </li>
																		    <li>
																		      <a href=""  data-toggle="modal" data-target="#uId<?php echo $cat_id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
																		    </li>
																		</ul>
																	</div>

																	<!-- Modal Start -->
																	<div class="modal fade" id="uId<?php echo $cat_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
																	  <div class="modal-dialog" role="document">
																	    <div class="modal-content">
																	      <div class="modal-header">
																	        <h3 class="modal-title" id="exampleModalLabel">Are You Sure?? To Delete <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $cat_name; ?></span></h3>
																	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	          <span aria-hidden="true">&times;</span>
																	        </button>
																	      </div>
																	      <div class="modal-body">
																	        <div class="modal-btn">
																	        	<a href="sellerDashboard.php?do=Delete&DId=<?php echo $cat_id; ?>"class="btn btn-danger me-3">Delete</a>
																	        	<a href="" class="btn btn-success" data-dismiss="modal">Close</a>
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






										  			
										  		}
										  	?>
										    
										  </tbody>
										</table>
									</div>
									<!-- END: TABLE -->

								</div>
							</div>
						</div>
					<?php }

					else if ( $do == "Delete" ) {
						if (isset($_GET['DId'])) {
							$deleteId = $_GET['DId'];
							$deleteSql = "DELETE FROM category WHERE cat_id='$deleteId' ";
							$deleteQuery = mysqli_query($db, $deleteSql);

							if ($deleteQuery) {
								header("Location: sellerDashboard.php?do=Manage");
							}
							else {
								die("Mysql Error." . mysqli_error($db));
							}
						}
					}

					


				?>
				
			</div>
		</div>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.min.js"></script>
		<script src="assets/vendor/jquery.appear/jquery.appear.min.js"></script>
		<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
		<script src="assets/vendor/jquery.cookie/jquery.cookie.min.js"></script>
		<script src="assets/vendor/popper/umd/popper.min.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/vendor/common/common.min.js"></script>
		<script src="assets/vendor/jquery.validation/jquery.validate.min.js"></script>
		<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
		<script src="assets/vendor/jquery.gmap/jquery.gmap.min.js"></script>
		<script src="assets/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
		<script src="assets/vendor/isotope/jquery.isotope.min.js"></script>
		<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
		<script src="assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="assets/vendor/vide/jquery.vide.min.js"></script>
		<script src="assets/vendor/vivus/vivus.min.js"></script>
		<script src="assets/vendor/nanoscroller/jquery.nanoscroller.min.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/js/theme.js"></script>
		
		<!-- Current Page Vendor and Views -->
		<script src="assets/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script src="assets/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		<script src="assets/vendor/circle-flip-slideshow/js/jquery.flipshow.min.js"></script>
		<script src="assets/js/views/view.home.js"></script>

		<!-- Theme Custom -->
		<script src="assets/js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/js/theme.init.js"></script>

		<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
		<script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
		<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>

		<script>
			new DataTable('#example', {
			    layout: {
			        topStart: {
			            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
			        }
			    }
			});
		</script>


		<?php  
			ob_end_flush();
		?>

	</body>
</html>