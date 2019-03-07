<?php echo $this->load->view($headerCss); ?>

<body>
    <!-- pre-loader start -->
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
    <!-- pre-loader end -->
    <!-- header start -->
    <header>
        <?php if($this->session->userdata('is_login')){?>
        <!-- <div class="mobile-fix-option"></div>
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-contact">
                            <ul>
                                <li>Welcome to Our Cash On Wallet & Shopping Mela</li>


                                <li><i class="fa fa-phone"></i>Call Us: 9140650783, 7068171719</li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 text-right">
                        <ul class="header-dropdown">
                             <a href="<?php // echo base_url(); ?>index.php/welcome/login" class="btn btn-solid" tabindex="0">Login/Register</a> 
                            <li class="mobile-wishlist"><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                            <li class="onhover-dropdown mobile-account">
                                <i class="fa fa-user" aria-hidden="true"></i> My Account
                                <ul class="onhover-show-div">
                                    
                                        Condition to check is user login or not, if user login then show Logout tab othewise show Login tab.
                                    --
                                    <?php //if($this->session->userdata('is_login')): ?>
                                        <li>
                                            <a href="<?php // echo base_url();?>index.php/welcome/logout" data-lng="es">
                                                Logout
                                            </a>
                                        </li>
                                    <?php // else: ?>
                                        <li>
                                            <a href="<?php // echo base_url(); ?>index.php/welcome/login" data-lng="en">
                                                Login
                                            </a>
                                        </li>
                                   <?php // endif; ?>

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> -->
        <?php }?>