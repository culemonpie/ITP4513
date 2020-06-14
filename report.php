<?php
include 'inc/header.php';
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	/*
	1. Checks if the original password matches the record in the database.
	If so, proceed to condition 2.
	Otherwise, prompt user that the original password is wrong.

	2. Check if new_password1== new_password2.
	If so, update the password of the user.
	Otherwise, prompt user that the passwords do not match.
	*/

	extract($_POST);

	// echo $new_password1==$new_password2;

}
?>

<div class="container">
	<div class="row">
		<div class="col-12 my-2">
			<h4 class="text-secondary">Report</h4>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-12 my-2">
			<span class="text-secondary font-weight-bold">120kg</span>
		</div>
	</div>
</div>

<?php
include 'inc/footer.php';
?>
