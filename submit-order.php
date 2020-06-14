<?php
include 'inc/header.php';
?>

<div class="container">
	<div class="row">
		<div class="col-12 my-2">
			<h4 class="text-secondary">Submit order</h4>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-12">
			<a href="#" class="btn btn-default">Create</a>
			<a href="submit-order.php" class="btn btn-default ml-1">Submit</a>
		</div>
	</div>

	<div class="row mt-3">
		<table class="table">
			<tr>
				<th>Goods Number</th>
				<th>Goods Name</th>
				<th>Unit Price</th>
				<th></th>
			</tr>


			<tr>
				<td>1</td>
				<td>Bracelet</td>
				<td>99.5</td>
				<td> <a href="view-order.php">Details</a></td>
			</tr>

			<tr>
				<td>1</td>
				<td>Bracelet</td>
				<td>99.5</td>
				<td> <a href="">Details</a></td>
			</tr>

			<tr>
				<td>1</td>
				<td>Bracelet</td>
				<td>99.5</td>
				<td> <a href="">Details</a></td>
			</tr>


		</table>
	</div>

</div>


<?php
include 'inc/footer.php';
?>
