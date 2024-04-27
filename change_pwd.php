<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Details</title>
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
	</style>
</head>
<body>
	<div class="header">
		<h2>Change password for <strong><?php echo $_SESSION['username']; ?></strong></h2>
	</div>
	
	<form method="post" action="change_pwd.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Old Passwprd</label>
			<input type="Password" name="oldpwd" value="<?php echo $oldpwd; ?>" >
		</div>
		<div class="input-group">
			<label>New Password</label>
			<input type="Password" name="pwd1" value="<?php echo $pwd1; ?>" >
		</div>
		<div class="input-group">
			<label>Confirm Password</label>
			<input type="Password" name="pwd2" value="<?php echo $pwd2; ?>" >
		</div>
		
		<div class="twobuttons">
			<div class="input-group">
				<button type="submit" class="btn2" name="change_password" style="background-color: #9bb1e0 ">Change Password</button>
			</div>

			<div class="input-group">
				<button type="submit" class="btn2" style="background-color: #9bb1e0 "><a href="view_details.php" style="text-decoration: none; color: inherit;">Go Back</button>		
			</div>
		</div>
	</form>

</body>
</html>