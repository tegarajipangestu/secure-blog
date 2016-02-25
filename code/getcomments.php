<?php
session_start();
if (isset($_SESSION["isLogin"])){
    include 'mainviewer.php' ;
    $postid = htmlspecialchars($_GET['postid'], ENT_QUOTES, 'UTF-8');
    $contents = htmlspecialchars($_GET['contents'], ENT_QUOTES, 'UTF-8');
    $creatorid = $_SESSION["myId"];
    $con = phpsqlconnection();
    $stmt = $con->prepare(
    "INSERT INTO comments (Comment_Id, Creator_Id, Post_Id, Contents) 
        VALUES (NULL,?,?,?)");
    $stmt->bind_param('iis', $creatorid, $postid, $contents);
    // $stmt->execute();

    // $sql ="INSERT INTO comments (Comment_Id, Creator_Id, Post_Id, Contents) 
    //     VALUES (NULL".",".$creatorid.","."'".$postid."'".","."'".$contents."')";
    if ($stmt->execute()) {
        $stmt = $con->prepare("SELECT user.Nama , comments.* FROM comments INNER join user ON comments.Creator_Id = user.User_Id WHERE Post_Id = ? ORDER BY Time DESC");
        $stmt->bind_param('i',$postid);
        $stmt->execute();
        $getcommentsresult = $stmt->get_result();

        // $getcommentsresult = mysqli_query($con,"SELECT user.Nama , comments.* FROM comments INNER join user ON comments.Creator_Id = user.User_Id WHERE Post_Id = ".$postid." ORDER BY Time DESC");    
        while($comments = mysqli_fetch_array($getcommentsresult)) {                                
            echo
            "<li class=\"art-list-item\">
            <div class=\"art-list-item-title-and-time\">";
            
            $time = strtotime(htmlspecialchars($comments['Time'], ENT_QUOTES, 'UTF-8'));
            $time = date('j F Y',$time);
            echo 
            "<div class=\"art-list-time\">".$time."</div> </div>";
            echo
            "<p> By: ".htmlspecialchars($comments['Nama'], ENT_QUOTES, 'UTF-8')."<br>".  
            "".htmlspecialchars($comments['Contents'], ENT_QUOTES, 'UTF-8')."</p>";                               
            echo "</li>";
        }
    } else {
        echo "Error: ". mysqli_error($con);
    }
}else{
    header("Location: login.php"); /* Redirect browser */
}

 ?>