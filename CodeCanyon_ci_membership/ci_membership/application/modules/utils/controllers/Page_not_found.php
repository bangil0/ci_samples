<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_not_found extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->quick_page_setup(Settings_model::$db_config['active_theme'], 'main', $this->lang->line('pnf_title'), 'page_not_found', 'header', 'footer');
        $this->output->set_status_header('404'); // setting header to 404
    }
}


