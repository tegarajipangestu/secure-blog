<?php 
  session_start();

  if (isset($_SESSION["isLogin"])){

    if (! isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));
    }

    include 'mainviewer.php';
    $con = phpsqlconnection();
    $postid = $_GET['postid'];

    $getpostresult = getspecificpost($con,$postid);
        $row = mysqli_fetch_array($getpostresult);
    if ($row['Nama'] != $_SESSION['myNama']) {
        header("Location: index.php"); /* Redirect browser */
        exit();
    }
 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="Deskripsi Blog">
<meta name="author" content="Judul Blog">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="omfgitsasalmon">
<meta name="twitter:title" content="Simple Blog">
<meta name="twitter:description" content="Deskripsi Blog">
<meta name="twitter:creator" content="Simple Blog">
<meta name="twitter:image:src" content="{{! TODO: ADD GRAVATAR URL HERE }}">

<meta property="og:type" content="article">
<meta property="og:title" content="Simple Blog">
<meta property="og:description" content="Deskripsi Blog">
<meta property="og:image" content="{{! TODO: ADD GRAVATAR URL HERE }}">
<meta property="og:site_name" content="Simple Blog">

<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<title>Simple Blog | Edit Post</title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="assets/php/new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <h2>Edit Post</h2>
            
            <div id="contact-area">
                <?php 
                echo 
                    "<form  id=\"PostForm\" method=\"post\" onSubmit=\"return editPost()\" action=\"edit_post_action.php?postid=".$postid."\" enctype=\"multipart/form-data\">";
                 ?>
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>" />
                    <label for="Judul">Judul:</label>
                    <?php 
                        echo 
                            "<input type=\"text\" name=\"Judul\" id=\"Judul\" value= \"".$row['Title']."\">";
                     ?>
                    <label for="Tanggal">Tanggal:</label>
                    <?php 
                        echo 
                            "<input type=\"date\" name=\"Tanggal\" id=\"Tanggal\" value= \"".$row['Date']."\">";
                     ?>                    
                    <label for="Konten">Konten:</label><br>
                    <?php 
                        echo 
                            "<textarea name=\"Konten\" rows=\"20\" cols=\"20\" id=\"Konten\">".$row['Contents']."</textarea>";
                     ?>        
                     <?php 
                        if (isset($row['Image'])) {
                            echo "<img src=\"".$row['Image']."\" alt=\"\">";                            
                        }
                      ?>
                    <label for="FileUpload">Gambar:</label>
                    <input type="file" name="image" id="fileToUpload"><br>

                    <input type="submit" name="submit" value="Ubah" class="submit-button">
                </form>
            </div>
        </div>
    </div>

</article>

<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        Asisten IF3110 /
        <a class="rss-link" href="#rss">RSS</a> /
        <br>
        <a class="twitter-link" href="http://twitter.com/YoGiiSinaga">Yogi</a> /
        <a class="twitter-link" href="http://twitter.com/sonnylazuardi">Sonny</a> /
        <a class="twitter-link" href="http://twitter.com/fathanpranaya">Fathan</a> /
        <br>
        <a class="twitter-link" href="#">Renusa</a> /
        <a class="twitter-link" href="#">Kelvin</a> /
        <a class="twitter-link" href="#">Yanuar</a> /
        
    </aside>
</footer>

</div>

<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>
<script type="text/javascript" src="assets/js/newpost.js"></script>
<script type="text/javascript" src="assets/js/deffiehelman.js"></script>
<script type="text/javascript" src="assets/js/bignumber.js"></script>
<script type="text/javascript">
  var ga_ua = '{{! TODO: ADD GOOGLE ANALYTICS UA HERE }}';

  (function(g,h,o,s,t,z){g.GoogleAnalyticsObject=s;g[s]||(g[s]=
      function(){(g[s].q=g[s].q||[]).push(arguments)});g[s].s=+new Date;
      t=h.createElement(o);z=h.getElementsByTagName(o)[0];
      t.src='//www.google-analytics.com/analytics.js';
      z.parentNode.insertBefore(t,z)}(window,document,'script','ga'));
      ga('create',ga_ua);ga('send','pageview');
</script>
<script>
    function validateEmail() {
    var x = document.forms["myForm"]["email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        return false;
    }
}

  function editPost(){

        if (validateDate()){
            var shared_key = deffiehelman();
            document.getElementById('Judul').value = (caesarShift(document.getElementById('Judul').value, shared_key%25));
            document.getElementById('Konten').value = (caesarShift(document.getElementById('Konten').value, shared_key%25));
            return true;
        }else{
            return false;
        }
    }

    function validateDate()
    {
        var inputdate = document.forms["PostForm"]["Tanggal"].value;
        var currentdate = new Date();
        var nowdd = currentdate.getDate();
        var nowmm = currentdate.getMonth()+1;
        var nowyyyy = currentdate.getFullYear();
        var partdate = inputdate.split('-');
        var inputyyyy = partdate[0];
        var inputmm = partdate[1];
        var inputdd = partdate[2];
        if (nowyyyy<inputyyyy)
        {
            return true;
        }        
        else if (nowyyyy>inputyyyy)
        {
            alert("Tanggal tidak valid");
            return false;
        }
        else
        {
            if (nowmm<inputmm)
            {
                return true;
            }
            else if (nowmm>inputmm)
            {
                alert("Tanggal tidak valid");
                return false;
            }
            else
            {
                if (nowdd<=inputdd)
                {
                    return true;
                }
                else  if (nowdd>inputdd)
                {
                    alert("Tanggal tidak valid");
                    return false;
                }
            }
        }
    }  
</script>
</body>
</html>
<?php 
    }else{
        header("Location: login.php"); /* Redirect browser */
        exit();
    }
 ?>