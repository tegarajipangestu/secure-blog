<?php 
session_start();
if (isset($_SESSION["isLogin"]) && (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token'])){
	include 'mainviewer.php';
	// var_dump();
	$Judul = $_POST['Judul'];
	$Tanggal = $_POST['Tanggal'];
	$creatorid = $_SESSION["myId"];
	$Konten = $_POST['Konten'];// caesarDecode ( $_POST['Konten'], (int)$_SESSION["shared_key"]) ;

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

	        $con = phpsqlconnection();

			$stmt = $con->prepare("INSERT INTO post (Post_Id, Creator_Id, Title, Date, Contents, Image) 
				VALUES (NULL,?,?,?,?,?)");
			$stmt->bind_param('issss', $creatorid, $Judul, $Tanggal, $Konten, $target_file);
			$status = $stmt->execute();
			// $result = $stmt->get_result();

			// $sql = "INSERT INTO post (Post_Id, Creator_Id, Title, Date, Contents, Image) 
			// 	VALUES (NULL".",".$creatorid.","."'".$Judul."'".","."'".$Tanggal."'".","."'".$Konten."'".","."'".$target_file."')";
			if ($status) {
				// echo "Huba";
			   	header("Location: index.php");
			} else {
			    echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}

			die();


	    } else {
	        echo "Sorry, there was an error uploading your file.<br>";
	    }
	}

}else{
    header("Location: login.php"); /* Redirect browser */
}


function caesarDecode( $message, $key ){
	$key = $key%25;
    $ciphertext = "";
    $ascii_a = ord( 'a' );
    $ascii_z = ord( 'z' );
    $ascii_A = ord( 'A' );
    $ascii_Z = ord( 'Z' );
    while( strlen( $plaintext ) ){
        $char = ord( $plaintext );
        if( $char >= $ascii_a && $char <= $ascii_z ){
            $char = ( ( $key + $char + $ascii_a ) % 26 ) ;
        }else if( $char >= $ascii_A && $char <= $ascii_Z ){
            $char = ( ( $key + $char + $ascii_A ) % 26 ) ;
        }
        $plaintext = substr( $plaintext, 1 );
        $ciphertext .= chr( $char );
    }
    return "$ciphertext";
}

 ?>