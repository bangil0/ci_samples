<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_details extends CI_Controller {

	public function __construct() {
	parent::__construct();
		
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('User_model');
		
		if(!$this->session->userdata('admin_logged_in')) { 
			redirect(base_url());
		}

    }

 //view user details
     public function view_userdetails(){
			
			  $template['page'] = "userdetails/user-details";
			  $template['page_title'] = "User Details";
			  $template['data'] = $this->User_model->get_userdetails();
			  $this->load->view('template',$template);
	 }
	
 //popup view userdetails		 
	 public function userdetails_view(){
		 
		      $id=$_POST['userdetails'];
              $categori = $this->User_model->get_usercategory($id);
        
			  if($categori=='Novalue')
			  {
				$template['data'] = $this->User_model->get_usercategori($id);
				$template['categori']="";
				$this->load->view('userdetails/userdetails-popup',$template);
			  }
			  else
			  {
				$template['data'] = $this->User_model->get_usercategori($id);
				$template['categori']=$categori;
				$this->load->view('userdetails/userdetails-popup',$template); 
			  }	 
	 }
 // Add Userdetails
	 public function add_userdetails() { 
	 
			  $template['page'] = 'userdetails/add-userdetails';
			  $template['page_title'] = 'Add User';
		  
		      if($_POST){		  
			  $data = $_POST;
				
			  $config = set_upload_options('assets/uploads/img');
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
			  /* Save category details */
			
			  $result = $this->User_model->userdetails_add($data);
			  if($result) {
				/* Set success message */
				 $this->session->set_flashdata('message',array('message' => 'Add User Details successfully','class' => 'success'));
			  }
			  else {
				/* Set error message */
				 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));  
			  }
			  }
			  }
			  //redirect(base_url().'Business_information/add_Businessinformation');
			  $this->load->view('template',$template);
     } 
			  
 //edit user details	
	 public function edit_user(){
		
		      $template['page'] = 'userdetails/edit-userdetails';
		      $template['page_title'] = 'Edit User';

		      $id = $this->uri->segment(3); 
		      $template['data'] = $this->User_model->get_single_user($id);
                  if(!empty($template['data'])) {

                  if($_POST){
                  $data = $_POST;

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


                  $result = $this->User_model->userdetails_edit($data, $id);
                  $this->session->set_flashdata('message',array('message' => 'Edit User Details Updated successfully','class' => 'success'));
                  redirect(base_url().'User_details/view_userdetails');
                  }

                  }
			  
			   else{
													 
									  $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));	
		                              redirect(base_url().'User_details/view_userdetails');	
								  
	 }
	 $this->load->view('template',$template); 	
	 }
    
  //delete user details	
     public function delete_user(){
		
			  $id = $this->uri->segment(3);		   
			  $result = $this->User_model->userdetails_delete($id);		   
			  $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
			  redirect(base_url().'User_details/view_userdetails');
	 }
    
      public function user_status(){
		 
				  $data1 = array(
				  "status" => '0'
							 );
				  $id = $this->uri->segment(3);		   
				  $s=$this->User_model->update_user_status($id, $data1);
				  $this->session->set_flashdata('message', array('message' => 'Disable Successfully','class' => 'success'));
				  redirect(base_url().'User_details/view_userdetails');
	 }
     public function user_active(){
		 
				  $data1 = array(
				  "status" => '1'
							 );
				  $id = $this->uri->segment(3);		   
				  $s=$this->User_model->update_user_status($id, $data1);
				  $this->session->set_flashdata('message', array('message' => 'Enable Successfully','class' => 'success'));
				  redirect(base_url().'User_details/view_userdetails');
	 }	
   
}