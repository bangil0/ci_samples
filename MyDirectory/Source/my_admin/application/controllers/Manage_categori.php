<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_categori extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Managecategory_model');
		
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
	
  //View Feature Category	
  
	 public function view_feature(){
		
				  $template['page'] = "Managecategory/manage-categories";
				  $template['page_title'] = "Feature Categories";
				  $template['data'] = $this->Managecategory_model->get_businessinformation();
				  $template['feature'] = $this->Managecategory_model->category_get();
				  $userdetails=$this->session->userdata('admin_logged_in');
				  //$userid=$userdetails['created_user'];
				  
				  if($_POST){
				  //$featured_count = $this->Managecategory_model->featured_category_count();
			      //if($featured_count < 7) {	  
				  $data = $_POST;
				
                  $data['created_by']=$userdetails['created_user'];
                  $data['featured_category'] = 1;
                  //var_dump($data);exit;				  
				  $result = $this->Managecategory_model->update_categories($data);
				  //$template['categories'] = $this->Feature_model->add_categories($data);
				  if($result){
				  $this->session->set_flashdata('message', array('message' => 'Add Featured Category Details successfully','class' => 'success'));
				  redirect(base_url().'Manage_categori/view_feature');
				  }
				  else
				  {
				  $this->session->set_flashdata('message', array('message' => 'Error','class' => 'success')); 
				  redirect(base_url().'Manage_categori/view_feature');			  
				  }
				  
				  //}	
			      }
		          $this->load->view('template',$template);
	 }
	 
 //Category Name
 
	  public function delete_categoryname() {
		  
				  $id = $this->uri->segment(3);
				  $data['featured_category'] = 0;
				  $result = $this->Managecategory_model->update_category($data, $id);
				  if($result == "Success") {
					$this->session->set_flashdata('message', array('message' => 'Featured category removed successfully', 'title' => 'Success !', 'class' => 'success'));
				  }
				  else {
				  $this->session->set_flashdata('message', array('message' => 'Sorry, Error Occurred', 'title' => 'Error !', 'class' => 'danger'));
				  }
				  redirect(base_url().'Manage_categori/view_feature');
	 }
	 
  //View Category 
  
	 public function view_category() {
		
				  $template['page'] = "Managecategory/view-category";
				  $template['page_title'] = "View Category";			
		          $userdetails=$this->session->userdata('admin_logged_in');
				  $userid=$userdetails['id'];
		   
				  if($_POST) {
					  
				  $data = $_POST;				   
				  $data['created_by']=$userid;
				  //$data['featured_category'] = 0;
				  
				  $config = set_upload_categoryoptions('assets/uploads/img');
			      $this->load->library('upload');
			
			      $new_name = time()."_".$_FILES["image"]['name'];
			      $config['file_name'] = $new_name;

				  $this->upload->initialize($config);

				  if ( ! $this->upload->do_upload('image')) {
					//$this->session->set_flashdata('message', array('message' => 'Sorry, Error Occurred while uploading files. Please try again', 'title' => 'Error !', 'class' => 'danger'));
					$this->session->set_flashdata('message', array('message' => "Display Picture : ".$this->upload->display_errors(), 'title' => 'Error !', 'class' => 'danger'));
					
				  }
				  else {
					
				  $upload_data = $this->upload->data();
				  $data['image'] = base_url().$config['upload_path']."/".$upload_data['file_name']; 
			
			
				  $result = $this->Managecategory_model->categoryadd($data);
				  
		          if($result) {
				/* Set success message */
				  $this->session->set_flashdata('message',array('message' => 'Add Category Details successfully','class' => 'success'));
			      }
			      else 
				  {
				/* Set error message */
				  $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));  
                  }
				  }	
				  }				  
				  //redirect(base_url().'Business_information/add_Businessinformation');
				  $template['data'] = $this->Managecategory_model->get_single_category();
		          $this->load->view('template',$template);
	 }
		
  //Delete Category 
  
	 public function category_status(){
		 
				  $data1 = array(
				  "status" => '0'
							 );
				  $id = $this->uri->segment(3);		   
				  $s=$this->Managecategory_model->update_delete_status($id, $data1);
				  $this->session->set_flashdata('message', array('message' => 'Delete Successfully','class' => 'success'));
				  redirect(base_url().'Manage_categori/view_category');
	 }
	 
     public function category_active(){
		 
				  $data1 = array(
				  "status" => '1'
							 );
				  $id = $this->uri->segment(3);		   
				  $s=$this->Managecategory_model->update_delete_status($id, $data1);
				  $this->session->set_flashdata('message', array('message' => 'Active Successfully','class' => 'success'));
				  redirect(base_url().'Manage_categori/view_category');
	 }
 
   //edit user details	
	 public function edit_categorydetails(){
		
		      $template['page'] = 'Managecategory/edit-category';
		      $template['page_title'] = 'Edit Category';

		      $id = $this->uri->segment(3); 
		      $template['data'] = $this->Managecategory_model->get_single_categories($id);
			  if(!empty($template['data'])) {
			 
		      if($_POST){
			  $data = $_POST;
			 //Check box check 
			  if(!isset($data['featured_category']))	
				 {
					$data['featured_category']=0; 
				 }

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
				
				                
			  $result = $this->Managecategory_model->category_edit($data, $id);
			  $this->session->set_flashdata('message',array('message' => 'Edit Category Details Updated successfully','class' => 'success'));
			      redirect(base_url().'Manage_categori/view_category');	
                  $this->load->view('template',$template); 				 
		      }
		
		      }
			  
			   else{
													 
									  $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));	
		                              redirect(base_url().'Manage_categori/view_category');
								  
	 }
	 $this->load->view('template',$template); 	
	 }
		
}
?>