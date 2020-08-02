<?php
include 'inc/header.php';


/*
Page code: 3.4
Who can access: Tenant
Description: View the content of a report
*/


/*
1. Order ID - ok
2. Order Date - ok
3. Customer ID - ok
4. Customer Name - ok
5. Shop address - ok
6. goods Number - ok
7. goods Name - ok
8. Quantity - ok
9. Order status - ok
10. Selling price of each goods - ok
11. TotalPrice -ok
*/

tenant_only();

$orderID = $conn->real_escape_string($_GET["orderID"]);

$qs = "
select * from orders
INNER JOIN ConsignmentStore on ConsignmentStore.consignmentstoreID = orders.consignmentstoreid
INNER JOIN customer on orders.customerEmail = customer.customerEmail
INNER JOIN shop on orders.shopID = shop.shopID
where orderID = '$orderID' and tenantID = '$_SESSION[tenantID]'
limit 1
";
$query = mysqli_query($conn, $qs) or die(mysqli_error($conn));

$result = mysqli_fetch_assoc($query);

if (mysqli_num_rows($query) > 0){

print("

<div class='container'>
	<div class='row'>
		<div class='col-12 my-2'>
			<h4 class='text-secondary'>View Report #$result[orderID]</h4>
		</div>
	</div>
</div>

<div class='container'>

	<div class='row'>
		<div class='col-12'>
			<a href='list-report.php' class='btn btn-default'>Return</a>
			<a href='delete-order.php?orderID=$result[orderID]' onclick='return confirm('Are you sure?')' class='btn btn-danger ml-1'>Delete</a>
		</div>
	</div>

	<div class='row mt-3'>
		<div class='col-12 col-sm-3'>
			Order ID
		</div>
		<div class='col-12 col-sm-9 text-secondary font-weight-bold'>
			$result[orderID]
		</div>
	</div>

	<div class='row mt-3'>
		<div class='col-12 col-sm-3'>
			Order Date
		</div>
		<div class='col-12 col-sm-9 text-secondary font-weight-bold'>
			$result[orderDateTime]
		</div>
	</div>

	<div class='row mt-3'>
		<div class='col-12 col-sm-3'>
			Customer ID
		</div>
		<div class='col-12 col-sm-9 text-secondary font-weight-bold'>
			$result[customerEmail]
		</div>
	</div>

	<div class='row mt-3'>
		<div class='col-12 col-sm-3'>
			Customer Name
		</div>
		<div class='col-12 col-sm-9 text-secondary font-weight-bold'>
			$result[firstName] $result[lastName]
		</div>
	</div>

	<div class='row mt-3'>
		<div class='col-12 col-sm-3'>
			Shop Name
		</div>
		<div class='col-12 col-sm-9 text-secondary font-weight-bold'>
						$result[shopName]
		</div>
	</div>

	<div class='row mt-3'>
		<div class='col-12 col-sm-3'>
			Shop Address
		</div>
		<div class='col-12 col-sm-9 text-secondary font-weight-bold'>
			$result[address]
		</div>
	</div>


	<div class='row mt-3'>
		<div class='col-12 col-sm-3'>
			Items
		</div>
		<div class='col-12 col-sm-9 text-secondary'>
			<table class='table table-sm'>
			<tr>
			<th>Name</th>
			<th>Selling Price</th>
			<th>Quantity</th>
			</tr>

");

// Display the items in the order as a table row
$qs = "
select * from orderitem
inner join goods on goods.goodsNumber = orderitem.goodsNumber
where orderID = $orderID
";
$query = mysqli_query($conn, $qs) or die(mysqli_error($conn));


while($orderItem = mysqli_fetch_assoc($query)){
	print("
	<tr>
	<td>$orderItem[goodsName]</td>
	<td>$orderItem[sellingPrice]</td>
	<td>$orderItem[quantity]</td>
	</tr>
	");
}


print("
			</table>
		</div>
	</div>

	<div class='row mt-3'>
		<div class='col-12 col-sm-3'>
			Status
		</div>
		<div class='col-12 col-sm-9 text-secondary font-weight-bold'>
			<span class='badge badge-success'>Completed</span>
		</div>
	</div>
	<div class='row mt-3'>
		<div class='col-12 col-sm-3'>
			Total Price
		</div>
		<div class='col-12 col-sm-9 text-secondary font-weight-bold'>
			$result[totalPrice]
		</div>
	</div>
</div>

");

} else {

		print("
		<div class='container'>
		<div class='row mt-2'>
		<div class='col-12'>
		<a href='list-goods.php' class='btn btn-default'>Return</a>
		</div>
		</div>
		</div>
		");

		include_once "inc/404-content.php";
}

?>

<?php
include 'inc/footer.php';
?>
