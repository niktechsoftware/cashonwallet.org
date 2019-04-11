<section class="pwd-page section-b-space">
   <div class="container">
       <div class="row">
           <div class="col-lg-6 offset-lg-3">
               <h2>Create New Password</h2>
               <form class="theme-form">
                   <div class="form-row">
                   <div class="col-md-12">
                           <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required="">
                       </div>
                       <div class="col-md-12">
                           <input type="password" onkeyup='check();' class="form-control" id="newpassword" name="newpassword" placeholder="Enter New Password" required="">
                       </div>
                       <div class="col-md-12">
                           <input type="password" onkeyup='check();' class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" required="">
                       </div>
                       <button  class="btn btn-solid" id="send">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;<span id="cpass"></span>
                   </div>
               </form>
           </div>
       </div>
   </div>
</section> 



<script>
$("#send").click(function()
		   {
		       var newpass = $("#newpassword").val();
		       var confpass = $("#conformpassword").val();
		       $.post("<?php echo site_url('welcome/create_new_password') ?>",{newpass : newpass, confpass : confpass},
		      
		   });
</script>