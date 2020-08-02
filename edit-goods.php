<?php
include 'inc/header.php';


/*
Page code: 6.2
Who can access: Tenant
Description: Edit the name, quantity stock price and status for a goods.
*/

tenant_only();

$goodsNumber = $conn->real_escape_string($_GET['goodsNumber']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$is_valid = true;

	// 	name - X;m
	// quantity - 50
	// unit_price - 80.0
	// store - 1

	if(!isset($_POST['name']) || $_POST['name']==''){
		$error_message.="Name is missing<br>";
		$is_valid = false;
	}

	if(!isset($_POST['quantity']) || $_POST['quantity']==''){

		$error_message.="Quantity is missing<br>";
		$is_valid = false;
	}

	if(!isset($_POST['unit_price']) || $_POST['unit_price']==''){

		$error_message.="Unit Price is missing<br>";
		$is_valid = false;
	}

	if(!isset($_POST['storeID']) || $_POST['storeID']==''){

		$error_message.="Name is missing<br>";
		$is_valid = false;
	}


	$status = 0;
	if(isset($_POST['status']) && $_POST['status'] == "on"){
		$status = 1;
	}


	if ($is_valid){
		$goodsName = $conn->real_escape_string($_POST["name"]);
		$remainingStock = $conn->real_escape_string($_POST["quantity"]);
		$stockPrice = $conn->real_escape_string($_POST["unit_price"]);
		$consignmentStoreID = $conn->real_escape_string($_POST["storeID"]);
		$qs = "update goods set
		goodsName = '$goodsName',
		remainingStock = '$remainingStock',
		stockPrice = '$stockPrice',
		consignmentStoreID = '$consignmentStoreID',
		status = '$status'
		where goodsNumber = $goodsNumber";
		echo "$qs";
		$query = mysqli_query($conn, $qs) or die(mysqli_error($conn));
		Header("Location: view-goods.php?goodsNumber=$_GET[goodsNumber]");
	}
}

$sql = "
SELECT goods.*, ConsignmentStoreName, tenantID FROM Goods
INNER JOIN consignmentStore on goods.consignmentstoreID = consignmentStore.consignmentStoreID WHERE goodsNumber = '$goodsNumber' and tenantID = '$_SESSION[tenantID]';
";

$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));


print_error_message($error_message);

if (mysqli_num_rows($query) > 0){
	$goods = mysqli_fetch_assoc($query);

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
	<select class='form-control' name='storeID'>");


	$qs = "select * from consignmentStore where tenantID = '$_SESSION[tenantID]'";
	$query = mysqli_query($conn, $qs) or die(mysqli_error($conn));
	while ($result = mysqli_fetch_assoc($query)){
		print("
		<option value='$result[consignmentStoreID]'>$result[ConsignmentStoreName]</option>
		");
	}


	$availability = $goods["status"]== 1 ? "checked" : "";
	printf("
	</select>
	</div>
	</div>

	<div class='row mt-3'>
	<div class='col-12 col-sm-3'>
	Available
	</div>

	<div class='col-12 col-sm-8 text-secondary font-weight-bold'>
	<input type='checkbox' class='form-check' name='status' $availability>
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
} else {
	// Not found

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
