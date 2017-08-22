<?php defined('BASEPATH') OR exit('No direct script access allowed');

use \DTS\eBaySDK\Constants;
use \DTS\eBaySDK\Trading\Services;
use \DTS\eBaySDK\Trading\Types;
use \DTS\eBaySDK\Trading\Enums;


Class Ebay_trading extends Private_Controller
{

    protected $CI;

    public function __construct()
    {
        parent::__construct();

        // https://www.codeigniter.com/user_guide/general/creating_libraries.html
        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();

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

        $item->ListingDuration = Enums\ListingDurationCodeType::C_DAYS_7;

    }

    public function getConstants($xxxx)
    {
        //http://php.net/manual/en/reflectionclass.getconstants.php
        $reflectionClass = new ReflectionClass($xxxx);
        return $reflectionClass->getConstants();
    }


    public function get_shipping_type()
    {
        $reflect = new ReflectionClass(Enums\ShippingTypeCodeType::class);
        $const = $reflect->getConstants();

        //var_dump($const);
        $shipping_type_arr = [];

        $shipping_type_arr[array_keys($const)[5]] = 'Free';
        // Refer this for free type-> http://developer.ebay.com/devzone/xml/docs/reference/ebay/types/shippingtypecodetype.html
        $shipping_type_arr[array_keys($const)[3]] = 'Flat';
        $shipping_type_arr[array_keys($const)[0]] = 'Calculated';
        $shipping_type_arr[array_keys($const)[4]] = 'Flat Domestic and Calculated International';
        $shipping_type_arr[array_keys($const)[1]] = 'Calculated Domestic and Flat International';
        $shipping_type_arr[array_keys($const)[6]] = 'Freight (over 150 lbs)';

        return $shipping_type_arr;
    }

    public function get_listing_type()
    {
        $reflect = new ReflectionClass(Enums\ListingTypeCodeType::class);
        $arr = $reflect->getConstants();

        $listing_type_arr = [];
        /* $listing_type_arr[array_keys($arr)[1]] = 'Auction';
         $listing_type_arr[array_keys($arr)[6]] = 'Fixed Price Item';*/

        $listing_type_arr['Chinese'] = 'Auction';
        $listing_type_arr['FixedPriceItem'] = 'Fixed Price Item';
        $listing_type_arr['multisku'] = 'Multi Variation (Fixed Price)'; // This needs to be fix later
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

    public function get_listing_duration($categoryID, $Listing_type)
    {
//        Helped link https://stackoverflow.com/questions/8668826/search-and-replace-value-in-php-array
        $this->CI->load->library('ebay_category_features', $categoryID);
        $obj = $this->ebay_category_features->get_ListingDurations($Listing_type);

        $replacements = array
        (
            'Days_1' => '1 Day',
            'Days_10' => '10 Days',
            'Days_120' => '120 Days',
            'Days_14' => '14 Days',
            'Days_21' => '21 Days',
            'Days_3' => '3 Days',
            'Days_30' => '30 Days',
            'Days_5' => '5 Days',
            'Days_60' => '60 Days',
            'Days_7' => '7 Days',
            'Days_90' => '90 Days',
            'GTC' => 'Good Til Cancelled'
        );

        $listing_duration = [];
        $listing_duration['#'] = '-- Please Select --';
        foreach ($obj as $key => $value) {
            if (isset($replacements[$value])) {
                $listing_duration[$value] = $replacements[$value];
            }
        }

        return json_encode($listing_duration);

    }

    public function get_country()
    {
        // GeteBayDetails
        $request = $this->get_eBayDetails('CountryDetails');

        // Send the request.
        $response = $this->trading_service->geteBayDetails($request);
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

    public function get_shipping_service($shipping_type)
    {
        // GeteBayDetails
        $request = $this->get_eBayDetails('ShippingServiceDetails');

        // Send the request.
        $response = $this->trading_service->geteBayDetails($request);

        // Check errors
        $checkError = $this->get_response($response);

        if ($checkError != 0) {
            if (count($response->ShippingServiceDetails)) {
                $shipping_arr = [];
                $shipping_arr['#'] = '-- Please Select Shipping Service --';
                foreach ($response->ShippingServiceDetails as $details) {
                    if ($shipping_type == 'Flat') {
                        //var_dump($details);
                        if ($details->ValidForSellingFlow != 0) {
                            $shipping_arr[$details->ShippingServiceID] = $details->ShippingService;
                        }
                    }
                    if ($shipping_type == 'Calculated') {
                        //var_dump($details->ServiceType);
                        //var_dump(gettype($details->ServiceType));
                        // if(in_array('Calculated', $details->ServiceType)) {

                        foreach ($details->ServiceType as $detail) {
                            if ($detail == $shipping_type) {
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


    public function get_condition_values($categoryID)
    {
        $this->CI->load->library('ebay_category_features', $categoryID);
        $condition_values = $this->ebay_category_features->get_ConditionValues();

        if($condition_values){
            $browse=[];
            $attributes = array(
                'name' => 'item_condition',
                'id' => 'item_condition',
                'value' => '',
                'class' => 'form-control',
                'placeholder' => '',
                'onChange' => "condition_desc_check(this);"
            );
            $browse[] =  form_label('Item Condition', '') .form_dropdown('options', $condition_values, '#', $attributes);

            return $browse;
        }
        else return '';


        //return json_encode($condition_values);

        /*
        |--------------------------------------------------------------------------
        | Check CategoryFeatures
        |--------------------------------------------------------------------------
        | To check ebay category features, please enable to below
        */

        /*$get_value = $this->ebay_category_features->get_value('ConditionEnabled');
        if ($get_value == 'Enabled' || $get_value == 'Required') {
            echo 'Enabled';
        } else {
            return false;
        }*/
    }

    public function get_category_item_specifics($categoryID)
    {
        /*
        |--------------------------------------------------------------------------
        | Refer Link
        |--------------------------------------------------------------------------
        | https://groups.google.com/forum/#!searchin/ebay-sdk-php/GetCategorySpecifics|sort:relevance/ebay-sdk-php/1NkF1rJFzvU/ZXGK-j78tnEJ
        */

        // Create the request object.
        $request = new Types\GetCategorySpecificsRequestType();

        // An user token is required when using the Trading service.
        $request->RequesterCredentials = $this->requester_credentials;

        /**
         * Check Item Specifics are Enabled
         */
        $this->CI->load->library('ebay_category_features', $categoryID);
        $mode = $this->ebay_category_features->get_ItemSpecificsMode();
        //var_dump($$mode);


        if ($categoryID && $mode !== 'Disabled') {
            $request->CategoryID = [$categoryID];
            $response = $this->trading_service->getCategorySpecifics($request);
            // Check errors
            $checkError = $this->get_response($response);
            if ($checkError != 0) {
                if (count($response->Recommendations)) {
                    $name_value_arr = array();
                    foreach ($response->Recommendations as $Recommendation) {
                        foreach ($Recommendation->NameRecommendation as $NameRecommendation) {
                            $values_arr = array();
                            if ($NameRecommendation->ValidationRules->SelectionMode == 'SelectionOnly') {
                                $values_arr['custom']['SelectionOnly'] = true;
                            }

                            if ($NameRecommendation->ValidationRules->MinValues >= 1) {
                                /**
                                 * Required item specifics have * in Name of Specific
                                 */
                                //$name = $NameRecommendation->Name . '<strong>*</strong>';
                                $values_arr['custom']['MinValues'] = true;
                            }

                            /*
                           |--------------------------------------------------------------------------
                           | Finally Helped
                           |--------------------------------------------------------------------------
                           |http://prntscr.com/g5zzn5
                           |https://stackoverflow.com/questions/5421426/php-xml-xpath-node-element-iteration-and-inserting-into-array
                           */

                            $name = $NameRecommendation->Name;

                            foreach ($NameRecommendation->ValueRecommendation as $ValueRecommendation) {
                                $values = (string)$ValueRecommendation->Value;
                                array_push($values_arr, $values);
                                //$converted_values = explode(",",$value);
                                // echo print_r($converted_values);
                            }
                            $name_value_arr[$name] = $values_arr;
                        }
                    }

                    $browse = [];

                    // Helped link : https://stackoverflow.com/questions/19420715/check-if-specific-array-key-exists-in-multidimensional-array-php
                    function findKey($array, $keySearch)
                    {
                        // check if it's even an array
                        if (!is_array($array)) return false;

                        // key exists
                        if (array_key_exists($keySearch, $array)) return true;

                        // key isn't in this array, go deeper
                        foreach ($array as $key => $val) {
                            // return true if it's found
                            if (findKey($val, $keySearch)) return true;
                        }
                        return false;
                    }

                    foreach ($name_value_arr as $key => $value) {

                        $selection_only = findKey($value, 'SelectionOnly');
                        $min_values = findKey($value, 'MinValues');

                        /*   var_dump($min_values);
                           var_dump($value);*/

                        $attributes = array('id' => '', 'class' => 'form-control');
                        $browse[] = form_label(($min_values) ? $key . '<strong>*</strong>' : $key, '') . form_dropdown('options', $value, '#', $attributes);
                    }
                    return $browse;

                }
            }
        } else return false;
    }

    public function get_eBayDetails($Details)
    {
        // Create the request object.
        $request = new Types\GeteBayDetailsRequestType();

        // An user token is required when using the Trading service.
        $request->RequesterCredentials = $this->requester_credentials;
        $request->DetailName = array($Details);

        return $request;
    }


}