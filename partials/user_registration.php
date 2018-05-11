<?php 
include('connection.php');
?>
<?php
		session_start();
	if(isset($_POST["submit"])) {
		$username = $_POST["email"];
		$password = $_POST["password"];
		$password = md5($password);
		} 

@$sql = "INSERT INTO users" ."(username, password)"."VALUES ( '$username', '$password' )"; 
 
if ($connection->query($sql) === TRUE) {
    echo "User Registered successfully";
	header('location:post_entry_view.php');
	
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}
 
?>

		