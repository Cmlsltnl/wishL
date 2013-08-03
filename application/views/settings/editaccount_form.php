<!DOCTYPE html>
<html lang="en">
	<head>
		<title>&#9733; wishL | Update Info</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				$(".message").hide();
			    $(".message").fadeIn();
				$("#delete-button").click(function(){
					var answer = confirm("Are you sure you want to delete your account?");
					if (answer == true) {
						window.location = "<?php echo site_url('/settings/delete_account'); ?>";
					}
				});
			});
		</script>
	</head>

	<body>
		<div id="wrapper">
			<div id="editaccount-form" class="form">
				<h1>Edit Account Settings</h1>
				<hr></br>
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
					    'class'          => 'text-input',
					    'value'       => $this->userinfo->email,
					    'maxlength'   => '20',
					    'size'        => '50',
					);

					echo "<div class=\"text-label\">" . form_label('Email', 'email') . "</div>";
					echo form_input($emailInput);
					echo "</br></br>";

					$passwordInput = array(
					    'name'        => 'password',
					    'class'          => 'text-input',
					    'maxlength'   => '20',
					    'size'        => '50',
					);

					echo "<div class=\"text-label\">" . form_label('New Password', 'password') . "</div>";
					echo form_password($passwordInput);
					echo "</br>";

					$repeatPasswordInput = array(
					    'name'        => 'repeat-password',
					    'class'          => 'text-input',
					    'maxlength'   => '20',
					    'size'        => '50',
					);

					echo "<div class=\"text-label\">" . form_label('Retype New Password', 'repeat-password') . "</div>";
					echo form_password($repeatPasswordInput);
					echo "</br>";

					$currentPasswordInput = array(
					    'name'        => 'current-password',
					    'class'          => 'text-input',
					    'maxlength'   => '20',
					    'size'        => '50',
					);

					echo "<div class=\"text-label\">" . form_label('Current Password', 'current-password') . "</div>";
					echo form_password($currentPasswordInput);
					echo "</br></br>";

					$editButton = array(
					    'name' => 'edit',
					    'class' => 'button blue',
					    'value' => 'Edit Account',
					);

					echo form_submit($editButton);

					$deleteButton = array(
					    'name' => 'delete-button',
					    'class'	=> 'delete-button',
					    'class' => 'button red',
					    'content' => 'Delete Account',
					    'style' => 'float: right;',
					);

					echo form_button($deleteButton);

					echo form_close();			
				?>
			</div>
		</div>
	</body>