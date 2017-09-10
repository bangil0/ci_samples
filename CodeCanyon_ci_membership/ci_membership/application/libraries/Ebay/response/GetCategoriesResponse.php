<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use \DTS\eBaySDK\Shopping\Services\ShoppingService;
use \DTS\eBaySDK\Shopping\Types as S_Types;
use \DTS\eBaySDK\Shopping\Enums as S_Enums;
use \DTS\eBaySDK\Constants;

use \DTS\eBaySDK\Trading\Services\TradingService;
use \DTS\eBaySDK\Trading\Types as T_Types;
use \DTS\eBaySDK\Trading\Enums as T_Enums;

Class GetCategoriesResponse extends Private_Controller
{


    protected $CI;
    protected $response;

    public function __construct($response)
    {
        parent::__construct();
        $this->CI =& get_instance();
        $this->response = $response;

    }


    /**
     * Return class name
     * @return string
     */
    public static function className()
    {
        return get_called_class();
    }


    /**
     * Get category version
     * @return string|null
     */
    public function get_category_version()
    {
        return $this->response->CategoryVersion;
    }


    public function get_categories()
    {
        $result = array();
        if (!empty($this->response->CategoryArray->Category)) {
            foreach ($this->response->CategoryArray->Category as $category) {
                //var_dump($category);
                if ($category->LeafCategory == false && $category->CategoryLevel != 0) {
                    $result[] = new EbayCategory($category);
                }
            }
        }
        return $result;
    }

}

/**
 * Class SiteDetails
 */
class EbayCategory
{
    public $category_id;
    public $category_level;
    public $category_name;
    public $category_name_path;
    public $category_id_path;
    public $leaf_category;

    public function __construct($response)
    {
        $this->category_id = $response->CategoryID;
        $this->category_level = $response->CategoryLevel;
        $this->category_name = $response->CategoryName;
        $this->category_parent_id = $response->CategoryParentID;
        $this->category_name_path = $response->CategoryNamePath;
        $this->category_id_path = $response->CategoryIDPath;
        $this->leaf_category = $response->LeafCategory;

    }

}

