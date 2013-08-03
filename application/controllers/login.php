<?php

class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index() {
		if ($this->session->userdata('isLoggedIn')) {
	        redirect('/profile/view/' . $this->session->userdata('userid'));
	    } else {
	        $this->showLogin(false);
	    }
	}

	public function showLogin($showError = false) {
		$this->showError = $showError;

		$this->load->helper('form');

		$this->load->view('templates/header_view');
		$this->load->view('login/login_view');
	}

	public function loginUser() {
		$this->load->model('user_model');

		$email = $_POST['email'];
		$password = md5($_POST['password']);

		if ($email && $password && $this->user_model->validateUser($email, $password)) {
			redirect('/profile/view/' . $this->session->userdata('userid'));
		} else {
			$this->showLogin(true);
		}
	}

	public function logoutUser() {
		$this->session->sess_destroy();
		$this->showLogin(false);
	}
}