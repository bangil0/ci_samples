<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_dashboard extends Private_Controller {

    public function __construct()
    {

        parent::__construct();
        $this->load->library('ebay');
        self::$page = "my_dashboard";

    }

    public function index() {


        // Create the service object.
        $service = $this->ebay->get_service_shopping();

        // Create the request object.
        $request = $this->ebay->get_request_eBayTimeRequest();

//        $data['response'] = $service->geteBayTime($request);

        $response = $service->geteBayTime($request);

        $check = $this->ebay->get_response($response);

        if(is_array($check)){
            $data['check'] = $check;
        }

        else if ($check == 1){
            $data['response'] = $response;
        }


        $this->quick_page_setup(Settings_model::$db_config['adminpanel_theme'], 'adminpanel', 'My dashboard', 'my_dashboard', 'header', 'footer', Settings_model::$db_config['active_theme'], $data);

    }

}