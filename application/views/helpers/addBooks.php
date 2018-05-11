<p id="title"></p>
<p id="author"></p>
<p id="pages"></p>
<p id="category"></p>
<script>
  window.onload = function ()
  {
    var x=document.getElementById("left-big-col").children[0];
    var title=x.children[0].children[0].children[0].innerText;

    var y=x.children[0].children[1].children[0].children[1];
    var author="";
    for(var i=0;i<y.children.length;i++)
    {
      author+=y.children[i].innerText+" ";
    }

    var pages= x.children[2].children[5].innerText;

    var category=document.getElementById("content").children[0].children[4].children[0].children[0].children[1].innerText;
    category=category.replace("» ","");
    document.getElementsByTagName("body")[0].innerHTML="<p id='title'></p><p id='author'></p><p id='pages'></p><p id='category'></p>";
    document.getElementById("title").innerText=title;
    document.getElementById("author").innerText=author;
    document.getElementById("pages").innerText=pages;
    document.getElementById("category").innerText=category;
    uploadBookData(title,author,pages,category);

  }
  function uploadBookData(title,author,pages,category) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("category").innerHTML=this.responseText;
    }
  }
  var str = title+"/"+author+"/"+pages+"/"+category;
  var replaced = str.split(' ').join('_');
  xmlhttp.open("GET","/stuckAboveBook/home/addBooks/"+replaced,true);
  xmlhttp.send();
  first();
}
function first(){
  // Simulate a code delay
  setTimeout( function(){
    window.location.href = "/stuckAboveBook/home/addBook";
  }, 1000 );
}
</script>
<?php
print file_get_contents_utf8($q);
function file_get_contents_utf8($fn) {
    $content = file_get_contents($fn);
    return mb_convert_encoding($content, 'UTF-8',
        mb_detect_encoding($content, 'UTF-8, ISO-8859-2', true));
}
?>
