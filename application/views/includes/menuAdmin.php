
<div class="menu-right pull-right">
    <div>
        <nav id="main-nav">
            <div class="toggle-nav">
                <i class="fa fa-bars sidebar-bar"></i>
            </div>
            <!-- Horizontal menu -->
            <div class="row">
            <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                <li>
                    <div class="mobile-back text-right"> Back<i class="fa fa-angle-right pl-2" aria-hidden="true"></i>
                    </div>
                </li>
               
                <li class="mega"><a href="<?php echo base_url(); ?>index.php/welcome">Home</a>   </li>
                  
                  <li ><a href="<?php echo base_url(); ?>index.php/welcome/plans_and_detail">Plans & Details</a></li>
                 <li class="mega"><a href="<?php echo base_url(); ?>index.php/welcome/product_show">products</a> </li>
               
                  <li><a href="<?php echo base_url(); ?>index.php/welcome/about">About Us</a></li>

                   
                <li class="mega"><a href="<?php echo base_url(); ?>index.php/welcome/contact">Contact Us</a></li>
				<?php if(!$this->session->userdata("customer_id")):?>
                 <li class="mega"><a href="<?php echo base_url(); ?>index.php/welcome/login">Login/Register</a></li>
                    <!--<li class="mega"><a href="<?php// echo base_url(); ?>admin">Admin Login</a></li>-->
                <?php else: ?>
                	<li class="mega"><a href="<?php echo base_url(); ?>index.php/welcome/logout">Logout</a></li>
				<?php endif?>
            </ul>
        </div>
        </nav>
    </div>
</div>
</header>

                    <!--  <ul class="mega-menu  home-menu">
               <li>
                            <div class="container">
                                                    <div class="row">
                                                        <div class="col-xl-6 mega-box">
                                                            <div class="link-section">
                                                                <div class="demo">
                                                                    <ul>
                                                                        <li><a target="_blank" href="index-2.html"><span>fashion 01<img src="<?php echo base_url(); ?>assets/images/demo-img/1.png" alt=""></span></a></li>
                                                                        <li><a target="_blank" href="fashion-2.html"><span>fashion 02<img src="<?php echo base_url(); ?>assets/images/demo-img/2.png" alt=""></span></a></li>
                                                                        <li><a target="_blank" href="fashion-3.html"><span>fashion 03<img src="<?php echo base_url(); ?>assets/images/demo-img/3.png" alt=""></span></a></li>
                                                                        <li><a target="_blank" href="shoes.html"><span>shoes<img src="<?php echo base_url(); ?>assets/images/demo-img/4.png" alt=""></span></a></li>
                                                                        <li><a target="_blank" href="bags.html"><span>bag<img src="<?php echo base_url(); ?>assets/images/demo-img/5.png" alt=""></span></a></li>
                                                                        <li><a target="_blank" href="watch.html"><span>watch<img src="<?php echo base_url(); ?>assets/images/demo-img/6.png" alt=""></span></a></li>
                                                                        <li><a target="_blank" href="kids.html"><span>kids<img src="<?php echo base_url(); ?>assets/images/demo-img/7.png" alt=""></span></a></li>
                                                                        <li><a target="_blank" href="flower.html"><span>flower<img src="<?php echo base_url(); ?>assets/images/demo-img/8.png" alt=""></span></a></li>
                                                                        <li><a target="_blank" href="nursery.html"><span>nursery<img src="<?php echo base_url(); ?>assets/images/demo-img/9.png" alt=""></span></a></li>
                                                                        <li><a target="_blank" href="vegetables.html"><span>vegetable<img src="<?php echo base_url(); ?>assets/images/demo-img/10.png" alt=""></span></a></li>
                                                                        <li><a target="_blank" href="beauty.html"><span>beauty products<img src="<?php echo base_url(); ?>assets/images/demo-img/11.png" alt=""></span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 mega-box">
                                                            <div class="link-section">
                                                                <div class="demo">
                                                                    <ul>
                                                                        <li><a target="_blank" href="instagram-shop.html"><span>instagram shop<img src="<?php echo base_url(); ?>assets/images/demo-img/12.png" alt=""></span></a></li>
                                                                        <li><a target="_blank" href="lookbook-demo.html"><span>lookbook<img src="<?php echo base_url(); ?>assets/images/demo-img/13.png" alt=""></span></a></li>
                                                                        <li><a target="_blank" href="light.html"><span>light<img src="<?php echo base_url(); ?>assets/images/demo-img/14.png" alt=""></span></a></li>
                                                                        <li><a target="_blank" href="full-page.html"><span>full page<img src="<?php echo base_url(); ?>assets/images/demo-img/15.png" alt=""></span></a></li>
                                                                        <li><a target="_blank" href="electronic-1.html"><span>electronics 01<img src="<?php echo base_url(); ?>assets/images/demo-img/16.png" alt=""></span></a></li>
                                                                        <li><a target="_blank" href="electronic-2.html"><span>electronics 02<img src="<?php echo base_url(); ?>assets/images/demo-img/17.png" alt=""></span></a></li>
                                                                        <li><a target="_blank" href="video.html"><span>video<img src="<?php echo base_url(); ?>assets/images/demo-img/18.png" alt=""></span></a></li>
                                                                        <li><a target="_blank" href="goggles.html"><span>goggles<img src="<?php echo base_url(); ?>assets/images/demo-img/19.png" alt=""></span></a></li>
                                                                        <li><a target="_blank" href="parallax.html"><span>parallax<img src="<?php echo base_url(); ?>assets/images/demo-img/20.png" alt=""></span></a></li>
                                                                        <li><a target="_blank" href="furniture.html"><span>furniture<img src="<?php echo base_url(); ?>assets/images/demo-img/21.png" alt=""></span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>-->
             

                                   
                

                                              
                                     

                                       <!--  <ul >
                                            <li><a href="<?php echo base_url();?>index.php/welcome/daily"><strong>1.</strong>Daily Base Income</a></li>
                                            <li><a href="<?php echo base_url();?>index.php/welcome/PAIR"><strong>2.</strong>Pair Matching Income</a></li>
                                            <li><a href="<?php echo base_url();?>index.php/welcome/POOL_view"><strong>3.</strong>Pool Income</a></li>
                                            <li><a href="<?php echo base_url();?>index.php/welcome/notime"><strong>4.</strong>No Time Reward</a></li>
                                            <li><a href="<?php echo base_url();?>index.php/welcome/BusinessPlan"><strong>5.</strong>Business Plan</a></li>
                                           <!--  <li><a href="<?php echo base_url();?>index.php/welcome/ROULTY"><strong>6.</strong>Roulty Income</a></li>
 
                                        </ul>-->


              
                    <!-- <ul>
                                            <li><a href="about-page.html">about us</a></li>
                                            <li><a href="404.html">404</a></li>
                                            <li><a href="lookbook.html">lookbook</a></li>
                                            <li><a href="login.html">login</a></li>
                                            <li><a href="register.html">register</a></li>
                                            <li><a href="search.html">search</a></li>
                                            <li><a href="wishlist.html">wishlist</a></li>
                                            <li><a href="cart.html">cart</a></li>
                                            <li><a href="collection.html">collection</a></li>
                                            <li><a href="forget_pwd.html">forget password</a></li>
                                            <li><a href="contact.html">contact</a></li>
                                             <li><a href="checkout.html">checkout</a></li>
                                            <li><a href="compare.html">compare</a></li>
                                            <li><a href="order-success.html">order success</a></li>
                                                <li><a href="dashboard.html">Dashboard</a></li>
                                            <li><a href="faq.html">FAQ</a></li>
                                       

                </li>
                <li class="mega"><a href="<?php echo base_url(); ?>index.php/welcome/contact">Contact Us</a>

                 <li class="mega"><a href="<?php echo base_url(); ?>index.php/welcome/login">Login/Register</a>
                   <!--  <li class="mega"><a href="<?php echo base_url(); ?>admin">Admin Login</a> -->


                    <!-- <ul class="mega-menu full-mega-menu">
                                            <li>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col mega-box">
                                                            <div class="link-section">
                                                                <div class="menu-title"><h5>mens's fashion</h5></div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <li><a href="#">sports wear</a></li>
                                                                        <li><a href="#">top</a></li>
                                                                        <li><a href="#">bottom</a></li>
                                                                        <li><a href="#">ethic wear</a></li>
                                                                        <li><a href="#">sports wear</a></li>
                                                                        <li><a href="#">shirts</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col mega-box">
                                                            <div class="link-section">
                                                                <div class="menu-title"><h5>women's fashion</h5></div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <li><a href="#">dresses</a></li>
                                                                        <li><a href="#">skirts</a></li>
                                                                        <li><a href="#">westarn wear</a></li>
                                                                        <li><a href="#">ethic wear</a></li>
                                                                        <li><a href="#">sport wear</a></li>
                                                                        <li><a href="#">bottom wear</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col mega-box">
                                                            <div class="link-section">
                                                                <div class="menu-title"><h5>kids's fashion</h5></div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <li><a href="#">sports wear</a></li>
                                                                        <li><a href="#">ethic wear</a></li>
                                                                        <li><a href="#">sports wear</a></li>
                                                                        <li><a href="#">top</a></li>
                                                                        <li><a href="#">bottom</a></li>
                                                                        <li><a href="#">ethic wear</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col mega-box">
                                                            <div class="link-section">
                                                                <div class="menu-title"><h5>Accessories</h5></div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <li><a href="#">fashion jewellery</a></li>
                                                                        <li><a href="#">caps and hats</a></li>
                                                                        <li><a href="#">precious jewellery</a></li>
                                                                        <li><a href="#">necklaces</a></li>
                                                                        <li><a href="#">earrings</a></li>
                                                                        <li><a href="#">wrist wear</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col mega-box">
                                                            <div class="link-section">
                                                                <div class="menu-title"><h5>men's accessories</h5></div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <li><a href="#">ties</a></li>
                                                                        <li><a href="#">cufflinks</a></li>
                                                                        <li><a href="#">pockets squares</a></li>
                                                                        <li><a href="#">helmets</a></li>
                                                                        <li><a href="#">scarves</a></li>
                                                                        <li><a href="#">phone cases</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row banner-padding">
                                                    <div class="col-xl-6">
                                                        <a href="#" class="mega-menu-banner"><img src="<?php echo base_url(); ?>assets/images/mega-menu/1.jpg" class="img-fluid d-none d-xl-block " alt=""></a>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <a href="#" class="mega-menu-banner"><img src="<?php echo base_url(); ?>assets/images/mega-menu/2.jpg" class="img-fluid d-none d-xl-block" alt=""></a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>-->
          
        <!-- <div class="icon-nav">
            <ul>
                <li class="onhover-div mobile-search">
                    <div><img src="<?php echo base_url(); ?>assets/images/icon/search.png" onclick="openSearch()"
                            class="img-fluid" alt="">
                        <i class="icon-search" onclick="openSearch()"></i></div>
                    <div id="search-overlay" class="search-overlay">
                        <div>

                            <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>

                            <div class="overlay-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <form>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                                        placeholder="Search a Product">
                                                </div>
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="fa fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="onhover-div mobile-setting">
                    <div><img src="<?php echo base_url(); ?>assets/images/icon/setting.png" class="img-fluid" alt="">
                        <i class="icon-settings"></i></div>
                    <!-- <div class="show-div setting">
                                            <h6>language</h6>
                                            <ul>
                                                <li><a href="#">english</a> </li>
                                                <li><a href="#">french</a> </li>
                                            </ul>
                                            <h6>currency</h6>
                                            <ul class="list-inline">
                                                <li><a href="#">euro</a> </li>
                                                <li><a href="#">rupees</a> </li>
                                                <li><a href="#">pound</a> </li>
                                                <li><a href="#">doller</a> </li>
                                            </ul>
                                        </div>-->
                <!-- </li>
                <li class="onhover-div mobile-cart">
                    <div><img src="<?php echo base_url(); ?>assets/images/icon/cart.png" class="img-fluid" alt="">
                        <i class="icon-shopping-cart"></i></div> -->
                    <!-- <ul class="show-div shopping-cart">
                                            <li>
                                                <div class="media">
                                                    <a href="#"><img class="mr-3" src="<?php echo base_url(); ?>assets/images/fashion/product/1.jpg" alt="Generic placeholder image"></a>
                                                    <div class="media-body">
                                                        <a href="#"><h4>item name</h4></a>
                                                        <h4><span>1 x $ 299.00</span></h4>
                                                    </div>
                                                </div>
                                                <div class="close-circle">
                                                    <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="media">
                                                    <a href="#"><img class="mr-3" src="<?php echo base_url(); ?>assets/images/fashion/product/2.jpg" alt="Generic placeholder image"></a>
                                                    <div class="media-body">
                                                        <a href="#"><h4>item name</h4></a>
                                                        <h4><span>1 x $ 299.00</span></h4>
                                                    </div>
                                                </div>
                                                <div class="close-circle">
                                                    <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="total">
                                                    <h5>subtotal : <span>$299.00</span></h5>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="buttons">
                                                    <a href="cart.html" class="view-cart">view cart</a>
                                                    <a href="#" class="checkout">checkout</a>
                                                </div>
                                            </li>
                                        </ul>-->
                <!-- </li>
            </ul>
        </div> -->
   
<!-- header end -->