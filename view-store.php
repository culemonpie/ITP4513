<?php
include 'inc/header.php';

/*
Page code:
Who can access: Customers
Description: Customer can view a store and select its items.
*/

customer_only();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$is_valid = true;

 // Check the user input.
	// Check if the values are between 1 and stock number (0 or empty value will be omitted) within the database.


	$goodsNumbers = array();
	foreach ($_POST as $key=>$quantity){
		if ($quantity > 0){
			if (substr( $key, 0, 12 ) === "goodsNumber_"){
				$goodsNumber = substr($key, 12);
				array_push($goodsNumbers, $goodsNumber);
				$quantity = $conn->real_escape_string($quantity);

				// Check if there's enough stock
				$qs = "select remainingStock >= $quantity as enough_stock, goodsName from goods where goodsNumber = $goodsNumber limit 1";
				$query = mysqli_query($conn, $qs) or die(mysqli_error($conn));
				$result = mysqli_fetch_assoc($query);
				if ($result["enough_stock"] == 0){
					$is_valid = false;
					$error_message .=  "Not enough stock for $result[goodsName] ($quantity pieces). Please enter again<br>";
				}
			}
		}
	}

	$is_valid = false;
	if ($is_valid){
		header("location: order-submitted.php");
	}
}

$consignmentStoreID = $conn->real_escape_string($_GET["consignmentStoreID"]);

$qs = "select ConsignmentStoreName from consignmentStore where consignmentStoreID = '$consignmentStoreID' limit 1";
$query = mysqli_query($conn, $qs) or die(mysqli_error($conn));

if (mysqli_num_rows($query) >= 0){
	$result = mysqli_fetch_assoc($query);
	$consignmentStoreName = $result["ConsignmentStoreName"];
} else {
	echo "Not found";
	die();
}

$qs = "select  * from consignmentStore
inner join goods on consignmentStore.consignmentStoreID = goods.consignmentStoreID
where consignmentStore.consignmentStoreID = '$consignmentStoreID' and status = 1";
$query = mysqli_query($conn, $qs) or die(mysqli_error($conn));


print_error_message($error_message);

print ("
<div class='container'>
<div class='row'>
<div class='col-12 my-2'>
<h4 class='text-secondary'>View Store - $consignmentStoreName	</h4>
</div>
</div>
</div>

<div class='container'>


<div class='row'>
<div class='col-12 text-secondary'>
<a href='list-stores.php' class='btn btn-default'>Return</a> <br>
Below is the list of available goods from <strong>$consignmentStoreName</strong>.
</div>
</div>



<form method='post'>

<div class='row mt-3'>
<table class='table table-hover table-nonfluid'>
<tr>
<th>Product #</th>
<th>Name</th>
<th>Quantity in stock</th>
<th>Unit Price</th>
<th>Quantity you would like to order</th>
<th></th>
</tr>
");


// <!-- Use for loop to iterate through goods table with the corresponding consignmentStoreID -->
// <!-- min value: 0, max value: number of stock -->

while($result = mysqli_fetch_assoc($query)){
	print("
	<tr>
	<td>$result[goodsNumber]</td>
	<td>$result[goodsName]</td>
	<td>$result[remainingStock]</td>
	<td>$result[stockPrice]</td>
	<td><input type='number' id='id_goodsNumber_$result[goodsNumber]' name='goodsNumber_$result[goodsNumber]' min='0' max='$result[remainingStock]' > </td>
	</tr>
	");
}

print("
</table>
</div>

<div class=''>
<div class='text-secondary font-weight-bold'>
Please choose your pick up location
</div>
<select class='form-control col-md-4 col-sm-6' name=''>
<option value=''>Kwai Fong</option>
<option value=''>Sha Tin</option>
</select>
</div>

<!--
<div class='mt-1' id='total_price_holder' style='font-size:20px'>
Total - HKD
<span id='total_price_text' class='text-secondary font-weight-bold'>200</span>
</div>
-->

<div class='mt-2'>
<button type='submit' name='' class='btn btn-default'>
<i class='fa fa-shopping-cart' aria-hidden='true'></i> Purchase
</button>
</div>
</div>
</form>
");

?>

<?php
include 'inc/footer.php';
?>
