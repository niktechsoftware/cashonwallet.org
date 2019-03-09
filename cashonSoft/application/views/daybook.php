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
                      <h4 class="leftdownline">DayBook</h4>

                      <table id="example1" class="table table-bordered table-hover table-responsive text-nowrap">
                      <thead>
                          <tr class="bg-danger text-white">
                            <th>Sr. No.</th>
                            <th>User ID</th>
                            <th>Name</th>
                          <!--   <th>Left</th>
                            <th>Right</th> -->
                           <th>Remark</th>
                           <th>Amount</th>
                            <th>Debit/Credit</th>
                            <th>Invoice</th>
                            <th>Date</th>
                            <!-- <th>Active Date & Time</th> -->

                          </tr>
                          </thead>
                          <tbody>
                            <?php $sno =1 ; foreach($getstr->result() as $r): ?>

                            <tr>
                              <td><?php echo $sno;?></td>
                              <td><?php
                                $this->db->where("id",$r->cid);
                                $csumer = $this->db->get("customer_info")->row();
                                $cid =$r->cid;
                                $count=0;
                                $count1=0;
                              echo $csumer->username;?></td>
                              <td><?php echo $csumer->customer_name;?></td>
                            <!--   <td><?php //echo $this->tree->getleftjoiner($cid); ?></td>
                              <td><?php //echo    $this->tree->getrightjoiner($cid);?></td> -->

                              <td>
                              <?php
                              $this->db->where("plan_id",$r->plan_number);
                              $remark=$this->db->get("plan_details")->row();
                              echo $remark->plan_name?></td>
                              <td><?php echo $r->amount;?></td>
                              <td><?= $r->debit_credit == 1 ? "Dabit" : "Credit";?></td>
                              <td><?php echo $r->invoice_number;?></td>
                              <td><?php echo date('d-m-Y',strtotime($r->date_time));?></td>
                             <!--  <td><?php //echo $csumer->active_date;?></td>   -->

                            </tr>
                          <?php $sno++; endforeach ;?>
                          </tbody>
                        </table>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>