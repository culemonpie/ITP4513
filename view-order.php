<?php
include 'inc/header.php';

customer_only();

$consignmentStoreID = 1; //debug

$qs = "select * from goods where consignmentStoreID = $consignmentStoreID";


?>

<div class="container">
	<div class="row">
		<div class="col-12 my-2">
			<h4 class="text-secondary">View Order #1</h4>
		</div>
	</div>
</div>

<div class="container">

	<div class="row">
		<div class="col-12">
			<a href="manage-orders.php" class="btn btn-default">Return</a>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-12 col-sm-3">
			Order ID
		</div>
		<div class="col-12 col-sm-9 text-secondary font-weight-bold">
			1
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-12 col-sm-3">
			Shop Name
		</div>
		<div class="col-12 col-sm-9 text-secondary font-weight-bold">
			Kwai Fong
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-12 col-sm-3">
			Shop Address
		</div>
		<div class="col-12 col-sm-9 text-secondary font-weight-bold">
			No. 18, 1 / F, Trendy Zone, 580A Nathan Road, Mong Kok
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-12 col-sm-3">
			Order date
		</div>
		<div class="col-12 col-sm-9 text-secondary font-weight-bold">
			2020-05-14
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-12 col-sm-3">
			Items
		</div>
		<div class="col-12 col-sm-9 text-secondary">
			<table class="table table-sm">
				<tr>
					<th>Name</th>
					<th>Selling Price</th>
					<th>Quantity</th>
				</tr>
				<tr>
					<td>Bracelet</td>
					<td>99.5</td>
					<td>3</td>
				</tr>
				<tr>
					<td>Anklet</td>
					<td>200</td>
					<td>1</td>
				</tr>
			</table>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-12 col-sm-3">
			Status
		</div>
		<div class="col-12 col-sm-9 text-secondary font-weight-bold">
			<span class="badge badge-success">Completed</span>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-12 col-sm-3">
			Total Price
		</div>
		<div class="col-12 col-sm-9 text-secondary font-weight-bold">
			499.5
		</div>
	</div>
</div>


<?php
include 'inc/footer.php';
?>
