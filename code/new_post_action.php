<?php 
	include 'mainviewer.php';
	$Judul = $_POST['Judul'];
	$Tanggal = $_POST['Tanggal'];
	$Konten = $_POST['Konten'];
	$con = phpsqlconnection();
	mysqli_query($con,"INSERT INTO post (Title, Date, Contents)	VALUES ('".$Judul."'".","."'".$Tanggal."'".","."'".$Konten."')");
	header("Location: index.php");
	die();
 ?>