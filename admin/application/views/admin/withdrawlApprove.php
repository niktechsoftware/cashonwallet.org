<div id="main-wrapper" class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
            	<div class="panel-body">
            		<div class="row">
            			<div class="col-md-12"><!--date picker-->
            			
                <div style="clear:both"></div>                 
                <br />
				
            			</div>
            		</div>
            	<br/><hr/><br/>
                   <div class="table-responsive">
                    <table id="example" class="display table table-striped" style="width: 100%; cellspacing: 0;">
                        <thead>
                            <tr>
                                  <th>#</th>
                                <th>Username</th>
                                 <th>Name</th>
                                 <th>Mobile Number</th>
                                 
                                   <th>Bank Name</th>
                                                <th>Account Number</th>
                                                <th>IFSC Code</th>
                                                 <th>Bank Passbook Photo</th>
                                                <th>Adhaar Number</th>
                                                <th>Adhaar Front Photo</th>
                                                <th>Adhaar Back Photo</th>
                                 
                                <th>Amount</th>
                                <th>Date/Time</th>
                                <th>Invoice Number</th>
                             <th>Request</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                        	<?php $i = 1;?>
                        	<?php $this->db->where("status",1);
                        	$this->db->where("debit_credit",1);
                        	$res = $this->db->get("outer_daybook")->result();?>
                        	<?php foreach($res as $row):?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                 <td><?php  $this->db->where("id",$row->cid);
                                $crow = $this->db->get("customer_info")->row(); echo $crow->username;?>
								<input type="hidden" name ="cid<?php echo $i;?>" value ="<?php echo $row->cid;?>" id="cid><?php echo $i;?>"></td>
                                 
                                 <td><?php echo $crow->customer_name;?></td>
                                  <td><?php echo $crow->mobilenumber;?></td>
                                  
                                   <td><?php echo $crow->bankname;?></td>
                                   <td><?php echo $crow->account_no;?></td>
                                   <td><?php echo $crow->ifsccode;?></td>
                                  
                                    <td><?php if($crow->bank_passbook_photo){?><a href="<?php echo base_url();?>assets/kycimages/<?php echo $crow->bank_passbook_photo;?>"  class="btn btn-primary">view</a><?php }else{echo "Not Uploaded";}?></td>
                                   <td><?php echo $crow->adhaarnumber;?></td>
                                   <td><?php if($crow->adhaar_front_photo){?><a href="<?php echo base_url();?>assets/kycimages/<?php echo $crow->adhaar_front_photo;?>" class="btn btn-primary">view</a><?php } else{echo "Not Uploaded";}?></td>
                                   <td><?php if($crow->adhaar_back_photo){?><a href="<?php echo base_url();?>assets/kycimages/<?php echo $crow->adhaar_back_photo;?>" class="btn btn-primary">view</a><?php } else{echo "Not Uploaded";}?></td>
                                  
                                 
                                 <td><?php echo $row->amount; ?></td>
                                <td><?php echo $row->date_time;?></td>
                                <td><?php echo $row->invoice_number;?></td>
								<td>Approved
								
								</td>
                              </tr>
                            <?php $i++; ?>
                            <?php endforeach;?>
                        </tbody>
                       </table>  
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Row -->
</div><!-- Main Wrapper -->