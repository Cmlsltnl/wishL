$(document).ready(function(){      
	$('#overlay').hide();

	/* Modals */
	$('#updateinfo-button').click(function() {
		$('#modal').load("/index.php/settings/showUpdateInfo");
		$(document).ajaxComplete(function(){
            $('#modal').dialog('open');
            $('#overlay').show();
		});
		return false;
	});

    $('#addtowishlist-button').click(function() {
    	$('#modal').load("/index.php/wishlistEditor/showAddToWishlist");
    	$(document).ajaxComplete(function(){
            $('#modal').dialog('open');
            $('#overlay').show();
		});
    	return false;
    });

    $('.wish-image').click(function() {
        var wishContainer = $(this).parents('.wish-container');

        var url = "/index.php/profile/viewWish/";
        var wishId = $(wishContainer).attr('id').replace('wish-','');
        $('#modal').load(url + wishId);
        $('#modal').css('padding', 0).css('border', 'none');
        $(document).ajaxComplete(function(){
            $('#modal').dialog('open');
            $('#overlay').show();
        });
        return false;
    });

	$('#modal').dialog({
        autoOpen: false,
        resizeable: false,
        modal: false,
        position: 'center',
        width: 800
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

$(document).ajaxComplete(function(){
    $('#cancel-button').click(function() {
    	$('#modal').dialog('close');
    	$('#modal').html('');
    	$('#overlay').hide();
    });

    $('#overlay').click(function() {
        $('#modal').dialog('close');
        $('#modal').html('');
        $('#overlay').hide();
    });        
});