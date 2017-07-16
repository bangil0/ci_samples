<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view('themes/'. Settings_model::$db_config['adminpanel_theme'] .'/partials/content_head.php'); ?>

<?php $this->load->view('generic/flash_error'); ?>

<?php print form_open('adminpanel/add_member/add', array('id' => 'add_member_form')) ."\r\n"; ?>

<div class="row">
	<div class="col-sm-6">
		<div class="form-group">
			<label for="first_name"><?php print $this->lang->line('first_name'); ?></label>
			<input type="text" name="first_name" id="first_name" class="form-control"
                   value="<?php print $this->session->flashdata('first_name'); ?>"
                   data-parsley-maxlength="40"
                   required>
		</div>

		<div class="form-group">
			<label for="last_name"><?php print $this->lang->line('last_name'); ?></label>
			<input type="text" name="last_name" id="last_name" class="form-control"
                   value="<?php print $this->session->flashdata('last_name'); ?>"
                   data-parsley-maxlength="60"
                   required>
		</div>

		<div class="form-group">
			<label for="email"><?php print $this->lang->line('email_address'); ?></label>
			<input type="text" name="email" id="email" class="form-control"
                   value="<?php print $this->session->flashdata('email'); ?>"
                   data-parsley-type="email"
                   data-parsley-maxlength="255"
                   required>
		</div>

		<div id="email_valid"></div>
		<div id="email_taken"></div>

		<div class="form-group">
			<label for="reg_username"><?php print $this->lang->line('username'); ?></label>
			<input type="text" name="username" id="reg_username" class="form-control"
                   value="<?php print $this->session->flashdata('username'); ?>"
                   data-parsley-maxlength="16"
                   required>
		</div>

		<div id="username_valid"></div>
		<div id="username_taken"></div>
		<div id="username_length"></div>
	</div>

	<div class="col-sm-6">
        <div class="form-group">
            <label><?php print $this->lang->line('roles_title'); ?></label>
            <?php foreach($roles as $role) {?>
            <div class="app-checkbox">
                <label class="pd-r-10">
                    <input type="checkbox" name="roles[]" value="<?php print $role->role_id; ?>" class="list_members_checkbox">
                    <span class="fa fa-check"></span> <?php print $role->role_name; ?>
                </label>
            </div>
            <?php } ?>
        </div>

		<div class="form-group">
			<label for="reg_password"><?php print $this->lang->line('password'); ?></label>
			<input type="password" name="password" id="reg_password" class="form-control"
                   data-parsley-maxlength="64"
                   required>
		</div>

		<div class="form-group">
			<label for="password_confirm"><?php print $this->lang->line('password_confirm'); ?></label>
			<input type="password" name="password_confirm" id="password_confirm" class="form-control"
                   data-parsley-maxlength="64"
                   required>
		</div>

		<p>
			<button type="submit" name="add_member_submit" id="add_member_submit" class="btn btn-primary btn-lg js-btn-loading" data-loading-text="Adding..."><i class="fa fa-user-plus pd-r-5"></i> <?php print $this->lang->line('add_member'); ?></button>
		</p>

		<?php print form_close() ."\r\n"; ?>
	</div>
</div>