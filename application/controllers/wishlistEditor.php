<?php
require_once APPPATH . "/libraries/simple_html_dom.php";

class WishlistEditor extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('wishlist_model');
	}

	public function showAddOptions() {
		$this->load->helper('form');
		$this->load->view('wishlisteditor/addoptions_form');
	}

	public function addByUrl() {
		$productUrl = $_POST['product-url'];

		$html = file_get_html($productUrl);
		
		$widthReq = 300;
		$validImages = array();
		foreach($html->find('img') as $image) {
			// If img src is valid URL, check its dimensions - we only want images with big enough width
			if(filter_var($image->src, FILTER_VALIDATE_URL)) {
				$imageDimensions = @getimagesize($image->src);
				if($imageDimensions && $imageDimensions[0] >= $widthReq && $imageDimensions[1] >= $widthReq) {
					array_push($validImages, $image->src);
				}
			}
		}

		$productInfo = array();

		$productInfo['productUrl'] = $productUrl;

		$title = $html->find('title');
		$productInfo['productName'] = $title[0]->plaintext;

		if(count($validImages) > 0) {
			$productInfo['image'] = $validImages[0];
		}

		echo json_encode($productInfo);
	}

	public function addByUpload() {
		$config['upload_path'] = './assets/images/products/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		
		$this->load->library('upload', $config);
		
		$image = $this->upload->do_upload('product-image');
		
		if (!$image) {
			echo $this->upload->display_errors();
		}
		
		$imageData = $this->upload->data();

		$productInfo['image'] = '/assets/images/products/' . $imageData['file_name'];
		$productInfo['filename'] = $imageData['file_name'];

		echo json_encode($productInfo);
	}

	public function showAddToWishlist() {
		$this->load->helper('form');
		$this->load->view('wishlisteditor/addtowishlist_form.php');
	}

	public function addToWishlist() {
		$wishInfo = array(
			'url'									=>	$_POST['product-url'],
			'name'								=>	$_POST['product-name'],
			'brand'								=>	$_POST['product-brand'],
			'price' 							=>	$_POST['product-price'],
			'description'					=>	$_POST['product-description'],
			'wisher_id'						=>	$this->session->userdata('userid'),
			'date'								=>	date('Y-m-d'),
			'original_wisher_id'	=>	$this->session->userdata('userid'),
			'image_path'					=>	$_POST['product-image'],
		);

		$primaryWishlistId = $this->wishlist_model->get_primary_wishlist($this->session->userdata('userid'));
		$this->wishlist_model->addWish($wishInfo, $primaryWishlistId);

		redirect('/profile/view/' . $this->session->userdata('userid'));
	}

	public function deleteUpload($filename) {
		unlink($_SERVER['DOCUMENT_ROOT'] . '/assets/images/products/' . $filename);
	}

	public function showEditWishInfo() {
		$this->load->helper('form');
		$this->load->view('wishlisteditor/editwishinfo_form.php');

		echo "Hi";
	}

	public function editWishInfo() {
		$wishId = $_POST['wish-id'];

		$wishInfo = array(
			'url'			=>	$_POST['product-url'],
			'name'		=>	$_POST['product-name'],
			'brand'		=>	$_POST['product-brand'],
			'price' 	=>	$_POST['product-price'],
		);

		$this->wishlist_model->updateWish($wishId, $wishInfo);

		$wishInfo['wishName'] = $_POST['product-name'];
		$wishInfo['wishId'] = $wishId;
		echo json_encode($wishInfo);
	}

	public function deleteFromWishlist() {
		$wishId = $_POST['wish-id'];
		if ($this->wishlist_model->deleteWish($wishId)) {
			$msg = "Wish deleted!\n";
		} else {
			$msg = "Error\n";
		}
		echo $msg;
	}
}