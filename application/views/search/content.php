<body>
	<div class="uk-grid">
		<div class="uk-width-1-1 uk-margin-large-bottom  blue uk-padding uk-text-center">
			<form action="" method="post">
    <fieldset class="uk-fieldset">
			<h1 class=" uk-margin-medium-bottom blue">Tutaj dodasz swój problem</h1>
			        <input id="categoryId" type="hidden" name="categoryId">
            	<input id="categoryInput" onkeyup="showResultForCategory(this.value)" class="uk-input uk-form-small uk-form-width-medium blue no-border" type="text" placeholder="Kategoria" required>
        	    <input id="bookId" type="hidden" name="bookId">
            	<input id="bookInput" onkeyup="showResultForBook(this.value)" class="uk-input uk-form-small uk-form-width-medium blue no-border" type="text" placeholder="Książka" required>
        	       	
            	<input class="uk-input uk-form-small uk-form-width-medium blue no-border" type="text" placeholder="Od strony" name="fromPage" required>
        	      	
            	<input class="uk-input uk-form-small uk-form-width-medium blue no-border" type="text" placeholder="Do strony" name="toPage" required>
				<div class="uk-margin  no-top-margin ">
            		<div class="uk-form-width-medium border-1 livesearch"  style="margin-left: 248px;" id="category">
            		</div>
                <div class="uk-form-width-medium border-1 livesearch" style="margin-left: 452px;" id="book">
                </div>
            	</div>
        <div class="uk-text-center">Jeżeli nie ma tutaj twojej książki/kategorii przejdź <a href="/stuckAboveBook/home/addBook">tutaj</a> by w szybki sposób ją dodać</div>
        	
		</div>

		<div class="uk-width-1-1 uk-text-center uk-margin-small-top uk-padding uk-margin-large-left uk-margin-large-right blue">
			<div class="uk-margin">
            	<textarea name="post" class="uk-textarea no-border" rows="8" placeholder="Tu opisz swój problem" required></textarea>
        	</div>
        	<button class="uk-button uk-button-default  no-border">Wyślij</button>
		</div>

		
</fieldset>
</form>