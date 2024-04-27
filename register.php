<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style3.css">
	 <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	<style>
		body {
	  background-image: url('h3.jpg');
	  background-size: cover;
	  height: 100%;
	  overflow: hidden;
	}
	.regBtn {
	padding: 10px;
	font-size: 15px;
	color: white;
	background: #93a8dd;
	border: none;
	border-radius: 5px;
	margin-right: 10px;
	margin-left: 200px;
	display: flex;
	justify-content: center;
}
.header {
	width: 30%;
	margin: 30px auto 0px;
	background: transparent;
	text-align: center;
	border-bottom: none;
	border-radius: 10px 10px 0px 0px;
	padding: 20px;
	font-family: Montserrat, sans-serif;
}
	</style>
</head>
<body>
	<div class="header">
		<h2>Register</h2>
	</div>
	
	<form method="post" action="register.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>empID</label>
			<input type="text" name="username" value="<?php echo $username; ?>" required>
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>" required>
		</div>
		<div class="input-group">
			<label>empName</label>
			<input type="text" name="empName" value="<?php echo $empName; ?>" required>
		</div>
		<div class="input-group">
			<label>Department</label>
			<input type="text" name="dept" value="<?php echo $dept; ?>" required>
		</div>
		<div class="input-group">
			<label>Mobile No</label>
			<input type="text" name="moNo" value="<?php echo $moNo; ?>" required>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1" required>
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2" required>
		</div>
		<div class="input-group">
			<button type="submit" class="regBtn" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>