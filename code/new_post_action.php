<?php 
session_start();
if (isset($_SESSION["isLogin"])){
	include 'mainviewer.php';
	$Judul = $_POST['Judul'];
	$Tanggal = $_POST['Tanggal'];
	$creatorid = $_SESSION["myId"];
	$Konten = $_POST['Konten'];
	$con = phpsqlconnection();
	$sql = "INSERT INTO post (Post_Id, Creator_Id, Title, Date, Contents) 
		VALUES (NULL".",".$creatorid.","."'".$Judul."'".","."'".$Tanggal."'".","."'".$Konten."')";
	if (mysqli_multi_query($con, $sql)) {
    	header("Location: index.php");
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
	//
	die();
}else{
    header("Location: login.php"); /* Redirect browser */
}

 ?>