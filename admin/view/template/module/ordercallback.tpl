<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button type="submit" form="form-ordercallback" data-toggle="tooltip"
                        title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
                <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>"
                   class="btn btn-default"><i class="fa fa-reply"></i></a></div>
            <h1><?php echo $heading_title; ?></h1>
            <ul class="breadcrumb">
                <?php foreach ($breadcrumbs as $breadcrumb) { ?>
                <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="container-fluid">
        <?php if ($error_warning) { ?>
        <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php } ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $heading_title; ?></h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab-common" aria-controls="home" role="tab"
                                                              data-toggle="tab"><?php echo $tab_text_common; ?></a></li>
                    <li role="presentation"><a href="#tab-fields" aria-controls="profile" role="tab"
                                               data-toggle="tab"><?php echo $tab_text_fields; ?></a></li>
                </ul>
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data"
                      id="form-ordercallback" class="form-horizontal">

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="tab-common">
                            <div class="form-group">
                                <label class="col-sm-2 control-label"
                                       for="input-item"><?php echo $entry_use_module; ?></label>
                                <div class="col-sm-10">
                                    <select name="ordercallback_use_module" class="form-control">
                                        <?php if ($ordercallback_use_module == 1) { ?>
                                        <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                        <option value="0"><?php echo $text_disabled; ?></option>
                                        <?php } else { ?>
                                        <option value="1"><?php echo $text_enabled; ?></option>
                                        <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label"
                                       for="input-item"><?php echo $entry_module_works_as; ?></label>
                                <div class="col-sm-10">
                                    <select name="module_works_as" class="form-control">
                                        <option value="call"
                                        <?php echo ($module_works_as == 'call' ? 'selected' : ''); ?>
                                        ><?php echo $text_module_works_as_call; ?></option>
                                        <option value="order"
                                        <?php echo ($module_works_as == 'order' ? 'selected' : ''); ?>
                                        ><?php echo $text_module_works_as_order; ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label"
                                       for="input-item"><?php echo $entry_button_caption; ?></label>
                                <div class="col-sm-10">
                                    <input type="text" name="button_caption" class="form-control"
                                           value="<?php echo $button_caption; ?>"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label"
                                       for="input-item"><?php echo $entry_send_notification_to_email; ?></label>
                                <div class="col-sm-10">
                                    <select name="send_notification_to_email" class="form-control">
                                        <?php if ($send_notification_to_email == 1) { ?>
                                        <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                                        <option value="0"><?php echo $text_no; ?></option>
                                        <?php } else { ?>
                                        <option value="1"><?php echo $text_yes; ?></option>
                                        <option value="0" selected="selected"><?php echo $text_no; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label"
                                       for="input-item"><?php echo $entry_send_notification_to_sms; ?></label>
                                <div class="col-sm-10">
                                    <select name="send_notification_to_email" class="form-control" disabled>
                                        <?php if ($send_notification_to_sms == 1) { ?>
                                        <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                                        <option value="0"><?php echo $text_no; ?></option>
                                        <?php } else { ?>
                                        <option value="1"><?php echo $text_yes; ?></option>
                                        <option value="0" selected="selected"><?php echo $text_no; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab-fields">
                            <div class="form-group">
                                <label class="col-sm-2 control-label"
                                       for="input-item"><?php echo $entry_field_name_show; ?></label>
                                <div class="col-sm-10">
                                    <select name="field_name_show" class="form-control">
                                        <?php if ($field_name_show == 1) { ?>
                                        <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                                        <option value="0"><?php echo $text_no; ?></option>
                                        <?php } else { ?>
                                        <option value="1"><?php echo $text_yes; ?></option>
                                        <option value="0" selected="selected"><?php echo $text_no; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label"
                                       for="input-item"><?php echo $entry_field_name_required; ?></label>
                                <div class="col-sm-10">
                                    <select name="field_name_required" class="form-control">
                                        <?php if ($field_name_required == 1) { ?>
                                        <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                                        <option value="0"><?php echo $text_no; ?></option>
                                        <?php } else { ?>
                                        <option value="1"><?php echo $text_yes; ?></option>
                                        <option value="0" selected="selected"><?php echo $text_no; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label"
                                       for="input-item"><?php echo $entry_field_phone_show; ?></label>
                                <div class="col-sm-10">
                                    <select name="field_phone_show" class="form-control">
                                        <?php if ($field_phone_show == 1) { ?>
                                        <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                                        <option value="0"><?php echo $text_no; ?></option>
                                        <?php } else { ?>
                                        <option value="1"><?php echo $text_yes; ?></option>
                                        <option value="0" selected="selected"><?php echo $text_no; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label"
                                       for="input-item"><?php echo $entry_field_phone_required; ?></label>
                                <div class="col-sm-10">
                                    <select name="field_phone_required" class="form-control">
                                        <?php if ($field_phone_required == 1) { ?>
                                        <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                                        <option value="0"><?php echo $text_no; ?></option>
                                        <?php } else { ?>
                                        <option value="1"><?php echo $text_yes; ?></option>
                                        <option value="0" selected="selected"><?php echo $text_no; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label"
                                       for="input-item"><?php echo $entry_field_email_show; ?></label>
                                <div class="col-sm-10">
                                    <select name="field_email_show" class="form-control">
                                        <?php if ($field_email_show == 1) { ?>
                                        <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                                        <option value="0"><?php echo $text_no; ?></option>
                                        <?php } else { ?>
                                        <option value="1"><?php echo $text_yes; ?></option>
                                        <option value="0" selected="selected"><?php echo $text_no; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label"
                                       for="input-item"><?php echo $entry_field_email_required; ?></label>
                                <div class="col-sm-10">
                                    <select name="field_email_required" class="form-control">
                                        <?php if ($field_email_required == 1) { ?>
                                        <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                                        <option value="0"><?php echo $text_no; ?></option>
                                        <?php } else { ?>
                                        <option value="1"><?php echo $text_yes; ?></option>
                                        <option value="0" selected="selected"><?php echo $text_no; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label"
                                       for="input-item"><?php echo $entry_field_comment_show; ?></label>
                                <div class="col-sm-10">
                                    <select name="field_comment_show" class="form-control">
                                        <?php if ($field_comment_show == 1) { ?>
                                        <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                                        <option value="0"><?php echo $text_no; ?></option>
                                        <?php } else { ?>
                                        <option value="1"><?php echo $text_yes; ?></option>
                                        <option value="0" selected="selected"><?php echo $text_no; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label"
                                       for="input-item"><?php echo $entry_field_comment_required; ?></label>
                                <div class="col-sm-10">
                                    <select name="field_comment_required" class="form-control">
                                        <?php if ($field_comment_required == 1) { ?>
                                        <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                                        <option value="0"><?php echo $text_no; ?></option>
                                        <?php } else { ?>
                                        <option value="1"><?php echo $text_yes; ?></option>
                                        <option value="0" selected="selected"><?php echo $text_no; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label"
                                       for="input-item"><?php echo $entry_field_phone_mask; ?>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="field_phone_mask" value="<?php echo $field_phone_mask; ?>"
                                           size="30" class="form-control"/>
                                    <span class="help-inline"><?php echo $entry_field_phone_mask_help; ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label"
                                       for="input-item"><?php echo $entry_email_text; ?>
                                </label>
                                <div class="col-sm-10">
                                    <textarea rows="5" cols="40" name="email_text"
                                              class="form-control"><?php echo $email_text; ?></textarea>
                                    <span class="help-inline"><?php echo $entry_email_text_help; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript"><!--
    $(document).ready(function () {
        $('#settings a').tabs();
    });
    //--></script>
<?php echo $footer; ?>