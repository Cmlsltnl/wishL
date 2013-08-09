<?php

class Profile extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('user_model');
		$this->load->model('wishlist_model');
	}

	public function view($userid) {
		$this->userInfo = $this->user_model->getUserInfo($userid);
		
		if(!$this->userInfo) {
			$this->userNotFound = true;
		} else {
			$this->userNotFound = false;
			$this->userInfo->fullname = $this->userInfo->firstname . " " . $this->userInfo->lastname;
		}

		$primaryWishlistId = $this->wishlist_model->get_primary_wishlist($userid);
		$wishIds = $this->wishlist_model->get_wishes($primaryWishlistId);

		$this->wishes = array();
		foreach ($wishIds as $wishId) {
			array_push($this->wishes, $this->wishlist_model->get_wish_info($wishId));
		}

		$this->load->view('templates/header_view');
		$this->load->view('profile/wishlist_view');
	}

	public function viewWish($wishId) {
		$this->wish = $this->wishlist_model->get_wish_info($wishId);
		$this->load->view('profile/wish_view');
	}
}