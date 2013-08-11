<div class="form-header">
<h1>
	Edit Wish Info
	<div class="close-modal pull-right" style="font-weight:normal; font-size: 12px;">[close]</div>
</h1>
</div>

<div class="form-contents">
<img src="" id="top-image" style="height: 400px; margin: auto;" />
<?php
	$formAttributes = array('id' => 'addtowishlist-form');
	$hiddenFields = array('product-image' => '');
	echo form_open_multipart('wishlistEditor/addToWishlist', $formAttributes, $hiddenFields);

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
	echo "$ " . form_input($productPriceInput);
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