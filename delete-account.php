<?php
include 'inc/header.php';


/*
Page code: 6.2
Who can access: Customer
*/

customer_only();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$is_valid = true;
	extract($_POST);
	$customerEmail = $_SESSION[customerEmail];

	if(!isset($password) || $password==''){
		$is_valid = false;
		$error_message.="Password is missing<br>";
	}

	if($is_valid){
		$password = $conn->real_escape_string($password);
		$qs = "SELECT * FROM CUSTOMER WHERE customerEmail = '$customerEmail' and password = '$password'";
		$query = mysqli_query($conn, $qs);

		if (mysqli_error($conn)) {
			$error_message.=mysqli_error($conn);
		} else {
			if (mysqli_num_rows($query) == 1){
				//todo: Remove delete account
				header("Location: delete-account-success.php");
			} else {
				$error_message.="Incorrect password<br>";
			}

		}
	}
}

$qs = "SELECT * FROM CUSTOMER where customerEmail = '$_SESSION[customerEmail]'";
$query = mysqli_query($conn, $qs) or die(mysqli_error($conn));

$customer = mysqli_fetch_assoc($query);

extract($customer);

print_error_message($error_message);

?>

<div class='container'>
	<div class='row'>
		<div class='col-12 my-2'>
			<h4 class='text-secondary'>Delete Account - Joe Chan</h4>
		</div>
	</div>
</div>

<form class='' method='post'>
	<div class='container'>
		<div class='row'>
			<div class='col-12'>
				<div class='text-secondary font-weight-bold'>
					You are about to delete your account, along with all your order records and comments.<br>
					This action cannot be undone.<br>
					If you are sure about that, please enter your password to confirm.
				</div>
			</div>
		</div>
		<div class='row mt-3'>
			<div class='col-12 col-sm-3'>
				Password
			</div>
			<div class='col-12 col-sm-3'>
				<input type='password' class='form-control' name='password' value='' required>
			</div>
		</div>
		<div class='row mt-3'>
			<div class='col-12'>
				<input type='checkbox' name='confirm' required>
				I understand that this action cannot be undone.
			</div>
		</div>
		<div class='row my-3'>
			<div class='col-12'>
				<input type='submit' name='' value='Confirm' class='btn btn-default'>
				<a href='view-profile.php' class='btn btn-default ml-3'>On a second thought, I'd like to keep my account</a>
			</div>
		</div>
	</div>
</form>
<?php
include 'inc/footer.php';
?>
