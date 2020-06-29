<?php
include 'inc/header.php';

/*
Page code: 4.5
Who can access: Tenant
Description: List of the goods a tenant own.
*/

tenant_only();

$qs = "SELECT * FROM goods"; // todo ah diu
$query = mysqli_query($conn, $qs) or die(mysqli_error($conn));

?>

<div class="container">
	<div class="row">
		<div class="col-12 my-2">
			<h4 class="text-secondary">List of Goods</h4>
		</div>
	</div>
</div>

<div class="container">


	<div class="row">
		<div class="col-12 text-secondary">
			<a href="create-goods.php" class="btn btn-secondary">Create</a>
		</div>
	</div>

	<div class="row">
		<div class="col-12 text-secondary">
			Below is a list of the goods you own.
		</div>
	</div>

	<div class="row mt-3">
		<table class="table table-hover">
			<tr>
				<th>ID</th>
				<th>Goods Name</th>
				<th></th>
			</tr>

			<?php

			// Display items into a table


			$sql = "
			SELECT goods.* FROM goods
			INNER JOIN consignmentstore ON goods.ConsignmentStoreID = consignmentstore.ConsignmentStoreID
			WHERE tenantID = '$_SESSION[tenantID]';
			";


			$query = mysqli_query($conn, $sql);

			if (mysqli_num_rows($query) > 0){
				while($goods = mysqli_fetch_assoc($query)){
					echo "
					<tr>
					<td>$goods[goodsNumber]</td>
					<td>$goods[goodsName]</td>
					<td><a href='view-goods.php?goodsNumber=$goods[goodsNumber]'>Details</a></td>
					</tr>
					";
				}
			} else {
				// Not found
				echo "Not found<br>";
				echo $sql;
			}


			//
			// <tr>
			// 	<td>1</td>
			// 	<td>Braclet</td>
			// 	<td> <a href="view-goods.php">Details</a></td>
			// </tr>
			//
			// <tr>
			// 	<td>2</td>
			// 	<td>Anklet</td>
			// 	<td> <a href="view-goods.php">Details</a></td>
			// </tr>
			?>

		</table>
	</div>

</div>


<?php
include 'inc/footer.php';
?>
