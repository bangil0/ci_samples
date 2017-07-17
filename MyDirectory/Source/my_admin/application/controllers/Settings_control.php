<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_control extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();	
	
	      date_default_timezone_set("Asia/Kolkata");
		  
		  $this->load->model('Settings_model');		  
		  $this->load->library('image_lib');
		  
		  if(!$this->session->userdata('admin_logged_in')) { 
			redirect(base_url());
		 }
		  
	}
	
	

	/* function view_settings(){
		
		
		       $template['page'] = 'Settings/add-settings';
		       $template['page_title'] = 'Add Settings';
		 
				
				//$this->load->view('template',$template);
				
	 //}	
		//function upload(){
			
		  $id = $this->uri->segment(3); 
		  $template['data'] = $this->Settings_model->get_single_settings($id);
		  if(!empty($template['data'])) {
			  
		  if($_POST){
			  $data = $_POST;
			
			    
			  $business_name = preg_replace('/\s+/', ' ',$data['business_name']);
			  $data['business_name'] = preg_replace('/[^a-zA-Z0-9\s]/', '', $business_name);
			
			unset($data['submit']);

			if(isset($_FILES['image'])) {  
			$config = set_upload_options('assets/uploads/img');
			$this->load->library('upload');
			
			$new_name = time()."_".$_FILES["image"]['name'];
			$config['file_name'] = $new_name;

			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('image')) {
					unset($data['image']);
				}
				else {
					$upload_data = $this->upload->data();
					$data['image'] = base_url().$config['upload_path']."/".$upload_data['file_name'];
				}
			}
			
			  //$data['created_by'] = $this->session->userdata('admin_logged_in')['id'];
			  //$data['created_user'] = $this->session->userdata('admin_logged_in')['id'];
			  
			  $result = $this->Settings_model->update_settings($data, $id);
			  if($result)
			  {
				   $this->session->set_flashdata('message',array('message' => 'Edit Business Information Updated successfully','class' => 'success'));
			  }
			  else
			  {
				  $template['result'] = $this->Settings_model->settings_view(); 
				   $this->session->set_flashdata('message',array('message' => 'Error','class' => 'success'));
			  }
			  $this->session->set_flashdata('message',array('message' => 'Edit Business Information Updated successfully','class' => 'success'));
			  //$this->session->set_flashdata('message', array('message' => 'Shop Updated Successfully','class' => 'success'));
			  redirect(base_url('Business_information/view_business'));
			 
		  }
			 	    
				  $this->load->view('template',$template); 
			 
	}
		
}*/

   //Add Business Information
    public function view_settings()
	  {
		       $template['page'] = 'Settings/add-settings';
		       $template['page_title'] = 'Add Settings';
			   $id = $this->session->userdata('admin_logged_in')['id'];

		  
		  if($_POST){
			$data = $_POST;
			unset($data['submit']); 
			
			if(isset($_FILES['logo'])) {  
			$config = set_upload_logooptions('assets/uploads/logo');
			$this->load->library('upload');
			
			$new_name = time()."_".$_FILES["logo"]['name'];
			$config['file_name'] = $new_name;

			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('logo')) {
					unset($data['logo']);
				}
				else {
					$upload_data = $this->upload->data();
					$data['logo'] = base_url().$config['upload_path']."/".$upload_data['file_name'];
				}
			}
			
				if(isset($_FILES['favicon'])) {  
			$config = set_upload_faviconoptions('assets/uploads/favicons');
			$this->load->library('upload');
			
			$new_name = time()."_".$_FILES["favicon"]['name'];
			$config['file_name'] = $new_name;

			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('favicon')) {
					unset($data['favicon']);
				}
				else {
					$upload_data = $this->upload->data();
					$data['favicon'] = base_url().$config['upload_path']."/".$upload_data['file_name'];
				}
			}

			/* Save category details */
			$result = $this->Settings_model->update_settings($data);
			

			if($result) {
				/* Set success message */
				 $this->session->set_flashdata('message',array('message' => 'Add Settings Details Updated successfully','class' => 'success'));
			}
			else {
				/* Set error message */
				 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));  
			}
			}
			    
				
				
				$resulttitle = $this->Settings_model->settings_view();
				
				$sess_arrays = array(
				'title' => $resulttitle->title
				);
				
				
				$this->session->set_userdata('title', $sess_arrays);
				
			   
			//redirect(base_url().'Business_information/add_Businessinformation');
			  $template['result'] = $this->Settings_model->settings_view(); 
			  $this->load->view('template',$template);
		} 
		
		

}
?>
	
	

