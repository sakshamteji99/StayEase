<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Rooms</title>
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
		<h2>Fill out the guest details</h2>
	</div>
	
	<form method="post" action="room_booking.php">

		
		<?php include('errors.php'); ?>


		<div class="input-group">
			<label>Guest Name</label>
			<input type="text" name="name" value="<?php echo $_SESSION['name'] ?? NULL; ?>">
		</div>
		<div class="input-group">
			<label>Guest Email</label>
			<input type="email" name="guestEmail" value="<?php echo $_SESSION['guestEmail'] ?? NULL; ?>">
		</div>
		<div class="input-group">
			<label>Designation</label>
			<input type="text" name="designation" value="<?php echo $_SESSION['designation'] ?? NULL; ?>" >
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="text" name="address" value="<?php echo $_SESSION['address'] ?? NULL; ?>" >
		</div>
		<div class="input-group">
			<label>Contact Number</label>
			<input type="text" name="phone" value="<?php echo $_SESSION['phone'] ?? NULL; ?>">
		</div>
		
		<div class="twobuttons">
			<div class="input-group">
				<button type="submit" class="btn2" name="go_back">Go Back</button>
			</div>
			<div class="input-group">
				<button type="submit" class="btn2" name="go_next">Next</button>
			</div>
		</div>
		
	</form>

</body>
</html>