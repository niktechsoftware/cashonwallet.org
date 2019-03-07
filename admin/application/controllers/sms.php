<?php
class Sms extends CI_Controller{
	function single(){
		
		$this->load->helper("sms");
		$msg =	$this->input->post("msg");
		$fmobile = $this->input->post("mobile");
		sms($fmobile,$msg);
		redirect(base_url()."apanel/singlesms","refresh");
	}
	
	function all(){
		$this->load->helper("sms");

		$msg =	$this->input->post("smstoall");
		$mn = $this->db->query("SELECT mobilenumber FROM customer_info")->result();
		$fmobile = "8382829593";
		$i =1 ; foreach ($mn as $row):
		if($row->mobilenumber){
		    $fmobile = $fmobile.",".$row->mobilenumber;
		}
		
		if($i%50==0){
		    sms($fmobile,$msg);
		    //echo $fmobile."</br>";
		    $fmobile = "8382829593";
		}
		
		$i++;
		endforeach;
		sms($fmobile,$msg);
		redirect(base_url()."apanel/customersms");
	}
}