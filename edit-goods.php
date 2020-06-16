<?php
include 'inc/header.php';
?>

<div class="container">
	<div class="row">
		<div class="col-12 my-2">
			<h4 class="text-secondary">Edit Goods - #1</h4>
		</div>
	</div>
</div>

<div class="container">


		<div class="row">
			<div class="col-12 text-secondary">
				<a href="view-goods.php" class="btn btn-default">Return</a>
			</div>
		</div>


	<form class="" action="" method="post">

		<div class="row mt-3">
			<div class="col-12 col-sm-3">
				Goods Name
			</div>

			<div class="col-12 col-sm-8 text-secondary font-weight-bold">
				<input type="text" name="name" value="">
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-12 col-sm-3">
				Quantity
			</div>

			<div class="col-12 col-sm-8 text-secondary font-weight-bold">
				<input type="number" name="quantity" min="1" value="1">
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-12 col-sm-3">
				Stock Price
			</div>

			<div class="col-12 col-sm-8 text-secondary font-weight-bold">
				<input type="number" name="unit_price" step="0.1" min="0">
			</div>
		</div>


		<div class="row mt-3">
			<div class="col-12 col-sm-3">
				Store
			</div>

			<div class="col-12 col-sm-8 text-secondary font-weight-bold">
				<select class="form-control" name="store">
					<option value="KF">Kwai Fong</option>
					<option value="TW">Tsuen Wan</option>
				</select>
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-12 col-sm-3">
			 Available
			</div>

			<div class="col-12 col-sm-8 text-secondary font-weight-bold">
				<input type="checkbox" class="form-check" name="status" value="">
			</div>
		</div>


		<div class="row">
			<div class="col-12 text-secondary">
				<input type="submit" class="btn btn-default">
			</div>
		</div>

	</form>
</div>


<?php
include 'inc/footer.php';
?>
