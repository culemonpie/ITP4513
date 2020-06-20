<?php
include 'inc/header.php';

/*
Page code:
Who can access: Logged in users
Description: The page where user lands after login.
*/
?>

<div class="container">
	<div class="row">
		<div class="col-12 my-2">
			<h4 class="text-secondary">View Store - Marcus' ConsignmentStore	</h4>
		</div>
	</div>
</div>

<div class="container">


	<div class="row">
		<div class="col-12 text-secondary">
			<a href="list-stores.php" class="btn btn-default">Return</a>
		</div>
	</div>

	<form class="" action="order-submitted.php" method="post">

		<div class="row mt-3">
			<table class="table table-hover table-nonfluid">
				<tr>
					<th>Goods</th>
					<th>Quantity in stock</th>
					<th>Unit Price</th>
					<th>Quantity you would like to order</th>
					<th></th>
				</tr>

				<!-- Use for loop to iterate through goods table with the corresponding consignmentStoreID -->
				<!-- min value: 0, max value: number of stock -->
				<tr>
					<td>Bracelet</td>
					<td>2</td>
					<td>99</td>
					<td><input type="number" name="" min="0" value=""> </td>
				</tr>

				<tr>
					<td>Fuji Apple</td>
					<td>8</td>
					<td>10</td>
					<td><input type="number" name="" min="0" value=""> </td>
				</tr>

			</table>
		</div>

		<div class="">
			<div class="text-secondary font-weight-bold">
				Please choose your pick up location
			</div>
			<select class="form-control col-md-4 col-sm-6" name="">
				<option value="">Kwai Fong</option>
				<option value="">Sha Tin</option>
			</select>
		</div>

		<div class="mt-1" id="total_price_holder" style="font-size:20px">
			Total - HKD
			<span id="total_price_text" class="text-secondary font-weight-bold">200</span>
		</div>

		<div class="mt-2">
			<button type="submit" name="" class="btn btn-default">
				<i class="fa fa-shopping-cart" aria-hidden="true"></i> Purchase
			</button>
		</div>
	</div>
</form>


<?php
include 'inc/footer.php';
?>
