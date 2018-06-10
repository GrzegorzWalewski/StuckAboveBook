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
if( ! isset( $on_hold_message ) )
{
	if( isset( $login_error_mesg ) )
	{
		echo '
			<div class="uk-alert-danger" uk-alert>
    			<a class="uk-alert-close" uk-close></a>
    			<p>
					Invalid Username, Email Address, or Password.
				</p>
			</div>
		';
	}

	if( $this->input->get(AUTH_LOGOUT_PARAM) )
	{
		echo '
			<div style="border:1px solid green">
				<p>
					You have successfully logged out.
				</p>
			</div>
		';
	}
	echo '<div class="form">';
	echo form_open( $login_url, ['class' => 'std-form','id' => 'login_form'] ); 
?>

	<div>
		<div class="uk-margin">
			<label for="login_string" class="form_label">Username or Email</label>
			<br>
        	<div class="uk-inline">
        	<a class="uk-form-icon" href="#" uk-icon="icon: user"></a>
			<input type="text" name="login_string" id="login_string" class="uk-input" autocomplete="off" maxlength="255" />
		</div>
	</div>
</div>

		<br />
<div>
		<div class="uk-margin">
		<label for="login_pass" class="form_label">Password</label>
		<br>
        <div class="uk-inline">
		<a class="uk-form-icon uk-form-icon-flip" href="#" uk-icon="icon: lock"></a>
		<input type="password" name="login_pass" id="login_pass" class="uk-input password" <?php 
			if( config_item('max_chars_for_password') > 0 )
				echo 'maxlength="' . config_item('max_chars_for_password') . '"'; 
		?> autocomplete="off" readonly="readonly" onfocus="this.removeAttribute('readonly');" />
		</div>
	</div>
</div>

		<?php
			if( config_item('allow_remember_me') )
			{
		?>

			<br />

			<label for="remember_me" class="form_label">Remember Me</label>
			<input type="checkbox" id="remember_me" name="remember_me" value="yes" />

		<?php
			}
		?>

		<p class="no-bottom-margin">
			<?php
				$link_protocol = USE_SSL ? 'https' : NULL;
			?>
			<a href="<?php echo site_url('examples/recover', $link_protocol); ?>">
				Can't access your account?
			</a>
		</p>
		<p class="no-top-margin">
			<a href="<?php echo site_url('examples/create_account_form', $link_protocol); ?>">
				Don't have account yet?
			</a>
		</p>


		<input class="uk-button blue" type="submit" name="submit" value="Login" id="submit_button"  />
		<input class="uk-button right-in-parent" formaction="<?php echo base_url() ?>" type="submit" name="submit" value="Home" />

	</div>
</form>
</div>
<?php

	}
	else
	{
		// EXCESSIVE LOGIN ATTEMPTS ERROR MESSAGE
		echo '
			<div class="form uk-alert-danger padding_45 ">
				<p>
					Excessive Login Attempts
				</p>
				<p>
					You have exceeded the maximum number of failed login<br />
					attempts that this website will allow.
				<p>
				<p>
					Your access to login and account recovery has been blocked for ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutes.
				</p>
				<p>
					Please use the <a href="examples/recover">Account Recovery</a> after ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutes has passed,<br />
					or contact us if you require assistance gaining access to your account.
				</p>
			</div>
		';
	}
?>
<script type="text/javascript">
	var validator = new My_Validator;
	var submitButton = document.getElementById("submit_button");
	var loginInput = document.getElementById("login_string");
	var passInput = document.getElementById("login_pass");
	var form = document.getElementById("login_form");

	loginInput.addEventListener("keyup", function() {
    	validator.validate(loginInput,submitButton,"username");
}); 

	passInput.addEventListener("keyup", function() {
    	validator.validate(passInput,submitButton,"password");
}); 
	var formInputs = [loginInput, passInput];
	submitButton.addEventListener("click",function(event){
		validator.submit(submitButton,formInputs,event);
	});
</script>