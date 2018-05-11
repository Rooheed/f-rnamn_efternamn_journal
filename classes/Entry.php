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
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">	  
</head>
<body>
	<h1 class="main">Journal application</h1>
	<div class="modal-content2 animate">
		<div class="container">
			<form name="myForm"  action = "../partials/post_entry.php" method = "post">
			<label for="title">Title</label>
			<input name = "title" type="text"  placeholder = "Enter Title" required>
			<label for="content">Content</label>
			<textarea name = "content"  placeholder="Write your content here" style="height:200px"></textarea>
			<button type="submit" name = "submit1">Submit</button>
			<a type = "submit" name = "logout" href = "../partials/logout.php" >Logout</a>
		<div class = "back_btn">
	<a  name = "back" class = "back_btn" href = "../partials/post_entry_view.php" >Back</a>
</div>
</div>	
</form>
</div>

</body>
</html>
		