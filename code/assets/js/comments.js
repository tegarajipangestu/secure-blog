function showcomments(postid, title, time, contents) 
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
      document.getElementByClassName ("art-list-body").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","getcomments.php?postid="+postid+"&title="+title+"&time="+time+"&contents="+contents,false);
  xmlhttp.send();
}