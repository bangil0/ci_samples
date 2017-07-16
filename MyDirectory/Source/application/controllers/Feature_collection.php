<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feature_collection extends CI_Controller {

	  public function __construct(){
		parent::__construct();
		
		$this->load->model('Feature_model');
	   
		}
		
		  public function view_category(){
			
				 $template['page'] = "Featurecollection/featuredcollection";
				 $template['search']="search";
				 $template['page_title'] = "Featured Collection";			 
				 $template['data'] = $this->Feature_model->get_category();
				 $template['result'] = $this->Feature_model->get_featurecategory();				 				  
				 $template['results'] = $this->Feature_model->get_categoryname();				 				  
				 $this->load->view('template',$template);
		 }
	 
	 
	 
	
}
?>