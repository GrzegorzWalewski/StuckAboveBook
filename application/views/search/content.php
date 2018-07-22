<body>
	<div class="uk-grid">
		<div class="uk-width-1-1 uk-margin-large-bottom  blue uk-padding uk-text-center">
			<form action="" method="post">
    <fieldset class="uk-fieldset">
			<h1 class=" uk-margin-medium-bottom blue">Wyszukaj problemu</h1>
			        <input id="categoryId" type="hidden" name="categoryId">
                    <input id="categoryInput" onkeyup="showResultForCategory(this.value)" class="uk-input uk-form-small uk-form-width-medium blue no-border" autocomplete="off" type="text" placeholder="Kategoria" required>
        	        <input id="bookId" type="hidden" name="bookId">
            	    <input id="bookInput" autocomplete="off" onkeyup="showResultForBook(this.value)" class="uk-input uk-form-small uk-form-width-medium blue no-border" type="text" placeholder="Książka" required>
        	       	 
            	<input class="uk-input  uk-form-small uk-form-width-medium blue no-border" autocomplete="off" type="text" placeholder="Od strony" name="fromPage" required>
        	      	
            	<input class="uk-input  uk-form-small uk-form-width-medium blue no-border" autocomplete="off" type="text" placeholder="Do strony" name="toPage" required>
				<div class="uk-margin  no-top-margin ">
            		<div class="uk-form-width-medium border-1 livesearch" id="category">
            		</div>
                <div class="uk-form-width-medium border-1 livesearch" id="book">
                </div>
            	</div>
                <button class="uk-button uk-button-default  no-border">Szukaj</button>
		</div>

		
</fieldset>
<script>
function showResultForCategory(str) {
  if (str.length==0) {
    var positionLeft=document.getElementById("categoryInput").offsetLeft;
    var positionTop=document.getElementById("categoryInput").offsetTop;
    document.getElementById("category").style.left=positionLeft+"px";
    document.getElementById("category").style.top=positionTop+30+"px";
    document.getElementById("category").innerHTML="";
    document.getElementById("category").style.border="0px";
    return;
  }
  str=str.split(' ').join('_');
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
  xmlhttp.open("GET","/stuckAboveBook/ajax/loadCategories/"+str,true);
  xmlhttp.send();
}

function showResultForBook(str) {
  var categoryId=document.getElementById("categoryId").value;
  if (str.length==0) {
    document.getElementById("book").innerHTML="";
    document.getElementById("book").style.border="0px";
    return;
  }
    str=str.split(' ').join('_');
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("book").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","/stuckAboveBook/ajax/loadBooks/"+categoryId+"/"+str,true);
  xmlhttp.send();
}

function chooseCategory(x)
{
    y= document.getElementById('categoryInput');
  z= document.getElementById('categoryId');
  z.value=x.value;
    y.value=x.innerHTML;
  x.parentElement.innerHTML="";
}

function chooseBook(x)
{
  y= document.getElementById('bookInput');
  z= document.getElementById('bookId');
  z.value=x.value;
  y.value=x.innerHTML;
  x.parentElement.innerHTML="";
}
</script>
</form>