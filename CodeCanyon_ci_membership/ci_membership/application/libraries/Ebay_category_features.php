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
    private $categoryID = null;
    private $BrandMPNIdentifierEnabled = null;
    private $EANEnabled = null;
    private $ISBNEnabled = null;
    private $UPCEnabled = null;
    private $ItemSpecificsEnabled = null;
    private $VariationsEnabled = null;
    private $ConditionEnabled = null;

    public function __construct($categoryID)
    {
        parent::__construct();
        $this->categoryID = $categoryID;
        $this->setCategoryFeatures();
    }

    public function setCategoryFeatures()
    {

        if ($this->categoryID) {
            // Create the request object.
            $request = new Types\GetCategoryFeaturesRequestType();

            // An user token is required when using the Trading service.
            $request->RequesterCredentials = $this->requesterCredentials;

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
                'ConditionEnabled'];

            $response = $this->service->getCategoryFeatures($request);

            // Check errors
            $checkError = $this->get_response($response);

            if ($checkError != 0) {
                foreach ($response->Category as $details) {
                    $this->BrandMPNIdentifierEnabled = $details->BrandMPNIdentifierEnabled;
                    $this->EANEnabled = $details->EANEnabled;
                    $this->ISBNEnabled = $details->ISBNEnabled;
                    $this->UPCEnabled = $details->UPCEnabled;
                    $this->ItemSpecificsEnabled = $details->ItemSpecificsEnabled;
                    $this->VariationsEnabled = $details->VariationsEnabled;
                    $this->ConditionEnabled = $details->ConditionEnabled;
                }
            }

        } else return false;
    }


}