<?php
class Apanel extends CI_Controller{
	
function __construct()
	{
		parent::__construct();
		$this->isLogin();
	}
	
	function isLogin(){
	    	if($this->session->userdata("status")==0){
		     $this->session->unset_userdata();
	    $this->session->sess_destroy();
	    redirect('login');
		}
		$is_login = $this->session->userdata('is_login');
		$is_lock = $this->session->userdata('is_lock');
		if(!$is_login){
			//echo $is_login;
			redirect(base_url()."login/index");
		}
		elseif(!$is_lock){
			redirect(base_url()."login/lockPage");
		}
	
	}
	
	public function updatecoreCom(){
	    $money =$this->input->post("number");
	   $cid =  $this->input->post("cid");
	   echo $cid ;
	   $this->db->where("customer_id",$cid);
	   $corcom = $this->db->get("rouality_income")->row();
	   $coincome = array(
	       'amount'=>$corcom->amount+$money,
	       
	       );
	       
	        $rid  = $this->db->count_all_results('inner_daybook');
                $rid =$rid+1;
                $rid1 = $rid+1;
                $ivc = "CashonI".$rid;
                $ivc1 = "CashonI".$rid1;
	       
	       $this->db->where("customer_id",$cid);
	  if($this->db->update("rouality_income",$coincome)){
	      $daybooki = array(
	          'cid' =>$cid,
	          'amount'  =>  $money,
	          'debit_credit'    =>0,
	          'remark'          =>"Core Committee Income",
	          'date_time'       =>date('Y-m-d h:s:i'),
	          'invoice_number'     =>$ivc,
	          'plan_number'         =>6
	          
	          );
	          
	          $this->db->insert("inner_daybook",$daybooki);
	  }
	  
	  echo "Success";
	   
	}
	
	public function coreCommittee(){
	    $this->load->model("dashboardmodel");
	  
	    	$data['title'] = "Customer Report";
		$data['smallTitle'] = "Core Committee/Core Committee Eligible Customer_Report";
		$data['bigTitle'] = "Core Committee";

		$data['body'] = "admin/coreCommittee";
		$data['headerCss'] = "admin/headerCss/studentListCss";
		$data['footerJs'] = "admin/footerJs/studentListJs";
		$this->load->view("include/admin/mainContent",$data);
	}
	
	public function filter()
	{
	if($this->input->post('from_date') && $this->input->post('to_date')){
	$i = 1;
	//echo "testing";
	$this->db->where('date_time >= ', "from_date");
	$this->db->where('date_time >= ', "to_date");
	// echo   $this->db->where("date_time">"from_date");
	$res = $this->db->get("inner_daybook")->result();
	//print_r($res);


//conflict
	$output = '';
	$output .= '';?>
           <div class="table-responsive">  
           <table id="example" class="display table table-striped" style="width: 100%; cellspacing: 0;">
                 <tr>
	                <th>#</th>
	                <th>Cid</th>
	                <th>Amount</th>
	                <th>Debit Credit</th>
	                <th>Remark</th>
	                <th>Date/Time</th>
	                <th>Invoice Number</th>
	                 <th>Plan Number</th>     
                 </tr>  
                 </table></div>
      
 <?php foreach($res as $row):

                                              $output .= '<tr><td> '. $i .' </td>
                                                <td>'.  $row->cid .' </td>
                                                 <td> '.  $row->amount .' </td>
                                                <td> '. $row->debit_credit .'</td>
                                                <td> '. $row->remark .'</td>
                                                <td> '. $row->date_time .'</td>
                                                 <td>  '. $row->invoice_number .'</td>
                                                  <td>  '. $row->plan_number .'</td></tr>';
												  
												  
	$i++;											 
 endforeach;
 $output .= '</table></div>';  
  echo $output; 
 }
}
 
public function singlesms(){
	$this->load->helper("sms");
	$data['title'] = "Single Customer SMS";
	$data['smallTitle'] = "Website/Single Customer SMS";
	$data['bigTitle'] = "Single Customer SMS";
	$data['body'] = "singlesms";
	$data['headerCss'] = "admin/headerCss/studentListCss";
	$data['footerJs'] = "admin/footerJs/studentListJs";
	$this->load->view("include/admin/mainContent",$data);
}

		 public function kycdetail()
	{
		$data['title'] = "KYC Detail";
		$data['smallTitle'] = "Website/KYC Detail";
		$data['bigTitle'] = "KYC Detail";
		$data['body'] = "admin/kycdetail";
		$data['headerCss'] = "admin/headerCss/studentListCss";
		$data['footerJs'] = "admin/footerJs/studentListJs";
		$this->load->view("include/admin/mainContent",$data);
	}

		
	
	public function daybook()
	{
		$data['title'] = "Daybook Detail";
		$data['smallTitle'] = "Website/Daybook";
		$data['bigTitle'] = "Daybook List";
		$data['body'] = "admin/daybook";
		$data['headerCss'] = "admin/headerCss/studentListCss";
		$data['footerJs'] = "admin/footerJs/studentListJs";
		//if($this->input->post('filter')){echo"hii";}
		$this->load->view("include/admin/mainContent",$data);
	}
	public function withdrawl()
	{
	    $data['title'] = "withdrawl Detail";
	    $data['smallTitle'] = "Website/Daybook";
	    $data['bigTitle'] = "Daybook List";
	    $data['body'] = "admin/withdrawl";
	    $data['headerCss'] = "admin/headerCss/studentListCss";
	    $data['footerJs'] = "admin/footerJs/studentListJs";
	    //if($this->input->post('filter')){echo"hii";}
	    $this->load->view("include/admin/mainContent",$data);
	}
	
	public function withdrawlApprove(){
	    $data['title'] = "withdrawl Detail";
	    $data['smallTitle'] = "Website/Daybook";
	    $data['bigTitle'] = "Daybook List";
	    $data['body'] = "admin/withdrawlApprove";
	    $data['headerCss'] = "admin/headerCss/studentListCss";
	    $data['footerJs'] = "admin/footerJs/studentListJs";
	    //if($this->input->post('filter')){echo"hii";}
	    $this->load->view("include/admin/mainContent",$data);
	}
	
	function approveRequestByAdmin(){
		$cid = $this->input->post("testId");
			$rowid = $this->input->post("rowid");
			$this->load->helper("sms");
		$aar =array(
		'status'=>1
		);
		$this->db->where("id",$cid);
	    $cinfo =	$this->db->get("customer_info")->row();
	        $mobile = $cinfo->mobilenumber;
	//	$this->db->where("cid",$cid);
		$this->db->where("id",$rowid);
		$outerrow = $this->db->get("outer_daybook")->row();
		$amount = $outerrow->amount;
		$admin = $amount/10;
		$tds = ($amount*5)/100;
		$actualamount=$amount-($admin+$tds);
		$sms =  "Your User ID ".$cinfo->username." withdrawal has been transfer in your bank account with the amount RS ".$amount." For more information visit cashonwallet.org.";
	//	$sms = "Dear ".$cinfo->username." withdrawal has been transfer in your bank account with the amount of =".$actualamount." after diduction of TDS 5% =".$tds." and 10% admin charges =".$admin." Thanks. Cashonwallet.org";
		sms($mobile,$sms);
		$this->db->where("cid",$cid);
		$this->db->update("outer_daybook",$aar);
		echo "Success";
		
		
		//echo "<label>Successfully</label>";
	}

	function printreciept()
	{

		$data['title'] = "Print Invoice";
		$data['smallTitle'] = "Website/Invoice";
		$data['bigTitle'] = "Invoice List";
		$data['body'] = "admin/printreceipt";
		$data['headerCss'] = "admin/headerCss/studentListCss";
		$data['footerJs'] = "admin/footerJs/studentListJs";
		//if($this->input->post('filter')){echo"hii";}
		$this->load->view("include/admin/mainContent",$data);
	}

	public function printinvoice(){
		//$this->db->where("id",$this->session->userdata("admin_username"));

		$data['info'] = $this->db->get("general_settings")->row();

		//---------------------------------------------------is Retail Customer Checking starts ---------------
		//$this->db->where("id",$this->session->userdata("id"));
		$this->db->where("id",$this->uri->segment(3));

		$data['total_info'] = $this->db->get("customer_info")->row();
		
		$this->db->where("invoice_number",$this->uri->segment(4));
		$data['pro_detail'] = $this->db->get("inner_daybook")->row();
	//print_r($data);
		$this->load->view("admin/texinvoice",$data);
	}
	
	/* function profile(){
	    $data['bigTitle'] = "Customer Profile";
	    $data['subPage'] = 'Profile';
	    $data['smallTitle'] = 'Profile';
	    $data['pageTitle'] = 'Your Profile';
	    $data['title'] = 'CashOn wallet | Admin Profile';
	    $data['headerCss'] = 'admin/headerCss/messageCss';
	    $data['footerJs'] = 'admin/footerJs/profileJs';
	    $data['body'] = 'profile';
	    
	    $this->load->view("include/admin/mainContent",$data);
	} */
	
	public function editprofile()
	{

		$data['title'] = "Customer Profile";
		$data['smallTitle'] = "Website/Customer_profile";
		$data['bigTitle'] = "Customer Profile";
		$data['body'] = "admin/editprofile";
		$data['headerCss'] = "admin/headerCss/studentListCss";
		$data['footerJs'] = "admin/footerJs/studentListJs";
		$this->load->view("include/admin/mainContent",$data);
	}
	
	

	public function customer_report()
	{

		$data['title'] = "Customer Report";
		$data['smallTitle'] = "Website/All Customer_Report";
		$data['bigTitle'] = "All Customer Report";

		$data['body'] = "admin/customer_report";
		$data['headerCss'] = "admin/headerCss/studentListCss";
		$data['footerJs'] = "admin/footerJs/studentListJs";
		$this->load->view("include/admin/mainContent",$data);
	}

	function editcusprofile()
	{

		$data['title'] = " Edit Customer Profile";
		$data['smallTitle'] = "Website/Customer_profile";
		$data['bigTitle'] = "Customer Profile";
		$data['body'] = "admin/editcusprofile";
		$data['headerCss'] = "admin/headerCss/studentListCss";
		$data['footerJs'] = "admin/footerJs/studentListJs";
		$this->load->view("include/admin/mainContent",$data);
	}

	function selected_customer_report()
	{

		$data['title'] = " Selected Customer Report";
		$data['smallTitle'] = "Website/ Customer_Report";
		$data['bigTitle'] = "Customer Report";

		$data['body'] = "admin/selectedcreport";
		$data['headerCss'] = "admin/headerCss/studentListCss";
		$data['footerJs'] = "admin/footerJs/studentListJs";
		$this->load->view("include/admin/mainContent",$data);
	}

	public function marquee()
	{
		$data['title'] = "Marquee Content";
		$data['smallTitle'] = "Website/Marquee Content";
		$data['bigTitle'] = "Marquee List";
		$data['body'] = "admin/marquee";
		$data['headerCss'] = "admin/headerCss/studentListCss";
		$data['footerJs'] = "admin/footerJs/studentListJs";
		$this->load->view("include/admin/mainContent",$data);
	}

	public function notice()
	{
		$data['title'] = "Website Notice Board";
		$data['smallTitle'] = "Website/Notice Board";
		$data['bigTitle'] = "Notice Board";
		$data['body'] = "admin/marquee";
		$data['headerCss'] = "admin/headerCss/studentRegisterCss";
		$data['footerJs'] = "admin/footerJs/studentRegisterJs";
		$this->load->view("include/admin/mainContent",$data);
	}

	public function customersms()
	{
		$this->load->helper("sms");
		$data['title'] = "Customer SMS";
		$data['smallTitle'] = "Website/Customer SMS";
		$data['bigTitle'] = "Customer SMS";
		$data['body'] = "customersms";
		$data['headerCss'] = "admin/headerCss/studentListCss";
		$data['footerJs'] = "admin/footerJs/studentListJs";
		$this->load->view("include/admin/mainContent",$data);
	}

	public function contact()
	{
		$data['title'] = "Contact";
		$data['smallTitle'] = "Website/Contact Form List";
		$data['bigTitle'] = "Contact Form List";
		$data['body'] = "admin/contact";
		$data['headerCss'] = "admin/headerCss/studentListCss";
		$data['footerJs'] = "admin/footerJs/studentListJs";
		$this->load->view("include/admin/mainContent",$data);
	}

	public function gallery()
	{
		$data['title'] = "Product Gallery";
		$data['smallTitle'] = "Website/Product List";
		$data['bigTitle'] = "Enter Product List";
		$data['body'] = "admin/gallery";
		$data['headerCss'] = "admin/headerCss/studentListCss";
		$data['footerJs'] = "admin/footerJs/studentListJs";
		$this->load->view("include/admin/mainContent",$data);
	}
	
	public function index()
	{
	    $this->load->model("dashboardmodel");
		$data['title'] = "Cashonwallet.org";
		$data['smallTitle'] = "Website/Cashonwallet.org";
		$data['bigTitle'] = "Dashboard";
		$data['body'] = "admin/dashboard";
		$data['headerCss'] = "admin/headerCss/studentRegisterCss";
		$data['footerJs'] = "admin/footerJs/studentRegisterJs";
		$this->load->view("include/admin/mainContent",$data);
	}


	//write sms code..................................
	
	
	
	//end sms code................
	
	

	
	
	// public function dayBook(){
	// 	$data['title'] = "Day Book";
	// 	$data['smallTitle'] = "Accounting / Day Book";
	// 	$data['bigTitle'] = "Day Book";
	// 	$data['body'] = "admin/dayBook";
	// 	$data['headerCss'] = "admin/headerCss/dailyExpenseCss";
	// 	$data['footerJs'] = "admin/footerJs/dailyExpenseJs";
	// 	$this->load->view("include/admin/mainContent",$data);
	// }
	
	function smssetting()
	{
		$data['title'] = "Sms setting";
		$data['smallTitle'] = "Sms Detail";
		$data['bigTitle'] = "Sms Setting";
		$sm = $this->db->get("sms_settings")->row();
		$data['osmsv']=$sm;
		$data['body'] = "smssetting";
		$data['headerCss'] = "admin/headerCss/dailyExpenseCss";
		$data['footerJs'] = "admin/footerJs/dailyExpenseJs";
		$this->load->view("include/admin/mainContent",$data);

	}

	public function editproduct($id)
	{

		$data['title'] = "Edit Product";
		$data['smallTitle'] = "Edit product";
		$data['bigTitle'] = "Edit Product Detail";
		$this->db->where("id",$id);
		
		$ss = $this->db->get("products")->row();
		$data['abc']=$ss;
		$data['body']="editpro";
		$data['headerCss'] = "admin/headerCss/dailyExpenseCss";
		$data['footerJs'] = "admin/footerJs/dailyExpenseJs";
		$this->load->view("include/admin/mainContent",$data);

	}

    function sends()
    {
        $rt = $this->input->post("all_customer");
        if ($rt == 1) {
            $data = array(
                'all_customers' => 0
            );
            // $this->db->where("all_customers")
            $this->db->update("sms_settings", $data);
        } else {
            $data = array(

                'all_customers' => 1
            );
            // $this->db->where("all_customers");
            $this->db->update("sms_settings", $data);
        }
        echo "Success";
    }

    function pendingsends()
    {
        $rt = $this->input->post("pending");
        if ($rt == 1) {
            $data = array(
                'pending' => 0
            );
            // $this->db->where("all_customers")
            $this->db->update("sms_settings", $data);
        } else {
            $data = array(

                'pending' => 1
            );
            // $this->db->where("all_customers");
            $this->db->update("sms_settings", $data);
        }
        echo "Success";
    }

    function dobsends()
    {
        $rt = $this->input->post("dob");
        if ($rt == 1) {
            $data = array(
                'dob' => 0
            );

            $this->db->update("sms_settings", $data);
        } else {
            $data = array(

                'dob' => 1
            );

            $this->db->update("sms_settings", $data);
        }
        echo "Success";
    }

    function commsends()
    {
        $rt = $this->input->post("commission");
        if ($rt == 1) {
            $data = array(
                'commission_sms' => 0
            );
            $this->db->update("sms_settings", $data);
        } else {
            $data = array(

                'commission_sms' => 1
            );

            $this->db->update("sms_settings", $data);
        }
        echo "Success";
    }


	function allcustomerregis()
	{
		$data['title'] = "Customer";
		$data['smallTitle'] = "Customer Detail";
		$data['bigTitle'] = "Customer Detail";
		$data['body'] = "allcustomer";
		$data['headerCss'] = "admin/headerCss/dailyExpenseCss";
		$data['footerJs'] = "admin/footerJs/dailyExpenseJs";
		$this->load->view("include/admin/mainContent",$data);

	}

	function productpromotion()
	{
		$data['title'] = "Product";
		$data['smallTitle'] = "Product";
		$data['bigTitle'] = "Product Detail";
		$data['body'] = "prodpromotion";
		$data['headerCss'] = "admin/headerCss/dailyExpenseCss";
		$data['footerJs'] = "admin/footerJs/dailyExpenseJs";
		$this->load->view("include/admin/mainContent",$data);
	}

	function productdetail()
	{
		$data['title'] = "Product";
		$data['smallTitle'] = "Product";
		$data['bigTitle'] = " Entered Product";
		$data['body'] = "productdetail";
		$data['headerCss'] = "admin/headerCss/dailyExpenseCss";
		$data['footerJs'] = "admin/footerJs/dailyExpenseJs";
		$this->load->view("include/admin/mainContent",$data);
	}

	function editdeleteproduct()
	{
		$data['title'] = "Product";
		$data['smallTitle'] = "Product";
		$data['bigTitle'] = " Add Or Delete Product";
		$data['body'] = "editdeleteproduct";
		$data['headerCss'] = "admin/headerCss/dailyExpenseCss";
		$data['footerJs'] = "admin/footerJs/dailyExpenseJs";
		$this->load->view("include/admin/mainContent",$data);
	}

	function entertheamount()
	{
	if($this->input->post("cid"))
		{
         $id=$this->input->post("cid");
		  $data = array(
				
				// "subject" => $this->input->post("title"),
			     "cid"=>$id , 
				"amount" => $this->input->post("amount"),
				"date" => date("Y-m-d H:s:i")
	         	);

		    $this->db->where('cid',$id);
            $data1 = $this->db->get("mbalance");

           if($data1->num_rows()>0)
           {
           	$d=$this->input->post("amount");
           	$data1 = $data1->row();
           	 $data3 = array(
           	 	"amount" =>$data1->amount + $this->input->post("amount"),
				"date" => date("Y-m-d  H:s:i")
		         	);
		    
           
                $rid  = $this->db->count_all_results('outer_daybook');
                $rid =$rid+1;
                $ivc = "CashonoI".$rid;
                $daybookdata = array(
                    'cid'             =>$id,
                    'amount'          =>$this->input->post("amount"),
                    'debit_credit'     =>0,
                    'remark'           =>"M Wallet reacharge",
                    'date_time'       =>date("Y-m-d H:s:i"),
                    'invoice_number'   =>$ivc,
                    'plan_number'     =>9
                );
                $this->db->insert("outer_daybook",$daybookdata);
                $this->db->where('cid',$id);
                $this->db->update('mbalance',$data3);
            	$this->load->helper('sms');
            	$this->db->where('id',$id);
            	$ab=$this->db->get('customer_info')->row();
            	$a=$ab->mobilenumber;
            	$b=$ab->customer_name;
            	$this->db->where('cid',$id);
            	$abbb=$this->db->get('mbalance')->row()->amount;

            	$bcc="Dear "."". $b."your wallet recharge is ".$d." updated successfully and your updated amount is ".$abbb;
            	$adminmobile= "9140650783";
            	$admindabitsms = "Your Account is dabited ".$d." Rupee/- creadited Account of".$b."[".$ab->username."] Successfully.";
            	sms($a,$bcc);
            	sms($adminmobile,$admindabitsms);
  
             $data3['title'] = "Recharge";
		     $data3['smallTitle'] = "Updated Recharge";
		     $data3['bigTitle'] = "Amount Updated For Old Wallet";
		     $data3['body'] = "updated_wallet";
		     $data3['headerCss'] = "admin/headerCss/dailyExpenseCss";
	     	 $data3['footerJs'] = "admin/footerJs/dailyExpenseJs";
	        $this->load->view("include/admin/mainContent",$data3);
            }
		   
       else
       {

           echo "Something is wrong!please check And try Again";

       }

		
	}
	}
           
    function walletrecharge(){
	   $data = $this->db->get("customer_info")->result();
		foreach($data as $key){
			$username1=$this->input->post('customeruserid');
		   if($key->username==$username1)       
           {  
           	$this->db->where('username',$username1);
            $data1['a']=$this->db->get('customer_info')->row()->id;
            $data1['title'] = "Recharge";
		    $data1['smallTitle'] = "Recharge";
		    $data1['bigTitle'] = "Enter The Amount For Wallet Recharge.";
		    $data1['body'] = "walletrecharge";
		    $data1['headerCss'] = "admin/headerCss/dailyExpenseCss";
	     	$data1['footerJs'] = "admin/footerJs/dailyExpenseJs";
	        $this->load->view("include/admin/mainContent",$data1);
        //redirect(base_url()."apanel/entertheamount");
        	}
     	}
	}

	function admin_details()
	{
		$data['title'] = "Admin History";
		$data['smallTitle'] = "Admin/Admin All Details";
		$data['bigTitle'] = "Admin All Details";
		$data['body'] = "admin_details";
		$data['headerCss'] = "admin/headerCss/studentListCss";
		$data['footerJs'] = "admin/footerJs/studentListJs";
		$this->load->view("include/admin/mainContent",$data);
	}	

	function productlike()
	{
		$data['title'] = "Product";
		$data['smallTitle'] = "Product";
		$data['bigTitle'] = "Product Like";
		$data['body'] = "prolike";
		$data['headerCss'] = "admin/headerCss/dailyExpenseCss";
		$data['footerJs'] = "admin/footerJs/dailyExpenseJs";
		$this->load->view("include/admin/mainContent",$data);
	}

	function likecustomer()
	{
		$data['title'] = "Product";
		$data['smallTitle'] = "Product";
		$data['bigTitle'] = "Liked Customer";
		$data['body'] = "likecustmer";
		$data['headerCss'] = "admin/headerCss/dailyExpenseCss";
		$data['footerJs'] = "admin/footerJs/dailyExpenseJs";
		$this->load->view("include/admin/mainContent",$data);
	}

	function activecustomer()
	{
		$data['title'] = "Active Customer";
		$data['smallTitle'] = "Active Customer";
		$data['bigTitle'] = "Active Customer";
		$data['body'] = "activecustmer";
		$data['headerCss'] = "admin/headerCss/dailyExpenseCss";
		$data['footerJs'] = "admin/footerJs/dailyExpenseJs";
		$this->load->view("include/admin/mainContent",$data);
	}

   function inactivecustomer()
	{
		$data['title'] = "Inactive Customer";
		$data['smallTitle'] = "Inactive Customer";
		$data['bigTitle'] = "Inactive Customer";
		$data['body'] = "inactivecustmer";
		$data['headerCss'] = "admin/headerCss/dailyExpenseCss";
		$data['footerJs'] = "admin/footerJs/dailyExpenseJs";
		$this->load->view("include/admin/mainContent",$data);
	}

	function paidcustomer()
	{
		$data['title'] = "Paid Customer";
		$data['smallTitle'] = "Paid Customer";
		$data['bigTitle'] = "Paid Customer";
		$data['body'] = "paidcustmer";
		$data['headerCss'] = "admin/headerCss/dailyExpenseCss";
		$data['footerJs'] = "admin/footerJs/dailyExpenseJs";
		$this->load->view("include/admin/mainContent",$data);
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
