<div class="uk-text-center uk-width-100">
<ul class="uk-list uk-list-striped">
	<?php
	foreach($problems as $problem)
	{
		echo "<li><a href='/stuckAboveBook/home/problem/".$problem->id."'>".$problem->problem."</a></li>";
	}
	if(empty($problems))
		{
			echo "Niestety, nikt nie mial jeszcze takiego problemu ;(
			<p><a>Kliknij tutaj</a> aby dodac i jak najszybciej dostac odpowiedz :D</p>";
		}
	?>
    
</ul>

<?php
	if(!empty($problems))
	{
		echo "<p>Twoj problem nie znajduje sie na liscie?</p>
		<p><a>Dodaj go</a> by jak najszybciej dostac odpowiedz :D</p>";
	}
?>
</div>