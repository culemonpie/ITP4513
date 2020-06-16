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

<!-- HTML head -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HKCubeShop</title>
	<script src="js/fontawesome.js" charset="utf-8"></script>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/custom.css">
</head>


<!-- Site navigation bar -->
<body>
	<nav class="navbar navbar-expand-md navbar-light">
		<div class="container">
			<a class="navbar-brand" href="index.php">
				<img src="img/logo.png" style="height:40px">
			</a>
			<button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar4" style="">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbar4">
				<ul class="navbar-nav ml-auto">
					<!-- Logged in users only -->

					<!-- Customer -->
					<li class="nav-item"> <a class="nav-link text-secondary" href="list-stores.php">Browse</a> </li>
					<li class="nav-item"> <a class="nav-link text-secondary" href="manage-orders.php">Order</a> </li>
					<li class="nav-item"> <a class="nav-link text-secondary" href="view-profile.php">Profile</a> </li>

					<li class="nav-item"> <span class="nav-link"> // </span></li>

					<!-- Tenant -->
					<li class="nav-item"> <a class="nav-link text-secondary" href="list-goods.php">Goods</a> </li>
					<li class="nav-item"> <a class="nav-link text-secondary" href="list-report.php">Report</a> </li>


					<!-- Everyone -->

					<?php
					// <li class="nav-item">
					// 	<a class="nav-link text-secondary" href="view-profile.php">
					// 	<i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
					// 	<span class="badge badge-light">2</span>
					// </a>
					?>

				</li>
			</ul>
		</div>
	</div>
</nav>

<div class="container-fluid py-1 bg-secondary shadow-sm text-right text-white">
	<i class="fa fa-user" aria-hidden="true"></i>  Tenant - Joe Chan |
	<a class="text-white font-weight-bold" href="index.php">Logout</a>

</div>
