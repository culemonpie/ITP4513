<?php
include 'inc/header.php';

/*
Page code: 1.3
Who can access: Anonymous users
Description: An anonymous user can fill in their customerEmail, firstName, lastName, phoneNumber and password. If all the inforation are valid, insert that record into the database. Otherwise, show an appropriate error to the user.
*/

?>

<div class="container">
	<div class="row">
		<div class="col-12 my-2">
			<h4 class="text-secondary">Registration Success</h4>
		</div>
	</div>
</div>

<div class="container">
<div class="row">
	<div class="col-12">
		<div class="my-2 text-secondary font-weight-bold">Thank you. You can now login as joe@example.com .</div>
		<div> <a class="my-2 btn btn-default" href="index.php">Home</a> </div>
	</div>
</div>
</div>
<?php
include 'inc/footer.php';
?>
