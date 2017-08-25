<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collection_Details extends CI_Controller {

	  public function __construct(){
		parent::__construct();
		
		$this->load->model('Collection_model');
	   
		}
		
	  public function view_collection(){
		
			 $template['page'] = "Collectiondetails/collection-details";
			 $template['search']="search";
		     $template['page_title'] = "Collection Details";	
			 $id = $this->uri->segment(3);
			 $template['result'] = $this->Collection_model->get_businessname($id);		 
			 $template['details'] = $this->Collection_model->get_businessdetails($id);			 
			 $this->load->view('template',$template); 
	 }
	 
	 


}
?>