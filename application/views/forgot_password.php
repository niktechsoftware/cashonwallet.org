<section class="pwd-page section-b-space">
   <div class="container">
       <div class="row">
           <div class="col-lg-6 offset-lg-3">
               <h2>Forget Your Password</h2>
               <form class="theme-form"  method="post"
                       action="<?= base_url() ?>index.php/welcome/new_password">
                   <div class="form-row">
                       <div class="col-md-12">
                       <input type="text"  class="form-control" id="username" name="username" placeholder="Username"  pattern="[a-z]{7}[0-9]+" title="Please Enter Your username" required="">
                       </div>
                       <div class="col-md-12">
                       <input type="text"  class="form-control" id="mno" name="mno" placeholder="Register Mobile Number" pattern="[6-9]{1}[0-9]{9}"  title="Please Fill Your 10 Digit Register Mobile Number" required="">
                       </div>
                       <div class="col-md-12">
                       <input type="text"  class="form-control" id="textotp" name="textotp" placeholder="Enter OTP Here" required="">
                       
                       </div>
                       
                   </div>
                   <button class="btn btn-solid" id="otp12">Generate OTP</button>
               </form>
           </div>
       </div>
       
      
   </div>
</section>
<script>
   $("#textotp").hide();
   $("#otp12").click(function()
   {
      // alert("2");
       var name = $("#username").val();
       var contact = $("#mno").val();
       $.post("<?php echo site_url('welcome/sendotp') ?>",{name : name, contact : contact},
       function(data)
       {
           if(name!="" && contact!="")
           {
             $("#textotp").show();
           }
             
           else
           {
               $("#textotp").hide();
           }
       });
   });


   $("#textotp").keyup(function()
		   {
		       var name = $("#username").val();
		       var textotp = $("#textotp").val();
		       
		       $.post("<?php echo site_url('welcome/matchotp') ?>",{name : name, textotp : textotp},
		       function(data)
		       {
		    	   $("#otp12").val(data);
		       });
		   });
</script>