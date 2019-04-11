<!DOCTYPE html>
<html>

<head>
  <title>Pool Income</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

              <!-- History of pool income -->

              <div class="card">
                <div class="card-content">
                  <h4 class="leftdownline">Pool Income of <?php echo $data->username;?></h4>
                  <table id="example1" class="table table-bordered table-hover table-responsive text-nowrap">
                    <thead>
                      <tr class="bg-danger text-white">
                        <th>Sr. No.</th>
                        <th>level</th>
                        <th>Team</th>
                        <th>Income</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $tot =0; $this->db->where("status",1);
                  $totcus = $this->db->get("customer_info");
                  $tot = $totcus->num_rows();
                  $sno =1 ;  foreach($getstr->result() as $r): ?>
                    
                      <tr>
                        <td><?php echo $sno;?></td>
                        <?php
                              $r->level;
                              $count=0;
                              $count1=0;
                              ?>
                        <td><?php echo $r->level;?> </td>
                        <td><?php echo $r->team;?></td>
                        <td><?php  echo $r->income;?></td>

                        <td>
                          <?php
                           if($r->status ==1){
                              echo "<p style='color:white;background-color:#df3b3b; padding-top:12px; padding-bottom:12px;'>&nbsp&nbsp&nbsp&nbspFill ";
                              $tot= $tot - $r->team;}
                              else{
                                if($tot>0){
                                  // echo $r->team-$tot;
                                  echo "<p style='color:white;background-color:green; padding-top:12px; padding-bottom:12px;'>&nbsp&nbsp&nbsp&nbspNot Fill ";
                                  $tot= $tot - $r->team;  }
                                  else{
                                    // echo $r->team;
                                    echo "<p style='color:white;background-color:green;padding-top:12px; padding-bottom:12px;'>&nbsp&nbsp&nbsp&nbspNot Fill ";

                                  }
                                    }?>
                        </td>
                      </tr>
                    
                    <?php $sno++; endforeach ;?>
                    </tbody>

                  </table>
                </di>



              </div>
            </div>
          </div>
        </div>
      </div>

  </section>

  <!--  <style type="text/css">
			@import url(https://fonts.googleapis.com/css?family=Lato:400,700);

body {
  background: #F2F2F2;
  padding: 0;
  maring: 0;
}

#price {
  text-align: center;
}

.plan {
  display: inline-block;
  margin: 10px 1%;
  font-family: 'Lato', Arial, sans-serif;
}

.plan-inner {
  background: #fff;
  margin-top: fixed;
  min-width: 400px;
  max-width: 400px;
  position:relative;
}

.entry-title {
  background: #53CFE9;
  height: 140px;
  position: relative;
  text-align: center;
  color: #fff;
  margin-bottom: 30px;
}

.entry-title>h3 {
  background: #20BADA;
  font-size: 20px;
  padding: 10px 0;
  text-transform: uppercase;
  font-weight: 700;
  margin: 0;
}

.entry-title .price {
  position: absolute;
  bottom: -25px;
  background: #20BADA;
  height: 95px;
  width: 95px;
  margin: 0 auto;
  left: 0;
  right: 0;
  overflow: hidden;
  border-radius: 50px;
  border: 5px solid #fff;
  line-height: 80px;
  font-size: 28px;
  font-weight: 700;
}

.price span {
  position: absolute;
  font-size: 9px;
  bottom: -10px;
  left: 30px;
  font-weight: 400;
}

.entry-content {
  color: #323232;
}

.entry-content ul {
  margin: 0;
  padding: 0;
  list-style: none;
  text-align: center;
}

.entry-content  {
  border-bottom: 1px solid #E5E5E5;
  padding: 10px 0;
}
.entry-contentt  {
  border-bottom: 1px solid #E5E5E5;
  padding:  0;
}
.entry-content1  {
  border-bottom: 1px solid #E5E5E5;
  padding:  auto;
}
.entry-content12  {
  border-bottom: 1px solid #E5E5E5;
  padding:  auto;
  list-style: none;
}
.entry-content li:last-child {
  border: none;
}

.btn {
  padding: 3em 0;
  text-align: center;
}

.btn a {
  background: #323232;
  padding: 10px 30px;
  color: #fff;
  text-transform: uppercase;
  font-weight: 700;
  text-decoration: none
}
.hot {
    position: absolute;
    top: -7px;
    background: #F80;
    color: #fff;
    text-transform: uppercase;
    z-index: 2;
    padding: 2px 5px;
    font-size: 9px;
    border-radius: 2px;
    right: 10px;
    font-weight: 700;
}
.basic .entry-title {
  background: #75DDD9;
}

.basic .entry-title > h3 {
  background: #44CBC6;
}

.basic .price {
  background: #44CBC6;
}

.standard .entry-title {
  background: #4484c1;
}

.standard .entry-title > h3 {
  background: #3772aa;
}

.standard .price {
  background: #3772aa;
}

.ultimite .entry-title > h3 {
  background: #DD4B5E;
}

.ultimite .entry-title {
  background: #F75C70;
}

.ultimite .price {
  background: #DD4B5E;
}

	</style>
</head>
<body>
	<div id="price">
 -->
  <!--price tab
  <div class="plan standard">
    <div class="plan-inner">
      <div class="entry-title">
        <h3 style="color: white;"><strong>Pool Income</strong>(Auto Matrix Income)</h3>
        <div class="price">3<span></span>
        </div>
      </div>
      <div class="entry-content12">
        <ol ><center><table>
        	<tr>
        		<td>
        	<li style="text-decoration: underline;"><strong>Team </strong></td>
            <td></td>
        	<td><strong style="text-decoration: underline;"> Income</strong></td></li>
        	</tr>
        	<tr>
        		<td>
         <li>  3 </td>  <td>=&nbsp; </td>
          <td>30
         	</td></tr></li>
             <tr>
           <td>
         <li>  9  </td>  <td>=&nbsp; </td>
          <td>90</td>

         </tr></li>
         <td>
         <li>  27  </td>  <td>=&nbsp;</td>
          <td>270</td>

         </tr></li>
         <td>
         <li>  81  </td>  <td>= &nbsp;</td>
          <td>810</td>

         </tr></li>
        <td>
         <li>  243  </td>  <td>= &nbsp;</td>
          <td>2430</td>

         </tr></li>
         <td>
         <li>  729  </td>  <td>=&nbsp;</td>
          <td>7290</td>

         </tr></li>
         <td>
         <li>  2187   </td>  <td>=&nbsp; </td>
          <td>21870</td>

         </tr></li>
        <td>
         <li>  96567  </td>  <td>= &nbsp;</td>
          <td>65610</td>

         </tr></li>
         <td>
         <li>  19683   </td>  <td>=&nbsp; </td>
          <td>196830</td>

         </tr></li>
        </tr></li>
         <td>
         <li>  59049   </td>  <td>=&nbsp; </td>
          <td>590490</td>
         	<td>= Total Income</td>
         	<td>= 885720</td>

         </tr></li>

         <tr>
        		<td>
         <li> (.......) </td>
          </tr></li>


  </table>
</center>
        </ol>

      </div>
      <div class="btn">
        <a href="#">Order Now</a>
      </div>
    </div>
  </div><br>
  </div> -->
  <!-- end of price tab-->

  </body>

</html>