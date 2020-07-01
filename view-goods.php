<?php
include 'inc/header.php';

/*
Page code: 4.6
Who can access: Tenant
Description: A tenant can view their own goods. If the goods does not exist, a 404 error will be raised.
*/

tenant_only();

$goodsNumber = $_GET['goodsNumber'];
$goodsNumber = $conn->real_escape_string($goodsNumber);

$sql = "
SELECT goods.*, ConsignmentStoreName, tenantID FROM Goods
INNER JOIN consignmentStore on goods.consignmentstoreID = consignmentStore.consignmentStoreID WHERE goodsNumber = '$goodsNumber' and tenantID = '$_SESSION[tenantID]';
";

$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if (mysqli_num_rows($query) > 0){
	$goods = mysqli_fetch_assoc($query);
} else {
	//todo
	echo "Not found";
}

$availability = ($goods["status"] == 1) ? "Yes": "No";
print("
<div class='container'>
	<div class='row'>
		<div class='col-12 mt-2'>
			<h4 class='text-secondary'>View Goods - $goods[goodsName]</h4>
		</div>
	</div>
</div>

<div class='container'>

	<div class='row mt-2'>
		<div class='col-12'>
			<a href='list-goods.php' class='btn btn-default'>Return</a>
			<a href='edit-goods.php?goodsNumber=$goods[goodsNumber]' class='btn btn-secondary'>Edit</a>
		</div>
	</div>

	<div class='row mt-2'>
		<div class='col-12 col-sm-3'>
			ID
		</div>

		<div class='col-12 col-sm-8 text-secondary font-weight-bold'>
			$goods[goodsNumber]
		</div>
	</div>

	<div class='row mt-3'>
		<div class='col-12 col-sm-3'>
			Goods name
		</div>
		<div class='col-12 col-sm-8 text-secondary font-weight-bold'>
			$goods[goodsName]
		</div>
	</div>

	<div class='row mt-3'>
		<div class='col-12 col-sm-3'>
			Quantity
		</div>
		<div class='col-12 col-sm-8 text-secondary font-weight-bold'>
			$goods[remainingStock]
		</div>
	</div>

	<div class='row mt-3'>
		<div class='col-12 col-sm-3'>
			Stock Price
		</div>
		<div class='col-12 col-sm-8 text-secondary font-weight-bold'>
			$goods[stockPrice]
		</div>
	</div>

	<div class='row mt-3'>
		<div class='col-12 col-sm-3'>
			Store
		</div>
		<div class='col-12 col-sm-8 text-secondary font-weight-bold'>
			$goods[ConsignmentStoreName]
		</div>
	</div>

	<div class='row mt-3'>
		<div class='col-12 col-sm-3'>
			Available
		</div>
		<div class='col-12 col-sm-8 text-secondary font-weight-bold'>
			$availability
		</div>
	</div>

</div>
");

?>

<?php
include 'inc/footer.php';
?>
