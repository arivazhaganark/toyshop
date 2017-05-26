<div class="col-md-9 col-sm-12">
    <div class="featured-product-container">
        <div class="row">
            <?php foreach ($products as $product) { ?>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 col-smb-12 col-mobile">
                <div class="item_product">
                    <div class="product-thumb transition item-inner">
                        <div class="images-container">
                            <div class="image"><a href="<?php echo $product['href']; ?>"><img class="image1"
                                                                                              src="<?php echo $product['thumb']; ?>"
                                                                                              alt="<?php echo $product['name']; ?>"/>
                                    <?php if(isset($product['rotator_image']) && $product['rotator_image'] != ""): ?>
                                    <img class="image2" src="<?php echo $product['rotator_image'] ?>" alt=""/>
                                    <?php endif; ?>
                                </a></div>
                        </div>
                        <div class="item-content">
                            <div class="name"><a
                                        href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>
                            <div class="box-review">
                                <?php if (isset($product['rating'])) { ?>
                                <div class="rating"><img
                                            src="catalog/view/theme/default/image/stars-<?php echo $product['rating']; ?>.png"
                                            alt=""/></div>
                                <?php } ?>
                            </div>
                            <?php if ($product['price']) { ?>
                            <div class="price">
                                <?php if (!$product['special']) { ?>
                                <?php echo $product['price']; ?>
                                <?php } else { ?>
                                <span class="price-new"><?php echo $product['special']; ?></span> <span
                                        class="price-old"><?php echo $product['price']; ?></span>
                                <?php } ?>
                                <?php if ($product['tax']) { ?>
                                <span class="price-tax"><?php echo $text_tax; ?> <?php echo $product['tax']; ?></span>
                                <?php } ?>
                            </div>
                            <?php } ?>
                            <div class="actions">
                                <div class="button-group">
                                    <div class="add-to-links">
                                        <div class="wishlist">
                                            <button type="button" title="<?php echo $button_wishlist; ?>"
                                                    onclick="wishlist.add('<?php echo $product['product_id']; ?>');">
                                                <span><?php echo $button_wishlist; ?></span></button>
                                        </div>
                                        <div class="cart">
                                            <button type="button" title="<?php echo $button_cart; ?>" onclick="cart.add('<?php echo $product['product_id']; ?>');"><span><?php echo $button_cart; ?></span></button>
                                        </div>
                                        <div class="compare">
                                            <button type="button" title="<?php echo $button_compare; ?>"
                                                    onclick="compare.add('<?php echo $product['product_id']; ?>');">
                                                <span><?php echo $button_compare; ?></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
