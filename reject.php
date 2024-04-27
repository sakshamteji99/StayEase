<?php

include "server.php"; 

$id = $_GET['id']; 

$query = "UPDATE booking SET status='REJECTED' WHERE bookingID='$id'";
mysqli_query($db, $query);
header('location: approve_booking_admin.php');


?>