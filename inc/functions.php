<?php

function print_error_message($error_message){
	/*
	Display an alert message to the user.
	Recommended to be placed below the navbar, or a place where appropriate.
	*/

	if (isset($error_message) && $error_message != ''){
		print("
		<div class='container mt-3'>
		<div class='alert alert-danger'>
		$error_message
		</div>
		</div>
		");
	}
}

function print_post_message(){
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		print("
		<hr>
		<div class='container my-3'>
		<div class='row'>
		Debug Information<br>
		");

		foreach ($_POST as $key => $value){
			echo $key." - ".$value."<br>";
		}

		print("
		</div>
		</div>
		");
	}
}

function login_only(){
	if (!isset($_SESSION["type"])){
		header("location: login-only.php");
	}
}

function customer_only(){
	login_only();
	if (isset($_SESSION["type"]) && $_SESSION["type"] == "tenant"){
		header("location: customer-only.php");
	}
}

function tenant_only(){
	login_only();
	if (isset($_SESSION["type"]) && $_SESSION["type"] == "customer"){
		header("location: tenant-only.php");
	}
}




?>
