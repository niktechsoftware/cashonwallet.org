<section class="section-b-space">
    <div class="container">
        <div class="row">
            <?php $this->load->view("dashboardmenu");?>
         <?php   $loginType = $this->session->userdata("login_type");
                            
                            $this->db->where("id",$this->session->userdata("customer_id"));
                            $data= $this->db->get("customer_info")->row();
                            ?>

            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">
                        <div class="row">
                            <div class="col-8 page-title">
                                <!--<div style="font-size:35px;"><?php echo $this->session->userdata("name"); ?>'s <h2 class="btn bg-danger text-white">DashBoard</h2> </div>-->
                                 <h6 class="btn bg-danger text-white">DASHBOARD</h6>
                            </div>
                            <?php $this->load->view("mpindrop");?>
                        </div>
                            <div class="row">
                           <?php $this->db->select_sum("amount");
                           $this->db->where("debit_credit",1);
                           $this->db->where("cid",$this->session->userdata("customer_id"));
                           $mp = $this->db->get("outer_daybook")->row()->amount;?>
                           <?php $i =1 ;
                           foreach($AllCounts as $arr): ?>

                            <div class="col-lg-4 col-md-6 col-sm-6 trigger-modal bg-warning" >
                                    <div class="card card-stats" style="border: solid 2px #5688d4;">
                                        <div class="card-header" data-background-color="green">
                                        <i class="material-icons">store</i>
                                        </div>
                                        <div  class="card-content" >
                                            <p  class="category"><?php echo $arr["title"]; ?></p>
                                            <h3 class="card-title">
                                         
                                            <span id="ctl00_ContentPlaceHolder1_lblcoreconnectbenifits">
                                            <?php if($i==1){ $chiko =$arr["count"]-$mp; echo $arr["prefix"].$chiko;}else {echo $arr["prefix"].$arr["count"];} ?>
                                            </span>
                                            </h3>
                                        </div>

                                    </div>
                                </div>

                            <?php $i++; endforeach; ?>           
                            <?php $this->load->view("dash_info"); ?> 

                            </div>
                        </div>
                         </div> 
                    </div>
                </div>
            </div>
</section>
<!-- section end -->