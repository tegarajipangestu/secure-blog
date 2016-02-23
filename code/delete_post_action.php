<?php 
session_start();
if (isset($_SESSION["isLogin"])){
	include 'mainviewer.php';
	$postid = $_GET['postid'];
	$con = phpsqlconnection();
	mysqli_query($con,"DELETE FROM post WHERE Post_Id=".$postid);
	header("Location: index.php");
	die();
}else{
    header("Location: login.php"); /* Redirect browser */
}


 ?>