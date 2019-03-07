<?php
	function getDetail($id) {
		$valueArray = ['DayBook','Daily Base Income','Pair Matching Income','Pool Income','Royality Income','Time to Time Reward','No Time Reward','Buy MPIN'];
		$CI =& get_instance();
		$CI->load->model("dashboard_model");
		$personalData = $CI->dashboard_model->getDashboardCounts1($id);
		$dataString = '';
		foreach($personalData as $arr):
			if(!in_array($arr["title"], $valueArray)):
				$dataString .= '<strong>'.$arr["title"].'</strong>: ';
				$dataString .= $arr["prefix"].$arr["count"].'<br/>';
				//$dataString .= $arr["joindate"].$arr["activate"].'<br/>';
			endif;
		endforeach;
		return $dataString;
	}
	
	function getDetail2($id) {
		$valueArray = ['DayBook','Daily Base Income','Pair Matching Income','Pool Income','Royality Income','Time to Time Reward','No Time Reward','Buy MPIN'];
		$CI =& get_instance();
		$CI->load->model("dashboard_model");
		$personalData = $CI->dashboard_model->getDashboardCounts2($id);
		$dataString = '';
		foreach($personalData as $arr):
			if(!in_array($arr["title"], $valueArray)):
				$dataString .= '<strong>'.$arr["title"].'</strong>: ';
				$dataString .= $arr["prefix"].$arr["count"].'<br/>';
			
			endif;
		endforeach;
		return $dataString;
	}

	/**
	 * to generate customer information onmouseover on every tree node
	 * @param  [int] 			$customerID 	[customer_id to get all wallet infromation and tree information etc.]
	 * @param  [array Object] 	$data   		[customer persional information (name & username)]
	 * @return [String]             			[string of generate html block of information.]
	 */
	function generateCustomerInfo($customerID, $data) {
		$CI =& get_instance();
		$CI->load->model('dashboard_model');
	    $allCounts 			= $CI->dashboard_model->getDashboardCounts($customerID);
	    $activeDate 		= $data->active_date ? date('d-m-Y',strtotime($data->active_date )) : 'N/A';
	    $joinerName 		= $data->joiner_name ? $data->joiner_name : 'N/A';
	    $TotalLeft 			= isset($allCounts[10]) ? $allCounts[10]['count'] : 'N/A';
	    $TotalLeftActive 	= isset($allCounts[11]) ? $allCounts[11]['count'] : 'N/A';
	    $TotalRight 		= isset($allCounts[12]) ? $allCounts[12]['count'] : 'N/A';
	    $TotalRightActive 	= isset($allCounts[13]) ? $allCounts[13]['count'] : 'N/A';
	    $TotalLeftBusiness 	= isset($allCounts[14]) ? $allCounts[14]['count'] : 'N/A';
	    $TotalRightBusiness = isset($allCounts[15]) ? $allCounts[15]['count'] : 'N/A';
	    return '<div class="container" style="font-size: 11px; border: 1px solid #fff;">
	    	<div class="row">
	    		<div class="col-6" style="border-right: 1px solid #fff;"><strong>Name : </strong>'.$data->customer_name . '</div>
	    		<div class="col-6"><strong>User Name : </strong>'.$data->username . '</div>
	    	</div>

	    	<div class="row">
	    		<div class="col-6" style="border-right: 1px solid #fff;"><strong>Joining Date : </strong>' . date('d-m-Y',strtotime($data->joining_date)).'</div>
	    		<div class="col-6"><strong>Active Date : </strong>'. $activeDate. '</div>
	    	</div>

	    	<div class="row">
	    		<div class="col-6" style="border-right: 1px solid #fff;">
	    			<strong>Sponser Id : </strong>'.$data->joiner_id . '
	    		</div>
	    		<div class="col-6">
	    			<strong>Sponser Name : </strong>'. $joinerName . '
	    		</div>
	    	</div>

	    	<div class="row">
	    		<div class="col-6" style="border-right: 1px solid #fff;">
	    			<strong>Total Left : </strong>'. $TotalLeft . '
	    		</div>
	    		<div class="col-6">
	    			<strong>Total Right : </strong>'. $TotalRight . '
	    		</div>
	    	</div>

	    	<div class="row">
	    		<div class="col-6" style="border-right: 1px solid #fff;">
	    			<strong>Total Left Active : </strong>'. $TotalLeftActive . '
	    		</div>
	    		<div class="col-6">
	    			<strong>Total Right Active : </strong>'. $TotalRightActive . '
	    		</div>
	    	</div>

	    	<div class="row">
	    		<div class="col-6" style="border-right: 1px solid #fff;">
	    			<strong>Total Left Business : </strong>'. $TotalLeftBusiness . '
	    		</div>
	    		<div class="col-6">
	    			<strong>Total Right Business : </strong>'. $TotalRightBusiness . '
	    		</div>
	    	</div>
	    </div>';
	}
?>

							
							
<section class="section-b-space">

    <div class="container">
        <div class="row">
            <?php $this->load->view("dashboardmenu");?>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">
                        <form action="<?php echo base_url(); ?>index.php/dashboard/binarySubGroup" method="post">
	                        <div class="row">
		                            <div class="col-4 page-title">
		                                <!--<div style="font-size:35px;"><?php echo $this->session->userdata("name"); ?>'s <h2 class="btn bg-danger text-white">Binary Group</h2> </div>-->
		                                 <h6 class="btn bg-danger text-white">Binary Group (Tree)</h6>
		                            </div>
									<div class="col-2 text-right"><input type="text" class="form-control" name="customer_id" required="required" title="Only accept numbers."></div>
									<div class="col-3"><input type="submit" class="btn btn-danger" value="Get Tree" /></div>
									<div class="col-3"><a href="<?= base_url() ?>index.php/dashboard/binaryGroup" class="btn btn-danger">Root</a></div>
	                        </div>
	                        <?php
	                        	if($this->session->flashdata('error'))
	                        		echo '<div class="row"><div class="col-12 text-center"><h5 class="text-danger">' . $this->session->flashdata('error') . '</h5></div></div>';
	                        ?>
						</form>
	                            <?php $this->load->view("mpindrop");?>


						<div class="welcome-msg">
							<div class="table-responsive">
								<table class="table table-bordered">
									<tr>
										<td colspan="2">
											<table>
												<table width="100%">
													<tr>
														<td style="border: none;" align="center" colspan="8">
															<div class="customerHead">
																<?= $data->customer_name; ?> <br/>
																<?php
																	/**
																	 * Getting the tree data of root node.
																	 */
																	$root = $this->db->query("SELECT * FROM tree WHERE root=".$data->id." LIMIT 1;")->row();
																	$rootData = $this->db->query("SELECT * FROM customer_info WHERE id=".$data->id." LIMIT 1;")->row();
																	$rootImg = $data ? 'activated.png' : 'disabled.png';
																	$rootImg = $rootData->status == 1 ? $rootImg : 'deactivated.png';
																	
																?>
																<img src="<?= base_url(); ?>assets/images/tree/<?= $rootImg;?>" width="60"  />

																<span class="customerLeft">
																	<?= generateCustomerInfo($data->id, $data) ?>
																</span>
															</div>

														</td>
													</tr>
													<tr>
														<td style="border: none;" align="center" colspan="8">
															<img src="<?= base_url(); ?>assets/images/tree/hr.png" width="55%" style="margin-top: -30px;">
														</td>
													</tr>
													<tr>
														<td style="border: none;" align="center" colspan="4">
															<div style="margin-top: -20px;">
																<?php
																	$leftRootImg = $root->root_left ? 'activated.png' : 'disabled.png';
																	$customerID = $root->root_left ? $root->root_left : '';
																	$leftRootData = null;
																	$leftRootTree = null;
																	
																	if($root->root_left):
																		$leftRootData = $this->db->query("SELECT * FROM customer_info WHERE id=".$root->root_left." LIMIT 1;")->row();
																		$leftRootTree = $this->db->query("SELECT * FROM tree WHERE root=".$root->root_left." LIMIT 1;")->row();
																		$leftRootImg = $leftRootData && $leftRootData->status == 1 ? $leftRootImg : 'deactivated.png';
																		if($leftRootData)
																			echo '<span>' . $leftRootData->customer_name . '('.$leftRootData->username.')</span>';
																	endif;
																?>
															</div>
															<div class="customerHead">
																<img src="<?= base_url(); ?>assets/images/tree/<?= $leftRootImg; ?>" data-id="<?= $customerID ?>" class="profileImg" width="60" >

																<?php if($root->root_left && $leftRootData): ?>
																	<span class="customerLeft">
																		<?= generateCustomerInfo($root->root_left, $leftRootData) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
														<td style="border: none;" align="center" colspan="4">
															<div style="margin-top: -20px;">
																<?php
																	$rightRootImg = $root->root_right ? 'activated.png' : 'disabled.png';
																	$customerID = $root->root_right ? $root->root_right : '';
																	$rightRootData = null;
																	if($root->root_right):
																		$rightRootData = $this->db->query("SELECT * FROM customer_info WHERE id=".$root->root_right." LIMIT 1;")->row();
																		$rightRootTree = $this->db->query("SELECT * FROM tree WHERE root=".$root->root_right." LIMIT 1;")->row();
																		$rightRootImg = $rightRootData && $rightRootData->status == 1 ? $rightRootImg : 'deactivated.png';
																		if($rightRootData)
																			echo '<span>' . $rightRootData->customer_name . '('.$rightRootData->username.')</span>';
																	endif;
																?>
															</div>
															
															<div class="customerHead">
																<img src="<?= base_url(); ?>assets/images/tree/<?= $rightRootImg; ?>" data-id="<?= $customerID ?>" class="profileImg" width="60">																		

																<?php if($root->root_right && $rightRootData): ?>
																	<span class="customerRight">
																		<?= generateCustomerInfo($root->root_right, $rightRootData) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
													</tr>
													<tr>
														<td style="border: none;" align="center" colspan="4">
															<img src="<?= base_url(); ?>assets/images/tree/hr1.png" width="55%" style="margin-top: -30px;">
														</td>
														<td style="border: none;" align="center" colspan="4">
															<img src="<?= base_url(); ?>assets/images/tree/hr1.png" width="55%" style="margin-top: -30px;">
														</td>
													</tr>
													<tr>
														<!-- Left Root Data -->
														<td style="border: none;" align="center" colspan="2">
															<div style="margin-top: -20px;">
																<?php
																	$leftRootImg = 'disabled.png';
																	$leftRootData1 = null;
																	$leftRootTree1 = null;
																	$customerID = '';
																	if($root->root_left && $leftRootTree && $leftRootTree->root_left):
																		$leftRootImg = $leftRootTree->root_left ? 'activated.png' : 'disabled.png';
																		$customerID = $leftRootTree->root_left ? $leftRootTree->root_left : '';
																		if($leftRootTree->root_left):
																			$leftRootData1 = $this->db->query("SELECT * FROM customer_info WHERE id=".$leftRootTree->root_left." LIMIT 1;")->row();
																			$leftRootTree1 = $this->db->query("SELECT * FROM tree WHERE root=".$leftRootTree->root_left." LIMIT 1;")->row();
																			$leftRootImg = $leftRootData1 && $leftRootData1->status == 1 ? $leftRootImg : 'deactivated.png';
																			if($leftRootData1)
																				echo '<span>' . $leftRootData1->customer_name . '('.$leftRootData1->username.')</span>';
																		//print_r($leftRootTree->root_left);
																		endif;
																	endif;
																?>
															</div>
															<div class="customerHead">
																<img src="<?= base_url(); ?>assets/images/tree/<?= $leftRootImg ?>" data-id="<?= $customerID ?>" class="profileImg" width="60">
																<?php if($root->root_left && $leftRootTree && $leftRootTree->root_left && $leftRootData1): ?>
																	<span class="customerLeft">
																		<?= generateCustomerInfo($root->root_right, $rightRootData) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
														<td style="border: none;" align="center" colspan="2">
															<div style="margin-top: -20px;">
																<?php
																	$rightRootImg = 'disabled.png';
																	$rightRootData1 = null;
																	$rightRootTree1 = null;
																	$customerID = '';
																	if($root->root_left && $leftRootTree && $leftRootTree->root_right):
																		$rightRootImg = $leftRootTree->root_right ? 'activated.png' : 'disabled.png';
																		$customerID = $leftRootTree->root_right ? $leftRootTree->root_right : '';
																		if($leftRootTree->root_right):
																			$rightRootData1 = $this->db->query("SELECT * FROM customer_info WHERE id=".$leftRootTree->root_right." LIMIT 1;")->row();
																			$rightRootTree1 = $this->db->query("SELECT * FROM tree WHERE root=".$leftRootTree->root_right." LIMIT 1;")->row();
																			$rightRootImg = $rightRootData1 && $rightRootData1->status == 1 ? $rightRootImg : 'deactivated.png';
																			if($rightRootData1)
																				echo '<span>' . $rightRootData1->customer_name . '('.$rightRootData1->username.')</span>';
																		endif;
																	endif;
																?>
															</div>
															<div class="customerHead">
																<img src="<?= base_url(); ?>assets/images/tree/<?= $rightRootImg ?>" data-id="<?= $customerID ?>" class="profileImg" width="60">
																<?php if($root->root_left && $leftRootTree && $leftRootTree->root_right && $rightRootData1): ?>
																	<span class="customerLeft">
																		<?= generateCustomerInfo($leftRootTree->root_right, $rightRootData1) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
														<!-- Right Root Data -->
														<td style="border: none;" align="center" colspan="2">
															<div style="margin-top: -20px;">
																<?php
																	$leftRootImg = 'disabled.png';
																	$leftRootData2 = null;
																	$leftRootTree2 = null;
																	$customerID = '';
																	if($root->root_right && $rightRootTree && $rightRootTree->root_left):
																		$leftRootImg = $rightRootTree->root_left ? 'activated.png' : 'disabled.png';
																		$customerID = $rightRootTree->root_left ? $rightRootTree->root_left : '';
																		if($rightRootTree->root_left):
																			$leftRootData2 = $this->db->query("SELECT * FROM customer_info WHERE id=".$rightRootTree->root_left." LIMIT 1;")->row();
																			$leftRootTree2 = $this->db->query("SELECT * FROM tree WHERE root=".$rightRootTree->root_left." LIMIT 1;")->row();
																			$leftRootImg = $leftRootData2 && $leftRootData2->status == 1 ? $leftRootImg : 'deactivated.png';
																			if($leftRootData2)
																				echo '<span>' . $leftRootData2->customer_name . '('.$leftRootData2->username.')</span>';
																		endif;
																	endif;
																?>
															</div>
															<div class="customerHead">
																<img src="<?= base_url(); ?>assets/images/tree/<?= $leftRootImg ?>" data-id="<?= $customerID ?>" class="profileImg" width="60">
																<?php if($root->root_right && $leftRootTree && $leftRootTree->root_left && $leftRootData2): ?>
																	<span class="customerRight">
																		<?= generateCustomerInfo($rightRootTree->root_left, $leftRootData2) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
														<td style="border: none;" align="center" colspan="2">
															<div style="margin-top: -20px;">
																<?php
																	$rightRootImg = 'disabled.png';
																	$rightRootData2 = null;
																	$rightRootTree2 = null;
																	$customerID = '';
																	if($root->root_right && $rightRootTree && $rightRootTree->root_right):
																		$rightRootImg = $rightRootTree->root_right ? 'activated.png' : 'disabled.png';
																		$customerID = $rightRootTree->root_right ? $rightRootTree->root_right : '';
																		if($rightRootTree->root_right):
																			$rightRootData2 = $this->db->query("SELECT * FROM customer_info WHERE id=".$rightRootTree->root_right." LIMIT 1;")->row();
																			$rightRootTree2 = $this->db->query("SELECT * FROM tree WHERE root=".$rightRootTree->root_right." LIMIT 1;")->row();
																			$rightRootImg = $rightRootData2 && $rightRootData2->status == 1 ? $rightRootImg : 'deactivated.png';
																			if($rightRootData2)
																				echo '<span>' . $rightRootData2->customer_name . '('.$rightRootData2->username.')</span>';
																		endif;
																	endif;
																?>
															</div>
															<div class="customerHead">
																<img src="<?= base_url(); ?>assets/images/tree/<?= $rightRootImg ?>" data-id="<?= $customerID ?>" class="profileImg" width="60">
																<?php if($root->root_right && $rightRootTree && $rightRootTree->root_left && $rightRootData2): ?>
																	<span class="customerRight">
																		<?= generateCustomerInfo($rightRootTree->root_right, $rightRootData2) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
													</tr>
													<tr>
														<td style="border: none;" align="center" colspan="2">
															<img src="<?= base_url(); ?>assets/images/tree/hr1.png" width="55%" style="margin-top: -30px;">
														</td>
														<td style="border: none;" align="center" colspan="2">
															<img src="<?= base_url(); ?>assets/images/tree/hr1.png" width="55%" style="margin-top: -30px;">
														</td>
														<td style="border: none;" align="center" colspan="2">
															<img src="<?= base_url(); ?>assets/images/tree/hr1.png" width="55%" style="margin-top: -30px;">
														</td>
														<td style="border: none;" align="center" colspan="2">
															<img src="<?= base_url(); ?>assets/images/tree/hr1.png" width="55%" style="margin-top: -30px;">
														</td>
													</tr>
													<tr>
														<!-- LEFT -->
														<td style="border: none;" align="center">
															<div style="margin-top: -20px;">
																<?php
																	$leftRootImg = 'disabled.png';
																	$leftRootData3 = null;
																	$leftRootTree3 = null;
																	$customerID = '';
																	if($root->root_left && $leftRootTree1 && $leftRootTree1->root_left):
																		$leftRootImg = $leftRootTree1->root_left ? 'activated.png' : 'disabled.png';
																		$customerID = $leftRootTree1->root_left ? $leftRootTree1->root_left : '';
																		if($leftRootTree1->root_left):
																			$leftRootData3 = $this->db->query("SELECT * FROM customer_info WHERE id=".$leftRootTree1->root_left." LIMIT 1;")->row();
																			$leftRootTree3 = $this->db->query("SELECT * FROM tree WHERE root=".$leftRootTree1->root_left." LIMIT 1;")->row();
																			$leftRootImg = $leftRootData3 && $leftRootData3->status == 1 ? $leftRootImg : 'deactivated.png';
																			if($leftRootData3)
																				echo '<span>' . $leftRootData3->customer_name . '('.$leftRootData3->username.')</span>';
																		endif;
																	endif;
																?>
															</div>
														
															<div class="customerHead">
																<img src="<?= base_url(); ?>assets/images/tree/<?= $leftRootImg ?>" data-id="<?= $customerID ?>" class="profileImg" width="60">
																<?php if($root->root_left && $leftRootTree1 && $leftRootTree1->root_left && $leftRootData3): ?>
																	<span class="customerLeft">
																		<?= generateCustomerInfo($leftRootTree1->root_left, $leftRootData3) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
														<!-- RIGHT -->
														<td style="border: none;" align="center">
															<div style="margin-top: -20px;">
														
																<?php
																	$rightRootImg = 'disabled.png';
																	$rightRootData3 = null;
																	$customerID = '';
																	if($root->root_left && $leftRootTree1 && $leftRootTree1->root_left):
																		$rightRootImg = $leftRootTree1->root_right ? 'activated.png' : 'disabled.png';
																		$customerID = $leftRootTree1->root_right ? $leftRootTree1->root_right : '';
																		if($leftRootTree1->root_right):
																			$rightRootData3 = $this->db->query("SELECT * FROM customer_info WHERE id=".$leftRootTree1->root_right." LIMIT 1;")->row();
																			$rightRootImg = $rightRootData3 && $rightRootData3->status == 1 ? $rightRootImg : 'deactivated.png';
																			if($rightRootData3)
																				echo '<span>' . $rightRootData3->customer_name . '('.$rightRootData3->username.')</span>';
																		endif;
																	endif;
																?>
															</div>
															
															<div class="customerHead">
																<img src="<?= base_url(); ?>assets/images/tree/<?= $rightRootImg ?>" data-id="<?= $customerID ?>" class="profileImg" width="60">
																<?php if($root->root_left && $leftRootTree1 && $leftRootTree1->root_right && $rightRootData3): ?>
																	<span class="customerLeft">
																		<?= generateCustomerInfo($leftRootTree1->root_right, $rightRootData3) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
														<!-- LEFT -->
														<td style="border: none;" align="center">
															<div style="margin-top: -20px;">
																<?php
																	$leftRootImg = 'disabled.png';
																	$leftRootData4 = null;
																	$leftRootTree4 = null;
																	$customerID = '';
																	if($root->root_left && $rightRootTree1 && $rightRootTree1->root_left):
																		$leftRootImg = $rightRootTree1->root_left ? 'activated.png' : 'disabled.png';
																		$customerID = $rightRootTree1->root_left ? $rightRootTree1->root_left : '';
																		if($rightRootTree1->root_left):
																			$leftRootData4 = $this->db->query("SELECT * FROM customer_info WHERE id=".$rightRootTree1->root_left." LIMIT 1;")->row();
																			$leftRootTree4 = $this->db->query("SELECT * FROM tree WHERE root=".$rightRootTree1->root_left." LIMIT 1;")->row();
																			$leftRootImg = $leftRootData4 && $leftRootData4->status == 1 ? $leftRootImg : 'deactivated.png';
																			if($leftRootData4)
																				echo '<span>' . $leftRootData4->customer_name . '('.$leftRootData4->username.')</span>';
																		//print_r($rightRootTree1->root_left);
																		endif;
																	endif;
																?>
															</div>
															<div class="customerHead">
																<img src="<?= base_url(); ?>assets/images/tree/<?= $leftRootImg ?>" data-id="<?= $customerID ?>" class="profileImg" width="60">
																<?php if($root->root_left && $rightRootTree1 && $rightRootTree1->root_left && $leftRootData4): ?>
																	<span class="customerLeft">
																		<?= generateCustomerInfo($rightRootTree1->root_left, $leftRootData4) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
														<!-- RIGHT -->
														<td style="border: none;" align="center">
															<div style="margin-top: -20px;">
																<?php
																	$rightRootImg = 'disabled.png';
																	$rightRootData4 = null;
																	$leftRootTree3 = null;
																	$customerID = '';
																	if($root->root_right && $rightRootTree1 && $rightRootTree1->root_right):
																		$rightRootImg = $rightRootTree1->root_right ? 'activated.png' : 'disabled.png';
																		$customerID = $rightRootTree1->root_right ? $rightRootTree1->root_right : '';
																		if($rightRootTree1->root_right):
																			$rightRootData4 = $this->db->query("SELECT * FROM customer_info WHERE id=".$rightRootTree1->root_right." LIMIT 1;")->row();
																			$leftRootTree3 = $this->db->query("SELECT * FROM tree WHERE root=".$rightRootTree1->root_right." LIMIT 1;")->row();
																			$rightRootImg = $rightRootData4 && $rightRootData4->status == 1 ? $rightRootImg : 'deactivated.png';
																			if($rightRootData4)
																				echo '<span>' . $rightRootData4->customer_name . '('.$rightRootData4->username.')</span>';
																		//print_r($leftRootTree1->root_left);
																		endif;
																	endif;
																?>
															</div>
															<div class="customerHead">
																<img src="<?= base_url(); ?>assets/images/tree/<?= $rightRootImg ?>" data-id="<?= $customerID ?>" class="profileImg" width="60">
																<?php if($root->root_right && $rightRootTree1 && $rightRootTree1->root_left && $rightRootData4): ?>
																	<span class="customerLeft">
																		<?= generateCustomerInfo($rightRootTree1->root_right, $rightRootData4) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
														<!-- LEFT -->
														<td style="border: none;" align="center">
															<div style="margin-top: -20px;">
																<?php
																	$leftRootImg = 'disabled.png';
																	$leftRootData5 = null;
																	$customerID = '';
																	if($root->root_right && $leftRootTree2 && $leftRootTree2->root_left):
																		$leftRootImg = $leftRootTree2->root_left ? 'activated.png' : 'disabled.png';
																		$customerID = $leftRootTree2->root_left ? $leftRootTree2->root_left : '';
																		if($leftRootTree2->root_left):
																			$leftRootData5 = $this->db->query("SELECT * FROM customer_info WHERE id=".$leftRootTree2->root_left." LIMIT 1;")->row();
																			$leftRootImg = $leftRootData5 && $leftRootData5->status == 1 ? $leftRootImg : 'deactivated.png';
																			if($leftRootData5)
																				echo '<span>' . $leftRootData5->customer_name . '('.$leftRootData5->username.')</span>';
																		endif;
																	endif;
																?>
															</div>
															<div class="customerHead">
																<img src="<?= base_url(); ?>assets/images/tree/<?= $leftRootImg ?>" data-id="<?= $customerID ?>" class="profileImg" width="60">
																<?php if($root->root_right && $leftRootTree2 && $leftRootTree2->root_left && $leftRootData5): ?>
																	<span class="customerRight">
																		<?= generateCustomerInfo($leftRootTree2->root_left, $leftRootData5) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
														<!-- RIGHT -->
														<td style="border: none;" align="center">
															<div style="margin-top: -20px;">
																<?php
																	$rightRootImg = 'disabled.png';
																	$rightRootData5 = null;
																	$customerID = '';
																	if($root->root_right && $leftRootTree2 && $leftRootTree2->root_left):
																		$rightRootImg = $leftRootTree2->root_right ? 'activated.png' : 'disabled.png';
																		$customerID = $leftRootTree2->root_right ? $leftRootTree2->root_right : '';
																		if($leftRootTree2->root_right):
																			$rightRootData5 = $this->db->query("SELECT * FROM customer_info WHERE id=".$leftRootTree2->root_right." LIMIT 1;")->row();
																			$rightRootImg = $rightRootData5 && $rightRootData5->status == 1 ? $rightRootImg : 'deactivated.png';
																			if($rightRootData5)
																				echo '<span>' . $rightRootData5->customer_name . '('.$rightRootData5->username.')</span>';
																		endif;
																	endif;
																?>
															</div>
															<div class="customerHead">
																<img src="<?= base_url(); ?>assets/images/tree/<?= $rightRootImg ?>" data-id="<?= $customerID ?>" class="profileImg" width="60">
																<?php if($root->root_right && $leftRootTree2 && $leftRootTree2->root_right && $rightRootData5): ?>
																	<span class="customerRight">
																		<?= generateCustomerInfo($leftRootTree2->root_right, $rightRootData5) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
														<!-- LEFT -->
														<td style="border: none;" align="center">
															<div style="margin-top: -20px;">
																<?php
																	$leftRootImg = 'disabled.png';
																	$leftRootData6 = null;
																	$customerID = '';
																	if($root->root_right && $rightRootTree2 && $rightRootTree2->root_right):
																		$leftRootImg = $rightRootTree2->root_left ? 'activated.png' : 'disabled.png';
																		$customerID = $rightRootTree2->root_left ? $rightRootTree2->root_left : '';
																		if($rightRootTree2->root_left):
																			$leftRootData6 = $this->db->query("SELECT * FROM customer_info WHERE id=".$rightRootTree2->root_left." LIMIT 1;")->row();
																			$leftRootImg = $leftRootData6 && $leftRootData6->status == 1 ? $leftRootImg : 'deactivated.png';
																			if($leftRootData6)
																				echo '<span>' . $leftRootData6->customer_name . '('.$leftRootData6->username.')</span>';
																		endif;
																	endif;
																?>
															</div>
															<div class="customerHead">
																<img src="<?= base_url(); ?>assets/images/tree/<?= $leftRootImg ?>" data-id="<?= $customerID ?>" class="profileImg" width="60">
																<?php if($root->root_right && $rightRootTree2 && $rightRootTree2->root_right && $leftRootData6): ?>
																	<span class="customerRight">
																		<?= generateCustomerInfo($rightRootTree2->root_left, $leftRootData6) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
														<!-- RIGHT -->
														<td style="border: none;" align="center">
															<div style="margin-top: -20px;">
																<?php
																	$rightRootImg = 'disabled.png';
																	$rightRootData6 = null;
																	$customerID = '';
																	if($root->root_right && $rightRootTree2 && gettype($rightRootTree2->root_right) != null):
																		$rightRootImg = $rightRootTree2->root_right ? 'activated.png' : 'disabled.png';
																		$customerID =  $rightRootTree2->root_right ?  $rightRootTree2->root_right : '';
																		if($rightRootTree2->root_right):
																			$rightRootData6 = $this->db->query("SELECT * FROM customer_info WHERE id=".$rightRootTree2->root_right." LIMIT 1;")->row();
																			$rightRootImg = $rightRootData6 && $rightRootData6->status == 1 ? $rightRootImg : 'deactivated.png';
																			if($rightRootData6)
																				echo '<span>' . $rightRootData6->customer_name . '('.$rightRootData6->username.')</span>';
																		endif;
																	endif;
																?>
															</div>
															<div class="customerHead">
																<img src="<?= base_url(); ?>assets/images/tree/<?= $rightRootImg ?>" data-id="<?= $customerID ?>" class="profileImg" width="60">
																<?php if($root->root_right && $rightRootTree2 && $rightRootTree2->root_right && $rightRootData6): ?>
																	<span class="customerRight">
																		<?= generateCustomerInfo($rightRootTree2->root_right, $rightRootData6) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
													</tr>
												</table>
											</table>
										</td>
									</tr>
										
								</table>
								<?php  
								
									if ($this->uri->segment(3)) :
										echo "succesfully";
									endif;
								?>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>