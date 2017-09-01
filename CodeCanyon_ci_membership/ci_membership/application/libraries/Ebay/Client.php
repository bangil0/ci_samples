<?php defined('BASEPATH') OR exit('No direct script access allowed');

use \DTS\eBaySDK\Shopping\Services\ShoppingService;
use \DTS\eBaySDK\Shopping\Types as S_Types;
use \DTS\eBaySDK\Shopping\Enums as S_Enums;
use \DTS\eBaySDK\Constants;

use \DTS\eBaySDK\Trading\Services\TradingService;
use \DTS\eBaySDK\Trading\Types as T_Types;
use \DTS\eBaySDK\Trading\Enums as T_Enums;

Class Client extends Private_Controller
{

    protected $CI;


    public function __construct()
    {
        parent::__construct();
        // Load custom config

        $this->CI =& get_instance();
        $this->CI->load->config('ebay');
    }


    public static function service($service, $site_id)
    {
        if ($service == 'trading') {
            // Create headers to send with CURL request.
            $trading = new TradingService([
                'credentials' => $this->config->item('credentials'),
                'siteId' => $site_id,
                'sandbox' => $this->config->item('sandbox'),
                'apiVersion' => $this->config->item('tradingApiVersion'),
                'debug' => $this->config->item('debug'),
            ]);
            return $trading;
        }

        if ($service == 'shopping') {

            // Create headers to send with CURL request.
            $shopping = new ShoppingService([
                'credentials' => $this->config->item('credentials'),
                'siteId' => $site_id,
                'sandbox' => $this->config->item('sandbox'),
                'apiVersion' => $this->config->item('shoppingApiVersion'),
                'debug' => $this->config->item('debug'),

            ]);
            return $shopping;

        }

    }



}