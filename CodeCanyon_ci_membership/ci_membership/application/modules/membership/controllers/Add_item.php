<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Add_item extends Private_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('ebay_shopping');
        $this->load->library('ebay_trading');
        self::$page = "add_item";
    }

    public function index()
    {
        $data['category'] = $this->ebay_shopping->get_parent_category();
        $data['listing_type'] = $this->ebay_trading->get_listing_type();
        $data['shipping_type'] = $this->ebay_trading->get_shipping_type();
        $data['shipping_service'] = $this->ebay_trading->get_shipping_service('','Calculated');
        $data['country'] = $this->ebay_trading->get_country();
        $data['prd_identifier_type'] = array('ISBN' => 'ISBN', 'UPC'=>'UPC', 'EAN'=>'EAN', 'MPN'=> 'Brand+MPN ' );



        $data['category_features'] = $this->ebay_trading->get_CategoryFeatures('15687');
        $data['category_item_specifics'] = $this->ebay_trading->get_category_item_specifics( array('15687'));
        //var_dump( $data['category_item_specifics']);


        if (!empty($this->ebay_shopping->get_error())) {
            $data['error'] = $this->ebay_shopping->get_error();
        }

        /*  // Create the service object.
          $service = $this->ebay_shopping->get_ShoppingService();

          // Create the request object.
          $request = $this->ebay_shopping->get_CategoryInfoRequestType();
          $request->CategoryID = '-1';
          $request->IncludeSelector = 'ChildCategories';

          // Send the request.
          $response = $service->getCategoryInfo($request);

          //var_dump($response) ;

          // Check errors
          $checkError = $this->ebay_shopping->get_response($response);

          if (is_array($checkError)) {
              $data['check'] = $checkError;
          } else if ($checkError != 0) {
              $data['category'] = $this->ebay_shopping->get_category($response);
          }*/

        $this->template->set_js('js', base_url() . 'assets/js/vendor/jquery.livequery.js');
        $this->quick_page_setup(Settings_model::$db_config['adminpanel_theme'], 'adminpanel', 'Add Item', 'add_item', 'header', 'footer', Settings_model::$db_config['active_theme'], $data);

    }

    public function add()
    {
        //Validate form input
        $this->form_validation->set_error_delimiters('<p>', '</p>');
        $this->form_validation->set_rules('product_title', 'Title', 'trim|required|max_length[80]|min_length[2]');
        $this->form_validation->set_rules('product_subtitle', 'Subtitle', 'trim|max_length[55]|min_length[2]');
        $this->form_validation->set_rules('description', 'Description', 'trim');
        $this->form_validation->set_rules('prd_identifier', 'Product Identifier', 'trim|max_length[25]|min_length[2]');
        $this->form_validation->set_rules('prd_identifier_type', 'Product Identifier Type', 'trim');
        $this->form_validation->set_rules('product_brand_mpn', 'Product Brand', 'trim|max_length[25]|min_length[2]');

        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('error', validation_errors());
            $this->session->set_flashdata($_POST);
            redirect('/membership/add_item/');
            exit();
        }

        //Refer dating home controller
        $data_array = array(
            'product_title' => strip_tags($this->input->post('product_title')),
            'product_subtitle' => strip_tags($this->input->post('product_subtitle')),
            'description' => $this->input->post('description'),
            'prd_identifier' => $this->input->post('prd_identifier'),
            'prd_identifier_type' => $this->input->post('prd_identifier_type'),
            'product_brand_mpn' => $this->input->post('product_brand_mpn'),
        );

    }

    public function sub_category()
    {
        /*    $subcategory = '';

            // Create the service object.
            $service = $this->ebay_shopping->get_ShoppingService();

            // Create the request object.0
            $request = $this->ebay_shopping->get_CategoryInfoRequestType();
            $request->CategoryID = $categoryID;
            $request->IncludeSelector = 'ChildCategories';

            // Send the request.
            $response = $service->getCategoryInfo($request);

            // Check errors
            $checkError = $this->ebay_shopping->get_response($response);

            if (is_array($checkError)) {
                $data['check'] = $checkError;
            } else if ($checkError == 1) {
                $subcategory = $this->ebay_shopping->get_sub_category($response, $categoryID);

            }*/
        if ($this->input->is_ajax_request()) {
            $categoryID = $this->input->post('category_id');
            $output = new stdClass;
            $output->csrfName = $this->security->get_csrf_token_name();
            $output->csrfHash = $this->security->get_csrf_hash();
//                    $output->data = $subcategory;
            $output->data = array(
                'category' => $this->ebay_shopping->get_sub_category($categoryID)
            );
            echo json_encode($output);

        } else {
            exit('No direct script access allowed');
        }
    }
}