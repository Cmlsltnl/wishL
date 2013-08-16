<?php

class Follow extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('follow_model');
	}

	public function followUser() {
		$followInfo = array(
			'follower_id' => $this->input->post('follower-id'),
			'followee_id' => $this->input->post('followee-id'),
		);

		if ($this->follow_model->addFollow($followInfo)) {
			echo "Success";
		}
	}

	public function unfollowUser() {
		$followInfo = array(
			'follower_id' => $this->input->post('follower-id'),
			'followee_id' => $this->input->post('followee-id'),
		);

		if ($this->follow_model->deleteFollow($followInfo)) {
			echo "Success";
		}
	}
}