<?php
class Login extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('loginModel');
	}
	public function index(){
		if($this->session->userdata("is_login") == true){
			$this->session->unset_userdata();
			$this->session->sess_destroy();
		}
		$data['title'] = "CashonWallet";
		$this->load->view("admin/login",$data);
	}
	
	
	function login_check(){
		$query = $this->loginModel->validate();
	
		if($query['is_login']){  //if user validation return true after validation
			$this->session->set_userdata($query);
			//echo $query['login_type'];
			redirect(base_url()."ajax/index");
		}
		else{ // if user not validate the credential ....
			redirect(base_url()."login/index/authFalse");
		}
	}
	
	public function logout()
	{
	    $this->session->unset_userdata();
	    $this->session->sess_destroy();
	    redirect('login');
	}

	function smssetting(){
		
		$data['title'] = "Sms setting";
		$data['smallTitle'] = "Sms Detail";
		$data['bigTitle'] = "Sms";
	
		$data['headerCss'] = "admin/headerCss/dailyExpenseCss";
		$data['footerJs'] = "admin/footerJs/dailyExpenseJs";

	
			$data['body'] = "smssetting";

		$this->load->view("include/admin/mainContent",$data);

		
	}
	
	}
?>