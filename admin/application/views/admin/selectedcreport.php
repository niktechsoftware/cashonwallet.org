<!--  <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body"> -->
                            	
                            	<?php $this->db->where("id",$this->uri->segment(3));
                               $acid =  $this->db->get("customer_info");?>
                            	
                                   <div class="table-responsive">
                                    <table id="selected_customerpr" class="display table table-striped" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>M_Wallet Recharge</th>
                                                <th> Total MPIN </th>
                                                <th> Used MPIN </th>
                                                <th>Unused MPIN </th>
                                               <!--  <th>Active Customer </th>
                                                <th>Inactive Customer </th> -->
                                                <th>Total Income balance</th>
                                                <th>Daily Base Income</th>
                                                <th>Pair Matching Income</th>
                                                <th>Rouality  Income</th>
                                                <th>Pool Income</th>
                                                <th>No Time Reward</th>
                                                <th>Time To Time Reward</th>
   
                                               
                                            </tr>
                                        </thead>
                              <tbody>
                                 <?php $i = 1;
                                    foreach($acid->result() as $row):
                                 ?> 
                                
                                
                                  <tr>
                                       <td><?php echo $i; ?></td>

                                       <?php $this->db->where("cid",$row->id);
                                       $res = $this->db->get("mbalance")->row();?>
                                        <td><?php echo $res->amount; ?></td>

                                        <?php $this->db->where("customerid",$row->id);
                                        $numr = $this->db->get("mpin");
                                        $nm = $numr->num_rows();?>
                                         <td><?php echo $nm;  ?></td>

                                          <?php $this->db->where("status",1);
                                          $this->db->where("customerid",$row->id);
                                        $numr1 = $this->db->get("mpin");
                                        $nm1 = $numr1->num_rows();?>
                                         <td><?php echo $nm1;  ?></td>

                                          
                                        <?php $nm2 = $nm-$nm1;?>
                                          <td><?php echo $nm2; ?></td>

                                           <td><?php  $amount1 = $this->db->select_sum("amount")
        ->where("customer_id",$row->id)
        ->get("daily_base_income")
        ->row()->amount;
        
        $amount2 = $this->db->select_sum("amount")
        ->where("customer_id",$row->id)
        ->get("pair_maching_income")
        ->row()->amount;
        
        $amount3 = $this->db->select_sum("amount")
        ->where("customer_id",$row->id)
        ->get("rouality_income")
        ->row()->amount;
        
        $amount4 = $this->db->select_sum("amount")
        ->where("customer_id",$row->id)
        ->get("pool_income")
        ->row()->amount;
        
        $amount5 = $this->db->select_sum("amount")
        ->where("customer_id",$row->id)
        ->get("no_fine_reward")
        ->row()->amount;
      
        
        $amount6 = $this->db->select_sum("amount")
        ->where("customer_id",$row->id)
        ->get("time_to_time_reward")
        ->row()->amount;
        
      echo  $amounttot =  $amount1+ $amount2+ $amount3+ $amount4+ $amount5+ $amount6;

        //print_r($a); ?></td>
                                            <td><?php echo $amount1; ?></td>
                                            <td><?php echo $amount2; ?></td>
                                            <td><?php echo $amount3; ?></td>
                                            <td><?php echo $amount4; ?></td>
                                            <td><?php echo $amount5; ?></td>
                                            <td><?php echo $amount6; ?></td>
                                            <!--  <td><?php echo $i; ?></td>
                                              <td><?php echo $i; ?></td>  -->
                                       
                                      
                                      
                                      

                                 
                                       
                                      <?php $i++; endforeach;?>
 
                                               
                                            </tr> <?php $i++; ?>
                                            
                                        </tbody>
                                       </table>  
                                           
                                    </div>