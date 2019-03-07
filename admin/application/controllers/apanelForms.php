<?php
class ApanelForms extends CI_Controller{
	
	


public function deletecontact(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("contact")){

			redirect(base_url()."apanel/contact");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	public function deleteGallery(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("products")){
			redirect(base_url()."apanel/editdeleteproduct");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}


	public function editcusprofile(){
		$data = array(
				"parent_id" => $this->input->post("a1"),
				"customer_name" => $this->input->post("a2"),
				"email" =>  $this->input->post("a3"),
				"username" =>  $this->input->post("a4"),
				"password" =>  $this->input->post("a5"),
				"mobilenumber" =>  $this->input->post("a6"),
				"altnumber" =>  $this->input->post("a7"),
				"current_address" =>  $this->input->post("a8"),
				"permanent_address" =>  $this->input->post("a9"),
				"city" =>  $this->input->post("a10"),
				"state" =>  $this->input->post("a11"),
				"pin" =>  $this->input->post("a12"),
				"joiner_id" =>  $this->input->post("a13"),
				"joiner_name" =>  $this->input->post("a14"),
				"position" =>  $this->input->post("a15"),
				"pannumber" =>  $this->input->post("a16"),
				"adhaarnumber" =>  $this->input->post("a17"),
				"amount" =>  $this->input->post("a18"),
				"status" =>  $this->input->post("a19"),
				"joining_date" =>  $this->input->post("a20"),
				"dob" =>  $this->input->post("a21"),
			
		);
		$this->db->where("id",$this->input->post("id"));
		if($this->db->update("customer_info",$data)){
			redirect(base_url()."apanel/editprofile");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}

public function deleteRegistration(){

	 $this->db->where("id",$this->uri->segment(3));
        $get_id = $this->db->get("customer_info")->row()->status;
        if($get_id==0)
        {

        	 $update	=	array(
            'status' => 1
        );
         
         $id = $this->uri->segment(3);
		$data=array(
	        'root'=>$id
		);
		
		
		$idc =$this->uri->segment(3);
		
		echo "<script>alert('Dear $id, Your Registration is successful, Your username send to your mobile number');</script>";

	   $this->db->where("id",$this->uri->segment(3));
	   $this->db->update("customer_info",$update);
        redirect(base_url()."apanel/paidcustomer",'refresh');
		}

		
	}
	public function editHeadline(){
		$data = array(
				// "subject" => $this->input->post("title"),
				"notice" => $this->input->post("content"),
				"date" => date("Y-m-d")
		);
		$this->db->where("id",$this->input->post("id"));
		if($this->db->update("marquee",$data)){
			redirect(base_url()."apanel/marquee");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}

	public function marquee(){
		$data = array(
				// "subject" => $this->input->post("title"),
				"notice" => $this->input->post("content"),
				"date" => date("Y-m-d")
		);
		if($this->db->insert("marquee",$data)){
			redirect(base_url()."apanel/marquee");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}

	public function addformDetail()
	{


		$id = $this->uri->segment(3);
		$this->db->where("id",$id);
		
		$data['abc'] = $this->db->get("customer_info")->row();
		$this->load->view('showform',$data);

	}
	public function deleteHeadline(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("marquee")){
			redirect(base_url()."apanel/marquee");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	public function editHeadline1(){
		$data = array(
				// "subject" => $this->input->post("title"),
				"notice" => $this->input->post("content"),
				"date" => date("Y-m-d")
		);
		$this->db->where("id",$this->input->post("id"));
		if($this->db->update("marquee",$data)){
			redirect(base_url()."apanel/marquee");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}

	function saveGallery(){
		$photo_name =($_FILES['selectedStu']['name']);
		$data=array(
				'product_name'=>$this->input->post("name"),
				'product_description'=>$this->input->post("desc"),
				'product_type'=>$this->input->post('type'),
				'product_Image'=>$photo_name,
				'product_quantity'=>$this->input->post("quantity"),
				'product_price'=>$this->input->post("price"),
				//'date'=>date("y-m-d")
		);
		$query = $this->db->insert("products",$data);
		if($query){
			$this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/images');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '2048';
			
			$config['file_name']=$photo_name;
		}
		if (!empty($_FILES['selectedStu']['name'])) {
			$this->upload->initialize($config);
			$this->upload->do_upload('selectedStu');
			
			redirect(base_url()."apanel/editdeleteproduct");
			//echo $image_path;
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}

	public function editdelproduct(){

		echo $id;
		$data = array(
				'product_name'=>$this->input->post("name"),
				'product_description'=>$this->input->post("desc"),
				'product_type'=>$this->input->post('type'),
				'product_Image'=>$photo_name,
				'product_quantity'=>$this->input->post("quantity"),
				'product_price'=>$this->input->post("price"),
		);
		//$this->db->where("id",$id);
		if($this->db->update("products",$data)){
			redirect(base_url()."apanel/editdeleteproduct");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
        
        
}
