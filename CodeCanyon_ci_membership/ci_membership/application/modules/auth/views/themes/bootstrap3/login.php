<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view('themes/'. Settings_model::$db_config['active_theme'] .'/partials/content_head.php'); ?>

<div class="row">


    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">

        <?php
            $this->load->view('generic/flash_error');
        ?>

        <div>
        <?php $this->load->view('themes/'. Settings_model::$db_config['active_theme'] .'/partials/auth_oauth.php'); ?>
        </div>

        <?php print form_open('auth/login/validate', 'id="login_form" class="mg-b-15"') ."\r\n"; ?>

        <div class="form-group">
            <input type="text"
                name="username"
                id="username"
                class="form-control input-lg"
                placeholder="<?php print $this->lang->line('username'); ?>"
                data-parsley-pattern="^[a-zA-Z0-9_-]+$"
                data-parsley-trigger="change keyup"
                data-parsley-minlength="6"
                data-parsley-maxlength="16"
                required>
        </div>

        <div class="form-group">
            <input type="password"
                   name="password"
                   id="password"
                   class="form-control input-lg"
                   placeholder="<?php print $this->lang->line('password'); ?>"
                   required>
        </div>

        <div class="form-group">
        <?php if (Settings_model::$db_config['remember_me_enabled'] == true) { ?>
            <div class="app-checkbox">
                <label class="pd-r-10">
                    <?php print form_checkbox(array('name' => 'remember_me', 'id' =>'remember_me', 'class' => 'js-select-all-members', 'value' => 'accept', 'checked' => FALSE)); ?>
                    <span class="fa fa-check"></span> <?php print $this->lang->line('login_remember_me'); ?>
                </label>
            </div>
        <?php } ?>
        </div>

        <?php
        if ($this->session->userdata('login_attempts') == false) {
            $v = 0;
        }else{
            $v = $this->session->userdata('login_attempts');
        }

        if ($v >= Settings_model::$db_config['login_attempts']) {
            if (Settings_model::$db_config['recaptchav2_enabled'] == true) {
                //print $this->recaptcha->get_html();
                ?><div class="mg-b-15 mg-t-15"><?php
                echo $this->recaptchav2->render();
                ?></div><?php
            }
        }
        ?>

        <div class="form-group">
            <button type="submit" name="submit" id="login_submit" class="btn btn-primary btn-lg js-btn-loading" data-loading-text="Validating...">
                <i class="fa fa-check pd-r-5"></i> <?php print $this->lang->line('login'); ?>
            </button>
        </div>

        <?php if (Settings_model::$db_config['previous_url_after_login']) { ?>
        <input type="hidden" name="previous_url" value="<?php print base64_encode($this->session->flashdata('previous_url')); ?>">
        <?php } ?>

        <?php print form_close() ."\r\n"; ?>

        <?php $this->load->view('themes/'. Settings_model::$db_config['active_theme'] .'/partials/auth_links'); ?>

    </div>

</div>