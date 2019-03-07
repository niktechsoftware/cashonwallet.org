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
                                                   <th>Username</th>
                                                   <th>Used Mpin</th>
                                                   <th>Mpin Used By Username</th>
                                                   <th>Mpin Used By Customer Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php $i = 1;

                                        	$this->db->where("customerid",$this->uri->segment(3));
                                        	$this->db->where("status",1);
                                        	$numr = $this->db->get("mpin")?>
                                               
                                        	<?php foreach($numr->result() as $row):?> 
                                        	
                                            <tr style="font-size: 16px;">
                                            
                                                <td><?php echo $i;?></td>
                                                
                                                <?php $this->db->where("id",$row->customerid);
                                                $numr1 = $this->db->get("customer_info")->row();
                                                 ?>
                                                <td><?php echo $numr1->username; ?></td>
                                                
                                               <?php $nm = $row->mpin;?>
                                                <td><?php echo $nm; ?></td>
                                                
                                                <td><?php echo $row->id_active;?></td>
                                                
                                                <?php
                                                $this->db->where("username",$row->id_active);
                                                $numr2 = $this->db->get("customer_info")->row();
                                                 ?>
                                                <td><?php echo $numr2->customer_name;?></td>
                                                
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