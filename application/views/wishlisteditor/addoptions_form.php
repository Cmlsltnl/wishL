<div class="form-wrapper">
	<div class="form-header">
		<h1>
			Add to Wishlist
			<div class="close-form close-modal">[close]</div>
		</h1>
	</div>

	<div class="form-contents">
		<?php
			/* Dropdown for add options */
			$options = array(
				'addbyurl' 		=>	'Add by URL',
				'addbyupload' 	=>	'Add by upload',
			);

			$addDropdown = 'id="add-dropdown" class="dropdown-input"';
			echo form_dropdown('adddropdown', $options, 'addbyurl', $addDropdown) . "</br>";


			/* Add by URL form */
			$urlFormAttributes = array('id' => 'addbyurl-form');
			echo form_open('wishlistEditor/addByUrl', $urlFormAttributes);
			
			$productUrlInput = array(
			    'name'        => 'product-url',
			    'class'       => 'text-input',
			    'placeholder' => 'http://',
			    'maxlength'   => '250',
			);

			echo form_label('Product URL', 'product-url', array('class' => 'form-label'));
			echo form_input($productUrlInput) . "</br>";

			$cancelAddButton = array(
				'name' => 'cancel',
				'class' => 'close-modal button grey pull-right',
				'content' => 'Cancel',
			);

			$addButton = array(
			    'name' => 'add',
			    'class' => 'button blue pull-right',
			    'value' => 'Add URL',
			);

			echo '<img src="/assets/images/loading.gif" id="loading-image" class="pull-right" style="display: none;">';

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

			echo form_label('Product image', 'product-image', array('class' => 'form-label'));
			echo form_upload($productImageInput) . "</br>";

			$cancelAddButton = array(
				'name' => 'cancel',
				'class' => 'close-modal button grey pull-right',
				'content' => 'Cancel',
			);

			$uploadButton = array(
			    'name' => 'upload',
			    'class' => 'button blue pull-right',
			    'value' => 'Upload',
			);

			echo '<img src="/assets/images/loading.gif" id="loading-image" class="pull-right" style="display: none;">';

			echo form_submit($uploadButton);
			echo form_button($cancelAddButton);
			echo form_close();						
		?>
	</div>
</div>