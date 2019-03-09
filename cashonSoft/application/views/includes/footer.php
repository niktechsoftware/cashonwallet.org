<!--footer start -->
<footer class="footer-light">
   

    <section class="section-b-space light-layout">
        <div class="container">
            <div class="row footer-theme partition-f">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-title footer-mobile-title">
                        <h4>about</h4>
                    </div>
                    <div class="footer-contant">
                        <div class="footer-logo">
                            <img src="<?php echo base_url(); ?>assets/images/icon/logo.png" alt="">
                        </div>
                        <p>Cash on Wallet is India's largest mobile payment platform that places the second mobile revolution of the country into your hands.<a href="<?php echo base_url(); ?>index.php/welcome/about">Read more...</a> </p>
                        <div class="footer-social">
                            <ul>
                                <li>
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col offset-xl-1">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>my account</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                <li><a href="#">Wallet</a></li>
                                <li><a href="#">Join Tree</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/welcome/login">New Joiner</a></li>
                                <li><a href="#">MY Profile</a></li>
                                
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>why we choose</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                <!--<li><a href="#">shipping & return</a></li>-->
                                <li><a href="#">secure shopping</a></li>
                                <li><a href="#">Gallery</a></li>
                                <!-- <li><a href="#">affiliates</a></li> -->
                                <li><a href="<?php echo base_url();?>index.php/welcome/contact">Contact Us</a></li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>store information</h4>
                        </div>
                        <div class="footer-contant">
                            <ul class="contact-list">
                                <li><i class="fa fa-map-marker"></i>NH 28 Near Tahsil Gate, Tamkuhi Raj Kushinagar, Uttar Pradesh.</li>
                                <li><i class="fa fa-phone"></i>Call Us: 9140650783 , 7068171719 </li>
                                <li><i class="fa fa-envelope-o"></i>Email Us: cashonwallet@gmail.com</li>
                                <!-- <li><i class="fa fa-fax"></i>Fax: 123456</li> --> 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="footer-end">
                        <p><i class="fa fa-copyright" aria-hidden="true"></i><a href="#" style="color:skyblue;height: 10px;width:10px;">  2019-20 CashOn Wallet</a><strong>  </strong></p>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="payment-card-bottom">
                        <ul>
                            <li>
                                <a href="#"><img src="<?php echo base_url(); ?>assets/images/icon/visa.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="<?php echo base_url(); ?>assets/images/icon/mastercard.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="<?php echo base_url(); ?>assets/images/icon/paypal.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="<?php echo base_url(); ?>assets/images/icon/american-express.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="<?php echo base_url(); ?>assets/images/icon/discover.png" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php echo $this->load->view($footerJs); ?>
