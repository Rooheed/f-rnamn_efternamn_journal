
<?php 
include('connection.php');
session_start();
   
   if (isset($_POST['submit'])) {
	$username =$_POST['email'];
	$password = $_POST['password'];
	$password = md5($password);
	$query = "SELECT * FROM users WHERE username ='$username' AND password='$password' ";
		$results = mysqli_query($connection, $query);
		$count = mysqli_num_rows($results);
		if(!$count == 0)
		{
				$array = $results->fetch_assoc();
				$_SESSION['user1'] = $username;
				$_SESSION['userid'] = $array['userID'];
				$_SESSION['success']  = "You are now logged in";
				header('location: post_entry_view.php');				
		}
		else
			echo "UserName or password is Incorrect!!! Try again";			
   }
		else 
		{
			echo "UserName or password is Incorrect!!! Try again";
		}
		
		
 


   




?>

		