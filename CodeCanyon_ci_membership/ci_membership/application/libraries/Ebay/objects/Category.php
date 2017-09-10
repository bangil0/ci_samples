<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'libraries/Ebay/Client.php');

Class Category extends Private_Controller
{
    protected $CI;

    public function __construct()
    {
        parent::__construct();

        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();
        $this->CI->load->model('membership/ebay_model');

    }

    /**
     * Check needle synchronization sites from ebay
     */
    public function synchronization($site_id, $category_id)
    {
        $params = array('service' => 'shopping', 'id' => $site_id);
        /*$this->CI->load->library('Ebay/client', $params, 'Client');
        $result = $this->Client->get_categories();*/

        $client = new Client($params);
        $result = $client->get_categories($category_id);
        $categories = $result->get_categories();

        $data = array();
        $data['#'] = '-- Select --';
        if (!empty($categories)) {
            foreach ($categories as $value) {
                $data[$value->category_id] = $value->category_name;
            }
        }

        $category_version = $result->get_category_version();
        $versions = $this->get_category_version();

        if (empty($versions[$site_id]) || $versions[$site_id] != $category_version) {
            $this->set_category_version($site_id, $category_version);
        }

        return $data;
    }

    private function get_category_version()
    {
        $result = $this->ebay_model->get_storage_data('ebay_category_version');
        $result = json_decode($result, true);

        if (!is_array($result)) {
            $result = array();
        }

        return $result;
    }

    /**
     * Set ebay category version
     * @param int $site_id
     * @param string $version
     */
    private function set_category_version($site_id, $version){

        $data =  $this->get_category_version();
        $data[$site_id] = $version;
//        var_dump(json_encode($data));
        $this->ebay_model->set_storage_data('ebay_category_version', json_encode($data));

    }



}