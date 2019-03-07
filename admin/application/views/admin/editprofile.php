<div class="table-responsive">
                                    <table id="example" class="display table table-striped" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Parent_id</th>
                                                <th>Customer_Name</th>
                                                <th>Email</th>
                                                <th>User Name</th>
                                                <th>Password</th>
                                                <th>Mobile Number</th>
                                                
                                                
                                                
                                                 <th>Position</th>
                                                 <th>Pan Number</th>
                                                 <th>Adhar Number</th>
                                                
                                                  <th>Action</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	 <?php $i = 1;?> 
                                        	<?php $res = $this->db->get("customer_info")->result();?>
                                        	<?php foreach($res as $row):?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row->parent_id; ?></td>
                                                <td><?php echo $row->customer_name;?></td>
                                                <td><?php echo $row->email;?></td>
                                                <td><?php echo $row->username;?></td>
                                               
                                                  <td><?php echo $row->password; ?></td>
                                                   <td><?php echo $row->mobilenumber; ?></td>
                                                
                                                 
                                                  <td><?php echo $row->position; ?></td>
                                                  <td><?php echo $row->pannumber; ?></td>
                                                  <td><?php echo $row->adhaarnumber; ?></td>
                                                  
                                                    <td> <button class="btn-light"><a href="<?php echo base_url();?>apanel/editcusprofile/<?php echo $row->id; ?>">Edit</a></button></td>
                            
                                             
                                              
                                              <!--  <td>
                                                	<a href="<?php echo base_url();?>apanelForms/deleteGallery/<?php echo $row->id;?>">
                                                		Delete
                                                	</a>
                                                </td>

                                                  <td>
                                                    <a href="<?php echo base_url();?>apanelForms/editproduct/<?php echo $row->id;?>">
                                                        Edit Product
                                                    </a>
                                                </td>-->
                                            </tr> <?php $i++; ?>
                                            <?php endforeach;?>
                                        </tbody>
                                       </table>  
                                           
                                    </div>