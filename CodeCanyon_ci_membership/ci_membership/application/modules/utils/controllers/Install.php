<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Install extends Site_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    function index() {

        $content_data['error'] = ''; // overwritten when install enabled setting is true

        $this->load->model('auth/register_model');

        $result = $this->register_model->create_member('administrator', '1234', Settings_model::$db_config['admin_email_address'], '', '', 1, 1);

        // add default member role
        if ($result == "installed") {
            $content_data['error'] = "The administrator account has already been added to the system.";
        }elseif ($result) {
            $content_data['success'] = 'Administrator account successfully created.';
            $content_data['error'] = "";

            $this->load->model('utils/rbac_model');
            $this->rbac_model->create_user_role(array('user_id' => $result['user_id'], 'role_id' => 1));

            // create directory
            if (!file_exists(FCPATH .'assets/img/members/administrator')) {
                mkdir(FCPATH .'assets/img/members/administrator');
                $content_data['success'] = "Installation successful! You are now one step closer to your achievement.";
            }else{
                $content_data['error'] = $this->lang->line('create_imgfolder_failed');
            }
        }else{
            $content_data['error'] = "Failed to add administrator account to the DB.";
        }

        $this->quick_page_setup(Settings_model::$db_config['active_theme'], 'main', 'Install', 'install', 'header', 'footer', '', $content_data);

    }

}
