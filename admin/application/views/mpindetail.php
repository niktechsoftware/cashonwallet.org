<div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            	<div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="display table table-striped text-nowrap" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr style="font-size: 18px;font-family:Arial;background-color: pink;text-align:center;">
                                                   <th>S.N.</th>
                                                   <th>Customer username</th>
                                                   <th>Total Mpin</th>
                                                   <th>Used Mpin</th>
                                                   <th>Unused Mpin</th>
                                                   <th>Total Paid For Mpin</th>
                                                   <th>Mbalance</th>
                                                   <th>Recharge By Admin</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                        	<?php $i = 1;$s1=0;$s2=0;$s3=0;$s4=0;$s5=0;$s6=0;?>

                                        	<?php $res = $this->db->get("customer_info")->result();?>
                                               
                                        	<?php foreach($res as $row):?>
                                            <tr style="font-size: 16px;text-align:center;">
                                                <td><?php echo $i;?></td>
                                                
                                                <td><?php echo $row->username;?></td>
                                                
                                                 <?php $this->db->where("customerid",$row->id);
                                                $numr = $this->db->get("mpin");
                                                $nm = $numr->num_rows();
                                                $s1=$s1+$nm;?>
                                               <td><a class="btn btn-info" href="<?php echo base_url();?>index.php/mpindetailcontroller/totalmpindetail/<?php echo $row->id;?>"><?php echo $nm;?></a></td>
                                               
                                                <?php $this->db->where("status",1);
                                                $this->db->where("customerid",$row->id);
                                                $numr1 = $this->db->get("mpin");
                                                $nm1 = $numr1->num_rows();
                                                $s2=$s2+$nm1;?>
                                               <td><a class="btn btn-info" href="<?php echo base_url();?>index.php/mpindetailcontroller/mpinused/<?php echo $row->id;?>"><?php echo $nm1; ?></a></td>
                                               
                                               <?php $nm2 = $nm-$nm1;
                                               $s3=$s3+$nm2;?>
                                              <td><?php echo $nm2; ?></td>
                                              
                                              <?php $nm3 = $nm*600;
                                              $s4=$s4+$nm3;?>
                                               <td><?php echo $nm3; ?></td>  
                                               
                                               <?php $this->db->where("cid",$row->id);
                                               $amount = $this->db->get("mbalance");
                                               $nm4=$amount->row()->amount;
                                               $s5=$s5+$nm4;?>
                                               <td><?php echo $nm4; ?></td> 
                                               
                                               <?php $this->db->where("cid",$row->id);
                                               $outeramount = $this->db->get("outer_daybook"); 
                                               if($outeramount->num_rows()>0)
                                               {$nm5=$outeramount->row()->amount;
                                               $s6=$s6+$nm5;?>
                                               <td><?php echo $nm5; ?></td> 
                                              <?php  }
                                              else
                                              { ?>
                                                <td></td> 
                                             <?php  }?>
                                               
                                            </tr>
                                            <?php $i++; ?>
                                            <?php endforeach;?>
                                            
                                            
                                            
                                           
                                        </tbody>
                                        <tfoot>
                                         <tr style="font-size: 18px;font-family:Arial;background-color: pink;">
                                                   <th>Total</th>
                                                   <th></th>
                                                   <th class="text-center"><?php echo $s1?></th>
                                                   <th class="text-center"><?php echo $s2?></th>
                                                   <th class="text-center"><?php echo $s3?></th>
                                                   <th class="text-center"> <?php echo $s4?></th>
                                                   <th class="text-center"><?php echo $s5?></th>
                                                   <th class="text-center"><?php echo $s6?></th>
                                            </tr>
                                        
                                        </tfoot>
                                       </table>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->