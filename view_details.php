<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <style>
  body {
    font: 400 15px/1.8 Lato, sans-serif;
    color: #000000;
  }
  h3, h4 {
    margin: 10px 0 30px 0;
    letter-spacing: 4px;      
    font-size: 20px;
    color: #000000;
  }
  .andar{
    color: #ffffff;
  }
  .dibba{
    margin: 40px;
    padding: 50px;
    border-radius: 10px;
    box-shadow: 10px 10px;
    background-color: #333333;
    opacity: 0.75;
  }
  .container {
    padding: 80px 120px;
  }
  .person {
    border: 10px solid transparent;
    margin-bottom: 25px;
    width: 80%;
    height: 80%;

  }
  .person:hover {
    border-color: #f1f1f1;
  }
  .carousel-inner img {
    width: 100%; /* Set width to 100% */
    margin: auto;
  }
  .carousel-caption h3 {
    color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
    background: #2d2d30;
    color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
  .list-group-item:first-child {
    border-top-right-radius: 0;
    border-top-left-radius: 0;
  }
  .list-group-item:last-child {
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }
  .thumbnail {
    padding: 0 0 15px 0;
    border: none;
    border-radius: 0;
  }
  .thumbnail p {
    margin-top: 15px;
    color: #000000;
  }
  .modal-header, h4, .close {
    background-color: #333;
    color: #fff !important;
    text-align: center;
    font-size: 30px;
  }
  .modal-header, .modal-body {
    padding: 40px 50px;
  }
  .nav-tabs li a {
    color: #000000;
  }
  #googleMap {
    width: 100%;
    height: 400px;
    -webkit-filter: grayscale(100%);
    filter: grayscale(100%);
  }  
  .navbar {
    font-family: Montserrat, sans-serif;
    margin-bottom: 0;
    border: 0;
    font-size: 11px !important;
    letter-spacing: 2px;
    height:50px;
  }
  .btn4 {
  padding: 10px;
  font-size: 15px;
  border: none;
  border-radius: 5px;
  background-color: #9bb1e0;
  color: white;
  margin-right: 20px;
}
  .navbar li a, .navbar .navbar-brand { 
    color: #000000 !important;
  }
  .navbar-nav li a:hover {
    color: #000000 !important;
  }
  .navbar-nav li.active a {
    color: #fff !important;
    background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
    border-color: transparent;
  }
  .open .dropdown-toggle {
    color: #fff;
    background-color: #555 !important;
  }
  .dropdown-menu li a {
    color: #000 !important;
  }
  .dropdown-menu li a:hover {
    background-color: red !important;
  }
  footer {
    background-color: #000000;
    color: #000080;
    padding: 32px;
  }
  footer a {
    color:#000080;
  }
  footer a:hover {
    color:#000080;
    text-decoration: none;
  }  
  .form-control {
    border-radius: 0;
  }
  .twobuttons{
    justify-content: space-between;
    display: flex;
    margin-left: 220px;
    margin-right: 220px;
  }
  textarea {
    resize: none;
  }
  </style>
</head>
<style>
body {
  background-image: url('h3.jpg');
  background-size: cover;
  height: 100%;
  overflow: hidden;
}
.container{
  background-color: #ffffff;
  width:800px;
  padding: 30px;
  border-radius: 8px;
}
.container2{
  margin: 150px;
}
.container3{
  margin-left: 400px;
  padding-bottom: 30px;
}

</style>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php" style="text-decoration: none;">HOME</a></li>
        <li><a href="view_details.php" style="text-decoration: none;">PROFILE</a></li>
        <li><a href="room_booking.php" style="text-decoration: none;">BOOK ROOM</a></li>
        <li><a href="show_booking.php" style="text-decoration: none;">SHOW BOOKINGS</a></li>
        <li><a href="index.php?logout='1'" style="text-decoration: none;">LOG OUT</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container2">
  <div class="container3">
  <h2>Your Details are as follows! </h2>
</div>
  <div class="container">
  <table  class="table">
        <tr class="active">
          <td><strong>Employement ID: </strong></td>
          <td>&nbsp&nbsp&nbsp<?php echo $_SESSION['username']; ?></td>
        </tr>

        <tr class="active">
          <td><strong>Employee Name: </strong></td>
          <td>&nbsp&nbsp&nbsp<?php echo $_SESSION['empName']; ?></td>
        </tr>


        <tr class="active">
          <td><strong>Department: </strong></td>
          <td>&nbsp&nbsp&nbsp<?php echo $_SESSION['dept']; ?></td>
        </tr>

        <tr class="active">
          <td><strong>Mobile Number: </strong></td>
          <td>&nbsp&nbsp&nbsp<?php echo $_SESSION['mobileNo']; ?></td>
        </tr>

        <tr class="active">
          <td><strong>Email:</strong></td>
          <td>&nbsp&nbsp&nbsp<sp><?php echo $_SESSION['email']; ?></td>
        </tr>
      </table>
      <form method="post"> 
        <div class="twobuttons">
          <button type="button" class="btn4 btn-info" style="background-color: #9bb1e0 "><a href="update.php" style="text-decoration: none; color: inherit;">Update Details</a></button>
           <button type="button" class="btn4 btn-info" style="background-color: #9bb1e0 "><a href="change_pwd.php" style="text-decoration: none; color: inherit;">Change Password</a></button>
         </div>
      </form>
</div>
</div>

</body>
</html>






















