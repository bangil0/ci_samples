<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_collection extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Manage_model');
		
		if(!$this->session->userdata('admin_logged_in')) { 
			redirect(base_url());
		}
		 else {
			  $menu = $this->session->userdata('admin');
			  if( $menu!=1  ) {
				 $this->session->set_flashdata('message', array('message' => "You don't have permission to access user page.",'class' => 'danger'));
				 redirect(base_url().'User_details/view_userdetails');
			 }
		}		
		
    }
	
	
	 public function view_manage(){
		
			 $template['page'] = "Managecollection/manage-collection";
			 $template['page_title'] = "Manage Collection";
			 $template['data'] = $this->Manage_model->get_managecollection();
			 $this->load->view('template',$template);
	 }
	
	 public function manage_status(){
		 
		     $data1 = array(
             "status" => '0'
                         );
			 $id = $this->uri->segment(3);		   
			 $s=$this->Manage_model->update_delete_status($id, $data1);
			 $this->session->set_flashdata('message', array('message' => 'Delete Successfully','class' => 'success'));
     	     redirect(base_url().'Manage_collection/view_manage');
	 }
     public function manage_active(){
		 
		     $data1 = array(
             "status" => '1'
                         );
			 $id = $this->uri->segment(3);		   
			 $s=$this->Manage_model->update_delete_status($id, $data1);
			 $this->session->set_flashdata('message', array('message' => 'Delete Successfully','class' => 'success'));
     	     redirect(base_url().'Manage_collection/view_manage');
	 }		
	
}
?>