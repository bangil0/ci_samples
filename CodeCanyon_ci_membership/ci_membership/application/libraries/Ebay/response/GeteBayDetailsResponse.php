<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use \DTS\eBaySDK\Shopping\Services\ShoppingService;
use \DTS\eBaySDK\Shopping\Types as S_Types;
use \DTS\eBaySDK\Shopping\Enums as S_Enums;
use \DTS\eBaySDK\Constants;

use \DTS\eBaySDK\Trading\Services\TradingService;
use \DTS\eBaySDK\Trading\Types as T_Types;
use \DTS\eBaySDK\Trading\Enums as T_Enums;


Class GeteBayDetailsResponse extends Private_Controller
{

    protected $CI;
    protected $response;

    public function __construct($response)
    {
        parent::__construct();
        $this->CI =& get_instance();
        $this->response = $response;

    }

    /**
     * Return class name
     * @return string
     */
    public static function className()
    {
        return get_called_class();
    }

    /**
     * Get sites
     * @return SiteDetails[]
     */
    public function getSiteDetails()
    {
        $result = array();

        if (!empty($this->response->SiteDetails)) {
            foreach ($this->response->SiteDetails as $item) {
                //var_dump($item);
                $result[] = new SiteDetails($item);
            }
        }

        return $result;
    }

}

/**
 * Class SiteDetails
 * @package Ebay\responses
 */
class SiteDetails
{
    public $detail_version;
    public $site;
    public $site_id;
    public $update_time;

    public function __construct($response)
    {
        $this->detail_version = $response->DetailVersion;
        $this->update_time = $response->UpdateTime;
        $this->site = $response->Site;
        $this->site_id = $response->SiteID;
    }


}
