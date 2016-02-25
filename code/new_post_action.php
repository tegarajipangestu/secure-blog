<?php 
session_start();
if (isset($_SESSION["isLogin"]) && (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token'])){
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
<<<<<<< HEAD
	        $con = phpsqlconnection();
=======
			$con = phpsqlconnection();
>>>>>>> df17127f283f68ad29758e0e77f1885ac2eb0ed3

			$stmt = $con->prepare("INSERT INTO post (Post_Id, Creator_Id, Title, Date, Contents, Image) 
				VALUES (NULL,?,?,?,?,?)");
			$stmt->bind_param('issss', $creatorid, $Judul, $Tanggal, $Konten, $target_file);
			$stmt->execute();
			// $result = $stmt->get_result();

			// $sql = "INSERT INTO post (Post_Id, Creator_Id, Title, Date, Contents, Image) 
			// 	VALUES (NULL".",".$creatorid.","."'".$Judul."'".","."'".$Tanggal."'".","."'".$Konten."'".","."'".$target_file."')";
			if ($stmt->execute()) {
				// echo "Huba";
			   	header("Location: index.php");
			} else {
			    echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}

			die();
<<<<<<< HEAD
	    } else {
	        echo "Sorry, there was an error uploading your file.<br>";
	    }
	}

	
=======

	    } else {
	        echo "Sorry, there was an error uploading your file.<br>";
	    }
	}
>>>>>>> df17127f283f68ad29758e0e77f1885ac2eb0ed3

}else{
    header("Location: login.php"); /* Redirect browser */
}


function decryptCaesar($encrypted_text, $key){
	$alphabet=array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
	//positions of the letters in alphabet
	$flip=array_flip($alphabet);
	
	$decrypted_text='';
	for ($i=0; $i<$n; $i++)
		//decryption
		$decrypted_text.=$alphabet[(26+$flip[$encrypted_text[$i]]-$key)%26];
	return $decrypted_text;
} 

 ?>