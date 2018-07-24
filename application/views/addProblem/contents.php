<body>
	<div class="uk-grid">
		<div class="uk-width-1-1 uk-margin-large-bottom  blue uk-padding uk-text-center">
			<form id="addProblemForm" action="" method="post">
    <fieldset class="uk-fieldset">
			<h1 class=" uk-margin-medium-bottom blue">Tutaj dodasz swój problem</h1>
              <p id="categoryBookReminder">Pamietaj, kategorie i ksiazke musisz wybrac z listy ;)</p>
			        <input id="categoryId" type="hidden" name="categoryId" >
            	<input id="categoryInput" autocomplete="off" onkeyup="showResultForCategory(this.value)" class="uk-input uk-form-small uk-form-width-medium blue no-border" type="text" placeholder="Kategoria" >
        	    <input id="bookId" type="hidden" name="bookId" >
            	<input id="bookInput" autocomplete="off" onkeyup="showResultForBook(this.value)" class="uk-input uk-form-small uk-form-width-medium blue no-border" type="text" placeholder="Książka" >
        	       	
            	<input autocomplete="off" id="fromPage" class="uk-input uk-form-small uk-form-width-medium blue no-border" type="text" placeholder="Od strony" name="fromPage" >
        	      	
            	<input autocomplete="off" id="toPage" class="uk-input uk-form-small uk-form-width-medium blue no-border" type="text" placeholder="Do strony" name="toPage" >
				<div class="uk-margin  no-top-margin ">
            		<div class="uk-form-width-medium border-1 livesearch" id="category">
            		</div>
                <div class="uk-form-width-medium border-1 livesearch" id="book">
                </div>
            	</div>
        <div class="uk-text-center uk-padding">Jeżeli nie ma tutaj twojej książki/kategorii przejdź <a href="/stuckAboveBook/home/addBook">tutaj</a> by w szybki sposób ją dodać</div>
        	
		</div>

		<div class="uk-width-1-1 uk-text-center uk-margin-small-top uk-padding padding-small-right uk-margin-large-left@m uk-margin-large-right@m uk-margin-small-left blue">
      <div class="uk-margin">
        <input autocomplete="off" class="uk-input uk-form-medium uk-form-width-large@m  blue no-border" type="text" placeholder="Tytul" id="title" name="name" >
      </div>
			<div class="uk-margin">
            	<textarea id="text" autocomplete="off" name="post" class="uk-textarea no-border" rows="8" placeholder="Tu opisz swój problem" ></textarea>
        	</div>
        	<button id="submit_button" class="uk-button uk-button-default  no-border" onclick="hiddenValidate(event)">Wyślij</button>
		</div>

		
</fieldset>
</form>

<script>

  var validator = new My_Validator;
  var submitButton = document.getElementById("submit_button");
  var fromPage = document.getElementById("fromPage");
  var toPage = document.getElementById("toPage");
  var text = document.getElementById("text");
  var title = document.getElementById("title");
  var form = document.getElementById("addProblemForm");
  var formInputs = [fromPage, toPage, title, text];

  fromPage.addEventListener("keyup", function() {
      validator.validate(fromPage,submitButton,"number");
}); 

  toPage.addEventListener("keyup", function() {
      validator.validate(toPage,submitButton,"number");
});   
  text.addEventListener("keyup", function() {
      validator.validate(text,submitButton,"text");
});   
  title.addEventListener("keyup", function() {
      validator.validate(title,submitButton,"title");
}); 

  submitButton.addEventListener("click",function(event){
    validator.submit(submitButton,formInputs,event);
  });

function hiddenValidate(event)
{
  var validator = new My_Validator;
  var category = document.getElementById('categoryId');
  var book = document.getElementById('bookId');
  validator.hiddenValidate(event,category,book);
}
function showResultForCategory(str) {
  var positionLeft=document.getElementById("categoryInput").offsetLeft;
  var positionTop=document.getElementById("categoryInput").offsetTop;
  document.getElementById("category").style.left=positionLeft+"px";
  document.getElementById("category").style.top=positionTop+30+"px";
  if (str.length==0) {
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
  var positionLeft=document.getElementById("bookInput").offsetLeft;
  var positionTop=document.getElementById("bookInput").offsetTop;
  document.getElementById("book").style.left=positionLeft+"px";
  document.getElementById("book").style.top=positionTop+30+"px";
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