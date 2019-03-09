<section class="section-b-space">
<div class="container">
 <div class="row">
  <?php $this->load->view("dashboardmenu");?>
    <div class="col-lg-9">
     <div class="dashboard-right">
      <div class="dashboard">

        <div class="row">
         <!-- <div class="col-8 page-title">
            <h6 class="btn bg-danger text-white">My Card</h6>
         </div> -->
            <?php $this->load->view("mpindrop");?>
        </div>

        <div class="card">
         <div class="card-content">
            <h4 class="leftdownline"> Left Direct Referral List</h4>
            <table id="example1" class="table table-bordered table-hover table-responsive text-nowrap">
             <thead>
               <tr class="text-white bg-danger">
                   <th>User ID</th>
                   <th>Name</th>
                   <th>Joining Date</th>
                   <th>Active Date</th>
                   <th>Mobile</th>
                   <th>Package</th>
                   <th>Status</th>
                   <th>Activate Date</th>
               </tr>
             </thead>
                     <?php
                     $cid = $this->session->userdata("customer_id");
                     $left =  $this->tree->getleftjoinerp($cid);
                     foreach($left->result() as $l):
                     //echo $l->root_left."<br>";
                     $this->db->where("id",$l->root_left);
                     $cdata= $this->db->get("customer_info")->row();
                     if($cdata){ ?>
             <tbody>
             <tr>
                 <td>
                     <?Php echo $cdata->username ?>
                 </td>
                 <td>
                     <?Php echo $cdata->customer_name ?>
                 </td>
                 <td>
                     <?Php echo date('d-m-Y',strtotime($cdata->joining_date)); ?>
                 </td>
                 <td>
                     <?Php echo date('d-m-Y',strtotime($cdata->active_date)); ?>
                 </td>
                 <td>
                     <?Php echo $cdata->mobilenumber?>
                 </td>
                 <td>
                     <?Php echo $cdata->amount?>
                 </td>
                 <td>
                     <?Php if($cdata->status==0){echo "Inactive";}else{ echo "Active";}?>
                 </td>
                 <td>
                        <?Php echo date('d-m-Y',strtotime($cdata->active_date))?>
                 </td>
             </tr>
             </tbody>
                    <?php }endforeach;?>
          </table>

         </div>
        </div>


        <div class="card">
         <div class="card-content table-full-width">
           <h4 class="leftdownline">Direct Referral List Right</h4>
         <table id="example2" class="table table-bordered table-hover table-responsive text-nowrap">
           <thead>
            <tr class="text-white bg-danger">
              <th>User ID</th>
              <th>Name</th>
              <th>Joining Date</th>
              <th>Active Date</th>
              <th>Mobile</th>
              <th>ActivatePackage</th>
              <th>Status</th>
               <th>Activate Date</th>
           </tr>
           </thead>
          <?php
          $cid = $this->session->userdata("customer_id");
          $right =  $this->tree->getrightjoinerp($cid);
          foreach($right->result() as $r):
          //echo $l->root_left."<br>";
          $this->db->where("id",$r->root_right);
          $cdata= $this->db->get("customer_info")->row();
          if($cdata){ ?>
          <tbody>
          <tr>
              <td>
                  <?Php echo $cdata->username ?>
              </td>
              <td>
                  <?Php echo $cdata->customer_name ?>
              </td>
              <td>
                  <?Php echo date('d-m-Y',strtotime($cdata->joining_date)); ?>
              </td>
              <td>
                  <?Php echo date('d-m-Y',strtotime($cdata->active_date)); ?>
              </td>
              <td>
                  <?Php echo $cdata->mobilenumber?>
              </td>
              <td>
                  <?Php echo $cdata->amount?>
              </td>
              <td>
                   <?Php if($cdata->status==0){echo "Inactive";}else{ echo "Active";}?>
              </td>
                  <td>
                  <?Php echo date('d-m-Y',strtotime($cdata->active_date))?>
              </td>
          </tr>
          </tbody>
            <?php }endforeach;?>
         </table>
        </div>
       </div>

    </div>
   </div>
  </div>
 </div>
</div>
</section>