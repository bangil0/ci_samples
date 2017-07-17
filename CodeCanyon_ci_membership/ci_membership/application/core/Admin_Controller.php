<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends Private_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->lang->load('adminpanel');
    }
}
