 <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                         
                                            <form class="form-horizontal" action="<?php echo base_url()?>apanelForms/editdelproduct" method="post" enctype="multipart/form-data">
                                                <?php $raj=$this->uri->segment(3);
                                                if($raj==23)
                                                {
                                                echo "Successfully Uploaded Image";
                                                    
                                                }?>
                                                  
                                                
                                                <div class="form-group">
                                                    <label for="input-Default" class="col-sm-3 control-label">product name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="input-Default" name="name" value="<?php echo $abc->product_name ;?>">
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="input-Default" class="col-sm-3 control-label">product Description</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="input-Default" name="desc" value="<?php echo $abc->product_description;?>">
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="input-Default" class="col-sm-3 control-label">product Type</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="input-Default" name="type" value="<?php echo $abc->product_type ;?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Product Image</label>
                                                    <div class="col-sm-9">
                                                        <input type="file"  name="selectedStu" value="<?php echo $abc->product_image ;?>"/>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="input-Default" class="col-sm-3 control-label">product quantitys</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="input-Default" name="quantity" value="<?php echo $abc->product_quantity ;?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="input-Default" class="col-sm-3 control-label">product price</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="input-Default" name="price" value="<?php echo $abc->product_price ;?>">
                                                    </div>
                                                </div>
                                                 <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-success">Upload Image</button>
                                                 </div>
                                                 
                                            </form>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            