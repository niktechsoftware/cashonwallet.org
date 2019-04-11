<?php
class Dashboard_model extends CI_Model
{
    
   
    public function changepassword($oldpass)
    {
        $this->db->where("password",$oldpass);
        $data1 = $this->db->get("customer_info");
        return $data1;
    }
    
    public function newpassword($newpass)
    {
        $newpass1 = array(
            'password' =>$newpass
        );
        $this->db->where("id",$this->session->userdata("customer_id"));
        $data1 = $this->db->update("customer_info",$newpass1);
        return $data1;
    }
    
    public function getLeftCountData1($cid,$count){
        
        $this->db->where('root', $cid);
        $leftjoiner = $this->db->get('tree');
        if($leftjoiner->num_rows()>0){
            
            $query2=$leftjoiner->row();
            
            if($query2->root_left){
                $left=$query2->root_left;
                $this->db->where("id",$left);
                $ty = $this->db->get("customer_info");;
                if($ty->num_rows()>0){
                  $ty=  $ty->row();
                  if($ty->status)
                    $count=$count+1;
                }
                // echo $query2->root_left;
                $count = $this->getLeftCountData1($left,$count);
                
                //$this->db->where("id", $right);
                //$cid = $this->db->get("customer_info")->row();
                
            }
            if($query2->root_right){
                
                // $count=$count+1;
                
                $right=$query2->root_right;
                $this->db->where("id",$right);
                $ty = $this->db->get("customer_info");;
                if($ty->num_rows()>0){
                  $ty=  $ty->row();
                  if($ty->status)
                    $count=$count+1;
                }
                //echo $query2->root_right;
                //$count=$count+1;
                $count = $this->getLeftCountData1($right,$count);
                
            }
            
            //if($rightjoiner->num_rows()>0){
            //foreach ($rightjoiner->result() as $query2)
            //{
            // $right=$query2->root;
            //$this->getRightData($right);
            //$this->db->where("id", $right);
            //$cid = $this->db->get("customer_info")->row();
            
        }
        return $count;
    }
    
    
    public function getLeftCountData12($cid,$count){
        
        $this->db->where('root', $cid);
        $leftjoiner = $this->db->get('tree');
        if($leftjoiner->num_rows()>0){
            
            $query2=$leftjoiner->row();
            
            if($query2->root_left){
                $left=$query2->root_left;
                $this->db->where("id",$left);
                $ty = $this->db->get("customer_info")->row()->status;
               
                    $count=$count+1;
                
                // echo $query2->root_left;
                $count = $this->getLeftCountData12($left,$count);
                
                //$this->db->where("id", $right);
                //$cid = $this->db->get("customer_info")->row();
                
            }
            if($query2->root_right){
                
                // $count=$count+1;
                
                $right=$query2->root_right;
                $this->db->where("id",$right);
                $ty = $this->db->get("customer_info")->row()->status;
              
                    $count=$count+1;
               
                //echo $query2->root_right;
                //$count=$count+1;
                $count = $this->getLeftCountData12($right,$count);
                
            }
            
            //if($rightjoiner->num_rows()>0){
            //foreach ($rightjoiner->result() as $query2)
            //{
            // $right=$query2->root;
            //$this->getRightData($right);
            //$this->db->where("id", $right);
            //$cid = $this->db->get("customer_info")->row();
            
        }
        return $count;
    }
    
    
    public function totalwallet($customer_id){
        
        //'SELECT daily_base_income.amount AS BDAmount, pair_maching_income.amount,  rouality_income.amount, pool_income.amount, no_fine_reward.amount, time_to_time_reward.amount FROM '
        $amount1 = $this->db->select_sum("amount")
        ->where("customer_id",$customer_id)
        ->get("daily_base_income")
        ->row()->amount;
        
        $amount2 = $this->db->select_sum("amount")
        ->where("customer_id",$customer_id)
        ->get("pair_maching_income")
        ->row()->amount;
        
        $amount3 = $this->db->select_sum("amount")
        ->where("customer_id",$customer_id)
        ->get("rouality_income")
        ->row()->amount;
        
        $amount4 = $this->db->select_sum("amount")
        ->where("customer_id",$customer_id)
        ->get("pool_income")
        ->row()->amount;
        
        $amount5 = $this->db->select_sum("amount")
        ->where("customer_id",$customer_id)
        ->get("no_fine_reward")
        ->row()->amount;
      
        
        $amount6 = $this->db->select_sum("amount")
        ->where("customer_id",$customer_id)
        ->get("time_to_time_reward")
        ->row()->amount;
        
        $amounttot =  $amount1+ $amount2+ $amount3+ $amount4+ $amount5+ $amount6;
      
      
        
        $this->db->select_sum("amount");
        $this->db->where("remark","Mpin by Income");
        $this->db->where("cid",$this->session->userdata("customer_id"));
        $mtdinner = $this->db->get("inner_daybook")->row()->amount;
        
        $this->db->select_sum("amount");
        $this->db->where("debit_credit",1);
        $this->db->where("cid",$this->session->userdata("customer_id"));
        $mp = $this->db->get("outer_daybook")->row()->amount;
         $tot= $mtdinner+$mp;

        return $amounttot- $tot;

    }
    
    
    function mwallettotal(){
    	$this->db->select_sum("amount");
    	$this->db->where("cid",$this->session->userdata("customer_id"));
    	$mt = $this->db->get("mbalance")->row()->amount;
    	$this->db->select_sum("amount");
    	$this->db->where("debit_credit",0);
    	$this->db->where("cid",$this->session->userdata("customer_id"));
    	$mtd = $this->db->get("outer_daybook")->row()->amount;
    	
    	/* $this->db->select_sum("amount");
    	$this->db->where("remark =","Mpin by M Balance");
    	$this->db->where("cid",$this->session->userdata("customer_id"));
    	$mtdinner = $this->db->get("inner_daybook")->row()->amount; */
    	//$tot= $mtd+$mtdinner;
    	return $mt;
    }
	
	function getDashboardCounts1( $customer_id ){

           
				
                $root_left = $this->db->select_sum("root_left")
                                   ->where("root",$customer_id)
                                   ->get("tree")
                                   ->row()->root_left;
                $Temp = !empty($root_left)?$root_left:0;
                $str = $this->tree->getLeftDataCount($customer_id,0);
                $NumOfLeftCustomer = explode("<br>", $str);
                 $AllCounts[] =  Array(
                     "title" => "Total Left ",
                     "prefix" => "",
                     "count" => $this->tree->getLeftDataCount($customer_id,0),
                  
                 );
				$count =0;
                $this->db->where("root",$customer_id);
               $r =  $this->db->get("tree")->row();
               $this->db->where("id",$r->root_left);
               $ty = $this->db->get("customer_info")->row()->status;
               if($ty){
                   $count=$count+1;
               }
              
               $lefttotal =$this->getLeftCountData1($r->root_left,$count);
               $lefttotal=$lefttotal*600;
               
                $AllCounts[] =  Array(
                     "title" => "Total Left Business",
                     "prefix" => "Rs. ",
                    "count" => $lefttotal,
                );


               /*$root_right = $this->db->select_sum("root_right")
                                   ->where("root",$customer_id)
                                   ->get("tree")
                                   ->row()->root_right;
                $Temp = !empty($root_right)?$root_right:0;
                $str = $this->tree->getRightDataCount($customer_id,0);
                $NumOfRightCustomer = explode("<br>", $str);
                 $AllCounts[] =  Array(
                      "title" => "Total Right",
                      "prefix" => "",
                      "count" => $this->tree->getRightDataCount($customer_id,0)

                );
				
$amount = $this->db->select_sum("amount")
                                   ->where("customer_id",$customer_id)
                                   ->get("daily_base_income")
                                   ->row()->amount;
                $Temp = !empty($amount)?$amount:0;
                $AllCounts[] =  Array(
                     "title" => "Total Right Business",
                     "prefix" => "Rs. ",
                     "count" => "comming soon"

                );
                $AllCounts[0]["count"] += $Temp;
               
               */

                
                return $AllCounts;

                                                
     }	
	 
//////////////////////////////////////////////////////////////////////
function getDashboardCounts2( $customer_id ){

                $this->load->model("tree");
				
				
                
               $root_right = $this->db->select_sum("root_right")
                                   ->where("root",$customer_id)
                                   ->get("tree")
                                   ->row()->root_right;
                $Temp = !empty($root_right)?$root_right:0;
                $str = $this->tree->getRightDataCount($customer_id,0);
                $NumOfRightCustomer = explode("<br>", $str);
                 $AllCounts[] =  Array(
                      "title" => "Total Right",
                      "prefix" => "",
                      "count" => $this->tree->getRightDataCount($customer_id,0)

                );
				
$this->db->where("root",$customer_id);
                $r =  $this->db->get("tree")->row();
                $count =0;
                $this->db->where("id",$r->root_right);
                $ty = $this->db->get("customer_info")->row()->status;
                if($ty){
                    $count=$count+1;
                }
                $lefttotal =$this->getLeftCountData1($r->root_right,$count);
                $lefttotal=$lefttotal*600;
              
                $AllCounts[] =  Array(
                     "title" => "Total Right Business",
                     "prefix" => "Rs. ",
                    "count" => $lefttotal

                );
                // $AllCounts[0]["count"] += $Temp;
               
               

                
                return $AllCounts;

                                                
     }	
	 
	 
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
   public   function getDashboardCounts( $customer_id ){

                $this->load->model("tree");
                $this->db->select_sum("amount");
                $this->db->where("remark","Mpin by Income");
                $this->db->where("cid",$customer_id);
                $mtdinner = $this->db->get("inner_daybook")->row()->amount;
                $AllCounts = Array(); 
                
                $AllCounts[0] =  Array(
                     "title" => "Total Wallet Balance",
                     "prefix" => "Rs. ",
                    "count"  => 0-$mtdinner
                     
          
                );

           
          /*      $amount = $this->db->select_sum("amount")
                                   ->where("debit_credit","1")
                                   ->where("cid",$customer_id)
                                   ->get("inner_daybook")
                                   ->row()->amount;
                $Temp = !empty($amount)?$amount:0;
                $AllCounts[] =  Array(
                     "title" => "DayBook",
                     "prefix" => "Rs. ",
                     "count" => $Temp
                );
                $AllCounts[0]["count"] = $AllCounts[0]["count"]  + $Temp;
          */      
                $temp=0;
               
               
                if($mtdinner>0){
                   // $temp=$mtdinner/660;
                    $temp=$mtdinner;
                }else{
                    $temp=0;
                }
                $AllCounts[] =  Array(
                    "title" => "Mpin Amount(Income)",
                    "prefix" => "",
                    "count" =>$temp,
                    
                    );
                
           
                $amount = $this->db->select_sum("amount")
                                   ->where("customer_id",$customer_id)
                                   ->get("daily_base_income")
                                   ->row()->amount;
                $Temp = !empty($amount)?$amount:0;
                $AllCounts[] =  Array(
                     "title" => "Daily Base Income",
                     "prefix" => "Rs. ",
                     "count" => $Temp
                );
                $AllCounts[0]["count"] += $Temp;


              $amount = $this->db->select_sum("amount")
                                   ->where("customer_id",$customer_id)
                                   ->get("pair_maching_income")
                                   ->row()->amount;
                $Temp = !empty($amount)?$amount:0;
                $Temp = !empty($amount)?$amount:0;
                $AllCounts[] =  Array(
                     "title" => "Pair Matching Income",
                     "prefix" => "Rs. ",
                     "count" => $Temp
                );
                $AllCounts[0]["count"] += $Temp;
                

           
                $this->db->select_sum("amount");
                $this->db->where("remark","Pool Income ");
                 $this->db->where("plan_number","3");
                $this->db->where("cid",$this->session->userdata("customer_id"));
                $amount = $this->db->get("inner_daybook")->row()->amount;
                $Temp = !empty($amount)?$amount:0;
                $AllCounts[] =  Array(
                     "title" => "Auto Pool Income",
                     "prefix" => "Rs. ",
                     "count" => $Temp
                );
                $AllCounts[0]["count"] += $Temp;
                


                $amount = $this->db->select_sum("amount")
                                   ->where("customer_id",$customer_id)
                                   ->get("rouality_income")
                                   ->row()->amount;
                $Temp = !empty($amount)?$amount:0;
                $AllCounts[] =  Array(
                     "title" => "Core Committee Income",
                     "prefix" => "Rs. ",
                     "count" => $Temp
                );
                $AllCounts[0]["count"] += $Temp;



                $this->db->select_sum("amount");
                $this->db->where("remark","No Fine Reward");
                 $this->db->where("plan_number","4");
                $this->db->where("cid",$this->session->userdata("customer_id"));
                $amount = $this->db->get("inner_daybook")->row()->amount;
                $Temp = !empty($amount)?$amount:0;
                $AllCounts[] =  Array(
                     "title" => "No Time Reward",
                     "prefix" => "Rs. ",
                     "count" => $Temp
                );
                $AllCounts[0]["count"] += $Temp;
                

         
           
                $amount = $this->db->select_sum("amount")
                                   ->where("customer_id",$customer_id)
                                   ->get("time_to_time_reward")
                                   ->row()->amount;
                $Temp = !empty($amount)?$amount:0;
                $AllCounts[] =  Array(
                     "title" => "Bonanza Income",
                     "prefix" => "Rs. ",
                     "count" => $Temp
                );
                $AllCounts[0]["count"] += $Temp;

                

            
           
                


             /*   $amount = $this->db->select_sum("amount")
                                   ->where("status","1")
                                   ->where("customer_id",$customer_id)
                                   ->get("daily_base_income")
                                   ->row()->amount;
                $Temp = !empty($amount)?$amount:0;
                $AllCounts[] =  Array(
                     "title" => "Withdrawl Details",
                     "prefix" => "Rs. ",
                     "count" => $Temp
               );

             */   

                
            
           

                $mpin = $this->db->select("*")
                                 
                                 ->where("customerid",$customer_id)
                                 ->get("mpin")
                                 ->num_rows();
                $Temp = !empty($mpin)?$mpin:0;
                $AllCounts[] =  Array(
                     "title" => "Generated MPIN",
                     "prefix" => "",
                     "count" => $Temp

                );

                $mpin = $this->db->select("*")
                ->where("status","1")
                ->where("customerid",$customer_id)
                ->get("mpin")
                ->num_rows();
                $Temp = !empty($mpin)?$mpin:0;
                $AllCounts[] =  Array(
                    "title" => "Used MPIN",
                    "prefix" => "",
                    "count" => $Temp
                    
                    );
            
           

            //   $root_left = $this->db->select_sum("root_left")
            //                       ->where("root",$customer_id)
            //                       ->get("tree")
            //                       ->row()->root_left;
            //     $Temp = !empty($root_left)?$root_left:0;
            //     $str = $this->tree->getLeftDataCount($customer_id,0);
            //     $NumOfLeftCustomer = explode("<br>", $str);
                   $count =0;
                $this->db->where("root",$customer_id);
               $r =  $this->db->get("tree")->row();
              
               $this->db->where("id",$r->root_left);
               $ty = $this->db->get("customer_info");
                 if($ty->num_rows()>0){
                  $ty = $ty->row();
                //if($ty->status){
                
                   $count=$count+1;
               //}
              

                  //$lefttotal =$this->getLeftCountData1($r->root_left,$count);
                 $AllCounts[] =  Array(
                     "title" => "Total Left",
                     "prefix" => "",
                     "count" =>$this->getLeftCountData12($r->root_left,$count),

                 );
               }
                 
                  $count =0;
                $this->db->where("root",$customer_id);
               $r =  $this->db->get("tree")->row();
              
               $this->db->where("id",$r->root_left);
               $ty = $this->db->get("customer_info");
                 if($ty->num_rows()>0){
                  $ty = $ty->row();
                if($ty->status){
                
                   $count=$count+1;
               }
               $AllCounts[] =  Array(
                     "title" => "Total Left Active ",
                     "prefix" => "",
                     "count" =>$this->getLeftCountData1($r->root_left,$count),

                 );
             }

             $count =0;
                $this->db->where("root",$customer_id);
               $r =  $this->db->get("tree")->row();
              
               $this->db->where("id",$r->root_right);
               $ty = $this->db->get("customer_info");
                 if($ty->num_rows()>0){
                  $ty = $ty->row();
                //if($ty->status){
                
                   $count=$count+1;

                 $AllCounts[] =  Array(
                      "title" => "Total Right",
                      "prefix" => "",
                      "count" => $this->getLeftCountData12($r->root_right,$count)

                );
               }
               $count =0;
                $this->db->where("root",$customer_id);
               $r =  $this->db->get("tree")->row();
              
               $this->db->where("id",$r->root_right);
               $ty = $this->db->get("customer_info");
                 if($ty->num_rows()>0){
                  $ty = $ty->row();
                if($ty->status){
                
                   $count=$count+1;
               }
               $AllCounts[] =  Array(
                      "title" => "Total Right Active",
                      "prefix" => "",
                      "count" => $this->getLeftCountData1($r->root_right,$count)

                );
               }




                $count =0;
                $this->db->where("root",$customer_id);
               $r =  $this->db->get("tree")->row();
              
               $this->db->where("id",$r->root_left);
               $ty = $this->db->get("customer_info");
                 if($ty->num_rows()>0){
                	$ty = $ty->row();
                if($ty->status){
               	
                   $count=$count+1;
               }
              
               $lefttotal =$this->getLeftCountData1($r->root_left,$count);
               $lefttotal=$lefttotal*600;
               
                $AllCounts[] =  Array(
                     "title" => "Total Left Business(Active)",
                     "prefix" => "Rs. ",
                    "count" => $lefttotal,
                );
               }else{
               	 $AllCounts[] =  Array(
                     "title" => "Total Left Business(Active)",
                     "prefix" => "Rs. ",
                    "count" => 0,
                );
               }
                // $AllCounts[0]["count"] += $Temp;

                
            
           



            //   $root_right = $this->db->select_sum("root_right")
            //                       ->where("root",$customer_id)
            //                       ->get("tree")
            //                       ->row()->root_right;
            //     $Temp = !empty($root_right)?$root_right:0;
            //     $str = $this->tree->getRightDataCount($customer_id,0);

                $count =0;
            
                //if($ty->status){

            
           
                $this->db->where("root",$customer_id);
                $r =  $this->db->get("tree")->row();
                $count =0;
                $this->db->where("id",$r->root_right);
                $ty = $this->db->get("customer_info");
                if($ty->num_rows()>0){
                	$ty = $ty->row();
                if($ty->status){
                    $count=$count+1;
                }
                $lefttotal =$this->getLeftCountData1($r->root_right,$count);
                $lefttotal=$lefttotal*600;
               $Temp = !empty($lefttotal)?$lefttotal:0;
                $AllCounts[] =  Array(
                     "title" => "Total Right Business(Active)",
                     "prefix" => "Rs. ",
                    "count" => $Temp

                );
                }else{
                	  $AllCounts[] =  Array(
                     "title" => "Total Right Business(Active)",
                     "prefix" => "Rs. ",
                    "count" => 0);
                }
                // $AllCounts[0]["count"] += $Temp;



                 $amount = $this->db->select_sum("amount")
                                   ->where("cid",$customer_id)
                                   ->get("mbalance")
                                   ->row()->amount;
                $Temp = !empty($amount)?$amount:0;
                $AllCounts[] =  Array(
                     "title" => "My MPin Wallet Balance",
                     "prefix" => "Rs. ",
                     "count" => $Temp
                    //  "count" => $this->mwallettotal(),
                );
                // $AllCounts[0]["count"] += $Temp;
               
                $this->db->select_sum("amount");
                $this->db->where("debit_credit",1);
                $this->db->where("status",0);
                $this->db->where("cid",$this->session->userdata("customer_id"));
                $mp = $this->db->get("outer_daybook")->row()->amount;
                $st = "Not Done";
                  $Temp = !empty($mp)?$mp:0;
               // if($mp->status){ $st =="Approved";}else{ $st="Pending";}
                $AllCounts[] =  Array(
                    "title" => "Withdrawal Request ",
                    "prefix" => "Rs.",
                    "count" => $Temp,
                    //  "count" => $this->mwallettotal(),
                    );

             

                
                return $AllCounts;

                                                
     }	


     // public function getCountDetails($customer_id, $title){

     //      $result = Array();

     //      switch($title){
     //          case "My Wallet Balance" : break;

     //           case "DayBook" : 
                       
     //                    $result = $this->db->select("*")
     //                                       ->where("debit_credit","1")
     //                                       ->where("cid",$customer_id)
     //                                       ->get("inner_daybook")
     //                                       ->result();    
                                  

										   
     //           break;

     //           case "Daily Base Income" : 

     //                    $result = $this->db->select("amount,date")
     //                                       ->where("customer_id",$customer_id)
     //                                       ->get("daily_base_income")
     //                                       ->result(); 
										   
					// 					 /*$result = $this->db->select("*")
     //                                      ->where("customer_id",$customer_id)
     //                                       ->get("daily_base_income")
     //                                       ->result();
										  
					// 					   $result1 = $this->db->select("customer_name")
     //                                       ->where("id",$customer_id)
     //                                       ->get("customer_info")
     //                                       ->result();
					// 					   echo $result1;*/
										  
										 
										   
										   
     //           break;

     //           case "Pair Matching Income" :

     //           $result = $this->db->select("amount,afterCapping,date")
     //                                       ->where("status","1")
     //                                       ->where("customer_id",$customer_id)
     //                                       ->get("pair_maching_income")
     //                                       ->result(); 
     //                                       break;

     //           case "Pool Income" :

     //           $result = $this->db->select("amount,date")
     //                                       ->where("status","1")
     //                                       ->where("customer_id",$customer_id)
     //                                       ->get("pool_income")
     //                                       ->result(); 
     //                                       break;

     //           case "Royality Income" : 
     //           $result = $this->db->select("amount,date")
     //                                       ->where("status","1")
     //                                       ->where("customer_id",$customer_id)
     //                                       ->get("rouality_income")
     //                                       ->result();
     //                                       break;

     //           case "Time to Time Reward" :
     //           $result = $this->db->select("amount,date")
     //                                       ->where("status","1")
     //                                       ->where("customer_id",$customer_id)
     //                                       ->get("time_to_time_reward")
     //                                       ->result();
     //                                        break;

     //           case "No Time Reward" :
     //           $result = $this->db->select("*")
     //                                       ->where("status","1")
     //                                       ->where("customer_id",$customer_id)
     //                                       ->get("no_fine_reward")
     //                                       ->result(); 
     //                                       break;

     //           case "Withdrawl Details" : break;

     //           case "Buy MPIN" : 
     //           $result = $this->db->select("mpin")
     //                                       ->where("status","1")
     //                                       ->where("customerid",$customer_id)
     //                                       ->get("mpin")
     //                                       ->result(); 
     //                                        break;

     //           case "Total Left" :
     //           $result = $this->tree->getLeftData($cid,$count); break;

     //           case "Total Left Business" : break;

     //           case "Total Right" : break;

     //           case "Total Right Business" :  break;

     //           case "My MPin Wallet Balance" : 

     //           $result = $this->db->select("*")
     //                                       ->where("cid",$customer_id)
     //                                       ->get("mbalance")
     //                                       ->result();break;

     //           default : break;
     //      }
     //      return $result;
		   
     // }
     
   

    
}