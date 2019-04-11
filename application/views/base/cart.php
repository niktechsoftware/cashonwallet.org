	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">Shopping Cart</div>
						<div class="cart_items">
							<ul class="cart_list">
								<li class="cart_item clearfix">
									<div class="cart_item_image"><img src="images/shopping_cart.jpg" alt=""></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text">MacBook Air 13</div>
										</div>
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Color</div>
											<div class="cart_item_text"><span style="background-color:#999999;"></span>Silver</div>
										</div>
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Quantity</div>
											<div class="cart_item_text">1</div>
										</div>
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Price</div>
											<div class="cart_item_text">$2000</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Total</div>
											<div class="cart_item_text">$2000</div>
										</div>
									</div>
								</li>
							</ul>
						</div>

                <?php 
                  if(isset($cart) && is_array($cart) && count($cart)){
                  $i=1;
                  foreach ($cart as $key => $data) { 
                  ?>
						<div class="cart_items">
							<ul class="cart_list"><?php echo $data['rowid'] ?>
								<li class="cart_item clearfix">
									<div class="cart_item_image"><img src="<?php echo base_url(); ?>admin/assets/images/<?php echo $data['image'] ?>" alt=""></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
									<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Sn. No</div>
											<div class="cart_item_text"><?php echo $i;?></div>
										</div>
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text"><?php echo $data['name'] ?></div>
										</div>
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Color</div>
											<div class="cart_item_text"><span style="background-color:#999999;"></span>Silver</div>
										</div>
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Quantity</div>
											<div class="cart_item_text"><?php echo $data['qty'] ?></div>
										</div>
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Price</div>
											<div class="cart_item_text"><?php echo $data['price'] ?></div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Total</div>
											<div class="cart_item_text"><?php echo $data['subtotal'] ?></div>
											</div>
										
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Color</div>
											<div class="cart_item_text"><span onclick="javascript:updateproduct('<?php echo $data['rowid'] ?>')"></span>Update</div>
										</div>
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Color</div>
											<div class="cart_item_text"><i class="icon-delete" onclick="javascript:deleteproduct('<?php echo $data['rowid'] ?>')">X</i>Delete</div>
										</div>
										</div>
								</li>
							</ul>
						</div>
					 <?php $i++;} }?>





						
						<!-- Order Total -->
						<div class="order_total">
							<div class="order_total_content text-md-right">
								<div class="order_total_title">Order Total:</div>
								<div class="order_total_amount">$2000</div>
							</div>
						</div>

						<div class="cart_buttons">
							<button type="button" class="button cart_button_clear">Add to Cart</button>
							<button type="button" class="button cart_button_checkout">Add to Cart</button>
						</div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="javascript:deleteproduct('all');Refresh()">Clear Cart</button>
        <a href="<?php echo site_url('welcome/billing_view') ?>"><button type="button" class="btn btn-primary">Place Order</button></a>
      </div>


					</div>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
function deleteproduct(rowid)
{
var answer = confirm ("Are you sure you want to delete?");
if (answer)
{
        $.ajax({
                type: "POST",
                url: "<?php echo site_url('welcome/remove');?>",
                data: "rowid="+rowid,
                success: function (response) {
                    $(".rowid"+rowid).remove(".rowid"+rowid); 
                    $(".cartcount").text(response);  
                    var total = 0;
                    $('.subtotal').each(function(){
                        total += parseInt($(this).text());
                        $('.grandtotal').text(total);
                    });              
                }
            });
      }
}

var total = 0;
$('.subtotal').each(function(){
    total += parseInt($(this).text());
    $('.grandtotal').text(total);
});

 function Refresh() {
        window.parent.location = window.parent.location.href;
    }

function updateproduct(rowid)
{
var qty = $('.qty'+rowid).val();
var price = $('.price'+rowid).text();
var subtotal = $('.subtotal'+rowid).text();
    $.ajax({
            type: "POST",
            url: "<?php echo site_url('welcome/update_cart');?>",
            data: "rowid="+rowid+"&qty="+qty+"&price="+price+"&subtotal="+subtotal,
            success: function (response) {
                    $('.subtotal'+rowid).text(response);
                    var total = 0;
                    $('.subtotal').each(function(){
                        total += parseInt($(this).text());
                        $('.grandtotal').text(total);
                    });     
            }
        });
}
</script>