<?php 
	include 'mainviewer.php';
	$postid = $_GET['postid'];
	$con = phpsqlconnection();
	mysqli_query($con,"DELETE FROM post WHERE Post_Id=".$postid);
	header("Location: index.php");
	die();
 ?>