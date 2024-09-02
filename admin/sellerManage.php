<?php  
	include "inc/header.php";
?>

<div class="page-wrapper">
	<div class="page-content">
		<?php  
			$do = isset($_GET['do']) ? $_GET['do'] : "Manage";

			if ( $do == "Manage" ) { ?>
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Category Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Category Manage</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Manage All Category</h6>
				<hr>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<div id="example3_wrapper" class="dataTables_wrapper dt-bootstrap5">
								<div class="row">
									<div class="col-sm-12">
									<table id="example3" class="table table-striped table-hover table-bordered dataTable" role="grid" aria-describedby="example3_info">
										<thead class="table-dark">
									    <tr>
									      <th scope="col">#Sl.</th>
									      <th scope="col">Cat_Image</th>
									      <th scope="col">Product Name</th>
									      <th scope="col">Price (Taka)</th>
									      <th scope="col">Seller Email</th>
									      <th scope="col">Parent/Child Category</th>
									      <th scope="col">Category Name</th>
									      <th scope="col">Status</th>
									      <th scope="col">Join Date</th>
									      <th scope="col">Action</th>
									    </tr>
									  </thead>

									  <tbody>
									  	<?php  
									  		$catSql = "SELECT * FROM category WHERE status=2 ORDER BY cat_name ASC";;
									  		$catQuery = mysqli_query( $db, $catSql );
									  		$catCount = mysqli_num_rows($catQuery);

									  		if ($catCount == 0) { ?>
									  			<div class="alert alert-warning text-center" role="alert">
												  Sorry! No Category Found into the Database.
												</div>
									  		<?php }

									  		else {
									  			$i = 0;

										  		while ($row = mysqli_fetch_assoc($catQuery)) {
										  			$cat_id  		= $row['cat_id'];
										  			$cat_name 		= $row['cat_name'];
										  			$cat_desc 		= $row['cat_desc'];
										  			$is_parent 		= $row['is_parent'];
										  			$status 		= $row['status'];
										  			$join_date 		= $row['join_date'];
										  			$cat_image 		= $row['cat_image'];				
										  			$price 			= $row['price'];				
										  			$seller_email 	= $row['seller_email'];				
										  			$i++;
										  			?>

										  			<tr>
												      <th scope="row"><?php echo $i; ?></th>
												      <td>
												      	<?php  
												      		if (!empty($cat_image)) {
																echo '<img src="assets/images/category/' . $cat_image . '" style="width: 60px";>';
															}
															else {
																echo '<img src="assets/images/category/default.png" style="width: 60px";>';
															}
												      	?>
												      </td>
												      <td><?php echo $cat_name; ?></td>

												      <td><?php echo $price; ?> Taka</td>
												      <td><?php echo $seller_email; ?></td>
												      <td>
												      	<?php  
												      		if ($is_parent == 1) { ?>
												      			<span class="badge text-bg-primary">PARENT CATEGORY</span>
												      		<?php }
												      		else { ?>
												      			<span class="badge text-bg-primary">CHILD CATEGORY</span>
												      		<?php }
												      	?>
												      </td>
												      <td>
												      	<?php  
														      		$readCat_Sql = "SELECT * FROM category WHERE cat_id='$is_parent'";
														      		$readCat_Quary = mysqli_query($db, $readCat_Sql);

														      		while( $row = mysqli_fetch_assoc($readCat_Quary) ){
														      			$cc_id 	 = $row['cat_id'];
														      			$cc_name = $row['cat_name'];
														      			?>
														      			<span class="badge text-bg-secondary"><?php echo "$cc_name"; ?></span>
														      			<?php

														      			
														      		}

														      	?>
												      </td>
												      <td>
												      	<?php  
												      		if ($status == 1) { ?>
												      			<span class="badge text-bg-success">ACTIVE</span>
												      		<?php }
												      		else if ($status == 0) { ?>
												      			<span class="badge text-bg-danger">INACTIVE</span>
												      		<?php }
												      		else if ($status == 2) { ?>
												      			<span class="badge text-bg-warning">PENDING</span>
												      		<?php }
												      	?>
												      </td>
												      <td><?php echo $join_date; ?></td>
												      <td>
																<div class="action-btn">
																	<ul>
																	    <li>
																	      <a href="sellerManage.php?do=Edit&uId=<?php echo $cat_id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
																	    </li>
																	    <li>
																	      <a href=""  data-bs-toggle="modal" data-bs-target="#uId<?php echo $cat_id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
																	    </li>
																	</ul>
																</div>

															<!-- Modal Start -->
															<div class="modal fade" id="uId<?php echo $cat_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
															  <div class="modal-dialog">
															    <div class="modal-content">
															      <div class="modal-header">
															        <h1 class="modal-title fs-5" id="exampleModalLabel">Are You Sure?? To Move <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $cat_name; ?></span> Trash folder!!</h1>
															        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															      </div>
															      <div class="modal-body">
															        <div class="modal-btn">
															        	<a href="sellerManage.php?do=Trash&tId=<?php echo $cat_id; ?>"class="btn btn-danger me-3">Trash</a>
															        	<a href="" class="btn btn-success" data-bs-dismiss="modal">Close</a>
															        </div>
															      </div>
															    </div>
															  </div>
															</div>
															<!-- Modal End -->

												      </td>
												    </tr>

													<?php

														// Sub Category Work
														$childSql = "SELECT * FROM category WHERE is_parent ='$cat_id' AND status=2 ORDER BY cat_name ASC";
														$childQuery = mysqli_query( $db, $childSql );	

														while ($row = mysqli_fetch_assoc($childQuery)) {
															$cat_id  		= $row['cat_id'];
															$cat_name 		= $row['cat_name'];
															$cat_desc 		= $row['cat_desc'];
															$is_parent 		= $row['is_parent'];
															$status 		= $row['status'];
															$join_date 		= $row['join_date'];
															$cat_image 		= $row['cat_image'];			
															$price 			= $row['price'];			
															$seller_email 	= $row['seller_email'];			
															$i++;
															?>

															<tr>
														      <th scope="row"><?php echo $i; ?></th>
														      <td>
														      	<?php  
														      		if (!empty($cat_image)) {
																		echo '<img src="assets/images/category/' . $cat_image . '" style="width: 60px";>';
																	}
																	else {
																		echo '<img src="assets/images/category/default.png" style="width: 60px";>';
																	}
														      	?>
														      </td>
														      <td> -- <?php echo $cat_name; ?></td>
														      <td><?php echo $price; ?> Taka</td>
														      <td><?php echo $seller_email; ?></td>
														      <td>
														      	<?php  
														      		if ($is_parent == 1) { ?>
														      			<span class="badge text-bg-primary">PARENT CATEGORY</span>
														      		<?php }
														      		else { ?>
														      			<span class="badge text-bg-secondary">CHILD CATEGORY</span>
														      		<?php }
														      	?>
														      </td>
														      <td>
														      	<?php  
														      		$readCat_Sql = "SELECT * FROM category WHERE cat_id='$is_parent'";
														      		$readCat_Quary = mysqli_query($db, $readCat_Sql);

														      		while( $row = mysqli_fetch_assoc($readCat_Quary) ){
														      			$cc_id 	 = $row['cat_id'];
														      			$cc_name = $row['cat_name'];
														      			?>
														      			<span class="badge text-bg-secondary"><?php echo "$cc_name"; ?></span>
														      			<?php

														      			
														      		}

														      	?>
														      </td>
														      <td>
														      	<?php  
														      		if ($status == 1) { ?>
														      			<span class="badge text-bg-success">ACTIVE</span>
														      		<?php }
														      		else if ($status == 0) { ?>
														      			<span class="badge text-bg-danger">INACTIVE</span>
														      		<?php }
														      		else if ($status == 2) { ?>
														      			<span class="badge text-bg-warning">PENDING</span>
														      		<?php }
														      	?>
														      </td>
														      <td><?php echo $join_date; ?></td>
														      <td>
														      	<div class="action-btn">
																	<ul>
																	    <li>
																	      <a href="sellerManage.php?do=Edit&uId=<?php echo $cat_id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
																	    </li>
																	    <li>
																	      <a href=""  data-bs-toggle="modal" data-bs-target="#uId<?php echo $cat_id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
																	    </li>
																	</ul>
																</div>

																<!-- Modal Start -->
																<div class="modal fade" id="uId<?php echo $cat_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
																  <div class="modal-dialog">
																    <div class="modal-content">
																      <div class="modal-header">
																        <h1 class="modal-title fs-5" id="exampleModalLabel">Are You Sure?? To Move <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $cat_name; ?></span> Trash folder!!</h1>
																        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																      </div>
																      <div class="modal-body">
																        <div class="modal-btn">
																        	<a href="sellerManage.php?do=Trash&tId=<?php echo $cat_id; ?>"class="btn btn-danger me-3">Trash</a>
																        	<a href="" class="btn btn-success" data-bs-dismiss="modal">Close</a>
																        </div>
																      </div>
																    </div>
																  </div>
																</div>
																<!-- Modal End -->

														      </td>
														    </tr>

														    <?php

														// Sub Category Work
													 } //second While Loop

									  		} //first while loop
									  	}
									  	?>
									    
									  </tbody>
										
									</table>

									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			
		<?php }

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
			  				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
								<div class="breadcrumb-title pe-3">Category Management</div>
								<div class="ps-3">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb mb-0 p-0">
											<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
											</li>
											<li class="breadcrumb-item active" aria-current="page">Edit Category</li>
										</ol>
									</nav>
								</div>
							</div>
							<!--end breadcrumb-->
							<h6 class="mb-0 text-uppercase">Update <span style="color: firebrick;"><?php echo $cat_name; ?></span> Info</h6>
							<hr>
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<div id="example3_wrapper" class="dataTables_wrapper dt-bootstrap5">
											<div class="row">
												
												<!-- ########## START: FORM ########## -->
												<form action="category.php?do=Update" method="POST" enctype="multipart/form-data">
													<div class="row">
														<div class="col-lg-6">
															<div class="mb-3">
																<label for="">Category Name</label>
																<input type="text" name="catName" class="form-control" placeholder="enter category name" required autocomplete="off" value="<?php echo $cat_name; ?>">
															</div>

															<div class="mb-3">
																<label for="">Price (Taka)</label>
																<input type="text" name="price" class="form-control" placeholder="enter category name" required autocomplete="off" value="<?php echo $price; ?>">
															</div>

															<div class="mb-3">
																<label for="">Category Description</label>
																<textarea name="desc" class="form-control" id="" cols="30" rows="4"><?php echo $cat_desc; ?></textarea>
															</div>

															<div class="mb-3">
																<label for="">Select the Parent Category [ If Any ]</label>
																<select class="form-select" name="is_parent">
																  <option value="1">Please select the parent category</option>
																  <?php  
																  	$p_sql = "SELECT * FROM category WHERE is_parent=1 AND status=1 ORDER BY cat_name ASC ";
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

															<div class="mb-3">
																<label for="">Status</label>
																<select class="form-select" name="status">
																  <option value="1">Please select the Status</option>
																  <option value="1" <?php if( $status == 1 ){ echo "selected"; } ?>>Active</option>
																  <option value="0" <?php if( $status == 0 ){ echo "selected"; } ?>>InActive</option>
																  <option value="2" <?php if( $status == 2 ){ echo "selected"; } ?>>Pending</option>
																</select>
															</div>					
														</div>

														<div class="col-lg-6">
															<div class="mb-3">
																<label for="">Category Image</label>
																<br><br>

																<?php  
														      		if (!empty($cat_image)) {
																		echo '<img src="assets/images/category/' . $cat_image . '" style="width: 100%; height: 200px;">';
																	}
																	else {
																		echo 'No Image Found';
																	}
														      	?>
														      	<br><br>
																<input class="form-control" name="image" type="file">
															</div>

															<div class="mb-3">
																<div class="d-grid gap-2">
																	<input type="hidden" name="updateCategoryId" value="<?php echo $cat_id; ?>">

																	<input type="submit" name="updateCategory" class="btn btn-primary" value="Update Category">
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
					$seller_email 				= mysqli_real_escape_string($db, $_POST['seller_email']);
					
					$image 				= mysqli_real_escape_string($db,$_FILES['image']['name']);
					$temp_img 			= $_FILES['image']['tmp_name'];

					if (!empty($image)) {
						$oldImageSql = "SELECT * FROM category WHERE cat_id='$updateCategoryId'";
						$oldImgQuery = mysqli_query( $db, $oldImageSql );

						while( $row = mysqli_fetch_assoc($oldImgQuery) ) {
							$oldcat_image = $row['cat_image'];
							unlink( "assets/images/category/$img" . $oldcat_image );						
						}

						$img = rand(0, 999999) . "_" . $image;
						move_uploaded_file($temp_img, 'assets/images/category/' . $img);

						$upSql = "UPDATE category SET cat_name='$catName', cat_desc='$desc', is_parent='$is_parent', status='$status', cat_image='$img', price='$price' WHERE cat_id='$updateCategoryId' ";
	
						$updateQuery = mysqli_query($db, $upSql);

						if ($updateQuery) {
							header("Location: category.php?do=Manage");
						}
						else {
							die ("Mysql Error." .mysqli_error($db) );
						}

					}
					else if (empty($image)){

						$upSql = "UPDATE category SET cat_name='$catName', cat_desc='$desc', is_parent='$is_parent', status='$status', price='$price' WHERE cat_id='$updateCategoryId' ";
						$updateQuery = mysqli_query($db, $upSql);

						if ($updateQuery) {
							header("Location: category.php?do=Manage");
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
						header("Location: category.php?do=Manage");
					}
					else {
						die("mysql error" . mysqli_error($db));
					}

				}
			}

			else if ( $do == "ManageTrash" ) { ?>
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Category Trash Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Trash Manage</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Manage All Trash</h6>
				<hr>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<div id="example3_wrapper" class="dataTables_wrapper dt-bootstrap5">
								<div class="row">
									<div class="col-sm-12">
									<table id="example3" class="table table-striped table-hover table-bordered dataTable" role="grid" aria-describedby="example3_info">
										<thead class="table-dark">
									    <tr>
									      <th scope="col">#Sl.</th>
									      <th scope="col">Cat_Image</th>
									      <th scope="col">Category Name</th>
									      <th scope="col">Price (Taka)</th>
									      <th scope="col">Description</th>
									      <th scope="col">Parent/Child Category</th>
									      <th scope="col">Status</th>
									      <th scope="col">Join Date</th>
									      <th scope="col">Action</th>
									    </tr>
									  </thead>

									  <tbody>
									  	<?php  
									  		$catSql = "SELECT * FROM category WHERE status=0 ORDER BY cat_name ASC";
									  		$catQuery = mysqli_query( $db, $catSql );
									  		$catCount = mysqli_num_rows($catQuery);

									  		if ($catCount == 0) { ?>
									  			<div class="alert alert-warning text-center" role="alert">
												  Sorry! No Category Found into the Database.
												</div>
									  		<?php }

									  		else {
									  			$i = 0;

										  		while ($row = mysqli_fetch_assoc($catQuery)) {
										  			$cat_id  		= $row['cat_id'];
										  			$cat_name 		= $row['cat_name'];
										  			$cat_desc 		= $row['cat_desc'];
										  			$is_parent 		= $row['is_parent'];
										  			$status 		= $row['status'];
										  			$join_date 		= $row['join_date'];
										  			$cat_image 		= $row['cat_image'];				
										  			$price 			= $row['price'];				
										  			$i++;
										  			?>

										  			<tr>
												      <th scope="row"><?php echo $i; ?></th>
												      <td>
												      	<?php  
												      		if (!empty($cat_image)) {
																echo '<img src="assets/images/category/' . $cat_image . '" style="width: 60px";>';
															}
															else {
																echo '<img src="assets/images/category/default.png" style="width: 60px";>';
															}
												      	?>
												      </td>
												      <td><?php echo $cat_name; ?></td>
												      <td><?php echo $price; ?> Taka</td>
												      <td><?php echo substr($cat_desc, 0, 20); ?>...</td>
												      <td>
												      	<?php  
												      		if ($is_parent == 1) { ?>
												      			<span class="badge text-bg-primary">PARENT CATEGORY</span>
												      		<?php }
												      		else { ?>
												      			<span class="badge text-bg-secondary">Child CATEGORY</span>
												      		<?php }
												      	?>
												      </td>
												      <td>
												      	<?php  
												      		if ($status == 1) { ?>
												      			<span class="badge text-bg-success">ACTIVE</span>
												      		<?php }
												      		else if ($status == 0) { ?>
												      			<span class="badge text-bg-danger">INACTIVE</span>
												      		<?php }
												      	?>
												      </td>
												      <td><?php echo $join_date; ?></td>
												      <td>
												      	<div class="action-btn">
															<ul>
															    <li>
															      <a href="category.php?do=Edit&uId=<?php echo $cat_id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
															    </li>
															    <li>
															      <a href=""  data-bs-toggle="modal" data-bs-target="#uId<?php echo $cat_id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
															    </li>
															</ul>
														</div>

														<!-- Modal Start -->
														<div class="modal fade" id="uId<?php echo $cat_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
														  <div class="modal-dialog">
														    <div class="modal-content">
														      <div class="modal-header">
														        <h1 class="modal-title fs-5" id="exampleModalLabel">Are You Sure?? To Delete <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $cat_name; ?></span></h1>
														        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														      </div>
														      <div class="modal-body">
														        <div class="modal-btn">
														        	<a href="category.php?do=Delete&DId=<?php echo $cat_id; ?>"class="btn btn-danger me-3">Delete</a>
														        	<a href="" class="btn btn-success" data-bs-dismiss="modal">Close</a>
														        </div>
														      </div>
														    </div>
														  </div>
														</div>
														<!-- Modal End -->

												      </td>
												    </tr>

													<?php

														// Sub Category Work
														$childSql = "SELECT * FROM category WHERE is_parent ='$cat_id' AND status=1 ORDER BY cat_name ASC";
														$childQuery = mysqli_query( $db, $childSql );	

														while ($row = mysqli_fetch_assoc($childQuery)) {
															$cat_id  		= $row['cat_id'];
															$cat_name 		= $row['cat_name'];
															$cat_desc 		= $row['cat_desc'];
															$is_parent 		= $row['is_parent'];
															$status 		= $row['status'];
															$join_date 		= $row['join_date'];
															$cat_image 		= $row['cat_image'];			
															$price 			= $row['price'];				
															$i++;
															?>

															<tr>
														      <th scope="row"><?php echo $i; ?></th>
														      <td>
														      	<?php  
														      		if (!empty($cat_image)) {
																		echo '<img src="assets/images/category/' . $cat_image . '" style="width: 60px";>';
																	}
																	else {
																		echo '<img src="assets/images/category/default.png" style="width: 60px";>';
																	}
														      	?>
														      </td>
														      <td> -- <?php echo $cat_name; ?></td>
														      <td><?php echo $price; ?></td>
														      <td><?php echo substr($cat_desc, 0, 20); ?>...</td>
														      <td>
														      	<?php  
														      		if ($is_parent == 1) { ?>
														      			<span class="badge text-bg-primary">PARENT CATEGORY</span>
														      		<?php }
														      		else { ?>
														      			<span class="badge text-bg-secondary">CHILD CATEGORY</span>
														      		<?php }
														      	?>
														      </td>
														      <td>
														      	<?php  
														      		if ($status == 1) { ?>
														      			<span class="badge text-bg-success">ACTIVE</span>
														      		<?php }
														      		else if ($status == 0) { ?>
														      			<span class="badge text-bg-danger">INACTIVE</span>
														      		<?php }
														      	?>
														      </td>
														      <td><?php echo $join_date; ?></td>
														      <td>
														      	<div class="action-btn">
																	<ul>
																	    <li>
																	      <a href="category.php?do=Edit&uId=<?php echo $cat_id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
																	    </li>
																	    <li>
																	      <a href=""  data-bs-toggle="modal" data-bs-target="#uId<?php echo $cat_id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
																	    </li>
																	</ul>
																</div>

																<!-- Modal Start -->
																<div class="modal fade" id="uId<?php echo $cat_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
																  <div class="modal-dialog">
																    <div class="modal-content">
																      <div class="modal-header">
																        <h1 class="modal-title fs-5" id="exampleModalLabel">Are You Sure?? To Delete <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $cat_name; ?></span></h1>
																        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																      </div>
																      <div class="modal-body">
																        <div class="modal-btn">
																        	<a href="category.php?do=Delete&DId=<?php echo $cat_id; ?>"class="btn btn-danger me-3">Delete</a>
																        	<a href="" class="btn btn-success" data-bs-dismiss="modal">Close</a>
																        </div>
																      </div>
																    </div>
																  </div>
																</div>
																<!-- Modal End -->

														      </td>
														    </tr>

														    <?php

														// Sub Category Work
													 } //second While Loop

									  		} //first while loop
									  	}
									  	?>
									    
									  </tbody>
										
									</table>

									</div>
								</div>
								
							</div>
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
						header("Location: category.php?do=Manage");
					}
					else {
						die("Mysql Error." . mysqli_error($db));
					}
				}
			}
		?>

	</div>
</div>


<?php  
	include "inc/footer.php";
?>