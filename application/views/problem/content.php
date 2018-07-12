<body>
	<div class="uk-grid">
		<div class="uk-width-1-1 uk-margin-large-bottom uk-margin-large-left uk-margin-large-right  blue uk-padding uk-text-left">
      <div class="uk-card-header ">
          <h1 class="uk-margin-remove-bottom"><?php echo $problem->name ?></h1>
          <p class="ul-text-meta uk-margin-remove-top"><?php echo $problem->username ?></p>
        </div>
        <div class="uk-card-body">
          <p><?php echo $problem->problem?></p>
        </div>
          
		</div>

		<div class="uk-width-1-1 uk-text-center uk-margin-small-top uk-padding uk-margin-large-left uk-margin-large-right blue">
			<?php
      foreach($answers as $answer)
      {
        echo $answer->answer;
      }
      if(empty($answers))
      {
        echo "Jeszcze nikt nie zna odpowiedzi</br> ";
      }
      echo "<a>Dodaj Swoja odpowiedz</a>";
      ?>
		</div>