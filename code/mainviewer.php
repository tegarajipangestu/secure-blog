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
			"<h2 class=\"art-list-title\"><a href=\"post.php?postid=".htmlspecialchars($row['Post_Id'], ENT_QUOTES, 'UTF-8')."\">".htmlspecialchars($row['Title'], ENT_QUOTES, 'UTF-8')."</a></h2>";
		$time = strtotime(htmlspecialchars($row['Date'], ENT_QUOTES, 'UTF-8'));
		$time = date('j F Y',$time);
		echo 
			"<div class=\"art-list-time\">".$time."</div>
            <div class=\"art-list-time\"><span style=\"color:#F40034;\">&#10029;</span> Featured</div>";
			if (str_word_count(htmlspecialchars($row['Contents'], ENT_QUOTES, 'UTF-8'))>30)
			{
				echo 
	            "</div>
	            <p>".htmlspecialchars(implode(' ', array_slice(explode(' ',$row['Contents']), 0, 30)), ENT_QUOTES, 'UTF-8')."&hellip;</p>
	            <p>
	              <a href=\"edit_post.php?postid=".htmlspecialchars($row['Post_Id'], ENT_QUOTES, 'UTF-8')."\">Edit</a> | <a href=\"javascript:void(0)\" onclick=\"validatedelete".htmlspecialchars($row['Post_Id'], ENT_QUOTES, 'UTF-8')."()\">Hapus</a>
	            </p>
	        </li>";
			}
			else
			{
				echo 
	            "</div>
	            <p>".htmlspecialchars($row['Contents'], ENT_QUOTES, 'UTF-8')."</p>
	            <p>
	              <a href=\"edit_post.php?postid=".htmlspecialchars($row['Post_Id'], ENT_QUOTES, 'UTF-8')."\">Edit</a> | <a href=\"javascript:void(0)\" onclick=\"validatedelete".htmlspecialchars($row['Post_Id'], ENT_QUOTES, 'UTF-8')."()\">Hapus</a>
	            </p>
	        </li>";				
			}
			echo
			"<script>
				function validatedelete".htmlspecialchars($row['Post_Id'], ENT_QUOTES, 'UTF-8')."()
				{
				    var x;
				    if (confirm(\"Apakah Anda yakin menghapus post ini? \") == true) {
				        x = "."window.location.href = \"delete_post_action.php?postid=".htmlspecialchars($row['Post_Id'], ENT_QUOTES, 'UTF-8')."\""."
				    } else {
				        x = \"Cancel\";
				    }
				} 
			 </script>";
    	}
	}
 ?>
