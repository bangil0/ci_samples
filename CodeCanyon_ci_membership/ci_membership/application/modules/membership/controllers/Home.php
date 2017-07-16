<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Private_Controller {

	public function __construct()
    {
        parent::__construct();
    }

    public function index() {

        redirect('membership/'. strtolower(Settings_model::$db_config['home_page']));
    }

}