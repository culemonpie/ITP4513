<?php
include 'inc/header.php';

/*
Page code: 3.6
Who can access: Customer
Description: Manage the list of orders a customer has placed.
*/

customer_only();

$qs = "select * from orders
inner join consignmentStore on orders.consignmentStoreID = consignmentStore.consignmentStoreID
inner join shop on orders.shopid = shop.shopid
where customerEmail = '$_SESSION[customerEmail]'";

$query = mysqli_query($conn, $qs) or die(mysqli_error($conn));
if (mysqli_num_rows($query) == 0){
	echo "Not found";
}

echo "
<div class='container'>
<div class='row'>
<div class='col-12 my-2'>
<h4 class='text-secondary'>Manage Orders</h4>
</div>
</div>
</div>

<div class='container'>


<div class='row'>
<div class='col-12 text-secondary font-weight-bold'>
You have ".mysqli_num_rows($query)." orders.
</div>
</div>

<div class='row mt-3'>
<table class='table table-hover table-nonfluid'>
<tr>
<th>#</th>
<th>Consignment Store</th>
<th>Shop</th>
<th>Price</th>
<th>Status</th>
<th>Details</th>
</tr>
";


while ($result = mysqli_fetch_assoc($query)){
	switch ($result["status"]){
		case 1:
		$status_text = "Delivery";
		$status_context = "muted";
		break;
		case 2:
		$status_text = "Awaiting pick up";
		$status_context = "warning";
		break;
		default:
		$status_text = "Completed";
		$status_context = "success";
		break;
	}
	print("
	<tr>
	<td>$result[orderID]</td>
	<td>$result[ConsignmentStoreName]</td>
	<td>$result[shopName]</td>
	<td>$result[totalPrice]</td>
	<td><span class='badge badge-$status_context'>$status_text</span></td>
	<td><a href='view-order.php?orderID=$result[orderID]'>Details</a></td>
	</tr>
	");
}

echo "
</table>
</div>

</div>
";
?>


<?php
include 'inc/footer.php';
?>
