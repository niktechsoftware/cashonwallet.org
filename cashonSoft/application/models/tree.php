<?php
class tree extends CI_Model
{
    
    public function root_id($rootid)
    {
        $this->db->where('root',$rootid);
        $query = $this->db->get('tree');
        return $query->row();
    }
    
    
    public function getRightData($cid,$count){
       
        $this->db->where('root', $cid);
        $leftjoiner = $this->db->get('tree');
        
        if($leftjoiner->num_rows()>0){
            foreach ($leftjoiner->result() as $query2)
            {
               
                if($query2->root_right){
                    $this->db->where("id", $query2->root_right);
                    $data1 = $this->db->get("customer_info")->row();
                    if($data1){
                       /* echo $data1->username."[".$data1->customer_name."]<br>";
						echo $data1->joining_date."[".$data1->mobilenumber."]<br>";
						echo $data1->amount."[".$data1->position."]<br>";*/
						echo "<table class='table table-bordered table-striped table-hover'>
							 <tr>
								 <th>Username</th>
								 <th>Customer Name</th>
								 <th>Joining Date</th>
								 <th>Mobile Number</th>
								 <th>Amount</th>
								 <th>Position</th>
							 </tr>

							<tr>
							<td>". $data1->username. "</td>
								 <td>". $data1->customer_name. "</td>
								 <td>". $data1->joining_date. "</td>
								 <td>". $data1->mobilenumber. "</td>
								 <td>". $data1->amount. "</td>
								 <td>". $data1->position. "</td>
							</tr>
							</table>";
                    }
                    $right=$query2->root_right;
                    $this->getRightData($right,$count);
                    
                }
               
            }
        }
          
        
    }
    
    public function getLeftData($cid,$count){
       
        $this->db->where('root', $cid);
        $leftjoiner = $this->db->get('tree');
        
        
        if($leftjoiner->num_rows()>0){
            foreach ($leftjoiner->result() as $query2)
            {
                
                if($query2->root_left){
                    $this->db->where("id", $query2->root_left);
                    $data1 = $this->db->get("customer_info")->row();
                    if($data1){
                       
						echo "<table class='table table-bordered table-striped table-hover'>
							 <tr>
								 <th>Username</th>
								 <th>Customer Name</th>
								 <th>Joining Date</th>
								 <th>Mobile Number</th>
								 <th>Amount</th>
								 <th>Position</th>
							 </tr>

							<tr>
							<td>". $data1->username. "</td>
								 <td>". $data1->customer_name. "</td>
								 <td>". $data1->joining_date. "</td>
								 <td>". $data1->mobilenumber. "</td>
								 <td>". $data1->amount. "</td>
								 <td>". $data1->position. "</td>
							</tr>
							</table>";
                    }
                    $right=$query2->root_left;
                   $this->getLeftData($right,$count);
                  
                    
                }
            }
          
            
        }
    }

 





    public function getRightDataCount($cid,$count){
        
        $this->db->where("id", $cid);
        $data1 = $this->db->get("customer_info")->row();
        if($data1){
          //echo $data1->username."[".$data1->customer_name."]<br>";
          $count++;
         
        }
        $this->db->where('right_joiner', $cid);
        $leftjoiner = $this->db->get('tree');

        if($leftjoiner->num_rows()>0){
            foreach ($leftjoiner->result() as $query2){
                if($query2->root_right){
                    $right=$query2->root_right;
                    $count =$this->getRightDataCount($right,$count);
                }
                if($query2->root_left){
                    $left=$query2->root_left;
                    $count =$this->getLeftDataCount($left,$count);

                }   
            }
        }
        return $count;

    }


    public function getLeftDataCount($cid,$count){
        $this->db->where("id", $cid);
        $data1 = $this->db->get("customer_info")->row();
        if($data1){
            //echo $data1->username."[".$data1->customer_name."]<br>";
            $count++;
        }
        $this->db->where('left_joiner', $cid);
        $leftjoiner = $this->db->get('tree');


        if($leftjoiner->num_rows()>0){
            foreach ($leftjoiner->result() as $query2){
                if($query2->root_right){
                     $right=$query2->root_right;
                     $count =$this->getRightDataCount($right,$count);

                }
                if($query2->root_left){
                     $right=$query2->root_left;
                     $count =$this->getLeftDataCount($right,$count);
                }
            }
        }
        return $count;
    }

    
  
    
    //get left count
    public function getLeftCount($cid,$count){
        
        $this->db->where('root', $cid);
        $query2 = $this->db->get('tree')->row();
        if($query2->root_left){
            $count=$count+1;
            $this->db->where('root', $query2->root_left);
            $leftjoiner = $this->db->get('tree');
        
        
        if($leftjoiner->num_rows()>0){
            foreach ($leftjoiner->result() as $query2)
            {
                
                if($query2->root_left){
                    $count=$count+1;
                   
                    $left=$query2->root_left;
                    $count = $this->getLeftCountData($left,$count);
                    
                    //$this->db->where("id", $right);
                    //$cid = $this->db->get("customer_info")->row();
                    
                }
                if($query2->root_right){
                    $count=$count+1;
                    $right=$query2->root_right;
                    $count = $this->getRightCountData($right,$count);
                    
                }
            }
            //if($rightjoiner->num_rows()>0){
            //foreach ($rightjoiner->result() as $query2)
            //{
            // $right=$query2->root;
            //$this->getRightData($right);
            //$this->db->where("id", $right);
            //$cid = $this->db->get("customer_info")->row();
            
        }}return $count;
    }
    


    public function getRightCount($cid,$count){
        
        $this->db->where('root', $cid);
        $query2 = $this->db->get('tree')->row();
        if($query2->root_right){
            $count=$count+1;
            $this->db->where('root', $query2->root_right);
            $leftjoiner = $this->db->get('tree');
        
        if($leftjoiner->num_rows()>0){
            $query2=$leftjoiner->row();
                if($query2->root_right){
                    $count=$count+1;
                   
                    $right=$query2->root_right;
                    $count = $this->getRightCountData($right,$count);

                    
                }
                if($query2->root_left){
                    $count=$count+1;
                   
                    $right=$query2->root_left;
                    $count = $this->getLeftCountData($right,$count);
                    
                    //$this->db->where("id", $right);
                    //$cid = $this->db->get("customer_info")->row();
                    
                }
                
            
        }}return $count;
        
    }
    //end left count

    //total count left
    public function getLeftCountData($cid,$count){
       
        $this->db->where('root', $cid);
        $leftjoiner = $this->db->get('tree');
        if($leftjoiner->num_rows()>0){
           
            $query2=$leftjoiner->row();
                
                if($query2->root_left){
                    $this->db->where("id", $query2->root_left);
                    $data1 = $this->db->get("customer_info")->row();
                    if($data1->status){
                        $count=$count+1;

                        //echo $query2->root_left."<br>";
                    }
                    $left=$query2->root_left;
                   

                    $count = $this->getLeftCountData($left,$count);
                    
                    //$this->db->where("id", $right);
                    //$cid = $this->db->get("customer_info")->row();
                    
                }
                if($query2->root_right){

                    $this->db->where("id", $query2->root_right);
                    $data1 = $this->db->get("customer_info")->row();
                    if($data1->status){
                        $count=$count+1;

                        //echo $query2->root_right."<br>";

                    }
                    
                    $right=$query2->root_right;
                   
                    //$count=$count+1;
                    $count = $this->getLeftCountData($right,$count);
                    
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
    
    public function getLeftPrintData($cid){
        
        $this->db->where('root', $cid);
        $leftjoiner = $this->db->get('tree');
        if($leftjoiner->num_rows()>0){
            
            $query2=$leftjoiner->row();
            
            if($query2->root_left){
                $left=$query2->root_left;
                $this->db->where("id",$left);
                $cname = $this->db->get("customer_info")->row();
                if(   $cname->status==0){$status = "Inactive";}else{$status  = "Active";}
                echo"<tr><td>". $cname->username."</td><td>".$cname->customer_name."</td><td>".$cname->joining_date."</td><td>".$cname->mobilenumber."</td><td>".$cname->amount."</td><td>".$status ."</td><td>". date('d-m-Y',strtotime($cname->active_date))."</td></tr>";
                $this->getLeftPrintData($left);
                
                //$this->db->where("id", $right);
                //$cid = $this->db->get("customer_info")->row();
                
            }
            if($query2->root_right){
                
                // $count=$count+1;
                
                $right=$query2->root_right;
                $this->db->where("id", $right);
                $cname = $this->db->get("customer_info")->row();
                if(   $cname->status==0){$status = "Inactive";}else{$status  = "Active";}
                echo"<tr><td>". $cname->username."</td><td>".$cname->customer_name."</td><td>".$cname->joining_date."</td><td>".$cname->mobilenumber."</td><td>".$cname->amount."</td><td>".$status ."</td><td>". date('d-m-Y',strtotime($cname->active_date))."</td></tr>";
                //$count=$count+1;
               $this->getLeftPrintData($right);
                
            }
            
            //if($rightjoiner->num_rows()>0){
            //foreach ($rightjoiner->result() as $query2)
            //{
            // $right=$query2->root;
            //$this->getRightData($right);
            //$this->db->where("id", $right);
            //$cid = $this->db->get("customer_info")->row();
            
        }
    
    }

    public function leftDownline($cid,$count){
        
        $this->db->where('root', $cid);
        $leftjoiner = $this->db->get('tree');
        if($leftjoiner->num_rows()>0){
           
            $query2=$leftjoiner->row();
                
                if($query2->root_left){
                    $left=$query2->root_left;
                    echo $query2->root_left."<br>";
                    $count = $this->leftDownline($left,++$count);
                    
                    //$this->db->where("id", $right);
                    //$cid = $this->db->get("customer_info")->row();
                    
                }
                if($query2->root_right){
                   
                       // $count=$count+1;
                    
                    $right=$query2->root_right;
                    //echo $query2->root_right;
                    //$count=$count+1;
                    $count = $this->leftDownline($right,++$count);
                    
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
    

    //Total Right count
    public function getRightCountData($cid,$count){
        
        $this->db->where('root', $cid);
        $leftjoiner = $this->db->get('tree');
        if($leftjoiner->num_rows()>0){
            $count=$count+1;
          
            $query2=$leftjoiner->row();
                if($query2->root_right){
                        //$count=$count+1;
                    
                    $right=$query2->root_right;
                    $count = $this->getRightCountData($right,$count);
                    
                }
                if($query2->root_left){
                   
                    //$count=$count+1;
                
                $right=$query2->root_left;
                $count = $this->getLeftCountData($right,$count);
                
                //$this->db->where("id", $right);
                //$cid = $this->db->get("customer_info")->row();
                
            
                
            }
        }return $count;
        
    }

    public function rightDownline($cid,$count){
        
        $this->db->where('root', $cid);
        $leftjoiner = $this->db->get('tree');
        if($leftjoiner->num_rows()>0){
            $count=$count+1;
          
            $query2=$leftjoiner->row();
                if($query2->root_right){
                        //$count=$count+1;
                        echo $query2->root_right."<br>";
                    $right=$query2->root_right;
                    $count = $this->rightDownline($right,$count);
                    
                }
                if($query2->root_left){
                   
                    //$count=$count+1;
                
                $right=$query2->root_left;
                $count = $this->rightDownline($right,$count);
                
                //$this->db->where("id", $right);
                //$cid = $this->db->get("customer_info")->row();
                
            
                
            }
        }return $count;
        
    }
    
    
    
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
    
    public function getleftjoinerp($root){
        
        $this->db->from("tree");
        $this->db->where("left_joiner",$root);
        $num_rows = $this->db->get();
        return $num_rows;
    }
    
    public function getrightjoinerp($root){
        $this->db->from("tree");
        $this->db->where("right_joiner",$root);
        $num_rows = $this->db->get();
        return $num_rows;
    }
    
    //   public function getRightData($cid){
    //      $this->db->where("id", $cid);
    //      $data1 = $this->db->get("customer_info")->row();
    //   echo $data1->customer_name." right<br>";
    
    // $this->db->where('right_joiner', $cid);
    // $rightjoiner = $this->db->get('tree')->row();
    // if($rightjoiner){
    // $this->getRightData($rightjoiner->root);
    //   }
    // }
    
    // public function getLeftData($cid){
    //  $this->db->where("id", $cid);
    //     $data1 = $this->db->get("customer_info")->row();
    //   echo "<br><br><br><br><br>".$data1->customer_name." left<br>";
    
    // $this->db->where('left_joiner', $cid);
    // $leftjoiner = $this->db->get('tree');
    
    
    // if($leftjoiner->num_rows()>0){
    //     $this->getRightData($leftjoiner->root);
    // }
    
    
    //}

    public function pairMaching($id,$s){
        $this->db->where("customer_id",$id);
        $cuAmount = $this->db->get("pair_maching_income");
        $oldpair=0;
        $capping_pair=0;
        $newpair=0;
        if($cuAmount){
            $cuAmount= $cuAmount->row();
            $dba = $cuAmount->amount + $cuAmount->afterCapping;
            if($dba > 0){
                $oldpair=$dba/100;
            }
            $newpair = $s-$oldpair;
            if($newpair > 10){
                $capping_pair  = $newpair-10;
                
                $newpair =10;
            }
          

            $pairup ['amount'] =   $cuAmount->amount+$newpair*100;
            $pairup['afterCapping'] =$cuAmount->afterCapping+$capping_pair*100;

              
                $rid  = $this->db->count_all_results('inner_daybook');
                $rid =$rid+1;
                $rid1 = $rid+1;
                $ivc = "CashonI".$rid;
                $ivc1 = "CashonI".$rid1;
                $daybookdata = array(
                    'cid'             =>$id,
                    'amount'          =>$newpair*100,
                    'debit_credit'     =>0,
                    'remark'           =>"Pair Mach Income",
                    'date_time'       =>date("Y-m-d H:s:i"),
                    'invoice_number'   =>$ivc,
                    'plan_number'     =>2
                );
                $capamount = array(
                    'cid'             =>$id,
                    'amount'          =>$capping_pair*100,
                    'debit_credit'     =>1,
                    'remark'           =>"Pair Capping Amount",
                    'date_time'       =>date("Y-m-d H:s:i"),
                    'invoice_number'   =>$ivc1,
                    'plan_number'     =>2
                );
                $this->db->insert("inner_daybook",$daybookdata);
                 $this->db->insert("inner_daybook",$capamount);
                $this->db->where("customer_id",$id);
                $this->db->update("pair_maching_income",$pairup);
            }
            
        }
    
    
    public function updatepoo($poolupdateinfo,$upamount,$level)
    {
        foreach($poolupdateinfo->result() as $pui):
        
        
        $rid  = $this->db->count_all_results('inner_daybook');
        $rid =$rid+1;
        $ivc = "CashonI".$rid;
        $daybookdata = array(
            'cid'             =>$pui->id,
            'amount'          =>$upamount['amount'],
            'debit_credit'     =>0,
            'remark'           =>"Pool Income ",
            'date_time'       =>date("Y-m-d H:s:i"),
            'invoice_number'   =>$ivc,
            'plan_number'     =>3
        );
        $this->db->insert("inner_daybook",$daybookdata);
        $this->db->where("customer_id",$pui->id);
        $this->db->update("pool_income",$upamount);
        endforeach;
        $uplevel['status']=1;
        $this->db->where("level",$level);
        $this->db->update("pool_master",$uplevel);
        return true;
    }
    
    
    
    
    
    
    public function getleftPair($id,$pair){
        $this->db->where('root',$id);
        $leftpair = $this->db->get('tree');
        if($leftpair->num_rows()>0){
            $leftpair =$leftpair->row();
            if(($leftpair->root_left!=NULL) && ($leftpair->root_right!=NULL)){
                $pair=$pair+1;
                //echo "p";
                //$this->getleftjoinerPair($leftpair->root_left,$pair);
                
                //$this->getleftjoinerPair($leftpair->root_right,$pair);
            }
            if(($leftpair->root_left!=NULL)){
                $pair=$this->getleftPair($leftpair->root_left,$pair);
                //$this->getpairall($leftpair->root_left,$pair);
                //echo $pair['pairb'];
            }
            
            if(($leftpair->root_right!=NULL)){
                $pair=$this->getrightPair($leftpair->root_right,$pair);
                //$this->getpairall($leftpair->root_left,$pair);
                //echo $pair['pairb'];
            }
            return $pair;
        }
    }
    
    public function getrightPair($id,$pair){
        $this->db->where('root',$id);
        $leftpair = $this->db->get('tree');
        if($leftpair->num_rows()>0){
            $leftpair =$leftpair->row();
            if(($leftpair->root_left!=NULL) && ($leftpair->root_right!=NULL)){
                $pair=$pair+1;
                
                //$this->getleftjoinerPair($leftpair->root_left,$pair);
                
                //$this->getleftjoinerPair($leftpair->root_right,$pair);
            }
            if(($leftpair->root_right!=NULL)){

                $pair= $this->getrightPair($leftpair->root_right,$pair);;
                // $this->getpairall($leftpair->root_right,$right);
                //echo $pair['pairb'];
            }

            if(($leftpair->root_left!=NULL)){
                $pair=$this->getleftPair($leftpair->root_left,$pair);
                //$this->getpairall($leftpair->root_left,$pair);
                //echo $pair['pairb'];
            }
            return $pair;
        }
    }

    public function updateDailyBaseIncome($id,$checkLimit,$increase){
      
        $this->db->where("customer_id",$id);
        $cuAmount = $this->db->get("daily_base_income");
        if($cuAmount){
            $dba = $cuAmount->row()->amount;
            if($dba<$checkLimit){
                $tot=$dba +$increase;
                $dbaupdate =  array(
                    "amount"=>$tot
                );
                
                $rid  = $this->db->count_all_results('inner_daybook');
                $rid =$rid+1;
                $ivc = "CashonI".$rid;
                $daybookdata = array(
                    'cid'             =>$id,
                    'amount'          =>$increase,
                    'debit_credit'     =>0,
                    'remark'           =>"Daily Base Income",
                    'date_time'       =>date("Y-m-d H:s:i"),
                    'invoice_number'   =>$ivc,
                    'plan_number'     =>1
                );
                $this->db->insert("inner_daybook",$daybookdata);
                $this->db->where("customer_id",$id);
               $this->db->update("daily_base_income",$dbaupdate);
                
            }
        }
    }
    
    public function selectlegleft($data1){
        //  $returndata = array();
        
        $this->db->where("root", $data1);
        $rowdata = $this->db->get("tree")->row();
        if ($rowdata) {
            
            if ($rowdata->root_left) {
                $returndata= $this->selectlegleft($rowdata->root_left);
            } else {
                $returndata= $rowdata->root;
                
            }
            return $returndata;
            
        }
        
    }
    
    public function selectlegright($data1){
        // $returndata = array();
        
        $this->db->where("root", $data1);
        $rowdata = $this->db->get("tree")->row();
        if ($rowdata) {
            
            if ($rowdata->root_right) {

                $returndata= $this->selectlegright($rowdata->root_right);
            } else {
                $returndata = $rowdata->root;
                
            }
            
            return $returndata;
        }
    }
    
    
    public function selectleg($data1)
    {
        $returndata = array();
        $this->db->where("root", $data1->joiner_id);
        $rowdata = $this->db->get("tree")->row();
        if ($rowdata) {
            
            if ($rowdata->root_left) {
                $this->db->where("root",$rowdata->root_left);
                $data12 =$this->db->get("tree")->row();
                $returndata["left"] =  $this->selectlegleft($data12);
            } else {
                $returndata["left"] = $rowdata->root;
                
            }
            if ($rowdata->root_right) {
                $this->db->where("root",$rowdata->root_left);
                $data12 =$this->db->get("tree")->row();
                $this->selectlegright($data12);
            } else {
                $returndata["right"] = $rowdata->root;
            }
            
        }
        else {
            $returndata["left"] = 0;
            $returndata["right"] = 0;
        }
        return $returndata;
    }
    
    public function position($data, $id)
    {
        
        
        if( $this->input->post('joiner')==1){
            // root_left
            $this->db->where("root", $id);
            $fty =$this->db->get("tree")->row();
            if($fty->root_left==NULL){
                $this->db->where("root", $id);
                $this->db->update("tree", $data);
            }else{
                
            }
            
            
            $pid['parent_id']=$id;
            // $this->db->where("id",$this->session->userdata('customer_id'));
            //$this->db->update("customer_info",$pid);
            return true;
            
            
        }else{
            $this->db->where("root", $id);
            
            $fty =$this->db->get("tree")->row();
            if($fty->root_right==NULL){
                $this->db->where("root", $id);
                $this->db->update("tree", $data);
            }else{
                
            }
        }
    }
    
    public function notimeIncome($id,$pair){
        $tpair = $pair;
        $rt = $this->db->get("no_time_master")->result();
           $this->db->where("customer_id",$id);
            $getold  =  $this->db->get("no_fine_reward")->row();
            if($getold->amount !=0){
                $this->db->where("reward",$getold->amount);
              $cpair =  $this->db->get("no_time_master")->row()->pair;
              $tpair=$tpair-$cpair;
            }
        foreach($rt as $r):
           
             
             if($r->pair < ($tpair+1)){
                if($r->reward<($getold->amount+1)){
                    
                }else{
                   $datau =array(
                       'amount' => $r->reward
                       ); 
                       $this->db->where("customer_id",$id);
                       $this->db->update("no_fine_reward",$datau);
                        $rid  = $this->db->count_all_results('inner_daybook');
                $rid =$rid+1;
                $ivc = "CashonI".$rid;
                $daybookdata = array(
                    'cid'             =>$id,
                    'amount'          =>$r->reward,
                    'debit_credit'     =>0,
                    'remark'           =>"No Fine Reward",
                    'date_time'       =>date("Y-m-d H:s:i"),
                    'invoice_number'   =>$ivc,
                    'plan_number'     =>4
                );
                $this->db->insert("inner_daybook",$daybookdata);
                    //$tpair=$tpair-$r->pair;
                }
            }else{
                
            }
                
        endforeach;
        
    }
}