<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Community Auth - Choose Password Form View
 *
 * Community Auth is an open source authentication application for CodeIgniter 3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2018, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */
?>

<?php
$this->load->view('header');
$showform = 1;

if( isset( $validation_errors ) )
{
	echo '
		<div class="uk-alert-danger" uk-alert>
    			<a class="uk-alert-close" uk-close></a>
				The following error occurred while changing your password:
				' . $validation_errors . '
		</div>
	';
}
else
{
	$display_instructions = 1;
}

if( isset( $validation_passed ) )
{
	echo '
		<div class="uk-alert-success" uk-alert>
    			<a class="uk-alert-close" uk-close></a>
			<p>
				You have successfully changed your password.
			</p>
			<p>
				You can now <a href="/stuckAboveBook/examples/login_form">login</a>
			</p>
		</div>
	';

	$showform = 0;
}
if( isset( $recovery_error ) )
{
	echo '
		<div class="uk-alert-danger padding_45 form">
			<p>
				No usable data for account recovery.
			</p>
			<p>
				Account recovery links expire after 
				' . ( (int) config_item('recovery_code_expiration') / ( 60 * 60 ) ) . ' 
				hours.<br />You will need to use the 
				<a href="'.base_url().'examples/recover">Account Recovery</a> form 
				to send yourself a new link.
			</p>
		</div>
	';

	$showform = 0;
}
if( isset( $disabled ) )
{
	echo '
		<div class="form uk-alert-danger padding_45">
			<p>
				Account Recovery is Disabled.
			</p>
			<p>
				If you have exceeded the maximum login attempts, or exceeded
				the allowed number of password recovery attempts, account recovery 
				will be disabled for a short period of time. 
				Please wait ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' 
				minutes, or contact us if you require assistance gaining access to your account.
			</p>
		</div>
	';

	$showform = 0;
}
if( $showform == 1 )
{
	if( isset( $recovery_code, $user_id ) )
	{
		if( isset( $display_instructions ) )
		{
			if( isset( $username ) )
			{
				echo '<div class="form"><p>
					Your login user name is <i>' . $username . '</i><br />
					Please write this down, and change your password now:
				</p>';
			}
			else
			{
				echo '<p>Please change your password now:</p>';
			}
		}

		?>
			<div class="form">
				<?php echo form_open('',['id' => "choose_pass_form"]); ?>
						<legend>Choose your new password</legend>
						<div>

							<?php
								// PASSWORD LABEL AND INPUT ********************************
								echo form_label('','passwd', ['class'=>'form_label']);

								$input_data = [
									'name'       => 'passwd',
									'id'         => 'passwd',
									'class'      => 'form_input password uk-margin-top uk-input',
									'max_length' => config_item('max_chars_for_password'),
									'placeholder'=>	'Password'
								];
								echo form_password($input_data);
							?>

						</div>
						<div>

							<?php
								// CONFIRM PASSWORD LABEL AND INPUT ******************************
								echo form_label('','passwd_confirm', ['class'=>'form_label']);

								$input_data = [
									'name'       => 'passwd_confirm',
									'id'         => 'passwd_confirm',
									'class'      => 'form_input password uk-margin-top uk-input',
									'max_length' => config_item('max_chars_for_password'),
									'placeholder'=>	'Confirm password'
								];
								echo form_password($input_data);
							?>

						</div>
					<div>
						<div>

							<?php
								// RECOVERY CODE *****************************************************************
								echo form_hidden('recovery_code',$recovery_code);

								// USER ID *****************************************************************
								echo form_hidden('user_identification',$user_id);

								// SUBMIT BUTTON **************************************************************
								$input_data = [
									'name'  => 'form_submit',
									'id'    => 'submit_button',
									'value' => 'Change'
								];
								echo form_submit($input_data,'','class="uk-button uk-margin-top blue"');
								echo '<input class=" uk-margin-top uk-button right-in-parent" formaction="<?php echo base_url() ?>" type="submit" name="submit" value="Home" id="submit_button"  />';
							?>

						</div>
					</div>
				</form>
			</div>
		</div>
		<?php
	}
}
?>
<script type="text/javascript">
	var validator = new My_Validator;
	var submitButton = document.getElementById("submit_button");
	var confirmInput = document.getElementById("passwd_confirm");
	var passInput = document.getElementById("passwd");
	var form = document.getElementById("choose_pass_form");
	var formInputs = [confirmInput, passInput];

	passInput.addEventListener("keyup", function() {
    	validator.validate(passInput,submitButton,"password");
    	validator.passConfirm(passInput,confirmInput,submitButton);
	}); 

	submitButton.addEventListener("click",function(event){
		validator.submit(submitButton,formInputs,event);
	});

	confirmInput.addEventListener("keyup", function(){
	validator.passConfirm(passInput,confirmInput,submitButton);
	});
</script>