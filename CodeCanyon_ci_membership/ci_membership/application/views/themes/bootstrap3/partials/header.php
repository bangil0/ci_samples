<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="header-fixed">

    <header class="navbar header" role="menu">

        <div class="navbar-header">
            <a class="navbar-brand block" href="<?php print base_url(); ?>">
                <i class="fa fa-cubes pull-left pd-r-10"></i>
                <div class="navbar-brand-title">
                    CI <span class="navbar-brand-title-small">Membership <small class="f900 text-primary"><em>v<?php print CIM_VERSION; ?></em></small></span>
                </div>
            </a>
        </div>

        <a href="<?php print base_url(); ?><?php print ($this->session->userdata('logged_in') != false ? "logout" : "login"); ?>" class="btn navbar-btn text-uppercase f700">
            <i class="fa fa-sign-in"></i><span class="pd-l-5 hidden-xs"> <?php print ($this->session->userdata('logged_in') != false ? $this->lang->line('logout') : $this->lang->line('login')); ?></span>
        </a>

        <?php
        if($this->session->userdata('logged_in') == false) {
            ?>
            <a href="<?php print base_url(); ?>register" class="btn navbar-btn text-uppercase f700">
                <i class="fa fa-pencil"></i><span class="pd-l-5 hidden-xs"> Register</span>
            </a>
        <?php }else{ ?>
            <a href="<?php print base_url(); ?>membership/profile" class="btn navbar-btn text-uppercase f700">
                <i class="fa fa-user"></i><span class="pd-l-5 hidden-xs"> Profile</span>
            </a>
            <a href="<?php print base_url(); ?>adminpanel" class="btn navbar-btn text-uppercase f700">
                <i class="fa fa-dashboard"></i><span class="pd-l-5 hidden-xs"> Adminpanel</span>
            </a>
        <?php } ?>

        <a id="js-extramenu" href="javascript:" class="btn navbar-btn pull-right">
            <i class="fa fa-navicon"></i>
        </a>

    </header>

</div>