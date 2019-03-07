 <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">


                                   <div class="table-responsive">
                                    <table id="example_customer" class="display table table-striped" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Customer_id (User Name)</th>
                                                <th>Customer_Name</th>
                                                 <th>Direct Left </th>
                                                 <th>Direct Right </th>
                                                <th>Date</th>
                                                 <th>MObile Number</th>
                                                 <th>Bank Name</th>
                                                <th>Transfer</th>
                                                <th>Send Money</th>
                                                
                                               
                                            </tr>
                                        </thead>
                              <tbody>
                              	 <?php $i = 1;
                            
                              	 $res = $this->db->get("customer_info")->result();
                              	?>
                              	<?php foreach($res as $row):
                              	
                              	$leftdirect = $this->dashboardmodel->getleftjoiner($row->id);
                              	$rightDirect = $this->dashboardmodel->getrightjoiner($row->id);
                              	if(($leftdirect>9) && ($rightDirect>9)){
                              	    $this->db->where("customer_id",$row->id);
                              	   $cmn =  $this->db->get("core_com_name");
                              	   
                              	  // echo "rahul";
                              	   if($cmn->num_rows()>0){
                              	       $cmn =$cmn->row();
                              	   }else{
                              	       $att =array(
                              	           "customer_id"=>$row->id,
                              	           "date_time" =>date("Y-m-d h:s:i")
                              	           );
                              	           $this->db->insert("core_com_name",$att);
                              	        $this->db->where("customer_id",$row->id);
                              	   $cmn =  $this->db->get("core_com_name")->row();
                              	    //echo "rahul1";
                              	   }
                              	?>
                                 <tr>
                                   <td><?php echo $i; ?></td>
                                      <td><a href="<?php echo base_url();?>apanel/selected_customer_report/<?php echo $row->id; ?>"><?php echo $row->username; ?></a></td>
                                                <td><?php echo $row->customer_name;?></td>
                                                 <input type="hidden" class="form-control" id="cid<?php echo $i;?>" name="cid<?php echo $i;?>" value = "<?php echo $row->id; ?>" />
                                                 <td><?php echo $leftdirect;?></td> 
                                                 <td><?php echo $rightDirect;?></td>
                                                 <td><?php  echo date('d-m-Y',strtotime($cmn->date_time));?></td>
                                                 
                                                   <td><?php echo $row->mobilenumber;?></td>
                                  
                                   <td><?php echo $row->bankname;?></td>
                                   <td>  <input type="number" class="form-control" id="corecom<?php echo $i;?>" name="corecom<?php echo $i;?>" ></td>
                                   <td>
                                       <?php   
                                       $data = date('Y-m-d');
                                       $this->db->where("cid",$row->id);
                                       $this->db->where("DATE(date_time)",$data);
                                       $this->db->where("plan_number",6);
                                      $innerd =  $this->db->get("inner_daybook");
	   if(!($innerd->num_rows()>0)){?>
                                       <input type="submit" class="btn btn-primary" id="sendmoney<?php echo $i;?>" name="corecom<?php echo $i;?>"></td>
                                  <?php }else{
                                      $innerd=$innerd->row();
                                      echo $innerd->amount;
                                  }?> 
                                   <script>
                                   $("#sendmoney<?php echo $i;?>").click(function(){
                    					var number = $("#corecom<?php echo $i;?>").val();
                    					var cid = $("#cid<?php echo $i;?>").val();
                    				if(number.length==0){
                    				    alert("Please Enter a valid amount")
                    				}else{
                    					$.ajax({
                    						"url": "<?= base_url() ?>index.php/apanel/updatecoreCom",
                    						"method": 'POST',
                    						"data": {number : number,cid : cid},
                    						beforeSend: function(data) {
                    							$("sendmoney<?php echo $i;?>").html("<center><img src='<?= base_url()?>assets/images/loading.gif' /></center>")
                    						},
                    						success: function(data) {
                    						      alert("Successfully Transfer");
                    							$("#sendmoney<?php echo $i;?>").html(data);
                    						},
                    						error: function(data) {
                    						    alert("Please Try After Sometime");
                    							$("#sendmoney<?php echo $i;?>").html(data)
                    						}
                    					})
                    				}
                    				});
                                      // alert("rahul");
                                       
                                       
                                   </script>
                                            </tr> <?php $i++; }?>
                                            <?php endforeach;?>
                                        </tbody>
                                       </table>  
                                           
                                    </div>