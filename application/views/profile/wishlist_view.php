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
				<div id="overlay" class="close-modal"></div>
				<div id="user-info" class="cover-window pull-left" style="width: 288px;">
					<?php if ($this->userNotFound) { ?>
						<div class="error-msg">User not found.</div>
					<?php } else { ?>
						<img id="user-img" class="pull-left" src="<?php if ($this->userInfo->image_path) { echo $this->userInfo->image_path; }
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
				<div id="profile-nav" class="cover-window pull-right" style="width: 500px;">
					<button class="button blue pull-left">Wishlists</button>
					<button class="button grey pull-left">Stats</button>
					<button class="button grey pull-right">Following</button>
					<button class="button grey pull-right">Followers</button>
					<div class="clear" style="margin-bottom: 10px;"></div>
					<div id="list-container">
						<table>
							<?php foreach ($this->wishlists as $wishlist) { 
								if ($wishlist->wishlist_id != $this->displayedWishlistId) { ?>
									<tr><td id="wishlist-td-<?php echo $wishlist->wishlist_id ?>">
										&#9733; <?php echo $wishlist->name; ?>
										<a href="<?php echo site_url('profile/view/' . $this->userInfo->user_id . '/' . $wishlist->wishlist_id) ?>">
											<div class="view-wishlist social-button pull-right">view &#187;</div>
										</a>
									</td></tr>
								<?php } else { ?>
									<tr>
										<td class="selected" id="wishlist-td-<?php echo $wishlist->wishlist_id ?>">
											<div id="user-name">&#9733; <div class="wishlist-name" style="display: inline;"><?php echo $wishlist->name; ?></div>
											<?php if($this->userInfo->user_id != $this->session->userdata('userid')) { ?>
												<button class="button blue pull-right" style="margin: 0;">Follow this list</button></div>
											<?php } else { ?>
												<button id="editwishlist-button" class="button blue pull-right" style="margin: 0;">Edit Wishlist</button></div>
											<?php } ?>
											<div class="small" style="margin-bottom: 10px;">Last modified on June 8, 2013</div>
											<div><?php echo $wishlist->wish_count; ?> Wishes &#183; 0 Owns &#183; 0 Followers</div>
										</td>
									</tr>
							<?php }
							} ?>
						</table>
					</div> <!-- end of list-container -->
					<?php if($this->userInfo->user_id == $this->session->userdata('userid')) { ?>
						<button id="addwishlist-button" class="button blue pull-right">Add Wishlist</button>
					<?php } ?>
				</div> <!-- end of profile-nav -->
			</div> <!-- end of wrapper -->
		</div> <!-- end of cover-wrapper -->

		<div class="wrapper" style="margin-top: 30px;">
			<div id="wishlist-<?php echo $this->displayedWishlistId ?>" class = "wishlist-container js-masonry" data-masonry-options='{ "columnWidth": 310, "itemSelector": ".wish-container" }'>
				<?php
					if(!empty($this->wishes)) {
					foreach ($this->wishes as $wish) {
				?>
					<div id="wish-<?php echo $wish->wish_id ?>" class="wish-container">
						<?php if($this->userInfo->user_id == $this->session->userdata('userid')) { ?>
						<div class="edit-button-wrapper" style="right: 10px;">
							<h1><div class="edit-button edit-wish pull-right">[edit]</div></h1>
						</div>
						<div class="edit-button-wrapper" style="left: 10px;">
							<h1><div class="edit-button pull-left">[mark as owned]</div></h1>
						</div>
						<?php } ?>
						<img class="wish-image" src="<?php echo $wish->image_path ?>"/>
						<div class="wish-info">
							<?php if ($wish->url) { ?>
								<a class="product-url" href="<?php echo $wish->url ?>" target="_blank">
									<div class="product-name"><?php echo $wish->name ?></div>
								</a>
							<?php } else { ?>
								<div class="product-name"><?php echo $wish->name ?></div>
							<?php } ?>
							<div class="product-brand"><?php echo $wish->brand ?></div>

							<div class="product-stats">
								<span style="color: #232220; font-weight: bold;">
									$<div class="product-price"><?php echo $wish->price?></div>
								</span>
								&#183; 12 wishes 
								&#183; 41 likes
							</div>

							<div class="social-button-wrapper">
								<h1>
									<div class="social-button pull-left" style="margin-right: 4px;">[rewish]</div>
									<div class="social-button pull-left">[like]</div>
									<?php if ($wish->url) { ?>
										<a class="product-url" href="<?php echo $wish->url ?>" target="_blank">
											<div class="social-button pull-right">view &#187;</div>
										</a>
									<?php } ?>
								</h1>
							</div>
						</div>
					</div>
				<?php
					} 
				} else { ?>
					<div style="font-size: 20px; margin-top: 80px; text-align: center;">There are no wishes in this wishlist yet!
						<div class="addtowishlist-button" style="color: #81A1A3; cursor: pointer; text-decoration: underline;">[Add wish]</div>
					</div>
				<?php } ?>
			</div> <!-- end of wishlist-wrapper -->
		</div> <!-- end of wrapper -->

		<!-- JAVASCRIPT -->
		<script src="http://malsup.github.com/jquery.form.js"></script> 
		<script src="/assets/js/masonry.pkgd.min.js"></script>
		<script src="/assets/js/imagesloaded.pkgd.min.js"></script>
		<script src="/assets/js/wishlist.js"></script>
	</body>
</html>