<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }

  if (isset($_GET['view_user'])) {
    header('location: view_details.php');
  }
  if (isset($_GET['change_pwd'])) {
    header('location: change_pwd.php');
  }
  if (isset($_GET['book_room'])) {
    header('location: room_booking.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    color: #000000;
  }
  .dibba{
    margin: 40px;
    padding: 50px;
    border-radius: 10px;
    box-shadow: 10px 10px;
    background-color: #bce8f1;
    opacity: 0.75;
  }
  .container {
    width:1000px;
    letter-spacing: 1px;
    margin-bottom: 50px;
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
  .btn {
    padding: 10px 20px;
    background-color: #333;
    color: #f1f1f1;
    border-radius: 0;
    transition: .2s;
  }
  .btn:hover, .btn:focus {
    border: 1px solid #333;
    background-color: #fff;
    color: #000;
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
  .navbar li a, .navbar .navbar-brand { 
    color: #000000 !important;
  }
  .navbar-nav li a:hover {
    color: #000000 !important;
  }
  .navbar-nav li.active a {
    color: #bce8f1 !important;
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
    background-color: #e7e7e7;
    color: #000000;
    padding: 32px;
  }
  footer a {
    color:#000000;
  }
  footer a:hover {
    color:#000000;
    text-decoration: none;
  }  
  .form-control {
    border-radius: 0;
  }
  textarea {
    resize: none;
  }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="myNavbar">
      <div class="navbar-header"><a class="navbar-brand" href="#myPage">ADMIN PAGE</a></div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="adminpage.php" style="text-decoration: none;">HOME</a></li>
        <li><a href="view_details.php" style="text-decoration: none;">PROFILE</a></li>
        <li><a href="show_booking_admin.php" style="text-decoration: none;">SHOW BOOKINGS</a></li>
        <li><a href="approve_booking_admin.php" style="text-decoration: none;">APPROVE BOOKINGS</a></li>
        <li><a href="#contact">CONTACT</a></li>
        <li><a href="index.php?logout='1'" style="text-decoration: none;">LOG OUT</a></li>
      </ul>
    </div>
  </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="h5.jpg" alt="New York" style="width: 1200px; height: 600px;">
        <div class="carousel-caption">
        </div>      
      </div>

      <div class="item">
        <img src="h3.jpg" alt="New York" style="width: 1200px; height: 600px;">
        <div class="carousel-caption">
        </div>      
      </div>

      <div class="item">
        <img src="h4.jpg" alt="Chicago" style="width: 1200px; height:600px;">
        <div class="carousel-caption">
        </div>      
      </div>
    
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<!-- Container (The Band Section) -->

  <br>
  <br>
<div id="contact" class="container">
  <h2>CONTACT DETAILS</h2><br>
  <div class="row">
    <div class="col-sm-4">
      <p class="text-center"><strong>Dr. Sourav Gur</strong></p><br>
      <a href="#demo" data-toggle="collapse">
        <img src="https://www.iitp.ac.in/images/photo/sourav_gura.png" class="img-circle person" alt="Random Name" style="width: 225px; height:225px;">
      </a>
      <div id="demo" class="collapse">

        <p>Warden (Boy’s Hostel, Kalam Block C & D)</p>
        <p>Assistant Professor, Department of CEE</p>
        <p>Mobile: +91-6115-233-819</p>
      </div>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Udit Satija</strong></p><br>
      <a href="#demo2" data-toggle="collapse">
        <img src="https://www.iitp.ac.in/images/photo/UditPica.jpg" class="img-circle person" alt="Random Name" style="width: 225px; height:225px;">
      </a>
      <div id="demo2" class="collapse">
        <p>Warden (Married and Boys Hostel Raman)</p>
        <p>Assistant Professor, Electrical Engineering</p>
        <p>Mobile: +91-6115-233-815</p>
      </div>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Sweta Sinha</strong></p><br>
      <a href="#demo3" data-toggle="collapse">
        <img src="https://www.iitp.ac.in/images/photo/Sweta_sinha.jpg" class="img-circle person" alt="Random Name" style="width: 225px; height: 225px;">
      </a>
      <div id="demo3" class="collapse">
        <p>Warden (Girls Hostel )</p>
        <p>Assistant Professor, Department of HSS</p>
        <p>Mobile: +91-6115-233-397</p>
      </div>
    </div>
  </div>
</div>
</div>


<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
 
</footer>

<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>



</body>
</html>

