<!--section start-->
<section class="login-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3>Login</h3>
                <?php 
             /*  $is_login = $this->session->userdata('is_login');
		$is_lock = $this->session->userdata('is_lock');
		$logtype = $this->session->userdata('login_type');
                	if($is_login):
				redirect('/welcome/login');
		else:
		
		endif;*/
                
                if($this->uri->segment(3))
                {
                echo "Success";
                }?>
                <div class="theme-card">
                    <form class="theme-form" method="post"
                        action="<?= base_url() ?>index.php/welcome/authentication.cash">
                        <div class="form-group">

                            <label for="email">Username </label>
                            <input type="text" class="form-control" id="cusername" name="cusername"
                                placeholder="User Name">
                        </div>
                        <div class="form-group">
                            <label for="review">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" >
                           <div  style="text-align:right;">
                            <a href="<?php echo base_url(); ?>index.php/welcome/forgotpassword"  style="color:blue;" id="show">Forgot Password</a>
                            </div>
                        </div>

                        <button class="btn btn-solid " type ="submit">Login</button>
                    </form>
                </div>
            </div>
           
            <div class="col-lg-6 right-login">
                <h3>New Customer</h3>
                <div class="theme-card authentication-right">
                    <h6 class="title-font">Create A Account</h6>
                    <p>Sign up for a free account at our store. Registration is quick and easy. It allows you to be able
                        to order from our shop. To start shopping click register.</p>
                    <a href="<?php echo base_url();?>index.php/welcome/registration" class="btn btn-solid">Create an
                        Account</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->