<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Community Auth - Login Form View
 *
 * Community Auth is an open source authentication application for CodeIgniter 3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2018, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */
	echo '<div class="form">';
	echo form_open('examples/create_user',["id" => 'create_form']); 
?>

	<div>
		<div class="uk-margin">
			<label for="login_string" class="form_label">Username</label>
			<br>
        	<div class="uk-inline">
        	<a class="uk-form-icon" href="#" uk-icon="icon: user"></a>
			<input type="text" name="username" id="username" class="uk-input" autocomplete="off" maxlength="255" />
		</div>
	</div>
	<div>
		<div class="uk-margin">
			<label for="login_string" class="form_label">E-mail</label>
			<br>
        	<div class="uk-inline">
        	<a class="uk-form-icon" href="#" uk-icon="icon: mail"></a>
			<input type="text" name="email" id="email" class="uk-input" autocomplete="off" maxlength="255" />
		</div>
	</div>
</div>

<div>
		<input type="hidden" id="send" name="send" value="TRUE"/>
		<div class="uk-margin">
		<label for="login_pass" class="form_label">Password</label>
		<br>
        <div class="uk-inline">
		<a class="uk-form-icon " href="#" uk-icon="icon: lock"></a>
		<input type="password" name="passwd" id="passwd" class="uk-input password" <?php 
			if( config_item('max_chars_for_password') > 0 )
				echo 'maxlength="' . config_item('max_chars_for_password') . '"'; 
		?> autocomplete="off" readonly="readonly" onfocus="this.removeAttribute('readonly');" />
		</div>
	</div>
</div>
		<input class="uk-button blue" type="submit" name="submit" value="Register" id="submit_button"  />
		<input class="uk-button right-in-parent" formaction="<?php echo base_url() ?>" type="submit" name="submit" value="Home" id="submit_button"  />
	</div>
</form>
</div>
<script type="text/javascript">
	var validator = new My_Validator;
	var submitButton = document.getElementById("submit_button");
	var loginInput = document.getElementById("username");
	var passInput = document.getElementById("passwd");
	var mailInput = document.getElementById("email");
	var form = document.getElementById("create_form");
	var formInputs = [loginInput, passInput, mailInput];

	loginInput.addEventListener("keyup", function() {
    	validator.validate(loginInput,submitButton,"username");
}); 

	passInput.addEventListener("keyup", function() {
    	validator.validate(passInput,submitButton,"password");
}); 
		mailInput.addEventListener("keyup", function() {
    	validator.validate(mailInput,submitButton,"mail");
}); 

	submitButton.addEventListener("click",function(event){
		validator.submit(submitButton,formInputs,event);
	});
</script>