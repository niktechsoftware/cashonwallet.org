
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Shopping cart</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

</head>
<body>

<div id="bill_info">

		<?php
		$grand_total = 0;
		// Calculate grand total.
		if ($cart = $this->cart->contents()):
		foreach ($cart as $data):
		$grand_total = $grand_total + $data['subtotal'];
		endforeach;
		endif;
		?>     

           <div class="Container" style="margin-top:40px;">
            <div class="row">
                <div class="col-lg-3"></div>
                 <div class="col-lg-6">
            <form name="billing" method="post">  
            <!--action="<?php // echo site_url('welcome/save_order') ?>" -->
           
                <h3 align="center">Customer Details For Order Dispatch</h3></br>
              
                  <span style="font-size:20px;color:red;">Order Total Amount:</span><strong><span style="font-size:20px;color:black;">INR <?php echo $grand_total;?></span></strong></br>
               <span style="font-size:20px;color:green;">Your Name:</span><input type="text" class="form-control" name="name" placeholder="Enter Your Name" required=""/>
                 <span  style="font-size:20px;color:green;">Address:</span><input type="text" class="form-control" name="address"  placeholder="Enter Your Address" required="" />
                <span  style="font-size:20px;color:green;">Email:</span><input type="Email" class="form-control" name="email"  placeholder="Enter Your Email Address" required="" />
                <span  style="font-size:20px;color:green;">Phone:</span><input type="number" class="form-control" name="phone" placeholder="Enter Your Mobile Number" required="" /></br>
                   <input class ='form-control btn btn-success' class="form-control"  type="submit" value="Place Order" />
                      <center><h3> <a class ='fg-button teal' id='back' href="<?php echo site_url(); ?>">Back</a></h3></center>
         
        </form>

        </div>
         <div class="col-lg-3"></div>
        </div>
    </div>
    </div>


</body>
</html>

