<?php defined('BASEPATH') OR exit('No direct script access allowed');

use \DTS\eBaySDK\Constants;
use \DTS\eBaySDK\Trading\Services;
use \DTS\eBaySDK\Trading\Types;
use \DTS\eBaySDK\Trading\Enums;

/*
|--------------------------------------------------------------------------
| Refer
|--------------------------------------------------------------------------
| https://forums.developer.ebay.com/questions/13385/help-urgent-error-the-item-specific-mpna-is-missin.html#answer-13387
|
*/

Class Ebay_category_features extends Private_Controller
{
    public $categoryID = null;
    /*    public $BrandMPNIdentifierEnabled = null;
        public $EANEnabled = null;
        public $ISBNEnabled = null;
        public $UPCEnabled = null;
        public $ItemSpecificsEnabled = null;
        public $VariationsEnabled = null;
        public $ConditionEnabled = null;*/
    public $category_features = array();
    public $site_defaults = array();
    public $response_result = array();

    public function __construct($categoryID)
    {
        parent::__construct();
        $this->categoryID = $categoryID;
        // $this->CategoryFeatures();
    }

    public function CategoryFeatures()
    {
        if ($this->categoryID) {
            // Create the request object.
            $request = new Types\GetCategoryFeaturesRequestType();

            // An user token is required when using the Trading service.
            $request->RequesterCredentials = $this->requester_credentials;

            //ask for a single category
            $request->CategoryID = $this->categoryID;
            $request->DetailLevel = ['ReturnAll'];
            $request->ViewAllNodes = true;
            $request->AllFeaturesForCategory = true;
            /*
            |--------------------------------------------------------------------------
            | Refer
            |--------------------------------------------------------------------------
            |
            | https://forums.developer.ebay.com/questions/13385/help-urgent-error-the-item-specific-mpna-is-missin.html#answer-13387
            | http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/GetCategoryFeatures.html
            |
            */

            $request->FeatureID = [
                'BrandMPNIdentifierEnabled',
                'EANEnabled',
                'ISBNEnabled',
                'UPCEnabled',
                'ItemSpecificsEnabled',
                'VariationsEnabled',
                'ConditionEnabled',
                'ConditionValues',
                'ListingDurations'
            ];

            $response = $this->trading_service->getCategoryFeatures($request);

            // Check errors
            $checkError = $this->get_response($response);
            if ($checkError != 0) {
                //var_dump($response);
                return $response;
            }

        } else return false;
    }

    public function get_ListingDurations($Listing_type)
    {
        $response = $this->CategoryFeatures();
        //var_dump($response->SiteDefaults);
        foreach ($response->SiteDefaults->ListingDuration as $details) {
            // var_dump($details);
        }

        $durationSet_arr = [];
        foreach ($response->FeatureDefinitions->ListingDurations->ListingDuration as $details) {
            //var_dump($details);
            $durationSet_arr[$details->durationSetID] = $details->Duration;
        }
        //var_dump($durationSet_arr);

        foreach ($response->Category as $details) {
            //var_dump($details);
            foreach ($details->ListingDuration as $Duration) {
                //var_dump($Duration);
                if ($Duration->type == $Listing_type) {
                    $duration_value = $Duration->value;
                    if (array_key_exists($duration_value, $durationSet_arr)) {
                        return $durationSet_arr[$duration_value];
                        //https://developer.ebay.com/devzone/xml/docs/reference/ebay/types/ListingDurationCodeType.html
                    }

                }

            }
        }
    }

    public function get_ItemSpecificsEnabled()
    {
        $response = $this->CategoryFeatures();
        /**
         * Mode checking (Enabled, Disabled or Required). If mode not available, then assign site default value.
         */
        foreach ($response->Category as $details) {
            $mode = ($details->ItemSpecificsEnabled) ? $details->ItemSpecificsEnabled : $response->SiteDefaults->ItemSpecificsEnabled;
            return $mode;
        }
    }

    public function get_ConditionValues()
    {
        $response = $this->CategoryFeatures();
        foreach ($response->Category as $details) {
            /**
             * Mode checking (Enabled, Disabled or Required). If mode not available, then assign site default value.
             */
            $mode = ($details->ConditionEnabled) ? $details->ConditionEnabled : $response->SiteDefaults->ConditionEnabled;
            if ($mode !== 'Disabled') {
                $condition_values = [];
                $condition_values['#'] = '-- Please Select --';
                foreach ($details->ConditionValues->Condition as $Condition) {
                    //var_dump($Condition);
                    $condition_values[$Condition->ID] = $Condition->DisplayName;
                }
                return $condition_values;
            } else {
                return false;
            }
        }
    }



}