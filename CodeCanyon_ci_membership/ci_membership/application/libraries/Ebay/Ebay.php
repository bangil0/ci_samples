<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Ebay extends Private_Controller
{

    protected $CI;

    public function __construct()
    {
        parent::__construct();
        $this->CI =& get_instance();
        $this->CI->load->library('Ebay/objects/site', '', 'site');
        $this->CI->load->library('Ebay/objects/category', '', 'category');
        $this->CI->load->model('membership/ebay_model');
    }


    public function get_site($site_id)
    {
        $site = $this->ebay_model->get_site();
//        $site = $this->site->synchronization($site_id);
        return $site;
    }

    public function get_objects_needed_synchronization($site_id, $category_id = null)
    {
        $result = array(
            'Site' => $this->site->isNeedSynchronization(),
        );

    }

    public function get_category($site_id, $category_id)
    {
        return $this->category->synchronization($site_id, $category_id);
    }

}