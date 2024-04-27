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
	form{
		width:50%;
		text-align: center;
	}

	</style>
</head>
<body>


		<div class="header">
			<h2>Your Booking ID is '<?php echo $_SESSION['bookingID']; ?>'</h2>
		</div>

		<form method="post" action="room_booking3.php">	
		<?php include('errors.php'); ?>

		<h4>We will soon review the booking and update the approval!<br><br>You can check the status of booking as well as bill <a href="show_booking.php">here</a></h4>
		<br>
		</form>
		</div>
	


	

</body>
</html>