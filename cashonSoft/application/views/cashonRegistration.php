<?php 
 $cid=$this->uri->segment(3);
 if($cid){
$this->db->where("id",$cid);
$cname=$this->db->get("customer_info")->row()->username;
}

 if (validation_errors()) { ?>
<div class="alert alert-warning">
    <?php echo validation_errors(); ?>
</div>
<?php 
} ?>
<?php if ($this->session->userdata('item')) { ?>
<div class="alert alert-success">
    <?php echo $this->session->userdata('item'); ?>
</div>
<?php 
} ?>
<!--section start-->
<section class="register-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>create account</h3>
                <?php //print_r($a);
               // echo $data;
                ?>
                <div class="theme-card">
                    <?PHP echo validation_errors(); ?>
                    <form class="theme-form" action="<?php echo base_url(); ?>index.php/welcome/userDetail"
                        method="post">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="customername">Customer Name <span title="Required"
                                        style="color:red;">*</span>&nbsp;&nbsp;<span id="name"
                                        Style="color:red;"></span></label>
                                <input type="text" onkeyup="Validate1()" class="form-control" id="customername"
                                    name="customername" placeholder="Full Name" pattern="[A-Za-z ]+"
                                    title="Please Fill Your Name Only" required>


                                <script>
                                function Validate1() {
                                    var text_value = document.getElementById("customername").value;
                                    if (!text_value.match(/^[A-Za-z ]+$/)) {
                                        document.getElementById("name").innerHTML = "Invalid Name eg 'Ram'";
                                        document.getElementById("customername").focus();
                                        if (text_value == "") {
                                            document.getElementById("name").innerHTML = " ";
                                            document.getElementById("customername").focus();
                                        }
                                    }

                                }
                                </script>

                            </div>
                            <div class="col-md-6">
                                <label for="email1">Email <span title="Required" style="color:red;">*</span></label>
                                <input type="email" class="form-control" id="email1" name="email"
                                    placeholder="Enter Your Email" title="Please Fill Valid Email Id" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="password">Password <span title="Required"
                                        style="color:red;">*</span></label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter your password" title="Please enter at least 5 or more characters"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="ConfirmPassword"> Confirm Password <span title="Required"
                                        style="color:red;">*</span><span id="cpass"></span></label>
                                <input name="ConfirmPassword"  onkeyup='check();' type="password" id="ConfirmPassword" class="form-control"
                                    placeholder="Confirm Password" title=" Password Not Match" required>
                            </div>
                        </div>
                        
                       
                        
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
                        
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="mobilenumber">Mobile Number <span title="Required"
                                        style="color:red;">*</span>&nbsp;&nbsp;<span id="mno"
                                        Style="color:red;"></span></label>
                                <input type="text" onkeyup="Validate2()" class="form-control" id="mobilenumber"
                                    name="mobilenumber" placeholder="Mobile Number" pattern="[6-9]{1}[0-9]{9}"
                                    title="Please Fill Your Valid 10 Digit Mobile Number" required>

                                <script>
                                function Validate2() {
                                    var text_value = document.getElementById("mobilenumber").value;
                                    if (!text_value.match(/[0-9]$/)) {
                                        document.getElementById("mno").innerHTML = "Invalid Mobile Number";
                                        document.getElementById("mobilenumber").focus();
                                        if (text_value == "") {
                                            document.getElementById("mno").innerHTML = " ";
                                            document.getElementById("mobilenumber").focus();
                                        }
                                    }

                                }
                                </script>
                            </div>
                            <!-- <div class="col-md-6">
                                <label for="altnumber">Alternate Mobile Number (Optional)&nbsp;&nbsp;<span id="alt" Style="color:red;"></span></label>
                                <input type="text" onkeyup="Validate3()" class="form-control" id="altnumber" name="phonenumber" placeholder="Alternate Number" pattern="[6-9]{1}[0-9]{9}"  title="Please Fill Your Valid 10 Digit Mobile Number">
                                <script>
                                    function Validate3()
                                    {
                                        var text_value = document.getElementById("altnumber").value;
                                        if (!text_value.match(/[0-9]$/))
                                        {
                                            document.getElementById("alt").innerHTML = "Invalid Mobile Number";
                                            document.getElementById("altnumber").focus(); 
                                            if(text_value=="")
                                            {
                                            document.getElementById("alt").innerHTML = " ";
                                            document.getElementById("altnumber").focus(); 
                                            } 
                                        }
                                       
                                    }    
                                </script>
                            </div>
                        </div>
                          <div class="form-row">
                            <div class="col-md-6">
                                <label for="dob">Date Of Birth <span title="Required" style="color:red;">*</span></label>
                                <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter Your dob" required>
                            </div>
                            <div class="col-md-6">
                                <label for="joiningdate">Joining Date <span title="Required" style="color:red;">*</span></label>
                                <input type="date" class="form-control" id="joiningdate" name="joiningdate" placeholder="Joining Date" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="currentadd">Current Address <span title="Required" style="color:red;">*</span></label>
                                <input type="text" class="form-control" id="currentadd" name="currentadd" placeholder="Current Address" required>
                            </div>
                            <div class="col-md-6">
                                <label for="permanenaddt">Permanent Address <span title="Required" style="color:red;">*</span></label>
                                <input type="text" class="form-control" id="permanenaddt" name="permanenaddt" placeholder="Permanent Address" required>
                            </div>
                        </div>
                       
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="city">City <span title="Required" style="color:red;">*</span></label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                            </div>
                            <div class="col-md-6">
                                <label for="state">State <span title="Required" style="color:red;">*</span></label>
                                <input type="text" class="form-control" id="state" name="state" placeholder="State" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="pin">Pin <span title="Required" style="color:red;">*</span>&nbsp;&nbsp;<span id="pinno" Style="color:red;"></span></label>
                                <input type="text" onkeyup="Validate4()" class="form-control" id="pin" name="pin" placeholder="Pin" pattern="[0-9]{6}"  title="Please Fill Your 6 Digit Pin Number" required>
                                <script>
                                    function Validate4()
                                    {
                                        var text_value = document.getElementById("pin").value;
                                        if (!text_value.match(/[0-9]$/))
                                        {
                                            document.getElementById("pinno").innerHTML = "Invalid Pin Number";
                                            document.getElementById("pin").focus(); 
                                            if(text_value=="")
                                            {
                                            document.getElementById("pinno").innerHTML = " ";
                                            document.getElementById("pin").focus(); 
                                            } 
                                        }                       
                                    }    
                                </script>
                            </div> -->
                            <div class="col-md-6">
                                <label for="joinerid">Joiner Id/Referal UserName</label>
                                <!--<select class="form-control" name="joinerid" id="joinerid">
                                    <option value="Choose">Choose Joiner Id</option>
                                    <?php foreach ($roots as $root) {
                                        echo '<option value="' . $root['root'] . '">' . $root['root'] . '</option>';
                                    } ?>
                                </select>--> 
                                <input type="text" class="form-control" name="joinerid" id="joinerid" value="<?php echo $cname;?>" required ="required" >
                            </div>
                        </div>
                        
                        
                        <div class="form-row">
                           <div class="col-md-12">
                            <?php 
                            if($cname){ 
                               ?> <div id="joiner" ></div>
                               <script>
                               $(document).ready(function(){
                                
                                     var joinerid = $("#joinerid").val();
                                                        //alert(joinerid);
                                                        $.post("<?php echo site_url('welcome/getcname') ?>",{joinerid : joinerid},function(data){
                                                            $("#joiner").html(data);
                                                        });
                                   $("#joiner").show();
                                 });

                                </script>


                           <?php  }
                           else{
                                 ?><div id="joiner" ></div>
                               <script>
                                 $("#joinerid").keyup(function(){
                                      $("#joiner").hide();
                                     var joinerid = $("#joinerid").val();
                                                        //alert(joinerid);
                                                        $.post("<?php echo site_url('welcome/getcname') ?>",{joinerid : joinerid},function(data){
                                                            $("#joiner").html(data);
                                                        });
                                   $("#joiner").show();
                                 });

                                </script>

                           <?php }
                                ?>
                             
 <!--<button class="btn btn-solid" id="sendsms">
                            Create Account</button>
                         </div>-->
                        
                       </div>
                        <!--                        <div class="form-row">-->
                        <!--                            <div class="col-md-6">-->
                        <!--                                <label for="sponsername">Sponser Name</label>-->
                        <!--                                <input-->
                        <!--                                    type="text"-->
                        <!--                                    class="form-control"-->
                        <!--                                    id="sponsername"-->
                        <!--                                    name="sponsername"-->
                        <!--                                    placeholder="Sponser Name"-->
                        <!--                                    readonly="readonly">-->
                        <!--                            </div>-->
                        <!--                            <div class="col-md-6">-->
                        <!--                                <label for="position">Position</label>-->
                        <!--                                <select-->
                        <!--                                    class="form-control"-->
                        <!--                                    name="position"-->
                        <!--                                    type="number"-->
                        <!--                                    id="position"-->
                        <!--                                    value="set_value('position')"-->
                        <!--                                    readonly="readonly">-->
                        <!--                                    <option value="Choose">Choose Position</option>-->
                        <!--                                    <option value="Position 1">Position 1</option>-->
                        <!--                                    <option value="Position 2">Position 2</option>-->
                        <!--                                    <option value="Position 3">Position 3</option>-->
                        <!--                                    <option value="Position 4">Position 4</option>-->
                        <!--                                    <option value="Position 5">Position 5</option>-->
                        <!--                                </select>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!-- <div class="form-row">
                            <div class="col-md-6">
                                <label for="panno">Pan Number <span title="Required" style="color:red;">*</span>&nbsp;&nbsp;<span id="pan" Style="color:red;"></span></label>
                                <input type="text" onkeyup="Validate5()" class="form-control" id="panno" name="pannumber" placeholder="Pan Number" pattern="^([A-Z]){5}([0-9]){4}([A-Z]){1}?$" title="Please Fill Valid Pan Number" required>
                                <script>
                                    function Validate5()
                                    {
                                        var text_value = document.getElementById("panno").value;
                                        if (!text_value.match(/[A-Z 0-9]$/))
                                        {
                                           document.getElementById("pan").innerHTML = "Invalid Pan Number";
                                            document.getElementById("panno").focus(); 
                                            if(text_value=="")
                                            {
                                            document.getElementById("pan").innerHTML = " ";
                                            document.getElementById("panno").focus(); 
                                            } 
                                        }
                                       
                                    }    
                                </script>
                            </div>
                            <div class="col-md-6">
                                <label for="adhaarno">Adhaar Card <span title="Required" style="color:red;">*</span>&nbsp;&nbsp;<span id="adhaar" Style="color:red;"></span></label>
                                <input type="text" onkeyup="Validate6()" class="form-control" id="adhaarno" name="adhaarnumber" placeholder="Adhaar Number" pattern="[0-9]{12}" title="Please Fill Your 12 Digit Adhaar Card Number" required>
                                <script>
                                    function Validate6()
                                    {
                                        var text_value = document.getElementById("adhaarno").value;
                                        if (!text_value.match(/[0-9]$/))
                                        {
                                            document.getElementById("adhaar").innerHTML = "Invalid Adhaar Number";
                                            document.getElementById("adhaarno").focus(); 
                                            if(text_value=="")
                                            {
                                            document.getElementById("adhaar").innerHTML = " ";
                                            document.getElementById("adhaarno").focus(); 
                                            } 
                                        }
                                       
                                    }    
                                </script>
                            </div>
                        </div> -->
                        
                    </form>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    
    if(performance.navigation.type == 2){
   location.reload(true);
}
</script>
<!--Section ends-->
