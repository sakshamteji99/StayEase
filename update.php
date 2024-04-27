<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>

  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <title>Update Details</title>
  <style>
    body {
  font-size: 120%;
  background: #F8F8FF;
}

.header {
  width: 30%;
  margin: 50px auto 0px;
  text-align: center;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
  letter-spacing: 1px;
}
form, .content {
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
}

.input-group label {
  display: block;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #ffffff;
  border: none;
  border-radius: 5px;
}
.error {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
}
.success {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
}

.twobuttons{
  display:flex;
  justify-content:center;
  padding: 0 20px;

}

body {
  font-family: Montserrat, sans-serif;
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
.btn4 {
  padding: 10px;
  font-size: 15px;
  border: none;
  border-radius: 5px;
  background-color: #9bb1e0;
  color: white;
  margin-left: 20px;
}
.btn5 {
  padding: 10px;
  font-size: 15px;
  border: none;
  border-radius: 5px;
  background-color: #9bb1e0;
  color: white;
  margin-right: 20px;
}
</style>
</head>
<body>
  <div class="header">
    <h2>Update Details for <strong><?php echo $_SESSION['username']; ?></strong></h2>
  </div>
  
  <form method="post" action="update.php">

    
    <?php include('errors.php'); ?>

    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" value="<?php echo $email; ?>" >
    </div>
    <div class="input-group">
      <label>empName</label>
      <input type="text" name="empName" value="<?php echo $empName; ?>" >
    </div>
    <div class="input-group">
      <label>Department</label>
      <input type="text" name="dept" value="<?php echo $dept; ?>" >
    </div>
    <div class="input-group">
      <label>Mobile No</label>
      <input type="text" name="moNo" value="<?php echo $moNo; ?>" >
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password_1">
    </div>
    <div class="twobuttons">
    <div class="input-group">
        <button type="submit" class="btn5 btn-info" style="background-color: #9bb1e0 "><a href="view_details.php" style="text-decoration: none; color: inherit;">GO BACK</button>
      </div>
    <div class="input-group">
      <button type="submit" class="btn4 btn-info" name="updt_user">UPDATE DETAILS</button>
    </div>
  </div>
  </form>

</body>
</html>