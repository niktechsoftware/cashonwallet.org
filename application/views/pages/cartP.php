	<!-- Cart -->
	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">Shopping Cart</div>

						<?php if($this->cart->total_items() > 0){ foreach($cartItems as $items):	?>

						<div class="cart_items">
							<ul class="cart_list">
								<li class="cart_item clearfix">
									<div class="cart_item_image"><img
											src="<?php echo base_url(); ?>assets/images/products/<?php echo $items['image'];?>"
											alt=""></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text"><?php echo $items['name'];?></div>
										</div>
										<!-- <div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Color</div>
											<div class="cart_item_text"><span
													style="background-color:#999999;"></span>Silver</div>
										</div> -->
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Quantity</div>
											<div class="cart_item_text"><input type="number" class="form-control"
													value="<?php echo $items["qty"]; ?>" style="width:65px;"
													onchange="updateCartItem(this, '<?php echo $items["rowid"]; ?>')">
											</div>
										</div>

										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Price</div>
											<div class="cart_item_text">Rs. <?php echo $items['price'];?></div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Total</div>
											<div class="cart_item_text">Rs. <?php echo $items['subtotal'];?></div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Delete</div>
											<div class="cart_item_text"><a
													href="<?php echo base_url('opencart/removeItem/'.$items["rowid"]); ?>"
													class="btn btn-danger"
													onclick="return confirm('Are you sure?')">Delete</a>
											</div>
										</div>
								</li>
							</ul>
						</div>

						<?php endforeach; ?>
						<?php  }else{ ?>

						<div class="cart_items">
							<ul class="cart_list">
								<li class="cart_item clearfix">
									<h4>Your cart is empty.....</h4>
								</li>
							</ul>
						</div>
						<?php } ?>


						<!-- Order Total -->
						<div class="order_total">
							<div class="order_total_content text-md-right">
								<div class="order_total_title">Order Total:</div>
								<div class="order_total_amount">Rs. <?php echo $this->cart->total(); ?></div>
							</div>
						</div>

						<?php if($this->cart->total_items() > 0){ ?>
						<div class="cart_buttons">
							<a href="<?php echo base_url('checkout/'); ?>" class="button cart_button_checkout">Checkout <i
									class="glyphicon glyphicon-menu-right"></i></a>
						</div>
						<?php } ?>




					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
/* Update item quantity */
function updateCartItem(obj, rowid) {
	$.get("<?php echo base_url('opencart/updateItemQty/'); ?>", {
		rowid: rowid,
		qty: obj.value
	}, function(resp) {
		if (resp == 'ok') {
			location.reload();
		} else {
			alert('Cart update failed, please try again.');
		}
	});
}
	</script>