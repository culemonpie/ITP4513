<?php
include 'inc/header.php';

/*
Page code:
Who can access: Anonymous users
*/
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	/*
	Register as a customer. The user should enter the below 5 fields:
	Email, first name, last name, phone and password.
	If all the data is valid, create a customer user with the entered information.
	Otherwise, propmt user to enter again.
	*/

	$is_valid = true;

	extract($_POST);

	$error_message = "";


	if(!isset($customerEmail) || !$customerEmail){
		$is_valid = false;
		$error_message .= "Email missing<br>";
	}

	if(!isset($firstName) || !$firstName){
		$is_valid = false;
		$error_message .= "First name missing<br>";
	}

	if(!isset($lastName) || !$lastName){
		$is_valid = false;
		$error_message .= "Last name missing<br>";
	}

	if(!isset($phoneNumber) || !$phoneNumber){
		$is_valid = false;
		$error_message .= "Phone number missing<br>";
	}

	if(!isset($password) || !$password){
		$is_valid = false;
		$error_message .= "Password missing<br>";
	}

	if ($is_valid){
		//Redirect to another page
		//'CustomerEmail', 'FirstName', 'LastName', 'password', 'phoneNumber'
		$query = $conn->prepare("INSERT INTO CUSTOMER VALUES(?,?,?,?,?)");
		$query->bind_param('sssss', $customerEmail, $firstName, $lastName, $password, $phoneNumber);

		if(!$query->execute()){
			$error_message = $query->error;
		} else {
			header("Location: registration-success.php");
		}

		$result = $query->get_result();

	}

	if ($error_message != ""){
		// Something went wrong
		print_error_message($error_message);
	}
}
?>

<div class="container">
	<div class="row">
		<div class="col-12 my-2">
			<h4 class="text-secondary">Register as a customer</h4>
		</div>
	</div>
</div>

<div class="container">

	<?php //action="registration-success.php" ?>

	<form class="" method="post">

		<div class="form-group">
			<div class="row">
				<div class="col-12 col-sm-3">
					Email
				</div>
				<div class="col-12 col-sm-6">
					<input type="email" class="form-control" name="customerEmail" value="" required>
				</div>
			</div>
		</div>


		<div class="form-group">
			<div class="row">
				<div class="col-12 col-sm-3">
					First name
				</div>
				<div class="col-12 col-sm-6">
					<input type="text" class="form-control" name="firstName" value="" required>
				</div>
			</div>
		</div>


		<div class="form-group">
			<div class="row">
				<div class="col-12 col-sm-3">
					Last name
				</div>
				<div class="col-12 col-sm-6">
					<input type="text" class="form-control" name="lastName" value="" required>
				</div>
			</div>
		</div>


		<div class="form-group">
			<div class="row">
				<div class="col-12 col-sm-3">
					Phone
				</div>
				<div class="col-12 col-sm-6">
					<input type="text" class="form-control" name="phoneNumber" value="" required>
				</div>
			</div>
		</div>


		<div class="form-group">
			<div class="row">
				<div class="col-12 col-sm-3">
					Password
				</div>
				<div class="col-12 col-sm-6">
					<input type="password" class="form-control" name="password" value="" required>
				</div>
			</div>
		</div>

		<div class="row mb-3">
			<input class="btn btn-default" type="submit" name="" value="Register">
		</div>

	</div>

</form>

<?php
include 'inc/footer.php';
?>
