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
        echo "
        <div class='answer no-left-margin uk-grid uk-text-left'>
          <div class='uk-padding uk-width-4-5'>
            <p class=''>".$answer->answer."</p>
          </div>
          <div class='uk-text-right uk-padding uk-width-1-5'>
            <a ";
            if(isset($auth_level)&&$auth_level>=1){
              echo "onclick='rate(".$auth_user_id.",".$answer->id.",\"up\")'";
            }
            else
            {
              echo "onclick='alert(\"Musisz byc zalogowany zeby ocaniac\")'";
            }
            echo " class=\"rate_button fas fa-angle-double-up fa-4x\" id='plus_".$answer->id."'></a>
            <p id='rate".$answer->id."' class='uk-text-top uk-margin-top uk-margin-right '>".$answer->rate."</p>
            <a ";
            if(isset($auth_level)&&$auth_level>=1){
              echo "onclick='rate(".$auth_user_id.",".$answer->id.",\"down\")'";
            }
            else
            {
              echo "onclick='alert(\"Musisz byc zalogowany zeby ocaniac\")'";
            }
            echo " class=\"rate_button fas fa-angle-double-down fa-4x\" id='minus_".$answer->id."''></a>
          </div>
        </div>";
      }
      echo "<div class='answer uk-padding no-left-margin uk-margin-medium-top uk-text-center'>";
      if(empty($answers))
      {
        echo "<p>Jeszcze nikt nie zna odpowiedzi</p></br> ";
      }
      echo "<a>Dodaj Swoja odpowiedz</a></div>";
      ?>
		</div>
    <script type="text/javascript">
      function rate(userid,id,rate)
      {
        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
        } else {  // code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("rate"+id).innerHTML=this.responseText;
        }
  }
  xmlhttp.open("GET","/stuckAboveBook/ajax/rate/"+userid+"/"+id+"/"+rate,true);
  xmlhttp.send();
      }
    </script>