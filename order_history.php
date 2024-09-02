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

						<h1 class="text-white font-weight-bold text-8">Order History</h1>
					</div>

					<div class="col-md-12 align-self-center order-1">

						<ul class="breadcrumb d-block text-center" >
							<li><a href="index.php" class="text-white">HOME</a></li>
							<li class="active text-white" >ORDER HISTORY</li>
						</ul>
					</div>					
				</div>
			</div>
		</section>
		<!-- ########## END: TOP HEADING ########## -->

		<div class="container py-4">
			<div class="row">

				<div class="col-lg-12 order-lg-1">
					<div class="row">
						<h1 class="welcome text-center">Order History</h1>
						<!-- START: TABLE -->
						<div class="table-responsive">
							<table id="example" class="table table-striped table-hover table-bordered">
							  <thead class="thead-dark">
							    <tr>
							      <th scope="col">#Sl</th>
							      <th scope="col">Image</th>
							      <th scope="col">Booking Item</th>
							      <th scope="col">Category</th>
							      <th scope="col">Price ( Per Kg )</th>
							      <th scope="col">Order Date</th>
							      <th scope="col">Status</th>
							      <th scope="col">Action</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<?php 

								  	if (!empty($_SESSION['email'])) {
											$uId = $_SESSION['email']; 

											$orderSql = "SELECT * FROM order_list WHERE  user_id='$uId' ORDER BY or_id DESC";
											$orderQuery = mysqli_query( $db, $orderSql );
											$markCount = mysqli_num_rows($orderQuery);

									  		if ($markCount == 0) { ?>
									  			<div class="alert alert-info text-center" role="alert">
												  Sorry! No Product Found into your Cart.
												</div>
									  		<?php }

									  		else {
									  			$i = 0;
									  			$totalPrice = 0;
										  		while ($row = mysqli_fetch_assoc($orderQuery)) {
										  			$totalPrice += $row["price"];
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
																			echo '<img src="admin/assets/images/category/' . $or_image . '" style="width: 60px";>';
																		}
																		else {
																			echo '<img src="admin/assets/images/category/default.png" style="width: 60px";>';
																		}
													      	?>
													      </td>
													      <td><?php echo $or_name; ?></td>
															  <td>
															  	<?php  
															  		$readCat_Sql = "SELECT * FROM category WHERE cat_id='$or_category'";
															  		$readCat_Quary = mysqli_query($db, $readCat_Sql);

															  		while( $row = mysqli_fetch_assoc($readCat_Quary) ){
															  			$cat_id  		= $row['cat_id'];
																		$cat_name 		= $row['cat_name'];
																		?>
																		<span class="badge badge-primary"><?php echo $cat_name; ?></span>
																		<?php
															  		}

															  	?>
															  </td>
													      <td><?php echo $price; ?> Taka</td>
													      <td><?php echo $join_date; ?></td>
													      <td>
													      	<?php  
													      		if ($status == 1) { 

													      			?>
													      			<span class="badge badge-success" data-toggle="tooltip" data-placement="top" title="This item is Activated. some minutes latter we will call you.">ACTIVE</span>
	 
													      		<?php }

													      		else if ($status == 2) { ?>
													      			<span class="badge badge-info" data-toggle="tooltip" data-placement="top" title="Please wait some minutes, our administrator will be see your booked.">PENDING</span>
													      		<?php }

													      		else if ($status == 0) { ?>
													      			<span class="badge badge-danger" data-toggle="tooltip" data-placement="top" title="Sorry! This item is not available.">INACTIVE</span>
													      		<?php }
													      	?>
													      </td>
													      <td>
																	<div class="action-btn">
																		<ul>
																		    <li>
																		      <a href=""  data-toggle="modal" data-target="#did<?php echo $or_id; ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
																		    </li>
																		</ul>
																	</div>

																	<!-- Modal Start -->
																	<div class="modal fade" id="did<?php echo $or_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
																	  <div class="modal-dialog">
																	    <div class="modal-content">
																	      <div class="modal-header">
																	        <h3 class="modal-title" id="exampleModalLabel">Are You Sure?? To Delete <span style="color: green;"><?php echo $or_name; ?></span> Item!!</h3>
																	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	          <span aria-hidden="true">&times;</span>
																	        </button>
																	      </div>
																	      <div class="modal-body">
																	        <div class="modal-btn">
																	        	<a href="order_history.php?DId=<?php echo $or_id; ?>"class="btn btn-danger me-3">Delete</a>
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

							    <h3>Total Price: <?php echo $totalPrice; ?> Taka</h3>
							    <form action="ease_payment.php" method="GET">
							    	<input type="hidden" value="<?php echo $totalPrice; ?>" name="payment">
							    	<input type="submit"  class="btn btn-success btn-modern text-uppercase" value="Proceed to Checkout" >
							    </form>


						</div>
						<?php  
							if (isset($_GET['DId'])) {
								$deleteId = $_GET['DId'];
								$deleteSql = "DELETE FROM order_list WHERE or_id='$deleteId' ";
								$deleteQuery = mysqli_query($db, $deleteSql);

								if ($deleteQuery) {
									header("Location: order_history.php");
								}
								else {
									die("Mysql Error." . mysqli_error($db));
								}
							}
						?>
						<!-- END: TABLE -->


					</div>
				</div>
			</div>
		</div>



		<!-- START: CONTACT FORM -->
		<section class="contact-form py-5">
			<div class="container">
				<div class="row d-flex align-items-center">
                   <div class="col-lg-6">
                   	<div>
                   		<!-- for farm name -->
	                  <?php  
	                  	$aboutSql = "SELECT * FROM about WHERE status=1 ORDER BY title ASC";
				  		$aboutQuery = mysqli_query( $db, $aboutSql );

					  		while ($row = mysqli_fetch_assoc($aboutQuery)) {
					  			$title 		= $row['title'];
					  			$descrive 	= $row['descrive'];
					  			?>
									<h1 class="welcome">Contact Our <span><?php echo $title; ?></span></h1>
									<p class="text-dark font-weight-normal appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300" style="font-size: 16px; margin: 0;"><?php echo substr($descrive, 0, 250); ?></p>
									
					  			<?php
					  		}
	                  	?>
	                  	<!-- for farm name -->
                   	</div>
                   	<div class="d-flex py-5" style="justify-content: space-evenly; align-items: center; padding: 71px;">
          					<div class="phone">
          						<img src="assets/images/phone-icon.png" alt="">
          					</div>
          					<div>
                  				<h4>Or Call Us Now</h4>
				  				<?php  
				  					$userSql = "SELECT * FROM users WHERE role=1 AND status=1 ORDER BY user_name ASC";
							  		$userQuery = mysqli_query( $db, $userSql );

							  		while ($row = mysqli_fetch_assoc($userQuery)) {
							  			$user_phone 	= $row['user_phone'];
							  			?>
							  				
											<h1 style="font-family: 'Cormorant Garamond', serif; "><a href="tel:+<?php echo $user_phone; ?>" style="color: #75B16C; font-weight: 600; font-size: 57px; text-decoration:none;"><?php echo $user_phone; ?></a></h1>
			                  					
							  			<?php
									}
			                	?>
                			</div>
                  		</div>
                   </div>
					
					<!-- for form -->
					<div class="col-lg-6">
						<div class="contact_form" style="box-shadow: 1px 10px 15px #ccc; border-top: 4px solid #08c; border-radius: 5px; color: #000; background: #F7F7F7; font-size: 16px; padding: 34px;">

							<?php  
								if(isset($_SESSION['msg'])) {
								    $message = $_SESSION['msg'];
								    unset($_SESSION['msg']);
								    ?>
								    <div class="alert alert-info text-center" role="alert">
									  <?php echo $message; ?>
									</div>
								    <?php
								    
								}
							?>

							<form action="" method="POST" enctype="multipart/form-data">
							  <div class="form-group">
							    <label for="subject">Subject of the Message</label>
							    <input type="text" name="title" class="form-control" id="subject" aria-describedby="subject" placeholder="subject.." required autocomplete="off">
							  </div>
							  <div class="form-group">
							    <label for="message">Message</label>
							    <textarea name="message" class="form-control" id="message.." rows="5" placeholder="message" required autocomplete="off"></textarea>
							  </div>

							  <?php  
							  	if (empty($_SESSION['user_id'])) {
							  		?>
							  		<a href="login.php">Login to reserve your service</a>
							  		<?php
							  	}
							  	else { ?>

							  		<input type="hidden" name="status" value="1">
							  <input type="hidden" name="useremail" value="<?php echo $_SESSION['email']; ?>">
								<input type="hidden" name="userphone" value="<?php echo $_SESSION['phone']; ?>">
							  <input type="submit" name="addUser" class="btn btn-primary btn-lg btn-block">

							  	<?php }
							  ?>

							  
							</form>

							<?php  
								if (isset($_POST['addUser'])) {
									$title 		= mysqli_real_escape_string($db, $_POST['title']);
									$message 	= mysqli_real_escape_string($db, $_POST['message']);
									$status 	= mysqli_real_escape_string($db, $_POST['status']);
									$useremail 	= mysqli_real_escape_string($db, $_POST['useremail']);
									$userphone 	= mysqli_real_escape_string($db, $_POST['userphone']);

									$sql = "INSERT INTO comments ( user_id, user_number, subject, comments, status, cmt_date ) VALUES('$useremail', '$userphone', '$title', '$message', '$status', now())";
									$query = mysqli_query( $db, $sql );

									if ($query) {
										$_SESSION['msg'] = "We Received your message. After of some times letter we will call & email you. Thank you for with us.";
										header("Location: order_history.php");
									}
									else {
										die("Mysql Error." . mysqli_error($db));
									}
								}
							?>

						</div>
					</div>
					<!-- for form -->
				</div>
			</div>
			
		</section>
		<!-- END: CONTACT FORM -->

		
	</div>

<?php include "inc/footer.php"; ?>

