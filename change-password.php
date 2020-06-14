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
			<h4 class="text-secondary">Change password</h4>
		</div>
	</div>
</div>


<form class="" action="" method="post">

	<div class="container">
		<div class="row">
			<div class="col-12">
				<a href="view-profile.php" class="btn btn-default">Return</a>
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-12 col-sm-3">
				Original password
			</div>
			<div class="col-12 col-sm-8 text-secondary font-weight-bold">
				<input type="password" class="form-control" name="original_password" value="">
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-12 col-sm-3">
				New password
			</div>
			<div class="col-12 col-sm-8 text-secondary font-weight-bold">
				<input type="password" class="form-control" name="new_password1" value="">
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-12 col-sm-3">
				Confirm password
			</div>
			<div class="col-12 col-sm-8 text-secondary font-weight-bold">
				<input type="password" class="form-control" name="new_password2" value="">
			</div>
		</div>

		<div class="row my-3">
			<input type="Submit" name="" value="Save" class="btn btn-default">
		</div>
	</div>


</form>
<?php
include 'inc/footer.php';
?>
