<?php
class Smsmodel extends CI_Model{
	function getsmsseting($id){
		$this->db->where("id",$id);
		$row = $this->db->get("customer_info")->row();
		return $row;
	}
	}?>