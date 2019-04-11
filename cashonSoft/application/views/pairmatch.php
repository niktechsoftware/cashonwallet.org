<!-- <!DOCTYPE html>
<html>
  <head>
	 <title>Pair Matchng Income</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
  <body> -->

    <section class="section-b-space">
      <div class="container">
        <div class="row">
          <?php $this->load->view("dashboardmenu");?>
          <?php $loginType = $this->session->userdata("login_type");

                $this->db->where("id",$this->session->userdata("customer_id"));
                $data= $this->db->get("customer_info")->row();
          ?>
          <div class="col-lg-9">
            <div class="dashboard-right">
              <div class="dashboard">
                    <div class="card">

                    <div class="card-content">

                        <h4 class="leftdownline">Daily Pair Statement of <?php echo $data->username;?></h4>
                       <table id="example1" class="table table-bordered table-hover table-responsive text-nowrap">
                      <thead>
                          <tr class="bg-danger text-white">
                            <th>#</th>

                            <th>Name</th>
                            <th>Pair</th>
                            <th>Income</th>
                            <th>Income Type</th>
                            <th>Flusing</th>
                            <th>Date</th>

                          </tr>
                          </thead>
                          <tbody>
                            <?php $sno =1 ; $tot=0; foreach($getstr->result() as $r):
                            if($r->amount>0.00){
                            ?>
                            <tr>
                              <td><?php echo $sno;?></td>
                              <?php
                                $this->db->where("id",$r->cid);
                                $csumer = $this->db->get("customer_info")->row();


                              $cid =$r->cid;
                              $this->db->where("customer_id",$cid);
                              $af = $this->db->get("pair_maching_income")->row()->afterCapping;
                              $count=0;
                               $count1=0;

                               $pair=0;

                            ?>
                              <td><?php echo $csumer->customer_name;?></td>
                             <?php if($r->amount > 0){ $pair = $r->amount/100; } else{ $pair=0;}?>

                               <td><?php  echo $pair;?></td>
                                <?php if($r->remark =="Pair Mach Income"){?>

                              <td><?php $tot = $tot+$r->amount; echo $r->amount;?></td>
                              <?php } else{?>
                                   <td><?php echo "0";?></td>
                             <?php }?>




                               <td><?php

                              $this->db->where("plan_id",2);
                              $remark=$this->db->get("plan_details")->row();
                              //echo $remark->plan_name;
                              echo $r->remark;
                              ?></td>

                               <?php if($r->remark =="Pair Capping Amount"){?>

                              <td><?php echo $r->amount;?></td>
                              <?php } else{?>
                                   <td><?php echo "0";?></td>
                             <?php }?>
                              <td><?php echo date('d-m-Y',strtotime($r->date_time));?></td>

                            </tr>
                          <?php $sno++; }endforeach ;?>
                            </tbody>
                          <tr class="table-primary">
                        	<td></td>
                        	<td><h6>Total Income</h6></td>
                        	<td></td>
                          <td><h6><?php echo $tot;?></h6></td>
                        	<td></td>
                             <td></td>
                             <td></td>
                        </tr>

                        </table>
                      </div>
                    </div>



                </div>
              </div>
            </div>
          </div>
        </div>

    </section>
    <!-- section end -->
<!--
</body>
</html> -->