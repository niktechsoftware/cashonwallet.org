   <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            	<!-- <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Enter Notice Containt and Title</h4>
                                </div> -->
                            	<div class="panel-body">
                            	
                            	<?php $this->db->where("id",$this->uri->segment(3));?>
                            	<?php $deta = $this->db->get("customer_info")->row();?>
                                   <form class="form-horizontal" action="<?php echo base_url()?>apanelForms/editcusprofile" method="post">


                                     <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">Subject</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" name="id" value="<?php echo $this->uri->segment(3);?>" />
                                               
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">Parent Id</label>
                                            <div class="col-sm-10">
                                            	
                                                <input type="text" class="form-control" id="input-Default" name="a1" value="<?php echo $deta->parent_id;?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">Customer name</label>
                                            <div class="col-sm-10">
                                                
                                                <input type="text" class="form-control" id="input-Default" name="a2" value="<?php echo $deta->customer_name;?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-10">
                                                
                                                <input type="text" class="form-control" id="input-Default" name="a3" value="<?php echo $deta->email;?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">User Name</label>
                                            <div class="col-sm-10">
                                                
                                                <input type="text" class="form-control" id="input-Default" name="a4" value="<?php echo $deta->username;?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">password</label>
                                            <div class="col-sm-10">
                                                
                                                <input type="text" class="form-control" id="input-Default" name="a5" value="<?php echo $deta->password;?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">Mobile Number</label>
                                            <div class="col-sm-10">
                                                
                                                <input type="text" class="form-control" id="input-Default" name="a6" value="<?php echo $deta->mobilenumber;?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">Alt Number</label>
                                            <div class="col-sm-10">
                                                
                                                <input type="text" class="form-control" id="input-Default" name="a7" value="<?php echo $deta->altnumber;?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">Current Address</label>
                                            <div class="col-sm-10">
                                                
                                                <input type="text" class="form-control" id="input-Default" name="a8" value="<?php echo $deta->current_address;?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">Permanent Address</label>
                                            <div class="col-sm-10">
                                                
                                                <input type="text" class="form-control" id="input-Default" name="a9" value="<?php echo $deta->permanent_address;?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">City</label>
                                            <div class="col-sm-10">
                                                
                                                <input type="text" class="form-control" id="input-Default" name="a10" value="<?php echo $deta->city;?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">State</label>
                                            <div class="col-sm-10">
                                                
                                                <input type="text" class="form-control" id="input-Default" name="a11" value="<?php echo $deta->state;?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">Pin</label>
                                            <div class="col-sm-10">
                                                
                                                <input type="text" class="form-control" id="input-Default" name="a12" value="<?php echo $deta->pin;?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">Joiner Id</label>
                                            <div class="col-sm-10">
                                                
                                                <input type="text" class="form-control" id="input-Default" name="a13" value="<?php echo $deta->joiner_id;?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">Joiner Name</label>
                                            <div class="col-sm-10">
                                                
                                                <input type="text" class="form-control" id="input-Default" name="a14" value="<?php echo $deta->joiner_name;?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">Position</label>
                                            <div class="col-sm-10">
                                                
                                                <input type="text" class="form-control" id="input-Default" name="a15" value="<?php echo $deta->position;?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">Pan Number</label>
                                            <div class="col-sm-10">
                                                
                                                <input type="text" class="form-control" id="input-Default" name="a16" value="<?php echo $deta->pannumber;?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">Adhaar Number</label>
                                            <div class="col-sm-10">
                                                
                                                <input type="text" class="form-control" id="input-Default" name="a17" value="<?php echo $deta->adhaarnumber;?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">Amount</label>
                                            <div class="col-sm-10">
                                                
                                                <input type="text" class="form-control" id="input-Default" name="a18" value="<?php echo $deta->amount;?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">Status</label>
                                            <div class="col-sm-10">
                                                
                                                <input type="text" class="form-control" id="input-Default" name="a19" value="<?php echo $deta->status;?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">Joining Date</label>
                                            <div class="col-sm-10">
                                                
                                                <input type="text" class="form-control" id="input-Default" name="a20" value="<?php echo $deta->joining_date;?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">dob</label>
                                            <div class="col-sm-10">
                                                
                                                <input type="text" class="form-control" id="input-Default" name="a21" value="<?php echo $deta->dob;?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                         <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-success">Edit Profile</button>
                                         </div>
                                     </div>
                                    </form>
                                    <br><br><br>