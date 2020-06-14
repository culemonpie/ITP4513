<?php
include 'inc/header.php';
?>

<div class="container">
	<table class="table">
		<tr>
			<th>#</th>
			<th>Content</th>
		</tr>
		<?php


		$qs = "select * from goods";
		$query = mysqli_query($conn, $qs) or die(mysqli_error($conn));

		while($goods = mysqli_fetch_assoc($query)){
			echo "
			<tr>
			<td>".$goods["goodsName"]. "</td>
			<td>".$goods["stockPrice"]. "</td>
			</tr>
			";

		}

		mysql_close($conn);

		?>
	</table>

</div>





<?php
include 'inc/footer.php';
?>
