<?php
class dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->is_login();
	}
	function is_login()
	{
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
			redirect('/welcome/login');
		endif;
	}

	public function generate_mpin_page()
	{
		$this->db->where("id", $this->session->userdata("customer_id"));
		$data1 = $this->db->get("customer_info")->row();
		$data['data'] = $data1;
	    $this->load->model('mpin');
	    $this->load->model('dashboard_model');
	    $data['AllCounts'] = $this->dashboard_model->getDashboardCounts($this->session->userdata("customer_id"));
	    $data['query'] = $this->mpin->select_mpin();
	    $data['pageTitle'] = 'Dashboard';
	    $data['smallTitle'] = ' Dashboard';
	    $data['mainPage'] = 'Customer Dashboard';
	    $data['subPage'] = 'Dashboard';
	    $data['title'] = 'Dashboard Home';
	    $data['headerCss'] = 'headerCss/loginCss';
	    $data['footerJs'] = 'footerJs/loginJs';
	    $data['mainContent'] = 'generatempin';
	    $this->load->view("includes/mainContent", $data);
	}

public function generate_mpin()
	{
		$ddamount =  $this->input->post("ddamount");
	    $mtype =  $this->input->post("mpinbal");

	    $this->load->model('mpin');
	    $this->load->model('dashboard_model');

	   $adminamount = 0;
	    $count=$this->input->post('number');
	    $data1=$this->mpin->generate_mpin();
	     $genAmoun =  $count*660;
	     $totwalet =  $this->dashboard_model->totalwallet($this->session->userdata("customer_id"));
	           if(($totwalet < $genAmoun)&&($mtype==1)){
	                   echo "insufficient balance"; 
	           }else{
	    
	               if(($data1->amount>=$ddamount)||($mtype==1))

	    { 
	        $subamount = 600;
	        $this->load->helper('string');
	        for($i=1;$i<$count+1;$i++)
	        {
	       $pin= random_string('numeric',6);
	       $data2 = array(
	           'mpin' => $pin,
	           'customerid' => $this->session->userdata("customer_id"),
	       );
	       if($mtype==1){
	            $rid  = $this->db->count_all_results('inner_daybook');
	           $rid =$rid+1;
	           $ivc = "CashonI".$rid;
	           $daybookdata = array(
	               'cid'             =>$this->session->userdata("customer_id"),
	               'amount'          =>660,
	               'debit_credit'     =>1,
	               'remark'           =>"Mpin by Income",
	               'date_time'       =>date("Y-m-d H:s:i"),
	               'invoice_number'   =>$ivc,
	               'plan_number'     =>10
	           );
	           $this->db->insert("inner_daybook",$daybookdata);

	           $adminamount=60;

	           $admin = array(
	               'cid'             =>$this->session->userdata("customer_id"),
	               'amount'          =>$adminamount,
	               'debit_credit'     =>1,
	               'remark'           =>"ADMIN CHARGES BY=".$this->session->userdata("customer_id"),
	               'date_time'       =>date("Y-m-d H:s:i"),
	               'invoice_number'   =>$ivc,
	               'plan_number'     =>10
	           );

	            $this->db->insert("inner_daybook",$admin);
	         
	       }
	       else{
	           $data=array(
	               'amount'=>$data1->amount - $subamount


	           );
	           $this->db->where('cid',$this->session->userdata("customer_id"));
	           $this->db->update('mbalance',$data);
	           $rid  = $this->db->count_all_results('inner_daybook');
	           $rid =$rid+1;
	           $ivc = "CashonI".$rid;
	           $daybookdata = array(
	               'cid'             =>$this->session->userdata("customer_id"),
	               'amount'          =>600,
	               'debit_credit'     =>1,
	               'remark'           =>"Mpin by M Balance",
	               'date_time'       =>date("Y-m-d H:s:i"),
	               'invoice_number'   =>$ivc,
	               'plan_number'     =>8
	           );
	           $this->db->insert("inner_daybook",$daybookdata);
	       }
	       $subamount=$subamount+600;
	       $insert = $this->db->insert('mpin', $data2);
	        }

	        redirect("dashboard/generate_mpin_page", 'refresh');
	    }
	     }/* else{
	            echo "insufficient balance";
	        } */

	    }


	public function activate_customerid()
	{

	    $cusid=$this->input->post('customerid');
	    $pin=$this->input->post('mpin');
	    $this->load->model('mpin');
	    $data1=$this->mpin->match_customerid($cusid);
	    $data2=$this->mpin->match_mpin($pin,$data1->id);
	   if($data1 && $data2)
	    {


	        $this->load->model('userdetail');
	        $this->userdetail->update_amount_status($data1->id);
	        $name = $this->input->post('customername');
	        $mpin = $this->input->post('mpin');
	        echo "<script>alert('Dear $name, Your Payment is successful, Wait For Account Activation');</script>";
	        $rid  = $this->db->count_all_results('inner_daybook');
	        $rid =$rid+1;
	        $ivc = "CashonI".$rid;
	        $daybookdata = array(
	            'cid'             =>$data1->id,
	            'amount'          =>600.0,
	            'debit_credit'     =>0,
	            'remark'           =>$mpin."",
	            'date_time'       =>date("Y-m-d H:s:i"),
	            'invoice_number'   =>$ivc,
	            'plan_number'     =>8
	        );

		  $mpinstatus['status']=1;
		  $mpinstatus['active_mpin_date']=date('Y-m-d H:i:s');
		  $mpinstatus['id_active']=$cusid;

		  $this->db->where("position !=",0);
		  $getpt = $this->db->get("customer_info");


		  $getpool = $this->db->get("pool_master");
		  $count =0;
		  $totcus = $getpt->num_rows();
		  foreach($getpool->result() as $gpool):
		  if($count<1){
		      if($gpool->team > $totcus ){
		          $data['position']=$gpool->level;
		          $count=$count+1;
		      }
		      $totcus=$totcus-$gpool->team;
		  }
		  endforeach;
		  $this->db->where("id",$data1->id);
		  $this->db->update("customer_info",$data);

		  $this->load->helper('sms');
		  $this->db->where("mpin",$data2->mpin);
	        $this->db->update("mpin",$mpinstatus);

	        $this->db->insert("inner_daybook",$daybookdata);
	        $mobile1  = $data1->mobilenumber;
	        $sms = "Dear ".$data1->customer_name." Your Account is Activated successfully By MPIN ".$pin.".Thanks Cashonwallet.org";
	        sms($mobile1,$sms);

	        $this->db->where("mpin",$pin);
	        $this->db->where("status",1);
	        $cmid  = $this->db->get("mpin")->row()->customerid;
	        $this->db->where("id",$cmid);
	        $cdata = $this->db->get("customer_info")->row();

	        $mobile12  = $cdata->mobilenumber;
	        $sms1 = "Dear ".$cdata->customer_name." Your Mpin ".$pin." is Successfully apply to activate userid ".$data1->username." Thanks and visit Cashonwallet.org for conformation.";
	        sms($mobile12,$sms1);
	        redirect("dashboard/index", 'refresh');
	    }
	    else ;
	    {
	        $name = $this->session->userdata('name');
	        echo "<script>alert('Dear $name, Your Payment is Failed, Used, Not present in Tree or Incorrect Mpin Try Again');</script>";

	        redirect("dashboard/index", 'refresh');
	    }


	}

	public function update_customer_table()
	{
	   // $this->session->userdata('customer_id');
	    $data=array(

	        'dob'=>$this->input->post('dob'),
	        'current_address'=>$this->input->post('cadd'),
	        'permanent_address'=>$this->input->post('padd'),
	        'city'=>$this->input->post('city'),
	        'state'=>$this->input->post('state'),
	        'pin'=>$this->input->post('pin'),
	        'pannumber'=>$this->input->post('pan'),
	        'adhaarnumber'=>$this->input->post('adhaar'),
	        'bankname'=>$this->input->post('bankname'),
	        'ifsccode'=>$this->input->post('ifsc'),
	        'branchname'=>$this->input->post('branchname'),

	    );

	    $this->load->model('userdetail');
	    $this->userdetail->update_customer_table($data);
	    If($data)
	    {
	        redirect("dashboard/profile_info", 'refresh');
	    }
	}

	function index()
	{
		$loginType = $this->session->userdata("login_type");
		$this->db->where("id", $this->session->userdata("customer_id"));
		$data1 = $this->db->get("customer_info")->row();

		$this->load->model("dashboard_model");

		$data['data'] = $data1;
		$data['AllCounts'] = $this->dashboard_model->getDashboardCounts($this->session->userdata("customer_id"));
		$data['pageTitle'] = 'Dashboard';
		$data['smallTitle'] = $this->session->userdata("name").' (DashBoard)';
		$data['mainPage'] = 'Dashboard';
		$data['subPage'] = 'Dashboard';
		$data['title'] = 'Dashboard';
		$data['headerCss'] = 'headerCss/loginCss';
		$data['footerJs'] = 'footerJs/loginJs';
		$data['mainContent'] = 'dashboard';
		$this->load->view("includes/mainContent", $data);
	}


	function profile_info()
	{
		$loginType = $this->session->userdata("login_type");

		$this->db->where("id", $this->session->userdata("customer_id"));
		$data1 = $this->db->get("customer_info")->row();
		$data['data'] = $data1;


		$data['pageTitle'] = 'Profile Info';
		$data['smallTitle'] = $this->session->userdata("name").' (Profile Information)';
		$data['mainPage'] = 'Profile Information';
		$data['subPage'] = 'Profile Information';
		$data['title'] = 'Profile Info';
		$data['headerCss'] = 'headerCss/loginCss';
		$data['footerJs'] = 'footerJs/loginJs';
		$data['mainContent'] = 'profile_info';
		$this->load->view("includes/mainContent", $data);
	}
function account_info()
	{
		$loginType = $this->session->userdata("login_type");

		$this->db->where("id", $this->session->userdata("customer_id"));
		$data1 = $this->db->get("customer_info")->row();
		$data['data'] = $data1;


		$data['pageTitle'] = 'Account Info';
		$data['smallTitle'] = $this->session->userdata("name").' (Profile Information)';
		$data['mainPage'] = 'Account Information';
		$data['subPage'] = 'Account Information';
		$data['title'] = 'Profile Info';
		$data['headerCss'] = 'headerCss/loginCss';
		$data['footerJs'] = 'footerJs/loginJs';
		$data['mainContent'] = 'account_info';
		$this->load->view("includes/mainContent", $data);
	}

public function update_account_table()
	{
		$this->session->userdata('customer_id');
		$photo_name1 = time().trim($_FILES['passbookphoto']['name']);
		$photo_name2 = time().trim($_FILES['adhaarfrontphoto']['name']);
		$photo_name3 = time().trim($_FILES['adhaarbackphoto']['name']);
	    $data=array(


	        'bankname'=>$this->input->post('bankname'),
	        'account_no'=>$this->input->post('account'),
	        'ifsccode'=>$this->input->post('ifsc'),
			'branchname'=>$this->input->post('branchname'),
			'bank_passbook_photo'=>$photo_name1,
	        'adhaarnumber'=>$this->input->post('adhaar'),
	        'adhaar_front_photo'=>$photo_name2,
	        'adhaar_back_photo'=>$photo_name3,

	    );
		$this->load->library('upload');
		$image_path = realpath(APPPATH . '../admin/assets/kycimages');
		$config['upload_path'] = $image_path;
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '1048';
		$config['file_name'] = $photo_name1;
		if (!empty($_FILES['passbookphoto']['name'])) {
            $this->upload->initialize($config);
			$this->upload->do_upload('passbookphoto');
		   
		}
		else{
            echo "Somthing going wrong. Please Contact Site administrator";
		}
		
		$this->load->library('upload');
		$image_path = realpath(APPPATH . '../admin/assets/kycimages');
		$config['upload_path'] = $image_path;
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '1048';
		$config['file_name'] = $photo_name2;
		if (!empty($_FILES['adhaarfrontphoto']['name'])) {
            $this->upload->initialize($config);
			$this->upload->do_upload('adhaarfrontphoto');
		   
		}
		else{
            echo "Somthing going wrong. Please Contact Site administrator";
		}
		
		$this->load->library('upload');
		$image_path = realpath(APPPATH . '../admin/assets/kycimages');
		$config['upload_path'] = $image_path;
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '1048';
		$config['file_name'] = $photo_name3;
		if (!empty($_FILES['adhaarbackphoto']['name'])) {
            $this->upload->initialize($config);
			$this->upload->do_upload('adhaarbackphoto');
		   
		}
		else{
            echo "Somthing going wrong. Please Contact Site administrator";
		}
	    $this->load->model('userdetail');
	   $data1= $this->userdetail->update_customer_table($data);
	    If($data1)
	    {
			
	        redirect("dashboard/account_info", 'refresh');
		}
		
	}
	
	function add()
	{
	    // Set array for send data.
		$insert_data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'image' => $this->input->post('image'),
			'qty' => 1
		);
	    // This function add items into cart.
		$this->cart->insert($insert_data);
		echo $fefe = count($this->cart->contents());
	    // This will show insert data in cart.
	}
	function remove()
	{
		$rowid = $this->input->post('rowid');
	    // Check rowid value.
		if ($rowid === "all") {
	        // Destroy data which store in session.
			$this->cart->destroy();
		} else {
	        // Destroy selected rowid in session.
			$data = array(
				'rowid' => $rowid,
				'qty' => 0
			);
	        // Update cart data, after cancel.
			$this->cart->update($data);
		}
		echo $fefe = count($this->cart->contents());
	    // This will show cancel data in cart.
	}




	function update_cart()
	{
	    // Recieve post values,calcute them and update
		$rowid = $_POST['rowid'];
		$price = $_POST['price'];
		$amount = $price * $_POST['qty'];
		$qty = $_POST['qty'];

		$data = array(
			'rowid' => $rowid,
			'price' => $price,
			'amount' => $amount,
			'qty' => $qty
		);
		$this->cart->update($data);
		echo $data['amount'];
	}

	function billing_view()
	{
	    // Load "billing_view".
		$this->load->view('billing_view');
	}

	public function save_order()
	{
	    // This will store all values which inserted from user.
		$customer = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
			'phone' => $this->input->post('phone')
		);
	    //print_r( $customer);
	    // And store user information in database.
		$cust_id = $this->shopping_cart_model->insert_customer($customer);
		$order = array(
			'date' => date('Y-m-d'),
			'customerid' => $cust_id

		);
		$ord_id = $this->shopping_cart_model->insert_order($order);
		if ($cart = $this->cart->contents()) :
			foreach ($cart as $item) :
			$order_detail = array(
			'orderid' => $ord_id,
			'productid' => $item['id'],
			'quantity' => $item['qty'],
			'price' => $item['price']
		);

	    // Insert product imformation with order detail, store in cart also store in database.

		$cust_id = $this->shopping_cart_model->insert_order_detail($order_detail);
		endforeach;
		endif;
		$this->cart->destroy();

	    // After storing all imformation in database load "billing_success".
		$this->load->view('billing_success');
	}



	public function opencart()
	{
		$data['cart'] = $this->cart->contents();
		$this->load->view("cart_modal", $data);
	}



	public function sendotp()
	{
		$name = $this->input->post("customername");
		$contact = $this->input->post("mobilenumber");

		$otp = rand(1000, 999999);
		$msg = "Dear " . $name . " your form is successfully submitted ";
		$otpdata = array(
			'mobilenumber' => $this->input->post('mobilenumber')
		);

		$this->load->helper('sms');
		sms($contact, $msg);
		echo "send Successfully";
	}

	public function mpincheck()
	{
		$mpin = $this->input->post('mpin');
		$cid = $this->input->post('cid');
		$this->load->model('checkMpin');
		$mpinData = $this->checkMpin->findMpin($mpin);
		if ($mpinData) {
			$this->checkMpin->mpinupdate($cid);
			$name = $this->input->post('customername');
			echo "<script>alert('Dear $name, Your Payment is successful, Wait For Account Activation');</script>";
			$update	=	array(
            'status' => 1,
			'amount'=>600.00


        );
         $rid  = $this->db->count_all_results('inner_daybook');
                    $rid =$rid+1;
                    $ivc = "CashonI".$rid;
         $daybookdata = array(
                        'cid'             =>$this->session->userdata("customer_id"),
                        'amount'          =>600.0,
                        'debit_credit'     =>1,
                        'remark'           =>$mpin." First Time Pay",
                        'date_time'       =>date("Y-m-d H:s:i"),
                        'invoice_number'   =>$ivc,
                        'plan_number'     =>8
                    );
                    $this->db->insert("inner_daybook",$daybookdata);
         $this->db->where("id",$this->session->userdata("customer_id"));
	   	$this->db->update("customer_info",$update);

			redirect("dashboard/index", 'refresh');
		} else {
			$name = $this->input->post('customername');
			echo "<script>alert('Dear $name, Your Payment is Failed, Try Again');</script>";
			redirect("dashboard/index", 'refresh');
		}

	}


	public function mybusiness()
	{
		$loginType = $this->session->userdata("login_type");

		$this->db->where("id", $this->session->userdata("customer_id"));
		$data1 = $this->db->get("customer_info")->row();
		$data['data'] = $data1;

		$this->db->where("customer_id", $data1->id);
		$dbi = $this->db->get("daily_base_income")->row();

		$this->db->where("customer_id", $data1->id);
		$pmi = $this->db->get("pair_maching_income")->row();

		$this->db->where("customer_id", $data1->id);
		$ttr = $this->db->get("time_to_time_reward")->row();

		$this->db->where("customer_id", $data1->id);
		$ri = $this->db->get("rouality_income")->row();

		$this->db->where("customer_id", $data1->id);
		$pi = $this->db->get("pool_income")->row();

		$this->db->where("customer_id", $data1->id);
		$nfr = $this->db->get("no_fine_reward")->row();

		$data['dbi'] = $dbi;
		$data['pmi'] = $pmi;
		$data['ttr'] = $ttr;
		$data['ri'] = $ri;
		$data['pi'] = $pi;
		$data['nfr'] = $nfr;

		$data['pageTitle'] = 'My business';
		$data['smallTitle'] = $this->session->userdata("name").' (My Business)';
		$data['mainPage'] = 'My business';
		$data['subPage'] = 'My business';
		$data['title'] = 'My business';
		$data['headerCss'] = 'headerCss/loginCss';
		$data['footerJs'] = 'footerJs/loginJs';
		$data['mainContent'] = 'mybusiness';
		$this->load->view("includes/mainContent", $data);
	}
	public function myTeam()
	{
    $this->load->model("tree");
    $cid = $this->session->userdata("customer_id");
		$this->db->where("id", $cid);
		$data1 = $this->db->get("customer_info")->row();
		$data['data'] = $data1;
		$left = $this->tree->selectlegleft($data1->joiner_id);
		$right = $this->tree->selectlegright($data1->joiner_id);
		$result['left']=$left;
		$result['right']=$right;
		$data['result'] = $result;
		$data['pageTitle'] = 'My Team';
		$data['smallTitle'] = $this->session->userdata("name").' (My Postion(Team))';
		$data['mainPage'] = 'My Team';
		$data['subPage'] = 'My Team';
		$data['title'] = 'My Team';
		$data['headerCss'] = 'headerCss/loginCss';
		$data['footerJs'] = 'footerJs/loginJs';
		$data['mainContent'] = 'myTeam';
		$this->load->view("includes/mainContent", $data);
  }

  public function myDownlineList()
  {

    $this->load->model("tree");
		$cid = $this->session->userdata("customer_id");
		$count =0;

	$this->db->where("id", $cid);
	$data1 = $this->db->get("customer_info")->row();
	$data['data'] = $data1;

        $data['pageTitle'] = 'My Downline In - Direct';
		$data['smallTitle'] = $this->session->userdata("name").' (My Downline List In-Direct)';
		$data['mainPage'] = 'My Downline In - Direct';
		$data['subPage'] = 'My Downline In - Direct';
		$data['title'] = 'My Downline In - Direct';
		$data['headerCss'] = 'headerCss/loginCss';
		$data['footerJs'] = 'footerJs/loginJs';
		$data['mainContent'] = 'myDownlineList';
		$this->load->view("includes/mainContent", $data);


  }
  public function myDirectRef()
  {
	$cid = $this->session->userdata("customer_id");
	$this->load->model("tree");
$this->db->where("id", $cid);
$data1 = $this->db->get("customer_info")->row();
$data['data'] = $data1;

	$data['pageTitle'] = 'My Direct Referral';
	$data['smallTitle'] = $this->session->userdata("name").' (My Direct Referral)';
	$data['mainPage'] = 'My Direct Referral';
	$data['subPage'] = 'My Direct Referral';
	$data['title'] = 'My Direct Referral';
	$data['headerCss'] = 'headerCss/loginCss';
	$data['footerJs'] = 'footerJs/loginJs';
	$data['mainContent'] = 'myDirectRef';
	$this->load->view("includes/mainContent", $data);





  }


	public function binaryGroup1()
    {
		$this->load->model("tree");
		$cid = $this->session->userdata("customer_id");
		$count =0;
		$this->tree->getRightData($cid,$count);
		$this->tree->getLeftData($cid,$count);





       // $data['pageTitle'] = 'Binary Group';
       // $data['smallTitle'] = $this->session->userdata("name").' (Binary Group)';
       // $data['mainPage'] = 'Binary Group';
       // $data['subPage'] = 'Binary Group';
       // $data['title'] = 'Binary Group';
       // $data['headerCss'] = 'headerCss/loginCss';
       // $data['footerJs'] = 'footerJs/loginJs';
       // $data['mainContent'] = 'binaryGroup';
       // $this->load->view("includes/mainContent", $data);
    }

	public function binaryGroup() {
		$loginType = $this->session->userdata("login_type");

		$this->db->where("id", $this->session->userdata("customer_id"));
		$data1 = $this->db->get("customer_info")->row();
		$data['data'] = $data1;
		$this->load->model("tree");
		$data['pageTitle'] = 'Binary Group';
		$data['smallTitle'] = $this->session->userdata("name").' (Binary Group (Tree))';
		$data['mainPage'] = 'Binary Group (Tree)';
		$data['subPage'] = 'Binary Group (Tree)';
		$data['title'] = 'Binary Group (Tree)';
		$data['headerCss'] = 'headerCss/loginCss';
		$data['footerJs'] = 'footerJs/loginJs';
		$data['mainContent'] = 'binaryGroup';
		$this->load->view("includes/mainContent", $data);
	}

	public function binarySubGroup() {
	    if ($this->input->server('REQUEST_METHOD') == 'GET'){
	        $id = $this->uri->segment(3);
	        $this->db->where("id", $id);
	    }

	    if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$id = $this->input->post("customer_id");
			$this->db->where("username", $id);
	    }



		$data1 = $this->db->get("customer_info")->row();
		if(!$data1){
			$this->session->set_flashdata('error', 'Wrong userID...');
			redirect('dashboard/binaryGroup');
		}
		$data['data'] = $data1;
		$this->load->model("tree");
		$data['pageTitle'] = 'Binary Group';
		$data['smallTitle'] = $data1->customer_name .' (Binary Group (Tree))';
		$data['mainPage'] = 'Binary Group (Tree)';
		$data['subPage'] = 'Binary Group (Tree)';
		$data['title'] = 'Binary Group (Tree)';
		$data['headerCss'] = 'headerCss/loginCss';
		$data['footerJs'] = 'footerJs/loginJs';
		$data['mainContent'] = 'binaryGroup';
		$this->load->view("includes/mainContent", $data);
	}

	public function mycard()
	{
		$loginType = $this->session->userdata("login_type");

		$this->db->where("id", $this->session->userdata("customer_id"));
		$data1 = $this->db->get("customer_info")->row();
		$data['data'] = $data1;

		$data['pageTitle'] = 'My Card';
		$data['smallTitle'] = $this->session->userdata("name").' (My Card)';
		$data['mainPage'] = 'My Card';
		$data['subPage'] = 'My Card';
		$data['title'] = 'My Card';
		$data['headerCss'] = 'headerCss/loginCss';
		$data['footerJs'] = 'footerJs/loginJs';
		$data['mainContent'] = 'mycard';
		$this->load->view("includes/mainContent", $data);
	}

	public function changePassword_page()
	{
	    $this->db->where("id", $this->session->userdata("customer_id"));
	    $data1 = $this->db->get("customer_info")->row();
	    $data['data'] = $data1;
	    $data['pageTitle'] = 'Dashboard';
	    $data['smallTitle'] = $this->session->userdata("name").' (Change Password)';
	    $data['mainPage'] = 'Customer Dashboard';
	    $data['subPage'] = 'Dashboard';
	    $data['title'] = 'Dashboard Home';
	    $data['headerCss'] = 'headerCss/loginCss';
	    $data['footerJs'] = 'footerJs/loginJs';
	    $data['mainContent'] = 'changePassword';
	    $this->load->view("includes/mainContent", $data);
	}

	public function changePassword()
	{
		$oldpass=$this->input->post('oldpassword');
		$newpass=$this->input->post('newpassword');
		$this->load->model('dashboard_model');
		$old=$this->dashboard_model->changepassword($oldpass);
		if($old)
		{
		    $this->load->model('dashboard_model');
		    $this->dashboard_model->newpassword($newpass);
		}

		$this->db->where("id", $this->session->userdata("customer_id"));
		$data1 = $this->db->get("customer_info")->row();
		$data['data'] = $data1;
		$data['pageTitle'] = 'Change Password';
		$data['smallTitle'] = $this->session->userdata("name").' (Change Password)';
		$data['mainPage'] = 'Change Password';
		$data['subPage'] = 'Change Password';
		$data['title'] = 'Change Password';
		$data['headerCss'] = 'headerCss/loginCss';
		$data['footerJs'] = 'footerJs/loginJs';
		$data['mainContent'] = 'profile_info';
		$this->load->view("includes/mainContent", $data);

	}

	public function withdrawal()
	{
		$this->db->where("id", $this->session->userdata("customer_id"));
		$data1 = $this->db->get("customer_info")->row();
		$data['data'] = $data1;
	    $this->load->model('mpin');
	    $this->load->model('dashboard_model');
	    $data['AllCounts'] = $this->dashboard_model->getDashboardCounts($this->session->userdata("customer_id"));
	    $data['query'] = $this->mpin->select_mpin();
	    $data['pageTitle'] = 'withdrawal';
	    $data['smallTitle'] = $this->session->userdata("name").' (Withdrawl)';
	    $data['mainPage'] = 'withdrawal';
	    $data['subPage'] = 'withdrawal';
	    $data['title'] = 'withdrawal';
	    $data['headerCss'] = 'headerCss/loginCss';
	    $data['footerJs'] = 'footerJs/loginJs';
	    $data['mainContent'] = 'withdrawalRequest';
	    $this->load->view("includes/mainContent", $data);

	}

	public function withdrawalRequest(){
	   $withd =  $this->input->post("withdrawalamount");
	   $cid =$this->session->userdata("customer_id");
	   $rid  = $this->db->count_all_results('inner_daybook');
	   $rid =$rid+1;
	   $ivc = "CashonI".$rid;
	   $outterdaybook['amount']=  $withd;
	   $outterdaybook['cid']=  $cid;
	   $outterdaybook['debit_credit']= 1;
	    $outterdaybook['remark']="request for Withdrawal";
	       $outterdaybook['date_time'] =date('Y-m-d H:s:i');
	       $outterdaybook['invoice_number']=  $ivc;
	           $outterdaybook['plan_number']=11;
	           $outterdaybook['status']=0;

	           $this->db->insert("outer_daybook",$outterdaybook);
	           redirect("dashboard/withdrawal/9", 'refresh');
	   	}



	public function recharge()
	{
		$this->load->model('');
	    $data['query'] = $this->mpin->select_mpin();
	    $data['pageTitle'] = 'Dashboard';
	    $data['smallTitle'] = ' Dashboard';
	    $data['mainPage'] = 'Customer Dashboard';
	    $data['subPage'] = 'Dashboard';
	    $data['title'] = 'Dashboard Home';
	    $data['headerCss'] = 'headerCss/loginCss';
	    $data['footerJs'] = 'footerJs/loginJs';
	    $data['mainContent'] = 'profile_info';
	    $this->load->view("includes/mainContent", $data);
	}


	public function selectposition()
	{

		if ($this->input->post('joiner') == 1) {

			$id = $this->input->post('rootidleft');
			$data = array(
				'root_left' => $this->session->userdata('customer_id'),
				'left_joiner' => $this->input->post('currentjoiner')

			);

			$this->load->model('tree');
			$this->tree->position($data, $id);
			//echo "<script>alert('Your Position selected successfully');</script>";


		} else {
			$id = $this->input->post('rootidright');
			$data = array(
				'root_right' => $this->session->userdata('customer_id'),
				'right_joiner' => $this->input->post('currentjoiner')
			);
			$this->load->model('tree');
			$this->tree->position($data, $id);
			//echo "<script>alert('Your Position selected successfully');</script>";

		}

		redirect("dashboard/myTeam/9", 'refresh');


	}
	public function mobilerecharge()
	{
		$data['pageTitle'] = 'Mobile';
		$data['smallTitle'] = 'Mobile Rechagre';
		$data['mainPage'] = 'Customer mobile Recharge';
		$data['subPage'] = 'Dashboard';
		$data['title'] = 'Mobile Recharge';
		$data['headerCss'] = 'headerCss/loginCss';
		$data['footerJs'] = 'footerJs/loginJs';
		$data['mainContent'] = 'mobilerecharge';
		$this->load->view("includes/mainContent", $data);
	}



	public function getCountDetails(){
       $title = $this->input->post("title");
       $cid = $this->session->userdata("customer_id");
       if( isset($title) ){
       	$this->load->model("dashboard_model");
       	$result = $this->dashboard_model->getCountDetails($cid,$title);
       	$response = array(
           "status_code" => "200",
           "message" => "success",
           "result" => $result
       	);
       }else{
       	$response = array(
           "status_code" => "400",
           "message" => "bad request",
           "result" => null
       	);
       }
       echo json_encode($response);
	}

	public function mobrechargemodel()
	{
    $this->db->where("id", $this->session->userdata("customer_id"));
	    $data1 = $this->db->get("customer_info")->row();
	    $data['data'] = $data1;
    $data['pageTitle'] = 'Mobile';
		$data['smallTitle'] = 'Mobile Rechagre';
		$data['mainPage'] = 'Customer mobile Recharge';
		$data['subPage'] = 'Mobile';
		$data['title'] = 'Mobile Recharge';
		$data['headerCss'] = 'headerCss/loginCss';
		$data['footerJs'] = 'footerJs/loginJs';
		$data['mainContent'] = 'mobrechargemodel';
		$this->load->view("includes/mainContent", $data);
	}


}