<body>

<div id="exampleModalLive1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title" id="exampleModalLiveLabel1" style="color:#df3b3b; data-blast="color">Offer</h4>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
<img style="
   
    height:450px; 
	width:100%;
    box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
    border-radius: 10px;
    border:1px solid #0e8ce4;
    margin:auto;
    " src="<?php echo base_url(); ?>assets/images/offers/holi.jpeg" alt="">

         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
       </div>
     </div>
   </div>
   <script>
$(window).load(function(){
       $('#exampleModalLive1').modal('show');
        });
</script>





<div class="super_container">

	<!-- Header(manu) -->

	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="<?php echo base_url(); ?>assets/images/phone.png" alt=""></div>9140650783</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="<?php echo base_url(); ?>assets/images/mail.png" alt=""></div><a href="mailto:cashonwallet@gmail.com">cashonwallet@gmail.com</a></div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_menu">

							</div>
							<div class="top_bar_user">
								<div class="user_icon"><img src="<?php echo base_url(); ?>assets/images/user.svg" alt=""></div>
								<div><a href="<?php echo base_url();?>cashonsoft/index.php/welcome/registration">Register</a></div>
								<div class="user_icon"><img src="<?php echo base_url(); ?>assets/images/user.svg" alt=""></div>
								<div><a href="<?php echo base_url();?>cashonsoft/index.php/welcome/login">Sign in</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<!-- <div class="logo"><a href="#">OneTech</a></div> -->
							<div class="logo"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="" style="width:150px;"></div>
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form action="#" class="header_search_form clearfix">
										<input type="search" required="required" class="header_search_input" placeholder="Search for products...">
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc">All Categories</span>
												<i class="fas fa-chevron-down"></i>
												<ul class="custom_list clc">
													<li><a class="clc" href="#">All Categories</a></li>
													<li><a class="clc" href="#">Computers</a></li>
													<li><a class="clc" href="#">Laptops</a></li>
													<li><a class="clc" href="#">Cameras</a></li>
													<li><a class="clc" href="#">Hardware</a></li>
													<li><a class="clc" href="#">Smartphones</a></li>
												</ul>
											</div>
										</div>
										<button type="submit" class="header_search_button trans_300" value="Submit"><img src="<?php echo base_url(); ?>assets/images/search.png" alt=""></button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							<div class="wishlist d-flex flex-row align-items-center justify-content-end">
								<div class="wishlist_icon"><img src="<?php echo base_url(); ?>assets/images/heart.png" alt=""></div>
								<div class="wishlist_content">
									<div class="wishlist_text"><a href="#">Wishlist</a></div>
									<div class="wishlist_count">115</div>
								</div>
							</div>

							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<img src="<?php echo base_url(); ?>assets/images/cart.png" alt="">
										<div class="cart_count"><span>10</span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="#">Cart</a></div>
										<div class="cart_price">Rs. 85</div>
										<!-- ₹ -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
    <div style="
    height:30px;
    padding: 5px;
    box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
    border-radius: 20px;
    text-align:center;
    border:1px solid #df3b3b;
	margin-left:auto;
	margin-right:auto;
	background-color:#0e8ce4;
	margin-bottom:5px;
    ";>
	<marquee  behavior="alternate" onmouseover="this.stop();" onmouseout="this.start();">
         <?php $res = $this->db->get("marquee")->result();?>
         <?php foreach($res as $row):?>
		 <h4 style="color:white;">
             <?php echo $row->notice; ?>
			 </h4>
         <?php endforeach;?>
     </marquee>
	 </div>
	 </div>

		<!-- Main Navigation -->

		<nav class="main_nav">
			<div class="container">
				<div class="row">
					<div class="col">

						<div class="main_nav_content d-flex flex-row">

							<!-- Categories Menu -->

							<div class="cat_menu_container">
								<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
									<div class="cat_burger"><span></span><span></span><span></span></div>
									<div class="cat_menu_text">categories</div>
								</div>

								<ul class="cat_menu">
									<li><a href="#">Computers & Laptops <i class="fas fa-chevron-right ml-auto"></i></a></li>
									<li><a href="#">Comming Soon..<i class="fas fa-chevron-right"></i></a></li>
									<li class="hassubs">
										<a href="#">Comming Soon..<i class="fas fa-chevron-right"></i></a>
										<ul>
											<li class="hassubs">
												<a href="#">Comming Soon..<i class="fas fa-chevron-right"></i></a>
												<ul>
													<li><a href="#">Comming Soon..<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="#">Comming Soon..<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="#">Comming Soon..<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="#">Comming Soon..<i class="fas fa-chevron-right"></i></a></li>
												</ul>
											</li>
											<li><a href="#">Comming Soon..<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Comming Soon..<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Comming Soon..<i class="fas fa-chevron-right"></i></a></li>
										</ul>
									</li>
									<li><a href="#">Comming Soon..<i class="fas fa-chevron-right"></i></a></li>
									<li><a href="#">Comming Soon..<i class="fas fa-chevron-right"></i></a></li>
									<li><a href="#">Comming Soon..<i class="fas fa-chevron-right"></i></a></li>
									<li><a href="#">Comming Soon..<i class="fas fa-chevron-right"></i></a></li>
									<li><a href="#">Comming Soon..<i class="fas fa-chevron-right"></i></a></li>
									<li><a href="#">Comming Soon..<i class="fas fa-chevron-right"></i></a></li>
								</ul>
							</div>

							<!-- Main Nav Menu -->

							<div class="main_nav_menu ml-auto">
								<ul class="standard_dropdown main_nav_dropdown">
									<li><a href="<?php echo base_url();?>">Home<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="<?php echo base_url(); ?>index.php/welcome/blog">Plan & Details<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="<?php echo base_url(); ?>index.php/welcome/contact">Contact Us<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="<?php echo base_url();?>cashonsoft/index.php/welcome/login">Login/Registration<i class="fa fa-angle-down"></i></a></li>
									<!-- <li class="hassubs">
										<a href="#">Super Deals<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li>
												<a href="#">Comming Soon..<i class="fas fa-chevron-down"></i></a>
												<ul>
													<li><a href="#">Comming Soon..<i class="fas fa-chevron-down"></i></a></li>
													<li><a href="#">Comming Soon..<i class="fas fa-chevron-down"></i></a></li>
													<li><a href="#">Comming Soon..<i class="fas fa-chevron-down"></i></a></li>
												</ul>
											</li>
											<li><a href="#">Comming Soon..<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="#">Comming Soon..<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="#">Comming Soon..<i class="fas fa-chevron-down"></i></a></li>
										</ul>
									</li> -->
									<!-- <li class="hassubs">
										<a href="#">Featured Brands<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li>
												<a href="#">Comming Soon..<i class="fas fa-chevron-down"></i></a>
												<ul>
													<li><a href="#">Comming Soon..<i class="fas fa-chevron-down"></i></a></li>
													<li><a href="#">Comming Soon..<i class="fas fa-chevron-down"></i></a></li>
													<li><a href="#">Comming Soon..<i class="fas fa-chevron-down"></i></a></li>
												</ul>
											</li>
											<li><a href="#">Comming Soon..<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="#">Comming Soon..<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="#">Comming Soon..<i class="fas fa-chevron-down"></i></a></li>
										</ul>
									</li> -->
									<!-- <li class="hassubs">
										<a href="#">Pages<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a href="<?php echo base_url(); ?>index.php/welcome/shop">Shop<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="<?php echo base_url(); ?>index.php/welcome/product">Product<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="<?php echo base_url(); ?>index.php/welcome/blog">Blog<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="<?php echo base_url(); ?>index.php/welcome/blog_simple">Blog Post<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="<?php echo base_url(); ?>index.php/welcome/regular">Regular Post<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="<?php echo base_url(); ?>index.php/welcome/cart">Cart<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="<?php echo base_url(); ?>index.php/welcome/contact">Contact<i class="fas fa-chevron-down"></i></a></li>
										</ul>
									</li> -->
									
								</ul>
							</div>

							<!-- Menu Trigger -->

							<div class="menu_trigger_container ml-auto">
								<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
									<div class="menu_burger">
										<div class="menu_trigger_text">menu</div>
										<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</nav>

		<!-- Menu -->

		<div class="page_menu">
			<div class="container">
				<div class="row">
					<div class="col">

						<div class="page_menu_content">

							<!-- <div class="page_menu_search">
								<form action="#">
									<input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
								</form>
							</div> -->
							<ul class="page_menu_nav">
								<!-- <li class="page_menu_item has-children">
									<a href="#">Language<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li> -->
								<!-- <li class="page_menu_item has-children">
									<a href="#">Currency<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li> -->
								<li class="page_menu_item">
									<a href="<?php echo base_url();?>">Home<i class="fa fa-angle-down"></i></a>
								</li>
								<!-- <li class="page_menu_item has-children">
									<a href="#">Super Deals<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">Super Deals<i class="fa fa-angle-down"></i></a></li>
										<li class="page_menu_item has-children">
											<a href="#">Comming Soon..<i class="fa fa-angle-down"></i></a>
											<ul class="page_menu_selection">
												<li><a href="#">Comming Soon..<i class="fa fa-angle-down"></i></a></li>
												<li><a href="#">Comming Soon..<i class="fa fa-angle-down"></i></a></li>
												<li><a href="#">Comming Soon..<i class="fa fa-angle-down"></i></a></li>
												<li><a href="#">Comming Soon..<i class="fa fa-angle-down"></i></a></li>
											</ul>
										</li>
										<li><a href="#">Comming Soon..<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Comming Soon..<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Comming Soon..<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li> -->
								<!-- <li class="page_menu_item has-children">
									<a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Comming Soon..<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Comming Soon..<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Comming Soon..<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li> -->
								<!-- <li class="page_menu_item has-children">
									<a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">Trending Styles<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Comming Soon..<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Comming Soon..<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Comming Soon..<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li> -->
								<li class="page_menu_item"><a href="<?php echo base_url();?>index.php/welcome/blog">Plan & Details<i class="fa fa-angle-down"></i></a></li>
								<li class="page_menu_item"><a href="<?php echo base_url();?>/cashonsoft/index.php/welcome/login">Login/Registration<i class="fa fa-angle-down"></i></a></li>
								<li class="page_menu_item"><a href="<?php echo base_url(); ?>index.php/welcome/contact">contact<i class="fa fa-angle-down"></i></a></li>
							</ul>

							<div class="menu_contact">
								<div class="menu_contact_item"><div class="menu_contact_icon"><img src="<?php echo base_url(); ?>assets/images/phone_white.png" alt=""></div>9140650783</div>
								<div class="menu_contact_item"><div class="menu_contact_icon"><img src="<?php echo base_url(); ?>assets/images/mail_white.png" alt=""></div><a href="mailto:cashonwallet@gmail.com">cashonwallet@gmail.com</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</header>