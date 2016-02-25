<?php 
session_start();
	include 'mainviewer.php';
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$password = hash("sha256",$_POST['password']); 
	$con = phpsqlconnection();
	$result = mysqli_query($con,"SELECT * FROM user WHERE Email='$email' LIMIT 1");
	if ($result->num_rows == 0) {
		// insert token too
		$token = hash("sha256",(time()."".(rand(1000,1000000))));
		$sql = "INSERT INTO user (Nama, Email, Password, Token)	VALUES ('".$nama."'".","."'".$email."'".","."'".$password."'".","."'".$token."')";
		mysqli_query($con,$sql)  || mysqli_error($con);
		$_SESSION["isLogin"] = true;
		$_SESSION["myEmail"] = $email;
		$_SESSION["myNama"] = $nama;
		$_SESSION["myId"] = mysqli_insert_id($con);
		$_SESSION["myToken"] = $token;
		header("Location: index.php");
	} else {
		$_SESSION["msg"] = "Email is already registered!";
		header("Location: signup.php");
	}
	die();
 ?>