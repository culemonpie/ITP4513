<?php
include 'inc/header.php';

/*
Page code: 8.1
Who can access: Tenant
Description: List of orders from one's consignment store
*/

tenant_only();

$qs = "select * from orders
inner join consignmentStore on orders.consignmentStoreID = consignmentstore.consignmentstoreID
where tenantID = '$_SESSION[tenantID]' order by orderID desc;";
$query = mysqli_query($conn, $qs) or die(mysqli_error($conn));

print_error_message($error_message);



?>

<div class="container">
	<div class="row">
		<div class="col-12 my-2">
			<h4 class="text-secondary">Report</h4>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-12 my-2">
			<span class="text-secondary font-weight-bold">Below is the list of orders from your consignment stores.</span>

			<table class="table mt-1">
				<tr>
					<th>Order #</th>
					<th>Date / Time</th>
					<th>Details</th>
				</tr>

				<?php

				if (mysqli_num_rows($query) > 0 ){
					while ($result = mysqli_fetch_assoc($query)){
						print("
						<tr>
						<td>$result[orderID]</td>
						<td>$result[orderDateTime]</td>
						<td><a href='view-report.php?orderID=$result[orderID]'>Details</a></td>
						</tr>
						");
					}
				} else {
					print("
					<tr>
					<td> Not found </td>
					</tr>
					");
				}

				?>
			</table>

		</div>
	</div>
</div>

<?php
include 'inc/footer.php';
?>
