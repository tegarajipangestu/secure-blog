<?php 
	include 'mainviewer.php';
	$Judul = $_POST['Judul'];
	$Tanggal = $_POST['Tanggal'];
	$Konten = $_POST['Konten'];
	$postid = $_GET['postid'];
	$con = phpsqlconnection();
	mysqli_query($con,"UPDATE post SET Title='".$Judul."'".","."Date='".$Tanggal."'".","."Contents='".$Konten."'"."WHERE Post_Id=".$postid);
	header("Location: index.php");
	die();
 ?>