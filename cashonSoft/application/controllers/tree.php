<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class tree extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->is_login();
	}
	

	function is_login() {

		$is_login = $this->session->userdata('is_login');
		$is_lock = $this->session->userdata('is_lock');
		$logtype = $this->session->userdata('login_type');
		/**
		 * checking the session is activate or not.
		 * if session is activated then it will redirect to dashboard othewise redirect on login page.
		 */
		if($is_login):
			// redirect('dashboard/index', 'refresh');
		else:
			redirect('welcome', 'refresh');
		endif;
	}

	function treeDetail() {

		$customerID = $this->input->post('customerID');
		$data['AllCounts'] = $this->dashboard_model->getDashboardCounts($customerID);		
		echo json_encode($data);
	}

}

?>