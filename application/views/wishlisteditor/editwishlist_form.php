<div class="form-wrapper">
	<div class="form-header">
		<h1>
			Edit Wishlist
			<div class="close-form close-modal">[close]</div>
		</h1>
	</div>

	<div class="form-contents">
		<?php
			$formAttributes = array('id' => 'editwishlist-form');
			$hiddenFields = array('wishlist-id' => '', 'primary-wishlist-id' => $this->primaryWishlistId);
			echo form_open('wishlistEditor/editWishlist', $formAttributes, $hiddenFields);

			$wishlistNameInput = array(
				'name'        => 'wishlist-name',
				'class'       => 'text-input',
				'maxlength'   => '250',
			);

			echo form_label('Wishlist Name', 'wishlist-name', array('class' => 'form-label'));
			echo form_input($wishlistNameInput) . "</br>";

			echo form_label('Private?', 'wishlist-isprivate', array('class' => 'form-label')) . " ";
			echo form_checkbox('wishlist-isprivate', 'isprivate', false);

			$deleteButton = array(
				'name' => 'delete',
				'class' => 'delete-wishlist button grey pull-left',
				'content' => 'Delete Wishlist',
			);

			$cancelAddButton = array(
				'name' => 'cancel',
				'class' => 'close-modal button grey pull-right',
				'content' => 'Cancel',
			);

			$updateButton = array(
				'name' => 'update',
				'class' => 'button blue pull-right',
				'value' => 'Update Wishlist',
			);

			echo '<div class="clear" style="margin-top: 10px;"></div>';
			echo form_submit($updateButton);
			echo form_button($cancelAddButton);
			echo form_button($deleteButton);
			echo form_close();					
		?>
	</div>
</div>