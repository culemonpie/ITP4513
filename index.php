<?php
include 'inc/header.php';

/*
Page code:
Who can access: Anonymous users
Description: Homepage of the website. If a user visits a page without permission, they will be redirected to this page.
*/

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
<div class="py-5">
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
						<form method="POST" action="dashboard.php">
							<div class="form-group row"> <label for="inputmailh" class="col-2 col-form-label">Email</label>
								<div class="col-8">
									<!-- This will be changed to type email -->
									<input type="text" class="form-control" name="customer_email" placeholder="">
								</div>
							</div>
							<div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label">Password</label>
								<div class="col-8">
									<input type="password" class="form-control" name="customer_password">
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
						<form method="POST" action="dashboard.php">
							<div class="form-group row"> <label for="inputmailh" class="col-2 col-form-label">Username</label>
								<div class="col-8">

									<input type="" name="tenant_username" class="form-control" id="inputmailh">
								</div>
							</div>
							<div class="form-group row"> <label for="" class="col-2 col-form-label">Password</label>
								<div class="col-8">
									<input type="password" name="tenant_password" class="form-control" id="inputpasswordh">
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
