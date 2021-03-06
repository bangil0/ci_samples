<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_dashboard extends Private_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('ebay_shopping');
        self::$page = "my_dashboard";
    }

    public function index() {
        // Create the service object.
        $service = $this->ebay_shopping->get_ShoppingService();

        // Create the request object.
        $request = $this->ebay_shopping->get_GeteBayTimeRequestType();

//        $data['response'] = $service->geteBayTime($request);
        $response = $service->geteBayTime($request);

        $checkError = $this->ebay_shopping->get_response($response);

        if(is_array($checkError)){
            $data['check'] = $checkError;
        }
        else if ($checkError == 1){
            $data['response'] = $response;
        }
        $this->quick_page_setup(Settings_model::$db_config['adminpanel_theme'], 'adminpanel', 'My dashboard', 'my_dashboard', 'header', 'footer', Settings_model::$db_config['active_theme'], $data);
    }
}