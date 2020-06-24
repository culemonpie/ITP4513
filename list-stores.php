<?php
include 'inc/header.php';

/*
Page code: 4.1
Who can access: Tenant
Description: The page where user lands after login.
*/

customer_only();

$qs = "select count(*), consignmentstore.consignmentStoreID from consignmentstore
inner join goods on consignmentstore.consignmentStoreID = goods.consignmentStoreID
group by consignmentstoreID";
$query = mysqli_query($conn, $qs) or die(mysqli_error($conn));


?>

<div class="container">
	<div class="row">
		<div class="col-12 my-2">
			<h4 class="text-secondary">Browse Stores</h4>
		</div>
	</div>
</div>

<div class="container">


	<div class="row">
		<div class="col-12 text-secondary">
			Stores with at least one available goods will be shown here.
		</div>
	</div>

	<div class="row mt-3">
		<table class="table table-hover">
			<tr>
				<th>Store</th>
				<th>Number of Available Goods</th>
				<th></th>
			</tr>

			<tr>
				<td>Marcus' ConsignmentStore</td>
				<td>3</td>
				<td> <a href="view-store.php">Details</a></td>
			</tr>

			<tr>
				<td>Apple Store</td>
				<td>10</td>
				<td> <a href="view-store.php">Details</a></td>
			</tr>

		</table>
	</div>

</div>


<?php
include 'inc/footer.php';
?>
