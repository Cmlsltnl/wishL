<div class="form-wrapper">
	<div class="form-header">
		<h1>
			Add Wishlist
			<div class="close-form close-modal">[close]</div>
		</h1>
	</div>

	<div class="form-contents">
		<?php
			$formAttributes = array('id' => 'addwishlist-form');
			echo form_open('wishlistEditor/addWishlist', $formAttributes);

			$wishlistNameInput = array(
				'name'        => 'wishlist-name',
				'class'       => 'text-input',
				'maxlength'   => '250',
			);

			echo form_label('Wishlist Name', 'wishlist-name', array('class' => 'form-label'));
			echo form_input($wishlistNameInput) . "</br>";

			echo form_label('Private?', 'wishlist-isprivate', array('class' => 'form-label')) . " ";
			echo form_checkbox('wishlist-isprivate', 'isprivate', false);

			$cancelAddButton = array(
				'name' => 'cancel',
				'class' => 'close-modal button grey pull-right',
				'content' => 'Cancel',
			);

			$addButton = array(
				'name' => 'add',
				'class' => 'button blue pull-right',
				'value' => 'Add Wishlist',
			);

			echo form_submit($addButton);
			echo form_button($cancelAddButton);
			echo form_close();					
		?>
	</div>
</div>