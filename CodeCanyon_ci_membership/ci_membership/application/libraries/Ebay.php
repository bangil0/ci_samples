<?php defined('BASEPATH') OR exit('No direct script access allowed');

use \DTS\eBaySDK\Shopping\Services;
use \DTS\eBaySDK\Shopping\Types;
use \DTS\eBaySDK\Shopping\Enums;
use \DTS\eBaySDK\Constants;


Class Ebay extends MY_Controller {


    public function __construct()
    {
        parent::__construct();

        // Load custom config
        $this->load->config('ebay');

    }

    public function get_service_shopping(){

        // Create headers to send with CURL request.
        $service = new Services\ShoppingService([
            'credentials' => $this->config->item('credentials'),
            'siteId'      => Constants\SiteIds::US,
            'sandbox'     => $this->config->item('sandbox'),
            'apiVersion' =>  $this->config->item('shoppingApiVersion'),
        ]);

        return $service;
    }

    public function get_request_eBayTimeRequest(){
       return $request =  new Types\GeteBayTimeRequestType();
    }

    public function get_SeverityCodeType(){

        return $severity = new Enums\SeverityCodeType;

    }

    public function get_response($response){

        if (isset($response->Errors)) {

            foreach ($response->Errors as $error) {
                $err = array(
                    'svcode' => $error->SeverityCode === DTS\eBaySDK\Shopping\Enums\SeverityCodeType::C_ERROR ? 'Error' : 'Warning',
                    'shortmsg' => $error->ShortMessage,
                    'longmsg' =>$error->LongMessage
                );

               return $err;
            }

        }

    }
}