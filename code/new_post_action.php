<?php 
error_reporting(E_ALL);
session_start();
if (isset($_SESSION["isLogin"])){
	include 'mainviewer.php';
	$Judul = $_POST['Judul'];
	$Tanggal = $_POST['Tanggal'];
	$creatorid = $_SESSION["myId"];
	$Konten = $_POST['Konten'];

	$target_dir = "uploads/";
	$target_file = $target_dir.basename($_FILES["image"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["image"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.<br>";
	        $uploadOk = 0;
	    }
	}
	// Check file size
	if ($_FILES["image"]["size"] > 500000) {
	    echo "Sorry, your file is too large.<br>";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.<br>";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.<br>";
	    } else {
	        echo "Sorry, there was an error uploading your file.<br>";
	    }
	}

	$con = phpsqlconnection();
	$sql = "INSERT INTO post (Post_Id, Creator_Id, Title, Date, Contents) 
		VALUES (NULL".",".$creatorid.","."'".$Judul."'".","."'".$Tanggal."'".","."'".$Konten."')";
	if (mysqli_multi_query($con, $sql)) {
		// echo "Huba";
	   	header("Location: index.php");
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}

	die();

}else{
    header("Location: login.php"); /* Redirect browser */
}

 ?>