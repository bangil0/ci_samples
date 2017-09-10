<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use \DTS\eBaySDK\Shopping\Services\ShoppingService;
use \DTS\eBaySDK\Shopping\Types as S_Types;
use \DTS\eBaySDK\Shopping\Enums as S_Enums;
use \DTS\eBaySDK\Constants;

use \DTS\eBaySDK\Trading\Services\TradingService;
use \DTS\eBaySDK\Trading\Types as T_Types;
use \DTS\eBaySDK\Trading\Enums as T_Enums;

Class GetCategoriesRequest extends Private_Controller
{

    protected $CI;

    private $category_id;

    public function __construct($category_id)
    {
        parent::__construct();
        $this->CI =& get_instance();
        $this->category_id = $category_id;
    }


    public function request()
    {

        // Create the request object.
        $request = new S_Types\GetCategoryInfoRequestType();
        $request->CategoryID = (string) $this->category_id;
        $request->IncludeSelector = 'ChildCategories';
        return $request;

    }


}

