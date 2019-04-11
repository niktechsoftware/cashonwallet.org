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
<!--  <h6 class="btn bg-danger text-white">My DownLine List</h6> -->
</div>
<?php $this->load->view("mpindrop");?>
</div>

<div class="card">
<div class="card-content table-full-width">
<h4 class="leftdownline">Downline List (In-Direct) Left</h4>
<table class="table table-bordered table-hover table-responsive text-nowrap">
<tr class="table-primary">
<th>User ID</th>
<th>Name</th>
<th>Joining Date</th>
<th>Mobile</th>
<th>Package</th>
<th>Status</th>
<th>Activate Date</th>
</tr>


<?php
$co=1;
$count1=0;
$id = $this->session->userdata("customer_id");
// $left =$this->tree->getleftPair($id,$pair);
$this->db->where('root', $id);
$query2 = $this->db->get('tree')->row();
		                                  ?>

<?php if( $query2->root_left){?>
<td> <?php   $this->db->where("id", $query2->root_left);
$cname = $this->db->get("customer_info")->row();
if(   $cname->status==0){$status = "Inactive";}else{$status  = "Active";}
echo"<tr><td>". $cname->username."</td><td>".$cname->customer_name."</td><td>".$cname->joining_date."</td><td>".$cname->mobilenumber."</td><td>".$cname->amount."</td><td>".$status ."</td><td>". date('d-m-Y',strtotime($cname->active_date))."</td></tr>";
echo $this->tree->getLeftPrintData($query2->root_left,$co); ?>
</td><?php  }?>

</table>
</div>
</div>

<div class="card">
<div class="card-content table-full-width">
<h4 class="leftdownline">Downline List (In-Direct) Right</h4>
<table class="table table-bordered table-hover table-responsive text-nowrap">
<tr class="table-primary">
<th>User ID</th>
<th>Name</th>
<th>Joining Date</th>
<th>Mobile</th>
<th>Package</th>
<th>Status</th>
<th>Activate Date</th>
</tr>
</thead>

<tbody>
<?php
$co=1;
$count1=0;
$id = $this->session->userdata("customer_id");
// $left =$this->tree->getleftPair($id,$pair);
$this->db->where('root', $id);
$query2 = $this->db->get('tree')->row();
?>

<?php if( $query2->root_right){?> <td>
<?php
$this->db->where("id", $query2->root_right);
$cname = $this->db->get("customer_info")->row();
if(   $cname->status==0){$status = "Inactive";}else{$status  = "Active";}
echo"<tr><td>". $cname->username."</td><td>".$cname->customer_name."</td><td>".$cname->joining_date."</td><td>".$cname->mobilenumber."</td><td>".$cname->amount."</td><td>".$status ."</td><td>". date('d-m-Y',strtotime($cname->active_date))."</td></tr>";
echo $this->tree->getLeftPrintData($query2->root_right,$co);?>
</td><?php }?>

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