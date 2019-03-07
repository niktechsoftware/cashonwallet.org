<?php
class CheckMpin extends CI_Model
{
	public function findMpin($mpin)
	{
		$this->db->where('mpin',$mpin);
	    $query = $this->db->get('mpin');
	    return $query->row();
	    
	}
	

	public function mpinupdate($cid)
	{
        $update	=	array(
            'amount' => 600.00,
        );
       $this->db->where("id",$cid);
		$this->db->update("customer_info",$update);
		$rid  = $this->db->count_all_results('inner_daybook');
		$rid =$rid+1;
		$ivc = "CashonI".$rid;
		$daybook =array(
		    'cid'         => $cid,
		    'amount'      => 600.00,
		    'debit_credit'=>  1,
		    'remark'      =>  "From MPin Account",
		    'date_time'   => date("Y-m-d H:s:i"),
		    'invoice_number'  =>$ivc, 
		    'plan_number'     =>9
		);
		
		$this->db->insert("inner_daybook",$daybook);
        return $id;
    }
    
    public  function insert_mpin($data) 
    { 
        $this->db->insert('mpin',$data);
        return true;
    }

}