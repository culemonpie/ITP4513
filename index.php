<?php
include 'inc/header.php';

/*
Page code: 0.1
Who can access: Anonymous users
Description: Homepage of the website. If a user visits a page without permission, they will be redirected to this page.

User credentials will be validated in POST request of this page.
This includes:
tenant_username -> tenantID
tenant_password -> password
tenant_login

OR

customerEmail -> customerEmail
customer_password -> password
customer_login
*/


//Check if user has logged in. If so, redirect to dashboard.
if (isset($_SESSION["type"])){
	header("Location: dashboard.php");
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$is_valid = true;
	extract($_POST);
	if(isset($tenant_login)){
		//Validation when user is a tenant
		if(!isset($tenantID) || !$tenantID){
			$is_valid = false;
			$error_message .= "Username missing<br>";
		}

		if(!isset($password) || !$password){
			$is_valid = false;
			$error_message .= "Password missing<br>";
		}

		if ($is_valid){
			/*
			Check in the database to see if there's a tenant with the corresponding tenantID and password.
			If so, log the tenant in.
			Otherwise, prompt tenant to enter password again.
			*/
			$tenantID = $conn->real_escape_string($tenantID);
			$password = $conn->real_escape_string($password);
			$qs = "SELECT * FROM TENANT WHERE tenantID = '$tenantID' and password = '$password'";
			$query = mysqli_query($conn, $qs) or die(mysqli_error($conn));

			if (mysqli_num_rows($query) == 1){
				$tenant = mysqli_fetch_assoc($query);
				$_SESSION["type"] = "tenant";
				$_SESSION["tenantID"] = $tenant["tenantID"];
				header("Location: dashboard.php");
			} else {
				$error_message = "Tenant ID / password incorrect<br>";
			}

		} else {
			//echo "Failed"; // invalid
		}

	} else if (isset($customer_login)){
		//Validation when user is a customer
		if(!isset($customerEmail) || !$customerEmail){
			$is_valid = false;
			$error_message .= "Email missing<br>";
		}

		if(!isset($password) || !$password){
			$is_valid = false;
			$error_message .= "Password missing<br>";
		}
		if ($is_valid){
			/*
			Check in the database to see if there's a tenant with the corresponding tenantID and password.
			If so, log the tenant in.
			Otherwise, prompt tenant to enter password again.
			*/

			$customerEmail = $conn->real_escape_string($customerEmail);
			$password = $conn->real_escape_string($password);
			$qs = "SELECT * FROM CUSTOMER WHERE customerEmail = '$customerEmail' and password = '$password'";
			$query = mysqli_query($conn, $qs) or die(mysqli_error($conn));

			if (mysqli_num_rows($query) == 1){
				$tenant = mysqli_fetch_assoc($query);
				$_SESSION["type"] = "customer";
				$_SESSION["customerEmail"] = $tenant["customerEmail"];
				header("Location: dashboard.php");
			} else {
				$error_message = "Customer Email / password incorrect<br>";
			};
		}
	} else {
		print ("Error");
	};
}

?>

<div class="py-2 bg-primary">
	<div class="container">
		<div class="row">
			<div class="px-3 col-md-8 text-center mx-auto">
				<div class="text-secondary" style="font-size:60px; font-weight: bold;"> <b>HKCubeShop</b></div>
				<div class="my-1 text-white" style="font-size:30px; font-weight: bold;">A leading company in showcase management since 2007</div>
			</div>
		</div>
	</div>
</div>
<div class="py-2">

	<?php print_error_message($error_message); ?>

	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-tabs">
					<li class="nav-item"> <a href="" class="active nav-link" data-toggle="tab" data-target="#tabtwo">Customer</a> </li>
					<li class="nav-item"> <a class="nav-link" href="" data-toggle="tab" data-target="#tabone">Tenant</a> </li>
				</ul>
				<div class="tab-content mt-2">


					<?php
					//Form for Customer
					?>

					<div class="tab-pane fade show active" id="tabtwo" role="tabpanel">
						<form method="POST" action="">
							<div class="form-group row"> <label for="inputmailh" class="col-2 col-form-label">Email</label>
								<div class="col-8">
									<!-- This will be changed to type email -->
									<input type="text" class="form-control" name="customerEmail" placeholder="">
								</div>
							</div>
							<div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label">Password</label>
								<div class="col-8">
									<input type="password" class="form-control" name="password">
								</div>
							</div>
							<button type="submit" name="customer_login" class="btn btn-default">Login as customer</button>
							<a href="register.php" class="btn btn-default">Register</a>
						</form>
					</div>

					<?php
					//Form for Tenant
					?>

					<div class="tab-pane fade" id="tabone" role="tabpanel">
						<form method="POST" action="">
							<div class="form-group row"> <label for="inputmailh" class="col-2 col-form-label">Username</label>
								<div class="col-8">

									<input type="" name="tenantID" class="form-control" id="inputmailh">
								</div>
							</div>
							<div class="form-group row"> <label for="" class="col-2 col-form-label">Password</label>
								<div class="col-8">
									<input type="password" name="password" class="form-control" id="inputpasswordh">
								</div>
							</div>
							<button type="submit" name="tenant_login" class="btn btn-default">Login as tenant</button>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<?php
include 'inc/footer.php';
?>
