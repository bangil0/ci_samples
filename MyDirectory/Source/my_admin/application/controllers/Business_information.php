<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Business_information extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		 date_default_timezone_set("Asia/Kolkata");
		 $this->load->model('Business_model');
		
		 if(!$this->session->userdata('admin_logged_in')) { 
			redirect(base_url());
		 }
		
    }
	
 //View Business Information	
	public function view_business(){
				
			 $template['page'] = "businessinformation/view-businessinfo";
			 $template['page_title'] = "Business Information";			 
			 $template['data'] = $this->Business_model->get_businessinformation();	
             $this->load->view('template',$template);			 
		 
	}
	
	
   //pop up view business	
	public function business_view(){
		 
		 $id=$_POST['businessdetails'];
	
		 $review = $this->Business_model->get_reviews($id);
		 if($review=='Novalue')
		 {
			$template['data'] = $this->Business_model->get_businessinfo($id);
			$template['review']="";
			$this->load->view('businessinformation/business-info-popup',$template);
		 }
		 else
		 {
			$template['data'] = $this->Business_model->get_businessinfo($id);
			$template['review']=$review;
			$this->load->view('businessinformation/business-info-popup',$template); 
		 }
		 
	}
   //pop up map
    public function map_view(){
		 
		 $id=$_POST['mapdetails'];

		 $map = $this->Business_model->get_map($id);

		 if($map=='Novalue')
		 {
			$template['map']="";
			$this->load->view('businessinformation/popup-mapdetails',$template);
		 }
		 else
		 {
			$template['map']=$map;
			$this->load->view('businessinformation/popup-mapdetails',$template); 
		 }
		 
	}

  //Add Business Information
    public function add_Businessinformation()
	  {
		  $template['page'] = 'businessinformation/add-businessinfo';
		  $template['page_title'] = 'Add BusinessInformation';
		  $sessid=$this->session->userdata('admin_logged_in');

		  
		  if($_POST){
			$data = $_POST;
			
			    if (false === strpos($data['website'], '://')) {
					$data['website'] = 'http://' . $data['website'];
				}
				
			    if (false === strpos($data['social_links'], '://')) {
					$data['social_links'] = 'http://' . $data['social_links'];
				}
				
				if (false === strpos($data['other_link'], '://')) {
					$data['other_link'] = 'http://' . $data['other_link'];
				}
			
			
				
			//var_dump($data);exit;
			$data['created_by']=$sessid['created_user'];
		
            //$data['advertisement_status'] = 1;
			//var_dump($data);
			//exit();			
			$config = set_upload_options('assets/uploads/img');
			$this->load->library('upload');
			
			$new_name = time()."_".$_FILES["image"]['name'];
			$config['file_name'] = $new_name;

			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('image')) {
				//$this->session->set_flashdata('message', array('message' => 'Sorry, Error Occurred while uploading files. Please try again', 'title' => 'Error !', 'class' => 'danger'));
				$this->session->set_flashdata('message', array('message' => "Display Picture : ".$this->upload->display_errors(), 'title' => 'Error !', 'class' => 'danger'));
				
			}
			else 
			{
				
			$upload_data = $this->upload->data();
			$data['image'] = base_url().$config['upload_path']."/".$upload_data['file_name'];	

			/* Save category details */
			$result = $this->Business_model->businessinfo_add($data);
			

			if($result) {
				/* Set success message */
				 $this->session->set_flashdata('message',array('message' => 'Add Business Information Details successfully','class' => 'success'));
			}
			else {
				/* Set error message */
				 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));  
			}
			}
			}
			//redirect(base_url().'Business_information/add_Businessinformation');
			  $template['result'] = $this->Business_model->get_category();
			  $this->load->view('template',$template);
		} 
			  
 //edit Business Information	
	public function edit_businessinformation(){
		
		  $template['page'] = 'businessinformation/edit-businessinfo';
		  $template['page_title'] = 'Edit BusinessInformation';
		  
		  
		  $id = $this->uri->segment(3); 
		  $template['data'] = $this->Business_model->get_single_business($id);
		  if(!empty($template['data'])) {
			  
                
      
			  
		     if($_POST){
			    $data = $_POST;
			  
			    if (false === strpos($data['website'], '://')) {
					$data['website'] = 'http://' . $data['website'];
				}
				
			    if (false === strpos($data['social_links'], '://')) {
					$data['social_links'] = 'http://' . $data['social_links'];
				}
				
				if (false === strpos($data['other_link'], '://')) {
					$data['other_link'] = 'http://' . $data['other_link'];
				}
			  
			     if(!isset($data['advertisement_status']))	
				 {
					$data['advertisement_status']=0; 
				 }
				 
				       			   
	
	
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
			  
			  $result = $this->Business_model->businessinfo_edit($data, $id);
			  $this->session->set_flashdata('message',array('message' => 'Edit Business Information Updated successfully','class' => 'success'));
			  //$this->session->set_flashdata('message', array('message' => 'Shop Updated Successfully','class' => 'success'));
			  redirect(base_url('Business_information/view_business'));
			 
		  }
			  else
			  {
				  $template['result'] = $this->Business_model->get_category();				  
				  $this->load->view('template',$template); 
			  }	 
		      }
		  else{
			 		 		 
			  $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));		
              redirect(base_url().'Business_information/view_business');			  
	}
 }
  //delete Business Information
    public function delete_Businessinfo(){
              
              $id = $this->uri->segment(3); 

			  $data['created_user'] = $this->session->userdata('admin_logged_in')['id'];
		      $result = $this->Business_model->businessinformation_delete($id);	
			 // echo $result;exit;
			  if($result=="success")
			  {
				  $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
				  redirect(base_url().'Business_information/view_business');	
			  }
			 else
		      {	 		 
			  $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));		
              redirect(base_url().'Business_information/view_business');			  
	          }

         }

		
	 public function Business_status(){
		 
				  $data1 = array(
				  "status" => '0'
							 );
				  $id = $this->uri->segment(3);		   
				  $s=$this->Business_model->update_business_status($id, $data1);
				  $this->session->set_flashdata('message', array('message' => 'Disable Successfully','class' => 'success'));
				  redirect(base_url().'Business_information/view_business');
	 }
     public function Business_active(){
		 
				  $data1 = array(
				  "status" => '1'
							 );
				  $id = $this->uri->segment(3);		   
				  $s=$this->Business_model->update_business_status($id, $data1);
				  $this->session->set_flashdata('message', array('message' => 'Enable Successfully','class' => 'success'));
				  redirect(base_url().'Business_information/view_business');
	 }
}