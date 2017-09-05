<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Site extends Private_Controller{

    protected $CI;

    public function __construct()
    {
        parent::__construct();

        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();

    }


    public function synchronization($site_id)
    {

         $params = array('service' => 'trading', 'id' => $site_id);
         $this->CI->load->library('Ebay/client',$params,'Client');

         $result = $this->Client->get_ebay_details('SiteDetails');

    }

}