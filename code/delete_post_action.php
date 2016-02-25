<?php 
session_start();
if (isset($_SESSION["isLogin"])){
	include 'mainviewer.php';
	$con = phpsqlconnection();
    $postid = $_GET['postid'];

    $getpostresult = getspecificpost($con,$postid);
    $row = mysqli_fetch_array($getpostresult);
    if ($row['Nama'] != $_SESSION['myNama']) {
        header("Location: index.php"); /* Redirect browser */
        exit();
    }else{
    	
		mysqli_query($con,"DELETE FROM post WHERE Post_Id=".$postid);
		header("Location: index.php");
    }

	die();
}else{
    header("Location: login.php"); /* Redirect browser */
}


 ?>