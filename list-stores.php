<?php
include 'inc/header.php';

/*
Page code: 4.1
Who can access: Tenant
Description: The page where user lands after login.
*/

customer_only();


// select all consignment stores if they have at least 1 active product.
$qs = "select consignmentstore.consignmentStoreID, count(*) as p, consignmentStore.consignmentStoreName from consignmentstore inner join goods
on consignmentStore.consignmentStoreID = goods.consignmentStoreID and goods.status = 1
group by goods.consignmentStoreID";

$query = mysqli_query($conn, $qs) or die(mysqli_error($conn));

print("

<div class='container'>
<div class='row'>
<div class='col-12 my-2'>
<h4 class='text-secondary'>Browse Stores</h4>
</div>
</div>
</div>

<div class='container'>


<div class='row'>
<div class='col-12 text-secondary'>
Stores with at least one available goods will be shown here.
</div>
</div>

<div class='row mt-3'>
<table class='table table-hover'>
<tr>
<th>Store</th>
<th>Number of Available Goods</th>
<th></th>
</tr>
");

if (mysqli_num_rows($query) > 0){
	while($result = mysqli_fetch_assoc($query)){
		print("
		<tr>
		<td>$result[consignmentStoreName]</td>
		<td>$result[p]</td>
		<td> <a href='view-store.php?consignmentStoreID=$result[consignmentStoreID]'>Details</a></td>
		</tr>
		");
	}
} else {
	echo "Not found";
}

print("
</table>
</div>
</div>
");
?>

<?php
include 'inc/footer.php';
?>
