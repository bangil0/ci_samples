<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Site extends Private_Controller{

    protected $CI;

    public function __construct()
    {
        parent::__construct();

        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();
        $this->CI->load->library('ebay/client','','client');

    }

    /**
     * Update sites from ebay
     * @throws \Exception
     */
    public function synchronization($site_id)
    {

       // $payment_methods = $this->client->service('trading');

         $client = Client::service('trading',$site_id);
         return $client;


    }

}