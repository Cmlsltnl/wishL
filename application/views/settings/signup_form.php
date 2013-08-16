<!DOCTYPE html>
<html lang="en">
	<head>
		<title>&#9733; wishL</title>
	</head>

	<body>
		<div id="wrapper" style="margin: auto; padding: 100px 0; width: 500px;">
			<div class="form-wrapper" style="z-index: 0;">
				<div class="form-header">
					<h1>
						Sign Up
					</h1>
				</div>

				<div class="form-contents">
					<?php
						echo form_open('settings/signupUser');

						echo "<h4>Account Info</h4>";

						$emailInput = array(
							'name'        => 'email',
							'class'       => 'text-input',
							'maxlength'   => '50',
							'placeholder'	=> '(ex) newuser@website.com',
							'required'	  => '',
						);

						echo form_label('Email *', 'email', array('class' => 'form-label'));
						echo form_input($emailInput) . "</br>";

						$usernameInput = array(
							'name'        => 'username',
							'class'       => 'text-input',
							'maxlength'   => '50',
							'placeholder'	=> '(ex) newuser81',
							'required'	  => '',
						);

						echo form_label('Username *', 'username', array('class' => 'form-label'));
						echo form_input($usernameInput) . "</br>";

						$passwordInput = array(
							'name'        => 'password',
							'class'       => 'text-input',
							'maxlength'   => '20',
							'placeholder'	=> '********',
							'required'	  => '',
						);

						echo form_label('Password *', 'password', array('class' => 'form-label'));
						echo form_password($passwordInput) . "</br>";

						$repeatPasswordInput = array(
								'name'        => 'repeat-password',
								'class'       => 'text-input',
								'maxlength'   => '20',
								'placeholder'	=> '********',
								'required'	  => '',
						);

						echo form_label('Retype Password *', 'repeat-password', array('class' => 'form-label'));
						echo form_password($repeatPasswordInput) . "</br></br>";

						echo "<div class='form-break'></div>";
						echo "<h4>Personal Info</h4>";

						$firstnameInput = array(
								'name'        => 'firstname',
								'class'       => 'text-input pull-left',
								'maxlength'   => '20',
								'placeholder'	=> 'First Name',
								'required'	  => '',
								'style'				=> 'width: 45%; clear: left; margin-right: 11px;',
						);

						echo form_label('Full Name *', 'firstname', array('class' => 'form-label pull-left'));
						echo form_input($firstnameInput) . "</br>";

						$lastnameInput = array(
								'name'        => 'lastname',
								'class'       => 'text-input pull-left',
								'maxlength'   => '20',
								'placeholder'	=> 'Last Name',
								'required'	  => '',
								'style'				=> 'width: 45%',
						);

						echo form_input($lastnameInput) . "</br>";

						$locationInput = array(
								'name'        => 'location',
								'class'       => 'text-input',
								'maxlength'   => '40',
								'placeholder'	=> '(ex) Los Angeles, CA',
						);

						echo form_label('Location', 'location', array('class' => 'form-label'));
						echo form_input($locationInput) . "</br>";

						$descriptionInput = array(
								'name'        => 'description',
								'class'       => 'text-input',
								'maxlength'   => '250',
								'placeholder'	=> 'Tell us about yourself...',
								'rows'        => '5',
						);

						echo form_label('Description', 'description', array('class' => 'form-label'));
						echo form_textarea($descriptionInput) . "</br></br>";

						echo "<div class='form-break'></div>";
						echo "<h4>Profile Info</h4>";

						$imageInput = array(
								'name'        => 'image',
								'class'       => 'text-input',
						);

						echo form_label('Profile picture', 'image', array('class' => 'form-label'));
						echo form_upload($imageInput) . "</br>";

						$wishlistNameInput = array(
								'name'        => 'wishlist-name',
								'class'       => 'text-input',
								'maxlength'   => '40',
								'required'		=> '',
								'placeholder'	=> '(ex) Stuart\'s Primary Wishlist',
						);

						echo form_label('Primary Wishlist Name', 'wishlist-name', array('class' => 'form-label'));
						echo form_input($wishlistNameInput) . "</br></br>";

						$signupButton = array(
								'name' => 'signup',
								'class' => 'button blue pull-right',
								'value' => 'Sign Up',
						);

						echo form_submit($signupButton);
						echo form_close();			
					?>
				</div> <!-- end of form-contents -->
			</div>
		</div> <!-- end of wrapper -->
	</body>
</html>