<style type="text/css">
	.big-wish-container {
		width: 800px;
	}

	.big-wish-image {
		float: left;
		height: 400px;
		width: 400px;
		border-right: 1px solid #C7BFB1;
	}

	.big-wish-info {
		float: right;
		position: relative;
		width: 358px;
		height: 360px;
		padding: 20px;
		background-color: #E7DECE;
	}

	.big-product-name {
		font-size: 18px;
		font-weight: bold;
	}

	.big-product-brand {
		font-size: 14px;
		color: #383734;
	}

	.bottom {
		position: absolute;
		bottom: 0;
		overflow: hidden;
	}

	.big-product-description {
		font-family: Georgia;
		max-width: 358px;
		color: #898989;
	}

	.big-button-wrapper {
		margin: 20px 0;
		padding: 4px 0;
	}
</style>

<div class="big-wish-container">
	<img class="big-wish-image" src="<?php echo $this->wish->image_path ?>" />
	<div class="big-wish-info">
		<div class="big-product-name"><?php echo $this->wish->name ?></div>
		<div class="big-product-brand"><?php echo $this->wish->brand ?></div>
		
		<div class="bottom">
			<div class="big-product-description"><?php echo $this->wish->description ?></div>
			
			<div class="big-button-wrapper">
				<button class="black button" style="font-size: 16px;">Buy</button>
				<button class="blue button" style="font-size: 16px;">Rewish</button>
			</div>
		</div>
	</div>
</div>