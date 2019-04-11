<div class="contact_form">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact_form_container">
						<!-- <div class="contact_form_title">New Registration</div> -->

							<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								<div class="contact_form_name contact_form_title"> New Registration</div>
								<div class="contact_form_name contact_form_title">
								<a href="<?php echo base_url();?>index.php/welcome/cashonlogin" class="btn btn-primary">Login With Shop ID</a>
								 </div>
                                <div class="contact_form_name contact_form_title"> 
                                   <a href="<?php echo base_url();?>index.php/welcome/cashonlogin" class="btn btn-danger">Login With Cashonc ID</a>
                                
                                </div>
							</div>


						<form action="<?php echo base_url(); ?>index.php/welcome/userDetail" method="post">
							<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								
								<input type="text" class="contact_form_name input_field" placeholder="Your name" name="customername" id="customername" pattern="[A-Za-z ]+" required="required" data-error="Name is required.">
								
								<input type="text" class="contact_form_email input_field" placeholder="Your email" id="email" name="email" required="required" data-error="Email is required.">
								
								<input type="number" id="contact_form_phone" class="contact_form_phone input_field" id="mobilenumber" name="mobilenumber" placeholder="Your phone number" pattern="[6-9]{1}[0-9]{9}" title="Please Fill Your Valid 10 Digit Mobile Number" >
							</div>

							<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								
								<input type="password" id="contact_form_name" class="contact_form_name input_field" placeholder="Password" id="password" name="password" required="required" data-error="Password is required.">
								
								<input type="password" onkeyup='check();' class="contact_form_email input_field" placeholder="Confirm Password" required="required" data-error=" Confirm Password is required."><span id="cpass"></span>
								
								<input type="text" id="contact_form_phone" class="contact_form_phone input_field" pattern="[0-9]{6}" id="pin" name="pin" title="Please Fill Your Valid 6 Digit Pin Number" placeholder="Pin Code">
							</div>


							<!-- <div class="contact_form_text">
								<textarea id="contact_form_message" class="text_field contact_form_message" name="message" rows="4" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
							</div> -->
							<div class="contact_form_button">
								<button type="submit" class="button contact_submit_button">Registration</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
		<div class="panel"></div>
		                        <script>
                             var check = function() {
                        	  if (document.getElementById('password').value ==
                        	    document.getElementById('ConfirmPassword').value) {
                        	    document.getElementById('cpass').style.color = 'green';
                        	    document.getElementById('cpass').innerHTML = 'matching';
                        	  } else {
                        	    document.getElementById('cpass').style.color = 'red';
                        	    document.getElementById('cpass').innerHTML = 'not matching';
                        	  }
                        	}
                        </script>
	</div>