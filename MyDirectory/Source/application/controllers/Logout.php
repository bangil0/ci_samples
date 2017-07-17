<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct() {
		
		parent::__construct();

		
 	}
	
	function index() {
		
		delete_cookie('md_homecity');
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect(base_url());
	}
}
