<?php
include 'inc/header.php';

/*
Page code: 1.1
Who can access: Logged in users
Description: The page where user lands after login.
*/
login_only();

?>

<?php print_error_message($error_message); ?>

<div class="container">
	<div class="row" style="height:300px">
		<div class="text-center m-auto">
			<div class="text-secondary" style="font-size:30px">
				<b>Welcome, <?php echo $display_name; ?>.</b>
			</div>
			<div class="mt-1">
				<a href="view-profile.php" class="btn btn-default">View profile</a>
			</div>
		</div>
	</div>
</div>

<?php
include 'inc/footer.php';
?>
