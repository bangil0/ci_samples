<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends Private_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        // set content data
        $this->load->model('profile_model');
        $content_data = $this->profile_model->get_profile();

        $this->template->set_js('widget', base_url() .'assets/js/vendor/jquery.ui.widget.js');
        $this->template->set_js('upload', base_url() .'assets/js/vendor/jquery.fileupload.js');

        if ($glob = glob(FCPATH .'assets/img/members/'. $this->session->userdata('username') .'/profile.{jpg,jpeg,png}', GLOB_BRACE)) {
            $content_data->profile_image = true;
            $path_parts = pathinfo($glob[0]);
            //var_dump($path_parts);
            $content_data->ext = $path_parts['extension']; // get the extension of the file
        }

        //var_dump($content_data);

        $this->quick_page_setup(Settings_model::$db_config['adminpanel_theme'], 'adminpanel', $this->lang->line('my_profile'), 'profile', 'header', 'footer', Settings_model::$db_config['active_theme'], $content_data);
    }

    /**
     *
     * update_account: change member info
     *
     *
     */

    public function update_account() {
        // form input validation
        if ($this->input->post('user_id') != strval(intval($this->input->post('user_id')))) {
            
        }
        $this->form_validation->set_error_delimiters('<p>', '</p>');
        $this->form_validation->set_rules('first_name', $this->lang->line('first_name'), 'trim|required|max_length[40]|min_length[2]');
        $this->form_validation->set_rules('last_name', $this->lang->line('last_name'), 'trim|required|max_length[60]|min_length[2]');
        $this->form_validation->set_rules('email', $this->lang->line('email_address'), 'trim|max_length[255]|is_valid_email|is_db_cell_available_by_id[users.email.'. $this->input->post('user_id') .'.user_id]');
        $this->form_validation->set_rules('password', $this->lang->line('password'), 'trim|required|is_member_password');

        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('membership/profile');
            exit();
        }

        $this->load->model('profile_model');
        $this->profile_model->set_profile($this->input->post('first_name'), $this->input->post('last_name'), $this->input->post('email'));
        $this->session->set_flashdata('success', '<p>'. $this->lang->line('account_updated') .'</p>');
        redirect('membership/profile');
        exit();
    }

    /**
     *
     * update_password: change member password
     *
     *
     */

    public function update_password() {
        $this->form_validation->set_error_delimiters('<p>', '</p>');
        $this->form_validation->set_rules('current_password', $this->lang->line('current_password'), 'trim|required|max_length[64]|is_member_password');
        $this->form_validation->set_rules('new_password', $this->lang->line('new_password'), 'trim|required|max_length[64]|min_length[9]|matches[new_password_again]|is_valid_password');
        $this->form_validation->set_rules('new_password_again', $this->lang->line('new_password_again'), 'trim|required|max_length[64]|min_length[9]');

        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('pwd_error', validation_errors());
            redirect('membership/profile#profile_pwd_form');
            exit();
        }

        $this->load->model('profile_model');
        if ($this->profile_model->set_password($this->input->post('new_password'))) {
            if ($this->input->post('send_copy') != "") {
                $this->load->helper('send_email');
                $this->load->library('email', load_email_config(Settings_model::$db_config['email_protocol']));
                $this->email->from(Settings_model::$db_config['admin_email_address'], $_SERVER['HTTP_HOST']);
                $this->email->to($this->input->post('email'));
                $this->email->subject($this->lang->line('profile_subject'));
                $this->email->message($this->lang->line('email_greeting') ." ". $this->session->userdata('username') . $this->lang->line('profile_message') . addslashes($this->input->post('new_password')));
                $this->email->send();
            }
            $this->session->set_flashdata('pwd_success', '<p>'. $this->lang->line('profile_success') .'</p>');
        }
        redirect('membership/profile');
    }
	
	/**
     *
     * delete_account: delete all user data!
     *
     */
	
	public function delete_account() {
		if ($this->session->userdata('username') == ADMINISTRATOR) {
			$this->session->set_flashdata('error', '<p>'. $this->lang->line('profile_admin_nodelete') .'</p>');
			redirect('membership/profile');
		}
		
		$this->load->model('profile_model');
		if ($this->profile_model->delete_membership()) {

            // delete img folders
            $path = FCPATH .'assets/img/members/'. $this->session->userdata('username');
            $this->load->helper("file"); // load the helper
            delete_files($path, true); // delete all files/folders
            rmdir($path); // remove member folder

			redirect("logout"); // logout controller destroys session and cookies
		}
		$this->session->set_flashdata('error', '<p>'. $this->lang->line('profile_remove_error') .'</p>');
		redirect('membership/profile');
	}


    public function upload_profile_picture() {

        if ($this->input->is_ajax_request()) {

            require APPPATH . 'vendor/Gargron-FileUpload/autoload.php';

            // Simple validation
            $validator = new FileUpload\Validator\Simple(50000, ['image/png', 'image/jpg', 'image/jpeg']);

            // Simple path resolver, where uploads will be put
            $pathresolver = new FileUpload\PathResolver\Simple('uploads/');

            // The machine's filesystem
            $filesystem = new FileUpload\FileSystem\Simple();

            // FileUploader itself
            $fileupload = new FileUpload\FileUpload($_FILES['files'], $_SERVER);

            // Adding it all together. Note that you can use multiple validators or none at all
            $fileupload->setPathResolver($pathresolver);
            $fileupload->setFileSystem($filesystem);
            $fileupload->addValidator($validator);

            // Doing the deed
            list($files, $headers) = $fileupload->processAll();

            // Move file to correct member image directory
            $path_parts = pathinfo(FCPATH . 'uploads/'. $files[0]->name);
            $ext = $path_parts['extension']; // get the extension of the file
            $new_name = "profile.".$ext; // set new name with dynamic extension

            $glob = glob(FCPATH .'assets/img/members/'. $this->session->userdata('username') .'/profile.{jpg,jpeg,png}', GLOB_BRACE);
            $this->_delete_profile_pictures($glob);

            $filesystem->moveUploadedFile(FCPATH . 'uploads/'. $files[0]->name, FCPATH .'assets/img/members/'. $this->session->userdata('username') .'/'. $new_name);

            // Outputting it, for example like this
            foreach($headers as $header => $value) {
                header($header . ': ' . $value);
            }

            // update user profile_img
            $this->load->model('profile_model');
            $this->profile_model->update_profile_img($this->session->userdata('username') .'/'. $new_name);

            echo json_encode(array('files' => $files));
        }else{
            echo false;
        }
    }

    public function delete_profile_picture() {
        $glob = glob(FCPATH .'assets/img/members/'. $this->session->userdata('username') .'/profile.{jpg,jpeg,png}', GLOB_BRACE);

        if ($glob) {
            $this->_delete_profile_pictures($glob);
            redirect('membership/profile');
        }else{
            $this->session->set_flashdata('error', '<p>'. $this->lang->line('nothing_deleted') .'.</p>');
            redirect('membership/profile');
        }
    }


    private function _delete_profile_pictures($glob) {
        foreach ($glob as $img) {
            unlink($img);
        }
    }

}