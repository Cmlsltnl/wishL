<div class="form-wrapper">
	<div class="form-header">
		<h1>
			Update Info
			<div class="close-form close-modal">[close]</div>
		</h1>
	</div>

	<div class="form-contents">
		<?php
			echo form_open_multipart('settings/updateInfo');

			$firstnameInput = array(
			    'name'        => 'firstname',
			    'class'       => 'text-input',
			    'value'       => $this->userInfo->firstname,
			    'maxlength'   => '20',
			    'size'        => '50',
			);

			echo form_label('First Name', 'firstname', array('class' => 'form-label'));
			echo form_input($firstnameInput) . "</br>";

			$lastnameInput = array(
			    'name'        => 'lastname',
			    'class'       => 'text-input',
			    'value'       => $this->userInfo->lastname,
			    'maxlength'   => '20',
			    'size'        => '50',
			);

			echo form_label('Last Name', 'lastname', array('class' => 'form-label'));
			echo form_input($lastnameInput) . "</br>";

			$locationInput = array(
			    'name'        => 'location',
			    'class'       => 'text-input',
			    'value'       => $this->userInfo->location,
			    'maxlength'   => '40',
			    'size'        => '50',
			);

			echo form_label('Location', 'location', array('class' => 'form-label'));
			echo form_input($locationInput) . "</br>";

			$descriptionInput = array(
			    'name'        => 'description',
			    'class'       => 'text-input',
			    'value'       => $this->userInfo->description,
			    'maxlength'   => '250',
			    'rows'		  => '5',
			);

			echo form_label('Description', 'description', array('class' => 'form-label'));
			echo form_textarea($descriptionInput) . "</br>";

			$imageInput = array(
			    'name'		  => 'image',
			    'class'       => 'text-input',
			);

			echo form_label('Profile picture', 'image', array('class' => 'form-label'));
			echo form_upload($imageInput) . "</br></br>";

			$cancelUpdateButton = array(
				'name' => 'cancel',
				'class' => 'close-modal button grey pull-right',
				'content' => 'Cancel',
			);

			$updateButton = array(
			    'name' => 'update',
			    'class' => 'button blue pull-right',
			    'value' => 'Update Info',
			);

			echo form_submit($updateButton);
			echo form_button($cancelUpdateButton);
			echo form_close();
		?>
	</div>
</div>