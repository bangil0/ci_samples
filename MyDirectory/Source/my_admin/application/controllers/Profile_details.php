<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_details extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		 date_default_timezone_set("Asia/Kolkata");
		 $this->load->model('Profile_model');
		
		 if(!$this->session->userdata('admin_logged_in')) { 
			redirect(base_url());
		 }

		
    }       
	
	
  //Change Password
  
	  public function change_password(){
				
							$template['page'] = 'profile/view-profile';
							$template['page_title'] = "View profile";					
		                    $id = $this->session->userdata('admin_logged_in')['id'];
							
							
							if(isset($_POST) and !empty($_POST)) {
										if(isset($_POST['reset_pwdd'])) {
							$data = $_POST;
							
							if($data['n_password'] !== $data['c_password']) {
								$this->session->set_flashdata('message', array('message' => 'Password doesn\'t match', 'title' => 'Error !', 'class' => 'danger'));
								redirect(base_url().'Profile_details/view_profile');
							}
							else {
							unset($data['c_password']);						
							$result = $this->Profile_model->update_user_password($data, $id);
							if($result) {
								if($result === "notexist") {
									$this->session->set_flashdata('message', array('message' => 'Invalid Password', 'title' => 'Warning !', 'class' => 'warning'));
									redirect(base_url().'Profile_details/view_profile');
								}
								else {
									$this->session->set_flashdata('message', array('message' => 'Password updated successfully', 'title' => 'Success !', 'class' => 'success'));
									redirect(base_url().'Profile_details/view_profile');
								}
							}
							else {
								$this->session->set_flashdata('message', array('message' => 'Sorry, Error Occurred', 'title' => 'Error !', 'class' => 'danger'));
								redirect(base_url().'Profile_details/view_profile');
							}
					
				}
			}
		}
		$this->load->view('template', $template);
	 }
	
	
  //PROFILE VIEW
	      
	  public function view_profile() {
					
					$template['page'] = 'profile/view-profile';
					$template['page_title'] = "View profile";
					$id = $this->session->userdata('admin_logged_in')['id'];
					
					
					if($_POST) {
			          $data = $_POST;
						
					    if(isset($_FILES['profile_pic'])) {  
						$config = set_upload_options('assets/uploads/profile_pic/admin');
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
							$result = $this->Profile_model->update_user($data, $id);
							 $this->session->set_flashdata('message',array('message' => 'Edit View Profile Updated successfully','class' => 'success'));
						}
						

						//redirect(base_url().'Profile_details/view_profile');
					}
					    $template['data'] = $this->Profile_model->get_single_profile($id);
						$this->load->view('template', $template);
								
	 }
}
?>