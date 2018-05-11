
<?php
		include('connection.php');
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
		if(!isset($_SESSION['user1']))
		{
			header("location:../index.php");
			exit();
		}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php 
		include('connection.php');
		if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		($record = mysqli_query($connection, "SELECT * FROM entries WHERE entryID = '$id' "));
		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$id = $n['entryID'];
			
			$title = $n["title"];
			
			$content = $n["content"];
		}
	}

?>
<div class="modal-content2 animate">
	<div class="container">
		<form action = "update.php" method = "post" >
   		<div class="u_id1"  >Entry ID</div>
    	<input class="userID1" type="text"  name = "id" readonly  value="<?php echo $id; ?>" >
		<label for="title">Title</label>
		<input type="text"  name = "title" value="<?php echo $title; ?>" required>
		<label for="content">Content</label>
				
		<textarea name = "content" id="exampleTextarea" style="height:200px" ><?php echo $content; ?></textarea>

  <?php if ($update == true): ?>
<button type="submit" name ="submit1" class=" update_btn" value = "<?php echo $id; ?>">Update</button>

  <?php else: ?>
  <button type="submit" name = "submit" class=" submit" value = "<?php echo $id; ?>">Submit</button>
<?php endif ?>
  
<div class = "choice4">
		<a type = "submit" name = "logout" class = "logout" href = "logout.php" >Logout</a>
		</div>
		
<div class = "back_btn">
		<a name = "back" class = "back_btn" href = "post_entry_view.php" >Back</a>
		</div>
</form>
				
</body>
</html>
		