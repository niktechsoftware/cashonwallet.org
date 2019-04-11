<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class comission extends CI_Controller
{
    
    public function dailyBaseincome($id){

       // echo "Daily";
       $small=0;

        $this->load->model("tree");
        //echo $id;
        $left =$this->tree->getleftjoiner($id);
        $right =$this->tree->getrightjoiner($id);
        // echo "left".$left."<br>";
        // echo "Right".$right."<br>";
        if(($left > 0) && ($right > 0)){
            if($left<$right ){
                $small = $left;
            }
            if($left==$right ){
                $small = $left;
            }
            if($left>$right ){
                $small = $right;
            }

            
            $increase = 30*$small;
            $checkLimit=3000*$small;
            $this->tree->updateDailyBaseIncome($id,$checkLimit,$increase);

        } 
    }
    
    public function countl(){
        $this->load->model("tree");
        $cid =$this->session->userdata("customer_id");
        $count=0;
        echo $this->tree->getRightCount($cid,$count);
        echo $this->tree->getLeftCount($cid,$count);
    }
    
    public function pairMachingIncome($id){
        date_default_timezone_set('Asia/Kolkata');
        echo "<br>pair maching".$id."=";
        echo $id;
        $this->load->model("tree");
        $pair=0;

        $co=0;
        $count1=0;
$cor=0;
       $lefttotal=0;
       $righttotal=0;

       $this->db->where('root', $id);
       $query2 = $this->db->get('tree');
       if($query2->num_rows()>0){
            $query2=$query2->row();
            
            
       if($query2->root_left){
           $this->db->where("id",$query2->root_left);
           $data1 = $this->db->get("customer_info")->row();
           if($data1->status){
               $co=$co+1;

               echo $query2->root_right;

           }
        $lefttotal =$this->tree->getLeftCountData($query2->root_left,$co);
       }
       
      
       if($query2->root_right){
           $this->db->where("id",$query2->root_right);
           $data1 = $this->db->get("customer_info")->row();
           if($data1->status){
               $cor=$cor+1;

               echo $query2->root_right;

           }
           
           $righttotal =$this->tree->getLeftCountData($query2->root_right,$cor);
       }
       
      echo "left = ".$lefttotal."<br> right ".$righttotal;
       if(($lefttotal>0)&&($righttotal>0)){


           
                if($lefttotal > $righttotal){
            $left=$righttotal;
            $this->tree->pairMaching($id,$left);
            }else{
                if($lefttotal < $righttotal){
             $left=$lefttotal;
            $this->tree->pairMaching($id,$left);
           } else{
                $left=$lefttotal-1;

                $this->tree->pairMaching($id,$left);
            }}
            

       } 

       }
       

        
        
        /*  $left =$this->tree->getleftjoiner($id,);
         $right =$this->tree->getrightjoiner($id);
         if($left == $right){
         $right= $right-1;
         }
         if(($left > 0)){
         echo "<br> left ".$left."Right".$right;
         if($left < $right){
         $s  =   $left;
         $g  = $right;
         //$t =$this->tree->getRealV($s,$g);
         
         $this->tree->pairMaching($id,$s);
         
         }
         else{
         $s  =   $right;
         $g  = $left;
         //$t =$this->tree->getRealV($s,$g);
         $this->tree->pairMaching($id,$s);
         }
         } */
        
    }
    public function poolIncome12345(){
        echo "pool income";
        $this->load->model("tree");
        $getpool = $this->db->get("pool_master")->result();
        
        $this->db->from("customer_info");
       $this->db->where("status",1);
        $num_rows = $this->db->count_all_results();
        foreach($getpool as $gp):
        
        if($gp->level!=1){
            
            if($gp->team < $num_rows+1){
                
                $position =($gp->level)-1;
                echo $position."<br>";
                $this->db->where("level",$position);
                $getrow =  $this->db->get("pool_master")->row();
                if($getrow->status==0){
                    $amountm['amount'] = 30;
                    for($i =$gp->level-1; $i>0;$i--){
                        $this->db->where("position",$i);
                        $poolupdateinfo= $this->db->get("customer_info");
                        $this->tree->updatepoo($poolupdateinfo,$amountm,$i);
                        
                        $amountm['amount']=$amountm['amount']*3;
                    }
                }
            }
        }
        endforeach;
        // echo "pool income";
        // echo $id; */
        
        
        
    }
    public function notimeReward($id){
        echo "no time";
        echo $id."<br>";
             $this->load->model("tree");
        $pair=0;

        $co=0;
        $count1=0;
$cor=0;
       $lefttotal=0;
       $righttotal=0;

       $this->db->where('root', $id);
       $query2 = $this->db->get('tree');
       if($query2->num_rows()>0){
            $query2=$query2->row();
            
            
       if($query2->root_left){
           $this->db->where("id",$query2->root_left);
           $data1 = $this->db->get("customer_info")->row();
           if($data1->status){
               $co=$co+1;

               //echo $query2->root_right;

           }
        $lefttotal =$this->tree->getLeftCountData($query2->root_left,$co);
       }
       
      
       if($query2->root_right){
           $this->db->where("id",$query2->root_right);
           $data1 = $this->db->get("customer_info")->row();
           if($data1->status){
               $cor=$cor+1;

              // echo $query2->root_right;

           }
           
           $righttotal =$this->tree->getLeftCountData($query2->root_right,$cor);
       }
       
      echo "left = ".$lefttotal."----- right ".$righttotal;
       if(($lefttotal>9)&&($righttotal>9)){


           
                if($lefttotal > $righttotal){
            $left=$righttotal;
            $this->tree->notimeIncome($id,$left);
            }else{
                if($lefttotal < $righttotal){
             $left=$lefttotal;
            $this->tree->notimeIncome($id,$left);
           } else{
                $left=$lefttotal;

                $this->tree->notimeIncome($id,$left);
            }}
            

       } 

       }
       
    }
    public function timetotimeReward($id){
        // echo "time to time";
        // echo $id;
    }
    public function rouallty($id){
        //echo "roullty";
        // echo $id;
    }
    public function generate_comission1234(){
        date_default_timezone_set('Asia/Kolkata');
          $cdate = date('Y-m-d');
          $this->db->where("plan_number",1);
        $this->db->where("Date(date_time)",$cdate);
       $pv = $this->db->get("inner_daybook");

       $this->db->where("status",1);

        $getCustomer = $this->db->get("customer_info");
          if($pv->num_rows()>0){
          }else{
        foreach($getCustomer->result() as $gc):
        //if($gc->status){
      
      $this->dailyBaseincome($gc->id);
       
        $this->pairMachingIncome($gc->id);
        
       // $this->poolIncome($gc->id);
        $this->notimeReward($gc->id);
        $this->timetotimeReward($gc->id);
        $this->rouallty($gc->id);
        
        endforeach;}
    }
}
