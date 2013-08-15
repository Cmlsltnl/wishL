$(document).ready(function(){
	$('#overlay').hide();

	/* Form Modals */
	$('#updateinfo-button').click(function() {
		$('#modal').load("/index.php/settings/showUpdateInfo").dialog('open');
		$('#overlay').show();
		$(document).ajaxComplete(function(event, xhr, settings) {
			if (settings.url == "/index.php/settings/showUpdateInfo") {
				$('.close-modal').click(function() {
					$('#modal').dialog('close');
					$('#modal').html('');
					$('#overlay').hide();
					$(document).unbind('ajaxComplete');
				});
			}
		});
	});

	$('#addwishlist-button').click(function() {
		$('#modal').load("/index.php/wishlistEditor/showAddWishlist").dialog('open');
		$('#overlay').show();
		$(document).ajaxComplete(function(event, xhr, settings) {
			if (settings.url == "/index.php/wishlistEditor/showAddWishlist") {
				$('.close-modal').click(function() {
					$('#modal').dialog('close');
					$('#modal').html('');
					$('#overlay').hide();
					$(document).unbind('ajaxComplete');
				});
			}
		});
	});

	$('#editwishlist-button').click(function() {
		$('#modal').load("/index.php/wishlistEditor/showEditWishlist").dialog('open');
		$('#overlay').show();
		$(document).ajaxComplete(function(event, xhr, settings) {
			if (settings.url == "/index.php/wishlistEditor/showEditWishlist") {
				var wishlistContainer = $('#editwishlist-button').parents('.selected');
				var wishlistId = $(wishlistContainer).attr('id').replace('wishlist-td-','');
				var wishlistName = $(wishlistContainer).find('.wishlist-name').text();
				$('input[name="wishlist-id"]').val(wishlistId);
				$('input[name="wishlist-name"]').val(wishlistName);

				$('#editwishlist-form').ajaxForm(function(data) {
					$('#modal').dialog('close');
					$('#modal').html('');
					$('#overlay').hide();
					var wishlistInfo = jQuery.parseJSON(data);
					$(wishlistContainer).find('.wishlist-name').text(wishlistInfo.name);
					$(document).unbind('ajaxComplete');
				});

				$('.close-modal').click(function() {
					$('#modal').dialog('close');
					$('#modal').html('');
					$('#overlay').hide();
					$(document).unbind('ajaxComplete');
				});
			}
		});
	});

	$('.addtowishlist-button').click(function() {
		$('#modal').load("/index.php/wishlistEditor/showAddOptions").dialog('open');
		$('#overlay').show();
		$(document).ajaxComplete(function(event, xhr, settings) {
			if (settings.url == "/index.php/wishlistEditor/showAddOptions") {
				var wishlistId = $('.wishlist-container').attr('id').replace('wishlist-','');
				$("#add-dropdown").change(function() {
					var addOption = $("#add-dropdown").val();
					if(addOption == 'addbyurl') {
						$('#addbyurl-form').css("display","block");
						$('#addbyupload-form').css("display", "none");
					} else {
						$('#addbyurl-form').css("display", "none");
						$('#addbyupload-form').css("display", "block");
					}
				});

				$('#addbyurl-form').ajaxForm(function(data) {
					$('#modal').dialog('close');
					$('#modal').html('');
					$('#modal').load("/index.php/wishlistEditor/showAddToWishlist").dialog('open');
					$(document).ajaxComplete(function() {
						var productInfo = jQuery.parseJSON(data);
						$('#top-image').attr('src', productInfo.image);
						$('input[name="displayed-wishlist-id"]').val(wishlistId);
						$('#wishlists-dropdown').val(wishlistId);
						$('input[name="product-image"]').val(productInfo.image);
						$('input[name="product-url"]').val(productInfo.productUrl);
						$('input[name="product-name"]').val(productInfo.productName);

						$('.close-modal').click(function() {
							$('#modal').dialog('close');
							$('#modal').html('');
							$('#overlay').hide();
							$(document).unbind('ajaxComplete');
						});
					});
				});

				$('#addbyupload-form').ajaxForm(function(data) {
					$('#modal').dialog('close');
					$('#modal').html('');
					$('#modal').load("/index.php/wishlistEditor/showAddToWishlist").dialog('open');
					$(document).ajaxComplete(function() {
						var productInfo = jQuery.parseJSON(data);
						$('#top-image').attr('src', productInfo.image);
						$('input[name="displayed-wishlist-id"]').val(wishlistId);
						$('#wishlists-dropdown').val(wishlistId);
						$('input[name="product-image"]').val(productInfo.image);
						
						$('.close-modal').click(function() {
							$('#modal').load("/index.php/wishlistEditor/deleteUpload/" + productInfo.filename).dialog('close');
							$('#modal').html('');
							$('#overlay').hide();
							(document).unbind('ajaxComplete');
						});
					});
				});

				$('.close-modal').click(function() {
					$('#modal').dialog('close');
					$('#modal').html('');
					$('#overlay').hide();
					$(document).unbind('ajaxComplete');
				});
			}
		});
	});

	$('#modal').dialog({
		autoOpen: false,
		resizeable: false,
		modal: false,
		position: ['center', 100],
		width: 500
	});

	/* Edit Wish */
	$('.edit-wish').click(function() {
		var wishContainer = $(this).parents('.wish-container');
		var wishId = $(wishContainer).attr('id').replace('wish-','');
		var productUrl = $(wishContainer).find('.product-url').attr('href');
		var productName = $(wishContainer).find('.product-name').html();
		var productBrand = $(wishContainer).find('.product-brand').html();
		var productPrice = $(wishContainer).find('.product-price').html();
		var productImage = $(wishContainer).find('.wish-image').attr('src');
		var wishlistContainer = $(wishContainer).parents('.wishlist-container');
		var wishlistId = $(wishlistContainer).attr('id').replace('wishlist-','');
		$('#modal').load("/index.php/wishlistEditor/showEditWishInfo").dialog('open');
		$(document).ajaxComplete(function(event, xhr, settings) {
			if(settings.url == "/index.php/wishlistEditor/showEditWishInfo") {
				$('#wishlists-dropdown').val(wishlistId);
				$('input[name="displayed-wishlist-id"]').val(wishlistId);
				$('#top-image').attr('src', productImage);
				$('input[name="wish-id"]').val(wishId);
				$('input[name="product-url"]').val(productUrl);
				$('input[name="product-name"]').val(productName);
				$('input[name="product-brand"]').val(productBrand);
				$('input[name="product-price"]').val(productPrice);

				$('.delete-wish').click(function() {
					var answer = confirm("Are you sure you want to delete \"" + productName + "\" from your wishlist?");
					if (answer == true) {
						$('#modal').dialog('close');
						$('#modal').html('');
						$('#overlay').hide();
						var url = "/index.php/wishlistEditor/deleteFromWishlist";
						$.post(url, { 'wish-id': wishId }, function (data) {
							if (data) {
								$(wishContainer).fadeOut(1000, function() {
									$(this).remove();
								});
							} 
						});
					}
					$(document).unbind('ajaxComplete');
				});

				$('#editwishinfo-form').ajaxForm(function(data) {
					$('#modal').dialog('close');
					$('#modal').html('');
					$('#overlay').hide();
					var wishInfo = jQuery.parseJSON(data);
					if(wishInfo.newUrl) {
						window.location.href = wishInfo.newUrl;
					} else {
						var wishContainer = $('#wish-' + wishInfo.wishId);
						wishContainer.find('.product-name').text(wishInfo.wishName);
						wishContainer.find('.product-brand').text(wishInfo.brand);
						wishContainer.find('.product-price').text(wishInfo.price);
					}
					$(document).unbind('ajaxComplete');
				});

				$('.close-modal').click(function() {
					$('#modal').dialog('close');
					$('#modal').html('');
					$('#overlay').hide();
					$(document).unbind('ajaxComplete');
				});
			}
		});
		$('#overlay').show();
	});

	/* Wish Buttons - Hover */
	$('.edit-button-wrapper').hide();

	$('.wish-container').mouseover(function() {
		$(this).children('.edit-button-wrapper').show();
		$(this).children('.wish-info').css('background-color', '#F7EEDC');
	});

	$('.wish-container').mouseleave(function() {
		$(this).children('.edit-button-wrapper').hide();
		$(this).children('.wish-info').css('background-color', '#E7DECE');
	});

	/* Masonry */
	$('.js-masonry').imagesLoaded( function() {
		$('.js-masonry').masonry({
			containerStyle: null,
			columnWidth: 291,
			gutter: 12,
			itemSelector: '.wish-container',
			transitionDuration: 0,
		});
	});
});