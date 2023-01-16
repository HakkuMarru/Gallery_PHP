<?php
include_once 'dbh.inc.php';

if (isset($_POST['submit-delete'])) {
	$image_name = $_POST['image_name'];

	unlink("../img/$image_name");
	$sql = "DELETE FROM gallery WHERE image_name='$image_name'";
	mysqli_query($conn, $sql);

	header("Location: ../index.php?delete=success");
	exit();
}