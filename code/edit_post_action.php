
<?php
session_start();

    $utf8 = array(
        '/[áàâãªä]/u'   =>   'a',
        '/[ÁÀÂÃÄ]/u'    =>   'A',
        '/[ÍÌÎÏ]/u'     =>   'I',
        '/[íìîï]/u'     =>   'i',
        '/[éèêë]/u'     =>   'e',
        '/[ÉÈÊË]/u'     =>   'E',
        '/[óòôõºö]/u'   =>   'o',
        '/[ÓÒÔÕÖ]/u'    =>   'O',
        '/[úùûü]/u'     =>   'u',
        '/[ÚÙÛÜ]/u'     =>   'U',
        '/ç/'           =>   'c',
        '/Ç/'           =>   'C',
        '/ñ/'           =>   'n',
        '/Ñ/'           =>   'N',
        '/–/'           =>   '-', // UTF-8 hyphen to "normal" hyphen
        '/−/'           =>   '-', // UTF-8 hyphen to "normal" hyphen
        '/[’‘‹›‚]/u'    =>   ' ', // Literally a single quote
        '/[“”«»„]/u'    =>   ' ', // Double quote
    );

if (isset($_SESSION["isLogin"]) && (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token'])) {
    include 'mainviewer.php';
	
	$decrypt = new caesarEnc();
	$funcname = "caesarDecode";
	
	$Judul = $decrypt->$funcname(preg_replace(array_keys($utf8), array_values($utf8),$_POST['Judul']),(int)$_SESSION["shared_key"]);
	
	$Tanggal = $_POST['Tanggal'];
    $Konten = $decrypt->$funcname(preg_replace(array_keys($utf8), array_values($utf8), $_POST['Konten']),(int)$_SESSION["shared_key"]);// caesarDecode ( $_POST['Konten'], (int)$_SESSION["shared_key"]) ;
	$postid  = $_GET['postid'];
    $con = phpsqlconnection();
    
    
    if ($_FILES["image"]["name"]!='') {
	    echo "Mamam = ".$_FILES["image"]["name"];
        $target_dir    = "uploads/";
        $target_file   = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk      = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
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
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.<br>";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.<br>";
                
                $getpostresult = getspecificpost($con, $postid);
                $row           = mysqli_fetch_array($getpostresult);
                
                if ($row['Nama'] != $_SESSION['myNama']) {
                    echo "Maaf Anda bukan pemilik post ini!";
                } else {
                    if (isset($_FILES["image"])) {
                        $stmt = $con->prepare("UPDATE post SET Title=?,Date=?, Contents=?, Image=? WHERE Post_Id=?");
                        $stmt->bind_param('ssssi', $Judul, $Tanggal, $Konten, $target_file, $postid);
                        $stmt->execute();
                    } else {
                    	echo "Impossible";
                    }
                    header("Location: index.php");
                }
                
                die();
                
            } else {
                echo "Sorry, there was an error uploading your file.<br>";
            }   
        }
    }
    else {
	    $stmt = $con->prepare("UPDATE post SET Title=?,Date=?, Contents=? WHERE Post_Id=?");
	    $stmt->bind_param('sssi', $Judul, $Tanggal, $Konten, $postid);
	    $stmt->execute();
	    header("Location: index.php");
    }
} else {
    header("Location: login.php");
    /* Redirect browser */
}
?>