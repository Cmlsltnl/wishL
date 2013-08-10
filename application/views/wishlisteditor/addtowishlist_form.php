<div class="form-header">
<h1>
	Add to Wishlist
	<div class="close-modal pull-right" style="font-weight:normal; font-size: 12px;">[close]</div>
</h1>
</div>

<div class="form-contents">
<?php
	/* Add to Wishlist Form */
	$options = array(
		'addbyurl' 		=>	'Add by URL',
		'addbyupload' 	=>	'Add by upload',
	);

	$addDropdown = 'id="add-dropdown" class="dropdown-input"';
	echo form_dropdown('adddropdown', $options, 'addbyurl', $addDropdown);
	echo "</br>";


	/* Add by URL form */
	$urlFormAttributes = array('id' => 'addbyurl-form');
	echo form_open_multipart('wishlistEditor/addByUrl', $urlFormAttributes);
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

	$cancelAddButton = array(
		'name' => 'cancel',
		'class' => 'close-modal button grey pull-right',
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


	/* Add by Upload Form */
	$uploadFormAttributes = array('id' => 'addbyupload-form', 'style' => 'display: none;');
	echo form_open_multipart('wishlistEditor/addByUpload', $uploadFormAttributes);

	$productImageInput = array(
	    'name'        => 'product-image',
	    'class'       => 'text-input',
	);

	echo "<div class=\"text-label\">" . form_label('Product image', 'product-image') . "</div>";
	echo form_upload($productImageInput);
	echo "</br>";

	$cancelAddButton = array(
		'name' => 'cancel',
		'class' => 'close-modal button grey pull-right',
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