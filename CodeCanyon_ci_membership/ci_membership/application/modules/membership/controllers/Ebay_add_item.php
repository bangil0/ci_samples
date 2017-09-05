<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ebay_add_item extends Private_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Ebay/ebay','','ebay');
        self::$page = "ebay_add_item";
    }

    public function index($site_id = null) {

        $data['site'] = $this->ebay->get_site($site_id);
        $this->quick_page_setup(Settings_model::$db_config['adminpanel_theme'], 'adminpanel', 'Ebay Add_Item', 'ebay_add_item', 'header', 'footer', Settings_model::$db_config['active_theme'], $data);

    }
}