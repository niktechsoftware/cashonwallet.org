<section class="section-b-space">
    <div class="container">
        <div class="row">
            <?php $this->load->view("dashboardmenu");?>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">
                        <div class="row">
                            <div class="col-8 page-title">
                                <!--<div style="font-size:35px;"><?php echo $this->session->userdata("name"); ?>'s <h2 class="btn bg-danger text-white">My Card</h2> </div>-->
                                 <h6 class="btn bg-danger text-white">My Card</h6>
                            </div>
                            <?php $this->load->view("mpindrop");?>
                        </div>
                            <div>

                                <h3> Your Product contend here </h3>


                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

</section>



<!-- <section class="section-b-space">
      <div class="container">
        <div class="row">
          <?php //$this->load->view("dashboardmenu");?>
          <?php //$loginType = $this->session->userdata("login_type");
                         
               // $this->db->where("id",$this->session->userdata("customer_id"));
               // $data= $this->db->get("customer_info")->row();
          ?>

          <div class="col-lg-9">
            <div class="dashboard-right">
              <div class="dashboard">
                <div class="row">
                  <div class="card-content table-full-width over">
                    <div class="panel-body">
                      <table id="tblroiincome" class="table table-striped table-bordered" cellspacing="0"   
                        width="100%">
                        <thead style="font-size: 12px; font-family: 'PT Sans', sans-serif;">
                          <tr>
                            <th>Sr. No.</th>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Left</th>
                            <th>Right</th>
                            <th>Matching</th>
                            <th>Binary Income</th>
                            <th>Flushing Amount</th>
                            <th>Date</th>
                          </tr>
                          </thead>
                          <tbody id="ditab">
                            <tr>
                              <td>1</td>
                              <td>132380</td>
                              <td>DHARMEHNDRA KUMAR </td>
                              <td>500</td>
                              <td>500</td>
                              <td>500</td>
                              <td>100.0000</td>
                              <td>0</td>
                              <td>04 Jan 2019</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div> 
            </div>
          </div>
        </div>
     
    </section> -->




<!-- <section class="section-b-space p-t-0">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="theme-tab">
<<<<<<< HEAD
=======
                    <ul class="tabs tab-title">
                        <li class="current">
                           <!-- <a href="tab-4.html">New Products </a> -->
         <!--               </li>
                        
                    </ul>

                    <div class="tab-content-cls">
                        <div id="tab-4" class="tab-content active default" >
                            <div class=" no-slider row">
                                <div class="product-box">
                                    <div class="img-wrapper">

                                        <div class="front">
                                            <a href="#"><img src="<?php echo base_url(); ?>assets/sliderimage/product1.jpg" class="img-fluid" alt=""></a>
                                        </div>
                                        <div class="back">
                                            <a href="#"><img src="<?php echo base_url(); ?>assets/sliderimage/product1.jpg" class="img-fluid" alt=""></a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <button  title="Add to cart"><i class="icon-shopping-cart" ></i></button>
                                            <a href="javascript:void(0)"  title="Add to Wishlist"><i class="icon-heart" aria-hidden="true"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i class="icon-search" aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="icon-reload" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-detail">
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a href="#"><h6> Anti Rediation Chip</h6></a>
                                        <h4><span> Price-699/-</span></h4>
                                        <ul class="color-variant">
                                            <li class="bg-light0"></li>
                                            <li class="bg-light1"></li>
                                            <li class="bg-light2"></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            
                                        </div>
                                        <div class="front">
                                            <a href="#"><img src="<?php echo base_url(); ?>assets/sliderimage/product2.jpg" class="img-fluid" alt=""></a>
                                        </div>
                                        <div class="back">
                                            <a href="#"><img src="<?php echo base_url(); ?>assets/sliderimage/product2.jpg" class="img-fluid" alt=""></a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <button  title="Add to cart"><i class="icon-shopping-cart" ></i></button>
                                            <a href="javascript:void(0)"  title="Add to Wishlist"><i class="icon-heart" aria-hidden="true"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i class="icon-search" aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="icon-reload" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-detail">
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a href="#"><h6> Anti Rediation Chip</h6></a>
                                      <h4><span> Price-699/-</span></h4>
                                        <ul class="color-variant">
                                            <li class="bg-light0"></li>
                                            <li class="bg-light1"></li>
                                            <li class="bg-light2"></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="front">
                                            <a href="#"><img src="<?php echo base_url(); ?>assets/sliderimage/product3.jpg" class="img-fluid" alt=""></a>
                                        </div>
                                        <div class="back">
                                            <a href="#"><img src="<?php echo base_url(); ?>assets/sliderimage/product3.jpg"class="img-fluid" alt=""></a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <button  title="Add to cart"><i class="icon-shopping-cart" ></i></button>
                                            <a href="javascript:void(0)"  title="Add to Wishlist"><i class="icon-heart" aria-hidden="true"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i class="icon-search" aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="icon-reload" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-detail">
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a href="#"><h6> Anti Rediation Chip</h6></a>
                                       <h4><span> Price-699/-</span></h4>
                                        <ul class="color-variant">
                                            <li class="bg-light0"></li>
                                            <li class="bg-light1"></li>
                                            <li class="bg-light2"></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            
                                        </div>
                                        <div class="front">
                                            <a href="#"><img src="<?php echo base_url(); ?>assets/sliderimage/product1.jpg" class="img-fluid" alt=""></a>
                                        </div>
                                        <div class="back">
                                            <a href="#"><img src="<?php echo base_url(); ?>assets/sliderimage/product1.jpg" class="img-fluid" alt=""></a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <button  title="Add to cart"><i class="icon-shopping-cart" ></i></button>
                                            <a href="javascript:void(0)"  title="Add to Wishlist"><i class="icon-heart" aria-hidden="true"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i class="icon-search" aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="icon-reload" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-detail">
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a href="#"><h6> Anti Rediation Chip</h6></a>
                                      <h4><span> Price-699/-</span></h4>
                                        <ul class="color-variant">
                                            <li class="bg-light0"></li>
                                            <li class="bg-light1"></li>
                                            <li class="bg-light2"></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">

                                        <div class="lable-block">
                                            
                                        </div>
                                        <div class="front">
                                            <a href="#"><img src="<?php echo base_url(); ?>assets/sliderimage/product2.jpg" class="img-fluid" alt=""></a>
                                        </div>
                                        <div class="back">
                                            <a href="#"><img src="<?php echo base_url(); ?>assets/sliderimage/product2.jpg" class="img-fluid" alt=""></a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <button  title="Add to cart"><i class="icon-shopping-cart" ></i></button>
                                            <a href="javascript:void(0)"  title="Add to Wishlist"><i class="icon-heart" aria-hidden="true"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i class="icon-search" aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="icon-reload" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-detail">
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a href="#"><h6> Anti Rediation Chip</h6></a>
                                      <h4><span> Price-699/-</span></h4>
                                        <ul class="color-variant">
                                            <li class="bg-light0"></li>
                                            <li class="bg-light1"></li>
                                            <li class="bg-light2"></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="front">
                                            <a href="#"><img src="<?php echo base_url(); ?>assets/sliderimage/product2.jpg" class="img-fluid" alt=""></a>
                                        </div>
                                        <div class="back">
                                            <a href="#"><img src="<?php echo base_url(); ?>assets/sliderimage/product2.jpg" class="img-fluid" alt=""></a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <button  title="Add to cart"><i class="icon-shopping-cart" ></i></button>
                                            <a href="javascript:void(0)"  title="Add to Wishlist"><i class="icon-heart" aria-hidden="true"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i class="icon-search" aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="icon-reload" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-detail">
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a href="#"><h6> Anti Rediation Chip</h6></a>
                                       <h4><span> Price-699/-</span></h4>
                                        <ul class="color-variant">
                                            <li class="bg-light0"></li>
                                            <li class="bg-light1"></li>
                                            <li class="bg-light2"></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            
                                        </div>
                                        <div class="front">
                                            <a href="#"><img src="<?php echo base_url(); ?>assets/sliderimage/product3.jpg" class="img-fluid" alt=""></a>
                                        </div>
                                        <div class="back">
                                            <a href="#"><img src="<?php echo base_url(); ?>assets/sliderimage/product3.jpg" class="img-fluid" alt=""></a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <button  title="Add to cart"><i class="icon-shopping-cart" ></i></button>
                                            <a href="javascript:void(0)"  title="Add to Wishlist"><i class="icon-heart" aria-hidden="true"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i class="icon-search" aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="icon-reload" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-detail">
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a href="#"><h6> Anti Rediation Chip</h6></a>
                                       <h4><span> Price-699/-</span></h4>
                                        <ul class="color-variant">
                                            <li class="bg-light0"></li>
                                            <li class="bg-light1"></li>
                                            <li class="bg-light2"></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="front">
                                            <a href="#"><img src="<?php echo base_url(); ?>assets/sliderimage/product1.jpg" class="img-fluid" alt=""></a>
                                        </div>
                                        <div class="back">
                                            <a href="#"><img src="<?php echo base_url(); ?>assets/sliderimage/product1.jpg" class="img-fluid" alt=""></a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <button  title="Add to cart"><i class="icon-shopping-cart" ></i></button>
                                            <a href="javascript:void(0)"  title="Add to Wishlist"><i class="icon-heart" aria-hidden="true"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i class="icon-search" aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="icon-reload" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-detail">
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a href="#"><h6> Anti Rediation Chip</h6></a>
                                         <h4><span> Price-699/-</span></h4>
                                        <ul class="color-variant">
                                            <li class="bg-light0"></li>
                                            <li class="bg-light1"></li>
                                            <li class="bg-light2"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->