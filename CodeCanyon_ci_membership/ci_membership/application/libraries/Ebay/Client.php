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



    /**
     * Initialization api
     *
     * Object cached by internal cache
     * @param Template|null $template
     * @param Http|null $http_client
     * @return Client
     */
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

    /**
     * Set site id
     * @param int $site_id
     */
    public function setSiteId($site_id)
    {
        $this->site_id = $site_id;
    }


}