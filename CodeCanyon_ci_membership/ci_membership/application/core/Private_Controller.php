<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


use \DTS\eBaySDK\Shopping\Services\ShoppingService;
use \DTS\eBaySDK\Shopping\Types as S_Types;
use \DTS\eBaySDK\Shopping\Enums as S_Enums;
use \DTS\eBaySDK\Constants;

use \DTS\eBaySDK\Trading\Services\TradingService;
use \DTS\eBaySDK\Trading\Types as T_Types;
use \DTS\eBaySDK\Trading\Enums as T_Enums;


class Private_Controller extends Site_Controller
{

    protected $error_message = [];

    public $shopping_service;
    public $trading_service;
    public $requester_credentials;

    public function __construct()
    {
        parent::__construct();
        $this->lang->load('private');

########################################################
        // Load custom config
        $this->load->config('ebay');


        // Create the service object.
        if (!isset($this->shopping_service))
        {
            $this->shopping_service = $this->get_ShoppingService();
        }

        if (!isset($this->trading_service))
        {
            $this->trading_service = $this->get_TradingService();
        }

        if (!isset($this->requester_credentials))
        {
            $this->requester_credentials = $this->get_RequesterCredentials();
        }
########################################################

        $this->output->set_header("HTTP/1.0 200 OK");
        $this->output->set_header("HTTP/1.1 200 OK");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        $this->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');

        $this->load->helper('cookie');
        $cookie_domain = config_item('cookie_domain');

        // credentials are missing?
        if (!$this->session->userdata('logged_in') && get_cookie('unique_token') != "") {

            // check cookie data
            $this->load->model('utils/set_cookies_model');
            $cookie = get_cookie('unique_token');
            $a = substr($cookie, 0, 32);
            $b = substr($cookie, 42, 74);
            $data = $this->set_cookies_model->load_session_vars($a, $b);

            if (!empty($data)) {
                // check banned and active
                if ($data->banned != 0) {
                    $this->session->set_flashdata('error', '<p>You are banned.</p>');
                    setcookie("unique_token", null, time() - 60 * 60 * 24 * 3, '/', $cookie_domain, false, false);
                    redirect("login");
                } elseif ($data->active != 1) {
                    $this->session->set_flashdata('error', '<p>Your acount is inactive.</p>');
                    setcookie("unique_token", null, time() - 60 * 60 * 24 * 3, '/', $cookie_domain, false, false);
                    redirect("login");
                }

                // renew cookie
                setcookie("unique_token", get_cookie('unique_token'), time() + Settings_model::$db_config['cookie_expires'], '/', $cookie_domain, false, false);

                // set session data
                $this->session->set_userdata('logged_in', true);
                $this->session->set_userdata('user_id', $data->user_id);
                $this->session->set_userdata('username', $data->username);

                // get permissions
                $this->permissions_roles($data->user_id);

                redirect('membership/' . strtolower(Settings_model::$db_config['home_page']));
            } else {
                setcookie("unique_token", null, time() - 60 * 60 * 24 * 3, '/', $cookie_domain, false, false);
                redirect("login");
            }

        } elseif (!$this->session->userdata('logged_in') && !get_cookie('unique_token')) {
            setcookie("unique_token", null, time() - 60 * 60 * 24 * 3, '/', $cookie_domain, false, false);
            redirect("login");
        }


        // get permissions when session is present, too but then from session in stead of query
        //$this->permissions_roles($this->session->userdata('user_id'));

    }

    public function get_ShoppingService()
    {
        // Create headers to send with CURL request.
        $service = new ShoppingService([
            'credentials' => $this->config->item('credentials'),
            'siteId' => Constants\SiteIds::US,
            'sandbox' => $this->config->item('sandbox'),
            'apiVersion' => $this->config->item('shoppingApiVersion'),
            'debug' => $this->config->item('debug'),

        ]);
        return $service;
    }


    public function get_TradingService()
    {
        // Create headers to send with CURL request.
        $service = new TradingService([
            'credentials' => $this->config->item('credentials'),
            'siteId' => Constants\SiteIds::US,
            'sandbox' => $this->config->item('sandbox'),
            'apiVersion' => $this->config->item('tradingApiVersion'),
            'debug' => $this->config->item('debug'),
        ]);
        return $service;
    }

    public function get_RequesterCredentials()
    {

        $RequesterCredentials = new T_Types\CustomSecurityHeaderType();
        $RequesterCredentials->eBayAuthToken = $this->config->item('authToken');

        return $RequesterCredentials;

    }

    public function get_response($response)
    {
        if (isset($response->Errors)) {
            foreach ($response->Errors as $error) {
                $err = array(
                    'SeverityCode' => $error->SeverityCode === Enums\SeverityCodeType::C_ERROR ? 'Error' : 'Warning',
                    'ShortMessage' => $error->ShortMessage,
                    'LongMessage' => $error->LongMessage
                );

                /*
                |--------------------------------------------------------------------------
                | Using custom way to showing error message
                |--------------------------------------------------------------------------
                |
                | Leave the following in this method.
                | $this->set_error($err);
                |
                | Use the following IF statement in controller to set the
                | error function used in view file : generic/flash_error
                |
                | if (!empty($this->ebay_shopping->get_error())) {
                | $data['error'] = $this->ebay_shopping->get_error();
                | }
                |
                */

                $this->session->set_flashdata('ebay_response_error', $err);
            }
        }
        if ($response->Ack !== 'Failure') {
            return true;
        } else return false;
    }

    public function set_error($error)
    {
        $this->error_message = $error;
    }

    public function get_error()
    {
        return $this->error_message;
    }

}
