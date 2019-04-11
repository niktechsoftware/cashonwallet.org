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
	function getEmployee(){
	  $customer=  $this->input->post("customerid");
	    $this->db->where("username",$customer);
	   $getc =  $this->db->get("customer_info");
	   if($getc->num_rows()>0){
	       $fd  =  $getc->row();?>
	       <font color="green"><?php echo "ID Found ".$fd->customer_name;?></font>
	  <?php }else{?>
	       <font color="red"><?php echo "Wrong Username ";?></font>
	       
	  <?php }
	}

}

?>