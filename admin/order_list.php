<?php  
	include "inc/header.php";
?>

<div class="page-wrapper">
	<div class="page-content">
		<?php  
			$do = isset($_GET['do']) ? $_GET['do'] : "Manage";

			if ( $do == "Manage" ) { ?>
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Order Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Order Manage</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Manage All Order</h6>
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
									      <th scope="col">Image</th>
									      <th scope="col">Order Item Name</th>
									      <th scope="col">User Email</th>
									      <th scope="col">User Phone</th>
									      <th scope="col">Category</th>
									      <th scope="col">Price (Per Kg)</th>
									      <th scope="col">Status</th>
									      <th scope="col">Order date</th>
									      <th scope="col">Action</th>
									    </tr>
									  </thead>

									  <tbody>
									  	<?php  
									  		$orderSql = "SELECT * FROM order_list WHERE status != 0 ORDER BY or_id DESC";
									  		$orderQuery = mysqli_query( $db, $orderSql );
									  		$orderCount = mysqli_num_rows($orderQuery);

									  		if ($orderCount == 0) { ?>
									  			<div class="alert alert-warning text-center" role="alert">
												  Sorry! No Order Found into the Database.
												</div>
									  		<?php }

									  		else {
									  			$i = 0;

										  		while ($row = mysqli_fetch_assoc($orderQuery)) {
										  			$or_id 			= $row['or_id'];
										  			$user_id 		= $row['user_id'];
										  			$user_phone 	= $row['user_phone'];
										  			$or_name 		= $row['or_name'];
										  			$or_category 	= $row['or_category'];
										  			$price 			= $row['price'];
										  			$or_image 		= $row['or_image'];
										  			$status 		= $row['status'];
										  			$join_date 		= $row['join_date'];
										  			$i++;
										  			?>

										  			<tr>
												      <th scope="row"><?php echo $i; ?></th>
												      <td>
												      	<?php  
												      		if (!empty($or_image)) {
																echo '<img src="assets/images/category/' . $or_image . '" style="width: 60px";>';
															}
															else {
																echo '<img src="assets/images/category/default.png" style="width: 60px";>';
															}
												      	?>
												      </td>
												      <td><?php echo $or_name; ?></td>
												      <td><a href = "mailto: <?php echo $user_id; ?>" style=" text-decoration:none;"><?php echo $user_id; ?></a></td>
												      <td><a href="tel:<?php echo $user_phone; ?>" style=" text-decoration:none;"><?php echo $user_phone; ?></a></td>

												      <td>
												      	<?php  
												      		$readCat_Sql = "SELECT * FROM category WHERE cat_id='$or_category'";
												      		$readCat_Quary = mysqli_query($db, $readCat_Sql);

												      		while( $row = mysqli_fetch_assoc($readCat_Quary) ){
												      			$cc_id 	 = $row['cat_id'];
												      			$cc_name = $row['cat_name'];

												      			echo $cc_name;
												      		}

												      	?>
												      </td>
												      <td><?php echo $price; ?> Taka</td>
												      <td>
												      	<?php  
												      		if ($status == 1) { ?>
												      			<span class="badge bg-success">ACTIVE</span>
												      		<?php }

												      		else if ($status == 2) { ?>
												      			<span class="badge bg-info">PENDING</span>
												      		<?php }

												      		else if ($status == 0) { ?>
												      			<span class="badge bg-danger">INACTIVE</span>
												      		<?php }
												      	?>
												      </td>
												      <td><?php echo $join_date; ?></td>
												      <td>
												      	<div class="action-btn">
															<ul>
															    <li>
															      <a href="order_list.php?do=Edit&uId=<?php echo $or_id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
															    </li>
															    <li>
															      <a href=""  data-bs-toggle="modal" data-bs-target="#uId<?php echo $or_id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
															    </li>
															</ul>
														</div>

														<!-- Modal Start -->
														<div class="modal fade" id="uId<?php echo $or_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
														  <div class="modal-dialog">
														    <div class="modal-content">
														      <div class="modal-header">
														        <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Sure?? To Move <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $or_name; ?></span> Trash folder!!</h1>
														        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														      </div>
														      <div class="modal-body">
														        <div class="modal-btn">
														        	<a href="order_list.php?do=Trash&tId=<?php echo $or_id; ?>"class="btn btn-danger me-3">Trash</a>
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
										  		}

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
					$upReadSql = "SELECT * FROM order_list WHERE or_id='$upId'";
					$upReadQuery = mysqli_query($db, $upReadSql);

					while ( $row = mysqli_fetch_assoc($upReadQuery) ) {
						$or_id 			= $row['or_id'];
						$user_id 		= $row['user_id'];
			  			$or_name 		= $row['or_name'];
			  			$or_category 	= $row['or_category'];
			  			$price 			= $row['price'];
			  			$or_image 		= $row['or_image'];
			  			$status 		= $row['status'];
			  			$join_date 		= $row['join_date'];
			  			?>
			  				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
								<div class="breadcrumb-title pe-3">Order Management</div>
								<div class="ps-3">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb mb-0 p-0">
											<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
											</li>
											<li class="breadcrumb-item active" aria-current="page">Edit Order</li>
										</ol>
									</nav>
								</div>
							</div>
							<!--end breadcrumb-->
							<h6 class="mb-0 text-uppercase">Update <span style="color: firebrick;"><?php echo $or_name; ?></span> Info</h6>
							<hr>
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<div id="example3_wrapper" class="dataTables_wrapper dt-bootstrap5">
											<div class="row">
												
												<!-- ########## START: FORM ########## -->
												<form action="order_list.php?do=Update" method="POST" enctype="multipart/form-data">
													<div class="row">
														<div class="col-lg-6">

															<div class="mb-3">
																<label for="">Status</label>
																<select class="form-select" name="status">
																  <option value="">Please select the Status</option>
																  <option value="1" <?php if( $status == 1 ){ echo "selected"; } ?>>Active</option>
																  <option value="2" <?php if( $status == 2 ){ echo "selected"; } ?>>Pending</option>
																  <option value="0" <?php if( $status == 0 ){ echo "selected"; } ?>>InActive</option>
																</select>

																<div class="mb-3 py-3">
																	<div class="d-grid gap-2">
																		<input type="hidden" name="updateOrderId" value="<?php echo $or_id; ?>">
																		<input type="submit" name="upOrder" class="btn btn-primary" value="Update Order Item">
																	</div>
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
				if (isset($_POST['upOrder'])) {
					$updateOrderId 	= mysqli_real_escape_string($db, $_POST['updateOrderId']);
					$status 		= mysqli_real_escape_string($db, $_POST['status']);

					$updateOrderSql = "UPDATE order_list SET status='$status' WHERE or_id='$updateOrderId'";
					$upateOrderQuery = mysqli_query($db, $updateOrderSql);

					if ($upateOrderQuery) {
						header("Location: order_list.php?do=Manage");
					}
					else {
						die ("Mysql Error." .mysqli_error($db) );
					}
				}
			}

			else if ( $do == "Trash" ) {
				if (isset($_GET['tId'])) {
					$trushId = $_GET['tId'];
					$trushSql = "UPDATE order_list SET status=0 WHERE or_id='$trushId'";
					$trushQuery = mysqli_query( $db, $trushSql );

					if ($trushQuery) {
						header("Location: order_list.php?do=Manage");
					}
					else {
						die("mysql error" . mysqli_error($db));
					}

				}
			}

			else if ( $do == "ManageTrash" ) { ?>
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Trash Order Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Trash Order Manage</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Manage All Trash Order</h6>
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
									      <th scope="col">Image</th>
									      <th scope="col">Order Item Name</th>
									      <th scope="col">User Email</th>
									      <th scope="col">User Phone</th>
									      <th scope="col">Category</th>
									      <th scope="col">Price (Per Kg)</th>
									      <th scope="col">Status</th>
									      <th scope="col">Order date</th>
									      <th scope="col">Action</th>
									    </tr>
									  </thead>

									  <tbody>
									  	<?php  
									  		$orderSql = "SELECT * FROM order_list WHERE status = 0 ORDER BY or_id DESC";
									  		$orderQuery = mysqli_query( $db, $orderSql );
									  		$orderCount = mysqli_num_rows($orderQuery);

									  		if ($orderCount == 0) { ?>
									  			<div class="alert alert-warning text-center" role="alert">
												  Sorry! No Order Found into the Database.
												</div>
									  		<?php }

									  		else {
									  			$i = 0;

										  		while ($row = mysqli_fetch_assoc($orderQuery)) {
										  			$or_id 			= $row['or_id'];
										  			$user_id 		= $row['user_id'];
										  			$user_phone 	= $row['user_phone'];
										  			$or_name 		= $row['or_name'];
										  			$or_category 	= $row['or_category'];
										  			$price 			= $row['price'];
										  			$or_image 		= $row['or_image'];
										  			$status 		= $row['status'];
										  			$join_date 		= $row['join_date'];
										  			$i++;
										  			?>

										  			<tr>
												      <th scope="row"><?php echo $i; ?></th>
												      <td>
												      	<?php  
												      		if (!empty($or_image)) {
																echo '<img src="assets/images/category/' . $or_image . '" style="width: 60px";>';
															}
															else {
																echo '<img src="assets/images/category/default.png" style="width: 60px";>';
															}
												      	?>
												      </td>
												      <td><?php echo $or_name; ?></td>
												      <td><a href = "mailto: <?php echo $user_id; ?>" style=" text-decoration:none;"><?php echo $user_id; ?></a></td>
												      <td><a href="tel:<?php echo $user_phone; ?>" style=" text-decoration:none;"><?php echo $user_phone; ?></a></td>

												      <td>
												      	<?php  
												      		$readCat_Sql = "SELECT * FROM category WHERE cat_id='$or_category'";
												      		$readCat_Quary = mysqli_query($db, $readCat_Sql);

												      		while( $row = mysqli_fetch_assoc($readCat_Quary) ){
												      			$cc_id 	 = $row['cat_id'];
												      			$cc_name = $row['cat_name'];

												      			echo $cc_name;
												      		}

												      	?>
												      </td>
												      <td><?php echo $price; ?> Taka</td>
												      <td>
												      	<?php  
												      		if ($status == 1) { ?>
												      			<span class="badge bg-success">ACTIVE</span>
												      		<?php }

												      		else if ($status == 2) { ?>
												      			<span class="badge bg-info">PENDING</span>
												      		<?php }

												      		else if ($status == 0) { ?>
												      			<span class="badge bg-danger">INACTIVE</span>
												      		<?php }
												      	?>
												      </td>
												      <td><?php echo $join_date; ?></td>
												      <td>
												      	<div class="action-btn">
															<ul>
															    <li>
															      <a href="order_list.php?do=Edit&uId=<?php echo $or_id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
															    </li>
															    <li>
															      <a href=""  data-bs-toggle="modal" data-bs-target="#uId<?php echo $or_id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
															    </li>
															</ul>
														</div>

														<!-- Modal Start -->
														<div class="modal fade" id="uId<?php echo $or_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
														  <div class="modal-dialog">
														    <div class="modal-content">
														      <div class="modal-header">
														        <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Sure?? To Delete <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $or_name; ?></span> !!</h1>
														        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														      </div>
														      <div class="modal-body">
														        <div class="modal-btn">
														        	<a href="order_list.php?do=Delete&DId=<?php echo $or_id; ?>"class="btn btn-danger me-3">Delete</a>
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
										  		}

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
					$deleteSql = "DELETE FROM order_list WHERE or_id='$deleteId' ";
					$deleteQuery = mysqli_query($db, $deleteSql);

					if ($deleteQuery) {
						header("Location: order_list.php?do=Manage");
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