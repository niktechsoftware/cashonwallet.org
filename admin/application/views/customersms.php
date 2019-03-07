<div id="main-wrapper" class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">

            <form class="theme-form" action="<?php echo base_url(); ?>index.php/sms/all"
                        method="post">
            	<div class="panel-body">
            		<div class="row">
            			<div class="col-md-12">
            				 <h3 style="text-align:center;font-size:20px;">Type your sms Content in Text box.</h3><br /> 
                             <div class="col-md-2">
                            </div> 
                             <div class="col-md-8 btn btn-warning"> 
                             <span style="font-size:20px;"><?php echo "Your SMS Balance=".checkBalSms();?></span>
                            </div> <br>
                            <br><br><br>
                            <div class="col-md-12"> 
                            <div class="col-md-2">
                            </div> 
                            <div class="col-md-7">  
                            <textarea  name="smstoall" id="sms" class="form-control" rows="8" cols="20" > </textarea> 
                            </div> 
                           
                            <div class="col-md-3"> 
                            <br>
                            <br>
                            <br>
                            <input type="submit" name="send"  id="send" value="Send SMS " class="btn btn-success" />   
                            </div> 
            			</div>
                        </div>
            		</div>
            
                </div>
                </form>
            </div>
        </div>
    </div><!-- Row -->
</div><!-- Main Wrapper -->