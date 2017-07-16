<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	  public function __construct(){
		
		parent::__construct();
		
		$this->load->model('Search_model','search');

		
	
		}

//search
	public function city_search(){

	 $template['page_title'] ="Home"; 
	 $template['page'] ='Login/home';

		$data=$this->input->post('keyword');
        
     if($data)
     {

       $template['result']=$this->search->get_city_search($data);
       echo json_encode($template['result']);
      
      }
      else
      {
      	$this->load->view('template',$template);
      } 

		
	}

//search
	public function business_search(){

	 $template['page_title'] ="Home"; 
	 $template['page'] ='Login/home';

	  $data=$this->input->post('business_keyword');
        
     if($data)
     {

       $template['business']=$this->search->get_business_search($data);
       echo json_encode($template['business']);
      
      }
      else
      {
      	$this->load->view('template',$template);
      } 

		
	}

//featured collection

    public function featured(){

	 $template['page_title'] ="Featured Collection"; 
	 $template['page'] ='Featured/featuredcollection';
	 $template['search']="search";

	 $this->load->view('template',$template);

	} 
	 	


	
	

}
