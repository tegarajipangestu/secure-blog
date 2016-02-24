<?php 
session_start();
if (isset($_SESSION["isLogin"])){
	session_destroy();
	setcookie('userSimpleBlog', "", 1);
	header("Location: login.php");
}else{
    header("Location: login.php"); /* Redirect browser */
}

 ?>