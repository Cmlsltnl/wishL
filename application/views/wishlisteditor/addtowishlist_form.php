<div class="form-header">
<h1>
	Add to Wishlist
	<div class="cancel-button pull-right" style="font-weight:normal; font-size: 12px;">[close]</div>
</h1>
</div>

<div class="form-contents">
<?php
	/* Add to Wishlist Form */
	echo form_open_multipart('wishlistEditor/addToWishlist');

	$options = array(
		'addbyurl' 		=>	'Add by URL',
		'addbyupload' 	=>	'Add by upload',
	);
	$addDropdown = 'id="add-dropdown" onChange="dropdownOnchange(this.form.adddropdown);" class="dropdown-input"';

	echo form_dropdown('adddropdown', $options, 'addbyurl', $addDropdown);
	echo "</br>";

	echo "<div id=\"addbyurl-form\">";
		$productUrlInput = array(
		    'name'        => 'product-url',
		    'class'       => 'text-input',
		    'placeholder' => 'http://',
		    'maxlength'   => '250',
		    'size'        => '50',
		);

		echo "<div class=\"text-label\">" . form_label('Product URL', 'product-url') . "</div>";
		echo form_input($productUrlInput);
		echo "</br>";
	echo "</div>";

	echo "<div id=\"addbyupload-form\" style=\"display: none;\">";
		/*
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
*/
		$productImageInput = array(
		    'name'        => 'product-image',
		    'class'       => 'text-input',
		);

		echo "<div class=\"text-label\">" . form_label('Product image', 'product-image') . "</div>";
		echo form_upload($productImageInput);
		echo "</br>";
	echo "</div>";				
		
	$cancelAddButton = array(
		'name' => 'cancel',
		'class' => 'cancel-button button grey pull-right',
		'content' => 'Cancel',
	);

	$addButton = array(
	    'name' => 'add',
	    'class' => 'button blue pull-right',
	    'value' => 'Add To Wishlist',
	);

	echo form_submit($addButton);
	echo form_button($cancelAddButton);
	echo form_close();			
?>
</div>