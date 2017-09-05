<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Ebay extends Private_Controller
{

    protected $CI;

    public function __construct()
    {
        parent::__construct();
        $this->CI =& get_instance();
        $this->CI->load->library('Ebay/objects/site', '', 'site');
    }


    public function get_site($site_id)
    {
        // This actually needs to load from model
        $site_id = $site_id == null ? 0 : $site_id;
        $payment_methods = $this->site->synchronization($site_id);

    }

}