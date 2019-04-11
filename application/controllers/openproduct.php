<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Openproduct extends CI_Controller{

	function  __construct(){
		parent::__construct();

		// Load cart library
		$this->load->library('cart');

		// Load Shopping_cart_model model
		$this->load->model('Shopping_cart_model');
	}

	function index(){
		$data = array();

		// Retrieve cart data from the session
       // $data['cartItems'] = $this->cart->contents();
      // echo "<pre>";
      // print_r($data);
		// Load the cart view
        $data['title'] = 'Check Product';
        $data['cartItems'] = $this->cart->contents();
      //  $data['cart']  = $this->cart->contents();
        $this->load->view("openproduct", $data,'refresh');
	}

	function updateItemQty(){
		$update = 0;

		// Get cart item info
		$rowid = $this->input->get('rowid');
		$qty = $this->input->get('qty');

		// Update item in the cart
		if(!empty($rowid) && !empty($qty)){
			$data = array(
				'rowid' => $rowid,
				'qty'   => $qty
			);
			$update = $this->cart->update($data);
		}

		// Return response
        echo $update?'ok':'err';
	}

	function removeItem($rowid){
		// Remove item from cart
		$remove = $this->cart->remove($rowid);

		// Redirect to the cart page
		redirect('openproduct/');
	}

}