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
	  font-family: Montserrat, sans-serif;
	}
	form, .content{
		width: 40%;
		text-align: center;
		background-color: transparent;
		border-color: transparent;
	}
	.btn2{
		background-color: white;
		color: #000000;
	}

	</style>
</head>
<body>

	<?php  if (!$_SESSION['availableRooms']) : ?>

		<div class="header">
			<h2>We are sorry!</h2>
		</div>

		<form method="post" action="room_booking3.php">	
		<?php include('errors.php'); ?>

		<h4>Room with required preferences is not available.<br>Please try with other preferences</h4><br>
		<div class="twobuttons">
		<div class="input-group">
			<button type="submit" class="btn2" name="go_back3">GO BACK</button>
		</div>
		<div class="input-group">
			<button type="submit" class="btn2" name="go_home">HOME</button>
		</div>
	</div>
	<?php endif ?>



	<?php  if ($_SESSION['availableRooms']) : ?>
		<div class="header">
			<h2>Room is available!</h2>
		</div>

		<form method="post" action="room_booking3.php">
		
		<?php include('errors.php'); ?>

		<div class="twobuttons">
			<div class="input-group">
				<button type="submit" class="btn2" name="go_back3">Go Back</button>
			</div>
			<div class="input-group">
				<button type="submit" class="btn2" name="go_next3">Confirm Booking</button>
			</div>
		</div>
		
	</form>

	<?php endif ?>
	

</body>
</html>