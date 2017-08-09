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

Class Ebay_category_features extends MY_Controller
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
                return $response->Category;
            }

        } else return false;
    }

    /**
     * @return null
     */
    public function getCategoryID()
    {
        return $this->categoryID;
    }

    /**
     * @param null $categoryID
     */
    public function setCategoryID($categoryID)
    {
        $this->categoryID = $categoryID;
    }

    /**
     * @return null
     */
    public function getBrandMPNIdentifierEnabled()
    {
        return $this->BrandMPNIdentifierEnabled;
    }

    /**
     * @param null $BrandMPNIdentifierEnabled
     */
    public function setBrandMPNIdentifierEnabled($BrandMPNIdentifierEnabled)
    {
        $this->BrandMPNIdentifierEnabled = $BrandMPNIdentifierEnabled;
    }

    /**
     * @return null
     */
    public function getEANEnabled()
    {
        return $this->EANEnabled;
    }

    /**
     * @param null $EANEnabled
     */
    public function setEANEnabled($EANEnabled)
    {
        $this->EANEnabled = $EANEnabled;
    }

    /**
     * @return null
     */
    public function getISBNEnabled()
    {
        return $this->ISBNEnabled;
    }

    /**
     * @param null $ISBNEnabled
     */
    public function setISBNEnabled($ISBNEnabled)
    {
        $this->ISBNEnabled = $ISBNEnabled;
    }

    /**
     * @return null
     */
    public function getUPCEnabled()
    {
        return $this->UPCEnabled;
    }

    /**
     * @param null $UPCEnabled
     */
    public function setUPCEnabled($UPCEnabled)
    {
        $this->UPCEnabled = $UPCEnabled;
    }

    /**
     * @return null
     */
    public function getItemSpecificsEnabled()
    {
        return $this->ItemSpecificsEnabled;
    }

    /**
     * @param null $ItemSpecificsEnabled
     */
    public function setItemSpecificsEnabled($ItemSpecificsEnabled)
    {
        $this->ItemSpecificsEnabled = $ItemSpecificsEnabled;
    }

    /**
     * @return null
     */
    public function getVariationsEnabled()
    {
        return $this->VariationsEnabled;
    }

    /**
     * @param null $VariationsEnabled
     */
    public function setVariationsEnabled($VariationsEnabled)
    {
        $this->VariationsEnabled = $VariationsEnabled;
    }

    /**
     * @return null
     */
    public function getConditionEnabled()
    {
        return $this->ConditionEnabled;
    }

    /**
     * @param null $ConditionEnabled
     */
    public function setConditionEnabled($ConditionEnabled)
    {
        $this->ConditionEnabled = $ConditionEnabled;
    }


}