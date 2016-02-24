<?php 
session_start();
	include 'mainviewer.php';
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$con = phpsqlconnection();
	$result = mysqli_query($con,"SELECT * FROM user WHERE Email='$email' LIMIT 1");
	if ($result->num_rows == 0) {
		mysqli_query($con,"INSERT INTO user (Nama, Email, Password)	VALUES ('".$nama."'".","."'".$email."'".","."'".$password."')");
		$_SESSION["isLogin"] = true;
		$_SESSION["myEmail"] = $email;
		$_SESSION["myNama"] = $nama;
		$_SESSION["myId"] = mysqli_insert_id($con);
		// echo($_SESSION["myId"]);
		header("Location: index.php");
	} else {
		$_SESSION["msg"] = "Email is already registered!";
		header("Location: signup.php");
	}
	die();
 ?>