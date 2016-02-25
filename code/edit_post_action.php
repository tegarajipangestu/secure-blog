<?php 
session_start();
if (isset($_SESSION["isLogin"]) && (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token'])){
	include 'mainviewer.php';
	$Judul = $_POST['Judul'];
	$Tanggal = $_POST['Tanggal'];
	$Konten = $_POST['Konten'];
	$postid = $_GET['postid'];

	echo $_FILES["image"];

	if (isset($_FILES["image"])) {
		echo "iya";
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

	}


    $con = phpsqlconnection();

    $getpostresult = getspecificpost($con,$postid);
        $row = mysqli_fetch_array($getpostresult);

	if ($row['Nama'] != $_SESSION['myNama']) {
		echo "Maaf Anda bukan pemilik post ini!";
	} else {
		if (isset($_FILES["image"])) {
			$stmt = $con->prepare("UPDATE post SET Title=?,Date=?, Contents=?, Image=? WHERE Post_Id=?");
			$stmt->bind_param('ssssi', $Judul, $Tanggal, $Konten, $target_file, $postid);
			$stmt->execute();

			// mysqli_query($con,"UPDATE post SET Title='".$Judul."'".","."Date='".$Tanggal."'".","."Contents='".$Konten."'".", Image='".$target_file."' WHERE Post_Id=".$postid);			
			// echo "UPDATE post SET Title='".$Judul."'".","."Date='".$Tanggal."'".","."Contents='".$Konten."'".", Image='".$target_file."' WHERE Post_Id=".$postid;
		}
		else {
			$stmt = $con->prepare("UPDATE post SET Title=?,Date=?, Contents=? WHERE Post_Id=?");
			$stmt->bind_param('sssi', $Judul, $Tanggal, $Konten, $postid);
			$stmt->execute();

			// mysqli_query($con,"UPDATE post SET Title='".$Judul."'".","."Date='".$Tanggal."'".","."Contents='".$Konten."'"."WHERE Post_Id=".$postid);
			// echo "UPDATE post SET Title='".$Judul."'".","."Date='".$Tanggal."'".","."Contents='".$Konten."'"."WHERE Post_Id=".$postid;
		}
		header("Location: index.php");
	}

	die();
}else{
    header("Location: login.php"); /* Redirect browser */
}
 ?>