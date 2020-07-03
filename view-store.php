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
	$sum = 0;
	foreach ($_POST as $key=>$quantity){
		if ($quantity > 0){
			if (substr( $key, 0, 12 ) === "goodsNumber_"){
				// not checked: Foreign Key Constraint -- expected to fail if data is altered
				$goodsNumber = substr($key, 12);
				array_push($goodsNumbers, $goodsNumber);
				$quantity = $conn->real_escape_string($quantity);

				// Check if there's enough stock
				$qs = "select $quantity between 0 and remainingStock as enough_stock, goodsName, stockPrice * $quantity as totalPrice from goods where goodsNumber = $goodsNumber limit 1";
				// $error_message.= "$qs<br>";
				$query = mysqli_query($conn, $qs) or die(mysqli_error($conn));
				$result = mysqli_fetch_assoc($query);
				if ($result["enough_stock"] == 0){
					$is_valid = false;
					$error_message .=  "Not enough stock for $result[goodsName] ($quantity pieces). Please enter again<br>";
				} else {
					// If there's enough stock,
					$sum += $result["totalPrice"];
				}
			}
		}
	}


	$error_message.="Sum = $sum<br>";

	// $is_valid = false;
	if ($is_valid){

		// Create an order record
		// Then put all the values inside
		$consignmentStoreID = $conn->real_escape_string($_GET["consignmentStoreID"]);
		mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_ONLY);
		$qs = "INSERT INTO orders(customerEmail, consignmentStoreID, shopID, status, totalPrice) VALUES ('$_SESSION[customerEmail]', '$consignmentStoreID', '$_POST[shopID]', '1' , '$sum');";
		mysqli_query($qs);
		foreach ($goodsNumbers as $goodsNumber){
			//do something
		}
		$error_message.="$qs<br>";
		mysqli_query("SELECT x");
		// mysqli_commit($conn);
		$error_message.="Success<br>";



		// header("location: order-submitted.php");
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



<form method='post' id='orderForm'>

<div class='row mt-3'>
<table class='table table-hover table-nonfluid' id='price_table'>
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
	<tr id='row_$result[goodsNumber]'>
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
<select class='form-control col-md-4 col-sm-6' name='shopID'>
");

# Choose Shop
$qs = "select * from shop";
$query = mysqli_query($conn, $qs) or die(mysqli_error($conn));
while($result = mysqli_fetch_assoc($query)){
	print("
	<option value='$result[shopID]'>$result[shopName]</option>
	");
}
print("
</select>
</div>

<div class='mt-1' id='total_price_holder' style='font-size:20px'>
Total - HKD
<span id='total_price_text' class='text-secondary font-weight-bold'>0</span>
</div>

<div>The price is subject to change after server validation.</div>

<div class='mt-2'>
<button type='submit' name='' class='btn btn-default'>
<i class='fa fa-shopping-cart' aria-hidden='true'></i> Purchase
</button>
</div>
</div>
</form>
");

?>

<script type="text/javascript">
// Calculate the cost with Javascript

$("#orderForm").change(function(){
	var sum = 0;

	$('table#price_table tr').each(function(){
		var unit_price = parseFloat($(this).children("td").eq(3).html());
		var quantity = parseFloat($(this).children("td").eq(4).children("input").eq(0).val());
		console.log(unit_price + " * " + quantity + " = " + unit_price * quantity);

		var isChanged = false;

		if (Number.isFinite(unit_price)  && Number.isFinite(quantity)  ){
			if (unit_price * quantity >= 0){
				sum += unit_price * quantity;
				isChanged = true;
			}
		}

		if (isChanged){
			console.log(sum);
			$("#total_price_text").html(sum);
		}
	});

});
</script>


<?php
include 'inc/footer.php';
?>
