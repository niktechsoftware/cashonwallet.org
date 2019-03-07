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
                                                
                                                
                                                
                                                
                                                
                                               
                                            </tr>id
                                        </thead>
                              <tbody>
                              	 <?php $i = 1;?> 
                              	<?php $res = $this->db->get("customer_info")->result();?>
                              	<?php foreach($res as $row):?>
                                 <tr>
                                   <td><?php echo $i; ?></td>
                                      <td><a href="<?php echo base_url();?>apanel/selected_customer_report/<?php echo $row->id; ?>"><?php echo $row->username; ?></a></td>
                                                <td><?php echo $row->customer_name;?></td>
                                                
                                                  
<!--                                                     <td> <button class="btn-light"><a href="<?php echo base_url();?>  apanel/editcusprofile/<?php echo $row->id; ?>">Edit</a></button></td> -->
                            
                                             
                                              
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