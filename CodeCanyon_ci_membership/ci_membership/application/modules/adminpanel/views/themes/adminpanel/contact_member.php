<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view('themes/'. Settings_model::$db_config['adminpanel_theme'] .'/partials/content_head.php'); ?>

<?php $this->load->view('generic/flash_error'); ?>



<?php print form_open('adminpanel/contact_member/send_message', 'id="" autocomplete="off"') ."\r\n"; ?>

<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="form-group">
            <label for="message"><?php print $this->lang->line('contact_member_message') . $email; ?></label>
            <textarea name="message" id="message" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg js-btn-loading" data-loading-text="Sending..."><i class="fa fa-envelope-o pd-r-5"></i> Send message</button>
            <input type="hidden" name="user_id" value="<?php print $this->uri->segment(3); ?>">
            <input type="hidden" name="email" value="<?php print $email; ?>">
        </div>
    </div>
</div>




<?php print form_close() ."\r\n"; ?>