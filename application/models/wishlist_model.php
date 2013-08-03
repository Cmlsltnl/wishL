<?php

class Wishlist_model extends CI_Model {
    var $details;

    function __construct()
    {
        parent::__construct();
    }

    function get_primary_wishlist($userid) {
    	$sql = "SELECT wishlist_id FROM wishlist WHERE owner_id = ?";
    	$query = $this->db->query($sql, array($userid));
    	$result = $query->result();

    	if (is_array($result) && count($result) == 1) {
	        return $result[0]->wishlist_id;
	    }

	    return false;
    }

    function get_wishes($wishlistid) {
    	$sql = "SELECT wish_id FROM wishlist_wish WHERE wishlist_id = ?";
    	$query = $this->db->query($sql, array($wishlistid));
    	$results = $query->result();

    	$wishes = array();
    	if (is_array($results)) {
    		foreach($results as $row) {
    			array_push($wishes, $row->wish_id);
    		}
	    }

	    return $wishes;
    }

    function get_wish_info($wishId) {
    	$sql = "SELECT * FROM wish WHERE wish_id = ?";
    	$query = $this->db->query($sql, array($wishId));
    	$result = $query->result();

    	if (is_array($result) && count($result) == 1) {
	        return $result[0];
	    }

	    return false;
    }

    function addWish($wishInfo, $wishlistId) {
        $this->db->insert('wish', $wishInfo);

        $wishlistWishInfo = array(
            'wish_id'       =>  $this->db->insert_id(),
            'wishlist_id'   =>  $wishlistId
        );
        $this->db->insert('wishlist_wish', $wishlistWishInfo);
    }

    function deleteWish($wishId) {
        if ($this->db->delete('wishlist_wish', array('wish_id' => $wishId))) {
        
            // Delete the wish's image    
            $sql = "SELECT image_path FROM wish WHERE wish_id = ?";
            $query = $this->db->query($sql, array($wishId));
            $result = $query->result();
            if (is_array($result) && count($result) == 1) {
                $record = $result[0];
                unlink($_SERVER['DOCUMENT_ROOT'] . $record->image_path);;
            }
            
            if ($this->db->delete('wish', array('wish_id' => $wishId))) {
                return true;
            }
        }
        return false;
    }
}