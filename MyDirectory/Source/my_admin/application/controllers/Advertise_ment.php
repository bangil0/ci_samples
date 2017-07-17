<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advertise_ment extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Advertisement_model');
		
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
	
  //View Advertisement Details	
	 public function view_advertisement(){
		
				  $template['page'] = "advertisement/advertis-ment";
				  $template['page_title'] = "Advertisement";
				  $template['data'] = $this->Advertisement_model->get_advertisement();
				  $template['result'] = $this->Advertisement_model->get_businessname();
				  $userdetails=$this->session->userdata('admin_logged_in');
				  //$userid=$userdetails['id'];
				  
				  if($_POST){
				  $advertisement_count = $this->Advertisement_model->businessname_count();
			      //if($advertisement_count < 7) {	  
				  $data = $_POST;
                  $data['created_by']=$userdetails['created_user'];
                  $data['advertisement_status'] = 1;
                  //var_dump($data);exit;				  
				  $result = $this->Advertisement_model->update_businessname($data);
				  //$template['categories'] = $this->Feature_model->add_categories($data);
				  if($result){
				  $this->session->set_flashdata('message', array('message' => 'Add Advertisement Details successfully','class' => 'success'));
				  redirect(base_url().'Advertise_ment/view_advertisement');
				  }
				  else
				  {
				  $this->session->set_flashdata('message', array('message' => 'Error','class' => 'success')); 
				  redirect(base_url().'Advertise_ment/view_advertisement');			  
				  }
				  
				  //}	
			      }
		          $this->load->view('template',$template);
	 }
	 
	  public function delete_businessname() {
		  
					$id = $this->uri->segment(3);
					$data['advertisement_status'] = 0;
					$result = $this->Advertisement_model->update_business($data, $id);
					if($result == "Success") {
						$this->session->set_flashdata('message', array('message' => 'Featured category removed successfully', 'title' => 'Success !', 'class' => 'success'));
					}
					else {
						$this->session->set_flashdata('message', array('message' => 'Sorry, Error Occurred', 'title' => 'Error !', 'class' => 'danger'));
					}
					redirect(base_url().'Advertise_ment/view_advertisement');
	}
	 
}