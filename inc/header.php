<?php 
	session_start(); 
	ob_start();
	include "admin/inc/db.php";
?>

<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>Rahman Farm | Home</title>	

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
		<link rel="stylesheet" href="assets/vendor/circle-flip-slideshow/css/component.css">
		
		<!-- Demo CSS -->
		<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/css/skins/default.css"> 

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/css/custom.css">

		<link rel="stylesheet" href="assets/css/customize.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.min.js"></script>

		<!-- FONT AWESOME CDN LINK -->
		<script src="https://kit.fontawesome.com/0c66e46c25.js" crossorigin="anonymous"></script>

		<!-- whats app link part -->
		<script type="text/javascript" src="assets/whatsapp/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="assets/whatsapp/floating-wpp.min.js"></script>
		<link rel="stylesheet" href="assets/whatsapp/floating-wpp.min.css">
		<!-- whats app link part -->

		<style>
           /* Google font linking */
           @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,300;1,400;1,500;1,600&family=Quicksand:wght@300;400;500;600;700&display=swap');
           /* Google font linking */

           body{
           		font-family: 'Quicksand', sans-serif;
           		text-decoration: none;
           }

           .main{
           	background-image: url(assets/images/1.jpg);
		    background-repeat: no-repeat;
		    background-position: center;
		    background-size: cover;   
		    background-attachment: fixed;      
			}

           a{
           	text-decoration: none;
           }
			.welcome span {
			    color: #75B16C;
			    background-image: url(assets/images/line.png);
			    background-repeat: no-repeat;
			    background-position: center;
			    background-size: contain;
			    font-weight: 600;
			}
			.welcome{
				font-family: 'Poppins', sans-serif;
			}

			.welcome-section{
				justify-content: space-evenly;
			}
			.word-rotator-words {
			    background: #75B16C;
			    color: #F2AA44;
			    border-radius: 15px;
			    font-family: 'Poppins', sans-serif;
			}
			.service{
				font-family: 'Poppins', sans-serif;
			}

			.service{
				justify-content: space-evenly;
			}

			.year{
				font-family: 'Cormorant Garamond', serif;
				color: #75B16C;
				font-weight: 600;
			}

			.image-container {
			  width: 250px; /* Set your preferred width */
			  height: 250px; /* Set your preferred height */
			  overflow: hidden;
			  display: inline-block;
			  transition: transform 0.3s ease-in-out;
			  border-radius: 50%;
			}

			.rotate-zoom-image {
			  width: 100%;
			  height: 100%;
			  object-fit: cover;
			  transition: transform 0.3s ease-in-out;
			   border-radius: 50%;
			}

			.rotate-zoom-image:hover {
			  transform: scale(1.1) rotate(15deg); /* Adjust zoom and rotation values as needed */
			}

			h1.cat_head {
			    margin: 0;
			    font-family: 'Poppins', sans-serif;
			}
			.cat_head a{
				font-family: 'Poppins', sans-serif;
			    font-size: 25px;
			    margin: 0 !important;
			    text-decoration: none;
			    color: #000;

			}

			.cat_desc{
				font-family: 'Poppins', sans-serif;
    			font-size: 25px;
    			text-decoration: none;
			}

			.home-concept strong{
				margin: 0;
				color: #F2AA44;
			}

			.home-concept .process-image img {
			    border-radius: 150px;
			    margin: 29px 8px 0px;
			    width: auto;
			    height: auto;
			    max-width: 145px;
			    max-height: 145px;
			}

			.showcase_part{
				background-image: url(assets/images/bg.png);
			    background-repeat: no-repeat;
			    background-position: center;
			    background-size: cover;
			    background-attachment: fixed;
			    padding: 8%;

			}


/*		Imaga Zoom In	*/
			.image-containers {
			  width: 250px; /* Set your preferred width */
			  height: 250px; /* Set your preferred height */
			  overflow: hidden;
			  display: inline-block;
			  transition: transform 0.3s ease-in-out;
			  border-radius: 10px;
			}

			.rotate-zoom-images {
			  width: 100%;
			  height: 100%;
			  object-fit: cover;
			  transition: transform 0.3s ease-in-out;
/*			   border-radius: 50%;*/
			}

			.rotate-zoom-images:hover {
			  transform: scale(1.1) rotate(0deg); /* Adjust zoom and rotation values as needed */
			}

			.image_show{
				background-image: url(assets/images/bg_image.png);
			    background-repeat: no-repeat;
			    background-position: center;
			    background-size: cover;
			    background-attachment: fixed;
			}

			.welcomes{
				font-family: 'Poppins', sans-serif;
			}

			.galery{
				color: honeydew;
			    font-size: 22px;
			    font-weight: 600;
			}

			.blog_card{
				transition: 0.5s;
				border-radius: 7px;
			}


			.blog_card:hover{
				box-shadow: 1px 10px 15px #ccc;
				transition: 0.5s;
			}

			.phone {
			    border: dashed;
			    padding: 24px;
			    border-radius: 50%;
			}

			footer{
				background-image: url(assets/images/bg-6.jpg);
				    background-repeat: no-repeat;
				    background-position: center;
				    background-size: cover;   
				/*    background-attachment: fixed;  */
				color: #000;
			}

			.action-btn, 
			.modal-btn{
			        text-align: center;
			}

			.action-btn ul{
			        padding: 0;
			        margin: 0;
			}

			.action-btn ul li{
			        list-style: none;
			        display: inline;
			        margin: 0px 5px;
			}
			.action-btn ul li .edit{
			        color: green;
			}

			.action-btn ul li .trush{
			        color: red;
			}

		</style>

	</head>

	<body class="loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 500}">
		<div class="loading-overlay">
			<div class="bounce-loader">
				<div class="bounce1"></div>
				<div class="bounce2"></div>
				<div class="bounce3"></div>
			</div>
		</div>
		
		<div class="body">
			
		<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 45, 'stickySetTop': '-45px', 'stickyChangeLogo': true}">
				<div class="header-body">
					<div class="header-container container">
						<div class="header-row">

							<!-- START: LOGO PART -->
							<div class="header-column">
								<div class="header-row">
									<div class="header-logo">
										<a href="index.php">
											<img alt="Porto" width="225" height="60" data-sticky-width="166" data-sticky-height="53" data-sticky-top="25" src="assets/images/logo.png">
										</a>
									</div>
								</div>
							</div>
							<!-- END: LOGO PART -->

							<div class="header-column justify-content-end">
								<!-- START: TOP NAVIGATION PART -->
								<?php include "inc/top_navigation.php"; ?>
								<!-- END: TOP NAVIGATION PART -->

								<!-- START: Main NAVIGATION PART -->
								<?php include "inc/navigation.php"; ?>
								<!-- END: Main NAVIGATION PART -->

								
							</div>
						</div>
					</div>
				</div>
			</header>