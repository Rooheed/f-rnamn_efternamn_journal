
<?php 
include('connection.php');

?>

<?php
		session_start();
		
		/*Session will expire after 5 minutes */
		$inactive = 115;
		if( !isset($_SESSION['timeout']) )
		$_SESSION['timeout'] = time() + $inactive; 

		$session_life = time() - $_SESSION['timeout'];

		if($session_life > $inactive)
		{  session_destroy();
			
		 header("Location:../index.php");     }

		$_SESSION['timeout']=time();
		
		if(isset($_POST["submit1"])) {
		$title = $_POST["title"];
		$content = $_POST["content"];
		} 

@$sql = "INSERT INTO entries" ."(title, content, userID)"."VALUES ( '$title', '$content','$_SESSION[userid]' )"; 
header('location:post_entry_view.php');
 
if ($connection->query($sql) === TRUE) {
    echo "New record created successfully";
	
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}
 
?>

		