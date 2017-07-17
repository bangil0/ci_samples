<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view('themes/'. Settings_model::$db_config['adminpanel_theme'] .'/partials/content_head.php'); ?>

<?php $this->load->view('generic/flash_error'); ?>

<h2><?php print $this->lang->line('permission_create'); ?></h2>

<div class="bg-white pd-15 mg-b-20">

    <?php print form_open('adminpanel/permissions/add_permission', 'id="add_permission_form" class="form-inline"') ."\r\n"; ?>

    <div class="form-group mg-b-5">
        <label for="permission_description" class="pd-r-5"><?php print $this->lang->line('permission_description'); ?></label>
        <input name="permission_description" id="permission_description" class="form-control input-lg">
    </div>

    <div class="form-group mg-b-5">
        <label for="permission_order" class="pd-r-5"><span class="hidden-xs pd-r-5"></span><?php print $this->lang->line('permission_order'); ?></label>
        <input name="permission_order" id="permission_order" class="form-control input-lg">
    </div>

    <div>
        <button type="submit" class="btn btn-primary btn-lg js-btn-loading" data-loading-text="Creating..."><i class="fa fa-plus pd-r-5"></i> <?php print $this->lang->line('permissions_btn_create'); ?></button>
    </div>

    <?php print form_close() ."\r\n"; ?>
</div>

<hr>

<h2><?php print $this->lang->line('permission_manage'); ?></h2>

<p class="f900 mg-b-20">
    <?php print $this->lang->line('permission_warning'); ?>
</p>

<?php foreach ($permissions as $permission) { ?>

<div class="bg-white pd-15 mg-b-20">

    <h4><strong>ID <?php print $permission->permission_id; ?>:</strong> <?php print $permission->permission_description; ?></h4>

    <?php print form_open('adminpanel/permissions/permissions_multi', 'id="permissions_form_'. $permission->permission_id .'" class="form-inline"') ."\r\n"; ?>

    <div class="form-group mg-b-5">
        <label for="permission_description" class="pd-r-5"><?php print $this->lang->line('permission_description'); ?>:</label>
        <input name="permission_description" id="permission_description" value="<?php print $permission->permission_description; ?>" class="form-control">
    </div>

    <div class="form-group mg-b-5">
        <label for="permission_order" class="pd-r-5"><span class="hidden-xs pd-r-5"></span><?php print $this->lang->line('permission_order'); ?>:</label>
        <input name="permission_order" id="permission_order" value="<?php print $permission->permission_order; ?>" class="form-control">
    </div>

    <div class="form-group">
        <strong><?php print $this->lang->line('permission_system'); ?></strong>: <?php print ($permission->permission_system ? $this->lang->line('permission_yes') : $this->lang->line('permission_no')); ?>
    </div>

    <div>
        <button type="submit" name="edit" class="btn btn-primary js-btn-loading" data-loading-text="Updating..."><i class="fa fa-refresh pd-r-5"></i> <?php print $this->lang->line('permission_edit'); ?></button>
        <button type="submit" name="delete" class="btn btn-danger js-confirm-delete" data-loading-text="Deleting..."><i class="fa fa-trash-o pd-r-5"></i> <?php print $this->lang->line('permission_delete'); ?></button>
        <input type="hidden" name="permission_id" id="permission_id" value="<?php print $permission->permission_id; ?>">
    </div>

    <?php print form_close() ."\r\n"; ?>
</div>

<?php } ?>
