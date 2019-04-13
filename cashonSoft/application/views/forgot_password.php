<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<section class="pwd-page section-b-space">
   <div class="container">
       <div class="row">
           <div class="col-lg-6 offset-lg-3" id="newpassword"> 
         <h2>New Password</h2>
                   <div class="form-row">
                       <div class="col-md-12">
                       
                       <input type="password"  class="form-control" id="password" name="password" placeholder="New Password"   title="Please Enter New Password">
                       </div>
                      <br><br>
                       <div class="col-md-12">
                       <input type="password"  class="form-control" id="cfmPassword" name="cfmPassword" placeholder="Conform Password"  title="Please Conform New Password">
                       </div>                   
                   </div>
       </div>
           <div class="col-lg-6 offset-lg-3" id="forgate">
               <h2>Forget Your Password</h2>
                   <div class="form-row">
                       <div class="col-md-12">
                       <input type="text"  class="form-control" id="username"  placeholder="Username" title="Please Enter Your username" >
                       </div>
                       <br>
                        <br>
                       <div class="col-md-12">
                       <input type="number"  class="form-control" id="mno"  placeholder="Register Mobile Number" maxlength="10"  title="Please Fill Your 10 Digit Register Mobile Number" required="">
                       </div>
                       <br>
                         <br>
                       <div class="col-md-12">
                       <input type="text"  class="form-control" id="textotp" name="textotp" placeholder="Enter OTP Here" required="">
                       
                       </div>
                       
                   </div>
                   <br>
                   <button class="btn btn-solid" id="otp12">Generate OTP</button>
           </div><br><br>
             <div id="validotp"  class="col-md-12" ></div>
           <br>
           <div  class="col-md-12">
           <button class="btn btn-solid" id="button">Update Your Password</button>
         </div>
       </div>
      
   </div>
</section>
<script>
   
   $("#textotp").hide();
   $("#button").hide();
    $("#newpassword").hide();
   $("#otp12").click(function()
   {
       var name = $("#username").val();
       var contact = $("#mno").val();
       $.post("<?php echo site_url('welcome/sendotp') ?>",{name : name, contact : contact},
       function(data)
       {
         $("#validotp").html(data);
             $("#textotp").show();
              $("#button").hide();
               $("#otp12").hide();
                 $("#username").hide();
                  $("#mno").hide();
    
       });
   });

    $("#button").hide();
      $("#newpassword").hide();
   $("#textotp").keyup(function()
		   {
		       var name = $("#username").val();
		       var textotp = $("#textotp").val();
		        
		       $.post("<?php echo site_url('welcome/matchotp') ?>",{name : name, textotp : textotp},
		       function(data)
		       {
		    	   $("#validotp").html(data);
		       });
		   });


  


      $("#button").click(function()
        {
       var password = $("#password").val();
       var cfmPassword = $("#cfmPassword").val();       
       var name = $("#username").val();
         var mno = $("#mno").val();
       $.post("<?php echo site_url('welcome/newpasswordsave') ?>",{password : password, cfmPassword : cfmPassword,name:name,mno:mno},
       function(data)
       {
         $("#validotp").html(data);
           $("#button").hide();
          $("#newpassword").hide();
       });

        });
        
   

$('#cfmPassword').on('keyup', function () {
  if ($('#password').val() == $('#cfmPassword').val()) {
    $('#validotp').html('<h3>Matched Password</h3>').css('color', 'green');
     $("#button").show();
  } else 
    $('#validotp').html('<h3>Not Matching</h3>').css('color', 'red');
});


</script>