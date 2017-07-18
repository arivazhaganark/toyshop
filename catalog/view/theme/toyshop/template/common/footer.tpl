<?php echo $content_block3; ?>
<div class="footer-modunl">
	<div class="container">
		<div class="row">
			<?php echo $content_block5; ?>
		</div>
	</div>
</div>
<div class="ma-corporate-about">
	<div class="container">
		<div class="corporate-about">
			<div class="row">
				<div class="col-sm-6 col-md-3 col-sms-6 col-smb-12">
					<div class="block-wrapper"><span class="fa fa-phone-square">&nbsp;</span>
					<h3><?php echo $text_phone ?></h3>
					<p><?php echo $text1_phone ?></p></div>
				</div>
				<div class="col-sm-6 col-md-3 col-sms-6 col-smb-12">
					<div class="block-wrapper"><span class="fa fa-clock-o">&nbsp;</span>
					<h3><?php echo $text_time ?></h3>
					<p><?php echo $text1_time ?></p></div>
				</div>
				<div class="col-sm-6 col-md-3 col-sms-6 col-smb-12">
					<div class="block-wrapper"><span class="fa fa-paper-plane-o">&nbsp;</span>
					<h3><?php echo $text_shipping ?></h3>
					<p><?php echo $text1_shipping ?></p></div>
				</div>
				<div class="col-sm-6 col-md-3 col-sms-6 col-smb-12">
					<div class="block-wrapper"><span class="fa fa-history">&nbsp;</span>
					<h3><?php echo $text_money ?></h3>
					<p><?php echo $text1_money ?></p></div>
				</div>			
			</div>
		</div>
	</div>
</div>
<div class="footer">
	<div class="container">
		<div class="container-inner">
		<div class="row">
			<div class="column col1 col-xs-12 col-sm-6 col-md-3">
				<div class="footer-title"><h3>Friction Toys</h3></div>
				<div class="footer-content">
					<ul class="toggle-footer">
						<li><a href="<?php echo $product_links[0]['url']; ?>"><?php echo $product_links[0]['name']; ?></a></li>
						<li><a href="<?php echo $product_links[1]['url']; ?>"><?php echo $product_links[1]['name']; ?></a></li>
						<li><a href="<?php echo $product_links[2]['url']; ?>"><?php echo $product_links[2]['name']; ?></a></li>
					</ul>
				</div>
			</div>
			<div class="column col2 col-xs-12 col-sm-6 col-md-3">
				<div class="footer-title"><h3>Friction Toys</h3></div>
				<div class="footer-content">
					<ul class="toggle-footer">
						<li><a href="<?php echo $product_links[3]['url']; ?>"><?php echo $product_links[3]['name']; ?></a></li>
						<li><a href="<?php echo $product_links[4]['url']; ?>"><?php echo $product_links[4]['name']; ?></a></li>
						<li><a href="<?php echo $product_links[5]['url']; ?>"><?php echo $product_links[5]['name']; ?></a></li>
					</ul>
				</div>
			</div>
			<div class="column col3 col-xs-12 col-sm-6 col-md-3">
				<div class="footer-title"><h3>Gun Toys</h3></div>
				<div class="footer-content">
					<ul class="toggle-footer">
						<li><a href="<?php echo $product_links[6]['url']; ?>"><?php echo $product_links[6]['name']; ?></a></li>
					</ul>
				</div>
			</div>
			<div class="column col4 col-xs-12 col-sm-6 col-md-3">
				<div class="footer-title"><h3><?php echo $text_info ?></h3></div>
				<div class="footer-content">
					<ul class="toggle-footer">
						<li class="f-phone"><span><?php echo $telephone; ?></span></li>
						<li><a href="<?php echo $sitemap; ?>"><?php echo $text_sitemap; ?></a></li>
						<li><a href="#"><?php echo $text_terms; ?></a></li>
						<li><a href="#">Privacy Policy</a></li>
					</ul>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
<div class="powered">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-sms-12">
				<div class="left-powered"><h2><?php echo $powered; ?></h2></div>
			</div>
			<div class="col-md-6 col-sm-6 col-sms-12">
				<div class="right-powered">
					<a href="#"><img src="catalog/view/theme/toyshop/image/payment.png" alt="" /></a>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="back-top" class="hidden-phone" style="display: block;"> </div>
<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//--> 

<!-- Theme created by Welford Media for OpenCart 2.0 www.welfordmedia.co.uk -->
<script type="text/javascript">
	$(document).ready(function(){

	 // hide #back-top first
	 $("#back-top").hide();
	 
	 // fade in #back-top
	 $(function () {
	  $(window).scroll(function () {
	   if ($(this).scrollTop() > 100) {
		$('#back-top').fadeIn();
	   } else {
		$('#back-top').fadeOut();
	   }
	  });
	  // scroll body to 0px on click
	  $('#back-top').click(function () {
	   $('body,html').animate({
		scrollTop: 0
	   }, 800);
	   return false;
	  });
	 });

	});
</script>
</body></html>