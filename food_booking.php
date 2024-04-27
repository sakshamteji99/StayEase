<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Meal</title>
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
			<label>Booking ID</label>
			<input type="int" name="bid" >
		</div>

		<div class="input-group">
			<label>Order Meal From</label>
			<input type="date" name="mardate" value="$_SESSION['mardate']" >
		</div>
		<div class="input-group">
			<label>Order Meal To</label>
			<input type="date" name="mdpdate" value="$_SESSION['mdpdate']" >
		</div>
		<div class="input-group" >
			<label>Meal Type</label>
			<select name="mealType" style="width:97%; height:40px; border-radius: 5px; font-size: 15px;" >  
		  		<option value="Select">Select</option>  
		  		<option value="Breakfast">Breakfast</option>  
		  		<option value="Lunch">Lunch</option>
		  		<option value="Dinner">Dinner</option>  
		  		<option value="All">All</option> 
			</select>
		</div>

		<div class="input-group" >
			<label>Meal For</label>
			<select name="mealCount" style="width:97%; height:40px; border-radius: 5px; font-size: 15px;" > 
		  		<option value="Select">Select</option>  
		  		<option value="1">1 person</option>  
		  		<option value="2">2 persons</option>
			</select>
		</div>

		<div class="twobuttons">
			<div class="input-group">
				<button type="submit" class="btn2" name="order_meal">Book Meal</button>
			</div>
		</div>
	</form>

</body>
</html>