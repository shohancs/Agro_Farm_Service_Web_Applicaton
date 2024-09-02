<footer id="footer">
				<div class="container">
					<div class="row py-5">
						<div class="col-md-4 col-lg-4 mb-4 mb-lg-0">
							<div class="header-logo">
								<a href="index.php">
									<img alt="Porto" src="assets/images/logo.png" style="width: 100%;">
								</a>
							</div>
						</div>
						<div class="col-md-4 col-lg-4 mb-4 mb-md-0">
							<div class="contact-details">
								<h5 class="text-4 mb-3" style="color: #000;">CONTACT US</h5>
								<ul class="list list-icons list-icons-lg">
									<li class="mb-1"><i class="far fa-dot-circle text-color-primary"></i><p class="m-0">234 Street Name, City Name</p></li>
									<li class="mb-1"><i class="fab fa-whatsapp text-color-primary"></i><p class="m-0"><a href="tel:8001234567">
										<?php  
						  					$userSql = "SELECT * FROM users WHERE role=1 AND status=1 ORDER BY user_name ASC";
									  		$userQuery = mysqli_query( $db, $userSql );

									  		while ($row = mysqli_fetch_assoc($userQuery)) {
									  			$user_phone 	= $row['user_phone'];
									  			?><a href="tel:+<?php echo $user_phone; ?>" style="text-decoration:none;"><?php echo $user_phone; ?></a>
					                  					
									  			<?php
											}
					                	?>
									</a></p></li>
									<li class="mb-1"><i class="far fa-envelope text-color-primary"></i><p class="m-0"><a href="mailto:farm@gmail.com">farm@gmail.com</a></p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-4 col-lg-4">
							<h5 class="text-4 mb-3" style="color: #000;">FOLLOW US</h5>
							
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7301.832453840114!2d90.3753388!3d23.785997300000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1692371491851!5m2!1sen!2sbd" width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>

					</div>
					<p class="text-center" style="    margin: 0px auto;
    color: #000;
    padding: 8px 0px 15px;
    font-size: 15px;
    font-weight: 500;">© Copyright 2024. All Rights Reserved.</p>
				</div>
			</footer>
		</div>

		<!-- Vendor -->
		<!-- <script src="assets/vendor/jquery/jquery.min.js"></script> -->
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
		<!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> -->
		<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
		<script>
			new DataTable('#example');
		</script>

		<!-- whats app link part -->
		<script>
			$('#myDiv').floatingWhatsApp({
		    phone: '01731578788',
		    popupMessage: 'Hello, how can we help you?',
		    showPopup: true
		});
		</script>
		<!-- whats app link part -->



		<?php  
			ob_end_flush();
		?>

	</body>
</html>