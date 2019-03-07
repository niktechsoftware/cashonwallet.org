 

<center>
 <input type="submit" id="walletrecharge" data-toggle="modal" class="btn btn-warning" data-target="#myModal3" value="Enter The Amount For Reacharge" style="margin-top:50px;"></center>
 <div class="modal fade" id="myModal3" role="dialog">
                                       <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"></h4>
                                        </div>
                                        <div class="modal-body">
                                        <center>
                                            <form class="theme-form"
                                                action="<?php echo base_url();?>index.php/apanel/entertheamount/"
                                                method="post">
                                              <label for="mobilenumber">Please Enter the Amount :<span title="Required"
                                                        style="color:red;">*</span>&nbsp;&nbsp;<span id="mpinno"
                                                        Style="color:red;"></span></label><br/>

                                                 <input type="hidden"  class="form-control" id="cid"
                                                    name="cid"  value="<?php echo $a;?>">
                                               <input type="number" name="amount" class="form-control" maxlength="10" placeholder="Enter the  Amount " required=""/></span>
                                                <br/>                   
                                                <br>
                                                  
                                                <input type="submit" class="btn btn-primary btn-solid" value="Procced For Recharge Wallet" />
                                            </form>
                                        </div>
                                    </center>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>