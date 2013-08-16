<!DOCTYPE html>
<html lang="en">
	<head>
		<title>&#9733; wishL</title>
		<link rel="stylesheet" type="text/css" href="/assets/styles/login.css">
	</head>

	<body>
		<div class="wrapper" style="margin: auto; padding-top: 100px; width: 900px;">
			<div id="hero">
				<h1>Get what you</h1>
				<h1>really wish</h1>
				<h1>for<div style="font-size: 10px; display: inline; margin-left: 4px;">&#9733;</div></h1>
				<a href="<?php echo site_url("settings/showSignup") ?>">
					<div id="signup-button">Sign Up &#187;</div>
				</a>
			</div>

			<div id="login-form" class="form-wrapper" style="width: 300px;">
				<div class="form-header">
					<h1>Login</h1>
				</div>
				<div class="form-contents">
					<?php
						if ($this->showError) {
							echo "<p><div class=\"error-msg\">Invalid email/password combination. Please try again.</div></p></br>";
						}

						/* Login Form */
						echo form_open('login/loginUser');

						$emailInput = array(
						    'name'        => 'email',
						    'class'       => 'text-input',
						    'maxlength'   => '100',
						    'size'        => '50',
						);

						echo form_label('Email', 'email', array('class' => 'form-label'));
						echo form_input($emailInput) . "</br>";

						$passwordInput = array(
						    'name'        => 'password',
						    'class'       => 'text-input',
						    'maxlength'   => '100',
						    'size'        => '50',
						);

						echo form_label('Password', 'password', array('class' => 'form-label'));
						echo form_password($passwordInput) . "</br></br>";

						
						$signupButton = array(
						    'name' => 'signup',
						    'class' => 'button green',
						    'value' => 'true',
						    'content' => 'Sign Up',
						);
					
						$loginButton = array(
						    'name' => 'login',
						    'class' => 'button blue pull-right',
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