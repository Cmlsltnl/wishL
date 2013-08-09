<!DOCTYPE html>
<html lang="en">
	<head>
		<title>&#9733; wishL</title>
		<link rel="stylesheet" type="text/css" href="/assets/styles/wishlist.css">
	</head>

	<body>
		<div id="wrapper">
			<div id="modal" style="z-index: 1001;"></div>
			<div id="overlay"></div>
			<div id="user-info">
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
						<button class="button green">+ Follow</button>
						<button class="button blue">Message</button>
					<?php } else { ?>
						<button id="updateinfo-button" class="button blue">Update Info</button>
					<?php } ?>
					</span>
				<?php } ?>
			</div> <!-- end of profile-info -->
			<div id="wishlist-wrapper" class = "js-masonry" data-masonry-options='{ "columnWidth": 310, "itemSelector": ".wish-container" }'>
				<?php
					foreach ($this->wishes as $wish) {
				?>
					<div id="wish-<?php echo $wish->wish_id ?>"class="wish-container">
						<div class="wish-buttons">
							<button class="edit-wish blue button small pull-right">Edit</button>
							<button class="delete-wish red button small pull-right">Delete</button>
						</div>
						<img class="wish-image" src="<?php echo $wish->image_path ?>"/>
						<div class="wish-info">
							<a href=""><div class="product-name"><?php echo $wish->name ?></div></a>
							<div class="product-brand"><?php echo $wish->brand ?></div>

							<div class="product-stats"><span style="color: #232220; font-weight: bold;">$<?php echo $wish->price?></span>
								&#183; 12 Wishes 
								&#183; 41 Likes
							</div>
<!--
							<div class="button-wrapper">
								<a href=""><button class="button blue small">Rewish</button></a>
								<a href=""><button class="button green small">Buy</button></a>
							</div>
-->
						</div>
					</div>
				<?php
					}
				?>
			</div> <!-- end of wishlist-wrapper -->
		</div> <!-- end of wrapper -->

		<!-- JAVASCRIPT -->
		<script src="/assets/js/masonry.pkgd.min.js"></script>
		<script src="/assets/js/imagesloaded.pkgd.min.js"></script>
		<script src="/assets/js/wishlist.js"></script>
	</body>
</html>