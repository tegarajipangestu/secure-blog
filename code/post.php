<!DOCTYPE html>
<?php 
    include 'mainviewer.php';
    $con = phpsqlconnection();
    $postid = $_GET['postid'];
    $getpostresult = getspecificpost($con,$postid);
    $row = mysqli_fetch_array($getpostresult);
    $getcommentsresult = getspecificcomments($con,$postid);
 ?>
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
    <script src=""data:application/octet-stream;base64,LyoKIEhUTUw1IFNoaXYgdjMuNy4wIHwgQGFmYXJrYXMgQGpkYWx0b24gQGpvbl9uZWFsIEByZW0gfCBNSVQvR1BMMiBMaWNlbnNlZAoqLwooZnVuY3Rpb24obCxmKXtmdW5jdGlvbiBtKCl7dmFyIGE9ZS5lbGVtZW50cztyZXR1cm4ic3RyaW5nIj09dHlwZW9mIGE/YS5zcGxpdCgiICIpOmF9ZnVuY3Rpb24gaShhKXt2YXIgYj1uW2Fbb11dO2J8fChiPXt9LGgrKyxhW29dPWgsbltoXT1iKTtyZXR1cm4gYn1mdW5jdGlvbiBwKGEsYixjKXtifHwoYj1mKTtpZihnKXJldHVybiBiLmNyZWF0ZUVsZW1lbnQoYSk7Y3x8KGM9aShiKSk7Yj1jLmNhY2hlW2FdP2MuY2FjaGVbYV0uY2xvbmVOb2RlKCk6ci50ZXN0KGEpPyhjLmNhY2hlW2FdPWMuY3JlYXRlRWxlbShhKSkuY2xvbmVOb2RlKCk6Yy5jcmVhdGVFbGVtKGEpO3JldHVybiBiLmNhbkhhdmVDaGlsZHJlbiYmIXMudGVzdChhKT9jLmZyYWcuYXBwZW5kQ2hpbGQoYik6Yn1mdW5jdGlvbiB0KGEsYil7aWYoIWIuY2FjaGUpYi5jYWNoZT17fSxiLmNyZWF0ZUVsZW09YS5jcmVhdGVFbGVtZW50LGIuY3JlYXRlRnJhZz1hLmNyZWF0ZURvY3VtZW50RnJhZ21lbnQsYi5mcmFnPWIuY3JlYXRlRnJhZygpOwphLmNyZWF0ZUVsZW1lbnQ9ZnVuY3Rpb24oYyl7cmV0dXJuIWUuc2hpdk1ldGhvZHM/Yi5jcmVhdGVFbGVtKGMpOnAoYyxhLGIpfTthLmNyZWF0ZURvY3VtZW50RnJhZ21lbnQ9RnVuY3Rpb24oImgsZiIsInJldHVybiBmdW5jdGlvbigpe3ZhciBuPWYuY2xvbmVOb2RlKCksYz1uLmNyZWF0ZUVsZW1lbnQ7aC5zaGl2TWV0aG9kcyYmKCIrbSgpLmpvaW4oKS5yZXBsYWNlKC9bXHdcLV0rL2csZnVuY3Rpb24oYSl7Yi5jcmVhdGVFbGVtKGEpO2IuZnJhZy5jcmVhdGVFbGVtZW50KGEpO3JldHVybidjKCInK2ErJyIpJ30pKyIpO3JldHVybiBufSIpKGUsYi5mcmFnKX1mdW5jdGlvbiBxKGEpe2F8fChhPWYpO3ZhciBiPWkoYSk7aWYoZS5zaGl2Q1NTJiYhaiYmIWIuaGFzQ1NTKXt2YXIgYyxkPWE7Yz1kLmNyZWF0ZUVsZW1lbnQoInAiKTtkPWQuZ2V0RWxlbWVudHNCeVRhZ05hbWUoImhlYWQiKVswXXx8ZC5kb2N1bWVudEVsZW1lbnQ7Yy5pbm5lckhUTUw9Ing8c3R5bGU+YXJ0aWNsZSxhc2lkZSxkaWFsb2csZmlnY2FwdGlvbixmaWd1cmUsZm9vdGVyLGhlYWRlcixoZ3JvdXAsbWFpbixuYXYsc2VjdGlvbntkaXNwbGF5OmJsb2NrfW1hcmt7YmFja2dyb3VuZDojRkYwO2NvbG9yOiMwMDB9dGVtcGxhdGV7ZGlzcGxheTpub25lfTwvc3R5bGU+IjsKYz1kLmluc2VydEJlZm9yZShjLmxhc3RDaGlsZCxkLmZpcnN0Q2hpbGQpO2IuaGFzQ1NTPSEhY31nfHx0KGEsYik7cmV0dXJuIGF9dmFyIGs9bC5odG1sNXx8e30scz0vXjx8Xig/OmJ1dHRvbnxtYXB8c2VsZWN0fHRleHRhcmVhfG9iamVjdHxpZnJhbWV8b3B0aW9ufG9wdGdyb3VwKSQvaSxyPS9eKD86YXxifGNvZGV8ZGl2fGZpZWxkc2V0fGgxfGgyfGgzfGg0fGg1fGg2fGl8bGFiZWx8bGl8b2x8cHxxfHNwYW58c3Ryb25nfHN0eWxlfHRhYmxlfHRib2R5fHRkfHRofHRyfHVsKSQvaSxqLG89Il9odG1sNXNoaXYiLGg9MCxuPXt9LGc7KGZ1bmN0aW9uKCl7dHJ5e3ZhciBhPWYuY3JlYXRlRWxlbWVudCgiYSIpO2EuaW5uZXJIVE1MPSI8eHl6PjwveHl6PiI7aj0iaGlkZGVuImluIGE7dmFyIGI7aWYoIShiPTE9PWEuY2hpbGROb2Rlcy5sZW5ndGgpKXtmLmNyZWF0ZUVsZW1lbnQoImEiKTt2YXIgYz1mLmNyZWF0ZURvY3VtZW50RnJhZ21lbnQoKTtiPSJ1bmRlZmluZWQiPT10eXBlb2YgYy5jbG9uZU5vZGV8fAoidW5kZWZpbmVkIj09dHlwZW9mIGMuY3JlYXRlRG9jdW1lbnRGcmFnbWVudHx8InVuZGVmaW5lZCI9PXR5cGVvZiBjLmNyZWF0ZUVsZW1lbnR9Zz1ifWNhdGNoKGQpe2c9aj0hMH19KSgpO3ZhciBlPXtlbGVtZW50czprLmVsZW1lbnRzfHwiYWJiciBhcnRpY2xlIGFzaWRlIGF1ZGlvIGJkaSBjYW52YXMgZGF0YSBkYXRhbGlzdCBkZXRhaWxzIGRpYWxvZyBmaWdjYXB0aW9uIGZpZ3VyZSBmb290ZXIgaGVhZGVyIGhncm91cCBtYWluIG1hcmsgbWV0ZXIgbmF2IG91dHB1dCBwcm9ncmVzcyBzZWN0aW9uIHN1bW1hcnkgdGVtcGxhdGUgdGltZSB2aWRlbyIsdmVyc2lvbjoiMy43LjAiLHNoaXZDU1M6ITEhPT1rLnNoaXZDU1Msc3VwcG9ydHNVbmtub3duRWxlbWVudHM6ZyxzaGl2TWV0aG9kczohMSE9PWsuc2hpdk1ldGhvZHMsdHlwZToiZGVmYXVsdCIsc2hpdkRvY3VtZW50OnEsY3JlYXRlRWxlbWVudDpwLGNyZWF0ZURvY3VtZW50RnJhZ21lbnQ6ZnVuY3Rpb24oYSxiKXthfHwoYT1mKTsKaWYoZylyZXR1cm4gYS5jcmVhdGVEb2N1bWVudEZyYWdtZW50KCk7Zm9yKHZhciBiPWJ8fGkoYSksYz1iLmZyYWcuY2xvbmVOb2RlKCksZD0wLGU9bSgpLGg9ZS5sZW5ndGg7ZDxoO2QrKyljLmNyZWF0ZUVsZW1lbnQoZVtkXSk7cmV0dXJuIGN9fTtsLmh0bWw1PWU7cShmKX0pKHRoaXMsZG9jdW1lbnQpOwo="></script>
<![endif]-->

<?php 
    echo 
        "<title>Simple Blog | ".$row['Title']."</title>";
 ?>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <?php 
              $time = strtotime($row['Date']);
              $time = date('j F Y',$time);
              echo "<time class=\"art-time\">".$time."</time>";
             ?>
             <?php 
              echo "<h2 class=\"art-title\">".$row['Title']."</h2>";
              ?>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <?php 
                echo "<p>".$row['Contents']."</p>";
             ?>
            <hr />
            
            <h2>Komentar</h2>

            <div id="contact-area">
                <?php 
                    echo 
                    "<form name=\"AddComment\" method=\"post\"  onSubmit=\"return validateEmail() && showcomments(".$postid.",Nama.value,Email.value,Komentar.value)\">";
                 ?> 
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="submit" name="submit" value="Kirim" class="submit-button">
                </form>
            </div>
            <ul class="art-list-body" id ="comments">
                        <?php 
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
            </ul>
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
<script>
  var ga_ua = '{{! TODO: ADD GOOGLE ANALYTICS UA HERE }}';

  (function(g,h,o,s,t,z){g.GoogleAnalyticsObject=s;g[s]||(g[s]=
      function(){(g[s].q=g[s].q||[]).push(arguments)});g[s].s=+new Date;
      t=h.createElement(o);z=h.getElementsByTagName(o)[0];
      t.src='//www.google-analytics.com/analytics.js';
      z.parentNode.insertBefore(t,z)}(window,document,'script','ga'));
      ga('create',ga_ua);ga('send','pageview');
</script>
<script>
function showcomments(postid, title, email, contents) 
{
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() 
  {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) 
    {
      document.getElementById ("comments").innerHTML=xmlhttp.responseText;
      document.forms.value = "";
    }
  }
  xmlhttp.open("GET","getcomments.php?postid="+postid+"&title="+title+"&email="+email+"&contents="+contents,true);
  xmlhttp.send();
  return false;
}
</script>
<script>
  function validateEmail() {
    var x = document.forms["AddComment"]["Email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Email tidak valid");
        return false;
    }
    else
    {
      return true;      
    }
}
</script>
</body>
</html>