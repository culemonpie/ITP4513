<?php
include 'inc/header.php';

/*
Page code: 4.6
Who can access: Customer
Description: A customer can view their own order.
*/

customer_only();

$orderID = $conn->real_escape_string($_GET["orderID"]);
$customerEmail = $conn->real_escape_string($_SESSION["customerEmail"]);

/*
Two queries will be made. First, obtain the Order ID and join the corresponding Shop. Second, Get all the items related to the order. A customer is only able to view their own orders.
*/

$qs = "
select * from orders
inner join shop on orders.ShopID = Shop.ShopID
where orderID = '$orderID' and customerEmail = '$customerEmail'
limit 1
";
$query = mysqli_query($conn, $qs) or die(mysqli_error($conn));
if (mysqli_num_rows($query) > 0){
	$result = mysqli_fetch_assoc($query);
} else {
	echo "Not found";
}


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

<div class='container'>
<div class='row'>
<div class='col-12 my-2'>
<h4 class='text-secondary'>View Order #$result[orderID]</h4>
</div>
</div>
</div>

<div class='container'>

<div class='row'>
<div class='col-12'>
<a href='manage-orders.php' class='btn btn-default'>Return</a>
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
Order date & time
</div>
<div class='col-12 col-sm-9 text-secondary font-weight-bold'>
$result[orderDateTime]
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

print ("
</table>
</div>
</div>
<div class='row mt-3'>
<div class='col-12 col-sm-3'>
Status
</div>
<div class='col-12 col-sm-9 text-secondary font-weight-bold'>
<span class='badge badge-$status_context'>$status_text</span>
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

?>

<?php
include 'inc/footer.php';
?>
