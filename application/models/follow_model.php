<?php

class Follow_model extends CI_Model {
	function addFollow($followInfo) {
		return $this->db->insert('follow', $followInfo);
	}

	function deleteFollow($followInfo) {
		return $this->db->delete('follow', $followInfo);
	}

	function isFollowing($followerId, $followeeId) {
		$sql = "SELECT * FROM follow WHERE follower_id = ? AND followee_id = ? LIMIT 1";
		$query = $this->db->query($sql, array($followerId, $followeeId));
		$result = $query->result();

		if (count($result) == 1) {
			return true;
		}
		return false;
	}

	function getFollowees($userid) {
		$sql = "SELECT * FROM follow INNER JOIN user ON follow.followee_id = user.user_id WHERE follow.follower_id = ?";
		$query = $this->db->query($sql, array($userid));
		$results = $query->result();

		$followees = array();
		if (is_array($results) && count($results) > 0) {
			foreach($results as $row) {
				array_push($followees, $row);
			}
		}

		return $followees;
	}

	function getFollowers($userid) {
		$sql = "SELECT * FROM follow INNER JOIN user ON follow.follower_id = user.user_id WHERE follow.followee_id = ?";
		$query = $this->db->query($sql, array($userid));
		$results = $query->result();

		$followers = array();
		if (is_array($results) && count($results) > 0) {
			foreach($results as $row) {
				array_push($followers, $row);
			}
		}

		return $followers;
	}
}