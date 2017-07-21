<?php defined('BASEPATH') OR exit('No direct script access allowed');

use \DTS\eBaySDK\Shopping\Services;
use \DTS\eBaySDK\Shopping\Types;
use \DTS\eBaySDK\Constants;


Class Ebay extends MY_Controller {


    public function __construct()
    {
        parent::__construct();

        // Load custom config
        $this->load->config('ebay');

    }

    public function get_service_shopping(){

        $service = new Services\ShoppingService([
            'credentials' => $this->config->item('credentials'),
            'siteId'      => Constants\SiteIds::US,
            'sandbox'     => $this->config->item('sandbox'),
            'apiVersion' =>  $this->config->item('shoppingApiVersion'),
        ]);

        return $service;

    }

    public function get_type_eBayTimeRequest(){
       return $request =  new Types\GeteBayTimeRequestType();
    }


}