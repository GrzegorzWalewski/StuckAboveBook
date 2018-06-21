<body class="height-100">
	<div class="uk-grid">

		<div class="uk-width-1-1 middle-panel blue uk-grid">
			<h1 class="uk-text-center uk-width-1-1 padding-left-40 blue uk-padding-large">Kategorie</h1>
			<div class="uk-grid center-elements">
			<div class="white uk-margin-small-bottom uk-margin-small-right uk-width-1-4 uk-card uk-card-default uk-card-body">
			<ul>
				<?php $i=0; foreach($categorylist as $category):?>

				<li><?php
				$i++;
				echo "<a href='/stuckAboveBook/home/categories/".$category->id."'>".$category->name."</a>"?>
				</li>
				<?php
					echo $i%10==0 ? "</ul></div><div class=\"white uk-margin-small-bottom uk-margin-small-right uk-width-1-4 uk-card uk-card-default uk-card-body\"><ul >" : "";
				?>
				<?php endforeach;
				if($i%10>0)
				{
					echo "</ul></div>";
					}
				 ?>
				</div>
	</div>