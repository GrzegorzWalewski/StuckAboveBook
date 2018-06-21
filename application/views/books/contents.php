<body class="height-100">
	<div class="uk-grid">

		<div class="uk-width-1-1 middle-panel blue uk-grid">
			<h1 class="uk-text-center uk-width-1-1 padding-left-40 blue uk-padding-large">Książki</h1>
				<?php $i=0; foreach($books as $book):?>
                <a class="uk-width-1-2 white_bg uk-margin-medium" href="/stuckAboveBook/home/searchProblem?book=<?php echo $book->id ?>"><?php echo $book->name ?></a>
                <?php endforeach; ?>