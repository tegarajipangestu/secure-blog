<?php 
session_start();
	include 'mainviewer.php';
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$con = phpsqlconnection();
	$result = mysqli_query($con,"SELECT * FROM user WHERE Email='$email' AND Password='$password' LIMIT 1");
	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_array($result);
		if(isset($_POST['isRemembered'])){
			$domain = 'localhost';
			$cookie_name = "userSimpleBlog";
			$cookie_value = hash("sha256",(time()."".(rand(1000,1000000))));

			$con = phpsqlconnection();
			$sql = "UPDATE user SET Identifier='$cookie_value' WHERE User_Id='".$row['User_Id']."'";
			mysqli_query($con, $sql) || mysqli_error($con);

			setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/", $domain, false, true); 
		}else{
			setcookie('userSimpleBlog', "false", 0);
		}

		$_SESSION["isLogin"] = true;
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