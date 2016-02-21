<?php
	include 'mainviewer.php' ;
	$postid = $_GET['postid'];
	$title = $_GET['title'];
	$email = $_GET['email'];
	$contents = $_GET['contents'];
	$con = phpsqlconnection();
	mysqli_query($con,"INSERT INTO comments (Title, Email, Contents, Post_Id) VALUES ('".$title."'".","."'".$email."'".","."'".$contents."'".","."'".$postid."'".")");
	$getcommentsresult = mysqli_query($con,"SELECT * FROM comments WHERE Post_Id = ".$postid." ORDER BY Time DESC");    
    while($comments = mysqli_fetch_array($getcommentsresult)) {                                
        echo
        "<li class=\"art-list-item\">
        <div class=\"art-list-item-title-and-time\">";
        echo
        "<h2 class=\"art-list-title\"><a href=\"post.php\">".$comments['Title']."</a></h2>";
        $time = strtotime($comments['Time']);
        $time = date('j F Y',$time);
        echo 
        "<div class=\"art-list-time\">".$time."</div> </div>";
        echo
        "<p>".$comments['Contents']."</p>";                                
        echo "</li>";
    }

 ?>