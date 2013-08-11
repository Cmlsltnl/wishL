<!DOCTYPE html>
<html lang="en">
	<head>
		<title>&#9733; wishL</title>
		<link rel="stylesheet" type="text/css" href="/assets/styles/wishlist.css">
	</head>

	<body style="background: #F0EBE1;">
		<div id="cover-wrapper">
			<div class="wrapper">
				<div id="modal" style="z-index: 1001;"></div>
				<div id="overlay"></div>
				<div id="user-info" class="pull-left">
					<?php if ($this->userNotFound) { ?>
						<div class="error-msg">User not found.</div>
					<?php } else { ?>
						<img id="user-img" src="<?php if ($this->userInfo->image_path) { echo $this->userInfo->image_path; }
														else { echo "/assets/images/users/profile-default.png"; } ?>"/>
						<div id="user-name">
							<?php echo $this->userInfo->fullname; ?>
						</div>
						<div id="user-loc"><?php echo $this->userInfo->location; ?></div>

						<span style="position: absolute; right: 20px; bottom: 20px;">
						<?php if($this->userInfo->user_id != $this->session->userdata('userid')) { ?>
							<button class="button grey">Send Message</button>
							<button class="button blue">Follow</button>
						<?php } else { ?>
							<button id="updateinfo-button" class="button blue">Update Info</button>
						<?php } ?>
						</span>
					<?php } ?>
				</div> <!-- end of profile-info -->
				<div id="user-stats" class="pull-right">
					<div id="user-name">&#9733; <?php echo $this->wishlists[0]; ?></div>
				</div>
			</div>
		</div>

		<!--<div id="list-bar-wrapper">
			<div id="list-bar" class="pull-left" style="margin-right: 10px">
				<select>
					<?php foreach ($this->wishlists as $wishlist) { ?>
						<option><?php echo $wishlist; ?></option>
					<?php } ?>
				</select>
			</div>
			<button class="button blue pull-left">Follow this list</button>
		</div>-->

		<div class="wrapper">
			<div id="wishlist-wrapper" class = "js-masonry" data-masonry-options='{ "columnWidth": 310, "itemSelector": ".wish-container" }'>
				<?php
					foreach ($this->wishes as $wish) {
				?>
					<div id="wish-<?php echo $wish->wish_id ?>"class="wish-container">
						<?php if($this->userInfo->user_id == $this->session->userdata('userid')) { ?>
						<div class="edit-button-wrapper" style="right: 10px;">
							<h1><div class="edit-button pull-right">[edit]</div></h1>
						</div>
						<div class="edit-button-wrapper" style="left: 10px;">
							<h1><div class="edit-button pull-left">[mark as owned]</div></h1>
						</div>
						<?php } ?>
						<img class="wish-image" src="<?php echo $wish->image_path ?>"/>
						<div class="wish-info">
							<a href=""><div class="product-name"><?php echo $wish->name ?></div></a>
							<div class="product-brand"><?php echo $wish->brand ?></div>

							<div class="product-stats"><span style="color: #232220; font-weight: bold;">$<?php echo $wish->price?></span>
								&#183; 12 wishes 
								&#183; 41 likes
							</div>

							<div class="social-button-wrapper">
								<h1>
									<div class="social-button pull-left" style="margin-right: 4px;">[rewish]</div>
									<div class="social-button pull-left">[like]</div>
									<div class="social-button pull-right">view &#187;</div>
								</h1>
							</div>
						</div>
					</div>
				<?php
					}
				?>
			</div> <!-- end of wishlist-wrapper -->
		</div> <!-- end of wrapper -->

		<!-- JAVASCRIPT -->
		<script src="http://malsup.github.com/jquery.form.js"></script> 
		<script src="/assets/js/masonry.pkgd.min.js"></script>
		<script src="/assets/js/imagesloaded.pkgd.min.js"></script>
		<script src="/assets/js/wishlist.js"></script>
	</body>
</html>