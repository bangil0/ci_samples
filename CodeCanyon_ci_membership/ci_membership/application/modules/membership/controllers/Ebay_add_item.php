<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ebay_add_item extends Private_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Ebay/ebay', '', 'ebay');
        self::$page = "ebay_add_item";
    }

    public function index($site_id = null, $category_id = null)
    {
        $site_id = $site_id == null ? 0 : $site_id;
        $category_id = $category_id == null ? '-1' : $category_id;

        $data['site'] = $this->ebay->get_site($site_id);
        $data['parent_category'] = $this->ebay->get_category($site_id, $category_id);

        $this->template->set_js('js', base_url() . 'assets/js/vendor/jquery.livequery.js');
        $this->quick_page_setup(Settings_model::$db_config['adminpanel_theme'], 'adminpanel', 'Ebay Add_Item', 'ebay_add_item', 'header', 'footer', Settings_model::$db_config['active_theme'], $data);
    }

    public function ajax_dependencies()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $category = $this->input->post('category');
        $output = new stdClass;
        $output->csrfName = $this->security->get_csrf_token_name();
        $output->csrfHash = $this->security->get_csrf_hash();
        $output->data = array(
            //'category' => $this->ebay->get_category($site_id,$category),
            'category' => "asda",

        );
        echo json_encode($output);


    }


}