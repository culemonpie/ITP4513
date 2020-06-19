<?php
include 'inc/header.php';

/*
Page code:
Who can access: Customer
Description: Page where customer can edit their profile.
*/

customer_only();

$qs = "SELECT * FROM CUSTOMER where customerEmail = '$_SESSION[customerEmail]'";
$query = mysqli_query($conn, $qs) or die(mysqli_error($conn));

$customer = mysqli_fetch_assoc($query);

extract($customer);

printf("

<div class='container'>
	<div class='row'>
		<div class='col-12 my-2'>
			<h4 class='text-secondary'>View Profile - $customer[firstName] $lastName</h4>
		</div>
	</div>
</div>

<div class='container'>
	<div class='row'>
		<div class='col-12 col-sm-3'>
			Email
		</div>

		<div class='col-12 col-sm-8 text-secondary font-weight-bold'>
			$customerEmail
		</div>
	</div>

	<div class='row mt-3'>
		<div class='col-12 col-sm-3'>
			First name
		</div>
		<div class='col-12 col-sm-8 text-secondary font-weight-bold'>
			$firstName
		</div>
	</div>

	<div class='row mt-3'>
		<div class='col-12 col-sm-3'>
			Last name
		</div>
		<div class='col-12 col-sm-8 text-secondary font-weight-bold'>
			$lastName
		</div>
	</div>

	<div class='row mt-3'>
		<div class='col-12 col-sm-3'>
			Phone
		</div>
		<div class='col-12 col-sm-8 text-secondary font-weight-bold'>
			$phoneNumber
		</div>
	</div>

	<div class='row my-3'>
		<div class='col-12'>
			<a href='update-profile.php' class='btn btn-default'>Update</a>
			<a href='change-password.php' class='btn btn-default ml-2'>Change password</a>
			<a href='delete-account.php' class='btn btn-default ml-2'>Delete Account</a>
		</div>
	</div>
</div>

");

?>

<?php
include 'inc/footer.php';
?>
