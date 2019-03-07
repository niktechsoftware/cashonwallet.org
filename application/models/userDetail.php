<?php 
class UserDetail extends CI_Model
{
    public function userReg($data)
    {
        $this->db->set("joining_date",date('Y-m-d H:i:s A'));
        $this->db->insert("customer_info",$data);
        return true;
    }
}


?>