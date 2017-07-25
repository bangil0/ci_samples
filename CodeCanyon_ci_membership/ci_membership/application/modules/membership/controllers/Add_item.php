<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_item extends Private_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('ebay_shopping');
        self::$page = "add_item";
    }

    public function index() {
        // Create the service object.
        $service = $this->ebay_shopping->get_service_shopping();

        // Create the request object.
        $request = $this->ebay_shopping->get_request_eBayTimeRequest();

        // Send the request.
        $response = $service->geteBayTime($request);

        $checkError = $this->ebay_shopping->get_response($response);

        if(is_array($checkError)){
            $data['check'] = $checkError;
        }
        else if ($checkError == 1){
            $data['response'] = $response;
        }
        $this->quick_page_setup(Settings_model::$db_config['adminpanel_theme'], 'adminpanel', 'Add Item', 'add_item', 'header', 'footer', Settings_model::$db_config['active_theme'], $data);
    }
}