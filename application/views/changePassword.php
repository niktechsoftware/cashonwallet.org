<section class="pwd-page section-b-space">
    <div class="container">
        <div class="row">
            <?php $this->load->view("dashboardmenu");?>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">
                        <div class="row">
                            <div class="col-8 page-title">
                                <!--<div style="font-size:35px;"><?php echo $this->session->userdata("name"); ?>'s <h2 class="btn bg-danger text-white">Change Password</h2> </div>-->
                                 
                            </div>
                            <?php $this->load->view("mpindrop");?>
                        </div>
                            
                               <!-- <div class="col-lg-6 offset-lg-3">
                               -->
                                     
                               <div class="card">
                             <div class="card-content">
                                  <h4 class="leftdownline">Change Password</h4>     
                                   <form class="theme-form" action="<?php echo base_url();?>index.php/dashboard/changePassword" method="post">
                                       <div class="form-row">
                                        <div class="col-md-12">
                                               <input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="Enter Old Password" required="">
                                           </div>
                                           <div class="col-md-12">
                                               <input type="password" onkeyup='check();' class="form-control" id="newpassword" name="newpassword" placeholder="Enter New Password" required="">
                                           </div>
                                           <div class="col-md-12">
                                               <input type="password" onkeyup='check();' class="form-control" id="confirmpassword"  name="confirmpassword" placeholder="Confirm Password" required="">
                                           </div>
                                           <input type="submit"  class="btn btn-solid" id="send" value="Submit"/>&nbsp;&nbsp;&nbsp;&nbsp;<span id="cpass"></span>
                                       </div>
                                   </form>
                               </div>
                           </div>
                        </div>
                        
                    
                </div>
            </div>
        </div>
 </div>
</section>

<script>
 var check = function() {
  if (document.getElementById('newpassword').value ==
    document.getElementById('confirmpassword').value) {
    document.getElementById('cpass').style.color = 'green';
    document.getElementById('cpass').innerHTML = 'matching';
  } else {
    document.getElementById('cpass').style.color = 'red';
    document.getElementById('cpass').innerHTML = 'not matching';
  }
}
    </script>
