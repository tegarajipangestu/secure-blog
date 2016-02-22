<?php
	include 'mainviewer.php' ;
	$postid = htmlspecialchars($_GET['postid'], ENT_QUOTES, 'UTF-8');
	$title = htmlspecialchars($_GET['title'], ENT_QUOTES, 'UTF-8');
	$email = htmlspecialchars($_GET['email'], ENT_QUOTES, 'UTF-8');
	$contents = htmlspecialchars($_GET['contents'], ENT_QUOTES, 'UTF-8');
	$con = phpsqlconnection();
	mysqli_query($con,"INSERT INTO comments (Title, Email, Contents, Post_Id) VALUES ('".$title."'".","."'".$email."'".","."'".$contents."'".","."'".$postid."'".")");
	$getcommentsresult = mysqli_query($con,"SELECT * FROM comments WHERE Post_Id = ".$postid." ORDER BY Time DESC");    
    while($comments = mysqli_fetch_array($getcommentsresult)) {                                
        echo
        "<li class=\"art-list-item\">
        <div class=\"art-list-item-title-and-time\">";
        echo
        "<h2 class=\"art-list-title\"><a href=\"post.php\">".htmlspecialchars($comments['Title'], ENT_QUOTES, 'UTF-8')."</a></h2>";
        $time = strtotime(htmlspecialchars($comments['Time'], ENT_QUOTES, 'UTF-8'));
        $time = date('j F Y',$time);
        echo 
        "<div class=\"art-list-time\">".$time."</div> </div>";
        echo
        "<p>".htmlspecialchars($comments['Contents'], ENT_QUOTES, 'UTF-8')."</p>";                                
        echo "</li>";
    }

 ?>