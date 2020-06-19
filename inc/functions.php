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

function customer_only(){

}

function tenant_only(){

}

?>
