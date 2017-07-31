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

    public function add_auction_item()
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



    }


}