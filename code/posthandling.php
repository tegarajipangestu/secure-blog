<?php 
if (isset($_SESSION["isLogin"])){
	function getpost($con)
	{	$sql = "SELECT user.Nama , post.* FROM post INNER join user ON post.Creator_Id = user.User_Id ORDER BY Date DESC";
		$result = mysqli_query($con,$sql);
		return $result;
	}
	function getspecificpost($con,$postid)
	{
		$result = mysqli_query($con,"SELECT user.Nama , post.* FROM post INNER join user ON post.Creator_Id = user.User_Id WHERE Post_Id = ".$postid);
		return $result;		
	}
	function getspecificcomments($con,$postid)
	{
		$result = mysqli_query($con,"SELECT user.Nama , comments.* FROM comments INNER join user ON comments.Creator_Id = user.User_Id WHERE Post_Id = ".$postid." ORDER BY Time DESC");
		return $result;				
	}
}else{
    header("Location: login.php"); /* Redirect browser */
}

 ?>