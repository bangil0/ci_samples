<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Ebay extends Private_Controller{

    protected $CI;

    public function __construct()
    {
        parent::__construct();
        $this->CI =& get_instance();
        $this->CI->load->library('site');

    }



    public static function get_site($site_id){

        //This actually needed to load from library..
        return "asdssssssssssssss";
    }

}