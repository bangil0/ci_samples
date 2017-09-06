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
    private $site_id;
    private $service;


    public function __construct($params)
    {
        //var_dump($params);
        parent::__construct();

        $this->CI =& get_instance();
        $this->site_id = $params['id'];
        $this->service = $this->set_service($params['service']);

    }

    private function set_service($service)
    {
        if ($service == 'trading') {
            return $this->service_trading();
        }
        if ($service == 'shopping') {
            return $this->service_shopping();
        }

    }

    /**
     * Initialization api
     */
    private function service_trading()
    {
        $trading = new TradingService([
            'credentials' => $this->config->item('credentials'),
            'siteId' => $this->site_id,
            'sandbox' => $this->config->item('sandbox'),
            'apiVersion' => $this->config->item('tradingApiVersion'),
            'debug' => $this->config->item('debug'),
        ]);

        return $trading;
    }

    private function service_shopping()
    {
        $shopping = new ShoppingService([
            'credentials' => $this->config->item('credentials'),
            'siteId' => $this->site_id,
            'sandbox' => $this->config->item('sandbox'),
            'apiVersion' => $this->config->item('shoppingApiVersion'),
            'debug' => $this->config->item('debug'),

        ]);
        return $shopping;

    }


    /**
     * Set site id
     * @param int $site_id
     */
    public function set_site_id($site_id)
    {
        $this->site_id = $site_id;
    }


    /**
     * Get meta-data for the specified eBay site
     *
     * @param string|array $details
     * @see http://developer.ebay.com/Devzone/XML/docs/Reference/ebay/GeteBayDetails.html
     */

    public function get_ebay_details($details)
    {
        $this->CI->load->library('Ebay/request/GeteBayDetailsRequest', $details, 'GeteBayDetailsRequest');
        $this->CI->load->library('Ebay/response/GeteBayDetailsResponse', '', 'GeteBayDetailsResponse');

        $request = $this->GeteBayDetailsRequest->request();
        $response_class = GeteBayDetailsResponse::className();

        return $this->make_request($request, $response_class);

    }

    private function make_request($request, $response_class)
    {
        // Send the request.
        $response = $this->service->geteBayDetails($request);

        if (isset($response->Errors)) {
            foreach ($response->Errors as $error) {
                $err = array(
                    'SeverityCode' => $error->SeverityCode === T_Enums\SeverityCodeType::C_ERROR ? 'Error' : 'Warning',
                    'ShortMessage' => $error->ShortMessage,
                    'LongMessage' => $error->LongMessage
                );

                $this->session->set_flashdata('ebay_response_error', $err);
            }
        }
        if ($response->Ack !== 'Failure') {
            return new $response_class($response);
        }

    }

}