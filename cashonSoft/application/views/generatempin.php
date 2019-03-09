    <div class="container">
      <div class="row">
        <?php
            $this->load->view("dashboardmenu");
           ?>
        <div class="col-lg-9">
          <div class="card">
            <div class="card-body">
              <form class="theme-form" action="<?php echo base_url();?>index.php/dashboard/generate_mpin/"
                method="post">
                <table class="table table Responsive">
                  <tr>
                    <td>
                      <label for="mpinbal" style="padding-top:10px;"><strong>Select Payment</strong></label></td>
                    <td> <select class="form-control" name="mpinbal" id="mpinbal" style="width:150px" ;
                        required="required">
                        <option value="0">Choose </option>
                        <option value="1">Income Wallet </option>
                        <option value="2">M wallet </option>
                      </select>
                    </td>
                    <td> <label for="number" style="padding-top:10px;"> <strong>Generate Mpin </strong></label> </td>
                    <td><input type="number" name="number" id="number" class="form-control"
                        placeholder="Enter Number For Mpin" style="width:150px;" required="required" /></td>

                    <td><input type="submit" class="btn btn-primary btn-solid" id="subm" value="Generate"
                        disabled="disabled" /></td>
                  </tr>
                </table>
                <div class="col-lg-9">
                  <div class="row">
                    <div id="iwallet"><strong>Your Income wallet Account Balance </strong>
                      <input type="text" id="iwallet1" class="form-control" name="iwallet"
                        style="background-color:Orange; width:150px"
                        Value="<?php echo $this->dashboard_model->totalwallet($this->session->userdata("customer_id"));?>"
                        readonly />
                    </div>
                    <div id="mwallet"><strong> Your M wallet Account Balance </strong><input type="text"
                        class="form-control" style="background-color:Orange; width:150px" id="mwallet1" name="iwallet"
                        Value="<?php echo $this->dashboard_model->mwallettotal();?>" readonly />
                    </div>
                  </div>
                </div>
                <input type="hidden" id="ddamount" name="ddamount" Value="0" />

                <script>
                $("#iwallet").hide();
                $("#mwallet").hide();
                $("#subm").hide();

                $("#mpinbal").change(function() {
                  var mpinbal = ($("#mpinbal").val());
                  if (mpinbal != 0) {
                    if (mpinbal == 1) {
                      $("#iwallet").show();
                      $("#mwallet").hide();

                    } else {
                      $("#mwallet").show();
                      $("#iwallet").hide();
                    }

                  } else {
                    $("#iwallet").hide();
                    $("#mwallet").hide();
                  }
                });

                $("#number").keyup(function() {
                  $("#subm").hide();
                  var number = ($("#number").val());
                  var mpinbal = ($("#mpinbal").val());
                  $('#subm').prop('disabled', 'disabled');
                  totcost = 0.00;
                  if (mpinbal == 1) {
                    var iwallet = ($("#iwallet1").val());
                    totcost = number * 660;
                    if (totcost > iwallet) {
                      alert("You Have not sufficiant balance");
                      $("#ddamount").val('');
                      $("#subm").hide();
                      $('#subm').prop('disabled', 'disabled');
                    } else {
                      $("#ddamount").val(totcost);
                      $("#subm").show();
                      $('#subm').prop('disabled', false);
                    }
                  } else {
                    if (mpinbal == 2) {
                      var mwallet = ($("#mwallet1").val());
                      totcost = number * 600;
                      if (totcost > mwallet) {
                        alert("You Have not sufficiant balance");
                        $("#ddamount").val('');
                        $("#subm").hide();
                        $('#subm').prop('disabled', 'disabled');
                      } else {
                        $("#ddamount").val(totcost);
                        $("#subm").show();
                        $('#subm').prop('disabled', false);
                      }
                    } else {
                      alert("Please Select Account Wallet From you want to Generate M Pin");
                    }
                  }

                });
                </script>
                <br>
                <table id="example1" class="table table-bordered table-hover table-responsive text-nowrap">
                  <thead>
                    <tr class="text-white bg-danger">
                      <th>#</th>
                      <th>Mpin Number</th>
                      <th>Status</th>
                      <th>Used Id</th>
                      <th>Used Name</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1 ; foreach($query as $row): ?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td> <?php echo $row->mpin;?></td>
                      <?php
						if($row->status==1){
						    ?><td><?php
                         echo "USED";?></td><?php
						 //echo $row->customerid;
						 //echo "<b>at<b>";
						 $this->db->where("username",$row->id_active);
						 $cin = $this->db->get("customer_info")->row();?>
                      <td><?php
						 echo $row->id_active;
						?></td>
                      <td><?php echo $cin->customer_name;?></td>
                      <td><?php echo date('d-m-Y',strtotime($row->active_mpin_date)); ?></td>
                      <?php
						 }else{ echo '<td><button style="margin: 20px;" class="btn btn-primary" data-toggle="modal" data-target="#myModal" >Use </button></td>';}
                      $i++; ?>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>

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
            <form class="theme-form" action="<?php echo base_url();?>index.php/dashboard/activate_customerid/"
              method="post">
              <label for="id">Enter Customer Id </label>
              <input type="text" class="form-control" id="customerid" name="customerid" placeholder="Enter Customer Id"
                required>
              <label for="mpin">Enter MPIN </label>
              <input type="text" class="form-control" id="mpin" name="mpin" placeholder="Enter MPIN" required>
              <br>
              <input type="submit" class="btn btn-primary" value="Conform" />
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>