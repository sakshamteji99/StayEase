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
		<h2>Fill the preferences</h2>
	</div>
	
	<form method="post" action="room_booking2.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Arrival date</label>
			<input type="date" name="ardate" value="$_SESSION['ardate']" >
		</div>
		<div class="input-group">
			<label>Departure date</label>
			<input type="date" name="dpdate" value="$_SESSION['dpdate']" >
		</div>
		<div class="input-group" >
			<label>Accomodation Type</label>
			<select name="roomType" style="width:97%; height:40px; border-radius: 5px; font-size: 15px;" >  
		  		<option value="Select">Select</option>  
		  		<option value="1">AC Attached Bathroom</option>  
		  		<option value="2">Attached Bathroom</option>
		  		<option value="3">Non-attached Bathroom</option>  
			</select>
		</div>

		<div class="twobuttons">
			<div class="input-group">
				<button type="submit" class="btn2" name="go_back2">Go Back</button>
			</div>
			<div class="input-group">
				<button type="submit" class="btn2" name="go_next2">Check for availability</button>
			</div>
		</div>
	</form>

</body>
</html>