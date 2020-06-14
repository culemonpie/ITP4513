<?php
include 'inc/header.php';
?>

<div class="container">
	<div class="row">
		<div class="col-12 my-2">
			<h4 class="text-secondary">Delete Account - Joe Chan</h4>
		</div>
	</div>
</div>

<form class="" action="delete-account-success.php" method="post">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="text-secondary font-weight-bold">
					You are about to delete your account, along with all your order records and comments.<br>
					This action cannot be undone.<br>
					If you are sure about that, please enter your password to confirm.
				</div>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-12 col-sm-3">
				Password
			</div>
			<div class="col-12 col-sm-3">
				<input type="password" class="form-control" name="" value="">
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-12">
				<input type="checkbox" name="" value="">
				I understand that this action cannot be undone.
			</div>
		</div>
		<div class="row my-3">
			<div class="col-12">
				<input type="submit" name="" value="Confirm" class="btn btn-default">
				<a href="view-profile.php" class="btn btn-default ml-3">On a second thought, I'd like to keep my account</a>
			</div>
		</div>
	</div>
</form>
<?php
include 'inc/footer.php';
?>
