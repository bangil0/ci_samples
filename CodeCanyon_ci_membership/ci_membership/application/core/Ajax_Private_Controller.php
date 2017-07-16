<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_Private_Controller extends Private_Controller
{
    public function __construct ()
    {
        parent::__construct();
        // detect AJAX, end stream when false
        if (!$this->input->is_ajax_request()) {
            redirect('/');
        }

        header("content-type:application/json");
    }
}
