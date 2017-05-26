<div class="most-products-container">

<div class="most-products-title home-title"><h3><?php echo $heading_title; ?></h3></div>
<div class="mostview-content">
<?php 
	$count = 0; 
	$row=1;
	$rows = $config_slide['f_rows'];
	if(!$rows) {$rows=1;}
?>
		<div class="owl-demo-mostproduct">
		  <?php foreach ($products as $product) { ?>
    <?php  if($count % $rows == 0 ) { echo '<div class="row_items">'; } $count++; ?>
		<div class="home-category">
				<div class="image">
					<?php if ($product['thumb']) { ?>
						<a href="<?php echo $product['href']; ?>"><img class="image1" src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" /></a>
					<?php } else { ?>
						<a class="product-image" href="<?php echo $product['href']; ?>">
							<div class="product-image">
								<img src="image/cache/no_image-100x100.png" alt="<?php echo $product['name']; ?>" />
							</div>
						</a>
					<?php } ?>
				</div>
				<div class="home-content">
					<div class="name">
						<a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a>
					</div>
					<?php if (isset($product['rating'])) { ?>
						<div class="rating"><img src="catalog/view/theme/default/image/stars-<?php echo $product['rating']; ?>.png" alt="" /></div>
					<?php } ?>
					<div class="price-label">
						<?php if($config_slide['f_show_price']) { ?>
							<?php if ($product['price']) { ?>
								<?php if (!$product['special']) { ?>
									<span class="price"><?php echo $product['price']; ?></span>
								<?php } else { ?>
									<p class="special-price"><span class="price"><?php echo $product['special']; ?></span></p>
									<p class="price"><span class="price-old"><?php echo $product['price']; ?></span></p>
								<?php } ?>
							<?php } ?>
						<?php } ?>
					</div>
					<?php if($config_slide['f_show_des']) { ?>
						<div class="des"><?php echo $product['description']; ?></div>
					<?php } ?>
					<div class="actions">
						<div class="button-group">
							<div class="cart">
								<?php if($config_slide['f_show_addtocart']) { ?>
									<button class="button btn-cart" type="button" title="<?php echo $button_cart; ?>" onclick="cart.add('<?php echo $product['product_id']; ?>');">
										<span>+ <?php echo $button_cart; ?></span>
									</button>
								<?php } ?>
							</div>
						</div>
					</div>
				</div><!-- home-content -->
		</div> <!-- item-inner -->
    <?php if($count % $rows == 0 ): ?>
    	</div>
     <?php else: ?>
    	<?php if($count == count($products)): ?>
    		</div>
    	<?php endif; ?>
     <?php endif; ?>
    <?php } ?>
	</div>
</div>
</div>
