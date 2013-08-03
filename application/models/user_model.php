<?php

class User_model extends CI_Model {
    var $details;

    function __construct()
    {
        parent::__construct();
    }

	function validateUser($email, $password) {
	    // Queries database for user info and compares it against login info
	    $sql = "SELECT * FROM user WHERE email = ? AND password = ?";
	    $query = $this->db->query($sql, array($email, $password));
	    $login = $query->result();

	    // The results of the query are stored in $login.
	    // If a value exists, then the user account exists and is validated
	    if (is_array($login) && count($login) == 1) {
	        // Set the users details into the $details property of this class
	        $this->details = $login[0];
	        // Call set_session to set the user's session vars via CodeIgniter
	        $this->setSession();
	        return true;
	    }

	    return false;
	}

	function setSession() {
	    // session->set_userdata is a CodeIgniter function that
	    // stores data in a cookie in the user's browser.  Some of the values are built in
	    // to CodeIgniter, others are added (like the IP address).  See CodeIgniter's documentation for details.
	    $this->session->set_userdata(array(
	            'userid'=>$this->details->user_id,
	            'fullname'=> $this->details->firstname . ' ' . $this->details->lastname,
	            'email'=>$this->details->email,
	            'isLoggedIn'=>true,
	        )
	    );
	}

	function addUser($userInfo) {
		return $this->db->insert('user', $userInfo);
	}

	function deleteUser($userid) {
		return $this->db->delete('user', array('user_id' => $userid));
	}

	function getUserInfo($userid) {
		$sql = "SELECT * FROM user WHERE user_id = ?";
		$query = $this->db->query($sql, array($userid));
		$result = $query->result();

		if(count($result) == 0) {
			return false;
		}

		return $result[0];
	}

	function setUserInfo($updatedInfo) {
		$this->db->where('user_id', $this->session->userdata('userid'));
		$ifUpdated = $this->db->update('user', $updatedInfo);

		$this->session->set_userdata('fullname', $updatedInfo['firstname'] . ' ' . $updatedInfo['lastname']);

	    return $ifUpdated;
	}
}