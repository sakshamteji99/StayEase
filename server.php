<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$moNo = "";
	$dept = "";
	$empName = "";
	$pwd1 = "";
	$pwd2 = "";
	$oldpwd = "";
	$guestEmail = "";
	$phone = "";
	$designation = "";
	$message="";
	$address = "";
	$bid = "";
	$name = "";
	$ardate = "";
	$dpdate = "";
	$noOfRooms ="";
	$roomType ="";
	$availableRooms = "0";
	$allotedRoom = "";
	$bookingID = "";
	$bill = "";
	$allotedRoomCost = "";
	$noOfDays = "";
	$mardate="";
	$mdpdate = "";
	$mealType = "";
	$mealCount;
	$noOfDays2;
	$foodCharges;

	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'employee');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$moNo = mysqli_real_escape_string($db, $_POST['moNo']);
		$dept = mysqli_real_escape_string($db, $_POST['dept']);
		$empName = mysqli_real_escape_string($db, $_POST['empName']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if (empty($moNo)) { array_push($errors, "MoNo is required"); }
		if (empty($dept)) { array_push($errors, "Dept is required"); }
		if (empty($empName)) { array_push($errors, "EmpName is required"); }


		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		$query = "SELECT * FROM emp WHERE empID='$username'";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1)
		{
			array_push($errors, "Given EmpID already exixts");
		}


		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password =md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO emp (empID, passwd, empName, dept, mobileNo, email) 
					  VALUES('$username','$password','$empName','$dept','$moNo','$email')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['empName'] = $empName;
			$_SESSION['dept'] = $dept;
			$_SESSION['mobileNo'] = $moNo;
			$_SESSION['email'] = $email;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM emp WHERE empID='$username' AND passwd='$password'";
			$results = mysqli_query($db, $query);
			$user = mysqli_fetch_assoc($results);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['empName'] = $user['empName'];
				$_SESSION['dept'] = $user['dept'];
				$_SESSION['mobileNo'] = $user['mobileNo'];
				$_SESSION['email'] = $user['email'];
				$_SESSION['success'] = "You are now logged in";

				$admin="admin";
				if($username==$admin)
					header('location: adminpage.php');
				else
					header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

	if (isset($_POST['updt_user'])) {
		$password = mysqli_real_escape_string($db, $_POST['password_1']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$moNo = mysqli_real_escape_string($db, $_POST['moNo']);
		$dept = mysqli_real_escape_string($db, $_POST['dept']);
		$empName = mysqli_real_escape_string($db, $_POST['empName']);

		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if(empty($email) AND empty($moNo) AND empty($dept) AND empty($empName)){
			array_push($errors, "Nothing there to update");
		}

		$username2 = $_SESSION['username'];
		if (count($errors) == 0) {
			$password = md5($password);

			$query = "SELECT * FROM emp WHERE empID='$username2' AND passwd='$password'";
			$results = mysqli_query($db, $query);

				//echo "<script>console.log('Debug Objects: " . $username2 . "' );</script>";
				//echo "<script>console.log('Debug Objects: " . $password . "' );</script>";
			if (mysqli_num_rows($results) == 1) {

				if (!empty($email)){
					$query2 = "UPDATE emp SET email='$email' WHERE empID='$username2'";
					mysqli_query($db, $query2);
				}
				if (!empty($moNo)){
					$query2 = "UPDATE emp SET mobileNo='$moNo' WHERE empID='$username2'";
					mysqli_query($db, $query2);
				}
				if (!empty($dept)){
					$query2 = "UPDATE emp SET dept='$dept' WHERE empID='$username2'";
					mysqli_query($db, $query2);
				}
				if (!empty($empName)){
					$query2 = "UPDATE emp SET empName='$empName' WHERE empID='$username2'";
					mysqli_query($db, $query2);
				}
				$_SESSION['username'] = $username2;
				

				$_SESSION['success'] = "Details updated successfully.";
				header('location: index.php');
				
			}else {
				array_push($errors, "Wrong password");
			}
		}
	}

	if (isset($_POST['change_password'])) {

		$oldpwd = mysqli_real_escape_string($db, $_POST['oldpwd']);
		$pwd1 = mysqli_real_escape_string($db, $_POST['pwd1']);
		$pwd2 = mysqli_real_escape_string($db, $_POST['pwd2']);

		if (empty($oldpwd)) { array_push($errors, "Please enter current password."); }
		if (empty($pwd1)) { array_push($errors, "New password cannot be empty."); }

		$username2 = $_SESSION['username'];
		$password=md5($oldpwd);

		if ($pwd1 != $pwd2 ) {
			array_push($errors, "The two new passwords do not match");
		}
		
		$query = "SELECT * FROM emp WHERE empID='$username2' AND passwd='$password'";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 0) {
			array_push($errors, "Current password is incorrect.");
		}

		if (count($errors) == 0) {
			$password =md5($pwd1);
			$query2 = "UPDATE emp SET passwd='$password' WHERE empID='$username2'";
			mysqli_query($db, $query2);
			$_SESSION['username'] = $username2;
			$_SESSION['success'] = "Password changed successfully.";
			echo '<script>alert("Password changed successfully!")</script>';
			header('location: index.php');
		}


	}


	if (isset($_POST['go_next'])) {
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$guestEmail = mysqli_real_escape_string($db, $_POST['guestEmail']);
		$designation = mysqli_real_escape_string($db, $_POST['designation']);
		$phone = mysqli_real_escape_string($db, $_POST['phone']);
		$address = mysqli_real_escape_string($db, $_POST['address']);

		if (empty($name)||empty($guestEmail)||empty($designation)||empty($phone)) {
			array_push($errors, "Fill out all the details!");
		}

		if (count($errors) == 0) {

			$_SESSION['name'] = $name;
			$_SESSION['guestEmail'] = $guestEmail;
			$_SESSION['designation'] = $designation;
			$_SESSION['phone'] = $phone;
			$_SESSION['address'] = $address;

			header('location: room_booking2.php');
		}
	}

	if (isset($_POST['go_back'])) {
		unset($_SESSION['name']);
		unset($_SESSION['guestEmail']);
		unset($_SESSION['designation']);
		unset($_SESSION['phone']);
		unset($_SESSION['ardate']);
		unset($_SESSION['dpdate']);
		unset($_SESSION['roomType']);
		unset($_SESSION['availableRooms']);
		echo '<script>alert("Welcome to Geeks for Geeks")</script>';
		header('location: index.php');
	}

	if (isset($_POST['go_next2'])) {
		$ardate = mysqli_real_escape_string($db, $_POST['ardate']);
		$dpdate = mysqli_real_escape_string($db, $_POST['dpdate']);
		$roomType = mysqli_real_escape_string($db, $_POST['roomType']);

		if (empty($ardate)||empty($dpdate)||($roomType=='Select')) {
			array_push($errors, "Fill out all the details!");
		}

		if (count($errors) == 0) {

			$query = "SELECT RoomNo FROM rooms WHERE roomTypeID='$roomType'AND 
			RoomNo NOT IN(SELECT RoomNo FROM booking WHERE (status='APPROVED' AND ((ardate>='$ardate' AND ardate<'$dpdate') OR (dpdate>'$ardate' AND dpdate<='$dpdate')))) LIMIT 1";
			$result = mysqli_query($db, $query);
			if(!empty($result)){
				$row = mysqli_fetch_array($result);
				$availableRooms = $row['0'];
			}

			$noOfDays = round(abs(strtotime($dpdate) - strtotime($ardate))/86400);

			$_SESSION['noOfDays'] = $noOfDays;
			$_SESSION['ardate'] = $ardate;
			$_SESSION['dpdate'] = $dpdate;
			$_SESSION['roomType'] = $roomType;
			$_SESSION['availableRooms'] = $availableRooms;

			header('location: room_booking3.php');
		}
	}

	if (isset($_POST['go_back2'])) {
		header('location: room_booking.php');
	}

	if (isset($_POST['go_back3'])) {
		header('location: room_booking2.php');
	}

	if (isset($_POST['go_next3'])) {

		$availableRooms=$_SESSION['availableRooms'];
		$ardate=$_SESSION['ardate'];
		$dpdate=$_SESSION['dpdate'];
		$name=$_SESSION['name'];
		$guestEmail=$_SESSION['guestEmail'];
		$phone=$_SESSION['phone'];
		$designation=$_SESSION['designation'];
		$roomType=$_SESSION['roomType'];
		$noOfDays=$_SESSION['noOfDays'];
		$roomType=$_SESSION['roomType'];
		$address=$_SESSION['address'];


		if($availableRooms){

			$query = "SELECT RoomNo FROM rooms WHERE roomTypeID='$roomType'AND 
			RoomNo NOT IN(SELECT RoomNo FROM booking WHERE (status='APPROVED' AND ((ardate>='$ardate' AND ardate<'$dpdate') OR (dpdate>'$ardate' AND dpdate<='$dpdate')))) LIMIT 1";
			$result = mysqli_query($db, $query);
			$row = mysqli_fetch_array($result);
			$allotedRoom = $row['0'];
			

			$query = "SELECT price FROM roomTypes WHERE roomTypeID='$roomType' LIMIT 1";
			$result = mysqli_query($db, $query);
			$row = mysqli_fetch_array($result);
			$allotedRoomCost = $row['0'];


			$bill=($allotedRoomCost)*($noOfDays);
			$username=$_SESSION['username'];
			$status="PENDING";

			$query = "INSERT INTO booking (empID,ardate, dpdate, roomNo, status,bill) 
					  VALUES('$username','$ardate','$dpdate','$allotedRoom','$status','$bill')";


			mysqli_query($db, $query);

			$query = "SELECT bookingID FROM booking WHERE roomNo='$allotedRoom' AND ardate='$ardate' AND dpdate='$dpdate' LIMIT 1";
			$result = mysqli_query($db, $query);
			$row = mysqli_fetch_array($result);
			$bookingID = $row['0'];
			
			$query = "INSERT INTO guest (name, bookingID, guestEmail, phone, designation, address)
					  VALUES('$name','$bookingID','$guestEmail','$phone','$designation','$address')";
			mysqli_query($db, $query);

			$_SESSION['bookingID'] = $bookingID;
			$_SESSION['allotedRoom'] = $allotedRoom;
			$_SESSION['bill'] = $bill;

			?>
            alert("Hello! I am an alert box!!");
       		<?php 

			header('location: room_booking4.php');

		}
	}

	if (isset($_POST['log_out'])) {
		header('location: login.php');
	}

	if (isset($_POST['go_home'])) {
		unset($_SESSION['name']);
		unset($_SESSION['guestEmail']);
		unset($_SESSION['designation']);
		unset($_SESSION['phone']);
		unset($_SESSION['ardate']);
		unset($_SESSION['dpdate']);
		unset($_SESSION['roomType']);
		unset($_SESSION['bookingID']);
		unset($_SESSION['availableRooms']);
		header('location: index.php');
	}

	if (isset($_POST['updt_user'])) {
		header('location: index.php');
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

	if (isset($_POST['order_meal'])) {

		$bid = mysqli_real_escape_string($db, $_POST['bid']);
		$mardate = mysqli_real_escape_string($db, $_POST['mardate']);
		$mdpdate = mysqli_real_escape_string($db, $_POST['mdpdate']);
		$mealCount = mysqli_real_escape_string($db, $_POST['mealCount']);
		$mealType = mysqli_real_escape_string($db, $_POST['mealType']);


		$noOfDays2 = 1+round(abs(strtotime($mdpdate) - strtotime($mardate))/86400);

		$query = "SELECT price FROM mealprices WHERE mealType='$mealType' LIMIT 1";
		$result = mysqli_query($db, $query);
		$row = mysqli_fetch_array($result);
		$mealCost = $row['0'];
		$mealCost2=($noOfDays2)*($mealCount);
		$mealCost3=0;
		$mealCost3=($mealCost2)*($mealCost);

		$query = "INSERT INTO foodbooking (bookingID,mealStDate,mealEndDate,mealType,mealCount,foodBill) 
					  VALUES('$bid','$mardate','$mdpdate','$mealType','$mealCount','$mealCost3')";
			mysqli_query($db, $query);

			echo "<script>
		alert('Meal Ordered successfully!You can check updated bill in BOOKINGS section!');
		window.location.href='index.php';
		</script>";
		

	}
	
?>