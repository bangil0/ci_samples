<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_dashboard extends Private_Controller {

    public function __construct()
    {

        parent::__construct();
        $this->load->library('ebay');
        self::$page = "my_dashboard";


    }

    public function index() {

        $data = array();

        $service = $this->ebay->get_service_shopping();
        $request = $this->ebay->get_type_eBayTimeRequest();

        $data['response'] = $service->geteBayTime($request);


        $this->quick_page_setup(Settings_model::$db_config['adminpanel_theme'], 'adminpanel', 'My dashboard', 'my_dashboard', 'header', 'footer', Settings_model::$db_config['active_theme'], $data);

    }

}