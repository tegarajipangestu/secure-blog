<?php 
	include 'posthandling.php';
	function phpsqlconnection ()
	{
	    $con=mysqli_connect("mysql:3306","root","dev","simpleblog");
	    if (mysqli_connect_errno()){
	        echo "Failed to connect to MySQL: " . mysqli_connect_error();
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
	   	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	    }
	    return $con;
	}
	function artlistitem ()
	{
		$connection = phpsqlconnection();
		$getpostresult = getpost($connection);
//		echo  $getpostresult;
		while($row = mysqli_fetch_array($getpostresult)) {
		echo 
			"<li class=\"art-list-item\">";
		echo
            "<div class=\"art-list-item-title-and-time\">";
		echo
			"<h2 class=\"art-list-title\"><a href=\"post.php?postid=".$row['Post_Id']."\">".$row['Title']."</a></h2>";
		$time = strtotime($row['Date']);
		$time = date('j F Y',$time);
		echo 
			"<div class=\"art-list-time\">".$time."</div>
            <div class=\"art-list-time\"><span style=\"color:#F40034;\">&#10029;</span> Featured</div>";
			if (str_word_count($row['Contents'])>30)
			{
				echo 
	            "</div>
	            <p>".implode(' ', array_slice(explode(' ', $row['Contents']), 0, 30))."&hellip;</p>
	            <p>
	              <a href=\"edit_post.php?postid=".$row['Post_Id']."\">Edit</a> | <a href=\"javascript:void(0)\" onclick=\"validatedelete".$row['Post_Id']."()\">Hapus</a>
	            </p>
	        </li>";
			}
			else
			{
				echo 
	            "</div>
	            <p>".$row['Contents']."</p>
	            <p>
	              <a href=\"edit_post.php?postid=".$row['Post_Id']."\">Edit</a> | <a href=\"javascript:void(0)\" onclick=\"validatedelete".$row['Post_Id']."()\">Hapus</a>
	            </p>
	        </li>";				
			}
			echo
			"<script>
				function validatedelete".$row['Post_Id']."()
				{
				    var x;
				    if (confirm(\"Apakah Anda yakin menghapus post ini? \") == true) {
				        x = "."window.location.href = \"delete_post_action.php?postid=".$row['Post_Id']."\""."
				    } else {
				        x = \"Cancel\";
				    }
				} 
			 </script>";
    	}
	}
 ?>
