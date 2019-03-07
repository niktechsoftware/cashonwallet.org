<!-- <!DOCTYPE html>
<html>
<head>
<title></title>
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

                    <div class="card-content table-full-width">

                         <h4 class="leftdownline">Committee Statements of <?php echo $data->username;?></h4>

                       <table id="example1" class="table table-bordered table-hover table-responsive text-nowrap">
                      <thead>
                          <tr class="bg-danger text-white">
                            <th>Sr.No</th>
                            <th>User ID</th>
                            <th>Name</th>
                            <!-- <th>Status</th> -->
                            <th>Income</th>
                            <th>Income Type</th>

                            <th>Date</th>
                          </tr>
                          </thead>
                          <?php $sno=1 ; $tot =0;foreach($getstr->result() as $r): ?>
                          <tbody>
                            <tr>
                              <td><?php echo $sno ;?></td>
                              <td><?php echo $data->username;?></td>
                              <td><?php echo $data->customer_name?></td>

                              <!-- <td><?php //echo $r->status==1?'Active':'Inactive';
                              ?></td> -->
                              <td><?php $tot = $tot +$r->amount; echo $r->amount;?></td>
                              <td><?php
                              $this->db->where("plan_id",6);
                              $remark=$this->db->get("plan_details")->row();
                              echo $remark->plan_name?></td>

                              <td><?php echo date('d-m-Y',strtotime($r->date_time));?></td>
                            </tr>
                            </tbody>
                          <?php $sno++ ; endforeach ;?>
                           <tr class="table-primary">
                          	<td></td>
                          	<td></td>
                            <td><h6>Total </h6></td>
                            <td><h6><?php echo $tot;?></h6></td>
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
        </div>

    </section>
<!--	<style type="text/css">
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
  min-width: auto;
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
   <div class="plan ultimite">
    <div class="plan-inner">
      <div class="entry-title">
        <h3 style="color: white;">Roualty Income</h3>
        <div class="price">6<span></span>
        </div>
      </div>
      <div class="entry-content">
        <ul><table>
        	<tr>
          <li><strong>(No Time Limit)</strong> Core Commetti</li></tr>
         <tr> <li><strong>20 ID</strong>Direct Sponser Karne Par
                                        compamy ke kull business ka</li></tr><br>
                                        <li><tr><strong>5%(Weekly)</strong>
                                        saptahik aata rahega</tr></li>
          </p> </li>
          </table>
          </ul>
      </div>
      <div class="btn">
        <a href="#">Order Now</a>
      </div>
    </div>
  </div>
</div>   -->





</body>
</html>