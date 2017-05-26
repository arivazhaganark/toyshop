
<?php $tab_effect = 'wiggle'; ?>
<script type="text/javascript">

$(document).ready(function() {

	$(".<?php echo $cateogry_alias;?> .tab_content_category").hide();
	$(".<?php echo $cateogry_alias;?> .tab_content_category:first").show(); 
	$(".<?php echo $cateogry_alias;?> ul.tabs-category li:first").addClass("active");
	$(".<?php echo $cateogry_alias;?> ul.tabs-category li:first").addClass("active");
	$(".<?php echo $cateogry_alias;?> ul.tabs-category li").click(function() {
		$(".<?php echo $cateogry_alias;?> ul.tabs-category li").removeClass("active");
		$(this).addClass("active");
		$(".<?php echo $cateogry_alias;?> .tab_content_category").hide();
		$(".<?php echo $cateogry_alias;?> .tab_content_category").removeClass("animate1 <?php echo $tab_effect;?>");
		var activeTab = $(this).attr("rel"); 
		$("#"+activeTab) .addClass("animate1 <?php echo $tab_effect;?>");
		$("#"+activeTab).fadeIn(); 
	});
});

</script>
<?php 
	$row=1;
	$row = $config_slide['f_rows']; 
	if(!$row) {$row=1;}
?>
<div class="col-md-6 col-sm-6 col-sms-12">
<div class="tabscategory-slider <?php echo $cateogry_alias;?>">
	<div class="tab-title module-title"><h2><?php echo $heading_title ?></h2></div>
	<div class="tab-title1 module-title"><h2><?php echo $heading_title1 ?></h2></div>
	<ul class="tabs-category"> 
	<?php $count=0; ?>
	<?php foreach($category_products as $cate_id => $products ){ ?>
		<li rel="tab_cate<?php echo $cate_id; ?>"  >
				<?php echo $array_cates[$cate_id]; ?>
		</li>
			<?php $count= $count+1; ?>
	<?php } ?>	
	</ul>
	<div class="row">
		<div class="tab_container_category"> 
		<?php foreach($category_products as $cate_id => $products ){ ?>
			<div id="tab_cate<?php echo $cate_id; ?>" class="tab_content_category">
				
				<div class="productTabContent owl-demo-tabcate">
				<?php $i=0; ?>
				<?php foreach ($products as $product){ ?>
							<?php if($i++ % $row ==0){  echo  "<div class='row_item'><div class='row_item1'>"; } ?>
							<div class="item">
							<div class="item-inner">
								<div class="images-container">
									<div class="image"><a href="<?php echo $product['href']; ?>"><img class="image1" src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" />
									<?php if(isset($product['rotator_image']) && $product['rotator_image'] != ""): ?>
										<img class="image2" src="<?php echo $product['rotator_image'] ?>" alt="" />
									<?php endif; ?>
									</a></div>
								</div>
								<div class="item-content">
									<?php if($config_slide['tab_cate_show_des']) { ?>
									<div class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>
									<?php if ($product['rating']) { ?>
									<div class="rating"><img src="catalog/view/theme/default/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" /></div>
									<?php } ?>
									<?php } ?>
									<?php if($config_slide['tab_cate_show_price']) { ?>
									<?php if ($product['price']) { ?>
									<div class="price">
									  <?php if (!$product['special']) { ?>
									  <?php echo $product['price']; ?>
									  <?php } else { ?>
									  <span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span>
									  <?php } ?>
									</div>
									<?php } ?>
									<?php } ?>
									<div class="actions">
										<div class="button-group">
											<div class="add-to-links">
													<div class="wishlist"><button type="button" title="<?php echo $button_wishlist; ?>"  onclick="wishlist.add('<?php echo $product['product_id']; ?>');"><span><?php echo $button_wishlist; ?></span></button></div>
													<?php if($config_slide['tab_cate_show_addtocart']) { ?>
														<div class="cart">
														<button type="button" title="<?php echo $button_cart; ?>" onclick="cart.add('<?php echo $product['product_id']; ?>');"><span><?php echo $button_cart; ?></span></button>
														</div>
													<?php } ?>
													<div class="compare"><button type="button" title="<?php echo $button_compare; ?>"  onclick="compare.add('<?php echo $product['product_id']; ?>');"><span><?php echo $button_compare; ?></span></button></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						  	<?php if($i % $row ==0){  echo  "</div></div>"; } ?>
				<?php } ?>
				</div>
			</div>

		<?php } ?>
	
	</div> <!-- .tab_container_category -->
	</div> <!-- .row -->
</div>
</div>

<script type="text/javascript">
$(document).ready(function() { 
  $(".<?php echo $cateogry_alias;?> .owl-demo-tabcate").owlCarousel({
      autoPlay: false, //Set AutoPlay to 3 seconds
      items : <?php if($config_slide['items']) { echo $config_slide['items'] ;} else { echo 3;} ?>,
	  slideSpeed : <?php if($config_slide['tab_cate_speed_slide']) { echo $config_slide['tab_cate_speed_slide'] ;} else { echo 200;} ?>,
	  navigation : <?php if($config_slide['tab_cate_show_nextback']) { echo 'true' ;} else { echo 'false';} ?>,
	  paginationNumbers : true,
	  pagination : <?php if($config_slide['tab_cate_show_ctr']) { echo 'true' ;} else { echo 'false';} ?>,
	  stopOnHover : false,
		itemsDesktop : [1199,2], 
		itemsDesktopSmall : [992,1], 
		itemsTablet: [767,2], 
		itemsMobile : [600,1]
  });
 
});
</script>




