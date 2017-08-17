<?php defined('BASEPATH') OR exit('No direct script access allowed');

use \DTS\eBaySDK\Shopping\Services\ShoppingService;
use \DTS\eBaySDK\Shopping\Types;
use \DTS\eBaySDK\Shopping\Enums;
use \DTS\eBaySDK\Constants;


Class Ebay_shopping extends Private_Controller
{

    protected $CI;

    public function __construct()
    {
        parent::__construct();

        // https://www.codeigniter.com/user_guide/general/creating_libraries.html
        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();


    }

    /*
    * Get all parent categories
    * returns array
    */
    public function get_parent_category()
    {

        // Create the request object.
        $request = new Types\GetCategoryInfoRequestType();
        $request->CategoryID = '-1';
        $request->IncludeSelector = 'ChildCategories';

        // Send the request.
        $response = $this->shopping_service->getCategoryInfo($request);

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

        // Create the request object.
        $request = new Types\GetCategoryInfoRequestType();
        $request->CategoryID = $categoryID;
        $request->IncludeSelector = 'ChildCategories';

        // Send the request.
        $response = $this->shopping_service->getCategoryInfo($request);

        // Check errors
        $checkError = $this->get_response($response);

        if ($checkError != 0) {
            $browse = '';
            $sub_category_arr = [];
            $sub_category_arr['#'] = '-- Please Select Sub Category --';

            foreach ($response->CategoryArray->Category as $category) {
                if ($category->LeafCategory == false) {
                    if ($category->CategoryID != $categoryID && $category->CategoryLevel != 0) {
                       // if ($category->CategoryLevel != 0) {
                            $sub_category_arr[$category->CategoryID] = $category->CategoryName;
                        //}
                    }
                } else if ($category->CategoryID != $categoryID) {
                    {
                        $sub_category_arr[$category->CategoryID] = $category->CategoryName;
                    }
                } else {
                    //$this->session->set_userdata('category',$category->CategoryID);
                    $this->session->set_flashdata('category',$category->CategoryID);

                    $category_path = str_replace(':', ' > ', $category->CategoryNamePath);

                    $LeafCategory = [];
                    $LeafCategory['valid'] = 'valid';
                    $LeafCategory['category'] = $category->CategoryName;
                    $LeafCategory['category_id'] = $category->CategoryID;
                    $LeafCategory['category_path'] = $category_path;
                    return $LeafCategory;

                }
            }

            /*  if (count($sub_category_arr) == 1) {
                  $browse = '<label style=\"padding:7px;font-size:12px;\">You have selected a category ID : <option value="' . $categoryID . '">' . $categoryID . '</option></label>';
                  return $browse;
                  //$success = "<label style=\"padding:7px;font-size:12px;\">You have selected a category.</label>";

              } else {
                  $attributes = array('id' => '', 'class' => 'form-control parent');
                  return form_dropdown('options', $sub_category_arr, '#', $attributes);
              }*/

            $attributes = array('id' => '', 'class' => 'form-control parent');
            return form_dropdown('options', $sub_category_arr, '#', $attributes);

        }
       else return false;
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



}