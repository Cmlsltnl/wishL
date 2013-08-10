<div class="form-header">
<h1>
	Update Info
	<div class="close-modal pull-right" style="font-weight:normal; font-size: 12px;">[close]</div>
</h1>
</div>
<div class="message">
	<?php
		$this->message = '';
		if ($this->message == 'success') {
			echo "<div class=\"success-msg\">Info successfully updated.</div></br>";
		} else if ($this->message == 'failure') {
			echo "<div class=\"error-msg\">Info unable to be updated.</div></br>";
		}
	?>
</div>
<div class="form-contents">
	<?php
		/* Update Info Form */
		echo form_open_multipart('settings/updateInfo');

		$firstnameInput = array(
		    'name'        => 'firstname',
		    'class'       => 'text-input',
		    'value'       => $this->userInfo->firstname,
		    'maxlength'   => '20',
		    'size'        => '50',
		);

		echo "<div class=\"text-label\">" . form_label('First Name', 'firstname') . "</div>";
		echo form_input($firstnameInput);
		echo "</br>";

		$lastnameInput = array(
		    'name'        => 'lastname',
		    'class'       => 'text-input',
		    'value'       => $this->userInfo->lastname,
		    'maxlength'   => '20',
		    'size'        => '50',
		);

		echo "<div class=\"text-label\">" . form_label('Last Name', 'lastname') . "</div>";
		echo form_input($lastnameInput);
		echo "</br>";

		$locationInput = array(
		    'name'        => 'location',
		    'class'       => 'text-input',
		    'value'       => $this->userInfo->location,
		    'maxlength'   => '40',
		    'size'        => '50',
		);

		echo "<div class=\"text-label\">" . form_label('Location', 'location') . "</div>";
		echo form_input($locationInput);
		echo "</br>";

		$descriptionInput = array(
		    'name'        => 'description',
		    'class'       => 'text-input',
		    'value'       => $this->userInfo->description,
		    'maxlength'   => '250',
		    'rows'		  => '5',
		);

		echo "<div class=\"text-label\">" . form_label('Description', 'description') . "</div>";
		echo form_textarea($descriptionInput);
		echo "</br>";

		$imageInput = array(
		    'name'		  => 'image',
		    'class'       => 'text-input',
		);

		echo "<div class=\"text-label\">" . form_label('Profile picture', 'image') . "</div>";
		echo form_upload($imageInput);
		echo "</br></br>";

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