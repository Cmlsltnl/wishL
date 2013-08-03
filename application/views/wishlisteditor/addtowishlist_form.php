<!DOCTYPE html>
<html lang="en">
	<head>
		<style type="text/css">
			/* Signup form */
			#addtowishlist-form {
				position: relative;
				width: 75%;
				margin: 0 auto;
				padding: 20px;
				overflow: hidden;
				border: 1px solid #C7BFB1;
				border-radius: 2px;
				background-color: #E7DECE;
			}

			#updateinfo-form h1 {
				margin-bottom: 12px;
			}

			.success-msg {
				color: #6CA383;
			}

			.error-msg {
				color: #C92A2A;
			}

			/* Form */
			#text-input {
				width: 50%;
				padding: 6px;
				margin: 0 auto 10px;
			    -webkit-box-shadow: none;
			    -moz-box-shadow: none;
			    box-shadow: none;
			    border: 1px solid #C9C9C9;
			    border-radius: 2px;
			    font-family: Georgia, serif;
			    font-size: 14px;
			    color: #383734;
			    background: #FFFFFF;
			}

			#text-label {
				padding: 4px 0;
				font-weight: bold;
			}
		</style>
	</head>

	<body>
		<div id="wrapper">
			<div id="addtowishlist-form">
				<h1>Add to Wishlist</h1>
				<hr></br>

				<?php
					/* Update Info Form */
					echo form_open('wishlisteditor/add_to_wishlist');

					$emailInput = array(
					    'name'        => 'email',
					    'id'          => 'text-input',
					    'maxlength'   => '50',
					    'size'        => '50',
					    'required'	  => '',
					);

					echo "<div id=\"text-label\">" . form_label('Email *', 'email') . "</div>";
					echo form_input($emailInput);
					echo "</br>";

					$passwordInput = array(
					    'name'        => 'password',
					    'id'          => 'text-input',
					    'maxlength'   => '20',
					    'size'        => '50',
					    'required'	  => '',
					);

					echo "<div id=\"text-label\">" . form_label('Password *', 'password') . "</div>";
					echo form_password($passwordInput);
					echo "</br>";

					$repeatPasswordInput = array(
					    'name'        => 'repeat-password',
					    'id'          => 'text-input',
					    'maxlength'   => '20',
					    'size'        => '50',
					    'required'	  => '',
					);

					echo "<div id=\"text-label\">" . form_label('Retype Password *', 'repeat-password') . "</div>";
					echo form_password($repeatPasswordInput);
					echo "</br></br><hr></br>";

					$firstnameInput = array(
					    'name'        => 'firstname',
					    'id'          => 'text-input',
					    'maxlength'   => '20',
					    'size'        => '50',
					    'required'	  => '',
					);

					echo "<div id=\"text-label\">" . form_label('First Name *', 'firstname') . "</div>";
					echo form_input($firstnameInput);
					echo "</br>";

					$lastnameInput = array(
					    'name'        => 'lastname',
					    'id'          => 'text-input',
					    'maxlength'   => '20',
					    'size'        => '50',
					    'required'	  => '',
					);

					echo "<div id=\"text-label\">" . form_label('Last Name *', 'lastname') . "</div>";
					echo form_input($lastnameInput);
					echo "</br>";

					$locationInput = array(
					    'name'        => 'location',
					    'id'          => 'text-input',
					    'maxlength'   => '40',
					    'size'        => '50',
					);

					echo "<div id=\"text-label\">" . form_label('Location', 'location') . "</div>";
					echo form_input($locationInput);
					echo "</br>";

					$descriptionInput = array(
					    'name'        => 'description',
					    'id'          => 'text-input',
					    'maxlength'   => '250',
					    'size'        => '50',
					);

					echo "<div id=\"text-label\">" . form_label('Description', 'description') . "</div>";
					echo form_textarea($descriptionInput);
					echo "</br>";

					$imageInput = array(
					    'name'        => 'image',
					    'id'          => 'text-input',
					);

					echo "<div id=\"text-label\">" . form_label('Profile picture', 'image') . "</div>";
					echo form_upload($imageInput);
					echo "</br></br>";

					$signupButton = array(
					    'name' => 'update',
					    'id' => 'button-green',
					    'value' => 'Sign Up',
					);

					echo form_submit($signupButton);
					echo form_close();			
				?>
			</div> <!-- end of form-->
		</div> <!-- end of wrapper -->
	</body>
</html>