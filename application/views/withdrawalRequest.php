<section class="section-b-space">
    <div class="container">
        <div class="row">
            <?php $this->load->view("dashboardmenu");?>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">
                        <div class="row">
                            <div class="col-8 page-title">
                                <!--<div style="font-size:35px;"><?php echo $this->session->userdata("name"); ?>'s <h2 class="btn bg-danger text-white">My Team</h2> </div>-->
                                <h4 class="btn bg-danger text-white">Withdrawal</h4>
                            </div>
                            <?php $this->load->view("mpindrop");?>
                        </div>
                       <form class="theme-form" action="<?php echo base_url(); ?>index.php/dashboard/withdrawalRequest"
                            method="post">

<?php if($this->uri->segment(3)){?>
<h5 class="btn bg-success text-white">Successfully Details are forwarded to Admin For Request Approval !!!!!!</h5>
<?php }?>

                                 <div class="table-responsive">
                             <?php $date = date('Y-m-d');
                             $dayname = date('D', strtotime($date));
                             if($dayname!="Fri"){
                                 echo "<br><strong><h3>Withdrawal allowed only on Friday</h3></strong></br></br></br></br></br></br>";
                             }else{
                                //$date ="Y-m-d";
                                $this->db->where("cid",$this->session->userdata("customer_id"));
                                 $this->db->where("status",0);
                                 $this->db->where("remark","request for Withdrawal");
                                  //$this->db->where("plan_number",11);
                                $already =  $this->db->get("outer_daybook");
                                if($already->num_rows()>0){
                                     echo "<br><strong><h3>Your one request is already pending wait for Approve.</h3></strong></br></br></br></br></br></br>";
                                }else{
                                 ?>
                             <table class="table table-bordered text-nowrap table-responsive">
                                  <thead class="table-primary">
                                  <tr>
                                    	<th>Wallet Availabel Amount</th>
                                  		<th>Withdrawal amount</th>
                                  				<th>####</th>
                                  </thead>
                                  <tbody>
                                  <?php ?>
                                  <tr>
                                  <td><?php $rmw = $this->dashboard_model->totalwallet($this->session->userdata("customer_id"));?>
                                 <input type="text"  id ="wa" value = "<?php echo $rmw;?>" class="form-control" name="wa"  readonly>
                                 <?php if($rmw<200){ echo "Sorry! minimum Limit of withdrawal 200.00/-";}?> </td>
                                  	<td> <input type="number"  id ="withdrawalamount" class="form-control" name="withdrawalamount"  required></td>


                                  	<td> <input type="submit" id="s1" class="form-control success"  value ="Submit">
                                  	<input type="text" id="ssms" class="form-control warning" style="color:red;" value ="Invalid Amount" readonly></td>
                                  	</tr>
                                  </tbody>

                                </table>
                            <?php  }}?>

                                <script>
                                $("#s1").hide();
                                $("#ssms").hide();
                                $("#withdrawalamount").keyup(function(){
                                	$("#s1").hide();
                                	$("#ssms").hide();

                            		var wa = Number($('#wa').val());
                            		var withdrawalamount = Number($('#withdrawalamount').val());
                            		if(wa >199){

                            		if((withdrawalamount < wa+1)&&(withdrawalamount>0)){

                            			$("#s1").show();
                            			$("#ssms").hide();

                            		}else{
                            			$("#s1").hide();
                            			$("#ssms").show();
                            		}

                            		}
                                });

                                </script>
                                <div><h4>Old Transactions</h4></div>
                                 <table id="example1" class="table table-bordered table-hover table-responsive text-nowrap">
                      <thead>
                          <tr class="bg-danger text-white">
                                            <th>#</th>
                                            <th>Username</th>
                                             <th>Name</th>
                                             <th>MObile Number</th>
                                            <th>Amount</th>
                                            <th>Date/Time</th>
                                            <th>Invoice Number</th>
                                         <th>Request</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php $this->db->where("cid",$this->session->userdata("customer_id"));
                                  $this->db->where("debit_credit",1);
                                  $lelerows =$this->db->get("outer_daybook");
                                  if($lelerows->num_rows()>0){
                                    $i=1;  foreach($lelerows->result() as $row):
                                    $this->db->where("id",$row->cid);
                                    $crow = $this->db->get("customer_info")->row(); ;
                                    echo "<tr><td>".$i."</td>";
                                    echo "<td>".$crow->username."</td>";
                                    echo "<td>".$crow->customer_name."</td>";
                                    echo "<td>".$crow->mobilenumber."</td>";
                                    echo "<td>".$row->amount."</td>";
                                    echo "<td>".$row->invoice_number."</td>";
                                    if($row->status){$st = "Approve";}else{$st ="Submit for Approval";}
                                    echo "<td>".date('d-m-Y',strtotime($row->date_time))."</td>";
                                    echo "<td>".$st."</td></tr>";
                                   $i++; endforeach;
                                  }
                                  ?>

                                  </tbody>

                                </table>


                  </form>
                    </div>






                </div>
            </div>
        </div>
    </div>
    </div>

</section>
<!-- section end -->