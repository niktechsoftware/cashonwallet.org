			<div class="page-sidebar sidebar horizontal-bar">
                <div class="page-sidebar-inner">
                    <ul class="menu accordion-menu">
                        <li class="nav-heading"><span>Navigation</span></li>
                       <li class="active"><a href="<?php echo base_url();?>apanel/"><span class="menu-icon icon-speedometer"></span><p>Dashboard</p></a></li>
                        <li class="droplink">
                        	<a href="#">
                        		<span class="fa fa-globe"></span>
                        		<p>&nbsp;&nbsp;&nbsp;Website</p>
                        		<span class="arrow"></span>
                        	</a>
                            <ul class="sub-menu">
                               
                                <li><a href="<?php echo base_url();?>apanel/contact">Contact</a></li>
                                 <li><a href="<?php echo base_url();?>apanel/marquee">Marquee Content</a></li>
                          
                                
                            </ul>
                        <?php if($this->session->userdata("status")==1){?>
                        </li>

                        <li><a href="<?php echo base_url();?>apanel/daybook"><span class="menu-icon icon-credit-card"></span></span><p>&nbsp;&nbsp;&nbsp;Daybook</p><span class="arrow"></span></a></li>
                        <li class="droplink"><a href="#"><span class="fa fa-mobile"></span><p>&nbsp;&nbsp;&nbsp;Sms Tab</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo base_url();?>apanel/smssetting">Sms Setting</a></li>
                                <li><a href="<?php echo base_url();?>apanel/singlesms">Single Customer</a></li> 
                                <li><a href="<?php echo base_url();?>apanel/customersms">All Customer</a></li>
                                <li><a href="<?php echo base_url();?>apanel/productpromotion">Product Promotion</a></li>
                               
                            </ul>
                        </li>
                        <li class="droplink">
                        	<a href="#">
                        		<span class="menu-icon icon-credit-card"></span>
                        		<p>Product</p>
                        		<span class="arrow"></span>
                        	</a>
                            <ul class="sub-menu">
	                           <li><a href="<?php echo base_url();?>apanel/gallery">Entered Product</a></li>
                                <li><a href="<?php echo base_url();?>apanel/editdeleteproduct">Add/Delete</a></li>
                                                              
	                       	
                            </ul>
                        </li>
                        <li class="droplink">
                        	<a href="#">
                        		<span class="fa fa-briefcase"></span>
                        		<p>&nbsp;&nbsp;&nbsp;Customer</p>
                        		<span class="arrow"></span>
                        	</a>
                              <ul class="sub-menu">
                               <li><a href="<?php echo base_url();?>apanel/activecustomer">Active List</a></li>
                                <li><a href="<?php echo base_url();?>apanel/allcustomerregis">Inactive List</a></li>

                                <li><a href="<?php echo base_url();?>apanel/paidcustomer">Paid but not active</a></li>
                                 <li><a href="<?php echo base_url();?>apanel/editprofile">Customer Profile</a></li> 
                                  <li><a href="<?php echo base_url();?>apanel/customer_report">Customer Report</a></li>  
                                   <li><a href="<?php echo base_url();?>apanel/kycdetail">CashonWallet KYC</a></li>   
                                   <li><a href="<?php echo base_url();?>apanel/coreCommittee">Core Committee Customer</a></li> 
                            </ul>                        
                        </li>
                         <li class="droplink">
                            <a href="#">
                                <span class="fa fa-briefcase"></span>
                                <p>&nbsp;&nbsp;&nbsp;Recharge Wallet</p>
                                <span class="arrow"></span>
                            </a>
                           <?php }?>
                              <ul class="sub-menu form">
                             
                                <li><a href="#" id="walletrecharge" data-toggle="modal" data-target="#myModal2">Wallet MPin Reacharge</a></li> 
                            </ul>
                             <?php if($this->session->userdata("status")==1){?>
                             <li class="droplink">
                        	<a href="#">
                        		<span class="fa fa-briefcase"></span>
                        		<p>&nbsp;&nbsp;&nbsp;Withdrawl Section</p>
                        		<span class="arrow"></span>
                        	</a>
                        	
                              <ul class="sub-menu">
                               <li><a href="<?php echo base_url();?>apanel/withdrawl">New Request</a></li>
                                <li><a href="<?php echo base_url();?>apanel/withdrawlApprove">Approved</a></li>

                                 
                            </ul>                        
                        </li>
                        <?php }?>
                          <?php if($this->session->userdata("status")==1){?>
                              <!--   <li><a href="<?php echo base_url();?>apanel/withdrawl"><span class="menu-icon icon-credit-card"></span></span><p>&nbsp;&nbsp;&nbsp;Withdrawl Request</p><span class="arrow"></span></a></li>-->
                          <li><a href="<?php echo base_url();?>mpindetailcontroller/"><span class="menu-icon icon-credit-card"></span></span><p>&nbsp;&nbsp;&nbsp;MPIN Details</p><span class="arrow"></span></a></li>
                          <?php }?>
                        </li>
                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->
            
            <div class="page-inner">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb container">
                        <li class="active"><?php echo $smallTitle; ?></li>
                    </ol>
                </div>
                <div class="page-title">
                    <div class="container">
                        <h3><?php echo $bigTitle; ?></h3>
                    </div>
                </div>
                                         <div class="modal fade" id="myModal2" role="dialog">
                                       <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"></h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="theme-form"
                                                action="<?php echo base_url();?>index.php/apanel/walletrecharge/"
                                                method="post">
                                              <label for="mobilenumber">Please Enter the Customer User Name:<span title="Required"
                                                        style="color:red;">*</span>&nbsp;&nbsp;<span id="mpinno"
                                                        Style="color:red;"></span></label><br/>
                                               <input type="text" id="customerid" name="customeruserid" class="form-control" maxlength="10" placeholder="Enter the customer User Name Ex: cashonc...." required=""/></span>
                                                <div id ="employeename" ></div>
                                                <br/>                   
                                                <br>
                                                <input type="hidden"  class="form-control" id="cid"
                                                    name="cid"  value="<?php echo $this->session->userdata("customer_id");?>">
                                                <input type="submit" class="btn btn-primary btn-solid" value="OK" />
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

                                    <script>
                                        $("#customerid").keyup(function(){
                        						var customerid = $("#customerid").val();
                        				
                        					
                        						$.post("<?php echo site_url('apanel/getEmployee') ?>",{customerid : customerid},function(data){
                        							$("#employeename").html(data);
                        						});
                        					});
                                        
                                    </script>
                                </div>
                            </div>