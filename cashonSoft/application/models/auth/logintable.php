<?php
defined('BASEPATH') or exit('No direct script access allowed');

class logintable extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @param  [String]   username       [give by username from login form.]
	 * @return [array]                 	 return login table Data getting from database according given username.
	 */
	function getLoginData($username, $password)
	{
	    
	    $loginData=array('is_login'=>false);

		$this->db->where("admin_username", $username);
		$this->db->where("admin_password", md5($password));
		$general = $this->db->get("general_settings");
 $t=date("H:i:s");
		if ($general->num_rows() > 0) {
			$res = $general->row();
			//echo $password;
			$loginData = array(
				"business_name" => $res->business_name,
				"login_type" => "admin",
				"name" => $res->customer_name,
				"address_1" => $res->address_1,
				"address_2" => $res->address_2,
				"city" => $res->city,
				"state" => $res->state,
				"pin" => $res->pin,
				"nationality" => $res->nationality,
				"customer_id" => $res->id,
				"phone_number" => $res->phone_number,
				"mobile_number" => $res->mobile_number,
				"email_1" => $res->email1,
				"email_2" => $res->email2,
				"Language" => $res->language,
				"customer_username" => $res->username,
				"customer_password" => $res->password,
				"photo" => $res->ico_logo,
				"logo" => $res->logo,
				"is_login" => true,
				"is_lock" => true,
				"login_date" => date("d-M-Y"),
				"login_time" => date("H:i:s")
			);
			return $loginData;
		} else {
		//$this->db->where("status",0);
			$this->db->where("username", $username);
			$this->db->where("password", $password);
			$query = $this->db->get("customer_info");
			if ($query->num_rows() > 0) {
				$res = $query->row();
				$general = $this->db->get("general_settings");
				$school = $general->row();
				$loginData = array(
					"business_name" => $school->business_name,
					"login_type" => "customer",
					"customer_id" => $res->id,
					"parent_id" => $res->parent_id,
					"name" => $res->customer_name,
					"dob" => $res->dob,
		   // "email1" => $res->email_1,
					"customer_username" => $res->username,
					"customer_password" => $res->password,
	      //  "phone_number" => $res->phonenumber,
					"mobile_number" => $res->mobilenumber,
					"currentaddress" => $res->current_address,
					"permanentaddress" => $res->permanent_address,
					"city" => $res->city,
					"state" => $res->state,
					"pin" => $res->pin,
					"joiner_id" => $res->joiner_id,
					"joiner_name" => $res->joiner_name,
					"joiner_position" => $res->position,
					"pan_number" => $res->pannumber,
					"adhaar_number" => $res->adhaarnumber,
					"status" => $res->status,
		//	"photo" => $res->photo,
					"logo" => $school->logo,
//"fsd" => $school->finance_start_date,
					"is_login" => true,
					"is_lock" => true,
					"login_date" => date("d-M-Y"),
					"login_time" => $t,
					"expire" =>date("H:i:s", strtotime( "$t + 4 mins"))
				);
				return $loginData;
			}
		}
	}
	


	function getLogin($id)
	{
		
		// $this->db->select('password');
		$this->db->where('id', $id);
		$result = $this->db->get('login');

		/**
		 * 	return login table Data getting from database according that username.
		 */
		return $result->row();
	}

	function setLogin($loginData)
	{

		if ($this->db->insert('login', $loginData)) :
			return $this->db->insert_id();
		else :
			return false;
		endif;
	}


}