<?php

class WishlistEditor extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('wishlist_model');
	}

	public function addToWishlist() {
		$config['upload_path'] = './assets/images/products/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		
		$this->load->library('upload', $config);
		
		$image = $this->upload->do_upload('product-image');
		if(!$image) {
			echo $this->upload->display_errors();
		}

		$wishInfo = array(
			'name'					=> 	$_POST['product-name'],
			'brand'					=> 	$_POST['product-brand'],
			'price' 				=> 	$_POST['product-price'],
			'description'			=> 	$_POST['product-description'],
			'wisher_id'				=>	$this->session->userdata('userid'),
			'date'					=>	date('Y-m-d'),
			'original_wisher_id'	=> 	$this->session->userdata('userid'),
			'image_path'			=> 	'/assets/images/products/' . $_FILES['product-image']['name']
		);

		$primaryWishlistId = $this->wishlist_model->get_primary_wishlist($this->session->userdata('userid'));
		$this->wishlist_model->addWish($wishInfo, $primaryWishlistId);

		redirect('/profile/view/' . $this->session->userdata('userid'));
	}
}