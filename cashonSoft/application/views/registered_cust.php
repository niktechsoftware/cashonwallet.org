<section class="register-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Registered Successfully</h2>
                <div class="theme-card">

                    <p>Dear <?php echo $fetch_data->customer_name;?></p>
                    <p> Your username is <strong><?php echo $fetch_data->username; ?></strong></p>
                   <p> Your Passward is <strong><?php echo $fetch_data->password; ?></strong></p>
                  <p> Registration message will send  to your Registerd mobile no <?php echo $fetch_data->mobilenumber; ?></br>
                   Please Login and make payment for Activate your account</p>
                   <button class="btn btn-danger" onclick="location.href='<?php echo base_url();?>index.php/welcome/login'"> Login </button>
                </div>
            </div>
        </div>
    </div>
</section>