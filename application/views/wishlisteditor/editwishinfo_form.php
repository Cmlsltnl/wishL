<div class="form-wrapper">
	<div class="form-header">
		<h1>
			Edit Wish Info
			<div class="close-form close-modal">[close]</div>
		</h1>
	</div>

	<div class="form-contents">
		<img src="" id="top-image" style="height: 400px; margin: auto;" />
		<?php
			$formAttributes = array('id' => 'addtowishlist-form');
			$hiddenFields = array('product-image' => '');
			echo form_open('wishlistEditor/addToWishlist', $formAttributes, $hiddenFields);

			$productNameInput = array(
			    'name'        => 'product-name',
			    'class'       => 'text-input',
			    'maxlength'   => '250',
			    'size'        => '50',
			);

			echo form_label('Product Name', 'product-name', array('class' => 'form-label'));
			echo form_input($productNameInput) . "</br>";

			$productBrandInput = array(
			    'name'        => 'product-brand',
			    'class'       => 'text-input',
			    'maxlength'   => '250',
			    'size'        => '50',
			);

			echo form_label('Product Brand', 'product-brand', array('class' => 'form-label'));
			echo form_input($productBrandInput) . "</br>";

			$productPriceInput = array(
			    'name'        => 'product-price',
			    'class'       => 'text-input',
			    'maxlength'   => '10',
			    'size'        => '50',
			);

			echo form_label('Product Price', 'product-price', array('class' => 'form-label'));
			echo "$ " . form_input($productPriceInput) . "</br>";

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
</div>