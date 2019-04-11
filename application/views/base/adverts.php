	<!-- Adverts -->

	<div class="adverts">
		<div class="container">
			<div class="row">

				<!-- <div class="col-lg-4 advert_col"> -->

					<!-- Advert Item -->

					<!-- <div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<div class="advert_title"><a href="#">Trends 2018</a></div>
							<div class="advert_text">Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</div>
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="<?php echo base_url(); ?>assets/images/adv_1.png" alt=""></div></div>
					</div>
				</div> -->

				<!-- <div class="col-lg-4 advert_col"> -->

					<!-- Advert Item -->

					<!-- <div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<div class="advert_subtitle">Trends 2018</div>
							<div class="advert_title_2"><a href="#">Sale -45%</a></div>
							<div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="<?php echo base_url(); ?>assets/images/adv_2.png" alt=""></div></div>
					</div>
				</div> -->

				<!-- <div class="col-lg-4 advert_col"> -->

					<!-- Advert Item -->

					<!-- <div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<div class="advert_title"><a href="#">Trends 2018</a></div>
							<div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="<?php echo base_url(); ?>assets/images/adv_3.png" alt=""></div></div>
					</div>
				</div> -->
				

			<?php if(isset($products) && is_array($products) && count($products))
			{ 
				$i=1;
				foreach ($products as $key => $data) 
				{?>

				
				<div class="col-lg-4 advert_col" style="margin-top:40px;">

					<!-- Advert Item -->

					<div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<div class="advert_title"><a href="#"><?php echo $data['product_name'] ?></a></div>
							<div class="advert_title_2"><a href="#">Rs. <?php echo $data['product_price'] ?></a></div><br/>
							<!-- <div class="advert_text"><?php echo $data['product_description'] ?></div> -->
							<a href="<?php echo base_url();?>index.php/welcome/checkcart" class="btn btn-danger">Buy</a>
							
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="<?php echo base_url(); ?>admin/assets/images/<?php echo $data['product_image'] ?>" alt=""></div></div>
					</div>
				</div>
				<?php $i++;}}?>

			</div>
		</div>
	</div>