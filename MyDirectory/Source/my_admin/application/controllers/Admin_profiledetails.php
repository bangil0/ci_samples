<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_profiledetails extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		 date_default_timezone_set("Asia/Kolkata");
		 $this->load->model('Admin_model');
		
		 if(!$this->session->userdata('admin_logged_in')) { 
			redirect(base_url());
		 }
		
    }       
//Change Admin Password	
	    public function change_admin_password(){
				
							$template['page'] = 'Adminprofile/admin-profile';
							$template['page_title'] = "View Admin profile";					
		                    $id = $this->session->userdata('admin_logged_in')['id'];
							
							
							if(isset($_POST) and !empty($_POST)) {
							if(isset($_POST['reset_pwd'])) {
							$data = $_POST;
							
							if($data['n_password'] !== $data['c_password']) {
								$this->session->set_flashdata('message', array('message' => 'Password doesn\'t match', 'title' => 'Error !', 'class' => 'danger'));
								redirect(base_url().'Admin_profiledetails/view_Admin_profile');
							}
							else {
							unset($data['c_password']);						
							$result = $this->Admin_model->update_admin_password($data, $id);
						    if($result) {
								if($result === "notexist") {
									$this->session->set_flashdata('message', array('message' => 'Invalid Password', 'title' => 'Warning !', 'class' => 'warning'));
									redirect(base_url().'Admin_profiledetails/view_Admin_profile');
								}
								else {
									$this->session->set_flashdata('message', array('message' => 'Password updated successfully', 'title' => 'Success !', 'class' => 'success'));
									redirect(base_url().'Admin_profiledetails/view_Admin_profile');
								}
							}
							else {
								$this->session->set_flashdata('message', array('message' => 'Sorry, Error Occurred', 'title' => 'Error !', 'class' => 'danger'));
								redirect(base_url().'Admin_profiledetails/view_Admin_profile');
							}
					
				}
			}
		}
		$this->load->view('template', $template);
	}
  
	
	//PROFILE VIEW
	   public function view_Admin_profile() {
		 
		            $template['page'] = 'Adminprofile/admin-profile';
				    $template['page_title'] = "View Admin profile";			
					$id = $this->session->userdata('admin_logged_in')['id'];
		
						    if(isset($_FILES['profile_pic'])) {
							$config = set_upload_options('assets/uploads/admin');
						
							$this->load->library('upload');
							
							$new_name = time()."_".$_FILES["profile_pic"]['name'];
							$config['file_name'] = $new_name;

							$this->upload->initialize($config);

							if ( ! $this->upload->do_upload('profile_pic')) {
								unset($data['profile_pic']);
							}
							else {
								$upload_data = $this->upload->data();
								$data['username'] = $this->session->userdata('admin_logged_in')['username'];
								$data['profile_picture'] = base_url().$config['upload_path']."/".$upload_data['file_name'];
								if($id == $this->session->userdata('admin_logged_in')['id']) {
									$this->session->set_userdata('profile_pic',$data['profile_picture']);
								}
							}
						
							
							$result = $this->Admin_model->update_admin($data, $id);
						
										}
						
						
						    $template['data'] = $this->Admin_model->get_admin_profile($id);
							//$template['datas'] = $this->Admin_model->get_title($id);
						    $this->load->view('template', $template);
	              }
				  
	           
	
}
?>