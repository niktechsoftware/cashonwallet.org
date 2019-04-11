<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function tree_root_id()
    {
        
        $this->load->model('tree');
        $id=$this->tree->root_id($rootid);
        echo '<pre>';
        print_r($id);
        if($id)
        {
            echo "get root";
        }
        else
        {
            echo "fail";
        }
                
    }
    
    
    
    
    public function getcname(){
    	$this->load->model("tree");
        $joinderid = $this->input->post("joinerid");
        $this->db->where("username",$joinderid);
        $getname = $this->db->get("customer_info");
        if($getname->num_rows()>0){
           $getname=  $getname->row();
           
           ?>
            <div class="form-row">
               <div class="col-md-6">
                 <div >
                   <input type="text" name="currentjoiner" class="form-control"
                                                value="<?php echo $getname->customer_name;?>" id="currentjoiner" readonly>
                </div>
               </div>
               
               <div class="col-md-6">
                 <div>
                  			<div>
                  			<?php  
                  			
                  			$cid = $getname->id;
                  			$left = $this->tree->selectlegleft($cid);
                  			$right = $this->tree->selectlegright($cid);
										  if(($left)||($right)){?>
									  
                                            <input type="hidden" name="currentjoiner"
                                                value="<?php echo $cid; ?>" id="currentjoiner">
                                                    <input type="hidden" name="rootidright"
                                                value="<?php echo $right ; ?>" id="rootidr">
                                                  <input type="hidden" name="rootidleft"
                                                value="<?php echo $left ; ?>" id="rootidl">

                                            <select class="form-control" name="joiner" id="joiner" required="required">
                                                <option value="">Select joiner Root</option>
                                                <?php if($left){ $this->db->where("id",$left);
                                                $legname = $this->db->get("customer_info")->row();?> 
                                                <option value="1"><?php echo "Left"; ?></option><?php }?>
                                               
                                                <?php if($right){ $this->db->where("id",$right);
                                                $legname = $this->db->get("customer_info")->row();?> 
                                                <option value="2"><?php echo "Right"; ?></option><?php }?>
                                            </select>
                                    <?php } ?>        
                                        </div>
                 
                 
                 </div>
               </div>
               
             </div>    
                 
                 
                 
                <button class="btn btn-solid" id="sendsms">
                            Create Account</button>
                            <?php
        }else{?>
            <script> $("#joiner").hide();</script><?php
            echo '<label style="color:red;" >Invalid Username</label>';
            
        }
    }
    
    
    public function index()
    {
        $data['pageTitle'] = 'Cash On Wallet';
        $data['smallTitle'] = 'Cash On Wallet';
        $data['mainPage'] = 'Cash On Wallet ';
        $data['subPage'] = 'Home';
        $data['title'] = 'Home';
        $data['headerCss'] = 'headerCss/loginCss';
        $data['footerJs'] = 'footerJs/loginJs';
        $data['mainContent'] = 'cashonhome';
        $this->load->view("includes/mainContent", $data);
		//$this->load->view('welcome_message');
    }

    public function login()
    {
        $data['pageTitle'] = 'Cash On Wallet Login';
        $data['smallTitle'] = 'Login & Registration';
        $data['mainPage'] = 'Login & Registration';
        $data['subPage'] = 'Login & Registration';
        $data['title'] = 'Login & Registration';
        $data['headerCss'] = 'headerCss/loginCss';
        $data['footerJs'] = 'footerJs/loginJs';
        $data['mainContent'] = 'cashonlogin';
        $this->load->view("includes/mainContent", $data);
	    //$this->load->view('welcome_message');
    }





    // public function pool_view()
    // {
    //     $data['pageTitle'] = 'Cash On Wallet Login';
    //     $data['smallTitle'] = 'Pool Income.';
    //     $data['mainPage'] = 'Configuration';
    //     $data['subPage'] = 'Class, Section, Subject Stream';
    //     $data['title'] = 'Configure Class/Section';
    //     $data['headerCss'] = 'headerCss/loginCss';
    //     $data['footerJs'] = 'footerJs/loginJs';
    //     $data['mainContent'] = 'poolincome';
    //     $this->load->view("includes/mainContent", $data);


    // }
     public function plans_and_detail()
    {
        $data['pageTitle'] = 'Plans And Details';
        $data['smallTitle'] = 'Plans And Details.';
        $data['mainPage'] = 'Plans And Details';
        $data['subPage'] = 'Plans And Details';
        $data['title'] = 'Plans And Details';
        $data['headerCss'] = 'headerCss/loginCss';
        $data['footerJs'] = 'footerJs/loginJs';
        $data['mainContent'] = 'plans&details';
        $this->load->view("includes/mainContent", $data);


    }
    // public function notime_view()
    // {
    //     $data['pageTitle'] = 'Cash On Wallet Login';
    //     $data['smallTitle'] = 'No Time Reward.';
    //     $data['mainPage'] = 'Configuration';
    //     $data['subPage'] = 'Class, Section, Subject Stream';
    //     $data['title'] = 'Configure Class/Section';
    //     $data['headerCss'] = 'headerCss/loginCss';
    //     $data['footerJs'] = 'footerJs/loginJs';
    //     $data['mainContent'] = 'notimerew';
    //     $this->load->view("includes/mainContent", $data);


    // }
    public function BusinessPlan()
    {
        $data['pageTitle'] = 'Business Plans';
        $data['smallTitle'] = 'Business Plans.';
        $data['mainPage'] = 'Business Plans';
        $data['subPage'] = 'Business Plans';
        $data['title'] = 'Business Plans';
        $data['headerCss'] = 'headerCss/loginCss';
        $data['footerJs'] = 'footerJs/loginJs';
        $data['mainContent'] = 'timetotimerew';
        $this->load->view("includes/mainContent", $data);


    }
// public function roulty_view(){
// $data['pageTitle'] = 'Cash On Wallet Login';
// 		$data['smallTitle'] = 'Class, Section And Subject Stream';
// 		$data['mainPage'] = 'Configuration';
// 		$data['subPage'] = 'Class, Section, Subject Stream';
// 		$data['title'] = 'Configure Class/Section';
// 		$data['headerCss'] = 'headerCss/loginCss';
// 		$data['footerJs'] = 'footerJs/loginJs';
// 		$data['mainContent'] = 'roulty';
// 		$this->load->view("includes/mainContent", $data);
	
// }
    public function plan()
    {


        $data['pageTitle'] = 'Plan';
        $data['smallTitle'] = 'Plan';
        $data['mainPage'] = 'Plan';
        $data['subPage'] = 'Plan';
        $data['title'] = 'Plan';
        $data['headerCss'] = 'headerCss/loginCss';
        $data['footerJs'] = 'footerJs/loginJs';
        $data['mainContent'] = 'plans&details';
        $this->load->view("includes/mainContent", $data);

		//$this->load->view("plans&details");
    }

    public function contact()

    {

        $data['pageTitle'] = 'Contact US';
        $data['smallTitle'] = 'contact US';
        $data['mainPage'] = 'Contact us';
        $data['subPage'] = 'Contact us';
        $data['title'] = 'Contacts  us';
        $data['headerCss'] = 'headerCss/loginCss';
        $data['footerJs'] = 'footerJs/loginJs';
        $data['mainContent'] = 'contactus';
        $this->load->view("includes/mainContent", $data);


    }

    public function forminserted()

    {

        $email = $this->input->post('email');
        $msg = $this->input->post('message');
        $data = array('email' => $email, 'message' => $msg, 'date' => date('y-m-d'));
        $insert = $this->db->insert('contact', $data);
        if ($insert) {
           redirect("welcome/contact");
        } 

    }



    public function about()

    {
        $data['pageTitle'] = 'About Us';
        $data['smallTitle'] = 'About Us';
        $data['mainPage'] = 'About Us';
        $data['subPage'] = 'About Us';
        $data['title'] = 'About Us';
        $data['headerCss'] = 'headerCss/loginCss';
        $data['footerJs'] = 'footerJs/loginJs';
        $data['mainContent'] = 'about';
        $this->load->view("includes/mainContent", $data);
		//$this->load->view('welcome_message');

    }

    public function forgotpassword()
    {
       // $this->load->view('forgot_password');
        $data['pageTitle'] = 'Cash On Wallet Login';
        $data['smallTitle'] = 'Login & Registration';
        $data['mainPage'] = 'Login & Registration';
        $data['subPage'] = 'Login & Registration';
        $data['title'] = 'Login & Registration';
        $data['headerCss'] = 'headerCss/loginCss';
        $data['footerJs'] = 'footerJs/loginJs';
        $data['mainContent'] = 'forgot_password';
        $this->load->view("includes/mainContent", $data);
    }

    public function new_password()
    {
       
        $username=$this->input->post('username');
        $this->db->where("username",$username);
        $data1 = $this->db->get("customer_info");
        $newpass=$this->input->post('newpassword');
        $newpass1 = array(
            'password' =>$newpass
        );
       	$is_login = $this->session->userdata('is_login');
		$is_lock = $this->session->userdata('is_lock');
		$logtype = $this->session->userdata('login_type');
		 
 // checking the time now when home page starts
 
   
		/**
		 * checking the session is activate or not.
		 * if session is activated then it will redirect to dashboard othewise redirect on login page.
		 */
		if($is_login):
		  $this->db->where("id",$data1->id);
        $data1 = $this->db->update("customer_info",$newpass1);
		else:
			redirect('/welcome/login');
		endif;
      
       
        // $this->load->view('forgot_password');
        $data['pageTitle'] = 'Forgot Password';
        $data['smallTitle'] = 'Change Password'; 
        $data['mainPage'] = 'Cash On Wallet Login';
        $data['subPage'] = 'Login & Registration';
        $data['title'] = 'Password';
        $data['headerCss'] = 'headerCss/loginCss';
        $data['footerJs'] = 'footerJs/loginJs';
        $data['mainContent'] = 'create_new_password';
        $this->load->view("includes/mainContent", $data);
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
        $data['cart']  = $this->cart->contents();
        $this->load->view("cart_modal", $data);
    }

   /* public function create_password()
    {
        $data['pageTitle'] = 'New Password';
        $data['smallTitle'] = 'changepassword';
        $data['mainPage'] = 'Configuration';
        $data['subPage'] = 'changepassword';
        $data['title'] = 'Change Password';
        $data['headerCss'] = 'headerCss/loginCss';
        $data['footerJs'] = 'footerJs/loginJs';
        $data['mainContent'] = 'create_new_password';
        $this->load->view("includes/mainContent", $data);
    }*/

    public function sendotp()
    {
        $username = $this->input->post("name");
        $mno = $this->input->post("contact");

        $this->db->select("mobilenumber");
        $this->db->where("username", $username);
        $this->db->where("mobilenumber", $mno);
        $mobileno = $this->db->get("customer_info")->row()->mobilenumber;
        $otp = rand(100000, 999999);
        $data=array(
            'username'=>$username,
            'otp' =>$otp,
            'date'=> date("Y-m-d H:s:i")
        );
       $this->db->insert('forgot_otp',$data);
        $msg = $otp." is your OTP(One Time Password)";
        $this->load->helper('sms');
        sms($mobileno, $msg);
       // $this->db->select('otp');
       // $this->db->from('forgot_otp');
       // $this->db->where('username',$username);
      // $otp= $this->db->get()->row()->otp;
    }
    
    public function match_password()
    {
        $pass=$this->input->post('textotp');
        $this->db->select('otp');
        $this->db->from('forgot_otp');
        $this->db->get();
    }
    
    public function matchotp(){
        $username = $this->input->post("name");
        $otp = $this->input->post("textotp");
        $this->db->where("otp",$otp);
        $this->db->where("username",$username);
        $getrow = $this->db->get("forgot_otp");
        if($getrow->num_rows()>0){
            echo "match";
        }
        else{
            echo "Notmatch";
        }
    }
     
    public function product_show()
    {
        $this->load->library('cart');
        $this->load->model('Shopping_cart_model');

        $data['products'] = $this->Shopping_cart_model->get_all();
        $data['pageTitle'] = 'Product';
        $data['smallTitle'] = 'Product Details';
        $data['mainPage'] = 'Product';
        $data['subPage'] = 'Product';
        $data['title'] = 'Product';
        $data['headerCss'] = 'headerCss/loginCss';
        $data['footerJs'] = 'footerJs/loginJs';
        $data['mainContent'] = 'welcome_message';
        $this->load->view("includes/mainContent", $data);

    }



    public function userDetail()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('customername', 'Customer Name', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
       $this->form_validation->set_rules('password', 'Password', 'required|matches[ConfirmPassword]');
       $this->form_validation->set_rules('ConfirmPassword', 'Password Confirmation', 'required');
        
       $this->form_validation->set_rules('mobilenumber', 'Mobile Number', 'required');
        
//	$this->form_validation->set_rules('altnumber', 'alternate Number', 'numeric');
//	$this->form_validation->set_rules('currentadd', 'Current Address', 'required');
//	$this->form_validation->set_rules('permanenaddt', 'Permanent address', 'required');
//	$this->form_validation->set_rules('city', 'City', 'required');
//	$this->form_validation->set_rules('state', 'State', 'required');
//	$this->form_validation->set_rules('pin', 'pin', 'required');
//	$this->form_validation->set_rules('pannumber', 'Pan Number', 'required');
//	$this->form_validation->set_rules('adhaarnumber', 'Adhaar Number', 'required');
	// check for validation
         if ($this->form_validation->run() == false) {
            echo $a['data']= "Form is invalid" . validation_errors();
            // redirect('/welcome/registration', 'refresh',$a);
            //$this->load->view("cashonRegistration", $a);
        } else {


            $name = $this->input->post('customername');
            $contact = $this->input->post('mobilenumber');
            $password = $this->input->post('password');
 $this->load->model('tree');
$joinerusername = $this->input->post('joinerid');
$this->db->where("username",$joinerusername);
$joiner_id1 = $this->db->get("customer_info")->row();
$joiner_idf=$joiner_id1->id;
$joiner_idname  = $joiner_id1->customer_name;

$this->db->select_max('id');
$this->db->from('customer_info');
$maxid=$this->db->get()->row()->id;
$rnj = rand(100,80000);
$maxid=$maxid+1;
 $username = $maxid+100;
 echo $username;
 $data['username']              = "c".$username.$rnj;
     $data['customer_name']     = $name;
     $data['email']             = $this->input->post('email');
     $data['password']          = $this->input->post('password');
     $data['altnumber']        = $this->input->post('altnumber');
     $data['mobilenumber']      = $contact;
     $data['current_address']   = $this->input->post('currentadd');
     $data['permanent_address'] = $this->input->post('permanenaddt');
     $data['city'] = $this->input->post('city');
     $data['state'] = $this->input->post('state');
     $data['pin'] = $this->input->post('pin');
     $data['joiner_id'] = $joiner_idf;
     $data['joiner_name'] = $joiner_idname;
     $data['position'] = $this->input->post('position');
     $data['pannumber'] = $this->input->post('pannumber');
     $data['adhaarnumber'] = $this->input->post('adhaarnumber');
     $data['dob'] = $this->input->post('dob');
     $data['joining_date'] = date('Y-m-d H:s:i');
     $data['amount'] = 0.00;
     $data['status'] = 0;
     $data['position']=0;
     $get_id = $maxid;
$this->db->where("id",$maxid);
$getrow = $this->db->get("customer_info");
if($getrow->num_rows()<1){
   
    $this->load->model('userDetail');
              
              //echo  $data['joining_date'];
              $comission = array(
		    'customer_id'     =>   $get_id,
		    'amount'          =>      0.00 , 
		    'status'          =>      1,
		    'date'            =>      date("Y-m-d H:s:i")
		    );
		    $data1=array(
	        'root'=>$get_id
	        	);
	        $mdata = array(
	            'cid'     =>    $get_id,
	            'amount'          =>      0.00 ,
	            'date'            =>      date("Y-m-d H:s:i")
	        );
	        

		   $mbalance = array(
		    'cid'     =>   $get_id,
		    'amount'          =>      0.00
		    );
		   $id=0;
		   if ($this->input->post('joiner') == 1) {
		   	$id = $this->input->post('rootidleft');
		   	echo $id;
		   	$datatree = array(
		   			'root_left' => $get_id,
		   			'left_joiner' => $this->input->post('currentjoiner')
		   
		   	);
		   	$this->tree->position($datatree,$id);
		   } else {
		   	$id = $this->input->post('rootidright');
		   	$datatree = array(
		   			'root_right' => $get_id,
		   			'right_joiner' => $this->input->post('currentjoiner')
		   	);
		$this->tree->position($datatree,$id);
		   	//echo "<script>alert('Your Position selected successfully');</script>";
		   
		   }
		  
		   
		   if(($this->db->insert("customer_info",$data))&&($this->db->insert("pair_maching_income",$comission))&&($this->db->insert("daily_base_income",$comission))&&($this->db->insert("no_fine_reward",$comission))&&($this->db->insert("pool_income",$comission))&&($this->db->insert("rouality_income",$comission))&&($this->db->insert("time_to_time_reward",$comission))&&($this->db->insert("tree",$data1))&&($this->db->insert("mbalance",$mbalance)))
		{  // $get_id = $this->userDetail->userRegupdate($adhaarnumber);
              //  $this->userDetail->userRegupdate($get_id);
                $this->load->helper('sms');

                $this->db->where("id",$get_id);
                $cinfo = $this->db->get("customer_info")->row();
                 //sms($contact, $msg);
                 $msg = "Dear " . $name . " Your Registration is successfully,Your Username is ".$cinfo->username." and password is ".$password.

"Please Login to update your details";
                 sms($contact, $msg);
               // echo "<script>alert('Dear $name, Your Registration is successful, Your username send to your mobile number');</script>";
               redirect('/welcome/registeredcust/' . $get_id);
            }  else {
             redirect('/welcome/login', 'refresh');

            } 
            }else{
                echo "Some Problem this there Please retry After Some Time";
            }
    }
    }

    public function registration()
    {
        $this->load->model('userdetail');
        $data['pageTitle'] = ' Registration';
        $data['smallTitle'] = 'Customer registration';
        $data['mainPage'] = 'Customer registration';
        $data['subPage'] = 'New Registration';
        $data['title'] = 'New Registration';
        $data['headerCss'] = 'headerCss/loginCss';
        $data['footerJs'] = 'footerJs/loginJs';
        $data['mainContent'] = 'cashonRegistration';
      //  $data['roots'] = $this->userdetail->joinerdrop();
        $this->load->view("includes/mainContent", $data);
    }

    public function registeredcust()
    {
        $id = $this->uri->segment(3);

        $this->load->model('userDetail');
        $data['fetch_data'] = $this->userDetail->fetch_data($id);

        $data['pageTitle'] = 'Registered User';
        $data['smallTitle'] = 'Registered user';
        $data['headerCss'] = 'headerCss/loginCss';
        $data['footerJs'] = 'footerJs/loginJs';
        $data['mainContent'] = 'registered_cust';
        $this->load->view("includes/mainContent", $data);
    }

    public function logout()
    {
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        redirect('welcome/login');
    }

    public function authentication()
    {

        /**
         * [$username recieved from login form send by post method.]
         * @var [String]
         */
        $username = $this->input->post('cusername');

        /**
         * [$password recieved from login form send by post method.]
         * @var [String]
         */
        $password = $this->input->post('password');

        /**
         * loading the logintable model for authenticate user.
         */
        $this->load->model('auth/logintable');

        /**
         * [	$loginData
         * 		contains all login information which store in databse
         * 		alongwith given username. or it may be empty array.]
         * @var [Array]
         */
        $loginData = $this->logintable->getLoginData($username, $password);

		//print_r($loginData);
        /**
         * This condtion varifyes, is given username exist in database or not
         * if its exist in database then it has some value otherwise it dosen't.
         */

        if ($loginData['is_login']) {
            /**
             * [$sessionData contian BranchID, username and boolean variable (isAdmin to identify schools superuser.)]
             * @var array
             */
         

			// print_r($this->router->routes);

            /**
             * Setting data into session.
             */
            $this->session->set_userdata($loginData);
          // echo  $this->session->userdata("customer_id");
           $username1=$this->session->userdata("customer_username");
          if($username == $username1)
          {
              	$this->db->where("username", $username);
			$this->db->where("password", $password);
			$query = $this->db->get("customer_info");
			if($query->num_rows()>0){
			    $res = $query->row()->id;
		
            
               //$this->session->unset_userdata();
                //$this->session->sess_destroy();
           
            redirect("dashboard/index/$res");
 
       	} } }else {
             //echo " Username or Password Error";
            
            echo "<script>alert('Error , Your username or password incorrect !');</script>";
            redirect('/welcome/login');
           
        }
    }

    public function daily()
    {
         
         
        $data['pageTitle'] = 'Plans & Details';
        $data['smallTitle'] = 'Daily Base Income.';
        $data['mainPage'] = 'Plans & Details';
        $data['subPage'] = 'Plans & Details';
        $data['title'] = 'Plans & Details';
        $data['headerCss'] = 'headerCss/loginCss';
        $data['footerJs'] = 'footerJs/loginJs';
        $data['mainContent'] = 'dailybaseincome';
        $this->load->view("includes/mainContent", $data);


    }
    public function pair()
    {
        $data['pageTitle'] = 'Pairs';
        $data['smallTitle'] = ' Pair Matching Income';
        $data['mainPage'] = 'Pairs';
        $data['subPage'] = ' Pairs';
        $data['title'] = ' Pairs';
        $data['headerCss'] = 'headerCss/loginCss';
        $data['footerJs'] = 'footerJs/loginJs';
        $data['mainContent'] = 'pairmatch';
        $this->load->view("includes/mainContent", $data);


    }
    public function pool()
    {   
        $data['pageTitle'] = 'Pool income';
        $data['smallTitle'] = 'Pool income';
        $data['mainPage'] = 'Pool income';
        $data['subPage'] = 'Pool income';
        $data['title'] = 'Pool income';
        $data['headerCss'] = 'headerCss/loginCss';
        $data['footerJs'] = 'footerJs/loginJs';
        $data['mainContent'] = 'poolincome';
        $this->load->view("includes/mainContent", $data);


    }
    public function notime()
    {
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
    public function timeto()
    {
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
    public function roulty()
    {
        $data['pageTitle'] = 'Roulty Income';
        $data['smallTitle'] = 'Roulty Income';
        $data['mainPage'] = 'Configuration';
        $data['subPage'] = 'Roulty Income';
        $data['title'] = 'Roulty Income';
        $data['headerCss'] = 'headerCss/loginCss';
        $data['footerJs'] = 'footerJs/loginJs';
        $data['mainContent'] = 'roulty';
        $this->load->view("includes/mainContent", $data);

    }

    




  /*=======
				redirect("dashboard/index",'refresh');
		
			/**
     * redirect to the dashboard page.
			
			
		}
		else {
			
			redirect('/welcome/index', 'refresh');
		}*/
		//}


    public function show_order()
    {
        $customer = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone')
        );
    //print_r( $customer);
  // And store user information in database.
        $data['order'] = $this->shopping_cart_model->insert_customer($customer);

        $this->load->view('order_success', $data);



    }
    
    function gtime(){
        $t=date("H:i:s");
       echo $t;
       $t1 = date("H:i:s", strtotime( "$t + 5 mins"));
       echo $t1 ;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */