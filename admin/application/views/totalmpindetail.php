<div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            	<div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="display table table-striped text-nowrap" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr style="font-size: 18px;font-family:Arial;">
                                                   <th>S.N.</th>
                                                   <th>Customer Username</th>
                                                   <th>Customer Name</th>
                                                   <th>All Mpin Number</th>
                                                   <th>Mpin Generate Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php $i = 1;

                                        	$this->db->where("customerid",$this->uri->segment(3));
                                        	$numr = $this->db->get("mpin")?>
                                               
                                        	<?php foreach($numr->result() as $row):?> 
                                        	
                                            <tr style="font-size: 16px;">
                                            
                                                <td><?php echo $i;?></td>
                                                
                                                <?php $this->db->where("id",$row->customerid);
                                                $numr1 = $this->db->get("customer_info")->row();
                                                 ?>
                                                <td><?php echo $numr1->username; ?></td>
                                                
                                                <td><?php echo $numr1->customer_name;?></td>
                                                
                                               <?php $nm = $row->mpin;?>
                                                <td><?php echo $nm; ?></td>

                                                <?php $date = $row->active_mpin_date;?>
                                                <td><?php echo $date; ?></td>
                                            </tr> 
                                            <?php $i++; ?>
                                            <?php endforeach;?>
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->