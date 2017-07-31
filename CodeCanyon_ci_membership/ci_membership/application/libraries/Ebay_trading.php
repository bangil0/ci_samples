<?php defined('BASEPATH') OR exit('No direct script access allowed');

use \DTS\eBaySDK\Constants;
use \DTS\eBaySDK\Trading\Services;
use \DTS\eBaySDK\Trading\Types;
use \DTS\eBaySDK\Trading\Enums;


Class Ebay_trading extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load custom config
        $this->load->config('ebay');
    }

    public function get_TradingService()
    {
        // Create headers to send with CURL request.
        $service = new Services\TradingService([
            'credentials' => $this->config->item('credentials'),
            'siteId' => Constants\SiteIds::US,
            'sandbox' => $this->config->item('sandbox'),
            'apiVersion' => $this->config->item('tradingApiVersion'),
            'debug' => $this->config->item('debug'),
        ]);
        return $service;
    }

    public function add_item()
    {
        // Create the service object.
        $service = $this->get_TradingService();

        // Create the request object.
        $request = new Types\AddItemRequestType();

        // An user token is required when using the Trading service.
        $request->RequesterCredentials = new Types\CustomSecurityHeaderType();
        $request->RequesterCredentials->eBayAuthToken = $this->config->item('authToken');

        // Begin creating the auction item.
        $item = new Types\ItemType();

        /**
         * We want a single quantity auction.
         * Otherwise known as a Chinese auction.
         */
        $item->ListingType = Enums\ListingTypeCodeType::C_CHINESE;
        $item->Quantity = 1;

        $item->ShippingDetails = new Types\ShippingDetailsType();
        $item->ShippingDetails->ShippingType = Enums\ShippingTypeCodeType::C_FLAT;

        $item->PrimaryCategory = new Types\CategoryType();
        $item->PrimaryCategory->CategoryID = '29792';

        $shippingService = new Types\ShippingServiceOptionsType();
        $shippingService->ShippingServicePriority = 1;
        $shippingService->ShippingService = 'Other';

    }

    public function get_listing_type()
    {
        $reflect = new ReflectionClass(Enums\ListingTypeCodeType::class);
        $arr = $reflect->getConstants();

        $listing_type_arr = [];
        $listing_type_arr[array_keys($arr)[2]] = 'Auction';
        $listing_type_arr[array_keys($arr)[6]] = 'Fixed Price Item';
        return $listing_type_arr;

//        $sub_category_arr = [];
//        foreach ($arr as $fieldKey => $setLater) {
//            $sub_category_arr['Auction'] = $fieldKey[0];
//            $sub_category_arr['Fixed Item'] = $fieldKey[0];
//
//        }
//
//        $auction = array_slice($arr,1, true);
//        $fixeditem = array_slice($arr,6, true);
//
//        return $sub_category_arr;

    }

}