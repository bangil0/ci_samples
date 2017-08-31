<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Site extends Private_Controller{

    protected $CI;

    public function __construct()
    {
        parent::__construct();
        $this->CI->load->library('site');

    }



}