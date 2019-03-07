                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" action="<?php echo base_url()?>apanelForms/saveGallery" method="post" enctype="multipart/form-data">
                                                <?php $raj=$this->uri->segment(3);
                                                if($raj==23)
                                                {
                                                echo "Successfully Uploaded Image";
                                                    
                                                }?>
                                                
                                                
                                                <div class="form-group">
                                                    <label for="input-Default" class="col-sm-3 control-label">product name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="input-Default" name="name">
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="input-Default" class="col-sm-3 control-label">product Description</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="input-Default" name="desc">
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="input-Default" class="col-sm-3 control-label">product Type</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="input-Default" name="type">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Product Image</label>
                                                    <div class="col-sm-9">
                                                        <input type="file"  name="selectedStu" />
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="input-Default" class="col-sm-3 control-label">product quantity</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="input-Default" name="quantity">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="input-Default" class="col-sm-3 control-label">product price</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="input-Default" name="price">
                                                    </div>
                                                </div>
                                                 <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-success">Upload Image</button>
                                                 </div>
                                            </form>
                                        </div>
                                    </div>
                                <br/><hr/><br/>
                                   <div class="table-responsive">
                                    <table id="example" class="display table table-striped" style="width: 100%; cellspacing: 0;">
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
                                                 <th>Action</th>
                                               <!--   <th>Edit</th> -->
                                                
                                               
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
                                                <td><img style="    max-width: 135px;
    max-height: 100px;" src="<?php echo base_url();?>assets/images/<?php echo $row->product_image; ?>" alt="image can show" /></td>
                                                  <td><?php echo $row->product_quantity; ?></td>
                                                   <td class="fa" >&#xf156;&nbsp;<?php echo $row->product_price; ?></td>
                                                  
                                                   
                                             
                                             
                                               <td>
                                                 <button class="btn btn-dark"> 
                                                    <a href="<?php echo base_url();?>apanelForms/deleteGallery/<?php echo $row->id;?>">
                                                        Delete
                                                    </a>
                                                      </button>

                                                </td>
                                          
                                                <!--  <td>
                                                     <button class="btn btn-dark"> 
                                                    <a href="<?php echo base_url();?>apanelForms/editproduct/<?php echo $row->id;?>">
                                                        Edit Product
                                                    </a>
                                                     </button>
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