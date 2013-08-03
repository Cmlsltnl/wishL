<!DOCTYPE html>
<html lang="en">
	<head>
		<title>&#9733; wishL</title>
	</head>

	<body>
		<div id="wrapper">
			<div id="signup-form" class="form">
				<h1>Sign Up</h1>
				<hr></br>

				<?php
					echo form_open('settings/signupUser');

					$emailInput = array(
					    'name'        => 'email',
					    'class'       => 'text-input',
					    'maxlength'   => '50',
					    'size'        => '50',
					    'required'	  => '',
					);

					echo "<div class=\"text-label\">" . form_label('Email *', 'email') . "</div>";
					echo form_input($emailInput);
					echo "</br>";

					$passwordInput = array(
					    'name'        => 'password',
					    'class'       => 'text-input',
					    'maxlength'   => '20',
					    'size'        => '50',
					    'required'	  => '',
					);

					echo "<div class=\"text-label\">" . form_label('Password *', 'password') . "</div>";
					echo form_password($passwordInput);
					echo "</br>";

					$repeatPasswordInput = array(
					    'name'        => 'repeat-password',
					    'class'       => 'text-input',
					    'maxlength'   => '20',
					    'size'        => '50',
					    'required'	  => '',
					);

					echo "<div class=\"text-label\">" . form_label('Retype Password *', 'repeat-password') . "</div>";
					echo form_password($repeatPasswordInput);
					echo "</br></br><hr></br>";

					$firstnameInput = array(
					    'name'        => 'firstname',
					    'class'       => 'text-input',
					    'maxlength'   => '20',
					    'size'        => '50',
					    'required'	  => '',
					);

					echo "<div class=\"text-label\">" . form_label('First Name *', 'firstname') . "</div>";
					echo form_input($firstnameInput);
					echo "</br>";

					$lastnameInput = array(
					    'name'        => 'lastname',
					    'class'       => 'text-input',
					    'maxlength'   => '20',
					    'size'        => '50',
					    'required'	  => '',
					);

					echo "<div class=\"text-label\">" . form_label('Last Name *', 'lastname') . "</div>";
					echo form_input($lastnameInput);
					echo "</br>";

					$locationInput = array(
					    'name'        => 'location',
					    'class'       => 'text-input',
					    'maxlength'   => '40',
					    'size'        => '50',
					);

					echo "<div class=\"text-label\">" . form_label('Location', 'location') . "</div>";
					echo form_input($locationInput);
					echo "</br>";

					$descriptionInput = array(
					    'name'        => 'description',
					    'class'       => 'text-input',
					    'maxlength'   => '250',
					    'size'        => '50',
					);

					echo "<div class=\"text-label\">" . form_label('Description', 'description') . "</div>";
					echo form_textarea($descriptionInput);
					echo "</br>";

					$imageInput = array(
					    'name'        => 'image',
					    'class'       => 'text-input',
					);

					echo "<div class=\"text-label\">" . form_label('Profile picture', 'image') . "</div>";
					echo form_upload($imageInput);
					echo "</br></br>";

					$signupButton = array(
					    'name' => 'update',
					    'class' => 'button green',
					    'value' => 'Sign Up',
					);

					echo form_submit($signupButton);
					echo form_close();			
				?>
			</div> <!-- end of signup-form-->
		</div> <!-- end of wrapper -->
	</body>
</html>