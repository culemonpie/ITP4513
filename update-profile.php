<?php
include 'inc/header.php';

/*
Page code:
Who can access: Customer
Description: Page where customer can edit their profile.
*/

customer_only();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$is_valid = true;
	extract($_POST);
	$customerEmail = $_SESSION[customerEmail];

	if(!isset($firstName) || $firstName==''){
		$is_valid = false;
		$error_message.="First name is missing<br>";
	}

	if(!isset($lastName) || $lastName==''){
		$is_valid = false;
		$error_message.="Last name is missing<br>";
	}

	if(!isset($phoneNumber) || $phoneNumber==''){
		$is_valid = false;
		$error_message.="First name is missing<br>";
	}

	if($is_valid){
		$firstName = $conn->real_escape_string($firstName);
		$lastName = $conn->real_escape_string($lastName);
		$phoneNumber = $conn->real_escape_string($phoneNumber);

		$qs = "UPDATE CUSTOMER SET firstName = '$firstName', lastName = '$lastName', phoneNumber = '$phoneNumber' where customerEmail = '$customerEmail';";
		$error_message.= $qs ."<br>";
		$query = mysqli_query($conn, $qs);

		if (mysqli_error($conn)) {
			$error_message.=mysqli_error($conn);
		} else {
			header("Location: view-profile.php");
		}
	}
}

$qs = "SELECT * FROM CUSTOMER where customerEmail = '$_SESSION[customerEmail]'";
$query = mysqli_query($conn, $qs) or die(mysqli_error($conn));

$customer = mysqli_fetch_assoc($query);

extract($customer);

print_error_message($error_message);

print("

<div class='container'>
<div class='row'>
<div class='col-12 my-2'>
<h4 class='text-secondary'>Change password</h4>
</div>
</div>
</div>


<form method='post'>

<div class='container'>
<div class='row'>
<div class='col-12'>
<a href='view-profile.php' class='btn btn-default'>Return</a>
</div>
</div>


<div class='row mt-3'>
<div class='col-12 col-sm-3'>
Email
</div>
<div class='col-12 col-sm-8 text-secondary font-weight-bold'>
<!-- This cannot be changed -->
$customerEmail
</div>
</div>

<div class='row mt-3'>
<div class='col-12 col-sm-3'>
First name
</div>
<div class='col-12 col-sm-8 text-secondary font-weight-bold'>
<input type='text' class='form-control' name='firstName' value='$firstName' required>
</div>
</div>

<div class='row mt-3'>
<div class='col-12 col-sm-3'>
Last name
</div>
<div class='col-12 col-sm-8 text-secondary font-weight-bold'>
<input type='text' class='form-control' name='lastName' value='$lastName' required>
</div>
</div>

<div class='row mt-3'>
<div class='col-12 col-sm-3'>
Phone
</div>
<div class='col-12 col-sm-8 text-secondary font-weight-bold'>
<input type='text' class='form-control' name='phoneNumber' value='$phoneNumber' required>
</div>
</div>

<div class='row my-3'>
<input type='Submit' name='' value='Save' class='btn btn-default'>
</div>
</div>


</form>

");


include 'inc/footer.php';
?>
