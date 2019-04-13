<style>
.a{width: 185px !important;}
</style><section class="section-b-space">
    <div class="container">
        <div class="row">
            <?php $this->load->view("dashboardmenu");?>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">
                        <div class="row">
                            
                            <?php $this->load->view("mpindrop");?>
                        </div> 

                        <div class="welcome-msg">
                               
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
                                                action="<?php echo base_url();?>index.php/dashboard/update_account_table/"
                                                method="post"  enctype="multipart/form-data">
                                                
                                                 <label for="mpin">Bank Name<span title="Required"
                                                        style="color:red;">*</span>&nbsp;&nbsp;<span id="mpinno"
                                                        Style="color:red;"></span></label>
                                                <input type="text" class="form-control" id="mpin"
                                                    name="bankname" placeholder="Enter Your Bank Name" 
                                                     required>
                                                     <label for="mpin">Account Number<span title="Required"
                                                        style="color:red;">*</span>&nbsp;&nbsp;<span id="mpinno"Style="color:red;"></span></label>
                                                <input type="number" class="form-control" id="mpin"
                                                    name="account" placeholder="Enter Your Account Number" 
                                                     required>
                                                     <label for="mpin">IFSC Code<span title="Required"
                                                        style="color:red;">*</span>&nbsp;&nbsp;<span id="mpinno"
                                                        Style="color:red;"></span></label>
                                                <input type="text" class="form-control" id="mpin"
                                                    name="ifsc" placeholder="Enter Your IFSC Code" 
                                                    title="Wrong IFSC Code" required>

                                                     <label for="mpin">Branch Name<span title="Required"
                                                        style="color:red;">*</span>&nbsp;&nbsp;<span id="mpinno"
                                                        Style="color:red;"></span></label>
                                                <input type="text" class="form-control" id="mpin"
                                                    name="branchname" placeholder="Enter Your Branch Name" 
                                                     required>

                                                     <label for="mpin">Bank Passbook Photo<span title="Required"
                                                        style="color:red;">*</span>&nbsp;&nbsp;<span id="passbook"
                                                        Style="color:red;"></span></label>
                                                <input type="file" class="form-control" id="passbookphoto"
                                                    name="passbookphoto" placeholder="Passbook Photo" 
                                                     required>

                                                     <label for="mpin">Adhaar Number<span title="Required"
                                                        style="color:red;">*</span>&nbsp;&nbsp;<span id="adhaarno"
                                                        Style="color:red;"></span></label>
                                                <input type="text" class="form-control" id="adhaar"
                                                    name="adhaar" placeholder="Enter Adhaar Number" 
                                                     required>

                                                     <label for="mpin">Adhaar Front Photo<span title="Required"
                                                        style="color:red;">*</span>&nbsp;&nbsp;<span id="adhaarfront"
                                                        Style="color:red;"></span></label>
                                                <input type="file" class="form-control" id="adhaarfrontphoto"
                                                    name="adhaarfrontphoto" placeholder="Adhaar Photo" 
                                                     required>

                                                     <label for="mpin">Adhaar Back Photo<span title="Required"
                                                        style="color:red;">*</span>&nbsp;&nbsp;<span id="adhaarback"
                                                        Style="color:red;"></span></label>
                                                <input type="file" class="form-control" id="adhaarbackphoto"
                                                    name="adhaarbackphoto" placeholder="Adhaar Photo" 
                                                     required>
                                                <br>

                                                <input type="hidden"  class="form-control" id="cid"
                                                    name="cid"  value="<?php echo $this->session->userdata("customer_id");?>">
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
                                <h4 class="leftdownline">Bank Account Information</h4>
                              <div class="table-responsive"> 
                               <table class="table table-bordered table-hover text-nowrap">
                                  <tr>
                                        <th class="a">Bank Name</th>
                                        <td class="a"><?php echo $data->bankname;?></td>
                                    </tr>
                                      </tr> 
                                  <tr>
                                        <th class="a">Account Number</th>
                                        <td><?php echo $data->account_no;?></td>
                                    </tr>
                                    <tr>
                                        <th class="a">IFSC Code</th>
                                        <td><?php echo $data->ifsccode;?></td>
                                    </tr>
                                    <tr>
                                        <th class="a">Branch Name</th>
                                        <td><?php echo $data->branchname;?></td>
                                    </tr>
                                    <tr>
                                        <th class="a">Bank Passbook Photo</th>
                                        <td><img src="http://localhost/cashonwallet.org/admin/assets/kycimages/<?php echo $data->bank_passbook_photo;?>" width="100" height="100"></td>
                                    </tr>
                                    <tr>
                                        <th class="a">Adhaar Number</th>
                                        <td><?php echo $data->adhaarnumber;?></td>
                                    </tr>
                                    <tr>
                                        <th class="a">Adhaar Front Photo</th>
                                        <td><img src="http://localhost/cashonwallet.org/admin/assets/kycimages/<?php echo $data->adhaar_front_photo;?>" width="100" height="100"></td>
                                    </tr>
                                    <tr>
                                        <th class="a">Adhaar Back Photo</th>
                                        <td><img src="http://localhost/cashonwallet.org/admin/assets/kycimages/<?php echo $data->adhaar_back_photo;?>" width="100" height="100"></td>
                                    </tr>
                                </table></div>
								 <h6 class="btn btn-primary" data-toggle="modal"
                                        data-target="#myModal1" id="btn1">Update Bank Information </h6>
                                </div>
                          

                             </div>
                            </div>
                            

                        </div>

                           
                        </div>

                         
                  </div>
              </div>
          </div>
      </section>