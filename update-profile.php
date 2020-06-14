<?php
include 'inc/header.php';
?>

<div class="container">
	<div class="row">
		<div class="col-12 my-2">
			<h4 class="text-secondary">Change password</h4>
		</div>
	</div>
</div>


<form class="" action="view-profile.php" method="post">

	<div class="container">
		<div class="row">
			<div class="col-12">
				<a href="view-profile.php" class="btn btn-default">Return</a>
			</div>
		</div>


		<div class="row mt-3">
			<div class="col-12 col-sm-3">
				Email
			</div>
			<div class="col-12 col-sm-8 text-secondary font-weight-bold">
				<!-- This cannot be changed -->
				joe@example.com
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-12 col-sm-3">
				First name
			</div>
			<div class="col-12 col-sm-8 text-secondary font-weight-bold">
				<input type="text" class="form-control" name="" value="">
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-12 col-sm-3">
				Last name
			</div>
			<div class="col-12 col-sm-8 text-secondary font-weight-bold">
				<input type="text" class="form-control" name="" value="">
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-12 col-sm-3">
				Phone
			</div>
			<div class="col-12 col-sm-8 text-secondary font-weight-bold">
				<input type="text" class="form-control" name="" value="">
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
