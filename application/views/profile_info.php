
<section class="section-b-space">
    <div class="container">
        <div class="row">
            <?php $this->load->view("dashboardmenu");?>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">
                        <div class="row">
                            <div class="col-8 page-title">
                                <!--<div style="font-size:35px; text-transform:capitalize;"><?php echo $this->session->userdata("name"); ?>'s <h2 class="btn bg-danger text-white">Profile Information</h2> </div>-->
                                
                            </div>
                            <?php $this->load->view("mpindrop");?>
                        </div>
                        <div class="welcome-msg">
                        <br>

                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"></h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="theme-form"
                                                action="<?php echo base_url(); ?>index.php/dashboard/mpincheck"
                                                method="post">
                                                <label for="mpin">Enter MPIN <span title="Required"
                                                        style="color:red;">*</span>&nbsp;&nbsp;<span id="mpinno"
                                                        Style="color:red;"></span></label>
                                                <input type="text" onkeyup="Validate()" class="form-control" id="mpin"
                                                    name="mpin" placeholder="Enter Your MPIN" title="Wrong MPIN Number"
                                                    required>
                                                <br>
                                                <input type="submit" class="btn btn-primary btn-solid" value="Ok" />
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <script>
                                    function Validate() {
                                        var text_value = document.getElementById("mpin").value;
                                        if (!text_value.match(/[0-9]$/)) {
                                            document.getElementById("mpinno").innerHTML = "Invalid MPIN Number";
                                            document.getElementById("mpin").focus();

                                            if (text_value == "") {
                                                document.getElementById("mpinno").innerHTML = " ";
                                                document.getElementById("mpin").focus();
                                            }

                                        }
                                    }
                                    </script>
                                </div>
                            </div>

                            <div class="modal fade" id="myModal1" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <span style="float: left;font-size:20px;">Update Profile</span>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"></h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="theme-form"
                                                action="<?php echo base_url();?>index.php/dashboard/update_customer_table/"
                                                method="post">
                                                <label for="mpin">Enter DOB <span title="Required"
                                                        style="color:red;">*</span>&nbsp;&nbsp;<span id="mpinno"
                                                        Style="color:red;"></span></label>
                                                <input type="date" class="form-control" id="mpin" name="dob"
                                                    placeholder="Enter Your DOB" required>
                                                <label for="mpin">Current Address <span title="Required"
                                                        style="color:red;">*</span>&nbsp;&nbsp;<span id="mpinno"
                                                        Style="color:red;"></span></label>
                                                <input type="text" class="form-control" id="mpin" name="cadd"
                                                    placeholder="Enter Your Current Address" required>
                                                <label for="mpin">Permanent Address <span title="Required"
                                                        style="color:red;">*</span>&nbsp;&nbsp;<span id="mpinno"
                                                        Style="color:red;"></span></label>
                                                <input type="text" class="form-control" id="mpin" name="padd"
                                                    placeholder="Enter Your Permanent Address" required>
                                                <label for="mpin">City <span title="Required"
                                                        style="color:red;">*</span>&nbsp;&nbsp;<span id="mpinno"
                                                        Style="color:red;"></span></label>
                                                <input type="text" class="form-control" id="mpin" name="city"
                                                    placeholder="Enter Your City" required>
                                                <label for="mpin">State <span title="Required"
                                                        style="color:red;">*</span>&nbsp;&nbsp;<span id="mpinno"
                                                        Style="color:red;"></span></label>
                                                <input type="text" class="form-control" id="mpin" name="state"
                                                    placeholder="Enter Your State" required>
                                                <label for="mpin">Pin <span title="Required"
                                                        style="color:red;">*</span>&nbsp;&nbsp;<span id="mpinno"
                                                        Style="color:red;"></span></label>
                                                <input type="text" class="form-control" id="mpin" name="pin"
                                                    placeholder="Enter Your Pin" pattern="\d{6}"
                                                    title="Wrong Pin Number" required>
                                                <label for="mpin">Pan Number <span title="Required"
                                                        style="color:red;">*</span>&nbsp;&nbsp;<span id="mpinno"
                                                        Style="color:red;"></span></label>
                                                <input type="text" class="form-control" id="mpin" name="pan"
                                                    placeholder="Enter Your Pan Number" required>
                                                <label for="mpin">Adhaar Number <span title="Required"
                                                        style="color:red;">*</span>&nbsp;&nbsp;<span id="mpinno"
                                                        Style="color:red;"></span></label>
                                                <input type="text" class="form-control" id="mpin" name="adhaar"
                                                    placeholder="Enter Your Adhaar Number" pattern="\d{12}"
                                                    title="Wrong Adhaar Number" required>

                                                <input type="hidden" class="form-control" id="cid" name="cid"
                                                    value="<?php echo $this->session->userdata("customer_id");?>">
                                                <input type="submit" class="btn btn-primary btn-solid" value="Submit" />
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card">
                            <div class="card-content table-full-width">
                            <h4 class="leftdownline">Profile Information</h4>
                           <div class="table-responsive">    
                            <table class="table table-bordered table-hover text-nowrap">
                                    <tr>
                                        <th>Username</th>
                                        <td><?php echo $data->username;?></td>

                                        <th>Customer Name</th>
                                        <td><?php echo $data->customer_name;?></td>
                                    </tr>
                                    <tr>
                                        <th>Customer Status</th>
                                        <td><?php echo $data->status==1?'Active':'Inactive';?></td>

                                        <th>Joining Date</th>
                                        <td><?php echo date('d-m-Y',strtotime($data->joining_date));?></td>
                                    </tr>

                                    <tr>
                                        <th>Registration Fee</th>
                                        <td><?php echo $data->amount;?></td>

                                        <th>Active Date</th>
                                        <td><?php echo date('d-m-Y',strtotime($data->active_date));?></td>
                                        
                                    </tr>
                                    <tr>
                                        <th>Referral (Joiner) Name</th>
                                        <td><?php echo $data->joiner_name;?></td>

                                        <th>Referral Position</th>
                                        <td><?php echo $data->position;?></td>
                                    </tr>

                                    <tr>
                                        <!-- <th>Parent UserName</th>
                                        <td><?php // echo $data->parent_id;?></td> -->

                                        <th>Password</th>
                                        <td><?php echo $data->password;?></td>

                                        <th>Joiner UserName</th>
                                        <td><?php echo $data->joiner_id;?></td>
                                    </tr>

                                    
                                    <tr>
                                        <th>Pan Number</th>
                                        <td><?php echo $data->pannumber;?></td>

                                        <th>Adhaar Number</th>
                                        <td><?php echo $data->adhaarnumber;?></td>
                                    </tr>
                                    <tr>
                                        <th>Mobile Number</th>
                                        <td><?php echo $data->mobilenumber;?></td>
                                       
                                        <th>Date Of Birth</th>
                                        <td><?php echo $data->dob;?></td>
</tr>
                                
                                    <tr>
                                        

                                        <th>Email</th>
                                        <td><?php echo $data->email;?></td>
                                        <th>Current Address</th>
                                      
                                        <td><?php echo $data->current_address;?></td>
                                       </tr> 

                                    <tr>
                                         <th>Permanent Address</th>
                                        <td><?php echo $data->permanent_address;?></td>
                                        <th>City</th>
                                        <td><?php echo $data->city;?></td>
                                    </tr>

                                    <tr>
                                        
                                        <th>State</th>
                                        <td><?php echo $data->state;?></td>
                                        <th>Pin</th>
                                        <td><?php echo $data->pin;?></td>
                                    </tr>

                                    <!-- <tr>

                                        <th>Password</th>
                                        <td><?php //echo $data->password;?></td>                                       

                                        
                                    </tr> -->
                                </table></div>
                                <input type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal1"
                                    id="btn1" value="Update Your Profile">
                                <div>
                                </div>
                                
                            </div>

                            </div>
                            

                        </div>

                    </div>
                </div>
            </div>
        </div>
</section>