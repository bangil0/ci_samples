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

    public function __construct($categoryID)
    {
        parent::__construct();
        $this->categoryID = $categoryID;
        $this->CategoryFeatures();
    }

    public function CategoryFeatures()
    {

        if ($this->categoryID) {
            // Create the request object.
            $request = new Types\GetCategoryFeaturesRequestType();

            // An user token is required when using the Trading service.
            $request->RequesterCredentials = $this->requester_credentials;

            //ask for a single category
            $request->DetailLevel = ['ReturnAll', 'ReturnSummary'];
            $request->CategoryID = $this->categoryID;
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
                'ConditionValues'
            ];

            $response = $this->trading_service->getCategoryFeatures($request);

            // Check errors
            $checkError = $this->get_response($response);

            if ($checkError != 0) {

                $category_features = [];

                foreach ($response->Category as $details) {
                    //var_dump($details);
                    $category_features['BrandMPNIdentifierEnabled'] = $details->BrandMPNIdentifierEnabled;
                    $category_features['EANEnabled'] = $details->EANEnabled;
                    $category_features['UPCEnabled'] = $details->UPCEnabled;
                    $category_features['ISBNEnabled'] = $details->ISBNEnabled;
                    $category_features['ItemSpecificsEnabled'] = $details->ItemSpecificsEnabled;
                    $category_features['VariationsEnabled'] = $details->VariationsEnabled;
                    $category_features['ConditionEnabled'] = $details->ConditionEnabled;
                    $category_features['ConditionValues'] = $details->ConditionValues;
                }
                $this->category_features = $category_features;
            }

            return $response->Category;
        } else return false;
    }

    public function get_value($FeatureID)
    {
        $category_arr = $this->category_features;
        if (array_key_exists($FeatureID, $category_arr)) {
            return $category_arr[$FeatureID];
            /*foreach ($category_arr as $key => $details) {
                if ($key == $FeatureID) {
                    return $details;
                }
            }*/
        } else return false;

        /*  $category_arr = $this->category_features;
          if (!isset($category_arr)) {
              return false;
          }
          else {
              foreach ($category_arr as $key=>$details) {
                 if($key == $FeatureID ){
                     return $details;
                 }
              }
          }*/
    }

    public function get_ConditionValues()
    {
        $get_value = $this->get_value('ConditionEnabled');
        $response = $this->CategoryFeatures();
        if ($get_value == 'Enabled' || $get_value == 'Required') {
            $condition_values = [];
            foreach ($response as $details) {
                //var_dump($details);
                foreach ($details->ConditionValues->Condition as $Condition) {
                    //var_dump($Condition);
                    $condition_values[$Condition->ID] = $Condition->DisplayName;
                }
            }
            return $condition_values;
        } else {
            return false;
        }
    }


}