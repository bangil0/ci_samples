<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Auth_Controller {

    // is needed for usage: example.com/auth/ without anything after it

    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        redirect('login');
    }

}
