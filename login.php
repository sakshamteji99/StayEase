<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>

	<title>Logt In</title>
	<link rel="stylesheet" type="text/css" href="style3.css">

 
</head>



<body>
	<style>
body {
  background-image: url('h3.jpg');
  background-size: cover;
  height: 100%;
  overflow: hidden;
}

.loginBtn {
	padding: 10px;
	font-size: 15px;
	color: white;
	background: #94aadc;
	border: none;
	border-radius: 5px;
	margin-right: 10px;
	margin-left: 200px;
	display: flex;
	justify-content: center;
}
</style>

	<div class="header"> <h2>Log In</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="loginBtn" name="login_user">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>


</body>
</html>