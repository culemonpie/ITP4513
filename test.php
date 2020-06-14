<?php
include 'inc/header.php';
?>

<div class="container">

	<?php

	$hostname = "127.0.0.1";
	$database = "ProjectDB";
	$username = "1";
	$password = "1";
	$port = 3306;

	// $conn = mysqli_connect($hostname, $username, $password, $database);
	$mysqli = new mysqli($hostname,$username,$password,$database, $port);

	if ($mysqli -> connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	  exit();
	}

	echo $conn;

	?>

	<table class="table">
		<tr>
			<th>#</th>
			<th>Content</th>
		</tr>
		<?php
		for ($i = 1; $i < 6; $i++){
			print("
			<tr>
			<td>$i</td>
			<td>Hello</td>
			</tr>
			");
		}

		?>
	</table>

</div>





<?php
include 'inc/footer.php';
?>
