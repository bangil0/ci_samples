
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Pagenotfound extends CI_Controller {
    
    public function __construct() {
        
        parent::__construct(); 
    
    } 
 
    public function index() { 

        $template['page_title'] ="Error Page"; 
		$template['page'] ='404Page/pagenotfound';
		 
        $this->output->set_status_header('404'); // setting header to 404
        $this->load->view('template',$template);//loading view
    } 
} 
?> 