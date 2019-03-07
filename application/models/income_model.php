<?php  
   class income_model extends CI_Model  
   {  
     
      public function daybook()  
      {  
         $this->db->where("cid",$this->session->userdata("customer_id"));
         $query = $this->db->get('inner_daybook');  
           return $query;  
      }


      public function dailyincome()  
      {  
         $this->db->where("cid",$this->session->userdata("customer_id"));
                  $this->db->where("plan_number",1);
         $query = $this->db->get('inner_daybook');  
           return $query;  
      }


      public function pairincome()  
      {  $date  = date('Y-m-d');
         $this->db->where("cid",$this->session->userdata("customer_id"));
           $this->db->where("DATE(date_time)",$date);
                  $this->db->where("plan_number",2);
         $query = $this->db->get("inner_daybook");  
           return $query; 
      }


      public function poolincome()  
      {  
         $this->db->where("cid",$this->session->userdata("customer_id"));
                  $this->db->where("plan_number",3);
         $query = $this->db->get("inner_daybook");  
           return $query; 
      } 


      public function roylityincome()  
      {  
         $this->db->where("cid",$this->session->userdata("customer_id"));
                  $this->db->where("plan_number",6);
         $query = $this->db->get("inner_daybook"); 
           return $query;     
      }

      
      public function notimereward()  
      {  
         $this->db->where("cid",$this->session->userdata("customer_id"));
                  $this->db->where("plan_number",4);
         $query = $this->db->get("inner_daybook");  
           return $query;  
      }

      public function timetoreward()  
      {  
         $this->db->where("cid",$this->session->userdata("customer_id"));
                  $this->db->where("plan_number",5);
         $query = $this->db->get("inner_daybook");  
           return $query;  
      } 
   
      

   }  
?> 