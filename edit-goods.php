<?php
include 'inc/header.php';


/*
Page code: 6.2
Who can access: Tenant
Description: Edit the name, quantity stock price and status for a goods.
*/

tenant_only();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$is_valid = true;

	if ($is_valid){
		Header("Location: view-goods.php?goodsNumber=$_GET[goodsNumber]");
	}
}
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


print("

<div class='container'>
	<div class='row'>
		<div class='col-12 my-2'>
			<h4 class='text-secondary'>Edit Goods - $goods[goodsName]</h4>
		</div>
	</div>
</div>

<div class='container'>


		<div class='row'>
			<div class='col-12 text-secondary'>
				<a href='view-goods.php?goodsNumber=$_GET[goodsNumber]' class='btn btn-default'>Return</a>
			</div>
		</div>


	<form class='' action='' method='post'>

		<div class='row mt-3'>
			<div class='col-12 col-sm-3'>
				Goods Name
			</div>

			<div class='col-12 col-sm-8 text-secondary font-weight-bold'>
				<input type='text' name='name' value='$goods[goodsName]'>
			</div>
		</div>

		<div class='row mt-3'>
			<div class='col-12 col-sm-3'>
				Quantity
			</div>

			<div class='col-12 col-sm-8 text-secondary font-weight-bold'>
				<input type='number' name='quantity' min='1' value='$goods[remainingStock]'>
			</div>
		</div>

		<div class='row mt-3'>
			<div class='col-12 col-sm-3'>
				Stock Price
			</div>

			<div class='col-12 col-sm-8 text-secondary font-weight-bold'>
				<input type='number' name='unit_price' step='0.1' min='0' value='$goods[stockPrice]'>
			</div>
		</div>


		<div class='row mt-3'>
			<div class='col-12 col-sm-3'>
				Store
			</div>

			<div class='col-12 col-sm-8 text-secondary font-weight-bold'>
				<select class='form-control' name='store'>
					<option value='1'>Marcus Consignment Store</option>
				</select>
			</div>
		</div>

		<div class='row mt-3'>
			<div class='col-12 col-sm-3'>
			 Available
			</div>

			<div class='col-12 col-sm-8 text-secondary font-weight-bold'>
				<input type='checkbox' class='form-check' name='status'>
			</div>
		</div>


		<div class='row'>
			<div class='col-12 text-secondary'>
				<input type='submit' class='btn btn-default'>
			</div>
		</div>

	</form>
</div>

");
?>

<?php
include 'inc/footer.php';
?>
