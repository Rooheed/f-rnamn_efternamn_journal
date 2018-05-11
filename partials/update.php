<?php
include 'connection.php';

	if(isset($_POST["submit1"])) {
		@$title = $_POST["title"];
		@$content = $_POST["content"];
		@$id = $_POST["id"];

 mysqli_query($connection, "UPDATE entries SET title = '$title', content='$content'  WHERE entryID = '$id' ");
	if (mysqli_connect_errno() == 0) {
    echo "Record Updated successfully";
	header('location: post_entry_view.php');
} else {
    echo "Error: " ."<br>" . mysqli_connect_errno();
	echo "sorry not updated";
}
	}
	

