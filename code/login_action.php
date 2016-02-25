<?php 
session_start();
	include 'mainviewer.php';
	$email = $_POST['email'];
	$password =  hash("sha256",$_POST['password']); 
	
	$con = phpsqlconnection();
	$result = mysqli_query($con,"SELECT * FROM user WHERE Email='$email' AND Password='$password' LIMIT 1");
	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_array($result);
		if(isset($_POST['isRemembered'])){
			// remember me
			// update TOken and Cookie
			$domain = 'localhost';
			$cookie_name = "userSimpleBlog";
			$cookie_value = hash("sha256",(time()."".(rand(1000,1000000))));
			$token = hash("sha256",(time()."".(rand(1000,1000000))));
			$con = phpsqlconnection();
			$sql = "UPDATE user SET Token='$token', Identifier='$cookie_value' WHERE User_Id='".$row['User_Id']."'";
			mysqli_query($con, $sql) || mysqli_error($con);
			$_SESSION["myToken"] = $token;
			setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/", $domain, false, true); 
		
		}else{
			setcookie('userSimpleBlog', "false", 0);
			//update token
	        $token = hash("sha256",(time()."".(rand(1000,1000000))));
	        $con = phpsqlconnection();
	        $sql = "UPDATE user SET Token='$token' WHERE User_Id='".$row['User_Id']."'";
	        mysqli_query($con, $sql) || mysqli_error($con);
	        $_SESSION["myToken"] = $token;
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