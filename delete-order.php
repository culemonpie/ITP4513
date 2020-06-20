<?php
include 'inc/header.php';


/*
Page code: 3.4
Who can access: Tenant
Description: View the content of a report
*/


/*
1. Order ID - ok
2. Order Date - ok
3. Customer ID - ok
4. Customer Name - ok
5. Shop address - ok
6. goods Number - ok
7. goods Name - ok
8. Quantity - ok
9. Order status - ok
10. Selling price of each goods - ok
11. TotalPrice -ok
*/

print_error_message($error_message);

?>

<div class="container mt-3">
	<div class="card col-md-6 mx-auto">
		<div class="card-body text-center">
			<div>
				<i class="fa fa-trash-alt fa-3x" aria-hidden="true"></i>
			</div>
			<div class="mt-1">
				Order deleted.
			</div>
			<div class="mt-1">
				<a href="list-report.php" class="btn btn-default">Return to report</a>
			</div>
		</div>

	</div>
</div>



<?php
include 'inc/footer.php';
?>
