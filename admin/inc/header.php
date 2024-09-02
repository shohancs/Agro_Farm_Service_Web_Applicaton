<?php 
	session_start(); 
	ob_start();
	include "db.php";

	if ( empty($_SESSION['user_id']) || empty($_SESSION['user_email']) ) {
		header("Location: logout.php");
	}
?>

<!doctype html>
<html lang="en" class="semi-dark">


<!-- Mirrored from codervent.com/rukada/demo/vertical/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Jan 2023 17:26:15 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />	
	<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">

	<!-- FONT AWESOME CDN LINK -->
	<script src="https://kit.fontawesome.com/0c66e46c25.js" crossorigin="anonymous"></script>
	
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/dark-theme.css" />
	<link rel="stylesheet" href="assets/css/semi-dark.css" />
	<link rel="stylesheet" href="assets/css/header-colors.css" />
	<link rel="stylesheet" href="assets/css/custom.css" />
	<title>Dashboard | Home</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">

		<!-- ########## START: LEFT MENU ########## -->
		<?php include "inc/leftmenu.php"; ?>
		<!-- ########## END: LEFT MENU ########## -->

		<!-- ########## START: SIDE BAR ########## -->
		<?php include "inc/topbar.php"; ?>
		<!-- ########## END: SIDE BAR ########## -->