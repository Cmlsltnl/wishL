<?php

class Profile extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('user_model');
		$this->load->model('wishlist_model');
	}

	public function view($userid, $wishlistId = 0) {
		$this->userInfo = $this->user_model->getUserInfo($userid);
		
		if(!$this->userInfo) {
			$this->userNotFound = true;
		} else {
			$this->userNotFound = false;
			$this->userInfo->fullname = $this->userInfo->firstname . " " . $this->userInfo->lastname;
		}

		$this->wishlists = $this->wishlist_model->getWishlists($userid);

		if($wishlistId != 0) {
			$this->displayedWishlistId = $wishlistId;
		} else {
			$this->displayedWishlistId = $this->user_model->getPrimaryWishlist($userid);
		}

		$wishIds = $this->wishlist_model->get_wishes($this->displayedWishlistId);

		$this->wishes = array();
		foreach ($wishIds as $wishId) {
			array_push($this->wishes, $this->wishlist_model->get_wish_info($wishId));
		}

		$this->load->view('templates/header_view');
		$this->load->view('profile/wishlist_view');
	}
}