<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_details extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		 date_default_timezone_set("Asia/Kolkata");
		 $this->load->model('Customer_model');
		
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
	
	  public function customer() {
		
		$template['page'] = 'Customer/view-customer';
		$template['page_title'] = "User customer";
		$id = $this->session->userdata('admin_logged_in')['id'];
		$template['data'] = $this->Customer_details->get_single_profile($id);
		
		if($_POST) {
			$data = $_POST;
			unset($data['submit']);
			
			if(isset($_FILES['image'])) {
				$config = $this->set_upload_options();
			
				$this->load->library('upload');
				$this->upload->initialize($config);
				
				if ( ! $this->upload->do_upload('image')) {
					unset($data['image']);
				}
				else {
					$data['image'] = base_url().$config['upload_path']."/".$_FILES['image']['name'];
				}
			}
			
			$result = $this->Customer_details->update_user($data, $id);
			if($result == "Exist") {
			$this->session->set_flashdata('message', array('message' => 'Customer already exist','class' => 'danger'));
			   }
				
			else {	
			$this->session->set_flashdata('message', array('message' => 'Profile Updated Successfully','class' => 'success'));
			   }
			
			
     		redirect(base_url().'Customer_details/customer');
		}
		else {
   			$this->load->view('template', $template);
		}
		
	}
	
	 public function view_customer(){
		 
		 $template['page'] = "Customer/view-customer";
	     $template['page_title'] = "Customer";
		 $template['data'] = $this->Customer_model->get_customerdetails();			 
		 $this->load->view('template',$template);
	 }
	 
	 
  //Add Customer Details
     public function add_Customer()
	  {
		  $template['page'] = 'Customer/add-customer';
		  $template['page_title'] = 'Add Customer';
		  $sessid=$this->session->userdata('admin_logged_in');
		  //$userid=$sessid['id'];
		  
		  if($_POST){		  
			$data = $_POST;
			
			/*if(isset($_FILES['profile_pic'])) { 
			$data['created_by']=$sessid['created_user'];
            //$data['advertisement_status'] = 1;
			//var_dump($data);
			//exit();			
			$config = set_upload_options('assets/uploads/img');
			$this->load->library('upload');
			
			$new_name = time()."_".$_FILES["profile_pic"]['name'];
			$config['file_name'] = $new_name;

			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('profile_pic')) {
				//$this->session->set_flashdata('message', array('message' => 'Sorry, Error Occurred while uploading files. Please try again', 'title' => 'Error !', 'class' => 'danger'));
				$this->session->set_flashdata('message', array('message' => "Display Picture : ".$this->upload->display_errors(), 'title' => 'Error !', 'class' => 'danger'));	
			}
			else {
			$upload_data = $this->upload->data();
			$data['image'] = base_url().$config['upload_path']."/".$upload_data['file_name'];	
             }
			 }*/
			 
			 	if(isset($_FILES['profile_pic'])) {
            $data['created_by']=$sessid['created_user'];					
			$config = set_upload_options('assets/uploads/img');
			$this->load->library('upload');
			
			$new_name = time()."_".$_FILES["profile_pic"]['name'];
			$config['file_name'] = $new_name;

			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('profile_pic')) {
					unset($data['profile_pic']);
					$this->session->set_flashdata('message', array('message' => "Display Picture : ".$this->upload->display_errors(), 'title' => 'Error !', 'class' => 'danger'));
				}
				else {
					$upload_data = $this->upload->data();
					$data['profile_picture'] = base_url().$config['upload_path']."/".$upload_data['file_name'];
				}
			}
	
			/* Save category details */
			$result = $this->Customer_model->customer_add($data);
			if($result) {
				/* Set success message */
				 $this->session->set_flashdata('message',array('message' => 'Add Customer Details successfully','class' => 'success'));
			}
			else {
				/* Set error message */
				 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));  
			}
			
			}
			//redirect(base_url().'Business_information/add_Businessinformation');
			  $this->load->view('template',$template);
	 } 
		

  //edit Customer Details
	 public function edit_customer(){
		
		  $template['page'] = 'Customer/edit-customer';
		  $template['page_title'] = 'Edit Customer';
		  
		  
		  $id = $this->uri->segment(3); 
		  $template['data'] = $this->Customer_model->get_singlecustomer($id);
		  if(!empty($template['data'])) {
			  
		  if($_POST){
			  $data = $_POST;
			  
			if(isset($_FILES['profile_pic'])) {  
			$config = set_upload_options('assets/uploads/img');
			$this->load->library('upload');
			
			$new_name = time()."_".$_FILES["profile_pic"]['name'];
			$config['file_name'] = $new_name;

			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('profile_pic')) {
					unset($data['profile_pic']);
				}
				else {
					$upload_data = $this->upload->data();
					$data['profile_picture'] = base_url().$config['upload_path']."/".$upload_data['file_name'];
				}
			}
			
			   $result = $this->Customer_model->customer_edit($data, $id);
			   $this->session->set_flashdata('message',array('message' => 'Edit Customer Details Updated successfully','class' => 'success'));
			   redirect(base_url().'Customer_details/view_customer');
		      }
		      }
			  else{
			  $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));	
              redirect(base_url().'Customer_details/view_customer');			  
		      }
		    
		      $this->load->view('template',$template);   
	 }
	 
	  public function delete_customer(){
		
			  $id = $this->uri->segment(3);		   
			  $result = $this->Customer_model->customer_delete($id);		   
			  $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
			  redirect(base_url().'Customer_details/view_customer');
	 }
	 
 //pop up view Customer	
	  public function customer_view(){
			 
			 $id=$_POST['customerdetails'];
	   
			 $review = $this->Customer_model->get_customerview($id);
			 if($review=='Novalue')
			 {
				$template['data'] = $this->Customer_model->get_customernfo($id);
				$template['review']="";
				$this->load->view('Customer/customer-popup',$template);
			 }
			 else
			 {
				$template['data'] = $this->Customer_model->get_customernfo($id);
				$template['review']=$review;
				$this->load->view('Customer/customer-popup',$template); 
			 }
		 
	}
	 
	 
}
