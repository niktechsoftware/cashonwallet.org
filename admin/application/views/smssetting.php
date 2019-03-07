<!-- start: PAGE CONTENT -->

<div class="row">
	<div class="col-sm-12">
		<!-- start: INLINE TABS PANEL -->
		<div class="panel panel-white">
			<div class="panel-heading">
				<div class="panel-tools">										
					
				</div>
			</div>
			<div class="panel-body">
		
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-calendar">
						<div class="panel-heading panel-blue border-light">
							<h4 class="panel-title">SMS Setting Panel</h4>
						</div>
						
						<div class="panel-body">
							<table class="table table-striped table-bordered table-hover">
								
								<tbody>
									<tr>
										
											<td> 
												<input type="checkbox" name="All customer" id="all_customer" value="<?php echo $osmsv->all_customers;?>" <?php if($osmsv->all_customers){echo "checked";}?>  > All Customers
											</td>

									</tr>
									<tr>
											<td>
												<input type="checkbox" name="Pending Payment" id="pending" value="<?php echo $osmsv->pending;?>" <?php if($osmsv->pending){echo "checked";}?> >Pending Payments
											</td>


									</tr>
									<tr>
											
											<td>
												<input type="checkbox" name="vehicle3" id="dob" value="<?php echo $osmsv->dob;?>" <?php if($osmsv->dob){echo "checked";}?> >Date Of Birth
											</td>


									</tr>
									<tr>
											
											<td>
												<input type="checkbox" name="vehicle4" id="commission" value="<?php echo $osmsv->commission_sms;?>" <?php if($osmsv->commission_sms==1){echo "checked";}?> >Comission SMS
											</td>


									</tr>

									
									</tbody>
							</table>
						<div id="divsms"></div>
						<script>
								
							$("#all_customer").click(function(){
								
						var all_customer = $("#all_customer").val();
						
						$.post("<?php echo site_url('apanel/sends') ?>",{all_customer : all_customer},function(data){
							$("#divsms").html(data);
						});
				});

							$("#pending").click(function(){
								
						var pending = $("#pending").val();
						
						$.post("<?php echo site_url('apanel/pendingsends') ?>",{pending : pending},function(data){
							$("#divsms").html(data);
						});
				});
	
							$("#dob").click(function(){
							
						var dob = $("#dob").val();
						
						$.post("<?php echo site_url('apanel/dobsends') ?>",{dob : dob},function(data){
							$("#divsms").html(data);
						});
				});

								
							$("#commission").click(function(){
							
						var commission = $("#commission").val();
						
						$.post("<?php echo site_url('apanel/commsends') ?>",{commission : commission},function(data){
							$("#divsms").html(data);
						});
				});

						</script>




						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end: INLINE TABS PANEL -->
	</div>
</div>
<!-- end: PAGE CONTENT-->