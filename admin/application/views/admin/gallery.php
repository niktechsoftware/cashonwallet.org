                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            	<div class="panel-body">
                            		<div class="row">
                            			<div class="col-md-12">
                            				
                            			</div>
                            		</div>
                            	<br/><hr/><br/>
                                   <div class="table-responsive">
                                    <table id="example" class="display table table-striped " style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr class="text-nowrap">
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th> Product Description</th>
                                                <th>Product Type</th>
                                                <th>Product Path</th>
                                                <th>Product Image</th>
                                                <th>Product Quantity</th>
                                                 <th>Price</th>
                                                
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php $i = 1;?>
                                        	<?php $res = $this->db->get("products")->result();?>
                                        	<?php foreach($res as $row):?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row->product_name; ?></td>
                                                <td><?php echo $row->product_description;?></td>
                                                <td><?php echo $row->product_type;?></td>
                                                <td><?php echo $row->product_image;?></td>
                                                <td><img width="50" height="50" src="<?php echo base_url();?>assets/images/<?php echo $row->product_image; ?>" alt="" /></td>
                                                  <td><?php echo $row->product_quantity; ?></td>
                                                   <td class="fa" >&#xf156;&nbsp;<?php echo $row->product_price; ?></td>
                                                  
                                                   
                                             
                                              
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