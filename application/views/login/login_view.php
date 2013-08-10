<!DOCTYPE html>
<html lang="en">
	<head>
		<title>&#9733; wishL</title>
	</head>

	<body>
		<div id="wrapper-small">
			<div id="login-form" class="form text-center">
				<div class="form-header">
					<h1>&#9733; wishL</h1>
				</div>
				<div class="form-contents">
				<?php
					if ($this->showError) {
						echo "<p><div class=\"error-msg\">Invalid email/password combination. Please try again.</div></p>";
						echo "</br>";
					}

					/* Login Form */
					echo form_open('login/loginUser');

					$emailInput = array(
					    'name'        => 'email',
					    'class'       => 'text-input',
					    'placeholder' => 'Email',
					    'maxlength'   => '100',
					    'size'        => '50',
					);

					echo form_input($emailInput);
					echo "</br>";

					$passwordInput = array(
					    'name'        => 'password',
					    'class'       => 'text-input',
					    'placeholder' => 'Password',
					    'maxlength'   => '100',
					    'size'        => '50',
					);

					echo form_password($passwordInput);
					echo "</br></br>";

					
					$signupButton = array(
					    'name' => 'signup',
					    'class' => 'button green',
					    'value' => 'true',
					    'content' => 'Sign Up',
					);

					echo "<a href='" . site_url("settings/showSignup") . "'>";
					echo form_button($signupButton);
					echo "</a>";
					
				
					$loginButton = array(
					    'name' => 'login',
					    'class' => 'button blue',
					    'value' => 'Login',
					);

					echo form_submit($loginButton);
					echo form_close();				
				?>
				</div>
			</div> <!-- end of login-form-->
		</div> <!-- end of wrapper -->
	</body>
</html>