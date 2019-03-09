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
			$this->db->where("email", $this->input->post("username"));
			$this->db->where("password", $this->input->post("password"));
			$query = $this->db->get("customer_product");
			if ($query->num_rows() > 0) {
				$res = $query->row();
				$loginData = array(
					"customer_username" => $res->email,
					"customer_password" => $res->password,
					"is_login" => true,
					"is_lock" => true,
					"login_date" => date("d-M-Y"),
					"login_time" => date("H:i:s")
				);
			return $loginData;
		} else {
			$this->db->where("username", $this->input->post("username"));
			$this->db->where("password", $this->input->post("password"));
			$query = $this->db->get("customer_info");
			if ($query->num_rows() > 0) {
				$res = $query->row();
				$loginData = array(
					"customer_username" => $res->username,
					"customer_password" => $res->password,
					"is_login" => true,
					"is_lock" => true,
					"login_date" => date("d-M-Y"),
					"login_time" => date("H:i:s")
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