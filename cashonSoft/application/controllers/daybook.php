<?php
class daybook extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->is_login();
		$this->load->model("tree");
	}
	function is_login()
	{
	     $now = date("H:i:s");
		  if($now > $this->session->userdata('expire'))
 
    {
 
       
 
         $this->session->unset_userdata();
        $this->session->sess_destroy();
        redirect('welcome/login');
 
    }
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


	public function dailyIncome(){
		$this->load->model("income_model");
		$getstr = $this->income_model->dailyincome();
		$data['getstr']=$getstr;
		$data['pageTitle'] = 'Daily Base Income';
        $data['smallTitle'] = $this->session->userdata("name").' (Daily Base Income)';
        $data['mainPage'] = '(Daily Base Income';
        $data['subPage'] = '(Daily Base Income';
        $data['title'] = '(Daily Base Income';
        $data['headerCss'] = 'headerCss/loginCss';
        $data['footerJs'] = 'footerJs/loginJs';
        $data['mainContent'] = 'dailybaseincome';
        $this->load->view("includes/mainContent", $data);
	}
	public function poolIncome(){
		$this->load->model("income_model");
		$getstr = $this->income_model->poolincome();
		$data['getstr']=$getstr;
		$data['pageTitle'] = 'Pool income';
        $data['smallTitle'] = $this->session->userdata("name").' (Auto Pool Income)';
        $data['mainPage'] = 'Pool income';
        $data['subPage'] = 'Pool income';
        $data['title'] = 'Pool income';
        $data['headerCss'] = 'headerCss/loginCss';
        $data['footerJs'] = 'footerJs/loginJs';
        $data['mainContent'] = 'poolincome';
        $this->load->view("includes/mainContent", $data);
	}
	public function royalityIncome(){
		$this->load->model("income_model");
		$getstr = $this->income_model->roylityincome();
		$data['getstr']=$getstr;
		$data['pageTitle'] = 'Core Committee Income';
        $data['smallTitle'] =  $this->session->userdata("name").' (Core Committee Income)';
        $data['mainPage'] = 'Core Committee';
        $data['subPage'] = 'Core Committee';
        $data['title'] = 'Core Committee';
        $data['headerCss'] = 'headerCss/loginCss';
        $data['footerJs'] = 'footerJs/loginJs';
        $data['mainContent'] = 'roulty';
        $this->load->view("includes/mainContent", $data);
	}
	public function notimeIncome(){
		$this->load->model("income_model");
		$getstr = $this->income_model->notimereward();
		$data['getstr']=$getstr;
		$data['pageTitle'] = 'No Time Revenue';
        $data['smallTitle'] = 'No time income';
        $data['mainPage'] = 'No time income';
        $data['subPage'] = 'No time income';
        $data['title'] = 'No time income';
        $data['headerCss'] = 'headerCss/loginCss';
        $data['footerJs'] = 'footerJs/loginJs';
        $data['mainContent'] = 'notimerew';
        $this->load->view("includes/mainContent", $data);
	}
	public function timetoIncome(){
		$this->load->model("income_model");
		$getstr = $this->income_model->timetoreward();
		$data['getstr']=$getstr;
		$data['pageTitle'] = 'Time to time income';
        $data['smallTitle'] = 'Time to time income';
        $data['mainPage'] = 'Time to time income';
        $data['subPage'] = 'Time to time imcome';
        $data['title'] = 'Time to time income';
        $data['headerCss'] = 'headerCss/loginCss';
        $data['footerJs'] = 'footerJs/loginJs';
        $data['mainContent'] = 'timetotimerew';
        $this->load->view("includes/mainContent", $data);
	}
	public function pairIncome(){
		$this->load->model("income_model");
		$getstr = $this->income_model->pairincome();
		$data['getstr']=$getstr;
		$data['pageTitle'] = 'Pairs';
        $data['smallTitle'] = $this->session->userdata("name").' (Pair Matching Income)';
        $data['mainPage'] = 'Pairs';
        $data['subPage'] = ' Pairs';
        $data['title'] = ' Pairs';
        $data['headerCss'] = 'headerCss/loginCss';
        $data['footerJs'] = 'footerJs/loginJs';
        $data['mainContent'] = 'pairmatch';
        $this->load->view("includes/mainContent", $data);
	}
	public function dayBook(){
		$this->load->model("income_model");
		$getstr = $this->income_model->daybook();
		$data['getstr']=$getstr;
		$data['pageTitle'] = 'Daybook';
        $data['smallTitle'] = $this->session->userdata("name").' (DayBook)';;
        $data['mainPage'] = 'DayBook & Details';
        $data['subPage'] = 'DayBook & Details';
        $data['title'] = 'DayBook & Details';
        $data['headerCss'] = 'headerCss/loginCss';
        $data['footerJs'] = 'footerJs/loginJs';
        $data['mainContent'] = 'daybook';
        $this->load->view("includes/mainContent", $data);
	}
	
	public function poolPosition(){
	   $getstr= $this->db->get("pool_master");
	
		$data['getstr']=$getstr;
		$data['pageTitle'] = 'Pool level position';
        $data['smallTitle'] = $this->session->userdata("name").' (DayBook)';;
        $data['mainPage'] = 'Pool  & Details';
        $data['subPage'] = 'Pool & Details';
        $data['title'] = 'Pool Position & Details';
        $data['headerCss'] = 'headerCss/loginCss';
        $data['footerJs'] = 'footerJs/loginJs';
        $data['mainContent'] = 'poolPosition';
        $this->load->view("includes/mainContent", $data);
	}
}