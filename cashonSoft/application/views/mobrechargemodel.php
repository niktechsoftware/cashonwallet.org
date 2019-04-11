<section class="section-b-space">
    <div class="container">
        <div class="row">
            <?php $this->load->view("dashboardmenu");?>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">
                        <div class="row">
                            <div class="col-8 page-title">
                                <!--<div style="font-size:35px;"><?php echo $this->session->userdata("name"); ?>'s <h2 class="btn bg-danger text-white">My Card</h2> </div>-->
                                 
                            </div>
                            <?php $this->load->view("mpindrop");?>
                            </div>
                            
                            <div class="card">
                            <div class="card-content table-full-width">
                             <h4 class="leftdownline">Recharge </h4>
                                <h6 class="btn bg-primary text-white" data-toggle="modal" data-target="#myModal2" id="btn1">MOBILE</h6>
                                <h6 class="btn bg-info text-white" data-toggle="modal" data-target="#myModal2" id="btn1">DISH</h6>
                                <h6 class="btn bg-success text-white" data-toggle="modal" data-target="#myModal2" id="btn1">GAS</h6>
                                <h6 class="btn bg-danger text-white" data-toggle="modal" data-target="#myModal2" id="btn1">ELECTRIC BILL</h6>


                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form class="theme-form" action="#" method="post">
                    <label for="recharge">Choose Your Operator<span title="Required"
                            style="color:red;">*</span>&nbsp;&nbsp;<span id="mpinno" Style="color:red;"></span></label>
                    <select name="provider_id" class="form-control">
                        <option class="form-control">--Select Your Operator--</option>
                        <option value="1" class="form-control">Airtel</option>
                        <option value="2" class="form-control">Aircel</option>
                        <option value="3" class="form-control">BSNL</option>
                        <option value="4" class="form-control">Jio</option>
                        <option value="5" class="form-control">Telenor</option>
                        <option value="6" class="form-control">Idea</option>
                        <option value="5" class="form-control">Vodafone</option>
                    </select>
                    <br />

                    <label for="mobilenumber">Enter Mobile Number:<span title="Required"
                            style="color:red;">*</span>&nbsp;&nbsp;<span id="mpinno"
                            Style="color:red;"></span></label><br />
                    <input type="Number" name="number" class="form-control" maxlength="10"
                        placeholder="Enter Your Mobile Number" required="" /></span>
                    <br />

                    <label for="amount">Enter Amount:<span title="Required" style="color:red;">*</span>&nbsp;&nbsp;<span
                            id="mpinno" Style="color:red;"></span></label><br />
                    <input type="number" name="amount" class="form-control" placeholder="Enter the Amount" />
                    <br />
                    <br />
                    <br>
                    <input type="hidden" class="form-control" id="cid" name="cid"
                        value="<?php echo $this->session->userdata("customer_id");?>">
                    <input type="submit" class="btn btn-primary btn-solid" value="Proceed to Recharge" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>