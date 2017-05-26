<?php if($permission == true): ?>
<script type="text/javascript">
	if (typeof TT == 'undefined') TT = { };
	TT.Countdown = {
		TEXT_YEARS 		: '<?php echo $text_years ?>',
		TEXT_MONTHS 	: '<?php echo $text_months ?>',
		TEXT_WEEKS 		: '<?php echo $text_weeks ?>',
		TEXT_DAYS 		: '<?php echo $text_days ?>',
		TEXT_HOURS 		: '<?php echo $text_hours ?>',
		TEXT_MINUTES 	: '<?php echo $text_minutes ?>',
		TEXT_SECONDS 	: '<?php echo $text_seconds ?>'
	};
</script>
<script type="text/javascript" src="catalog/view/javascript/jquery.countdown.js"></script>
<div class="ttcountdown_module">
<div class="countdown-title module-title"><h2><?php echo $heading_title; ?></h2></div>
<div class="product-layout countdown-products">
	<div class="row">
	<div class="countdown-tab-content">
	<div class="countdown-product-inner">
    <?php foreach ($products as $product) : ?>
    <div class="timer-item">
		<div class="item-inner">
			<?php if ($product['special']) { ?>
				<span class="sale"> Sale </span>
			<?php } else {if ($product['is_new']){?>
				<div class="new"> New </div>
			<?php }} ?>
			<div class="images-container">
				<div class="image"><a href="<?php echo $product['href']; ?>"><img class="image1" src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" />
				<img class="image2" src="<?php echo $product['rotator_image'] ?>" alt="" /></a></div>
				<?php if(strtotime($product['date_end'])) { ?>
				<div id="Countdown<?php echo $product['product_id']?>" class="box-timer"></div>
				<?php } ?>
				<?php if(strtotime($product['date_end'])) { ?>
					<script type="text/javascript">

						$(function () {
							var austDay = new Date();
							austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
							$('#Countdown<?php echo $product['product_id'];?>').countdown({
								until: new Date(
									<?php echo date("Y",strtotime($product['date_end']))?>,
									<?php echo date("m",strtotime($product['date_end']))?> -1, 
									<?php echo date("d",strtotime($product['date_end']))?>,
									<?php echo date("H",strtotime($product['date_end']))?>,
									<?php echo date("i",strtotime($product['date_end']))?>, 
									<?php echo date("s",strtotime($product['date_end']))?>
									)
							});
							//$('#Countdown<?php echo $product['product_id'];?>').countdown('pause');
						});
					</script>
				<?php } ?>
			</div><!-- images-container -->
			<div class="des-container">
				<div class="name">
						<a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a>
				</div>
				
				<?php if (isset($product['rating'])) { ?>
					<div class="ratings">
						<div class="rating-box">
							<?php for ($i = 0; $i <= 5; $i++) { ?>
								<?php if ($product['rating'] == $i) {
									$class_r= "rating".$i;
									echo '<div class="'.$class_r.'"><!-- rating --></div>';
								} 
							}  ?>
						</div>
						<div class="review-count"><a href="<?php echo $product['href']; ?>"><?php echo $product['reviews']; ?></a></div>
					</div>
				<?php } ?>
				<div class="description"><?php echo $product['description']; ?></div>
				
				<?php if ($product['orgprice']) { ?>
					<?php if (!$product['special']) { ?>
						<div class="price-box">
							<span class="regular-price">
								<span class="price"><?php echo $product['orgprice']; ?></span>
							</span>
						</div>
					<?php } else { ?>
						<div class="price-box">
							<p class="old-price"><span class="price"><?php echo $product['orgprice']; ?></span></p>
							<p class="special-price"><span class="price"><?php echo $product['special']; ?></span></p>
						</div>
					<?php } ?>
				<?php } ?>
			</div><!--des-container-->
		</div>
    </div><!-- timer-item -->
    <?php endforeach;  ?>
	</div>
	</div><!-- countdown-product-inner -->
	</div><!-- countdown-tab-content -->
	</div>
</div>
<script type="text/javascript">
	$('.countdown-product-inner').owlCarousel({
		autoPlay : <?php if($config_slide['f_ani_speed']) { echo $config_slide['f_ani_speed'] ;} else { echo 3000;} ?>,
		items : <?php if($config_slide['items']) { echo $config_slide['items'] ;} else { echo 3;} ?>,
		itemsDesktop : [1199,3],
		itemsDesktopSmall : [991,3],
		itemsTablet: [700,2],
		itemsMobile : [460,1],
		slideSpeed : <?php if($config_slide['f_speed_slide']) { echo $config_slide['f_speed_slide'] ;} else { echo 2000;} ?>,
		paginationSpeed : 3000,
		rewindSpeed : 3000,
		navigation : <?php if($config_slide['f_show_nextback']) { echo 'true' ;} else { echo 'false';} ?>,
		stopOnHover : true,
		pagination : <?php if($config_slide['f_show_ctr']) { echo 'true' ;} else { echo 'false';} ?>,
		scrollPerPage:true,
		afterMove: function(){
			x = $( ".countdown-tab-content .owl-pagination .owl-page" ).index( $( ".countdown-tab-content .owl-pagination .active" ));
			var thumbinner = ".thumbinner"+x;
			$(".list-thumb .thumb li").removeClass('active');
			$(thumbinner).addClass('active');
		}
	});
	
	var owltimerslider = $(".countdown-product-inner").data('owlCarousel');
	function timerslider(x){
		owltimerslider.goTo(x)
	}
</script>
<?php endif; ?>