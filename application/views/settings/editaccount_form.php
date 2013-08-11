<!DOCTYPE html>
<html lang="en">
	<head>
		<title>&#9733; wishL | Update Info</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				$(".message").hide();
			    $(".message").fadeIn();
				$("#delete-account").click(function(){
					var answer = confirm("Are you sure you want to delete your account?");
					if (answer == true) {
						window.location = "<?php echo site_url('/settings/delete_account'); ?>";
					}
				});
			});
		</script>
	</head>

	<body>
		<div id="wrapper" style="padding-top: 58px;">
			<div class="form-wrapper" style="width: 500px;">
				<div class="form-header">
					<h1>Edit Account Settings</h1>
				</div>

				<div class="form-contents">
					<div class="message">
						<?php
							if ($this->message == 'success') {
								echo "<div class=\"success-msg\">Info successfully updated.</div></br>";
							} else if ($this->message == 'failure') {
								echo "<div class=\"error-msg\">Info unable to be updated.</div></br>";
							}
						?>
					</div>

					<?php
						/* Update Info Form */
						echo form_open('settings/editAccount');

						$emailInput = array(
						    'name'        => 'firstname',
						    'class'       => 'text-input',
						    'value'       => $this->userinfo->email,
						    'maxlength'   => '20',
						    'size'        => '50',
						);

						echo form_label('Email', 'email', array('class' => 'form-label'));
						echo form_input($emailInput) . "</br></br>";

						$passwordInput = array(
						    'name'        => 'password',
						    'class'       => 'text-input',
						    'maxlength'   => '20',
						    'size'        => '50',
						);

						echo form_label('New Password', 'password', array('class' => 'form-label'));
						echo form_password($passwordInput) . "</br>";

						$repeatPasswordInput = array(
						    'name'        => 'repeat-password',
						    'class'       => 'text-input',
						    'maxlength'   => '20',
						    'size'        => '50',
						);

						echo form_label('Retype New Password', 'repeat-password', array('class' => 'form-label'));
						echo form_password($repeatPasswordInput) . "</br>";

						$currentPasswordInput = array(
						    'name'        => 'current-password',
						    'class'       => 'text-input',
						    'maxlength'   => '20',
						    'size'        => '50',
						);

						echo form_label('Current Password', 'current-password', array('class' => 'form-label'));
						echo form_password($currentPasswordInput) . "</br></br>";

						$editButton = array(
						    'name' => 'edit',
						    'class' => 'button blue pull-right',
						    'value' => 'Edit Account',
						);

						$deleteButton = array(
						    'id' => 'delete-account',
						    'class' => 'delete-account button red',
						    'content' => 'Delete Account',
						);

						echo form_submit($editButton);
						echo form_button($deleteButton);
						echo form_close();			
					?>
				</div>
			</div> <!-- end of form-wrapper -->
		</div> <!-- end of wrapper -->
	</body>