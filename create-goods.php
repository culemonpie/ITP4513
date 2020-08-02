<?php
include 'inc/header.php';

/*
Page code: 6.2
Who can access: Tenant
*/

tenant_only();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$is_valid = true;
	extract($_POST);
	$error_message = "";


	if(!isset($goodsName) || !$goodsName){
		$is_valid = false;
		$error_message .= "Name missing<br>";
	}

	if(!isset($remainingStock) || !$remainingStock){
		$is_valid = false;
		$error_message .= "Quantity missing<br>";
	}

	if(!isset($stockPrice) || !$stockPrice){
		$is_valid = false;
		$error_message .= "Price missing<br>";
	}

	if(!isset($consignmentStoreID) || !$consignmentStoreID){
		$is_valid = false;
		$error_message .= "Consignment Store missing<br>";
	}

	if(!isset($_SESSION["tenantID"]) || !$_SESSION["tenantID"]){
		//User ID is missing
		$is_valid = false;
		$error_message .= "Server error. Please report to administrator.<br>";
	}

	if($is_valid){
		$tenantID = $_SESSION["tenantID"];
		//insert into database
		$error_message .= "Valid<br> $tenantID<br>";
		$consignmentStoreID = $conn->real_escape_string($consignmentStoreID);
		$goodsName = $conn->real_escape_string($goodsName);
		$remainingStock = $conn->real_escape_string($remainingStock);
		$status = 1;
		// goods number is the auto key
		$qs = "INSERT INTO GOODS(consignmentStoreID, goodsName, stockPrice, remainingStock, status) VALUES('$consignmentStoreID', '$goodsName', '$stockPrice','$remainingStock', '$status')";
		$query = mysqli_query($conn, $qs) or die(mysqli_error($conn));
		echo "1";
		header("Location: view-goods.php?goodsNumber=".mysqli_insert_id($conn) );
		echo ("success");
	}

}

print_error_message($error_message);

?>

<div class="container">
	<div class="row">
		<div class="col-12 my-2">
			<h4 class="text-secondary">Create Goods</h4>
		</div>
	</div>
</div>

<div class="container">


	<div class="row">
		<div class="col-12 text-secondary">
			<a href="list-goods.php" class="btn btn-default">Return</a>
		</div>
	</div>


	<form class="" action="" method="post">

		<div class="row mt-3">
			<div class="col-12 col-sm-3">
				Goods Name
			</div>

			<div class="col-12 col-sm-8 text-secondary font-weight-bold">
				<input type="text" name="goodsName" value="" required>
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-12 col-sm-3">
				Quantity
			</div>

			<div class="col-12 col-sm-8 text-secondary font-weight-bold">
				<input type="number" name="remainingStock" min="1" value="1" required>
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-12 col-sm-3">
				Stock Price
			</div>

			<div class="col-12 col-sm-8 text-secondary font-weight-bold">
				<input type="number" name="stockPrice" step="0.1" min="0" required>
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-12 col-sm-3">
				Store
			</div>

			<div class='col-12 col-sm-8 text-secondary font-weight-bold'>
				<select class='form-control' name='consignmentStoreID' required>
					<?php

					$qs = "select * from consignmentStore where tenantID = '$_SESSION[tenantID]'";
					$query = mysqli_query($conn, $qs) or die(mysqli_error($conn));
					while ($result = mysqli_fetch_assoc($query)){
						print("
						<option value='$result[consignmentStoreID]'>$result[ConsignmentStoreName]</option>
						");
					}
					?>
				</select>
			</div>
		</div>


		<div class="row">
			<div class="col-12 text-secondary">
				<input type="submit" class="btn btn-default">
			</div>
		</div>

	</form>
</div>


<?php
include 'inc/footer.php';
?>
