<section class="pwd-page section-b-space">
   <div class="container">
       <div class="row">
           <div class="col-lg-6 offset-lg-3">
               <h2>Match OTP</h2>
               <form class="theme-form"  method="post"
                       action="<?= base_url() ?>index.php/welcome/new_password">
                   <div class="form-row">
                       
                       <div class="col-md-12">
                       <input type="text"  class="form-control" id="textotp" name="textotp" placeholder="Enter OTP Here" required="">
                       
                       </div>
                   </div>
                   <button class="btn btn-solid" id="otp">Match OTP</button>
               </form>
           </div>
       </div>
   </div>
</section>
<script>