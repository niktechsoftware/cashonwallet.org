<div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example_customer" class="display table table-striped" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Username</th>
                                                <th>Customer Name</th>
                                                <th>Bank Name</th>
                                                <th>Account Number</th>
                                                <th>IFSC Code</th>
                                                <th>Branch Name</th>
                                                <th>Bank Passbook Photo</th>
                                                <th>Adhaar Number</th>
                                                <th>Adhaar Front Photo</th>
                                                <th>Adhaar Back Photo</th>
                                            </tr>
                                        </thead>
                              <tbody>
                              	 <?php $i = 1;?> 
                              	<?php $res = $this->db->get("customer_info")->result();?>
                              	<?php foreach($res as $row):?>
                                 <tr>
                                   <td><?php echo $i; ?></td>
                                   <td><?php echo $row->username; ?></td>
                                   <td><?php echo $row->customer_name;?></td>
                                    <td><?php echo $row->bankname;?></td>
                                   <td><?php echo $row->account_no;?></td>
                                   <td><?php echo $row->ifsccode;?></td>
                                   <td><?php echo $row->branchname;?></td>
                                   <td><a href="<?php echo base_url();?>assets/kycimages/<?php echo $row->bank_passbook_photo;?>" class="btn btn-primary"><?php if($row->bank_passbook_photo){echo "view";}else{echo "Not Uploaded";}?></a></td>
                                   <td><?php echo $row->adhaarnumber;?></td>
                                   <td><a href="<?php echo base_url();?>assets/kycimages/<?php echo $row->adhaar_front_photo;?>" class="btn btn-primary"><?php echo $row->adhaar_front_photo;?></a></td>
                                   <td><a href="<?php echo base_url();?>assets/kycimages/<?php echo $row->adhaar_back_photo;?>" class="btn btn-primary"><?php echo $row->adhaar_back_photo;?></a></td>
                                 </tr>      
                                 <?php $i++; ?>
                                 <?php endforeach;?>        
                              </tbody>
                                       </table>  
                                           
    </div>
    </div>
</div>
</div>
</div>
</div>