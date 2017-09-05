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
     */
    public function getSiteDetails()
    {
        $result = array();
        var_dump($this->response->SiteDetails);

        if (!empty($this->response->SiteDetails)) {
            foreach ($this->response->SiteDetails as $item) {
                $result[] = "asds";
            }
        }

        return $result;
    }



}

