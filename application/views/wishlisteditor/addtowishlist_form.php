<div class="form-wrapper">
	<div class="form-header">
		<h1>
			Add to Wishlist
			<div class="close-form close-modal">[close]</div>
		</h1>
	</div>

	<div class="form-contents">
		<img src="" id="top-image" style="width: 468px; margin-bottom: 10px; box-shadow: 2px 2px 1px #888888;" />
		<?php
			$formAttributes = array('id' => 'addtowishlist-form');
			$hiddenFields = array('product-image' => '');
			echo form_open('wishlistEditor/addToWishlist', $formAttributes, $hiddenFields);

			$productUrlInput = array(
				'name'        => 'product-url',
				'class'       => 'text-input url-input',
				'placeholder'	=> 'http://',
				'maxlength'   => '250',
			);

			echo form_input($productUrlInput) . "</br>";

			$productNameInput = array(
				'name'        => 'product-name',
				'class'       => 'text-input',
				'maxlength'   => '250',
			);

			echo form_label('Product Name', 'product-name', array('class' => 'form-label'));
			echo form_input($productNameInput) . "</br>";

			$productBrandInput = array(
				'name'        => 'product-brand',
				'class'       => 'text-input',
				'maxlength'   => '250',
			);

			echo form_label('Product Brand', 'product-brand', array('class' => 'form-label'));
			echo form_input($productBrandInput) . "</br>";

			$productPriceInput = array(
				'name'        => 'product-price',
				'class'       => 'text-input',
				'maxlength'   => '10',
				'style'				=> 'width: 93%'
			);

			echo form_label('Product Price', 'product-price', array('class' => 'form-label'));
			echo "<div><span style=\"display:inline-block;\">$</span> " . form_input($productPriceInput) . "</div></br></br>";

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