
<h1>Add to Wishlist</h1>
<hr></br>

<?php
	/* Add to Wishlist Form */
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
		'id' => 'cancel-button',
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