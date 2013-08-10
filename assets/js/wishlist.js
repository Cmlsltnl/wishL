$(document).ready(function(){      
	$('#overlay').hide();

	/* Form Modals */
	$('#updateinfo-button').click(function() {
		$('#modal').load("/index.php/settings/showUpdateInfo").dialog('open');
        $('#overlay').show();
	});

    $('#addtowishlist-button').click(function() {
    	$('#modal').load("/index.php/wishlistEditor/showAddToWishlist").dialog('open');
        $('#overlay').show();
    });

	$('#modal').dialog({
        autoOpen: false,
        resizeable: false,
        modal: false,
        position: ['center', 100],
        width: 500
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

$(document).ajaxComplete(function(event, xhr, settings) {
    if (settings.url == "/index.php/wishlistEditor/showAddToWishlist") {
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
            $('#modal').load("/index.php/wishlistEditor/showEditWishInfo").dialog('open');
            $(document).ajaxComplete(function() {
                var productInfo = jQuery.parseJSON(data);
                $('#top-image').attr('src', productInfo.image);
                $('input[name="product-image"]').val(productInfo.image);
                $('input[name="product-name"]').val(productInfo.productName);
            });
        });

        $('#addbyupload-form').ajaxForm(function(data) {
            $('#modal').dialog('close');
            $('#modal').html('');
            $('#modal').load("/index.php/wishlistEditor/showEditWishInfo").dialog('open');
            $(document).ajaxComplete(function() {
                var productInfo = jQuery.parseJSON(data);
                $('#top-image').attr('src', productInfo.image);
                $('input[name="product-image"]').val(productInfo.image);
                
                $('.close-modal').click(function() {
                    $('#modal').load("/index.php/wishlistEditor/deleteUpload/" + productInfo.filename).dialog('close');
                    $('#modal').html('');
                    $('#overlay').hide();
                });
            });
        });

        $('.close-modal').click(function() {
            $('#modal').dialog('close');
            $('#modal').html('');
            $('#overlay').hide();
        });
    }

    else if (settings.url == "/index.php/wishlistEditor/deleteFromWishlist") {

    }

    else {
        $('.close-modal').click(function() {
            $('#modal').dialog('close');
            $('#modal').html('');
            $('#overlay').hide();
        });
    }
});