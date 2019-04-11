<?php
class Ajax extends CI_Controller{
    	function __construct()
	{
		parent::__construct();
		$this->load->model('loginModel');
	
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
	function checkTestId(){
		$testId = $this->input->post("testId");
		$r = mysql_query("SELECT * FROM create_test WHERE test_id='$testId'");
		$row = mysql_num_rows($r);
		if((strlen($testId) >= 6) &&($row <= 0)){
			echo "<span style='color: Green; font-size:16px; font-waight: bold;'>
				$testId is avaliable. You can use this id as test ID. 
					</span>";
		}
		elseif(strlen($testId) < 6){
			echo "<span style='color: red; font-size:16px; font-waight: bold;'>
				Test id must be greater 5 caracter.
			</span>";
		}
		else{
			echo "<span style='color: red; font-size:16px; font-waight: bold;'>
				$testId Test id is already in used.Please use another.
			</span>";
		}
	}
	
	function getTestSectionByTestId(){
		$this->db->where("test_id",$this->input->post("testId"));
		$val = $this->db->get("create_test")->row();
			echo "<option value=''>-Select Section-</option>";
			echo "<option value='".$val->first_section_name.",".$val->ques1."'>".$val->first_section_name." (".$val->ques1.")</option>";
			echo "<option value='".$val->second_section_name.",".$val->ques2."'>".$val->second_section_name." (".$val->ques2.")</option>";
			echo "<option value='".$val->third_section_name.",".$val->ques3."'>".$val->third_section_name." (".$val->ques3.")</option>";
			echo "<option value='".$val->fourth_section_name.",".$val->ques4."'>".$val->fourth_section_name." (".$val->ques4.")</option>";
	}
	
	function getLanguage(){
		echo '<option value="">-Select Language-</option>
              <option value="English">English</option>
              <option value="Hindi">Hindi</option>';
	}
	
	function getQuestions(){
		$this->db->where("test_id",$this->input->post("testId"));
		$name = $this->db->get("create_test")->row()->test_name;
		
		$section = $this->input->post("section");
		$myArray = explode(',', $section);
		$sectionName = $myArray['0'];
		$question = $myArray['1'];
		
		$data['testId'] = $this->input->post("testId");
		$data['name'] = $name;
		$data['sectionName'] = $sectionName;
		$data['question'] = $question;
		$data['language'] = $this->input->post("language");
		$this->load->view("admin/ajax/enterQuestion",$data);
	}
	
	function getQuestionsList(){
		$this->db->where("test_id",$this->input->post("testId"));
		$name = $this->db->get("create_test")->row()->test_name;
		
		$section = $this->input->post("section");
		$myArray = explode(',', $section);
		$sectionName = $myArray['0'];
		
		$data['testId'] = $this->input->post("testId");
		$data['name'] = $name;
		$data['sectionName'] = $sectionName;
		$data['language'] = $this->input->post("language");
		$this->load->view("admin/ajax/questionList",$data);
	}
	
	function deleteQuestions(){
		$this->db->where("id",$this->input->post("id"));
		if($this->db->delete("question")){
			$this->getQuestionsList();
		}
		else{
			echo "Somthig Going wrong please contact site administrator.";
		}
	}
	
	function qDetail(){
		$str = $this->input->post("str");
		$myArray = explode(',', $str);
		
		$this->db->where("testId",$myArray['0']);
		$this->db->where("section",$myArray['1']);
		$this->db->where("quesNumber",$myArray['2']);
		$this->db->where("language",$myArray['3']);
		$this->db->from("question");
		$count = $this->db->count_all_results();
		
		if($count > 0){
			$this->db->where("testId",$myArray['0']);
			$this->db->where("section",$myArray['1']);
			$this->db->where("quesNumber",$myArray['2']);
			$this->db->where("language",$myArray['3']);
			$row = $this->db->get("question")->row();
			
			$itemData = array(
					"testId" =>$myArray['0'],
					"sectionName" =>$myArray['1'],
					"quesNumber" =>$myArray['2'],
					"language" =>$myArray['3'],
					"enterQuestion" => $row->enterQuestion,
					"ans1" => $row->ans1,
					"ans2" => $row->ans2,
					"ans3" => $row->ans3,
					"ans4" => $row->ans4,
					"ans5" => $row->ans5,
					"c_ans" => $row->c_ans,
					"discription" => $row->discription,
			);
		}
		else{
			$itemData = array(
					"testId" =>$myArray['0'],
					"sectionName" =>$myArray['1'],
					"quesNumber" =>$myArray['2'],
					"language" =>$myArray['3'],
					"enterQuestion" => "",
					"ans1" => "",
					"ans2" => "",
					"ans3" => "",
					"ans4" => "",
					"ans5" => "",
					"c_ans" => "",
					"discription" => "",
			);
		}
			
		echo (json_encode($itemData));
	}
	
	function saveQuestions(){
		$quesNumber = $this->input->post("quesNumber");
		$data = array(
			"testId" => $this->input->post("testId"),
			"section" => $this->input->post("sectionName"),
			"quesNumber" => $this->input->post("quesNumber"),
			"language" => $this->input->post("language"),
			"enterQuestion" => $this->input->post("enterQuestion"),
			"ans1" => $this->input->post("ans1"),
			"ans2" => $this->input->post("ans2"),
			"ans3" => $this->input->post("ans3"),
			"ans4" => $this->input->post("ans4"),
			"ans5" => $this->input->post("ans5"),
			"c_ans" => $this->input->post("c_ans"),
			"discription" => $this->input->post("discription")
		);
		
		$this->db->where("testId",$this->input->post("testId"));
		$this->db->where("section",$this->input->post("sectionName"));
		$this->db->where("quesNumber",$this->input->post("quesNumber"));
		$this->db->where("language",$this->input->post("language"));
		$this->db->from("question");
		$count = $this->db->count_all_results();
		
		if($count > 0){
			$this->db->where("testId",$this->input->post("testId"));
			$this->db->where("section",$this->input->post("sectionName"));
			$this->db->where("quesNumber",$this->input->post("quesNumber"));
			$this->db->where("language",$this->input->post("language"));
			if($this->db->update("question",$data)):
				$test = true;
				$msg = "<font color='blue'>Question number $quesNumber Update successfuly.</font>";
			else:
				$test = false;
			endif;
		}else{
			if($this->db->insert("question",$data)):
				$test = true;
				$msg = "<font color='green'>Question number $quesNumber Save successfuly.</font>";
			else:
				$test = false;
			endif;
		}
		
		if($test):
			?>
				<?php echo $msg;?>
				<script>
					$("#<?php echo $quesNumber;?>").removeClass("btn-default").addClass("btn-success");
				</script>
			<?php
		else:
			?>
				<font color="red">Question number <?php echo $quesNumber;?> not Saved. Please Contact site Administrator.</font>
				<script>
					$("#<?php echo $quesNumber;?>").removeClass("btn-default").addClass("btn-danger");
				</script>
			<?php
		endif;
	}
}