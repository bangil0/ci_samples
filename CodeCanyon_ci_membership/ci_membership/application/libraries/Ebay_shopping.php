<?php defined('BASEPATH') OR exit('No direct script access allowed');

use \DTS\eBaySDK\Shopping\Services\ShoppingService;
use \DTS\eBaySDK\Shopping\Types;
use \DTS\eBaySDK\Shopping\Enums;
use \DTS\eBaySDK\Constants;


Class Ebay_shopping extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load custom config
        $this->load->config('ebay');
    }

    public function get_ShoppingService()
    {
        // Create headers to send with CURL request.
        $service = new ShoppingService([
            'credentials' => $this->config->item('credentials'),
            'siteId' => Constants\SiteIds::US,
            'sandbox' => $this->config->item('sandbox'),
            'apiVersion' => $this->config->item('shoppingApiVersion'),
            'debug' => $this->config->item('debug'),

        ]);
        return $service;
    }


    public function get_GeteBayTimeRequestType()
    {
        return $request = new Types\GeteBayTimeRequestType();
    }

    public function get_CategoryInfoRequestType()
    {
        return $request = new Types\GetCategoryInfoRequestType();
    }

    public function get_response($response)
    {

        if (isset($response->Errors)) {
            foreach ($response->Errors as $error) {
                $err = array(
                    'SeverityCode' => $error->SeverityCode === DTS\eBaySDK\Shopping\Enums\SeverityCodeType::C_ERROR ? 'Error' : 'Warning',
                    'ShortMessage' => $error->ShortMessage,
                    'LongMessage' => $error->LongMessage
                );
//                var_dump($err);
                return $err;
            }
        }
        if ($response->Ack !== 'Failure') {
            return true;
        } else return false;
    }

    /*
     * Get all categories
     * returns array
     */
    public function get_category($response)
    {
        $category_arr = [];
        $category_arr['#'] = '-- Please Select Category --';
        // Format for passing into form_dropdown function
        foreach ($response->CategoryArray->Category as $category) {
//            var_dump($category);
            if ($category->CategoryLevel != 0) {
                $category_arr[$category->CategoryID] = $category->CategoryName;
            }
        }

        return $category_arr;
    }
}