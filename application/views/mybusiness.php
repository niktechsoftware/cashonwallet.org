<style>
.a{width: 185px !important;}
</style>
<section class="section-b-space">
    <div class="container">
        <div class="row">
            <?php $this->load->view("dashboardmenu");?>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">
                        <div class="row">
                            <!-- div class="col-8 page-title">
                                <div style="font-size:35px;"><?php //echo $this->session->userdata("name"); ?>'s <h2 class="btn bg-danger text-white">My Business</h2> </div>
                                <h6 class="btn bg-danger text-white">My Business</h6> 
                            </div> -->
                            <?php $this->load->view("mpindrop");?>
                        </div>
                         <div class="card">
                             <div class="card-content">
                                <h4 class="leftdownline">My Business </h4>

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-nowrap">
                                   
                                 
                                    <tr>
                                        <th class="a">Daily Base Income</th>
                                        <td class="a"><i class="fa">&#xf156;</i>&nbsp;<?php if($dbi){echo $dbi->amount;}?></td>
                                    </tr>

                                    <tr>
                                        <th class="a">Pair Matching Income</th>
                                        <td class="a"><i class="fa">&#xf156;</i>&nbsp;<?php if($pmi){echo $pmi->amount;}?></td>
                                    </tr>
                                    <tr>
                                        <th class="a">Auto Pool Income</th>
                                        <td class="a"><i class="fa">&#xf156;</i>&nbsp;<?php if($pi){echo $pi->amount;}?></td>
                                    </tr>
                                    <tr>
                                        <th class="a">No Time Reward</th>
                                        <td class="a"><i class="fa">&#xf156;</i>&nbsp;<?php if($nfr){echo $nfr->amount;}?></td>
                                    </tr>
                                      <tr>
                                        <th class="a">Bonanza Income</th>
                                        <td class="a"><i class="fa">&#xf156;</i>&nbsp;<?php if($ttr){echo $ttr->amount;}?></td>
                                    </tr>
                                    <tr>
                                        <th class="a">Core Commeti Income</th>
                                        <td class="a"><i class="fa">&#xf156;</i>&nbsp;<?php if($ri){echo $ri->amount;}?></td>
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







