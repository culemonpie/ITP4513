<?php
include 'inc/header.php';

/*
Page code: 8.1
Who can access: Tenant
Description: List of orders from one's consignment store
*/

tenant_only();
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
}
?>

<div class="container">
	<div class="row">
		<div class="col-12 my-2">
			<h4 class="text-secondary">Report</h4>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-12 my-2">
			<span class="text-secondary font-weight-bold">Below is the list of orders from your consignment stores.</span>

<table class="table mt-1">
	<tr>
		<th>Order #</th>
		<th>Date</th>
		<th>Details</th>
	</tr>
	<tr>
		<td>2</td>
		<td>2020-06-22</td>
		<td><a href="view-report.php">Details</a></td>
	</tr>
	<tr>
		<td>1</td>
		<td>2020-05-14</td>
		<td><a href="view-report.php">Details</a></td>
	</tr>
</table>

		</div>
	</div>
</div>

<?php
include 'inc/footer.php';
?>
