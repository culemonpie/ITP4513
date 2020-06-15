<?php

/*
This header is to be included in the front of all pages.
This page contains the required css / js dependencies to be included, and performs a connection to the database.
*/

$hostname = "127.0.0.1";
$database = "ProjectDB";
$username = "4513cubeshop";
$password = "fWDVmDH2D9yeuf";
$port = 3306;

// $conn = mysqli_connect($hostname, $username, $password, $database);
$conn = new mysqli($hostname,$username,$password,$database, $port);

if ($conn -> connect_errno) {
	echo "Failed to connect to MySQL: " . $conn -> connect_error;
	// exit();
}

require_once("functions.php");

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HKCubeShop</title>
	<!-- <link rel="stylesheet" href="css/fontawesome.min.css"> -->
	<script src="js/fontawesome.js" charset="utf-8"></script>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/custom.css">
</head>

<body>
	<nav class="navbar navbar-expand-md navbar-light shadow-sm rounded">
		<div class="container"> <a class="navbar-brand text-primary" href="index.php">
			<img src="img/logo.png" style="height:40px">
		</a> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar4" style="">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbar4">
			<ul class="navbar-nav ml-auto">
				<!-- Logged in users only -->
				<li class="nav-item"> <a class="nav-link text-secondary" href="list-order.php">Order</a> </li>
				<li class="nav-item"> <a class="nav-link text-secondary" href="#">Goods</a> </li>
				<li class="nav-item"> <a class="nav-link text-secondary" href="report.php">Report</a> </li>
				<li class="nav-item"> <a class="nav-link text-secondary" href="view-profile.php">Profile</a> </li>
				<li class="nav-item">
					<a class="nav-link text-secondary" href="view-profile.php">
					<i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
					<span class="badge badge-light">2</span>
				</a>

				</li>
				<li class="nav-item"> <a class="nav-link text-secondary" href="index.php">Logout</a> </li>
			</ul>
		</div>
	</div>
</nav>
