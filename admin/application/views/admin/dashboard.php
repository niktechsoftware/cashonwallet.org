			                <div id="main-wrapper" class="container">
			                    <div class="row">
			                        <div class="col-lg-3 col-md-6">
			                            <div class="panel info-box panel-white">
			                                <div class="panel-body">
			                                    <div class="info-box-stats">
			                                        <p class="counter">
			                                        	<?php 
			                                        		//echo $this->db->count_all('student_info');

			                                        	$a=$this->db->where('status',1)->from('customer_info')->count_all_results();
                                        
			                                        	echo $a;
                                           //$res = $this->db->get("customer_info")->result();
                                          
			                                        	?>
			                                        </p>
			                                        <span class="info-box-title">Total Number of Active Customer.</span>
			                                    </div>
			                                    <div class="info-box-icon">
			                                        
			                                    </div>
			                                    <div class="info-box-progress">
			                                        <div class="progress progress-xs progress-squared bs-n">
			                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                          <div class="col-lg-3 col-md-6">
			                            <div class="panel info-box panel-white">
			                                <div class="panel-body">
			                                    <div class="info-box-stats">
			                                        <p class="counter">
			                                        	<?php 
			                                        		//echo $this->db->count_all('student_info');

			                                        	$a=$this->db->where('status',0)->from('customer_info')->count_all_results();
                                        
			                                        	echo $a;
                                           //$res = $this->db->get("customer_info")->result();
                                          
			                                        	?>
			                                        </p>
			                                        <span class="info-box-title">Total Number of InActive Customer.</span>
			                                    </div>
			                                    <div class="info-box-icon">
			                                        
			                                    </div>
			                                    <div class="info-box-progress">
			                                        <div class="progress progress-xs progress-squared bs-n">
			                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
									<div class="col-lg-3 col-md-6">
			                            <div class="panel info-box panel-white">
			                                <div class="panel-body">
			                                    <div class="info-box-stats">
			                                        <p class="counter">
													<?php	
													     $dt = date("Y-m-d");
			                                        	  $this->db->where('DATE(active_mpin_date)',$dt);
			                                        		$mpin =$this->db->get('mpin')->num_rows();
															echo $mpin;
			                                        ?>
			                                        </p>
			                                        <span class="info-box-title">Today total generate mpin</span>
			                                    </div>
			                                    <div class="info-box-icon">
			                                        
			                                    </div>
			                                    <div class="info-box-progress">
			                                        <div class="progress progress-xs progress-squared bs-n">
			                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
									<div class="col-lg-3 col-md-6">
			                            <div class="panel info-box panel-white">
			                                <div class="panel-body">
			                                    <div class="info-box-stats">
			                                        <p class="counter">
													<?php	
														 $dt = date("Y-m-d");
														 $this->db->where('status',1);
			                                        	  $this->db->where('DATE(active_mpin_date)',$dt);
			                                        		$usedmpin =$this->db->get('mpin')->num_rows();
															echo $usedmpin;
			                                        ?>
			                                        </p>
			                                        <span class="info-box-title">Today total used mpin</span>
			                                    </div>
			                                    <div class="info-box-icon">
			                                        
			                                    </div>
			                                    <div class="info-box-progress">
			                                        <div class="progress progress-xs progress-squared bs-n">
			                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
									<div class="col-lg-3 col-md-6">
			                            <div class="panel info-box panel-white">
			                                <div class="panel-body">
			                                    <div class="info-box-stats">
			                                        <p class="counter">
													<?php	
														 $dt = date("Y-m-d");
														 $this->db->where('status',0);
			                                        	  $this->db->where('DATE(active_mpin_date)',$dt);
			                                        		$unusedmpin =$this->db->get('mpin')->num_rows();
															echo $unusedmpin;
			                                        ?>
			                                        </p>
			                                        <span class="info-box-title">Today total unused mpin</span>
			                                    </div>
			                                    <div class="info-box-icon">
			                                    </div>
			                                    <div class="info-box-progress">
			                                        <div class="progress progress-xs progress-squared bs-n">
			                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
									<div class="col-lg-3 col-md-6">
			                            <div class="panel info-box panel-white">
			                                <div class="panel-body">
			                                    <div class="info-box-stats">
			                                        <p class="counter">
													<?php    $dt = date("Y-m-d");
                                                         $this->db->where('status',1);
                                                         $this->db->where('DATE(active_date)',$dt);
                                                         $activedate =$this->db->get('customer_info')->num_rows();
                                                         echo $activedate;
                                                    ?>
			                                        </p>
			                                        <span class="info-box-title">Today's number of active customer</span>
			                                    </div>
			                                    <div class="info-box-icon">
			                                        
			                                    </div>
			                                    <div class="info-box-progress">
			                                        <div class="progress progress-xs progress-squared bs-n">
			                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
									<div class="col-lg-3 col-md-6">
			                            <div class="panel info-box panel-white">
			                                <div class="panel-body">
			                                    <div class="info-box-stats">
			                                        <p class="counter">
													<?php    $dt = date("Y-m-d");
                                                         $this->db->where('status',0);
                                                         $this->db->where('DATE(active_date)',$dt);
                                                         $inactivedate =$this->db->get('customer_info')->num_rows();
                                                         echo $inactivedate;
                                                    ?>
			                                        </p>
			                                        <span class="info-box-title">Today's number of inactive customer</span>
			                                    </div>
			                                    <div class="info-box-icon">
			                                        
			                                    </div>
			                                    <div class="info-box-progress">
			                                        <div class="progress progress-xs progress-squared bs-n">
			                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
									<div class="col-lg-3 col-md-6">
			                            <div class="panel info-box panel-white">
			                                <div class="panel-body">
			                                    <div class="info-box-stats">
			                                        <p class="counter">
													<?php    $dt = date("Y-m-d");
                                                        // $this->db->where('status',0);
                                                         $this->db->where('DATE(joining_date)',$dt);
                                                         $regdate =$this->db->get('customer_info')->num_rows();
                                                         echo $regdate;
                                                    ?>
			                                        </p>
			                                        <span class="info-box-title">Today's number of registration</span>
			                                    </div>
			                                    <div class="info-box-icon">
			                                        
			                                    </div>
			                                    <div class="info-box-progress">
			                                        <div class="progress progress-xs progress-squared bs-n">
			                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
									<div class="col-lg-3 col-md-6">
			                            <div class="panel info-box panel-white">
			                                <div class="panel-body">
			                                    <div class="info-box-stats">
			                                        <p class="counter">
			                                        	<?php 
			                                        		//echo $this->db->count_all('student_info');

			                                        	$a=$this->db->where('status',0)->from('customer_info')->count_all_results();
                                        
			                                        	echo $a;
                                           //$res = $this->db->get("customer_info")->result();
                                          
			                                        	?>
			                                        </p>
			                                        <span class="info-box-title">Top 10 pair maker</span>
			                                    </div>
			                                    <div class="info-box-icon">
			                                        
			                                    </div>
			                                    <div class="info-box-progress">
			                                        <div class="progress progress-xs progress-squared bs-n">
			                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>


									
			                        <div class="col-lg-3 col-md-6">
			                            <div class="panel info-box panel-white">
			                                <div class="panel-body">
			                                    <div class="info-box-stats">
			                                        <p>
			                                        	<i class="fa fa-inr"></i>
			                                        	<span class="counter">
			                                        	 <?php	$dt = date("Y-m-d");
			                                        		$this->db->select_sum('amount');
			                                        	 $this->db->where('DATE(date_time)',$dt);
			                                        		$this->db->where('debit_credit',0);
			                                        		$amountdabit =$this->db->get('inner_daybook')->row()->amount;
															echo $amountdabit;
			                                        		?> 
			                                        	<?php //$dt = date("y-m-d"); echo $this->db->query("SELECT SUM(paid) as total FROM fee WHERE paid_date = '$dt'")->row()->total; ?>
			                                        	</span>

			                                        </p>
			                                        <span class="info-box-title">Todays Total Collection</span>
			                                    </div>
			                                    <div class="info-box-icon">
			                                        <i class="icon-eye"></i>
			                                    </div>
			                                    <div class="info-box-progress">
			                                        <div class="progress progress-xs progress-squared bs-n">
			                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                        <div class="col-lg-3 col-md-6">
			                            <div class="panel info-box panel-white">
			                                <div class="panel-body">
			                                    <div class="info-box-stats">
			                                        <p>
			                                        	<i class="fa fa-inr"></i>
			                                        	<span class="counter">
			                                        		<?php //echo $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."'")->row()->closing_balance; ?>

			                                        	 <?php	$dt = date("Y-m-d");
			                                        		$this->db->select_sum('amount');
			                                        	 $this->db->where('DATE(date_time)',$dt);
			                                        		$this->db->where('debit_credit',1);
			                                        		$amountdabit =$this->db->get('inner_daybook')->row()->amount;
															echo $amountdabit;
			                                        		?>
			                                        	</span>
			                                        </p>
			                                        <span class="info-box-title">Todays Total Expences</span>
			                                    </div>
			                                    <div class="info-box-icon">
			                                        <i class="icon-basket"></i>
			                                    </div>
			                                    <div class="info-box-progress">
			                                        <div class="progress progress-xs progress-squared bs-n">
			                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                        
			                        <div class="col-lg-3 col-md-6">
                                        <div class="panel info-box panel-white">
                                            <div class="panel-body">
                                                <div class="info-box-stats">
                                                    <p>
                                                        <i class="fa fa-inr"></i>
                                                        <span class="counter">
                                                            <?php //echo $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."'")->row()->closing_balance; ?>

                                                         <?php    $dt = date("Y-m-d");
                                                            $this->db->select_sum('amount');
                                                         $this->db->where('DATE(date)',$dt);
                                                            //$this->db->where('debit_credit',0);
                                                            $amountdabit =$this->db->get('mbalance')->row()->amount;
                                                            echo $amountdabit;
                                                            ?>
                                                        </span>
                                                    </p>
                                                    <span class="info-box-title">Todays Credit Recharge</span>
                                                </div>
                                                <div class="info-box-icon">
                                                    <i class="icon-eye"></i>
                                                </div>
                                                <div class="info-box-progress">
                                                    <div class="progress progress-xs progress-squared bs-n">
                                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                     <div class="col-lg-3 col-md-6">
                                        <div class="panel info-box panel-white">
                                            <div class="panel-body">
                                                <div class="info-box-stats">
                                                    <p>
                                                        <i class="fa fa-cus"></i>
                                                        <span class="counter">
                                                            <?php //echo $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."'")->row()->closing_balance; ?>

                                                         <?php   
                                                         	 $res = $this->db->get("customer_info")->result();
                                                         	$i=0; foreach($res as $row):
                              	
                              	$leftdirect = $this->dashboardmodel->getleftjoiner($row->id);
                              	$rightDirect = $this->dashboardmodel->getrightjoiner($row->id);
                              	if(($leftdirect > 9) && ($rightDirect > 9)){
                              	      $this->db->where("customer_id",$row->id);
                              	   $cmn =  $this->db->get("core_com_name");
                              	   
                              	  // echo "rahul";
                              	   if($cmn->num_rows()>0){
                              	       $cmn =$cmn->row();
                              	   }else{
                              	       $att =array(
                              	           "customer_id"=>$row->id,
                              	           "date_time" =>date("Y-m-d h:s:i")
                              	           );
                              	           $this->db->insert("core_com_name",$att);
                              	        $this->db->where("customer_id",$row->id);
                              	   $cmn =  $this->db->get("core_com_name")->row();
                              	   }
                              	    $i++;
                              	    
                              	}endforeach;
                              ?><?php echo $i;?>
                                                           
                                                        </span>
                                                       <strong>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>apanel/coreCommittee">View</a></strong>
                                                    </p>
                                                    <span class="info-box-title">Core Committee Customer</span>
                                                </div>
                                                <div class="info-box-icon">
                                                    <i class="counter"></i>
                                                </div>
                                                <div class="info-box-progress">
                                                    <div class="progress progress-xs progress-squared bs-n">
                                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
			                       
			                   
			                   
			                    </div>
			                </div><!-- Main Wrapper -->