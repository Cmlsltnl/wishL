<!DOCTYPE html>
<html lang="en">
	<head>
		<title>&#9733; wishL</title>
		<link rel="stylesheet" type="text/css" href="/assets/styles/wishlist.css">

		<script src="/assets/js/masonry.pkgd.min.js"></script>
		<script src="/assets/js/imagesloaded.pkgd.min.js"></script>
		
		<script>
		$(document).ready(function(){      
			$('#overlay').hide();

			/* Update Info - Form Modal */
			$('#updateinfo-button').click(function() {
				$('#updateinfo-form').dialog('open');
				$('#overlay').show();
				return false;
			});

			$('#updateinfo-form').dialog({
                autoOpen: false,
                resizeable: false,
                modal: false,
                position: 'center',
                width: 500
            });

            $('#cancel-update-button').click(function() {
            	$('#updateinfo-form').dialog('close');
            	$('#overlay').hide();
            });        

            /* Add to Wishlist - Form Modal */
            $('#addtowishlist-button').click(function() {
            	$('#addtowishlist-form').dialog('open');
            	$('#overlay').show();
            	return false;
            })

            $('#addtowishlist-form').dialog({
                autoOpen: false,
                resizeable: false,
                modal: false,
                position: 'center',
                width: 500
            });

            $('#cancel-add-button').click(function() {
            	$('#addtowishlist-form').dialog('close');
            	$('#overlay').hide();
            });

            /* Delete Wish */
            $('.delete-wish').click(function() {
            	var wishContainer = $(this).parents('.wish-container');
            	var productName = $(wishContainer).find('.product-name').html();
            	var answer = confirm("Are you sure you want to delete \"" + productName + "\" from your wishlist?");
            	if (answer) {
            		var url = "/index.php/wishlistEditor/deleteFromWishlist";
            		var wishId = $(wishContainer).attr('id').replace('wish-','');
            		$.post(url, { 'wish-id': wishId }, function (data) {
            			if (data) {
            				$(wishContainer).fadeOut(1000, function() {
            					$(this).remove();
            				});
            			} 
            		});
            	}
            });

            /* Wish Buttons - Hover */
            $('.wish-buttons').hide();

            $('.wish-container').mouseover(function() {
            	$(this).children('.wish-buttons').show();
            	$(this).children('.wish-info').css('background-color', '#F7EEDC');
            });

            $('.wish-container').mouseleave(function() {
            	$(this).children('.wish-buttons').hide();
            	$(this).children('.wish-info').css('background-color', '#E7DECE');
            });

            /* Masonry */
            $('.js-masonry').imagesLoaded( function() {
				$('.js-masonry').masonry({
					containerStyle: null,
				  	columnWidth: 324,
				  	gutter: 14,
				  	itemSelector: '.wish-container',
				  	transitionDuration: 0,
				});
            });
		});
		</script>
	</head>

	<body>
		<div id="wrapper">
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
						<div class="button green">+ Follow</div>
						<div class="button blue">Message</div>
					<?php } else { ?>
						<a href="<?php echo site_url('settings/showUpdateInfo') ?>">
							<div id="updateinfo-button" class="button blue">Update Info</div>
						</a>
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
							<div class="edit-wish blue button small pull-right">Edit</div>
							<div class="delete-wish red button small pull-right">Delete</div>
						</div>
						<img class="wish-image" src="<?php echo $wish->image_path ?>"/>
						<div class="wish-info">
							<a href=""><div class="product-name"><?php echo $wish->name ?></div></a>
							<div class="product-brand"><?php echo $wish->brand ?></div>

							<div class="product-stats"><span style="color: #232220; font-weight: bold;">$<?php echo $wish->price?></span>
								&#183; 12 Wishes 
								&#183; 41 Likes
							</div>

							<div class="button-wrapper">
								<a href=""><div class="button blue small">Rewish</div></a>
								<a href=""><div class="button green small">Buy</div></a>
							</div>
						</div>
					</div>
				<?php
					}
				?>
			</div> <!-- end of wishlist-wrapper -->
			
			<div id="updateinfo-form" class="form" style="z-index:1001;">
				<h1>Update Info</h1>
				<hr></br>
				<div class="message">
					<?php
						$this->message = '';
						if ($this->message == 'success') {
							echo "<div class=\"success-msg\">Info successfully updated.</div></br>";
						} else if ($this->message == 'failure') {
							echo "<div class=\"error-msg\">Info unable to be updated.</div></br>";
						}
					?>
				</div>
					<?php
						/* Update Info Form */
						echo form_open_multipart('settings/updateInfo');

						$firstnameInput = array(
						    'name'        => 'firstname',
						    'class'       => 'text-input',
						    'value'       => $this->userInfo->firstname,
						    'maxlength'   => '20',
						    'size'        => '50',
						);

						echo "<div class=\"text-label\">" . form_label('First Name', 'firstname') . "</div>";
						echo form_input($firstnameInput);
						echo "</br>";

						$lastnameInput = array(
						    'name'        => 'lastname',
						    'class'       => 'text-input',
						    'value'       => $this->userInfo->lastname,
						    'maxlength'   => '20',
						    'size'        => '50',
						);

						echo "<div class=\"text-label\">" . form_label('Last Name', 'lastname') . "</div>";
						echo form_input($lastnameInput);
						echo "</br>";

						$locationInput = array(
						    'name'        => 'location',
						    'class'       => 'text-input',
						    'value'       => $this->userInfo->location,
						    'maxlength'   => '40',
						    'size'        => '50',
						);

						echo "<div class=\"text-label\">" . form_label('Location', 'location') . "</div>";
						echo form_input($locationInput);
						echo "</br>";

						$descriptionInput = array(
						    'name'        => 'description',
						    'class'       => 'text-input',
						    'value'       => $this->userInfo->description,
						    'maxlength'   => '250',
						    'rows'		  => '5',
						);

						echo "<div class=\"text-label\">" . form_label('Description', 'description') . "</div>";
						echo form_textarea($descriptionInput);
						echo "</br>";

						$imageInput = array(
						    'name'		  => 'image',
						    'class'       => 'text-input',
						);

						echo "<div class=\"text-label\">" . form_label('Profile picture', 'image') . "</div>";
						echo form_upload($imageInput);
						echo "</br></br>";

						$cancelUpdateButton = array(
							'name' => 'cancel',
							'id' => 'cancel-update-button',
							'class' => 'button red pull-right',
							'content' => 'Cancel',
						);

						$updateButton = array(
						    'name' => 'update',
						    'class' => 'button blue pull-right',
						    'value' => 'Update Info',
						);

						echo form_button($cancelUpdateButton);
						echo form_submit($updateButton);
						echo form_close();
					?>
			</div>

			<div id="addtowishlist-form" class="form" style="z-index: 1001;">
				<h1>Add to Wishlist</h1>
				<hr></br>

				<?php
					/* Update Info Form */
					echo form_open_multipart('wishlistEditor/addToWishlist');

					$productNameInput = array(
					    'name'        => 'product-name',
					    'class'       => 'text-input',
					    'maxlength'   => '250',
					    'size'        => '50',
					);

					echo "<div class=\"text-label\">" . form_label('Product Name', 'product-name') . "</div>";
					echo form_input($productNameInput);
					echo "</br>";

					$productBrandInput = array(
					    'name'        => 'product-brand',
					    'class'       => 'text-input',
					    'maxlength'   => '250',
					    'size'        => '50',
					);

					echo "<div class=\"text-label\">" . form_label('Product Brand', 'product-brand') . "</div>";
					echo form_input($productBrandInput);
					echo "</br>";

					$productPriceInput = array(
					    'name'        => 'product-price',
					    'class'       => 'text-input',
					    'maxlength'   => '10',
					    'size'        => '50',
					);

					echo "<div class=\"text-label\">" . form_label('Product Price', 'product-price') . "</div>";
					echo form_input($productPriceInput);
					echo "</br>";


					$productDescriptionInput = array(
					    'name'        => 'product-description',
					    'class'       => 'text-input',
					    'maxlength'   => '250',
					    'rows'		  => '5',
					);

					echo "<div class=\"text-label\">" . form_label('Product Description', 'product-description') . "</div>";
					echo form_textarea($productDescriptionInput);
					echo "</br>";

					$productImageInput = array(
					    'name'        => 'product-image',
					    'class'       => 'text-input',
					);

					echo "<div class=\"text-label\">" . form_label('Product image', 'product-image') . "</div>";
					echo form_upload($productImageInput);
					echo "</br></br>";					
						
					$cancelAddButton = array(
						'name' => 'cancel',
						'id' => 'cancel-add-button',
						'class' => 'button red pull-right',
						'content' => 'Cancel',
					);

					$addButton = array(
					    'name' => 'add',
					    'class' => 'button green pull-right',
					    'value' => 'Add To Wishlist',
					);
 
					echo form_button($cancelAddButton);
					echo form_submit($addButton);
					echo form_close();			
				?>
			</div> <!-- end of form-->

		</div> <!-- end of wrapper -->
	</body>
</html>