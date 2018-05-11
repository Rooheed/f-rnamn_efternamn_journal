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
?>
<!DOCTYPE html>

<html lang="en">
<head>

	<meta charset="utf-8">
   <link rel="stylesheet" href="../css/style.css">
</head>
<?php
$sql = 'SELECT * FROM entries where userID = "'.$_SESSION['userid'].'"';		
$query = mysqli_query($connection, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($connection));
}
if(!isset($_SESSION['user1']))
{
    header("location:../index.php");
    exit();
}

?>

<body>

<style type="text/css">
	body {
		font-family: 'Lato', sans-serif;
		font-size: 0.9rem;
		line-height: 1.5rem;
	}

	table {
		border: 1px solid black;
		
		opacity: 0.95;
		width: 85%;
		margin-top: 5rem;
	}

	th {
		background: #4CAF50;
		color: #fff;
	}

	tr:nth-child(even){
		background: #e6e6e6;
	}
	tr:nth-child(odd){
		background: #fff;
	}

	th, td {
		text-align: center;
		padding: 10px;
	}

	
	
	
</style>
<h1 class="main">Journal application</h1>
<table align="center">

	
	<tr>
	<td class="addnew">
	<a class="add" href = "../classes/Entry.php" class = "new_record" >Add a new Record</a>
	</td>
	<td>
	<a class="log" name = "logout" href = "logout.php">Logout</a>
	</td>
	</tr>
	<tr>
		<th>Entry ID</th>
		<th>Created At</th>
		<th>Title</th>
		<th>Content</th>
		<th>Edit/Delete</th>
	</tr>
		
	<tbody>	
		
	<?php 
	
	while ($row =  mysqli_fetch_array($query)) { ?>
		<tr>
			
			<td><?php echo $row['entryID'];?></td>
			<td><?php echo $row['createdAt']; ?></td>
			<td><?php echo $row['title']; ?></td>
			<td class = "content_word"><?php echo $row['content']; ?></td>
			
			

	<td>
		<a type = "submit" class = "edit" href="view.php?edit=<?php echo $row['entryID']; ?>" class="edit_btn" >Edit</a>
		<a type = "submit" name = "dlt" class = "delete" href="delete.php?del=<?php echo $row['entryID']; ?>" class="del_btn">Delete</a>
	</td>
			
		</tr>
	<?php } ?>
	</tbody>
	</table>
	</form>
	</div>
	</body>
	</html>
		