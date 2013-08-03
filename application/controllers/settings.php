<?php

class Settings extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}

	public function showSignup($message = '') {
		$this->load->helper('form');

		$this->message = $message;
		$this->load->view('templates/header_view');
		$this->load->view('settings/signup_form');
	}

	public function signupUser() {
		$userInfo = array(
			'email' 		=> 	$_POST['email'],
			'password' 		=> 	md5($_POST['password']),
			'firstname'		=> 	$_POST['firstname'],
			'lastname'		=> 	$_POST['lastname'],
			'location' 		=> 	$_POST['location'],
			'description'	=> 	$_POST['description'],
		);

		// If the passwords that the user provided do not match, show error
		if($userInfo['password'] != md5($_POST['repeat-password'])) {
			$this->showSignup();
		}

		$this->user_model->addNewUser($userInfo);
		if($this->user_model->validateUser($userInfo['email'], $userInfo['password'])) {
			redirect('/profile/view/' . $this->session->userdata('userid'));
		} else {
			$this->session->sess_destroy();
			redirect('/');
		}
	}

	public function showEditAccount($message = '') {
		if (!$this->session->userdata('isLoggedIn')) {
	        redirect('/login/');
	    }

		$this->userinfo = $this->user_model->getUserInfo($this->session->userdata('userid'));

		$this->load->helper('form');

		$this->message = $message;
		$this->load->view('templates/header_view');
		$this->load->view('settings/editaccount_form');
	}

	public function editAccount() {
		if($_POST['email']) {
			$userInfo['email'] = $_POST['email'];
		}
		if($_POST['password'] != $_POST['repeat-password']) {
			$this->showEditAccount('New passwords do not match. Please try again.');
		}
	}

	public function showUpdateInfo($message = '') {
		if (!$this->session->userdata('isLoggedIn')) {
	        redirect('/login/');
	    }

	    $this->userInfo = $this->user_model->getUserInfo($this->session->userdata('userid'));

	    $this->load->helper('form');

		$this->message = $message;
		$this->load->view('templates/header_view');
		$this->load->view('settings/updateinfo_form');
	}

	public function updateInfo() {
		if ($_FILES['image']['name']) {
			$config['upload_path'] = './assets/images/users/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
		
			$this->load->library('upload', $config);
		
			$image = $this->upload->do_upload('image');
			if(!$image) {
				echo $this->upload->display_errors();
			}

			$newImagePath = '/assets/images/users/' . $_FILES['image']['name'];
		} else {
			$newImagePath = '';
		}

		$updatedInfo = array(
			'firstname'		=> 	$_POST['firstname'],
			'lastname'		=> 	$_POST['lastname'],
			'location' 		=> 	$_POST['location'],
			'description'	=> 	$_POST['description'],
			'image_path'	=>	$newImagePath
		);

		if($this->user_model->setUserInfo($updatedInfo)) {
			redirect('/profile/view/' . $this->session->userdata('userid'));
		} else {
			$this->showUpdateInfo('failure');
		}
	}

	public function deleteAccount() {
		$this->user_model->deleteUser($this->session->userdata('userid'));
		
		$this->session->sess_destroy();
		redirect('/');
	}
}