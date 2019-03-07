
<!-- section start -->
<section class="section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="account-sidebar">
                    <a class="popup-btn">
                        my account
                    </a>
                </div>
                <div class="dashboard-left">
                    <div class="collection-mobile-back">
                        <span class="filter-back">
                            <i class="fa fa-angle-left" aria-hidden="true"></i> back
                        </span>
                    </div>
                    <div class="block-content">
                        <ul>
                            <li class="active"><a href='#'>Profile Info</a></li>
                            <li><a href="<?php echo base_url();?>index.php/dashboard/mybusiness">My Business</a></li>
                            <li><a href="#">My Card</a></li>
                            <li><a href="#">My Team</a></li>
                            <li><a href="#">Binary Group</a></li>
                            <li><a href="#">Change Password</a></li>
                            <li class="last"><a href="#">Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php  $loginType = $this->session->userdata("login_type");
                            
                                 $this->db->where("id",$this->session->userdata("customer_id"));
                                 $data= $this->db->get("customer_info")->row();
                                 ?>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">
                        <div class="row">
                            <div class="col-md-8 page-title">
                                <h2><?php echo $this->session->userdata("name");?>'s Dashboard</h2>
                            </div>
                            <div class="dropdown">
                                
                                   <?php if($data->amount!=600.00){?> 
                                   <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   Pay 600/Rs For Activation  </button><?php }?>
                               
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <input type="submit" class="dropdown-item" data-toggle="modal"
                                        data-target="#myModal" id="btn1" value="MPIN">

                                    <input type="submit" class="dropdown-item" data-toggle="modal" data-target="#Modal"
                                        value="Payment Gateway">
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"></h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="theme-form"
                                                action="<?php echo base_url();?>index.php/dashboard/mpincheck"
                                                method="post">
                                                <label for="mpin">Enter MPIN <span title="Required"
                                                        style="color:red;">*</span>&nbsp;&nbsp;<span id="mpinno"
                                                        Style="color:red;"></span></label>
                                                <input type="text" onkeyup="Validate()" class="form-control" id="mpin"
                                                    name="mpin" placeholder="Enter Your MPIN" pattern="\d{7}"
                                                    title="Wrong MPIN Number" required>
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

                            <!-- Modal -->
                            <div class="modal fade" id="Modal" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"></h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="theme-form" action="" method="post">
                                                <label for="payment">Gateway Payment <span title="Required"
                                                        style="color:red;">*</span></label>
                                                <input type="text" class="form-control" id="payment" name="payment"
                                                    placeholder="Gateway Payment" required>
                                                <br>
                                                <input type="submit" class="btn btn-primary btn-solid" value="Ok" />
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="welcome-msg">
                            <p>Hello, <?php echo $this->session->userdata("name");?></p>
                            <p>From your My Account Dashboard you have the ability to view a snapshot of your recent
                                account activity and update your account information. Select a link below to view or
                                edit information.</p>
                            <br><br>

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                   
                                 
                                    <tr>
                                        <th>Daily Base Income</th>
                                        <td><?php echo $data->id;?></td>
                                    </tr>

                                    <tr>
                                        <th>Pair Base Income</th>
                                        <td><?php echo $data->parent_id;?></td>
                                    </tr>
                                    <tr>
                                        <th>Pool Income</th>
                                        <td><?php echo $data->customer_name;?></td>
                                    </tr>
                                    <tr>
                                        <th>NO Time Reward</th>
                                        <td><?php echo $data->current_address;?></td>
                                    </tr>
                                      <tr>
                                        <th>Time To Time Reward</th>
                                        <td><?php echo $data->customer_name;?></td>
                                    </tr>
                                    <tr>
                                        <th>Roulty Income</th>
                                        <td><?php echo $data->current_address;?></td>
                                    </tr>
                                   
                                  
                                </table>
                            </div>
                        </div>

                        <div class="box-account box-info">
                            <div class="box-head">
                                <h2>Account Information</h2>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box">
                                        <div class="box-title">
                                            <h3>Contact Information</h3>
                                            <a href="#">Edit</a>
                                        </div>
                                        <div class="box-content">
                                            <h6>MARK JECNO</h6>
                                            <h6>MARk-JECNO@gmail.com</h6>
                                            <h6><a href="#">Change Password</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="box">
                                        <div class="box-title">
                                            <h3>Newsletters</h3>
                                            <a href="#">Edit</a>
                                        </div>
                                        <div class="box-content">
                                            <p>
                                                You are currently not subscribed to any newsletter.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="box">
                                    <div class="box-title">
                                        <h3>Address Book</h3>
                                        <a href="#">Manage Addresses</a>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6>Default Billing Address</h6>
                                            <address>
                                                You have not set a default billing address.<br>
                                                <a href="#">Edit Address</a>
                                            </address>
                                        </div>
                                        <div class="col-sm-6">
                                            <h6>Default Shipping Address</h6>
                                            <address>
                                                You have not set a default shipping address.<br>
                                                <a href="#">Edit Address</a>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
<!-- section end -->







