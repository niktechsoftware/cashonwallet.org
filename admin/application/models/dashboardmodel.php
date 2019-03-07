<?php
class dashboardmodel extends CI_Model
{
   
     public function getleftjoiner($root){
        $tot=0;
        $this->db->from("tree");
        $this->db->where("left_joiner",$root);
        $num_rows = $this->db->get();
        if($num_rows->num_rows()>0){
        foreach($num_rows->result() as $rt):
        
        $this->db->where("id",$rt->root_left);
        $checks = $this->db->get("customer_info");
        if($checks->num_rows()>0){
            $checks=$checks->row();
        if($checks->status){
            $tot=$tot+1;
        }
        }
        endforeach;}
        
        return $tot;
    }
    
    public function getrightjoiner($root){
        $tot=0;
        $this->db->from("tree");
        $this->db->where("right_joiner",$root);
        $num_rows = $this->db->get();
        if($num_rows->num_rows()>0){
        foreach($num_rows->result() as $rt):
        
        $this->db->where("id",$rt->root_right);
        $checks = $this->db->get("customer_info");
         if($checks->num_rows()>0){
            $checks=$checks->row();
        if($checks->status){
            $tot=$tot+1;
        }}
        endforeach;}
        
        return $tot;
    }
    
   
   
   
    
}