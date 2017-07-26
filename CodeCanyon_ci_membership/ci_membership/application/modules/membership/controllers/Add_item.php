<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Add_item extends Private_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('ebay_shopping');
        self::$page = "add_item";
    }

    public function index()
    {

        // Create the service object.
        $service = $this->ebay_shopping->get_ShoppingService();

        // Create the request object.0
        $request = $this->ebay_shopping->get_CategoryInfoRequestType();
        $request->CategoryID = '-1';
        $request->IncludeSelector = 'ChildCategories';

        // Send the request.
        $response = $service->getCategoryInfo($request);

        // Check errors
        $checkError = $this->ebay_shopping->get_response($response);

        if (is_array($checkError)) {
            $data['check'] = $checkError;
        } else if ($checkError == 1) {
            $data['category'] = $this->ebay_shopping->get_category($response);
        }

        $this->quick_page_setup(Settings_model::$db_config['adminpanel_theme'], 'adminpanel', 'Add Item', 'add_item', 'header', 'footer', Settings_model::$db_config['active_theme'], $data);
    }


    public function get_sub_category()
    {
        if ($this->input->is_ajax_request()) {

            $output = new stdClass;
            $output->csrfName = $this->security->get_csrf_token_name();
            $output->csrfHash = $this->security->get_csrf_hash();
//            $output->data = $this->input->post('category_id');
            $output->data =  array(
                'category' => $this->input->post('category_id'),
            );
            echo json_encode($output);

        } else {
            echo false;
        }
    }
}