<?php
class LoginModel extends CI_Model{
	
	function validate(){
		// get username password and check is it for admin,employee or student.
		
		// check is it for admin
        $this->db->where("admin_username", $this->input->post("uname"));
        $this->db->where("admin_password", md5($this->input->post("password")));
        $general = $this->db->get("general_settings");
        
        if($general->num_rows >= 1){
            $res = $general->row();
        	$loginData = array(
        			"login_type" => "admin",
					"institute_name" => $res->institute_name,
					"address_1" => $res->address_1,
					"address_2" => $res->address_2,
					"city" => $res->city,
					"state" => $res->state,
					"pin" => $res->pin,
					"phone_number" => $res->phone_number,
					"mobile_number" => $res->mobile_number,
					"username" => $res->admin_username,
					"name" => $res->owner_name,
					"photo" => $res->ico_logo,
					"logo" => $res->logo,
					"fsd" => $res->fsd,
					"is_login" => true,
					"is_lock" => true,
						"status" => $res->status,
					"login_date" => date("d-M-Y"),
					"login_time" => date("H:i:s")
        	);
            return $loginData;
        }
    }
    
    function validateLock(){
    	$login_type = $this->input->post('logintype');
    	//echo $login_type;
    	//die();
    		$this->db->where("admin_username", $this->input->post("uname"));
    		$this->db->where("admin_password", md5($this->input->post("password")));
    		$result = $this->db->get('general_settings');
    		if($result->num_rows() > 0){
    			return true;
    		}
			else
			{
    			return false;
    		}
    }


      function wallet_recharge()
      {
        $id2 = $this->session->userdata("customer_id");
        $this->db->select('username');
        $this->db->from('customer_info');
        $this->db->where('id',$id2);
        $username=$this->db->get()->row();
        return $username;



      }
      






}