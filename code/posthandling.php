<?php 
if (isset($_SESSION["isLogin"])){
	function getpost($con)
	{	
		$stmt = $con->prepare(
		  "SELECT user.Nama ,user.User_Id, post.* FROM post INNER join user ON post.Creator_Id = user.User_Id ORDER BY Date DESC");
		// $stmt->bind_param('ss', $value, $value2);
		$stmt->execute();
		$result = $stmt->get_result();
		// $row = $result->fetch_array(MYSQLI_NUM);
		// $sql = "SELECT user.Nama , post.* FROM post INNER join user ON post.Creator_Id = user.User_Id ORDER BY Date DESC";
		// $result = mysqli_query($con,$sql);
		return $result;
	}
	function getspecificpost($con,$postid)
	{
		$stmt = $con->prepare(
		  "SELECT user.Nama ,user.User_Id, post.* FROM post INNER join user ON post.Creator_Id = user.User_Id WHERE Post_Id = ?");
		$stmt->bind_param('i', $postid);
		$stmt->execute();
		$result = $stmt->get_result();

		// $result = mysqli_query($con,"SELECT user.Nama , post.* FROM post INNER join user ON post.Creator_Id = user.User_Id WHERE Post_Id = ".$postid);
		return $result;		
	}
	function getspecificcomments($con,$postid)
	{
		$stmt = $con->prepare(
		  "SELECT user.Nama ,user.User_Id, comments.* FROM comments INNER join user ON comments.Creator_Id = user.User_Id WHERE Post_Id = ? ORDER BY Time DESC");
		$stmt->bind_param('i', $postid);
		$stmt->execute();
		$result = $stmt->get_result();

		// $result = mysqli_query($con,"SELECT user.Nama , comments.* FROM comments INNER join user ON comments.Creator_Id = user.User_Id WHERE Post_Id = ".$postid." ORDER BY Time DESC");
		return $result;				
	}
}else{
    header("Location: login.php"); /* Redirect browser */
}

 ?>