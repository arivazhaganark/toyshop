<div class="featured-container">
<div class="featured-sldier-title module-title"><h2><?php echo $heading_title; ?></h2></div>
<?php 
	$count = 0; 
	$row=1;
	$rows = $config_slide['f_rows'];
	if(!$rows) {$rows=1;}
?>
<div class="row">
<div class="owl-demo-feature">
  <?php foreach ($products as $product) { ?>
  <?php  if($count % $rows == 0 ) { echo '<div class="row_items">'; } $count++; ?>
	<div class="item_product">
    <div class="product-thumb transition item-inner">
		<div class="box-item">
			<?php if ($product['special']) { ?>
				<span class="sale"> Sale </span>
			<?php } else {if ($product['is_new']){?>
				<div class="new"> New </div>
			<?php }} ?>
			<div class="images-container">
				<?php if ($product['thumb']) { ?>
					<div class="image"><a href="<?php echo $product['href']; ?>"><img class="image1" src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" />
					<img class="image2" src="<?php echo $product['rotator_image'] ?>" alt="" /></a></div>
					<?php } else { ?>
					<div class="image"><a href="<?php echo $product['href']; ?>"><img src="image/cache/no_image-100x100.png" alt="<?php echo $product['name']; ?>" /></a></div>
				<?php } ?>
				<div class="actions">
					<div class="button-group">
						<div class="add-to-links">
							<div class="cart">
								<?php if($config_slide['f_show_addtocart']) { ?>
								<button type="button" onclick="cart.add('<?php echo $product['product_id']; ?>');"><span><span><?php echo $button_cart; ?></span></span></button>
								<?php } ?>
							</div>
							<div class="wishlist"><button type="button" title="<?php echo $button_wishlist; ?>" onclick="wishlist.add('<?php echo $product['product_id']; ?>');"><span><?php echo $button_wishlist; ?></span></button></div>
							<div class="compare"><button type="button" title="<?php echo $button_compare; ?>" onclick="compare.add('<?php echo $product['product_id']; ?>');"><span><?php echo $button_compare; ?></span></button></div>
						</div>
					 </div>
				</div>
			</div>
			<div class="des-container">
				<div class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>
				<div class="price-box">
					<?php if($config_slide['f_show_price']){ ?>
					<?php if ($product['price']) { ?>
					<p class="price">
					  <?php if (!$product['special']) { ?>
					  <?php echo $product['price']; ?>
					  <?php } else { ?>
					  <span class="price-new"><?php echo $product['special']; ?></span> <span class="price-old"><?php echo $product['price']; ?></span>
					  <?php } ?>
					  <?php if ($product['tax']) { ?>
					  <span class="price-tax"><?php echo $text_tax; ?> <?php echo $product['tax']; ?></span>
					  <?php } ?>
					</p> <?php } ?>
					<?php } ?>
				</div>
				<?php if($config_slide['f_show_des']){ ?>
				<p><?php echo $product['description']; ?></p>
				<?php } ?>
				<?php if (isset($product['rating'])) { ?>
				<div class="rating"><img src="catalog/view/theme/default/image/stars-<?php echo $product['rating']; ?>.png" alt="" /></div>
				<?php } ?>
			</div>
		</div>
    </div>
	</div>
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
<script type="text/javascript">
$(document).ready(function() { 
  $(".owl-demo-feature").owlCarousel({
		slideSpeed: <?php if($config_slide['f_ani_speed']) { echo $config_slide['f_ani_speed'] ;} else { echo 3000;} ?>,
		items : <?php if($config_slide['items']) { echo $config_slide['items'] ;} else { echo 3;} ?>,
		autoPlay : <?php if($config_slide['f_speed_slide']) { echo 'true' ;} else { echo 'false';} ?>,
		navigation : <?php if($config_slide['f_show_nextback']) { echo 'true' ;} else { echo 'false';} ?>,
		paginationNumbers : true,
		pagination : <?php if($config_slide['f_show_ctr']) { echo 'true' ;} else { echo 'false';} 	?>,
		stopOnHover : false,
		items :4,
		itemsDesktop : [1000,3],
		itemsDesktopSmall : [900,3],
		itemsTablet: [680,2],
		itemsMobile : [460,1]
  });
 
});
</script>