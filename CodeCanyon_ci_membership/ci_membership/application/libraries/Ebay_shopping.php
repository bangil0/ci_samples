<?php defined('BASEPATH') OR exit('No direct script access allowed');

use \DTS\eBaySDK\Shopping\Services\ShoppingService;
use \DTS\eBaySDK\Shopping\Types;
use \DTS\eBaySDK\Shopping\Enums;
use \DTS\eBaySDK\Constants;


Class Ebay_shopping extends MY_Controller
{
    protected $error_message = [];

    public function __construct()
    {
        parent::__construct();

        // Load custom config
        $this->load->config('ebay');
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

    /*
    * Get all parent categories
    * returns array
    */
    public function get_parent_category()
    {
        $service = $this->get_ShoppingService();

        // Create the request object.
        $request = new Types\GetCategoryInfoRequestType();
        $request->CategoryID = '-1';
        $request->IncludeSelector = 'ChildCategories';

        // Send the request.
        $response = $service->getCategoryInfo($request);

        // Check errors
        $checkError = $this->get_response($response);

        if ($checkError != 0) {
            $category_arr = [];
            $category_arr['#'] = '-- Please Select Category --';
            // Format for passing into form_dropdown function
            //if ($response->CategoryArray->Category->LeafCategory == false) {
            foreach ($response->CategoryArray->Category as $category) {
                //var_dump($category);
                if ($category->LeafCategory == false) {
                    if ($category->CategoryLevel != 0) {
                        $category_arr[$category->CategoryID] = $category->CategoryName;
                    }
                }
            }
            // }
            // var_dump($category_arr);
            return $category_arr;
        } else return false;
    }


    /*    public function get_category($response)
        {
            $category_arr = [];
            $category_arr['#'] = '-- Please Select Category --';
            // Format for passing into form_dropdown function
            //if ($response->CategoryArray->Category->LeafCategory == false) {
            foreach ($response->CategoryArray->Category as $category) {
                //var_dump($category);
                if ($category->LeafCategory == false) {
                    if ($category->CategoryLevel != 0) {
                        $category_arr[$category->CategoryID] = $category->CategoryName;
                    }
                }
            }
            // }
            // var_dump($category_arr);
            return $category_arr;
        }*/

    public function get_sub_category($categoryID)
    {
        // Create the service object.
        $service = $this->get_ShoppingService();

        // Create the request object.
        $request = new Types\GetCategoryInfoRequestType();
        $request->CategoryID = $categoryID;
        $request->IncludeSelector = 'ChildCategories';

        // Send the request.
        $response = $service->getCategoryInfo($request);

        // Check errors
        $checkError = $this->get_response($response);

        if ($checkError != 0) {
            $browse = '';
            $sub_category_arr = [];
            $sub_category_arr['#'] = '-- Please Select Sub Category --';

            foreach ($response->CategoryArray->Category as $category) {
                if ($category->LeafCategory == false) {
                    if ($category->CategoryID != $categoryID) {
                        if ($category->CategoryLevel != 0) {
                            $sub_category_arr[$category->CategoryID] = $category->CategoryName;
                            //    $browse ='<option value="'.$category->CategoryID.'">'.$category->CategoryName.'</option>';
                        }
                    }
                }
            }

            if (count($sub_category_arr) == 1) {
                $browse = '<label style=\"padding:7px;font-size:12px;\">You have selected a category ID : <option value="' . $categoryID . '">' . $categoryID . '</option></label>';
                return $browse;
                //$success = "<label style=\"padding:7px;font-size:12px;\">You have selected a category.</label>";

            } else {
                $attributes = array('id' => '', 'class' => 'form-control parent');
                return form_dropdown('options', $sub_category_arr, '#', $attributes);
            }

        }
         return 'some error';
//        return $sub_category_arr;
    }

    /*
        public function get_GeteBayTimeRequestType()
        {
            return $request = new Types\GeteBayTimeRequestType();
        }

        public function get_CategoryInfoRequestType()
        {
            return $request = new Types\GetCategoryInfoRequestType();
        }*/

    public function get_response($response)
    {

        if (isset($response->Errors)) {
            foreach ($response->Errors as $error) {
                $err = array(
                    'SeverityCode' => $error->SeverityCode === DTS\eBaySDK\Shopping\Enums\SeverityCodeType::C_ERROR ? 'Error' : 'Warning',
                    'ShortMessage' => $error->ShortMessage,
                    'LongMessage' => $error->LongMessage
                );
//                var_dump($err);
                //return $err;
                $this->set_error($err);
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