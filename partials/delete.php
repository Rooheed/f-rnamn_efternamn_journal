
<?php
include 'connection.php';
session_start();


if (isset($_GET['del'])) {
	
	$e_id = $_GET['del'];
	
	mysqli_query($connection, "DELETE FROM entries WHERE entryID = $e_id");
	header('location: post_entry_view.php');
	exit();
}

?>
