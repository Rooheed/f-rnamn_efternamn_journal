
<!DOCTYPE html>
<html lang="en">
<style>
.sign_up
{
	position: absolute;
    bottom: 13px;
    right: 16px;
}
</style>

<head>
	<meta charset="utf-8">
	 <link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<h1 class="main">Journal application</h1>
			<div class="modal-content animate">
				<div class="imgcontainer">
				 <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="Avatar" class="avatar">
				 </div>
				 <div class="container">
				 <form name="myForm" action = "partials/login.php" method = "post">
					<div class = "mail_title">Email</div>
					<input type="email"  class = "email_box" name = "email" placeholder="Enter email" required>
					<div class="pw">Password</div>
					 <input type="password"  class = "password" name = "password" placeholder="Password" required>
					<button type="submit" name = "submit"  class="button">Submit</button>
					<a class  = "signup" href = "partials/signup.php">Register here</a>
				</form>
		</div>
	</body>
	</html>
		