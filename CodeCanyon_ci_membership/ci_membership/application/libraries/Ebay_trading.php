<?php defined('BASEPATH') OR exit('No direct script access allowed');

use \DTS\eBaySDK\Constants;
use \DTS\eBaySDK\Trading\Services;
use \DTS\eBaySDK\Trading\Types;
use \DTS\eBaySDK\Trading\Enums;


Class Ebay_trading extends MY_Controller
{
    protected $error_message = [];

    // Create the service object.
    private $service;

    public function __construct()
    {
        parent::__construct();

        // Load custom config
        $this->load->config('ebay');

        // Create the service object.
        $this->service = $this->get_TradingService();
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

        // Create the request object.
        $request = new Types\AddItemRequestType();

        // An user token is required when using the Trading service.
        $request->RequesterCredentials = new Types\CustomSecurityHeaderType();
        $request->RequesterCredentials->eBayAuthToken = $this->config->item('authToken');


        // Begin creating the auction item.
        $item = new Types\ItemType();

        $item->DispatchTimeMax = 3;
        /**
         * We want a single quantity auction.
         * Otherwise known as a Chinese auction.
         */
        $item->ListingType = Enums\ListingTypeCodeType::C_CHINESE;
        $item->Quantity = 1;

        $item->ProductListingDetails = new Types\ProductListingDetailsType();
        $item->ProductListingDetails->ISBN = $ISBN;
        $item->ProductListingDetails->UPC = $UPC;
        $item->ProductListingDetails->EAN = $EAN;

        $item->ProductListingDetails->BrandMPN = new DTS\eBaySDK\Trading\Types\BrandMPNType();
        $item->ProductListingDetails->BrandMPN->Brand = '';
        $item->ProductListingDetails->BrandMPN->MPN = '';

    }

    public function get_shipping_type()
    {
        $reflect = new ReflectionClass(Enums\ShippingTypeCodeType::class);
        $const = $reflect->getConstants();

        //var_dump($const);
        $shipping_type_arr = [];

        $shipping_type_arr[array_keys($const)[6]] = 'Free';
        // Refer this for free type-> http://developer.ebay.com/devzone/xml/docs/reference/ebay/types/shippingtypecodetype.html
        $shipping_type_arr[array_keys($const)[4]] = 'Flat';
        $shipping_type_arr[array_keys($const)[1]] = 'Calculated';
        $shipping_type_arr[array_keys($const)[5]] = 'Flat Domestic and Calculated International';
        $shipping_type_arr[array_keys($const)[2]] = 'Calculated Domestic and Flat International';
        $shipping_type_arr[array_keys($const)[7]] = 'Freight (over 150 lbs)';

        return $shipping_type_arr;
    }

    public function get_listing_type()
    {
        $reflect = new ReflectionClass(Enums\ListingTypeCodeType::class);
        $arr = $reflect->getConstants();

        $listing_type_arr = [];
        $listing_type_arr[array_keys($arr)[2]] = 'Auction';
        $listing_type_arr[array_keys($arr)[7]] = 'Fixed Price Item';
        $listing_type_arr['multi'] = 'Multi Variation (Fixed Price)'; // This needs to be fix later
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

    public function get_country()
    {
        // GeteBayDetails
        $request = $this->get_eBayDetails('CountryDetails');

        // Send the request.
        $response = $this->service->geteBayDetails($request);
//        var_dump($response);
        // Check errors
        $checkError = $this->get_response($response);

        if ($checkError != 0) {
            if (count($response->CountryDetails)) {
                $country_arr = [];
                $country_arr['#'] = '-- Please Select Country --';
                foreach ($response->CountryDetails as $details) {
//                   var_dump($details);
                    $country_arr[$details->Country] = $details->Description;
                }
                return $country_arr;
            }
        }

    }

    //https://gist.github.com/davidtsadler/ed6aefd59f4ac882cdcd
    public function get_shipping_service($flat = NULL, $calculated = NULL)
    {
        // GeteBayDetails
        $request = $this->get_eBayDetails('ShippingServiceDetails');

        // Send the request.
        $response = $this->service->geteBayDetails($request);

        // Check errors
        $checkError = $this->get_response($response);

        if ($checkError != 0) {
            if (count($response->ShippingServiceDetails)) {
                $shipping_arr = [];
                $shipping_arr['#'] = '-- Please Select Shipping Service --';
                foreach ($response->ShippingServiceDetails as $details) {
                    if ($flat) {
                        //var_dump($details);
                        if ($details->ValidForSellingFlow != 0) {
                            $shipping_arr[$details->ShippingServiceID] = $details->ShippingService;
                        }
                    }
                    if ($calculated) {
                        //var_dump($details->ServiceType);
                        //var_dump(gettype($details->ServiceType));
                        // if(in_array('Calculated', $details->ServiceType)) {

                        foreach ($details->ServiceType as $detail) {
                            if ($detail == $calculated) {
                                if ($details->ValidForSellingFlow != 0) {
                                    //  /(?<! )(?<!^)[A-Z]/
                                    $shippingService = preg_replace('/(?<! )(?<!^)(?<![A-Z])[A-Z]/', ' $0', $details->ShippingService);
                                    $shipping_arr[$details->ShippingServiceID] = $shippingService;
                                }
                            }
                        }

                        /*if($details->ServiceType[1] === $calculated) {
                            if ($details->ValidForSellingFlow != 0) {
                                $shipping_arr[$details->ShippingServiceID] = $details->ShippingService;
                            }
                        }*/
                    }
                }
                return $shipping_arr;
            }
        }
    }

    public function get_eBayDetails($Details)
    {
        // Create the request object.
        $request = new Types\GeteBayDetailsRequestType();

        // An user token is required when using the Trading service.
        $request->RequesterCredentials = new Types\CustomSecurityHeaderType();
        $request->RequesterCredentials->eBayAuthToken = $this->config->item('authToken');
        $request->DetailName = array($Details);

        return $request;
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

                /*
                |--------------------------------------------------------------------------
                | Using custom way to showing error message
                |--------------------------------------------------------------------------
                |
                | Leave the following in this method.
                | $this->set_error($err);
                |
                | Use the following IF statement in controller to set the
                | error function used in view file : generic/flash_error
                |
                | if (!empty($this->ebay_shopping->get_error())) {
                | $data['error'] = $this->ebay_shopping->get_error();
                | }
                |
                */

                $this->session->set_flashdata('ebay_response_error', $err);
            }
        }
        if ($response->Ack !== 'Failure') {
            return true;
        } else return false;
    }

    public function set_error($error)
    {
        $this->error_message = $error;
    }

    public function get_error()
    {
        return $this->error_message;
    }
}