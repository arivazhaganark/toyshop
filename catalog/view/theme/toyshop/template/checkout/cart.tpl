<?php echo $header; ?>
<div class="container">
    <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
    </ul>
    <?php if ($attention) { ?>
    <div class="alert alert-info"><i class="fa fa-info-circle"></i> <?php echo $attention; ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <?php if ($success) { ?>
    <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="row"><?php echo $column_left; ?>
        <?php if ($column_left && $column_right) { ?>
        <?php $class = 'col-sm-6'; ?>
        <?php } elseif ($column_left || $column_right) { ?>
        <?php $class = 'col-sm-9'; ?>
        <?php } else { ?>
        <?php $class = 'col-sm-12'; ?>
        <?php } ?>
        <div id="content" class="<?php echo $class; ?>"><?php echo $content_top; ?>
            <h1><?php echo $heading_title; ?></h1>
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td class="text-center"><?php echo $column_image; ?></td>
                            <td class="text-left"><?php echo $column_name; ?></td>
                            <td class="text-left"><?php echo $column_model; ?></td>
                            <td class="text-left"><?php echo $column_quantity; ?></td>
                            <!--<td class="text-right"><?php echo $column_price; ?></td>
                            <td class="text-right"><?php echo $column_total; ?></td>-->
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($products as $product) { ?>
                        <tr>
                            <td class="text-center"><?php if ($product['thumb']) { ?>
                                <a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>"
                                                                               alt="<?php echo $product['name']; ?>"
                                                                               title="<?php echo $product['name']; ?>"
                                                                               class="img-thumbnail"/></a>
                                <?php } ?></td>
                            <td class="text-left"><a
                                        href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a>
                                <?php if (!$product['stock']) { ?>
                                <span class="text-danger">***</span>
                                <?php } ?>
                                <?php if ($product['option']) { ?>
                                <?php foreach ($product['option'] as $option) { ?>
                                <br/>
                                <small><?php echo $option['name']; ?>: <?php echo $option['value']; ?></small>
                                <?php } ?>
                                <?php } ?>
                                <?php if ($product['reward']) { ?>
                                <br/>
                                <small><?php echo $product['reward']; ?></small>
                                <?php } ?>
                                <?php if ($product['recurring']) { ?>
                                <br/>
                                <span class="label label-info"><?php echo $text_recurring_item; ?></span>
                                <small><?php echo $product['recurring']; ?></small>
                                <?php } ?></td>
                            <td class="text-left"><?php echo $product['model']; ?></td>
                            <td class="text-left">
                                <div class="input-group btn-block" style="max-width: 200px;">
                                    <input type="text" name="quantity[<?php echo $product['key']; ?>]"
                                           value="<?php echo $product['quantity']; ?>" size="1" class="form-control"/>
                                    <span class="input-group-btn">
                    <button type="submit" data-toggle="tooltip" title="<?php echo $button_update; ?>"
                            class="btn btn-primary"><i class="fa fa-refresh"></i></button>
                    <button type="button" data-toggle="tooltip" title="<?php echo $button_remove; ?>"
                            class="btn btn-danger" onclick="cart.remove('<?php echo $product['key']; ?>');"><i
                                class="fa fa-times-circle"></i></button></span></div>
                            </td>
                            <!--<td class="text-right"><?php echo $product['price']; ?></td>
                            <td class="text-right"><?php echo $product['total']; ?></td>-->
                        </tr>
                        <?php } ?>
                        <?php foreach ($vouchers as $vouchers) { ?>
                        <tr>
                            <td></td>
                            <td class="text-left"><?php echo $vouchers['description']; ?></td>
                            <td class="text-left"></td>
                            <td class="text-left">
                                <div class="input-group btn-block" style="max-width: 200px;">
                                    <input type="text" name="" value="1" size="1" disabled="disabled"
                                           class="form-control"/>
                                    <span class="input-group-btn"><button type="button" data-toggle="tooltip"
                                                                          title="<?php echo $button_remove; ?>"
                                                                          class="btn btn-danger"
                                                                          onclick="voucher.remove('<?php echo $vouchers['key']; ?>');"><i
                                                    class="fa fa-times-circle"></i></button></span></div>
                            </td>
                            <td class="text-right"><?php echo $vouchers['amount']; ?></td>
                            <td class="text-right"><?php echo $vouchers['amount']; ?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </form>
            <?php if ($coupon || $voucher || $reward || $shipping) { ?>
            <h2><?php echo $text_next; ?></h2>
            <p><?php echo $text_next_choice; ?></p>
            <div class="panel-group"
                 id="accordion"><?php echo $coupon; ?><?php echo $voucher; ?><?php echo $reward; ?><?php echo $shipping; ?></div>
            <?php } ?>
            <br/>
            <!--<div class="row">
                <div class="col-sm-4 col-sm-offset-8">
                    <table class="table table-bordered">
                        <?php foreach ($totals as $total) { ?>
                        <tr>
                            <td class="text-right"><strong><?php echo $total['title']; ?>:</strong></td>
                            <td class="text-right"><?php echo $total['text']; ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>-->
            <div class="buttons">
                <div class="pull-left"><a href="<?php echo $continue; ?>"
                                          class="btn btn-default"><?php echo $button_shopping; ?></a></div>
                <div class="pull-right">
                    <a data-toggle="modal" data-target="#quote-modal" href="javascript:void(0);"
                       class="btn btn-primary"><?php echo $button_checkout; ?></a>
                    <!--<a href="<?php echo $checkout; ?>" class="btn btn-primary"><?php echo $button_checkout; ?></a>-->
                </div>
            </div>
            <?php echo $content_bottom; ?></div>
        <?php echo $column_right; ?></div>
</div>
<?php echo $footer; ?>

<!-- Quote Modal -->
<div class="modal fade" id="quote-modal" tabindex="-1" role="dialog" aria-labelledby="quote-modalLabel"
     style="margin-top: 50px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="quote-modalLabel"><?php echo $button_checkout; ?></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo $quoterequest ?>" method="POST">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-sm-2 control-label">Message</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="message" name="message" rows="7"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="pull-left">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>