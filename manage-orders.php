<?php
include 'inc/header.php';

/*
Page code:
Who can access: Customer
Description: The page where user lands after login.
*/
?>

<div class="container">
	<div class="row">
		<div class="col-12 my-2">
			<h4 class="text-secondary">Manage Orders	</h4>
		</div>
	</div>
</div>

<div class="container">


	<div class="row">
		<div class="col-12 text-secondary font-weight-bold">
			You have 2 orders.
		</div>
	</div>

	<div class="row mt-3">
			<table class="table table-hover table-nonfluid">
				<tr>
					<th>#</th>
					<th>Consignment Store</th>
					<th>Shop</th>
					<th>Price</th>
					<th>Status</th>
					<th>Details</th>
				</tr>

				<tr>
					<td>1</td>
					<td>Marcus' Consignment Store</td>
					<td>Mong Kok</td>
					<td>498.5</td>
					<td><span class="badge badge-success">Completed</span></td>
					<td><a href="view-order.php">Details</a></td>
				</tr>

				<tr>
					<td>2</td>
					<td>Marcus' Consignment Store</td>
					<td>Tsuen Wan</td>
					<td>99.5</td>
					<td><span class="badge badge-warning">Awaiting pickup</span></td>
					<td><a href="#">Details</a></td>
				</tr>

			</table>
		</div>


	</div>


<?php
include 'inc/footer.php';
?>
