<?php 
session_start();
	include 'mainviewer.php';
	$email = $_POST['email'];
	$password = $_POST['password'];
	$con = phpsqlconnection();
	$result = mysqli_query($con,"SELECT * FROM user WHERE Email='$email' AND Password='$password' LIMIT 1");
	if (mysqli_num_rows($result) == 1) {
		$_SESSION["isLogin"] = true;
		$row = mysqli_fetch_array($result);
		$_SESSION["myEmail"] = $row['Email'];
		$_SESSION["myNama"] = $row['Nama'];
		$_SESSION["myId"] = $row['User_Id'];
		header("Location: index.php");
	} else {
		$_SESSION["msg"] = "Password or email is not correct!";
		header("Location: signup.php");
	}
	die();

 ?>