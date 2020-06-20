<?php
include 'inc/header.php';

/*
Page code: 6.2
Who can access: Customer
*/
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	/*
	1. Checks if the original password matches the record in the database.
	If so, proceed to condition 2.
	Otherwise, prompt user that the original password is wrong.

	2. Check if newPassword1== newPassword2.
	If so, update the password of the user.
	Otherwise, prompt user that the passwords do not match.
	*/

	extract($_POST);

	$originalPassword = $conn->real_escape_string($originalPassword);
	$newPassword1 = $conn->real_escape_string($newPassword1);
	$newPassword2 = $conn->real_escape_string($newPassword2);

	$qs = "SELECT * FROM CUSTOMER WHERE customerEmail = '$_SESSION[customerEmail]' and password = '$originalPassword'";
	$query = mysqli_query($conn, $qs) or die(mysqli_error($conn));

	if (mysqli_num_rows($query) == 1){
		if ($newPassword1==$newPassword2){
			$qs = "UPDATE CUSTOMER SET password = '$newPassword1' WHERE customerEmail = '$_SESSION[customerEmail]';";
			$error_message.=$qs."<br>";
			$query = mysqli_query($conn, $qs) or die(mysqli_error($conn));
			header("Location: view-profile.php");
			exit;
		} else {
			$error_message.="Inconsistent new passwords<br>";
		}
	} else {
		$error_message.="Incorrect Password<br>";
	}
}

print_error_message($error_message);

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
				<input type="password" class="form-control" name="originalPassword" value="">
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-12 col-sm-3">
				New password
			</div>
			<div class="col-12 col-sm-8 text-secondary font-weight-bold">
				<input type="password" class="form-control" name="newPassword1" value="">
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-12 col-sm-3">
				Confirm password
			</div>
			<div class="col-12 col-sm-8 text-secondary font-weight-bold">
				<input type="password" class="form-control" name="newPassword2" value="">
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
