<?php 
class Mpin extends CI_Model
{
    
    public function deducted_money($mtype,$ddamount)
    {
        $id1 = $this->session->userdata("customer_id");
        $this->db->select('amount');
        $this->db->from('mbalance');
        $this->db->where('cid',$id1);
        $a=$this->db->get()->row();
        $count=$this->input->post('number');

        if($mtype==1){
            $rid  = $this->db->count_all_results('inner_daybook');
            $rid =$rid+1;
            $ivc = "CashonI".$rid;
            $daybookdata = array(
                'cid'             =>$id1,
                'amount'          =>$ddamount,
                'debit_credit'     =>1,
                'remark'           =>"Mpin by Income",
                'date_time'       =>date("Y-m-d H:s:i"),
                'invoice_number'   =>$ivc,
                'plan_number'     =>10
            );
            $this->db->insert("inner_daybook",$daybookdata);
        }
        else{
            $data=array(
                'amount'=>$a->amount - $ddamount
                
            );
            $this->db->where('cid',$id1);
            $this->db->update('mbalance',$data);
            $rid  = $this->db->count_all_results('inner_daybook');
            $rid =$rid+1;
            $ivc = "CashonI".$rid;
            $daybookdata = array(
                'cid'             =>$id1,
                'amount'          =>$ddamount,
                'debit_credit'     =>1,
                'remark'           =>"Mpin by M Balance",
                'date_time'       =>date("Y-m-d H:s:i"),
                'invoice_number'   =>$ivc,
                'plan_number'     =>8
            );
            $this->db->insert("inner_daybook",$daybookdata);
        }
        return true;
        
    }
    
    public function generate_mpin()
    {
        $id2 = $this->session->userdata("customer_id");
        $this->db->select('amount');
        $this->db->from('mbalance');
        $this->db->where('cid',$id2);
        $amount=$this->db->get()->row();
        return $amount;
    }
    
    public function select_mpin()
    {
        
        //$this->db->select('mpin,status');
        $this->db->from('mpin');
        $this->db->where("customerid",$this->session->userdata("customer_id"));
        $mpin=$this->db->get();
        return $mpin->result();
    }
    
    public function select_customerid()
    {
        $this->db->select('id');
        $this->db->from('customer_info');
        $id=$this->db->get();
        return $id->result();
    }
    
    public function match_customerid($cusid)
    {
        $this->db->where('username',$cusid);
        $id=$this->db->get('customer_info');
        return $id->row();
    }
    
    public function match_mpin($pin,$activateid)
    {   $check = false;
    $this->db->where("mpin",$pin);
    $this->db->where("status",NULL);
    $cidj  = $this->db->get("mpin")->row()->customerid;
       // $cuid =$this->session->userdata("customer_id");
        //$this->db->where("id",$cidh);
        //$cidj = $this->db->get("customer_info")->row();
       
        if($cidj==NULL){
            $cidj =$cuid;
        }
        $this->db->where("root",$cidj);
        $cid =  $this->db->get("tree")->row();
        
        if($cid->root==$activateid){
            $lefty=true;
        }else{
            if(($cid->root_left==$activateid)||($cid->root_right==$activateid)){
            $lefty=true;
        }else{
            $lefty=$this->getleftPair($cid->root_left,$activateid,$check);
            $righty = $this->getleftPair($cid->root_right,$activateid,$check);
            echo $lefty." and ".$righty;
        }
        }
       
        if(($lefty)||($righty)){
        $this->db->where('status',Null);
        $this->db->where('mpin',$pin);
        $mpin=$this->db->get('mpin');
        return $mpin->row();
        }else{
            return false;
        }
    }
    
   
    public function getleftPair($id,$activateid,$check){
       
        ///
        $this->db->where('root', $id);
        $leftjoiner = $this->db->get('tree');
        if($check!=true){
        if($leftjoiner->num_rows()>0){
            
            $query2=$leftjoiner->row();
            
            if($query2->root_left){
                $left=$query2->root_left;
               
                if($left==$activateid){
                    echo $left;
                    $check=true;
                    return true;
                    
                }
                $check= $this->getleftPair($left,$activateid,$check);
                
                //$this->db->where("id", $right);
                //$cid = $this->db->get("customer_info")->row();
                
            }
            if($query2->root_right){
                
                // $count=$count+1;
                
                $right=$query2->root_right;
               
                if($right==$activateid){
                    echo $right;
                    $check=true;
                    return true;
                  
                }//$count=$count+1;
                $check=$this->getleftPair($right,$activateid,$check);
                
            }
            
            //if($rightjoiner->num_rows()>0){
            //foreach ($rightjoiner->result() as $query2)
            //{
            // $right=$query2->root;
            //$this->getRightData($right);
            //$this->db->where("id", $right);
            //$cid = $this->db->get("customer_info")->row();
            
        }}
        return $check;
    }
        
        
        
    
    
    public function getrightPair($id,$activateid,$check){
        
        $this->db->where('root',$id);
        $leftpair = $this->db->get('tree');
        if($check!=true){
        if($leftpair->num_rows()>0){
            if($check!=true){
               
            $leftpair =$leftpair->row();
           
            if(($leftpair->root_right!=NULL)){
                if($leftpair->root_right==$activateid){
                    $check=true;
                   
                }
                
                $check= $this->getrightPair($leftpair->root_right,$activateid,$check);;
                // $this->getpairall($leftpair->root_right,$right);
                //echo $pair['pairb'];
            }
            
            if(($leftpair->root_left!=NULL)){
                if($leftpair->root_left==$activateid){
                    $check=true;
                   
                }
                $check =$this->getleftPair($leftpair->root_left,$activateid,$check);
                //$this->getpairall($leftpair->root_left,$pair);
                //echo $pair['pairb'];
            }
           
            }}} return $check;
    }
    
    
    
    
    
}


?>