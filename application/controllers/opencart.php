<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Opencart extends CI_Controller{

	function  __construct(){
		parent::__construct();

		// Load cart library
		$this->load->library('cart');

		// Load Shopping_cart_model model
		$this->load->model('Shopping_cart_model');
	}

	function index(){

        $data['title'] = 'Cart';
        $data['cartItems'] = $this->cart->contents();
        $this->load->view("cart",$data);
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
		redirect('opencart/');
	}

}