<?php
class Userdetail extends CI_Model
{
    public function userReg($data)
    {
        $this->db->insert("customer_product", $data);
       // $this->db->insert("tree");

        return true;
    }
    
   
    public function update_customer_table($data)
    {
       $id = $this->session->userdata("customer_id");
     
        $this->db->where('id',$id);
        $this->db->update('customer_product',$data);
        return true;
        
    }
     public function update_account_table($data)
    {
       $id = $this->session->userdata("customer_id");
     
        $this->db->where('id',$id);
        $this->db->update('customer_product',$data);
        return true;
        
    }
    
    public function update_amount_status($id)
    {
        $data=array
        (
            'amount'=>600.00,
            'status'=>1,
            'active_date'=>date('Y-m-d H:i:s')
        );
        $this->db->where('id',$id);
        $this->db->update('customer_product',$data);
        
        return true;
        
    }

    public function smssetting()
    {

        $this->db->insert("sms_setting", $data);
        return true;
    }

    //public function userRegupdate($adhaarnumber){
   // public function userRegupdate($get_id)
    public function userRegupdate($name,$mobilenumber,$email)
    {

       // $this->db->where("adhaarnumber",$adhaarnumber);
       $this->db->where("customer_name",$name);
       $this->db->where("mobilenumber",$mobilenumber);
       $this->db->where("email",$email);
      
        $get_id = $this->db->get("customer_product")->row()->id;
        $get_id1 = 100+$get_id;
        $update = array(
            'username' => "cashonc" . $get_id1,
        );
        $this->db->where("id", $get_id);
        $this->db->update("customer_product", $update);
        // $tr=array(
        //     'root' => $get_id
        // );
        // $this->db->insert("tree", $tr);
      return $get_id;

    }

    public function fetch_data($id)
    {
        $this->db->where("id", $id);
        $fetch = $this->db->get("customer_product");
        return $fetch->row();
    }
   /*  function joinerdrop()
    {
        $query = $this->db->query('SELECT root,root FROM tree');
        return $query->result_array();
    } */
}
?>
