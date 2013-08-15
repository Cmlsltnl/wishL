<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="/assets/styles/header.css" />
		<link rel="stylesheet" type="text/css" href="/assets/styles/components.css" />

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	</head>

	<body>
		<div id="navbar">
			<div id="navbar-center">
				<div id="navbar-logo">
					<a href="<?php echo base_url(); ?>">&#9733; wishL</a>
				</div>
				<div id="navbar-links">
					<?php if ($this->session->userdata('isLoggedIn')) { ?>
						<button class="addtowishlist-button button blue" style="width: 72px;">+</button>
						<div id="navbar-break"></div>
						<div id="navbar-dropdown-wrapper">
							<div id="navbar-dropdown">
								<a href="<?php echo site_url('profile/view/' . $this->session->userdata('userid')); ?>">
									<?php echo $this->session->userdata('fullname'); ?> &#x25BE;
								</a>
								<ul>
									<li><a href="<?php echo site_url('settings/showEditAccount'); ?>">Edit Account</a></li>
									<li><a href="<?php echo site_url('login/logoutUser'); ?>">Logout</a></li>
								</ul>
							</div>
						</div>
					<?php } else { ?>
						<div id="navbar-dropdown"><a href="<?php echo site_url('login/'); ?>">Login</a></div>
					<?php } ?>
				</div>
			</div> <!-- end of navbar-center -->
		</div> <!-- end of navbar -->
	</body>
</html>