

<?php if ($data->amount < 1.00) { ?>
<!-- <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Pay 600/Rs For Activation
</button> -->

<h6 class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="btn1" > Activate By MPIN</h6>


<?php
    } ?>
<!-- Activate by MPin Model -->
<!-- <div class="modal fade" id="myModal" role="dialog">
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
                    name="mpin" placeholder="Enter Your MPIN"
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
</div> -->
<!-- Activate by MPin Model  End-->

 <!-- Drop Down Activate by Mpin Model
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
                    name="mpin" placeholder="Enter Your MPIN"
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
 -->
<!-- <div class="modal fade" id="Modal" role="dialog">
                                <div class="modal-dialog"> -->
                                    <!-- Modal content-->
                                  <!--  <div class="modal-content">
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
                            </div> -->

                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                             <span style="float: left">Enter Details</span>
                                            <button type="button" class="close" style="float: right" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"></h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="theme-form" action="<?php echo base_url();?>index.php/dashboard/activate_customerid/" method="post">
                                                <label for="id">Enter Customer Id </label> <div id="employeename"></div>
                                                <input type="text" class="form-control" id="customerid" name="customerid" placeholder="Enter Customer Id" required>
                                                 <label for="mpin">Enter MPIN </label>
                                                <input type="text" class="form-control" id="mpin" name="mpin" placeholder="Enter MPIN" required>
                                                 <br>
                                                <input type="submit" class="btn btn-primary" value="Conform" />
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
                        				
                        					
                        						$.post("<?php echo site_url('tree/getEmployee') ?>",{customerid : customerid},function(data){
                        							$("#employeename").html(data);
                        						});
                        					});
                                        
                                    </script>
                                    
                                </div>
                            </div>
        