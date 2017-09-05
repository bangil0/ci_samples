<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use \DTS\eBaySDK\Shopping\Services\ShoppingService;
use \DTS\eBaySDK\Shopping\Types as S_Types;
use \DTS\eBaySDK\Shopping\Enums as S_Enums;
use \DTS\eBaySDK\Constants;

use \DTS\eBaySDK\Trading\Services\TradingService;
use \DTS\eBaySDK\Trading\Types as T_Types;
use \DTS\eBaySDK\Trading\Enums as T_Enums;

Class GeteBayDetailsRequest extends Private_Controller
{

    protected $CI;

    /** @var array  */
    protected $details = array();


    public function __construct($details)
    {
        parent::__construct();
        $this->CI =& get_instance();
        $this->details = (array) $details;
    }


    public function request()
    {
        // Create the request object.
        $request = new T_Types\GeteBayDetailsRequestType();

        // An user token is required when using the Trading service.
        $request->RequesterCredentials = new T_Types\CustomSecurityHeaderType();
        $request->RequesterCredentials->eBayAuthToken = $this->config->item('authToken');
        $request->DetailName = $this->details;

        return $request;
    }


}

