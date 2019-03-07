<html xmlns="http://www.w3.org/1999/xhtml">
<style>
.tba {
    background: url(img_flwr.gif);
    background-size: 80px 60px;
    background-repeat: no-repeat;
}
</style>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Sale Invoice</title>
	
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/style.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/print.css' media="print" />
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/example.js'></script>

	
	 <script>
        function convert_number(number)
        {
            if ((number < 0) || (number > 999999999))
            {
                return "Number is out of range";
            }
            var Gn = Math.floor(number / 10000000);  /* Crore */
            number -= Gn * 10000000;
            var kn = Math.floor(number / 100000);     /* lakhs */
            number -= kn * 100000;
            var Hn = Math.floor(number / 1000);      /* thousand */
            number -= Hn * 1000;
            var Dn = Math.floor(number / 100);       /* Tens (deca) */
            number = number % 100;               /* Ones */
            var tn= Math.floor(number / 10);
            var one=Math.floor(number % 10);
            var res = "";

            if (Gn>0){
                res += (convert_number(Gn) + " Crore");
            }
            if (kn>0){
                res += (((res=="") ? "" : " ") +
                    convert_number(kn) + " Lakhs");
            }
            if (Hn>0){
                res += (((res=="") ? "" : " ") +
                    convert_number(Hn) + " Thousand");
            }

            if (Dn){
                res += (((res=="") ? "" : " ") +
                    convert_number(Dn) + " hundred");
            }


            var ones = Array("", "One", "Two", "Three", "Four", "Five", "Six","Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen","Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen","Nineteen");
            var tens = Array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty","Seventy", "Eigthy", "Ninety");

            if (tn>0 || one>0)
            {
                if (!(res==""))
                {
                    res += " and ";
                }
                if (tn < 2)
                {
                    res += ones[tn * 10 + one];
                }
                else
                {

                    res += tens[tn];
                    if (one>0)
                    {
                        res += ("-" + ones[one]);
                    }
                }
            }

            if (res=="")
            {
                res = "zero";
            }
            return res;
        }

    </script>
</head>

<body>

	<div id="page-wrap">

		<textarea id="header">TAX INVOICE</textarea>
		<table style="width: 100%" class='tba'>

    
			<tr>
				<td  style="border: none;">
					
					<img src="<?php echo base_url();?>assets/images/logo.png" style="width:105px;height:80px;" />
					
				</td>
				<td style="border: none;">
					<h3 align="left" style="text-transform:uppercase; margin-left:50px;"><?php echo $info->business_name; ?></h3>
			        <h4 align="left" style="font-variant:small-caps; margin-left:70px;">
						<?php echo $info->address_2; ?>
			        </h4>
			        <h5 align="left" style="font-variant:small-caps; margin-left:70px;">
						<?php if(strlen($info->phone_number > 0 )){echo "Phone : ".$info->phone_number.", ";} ?>
			            <?php echo "Mobile : ".$info->mobile_number; ?>
			        </h5>
			        
			        </h4>
			        <h5 align="left" style="font-variant:small-caps; margin-left:80px;">
						<?php echo "Email id : ".$info->email1; ?>
			           
			        </h5>
			        
				</td>
			</tr>
		</table>

		 <div id="customer" >
        	<div style="display:inline-block; float:left">
            <table>
           	 <tr><td style="border:none;"><h5><strong>To :</h5></td></tr>
                    
                    	<tr><td style="border:none;"><h5><strong>Name : </strong><?php echo $total_info->customer_name;?></h5></td></tr>
                    
                    
                    	<tr><td style="border:none;"><h5><strong>Address : </strong><?php echo $total_info->current_address;?></h5></td></tr>
                    
                    <tr>
                    	<td style="border:none;"><h5><strong>Mobile No : </strong><?php echo $total_info->mobilenumber;?></h5></td>
                    </tr>
                     <tr>
                    	<td style="border:none;"><h5><strong>Date : </strong><?php echo $pro_detail->date_time;?></h5></td>
                    </tr>
            </table>
			</div>
			
			
			
          
		</div>
			 <table id="items" style="border: 1px solid #000;">
		 <tr style="border: 1px solid #000;">
		       <th width="4%" style="border: 1px solid #000;">No.</th>             
               <th width="30%" style="border: 1px solid #000;">Remark</th>
               <th width="7%" style="border: 1px solid #000;">Amount</th>
                <th width="7%" style="border: 1px solid #000;">Debit/Credit</th>
               <th width="9%" style="border: 1px solid #000;">Invoice Number</th>
               <!--  <th width="5%" style="border: 1px solid #000;">SGST</th> -->
                <!--  <th width="5%" style="border: 1px solid #000;">CGST</th> -->
                <!--   <th width="5%" style="border: 1px solid #000;">IGST</th> -->
               <!--<th width="7%" style="border: 1px solid #000;">Plan Number</th>-->
              
		  </tr>
		 
		  <tr class="item-row"><?php $i=1; ?>
		      <td style="border: 1px solid #000;"><?php echo $i; ?></td>
		     
		    <td style="border: 1px solid #000;">

		    <?php echo $pro_detail->remark;?>
		      </td>
		      <td style="border: 1px solid #000;">
		      	  <?php echo $pro_detail->amount;?>
		      	</td>
		      	 <td style="border: 1px solid #000;">
		      	      <?php  $a=$pro_detail->debit_credit;
		      	      if($a==1)
		      	      {
		      	          echo "Credit";
		      	      }else{
		      	          echo "Debit";
		      	      }
		      	      ?>
		      	    
		      	 </td>
		      	 <td style="border: 1px solid #000;">
		      	      <?php echo $pro_detail->invoice_number;?>
		      	    
		      	 <!--</td>-->
		      	 <!-- <td style="border: 1px solid #000;">-->
		      	 <!--     <?php // echo $pro_detail->plan_number;?>-->
		      	    
		      	 <!--</td>-->
		      	 



		   
</body>

</html>