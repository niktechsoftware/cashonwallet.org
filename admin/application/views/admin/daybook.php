<div id="main-wrapper" class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
            	<div class="panel-body">
            		<div class="row">
            			<div class="col-md-12"><!--date picker-->
            				 <h3 align="center">Filter By Date</h3><br />  
                <div class="col-md-3">  
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-3">  
                     <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-5">  
                     <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />  
                </div>  
                <div style="clear:both"></div>                 
                <br />
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
        <!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> -->
 <script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  console.log(to_date); console.log(from_date);	
                 var b   = $.ajax({  
                         url:"<?php echo site_url('apanel/filter'); ?>",
						 
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#example').html(data);  
                          }  
						  
                     }); 
				 console.log(b);
                }  
                else  
                {  
                     alert("Please Select Date");  
                } 
           });  
      });  
 </script>				
<!--date picker end-->
            			</div>
            		</div>
            	<br/><hr/><br/>
                   <div class="table-responsive">
                    <table id="example" class="display table table-striped" style="width: 100%; cellspacing: 0;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cid</th>
                                <th>Amount</th>
                                <th>Debit Credit</th>
                                <th>Remark</th>
                                <th>Date/Time</th>
                                <th>Invoice Number</th>
                                <!-- <th>Plan Number</th>  -->
                                
                               
                            </tr>
                        </thead>
                        <tbody>
                        	<?php $i = 1;?>
                        	<?php $res = $this->db->get("inner_daybook")->result();?>
                        	<?php foreach($res as $row):?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row->cid; ?></td>
                                 <td><?php echo $row->amount; ?></td>
                                <td><?php $a= $row->debit_credit;
                                if($a==1)
                                {
                                 echo "Credit";
                                }else{
                                 echo "Debit";
                                }
                                ?></td>
                                
                                <td><?php echo $row->remark;?></td>
                                <td><?php echo $row->date_time;?></td>
                                 <td><a href="<?php base_url();?>printreciept/<?php echo $row->cid; ?>/<?php echo $row->invoice_number; ?>"><?php echo $row->invoice_number;?></a></td>
                             <!--  <td><?php //echo $row->plan_number;?></td> -->
                               
                                 
                             
                              
                              <!--  <td>
                                	<a href="<?php echo base_url();?>apanelForms/deleteGallery/<?php echo $row->id;?>">
                                		Delete
                                	</a>
                                </td>

                                  <td>
                                    <a href="<?php echo base_url();?>apanelForms/editproduct/<?php echo $row->id;?>">
                                        Edit Product
                                    </a>
                                </td>-->
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