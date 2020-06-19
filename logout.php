<?php
include 'inc/header.php';

/*
Page code:
Who can access: Anonymous users
*/

session_unset();
header("Location: index.php");

?>

<?php
include 'inc/footer.php';
?>
