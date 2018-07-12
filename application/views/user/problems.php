<?php
if(empty($problems))
{
	echo "<p>Nie dodales jeszcze zadnego problemu</p>";
}
else
{
	echo "<ul class=' uk-text-center uk-list uk-list-striped'>";
	foreach($problems as $problem)
	{
		echo "<li>".$problem->problem."</li>";
	}
	echo "</ul>";
}

?>