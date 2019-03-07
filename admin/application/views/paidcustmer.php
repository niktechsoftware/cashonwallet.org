<div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            	<div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="display table table-striped table-hover table-bordered" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                                    <tr>
                                             
                                                   <th>Joiner_id</th>
                                                   <th>Parent_id</th>

                                                   <th>Customer name</th>
                                                   <th>Email</th>
                                                   <th>User name</th>
                                                    <th>Password</th>

                                                      <th>Joining_date</th>
                                                  <th>Amount</th>
                                                     <th>Status</th>
                                               <th>Active/Deactive</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php $i = 1;?>

                                        	<?php
                                          
                                          $this->db->where('status',0);
                                          $this->db->where('amount',600.00);
                                           $res = $this->db->get("customer_info")->result();?>
                                                
                                               
                                        	<?php foreach($res as $row):?>
                                            <tr>
                                              
                                             
                                                <td><?php echo $row->joiner_id; ?></td>
                                                 <td><?php echo $row->parent_id; ?></td>
                                                <td><?php echo $row->customer_name; ?></td>
                                                   <td><?php echo $row->email; ?></td>
                                                   <td><?php echo $row->username; ?></td>   
                                                    <td><?php echo $row->password; ?></td>
                                                       <td><?php echo $row->joining_date; ?></td>
                                                        <td><?php echo $row->amount; ?></td>
                                                         <td><?php echo $row->status; ?></td>
                                                   
                                                       <td>
                                                    <!--  <button class="bg-warning">  <a href="<?php echo base_url();?>apanelForms/addformDetail/<?php echo $row->id; ?>"
                                                   
                                                            View Detail</a></button></td>-->

                                                           <center> <button class="bg-warning btn  btn-warning" id="active"><a href="<?php echo base_url();?>apanelForms/deleteRegistration/<?php echo $row->id; ?>">Active</a></button></center>
                                                <!--	<td><button class="bg-info"><a href="<?php echo base_url();?>apanelForms/deleteRegistration/<?php echo $row->id; ?>">-->
                                                		
                                                	</a></button></td>
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