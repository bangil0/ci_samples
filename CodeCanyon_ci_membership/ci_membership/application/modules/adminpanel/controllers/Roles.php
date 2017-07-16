<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Roles extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        if (! self::check_permissions(13)) {
            redirect("/adminpanel/no_access");
        }
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('adminpanel/roles_model');
    }

    public function index(){
        $roles = $this->roles_model->get_roles();

        $content_data = array();

        $this->load->model('adminpanel/permissions_model');
        $permissions = $this->permissions_model->get_permissions();

        // loop through roles for each permission
        $role_id = 0;
        foreach ($roles as $role) {

            if ($role_id != $role->role_id) {
                // new role detected
                $content_data['roles'][$role->role_id]['role_name'] = $role->role_name;
                $content_data['roles'][$role->role_id]['role_description'] = $role->role_description;
                $role_id = $role->role_id;

                foreach ($permissions as $permission) {
                    $content_data['roles'][$role->role_id]['permissions'][$permission->permission_id]['active'] = false;
                    $content_data['roles'][$role->role_id]['permissions'][$permission->permission_id]['description'] = $permission->permission_description;
                }
            }

            foreach ($permissions as $permission) {
                if ($permission->permission_id == $role->permission_id) {
                    $content_data['roles'][$role->role_id]['permissions'][$permission->permission_id]['active'] = true;
                }
            }
        }

        $content_data['permissions'] = $permissions;

        $this->template->set_js('js', base_url() .'assets/js/vendor/parsley.min.js');

        $this->quick_page_setup(Settings_model::$db_config['adminpanel_theme'], 'adminpanel', $this->lang->line('roles_title'), 'roles', 'header', 'footer', '', $content_data);
    }


    public function roles_multi() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('role_id', 'id', 'trim|integer');
        $this->form_validation->set_rules('role_description', $this->lang->line('role_description'), 'trim|max_length[255]');

        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('/adminpanel/roles');
            exit();
        }

        if (isset($_POST['save'])) {
            $this->_save($this->input->post('role_id'), array('role_name' => $this->input->post('role_name'), 'role_description' => $this->input->post('role_description')));
        }elseif(isset($_POST['delete'])) {
            $this->_delete($this->input->post('role_id'));
        }
    }


    private function _save($id, $data) {
        if ($id == 1) { // check for admin role id - cannot be removed
            $this->session->set_flashdata('error', '<p>'. $this->lang->line('roles_admin_noedit') .'</p>');
            redirect('adminpanel/roles');
        }

        $this->roles_model->save($id, $data);

        $this->session->set_flashdata('success', '<p>'. sprintf($this->lang->line('role_updated'), $id) .'</p>');
        redirect('adminpanel/roles');
    }


    private function _delete($id) {

        if ($id == 1) { // check for admin role id - cannot be removed
            $this->session->set_flashdata('error', '<p>'. $this->lang->line('roles_admin_nodelete') .'</p>');
            redirect('adminpanel/roles');
        }elseif ($id == 4) { // check for member role id - cannot be removed
            $this->session->set_flashdata('error', '<p>'. $this->lang->line('roles_member_nodelete') .'</p>');
            redirect('adminpanel/roles');
        }

        $this->roles_model->delete($id);


        $this->session->set_flashdata('success', '<p>'. $this->lang->line('role_removed') .'</p>');
        redirect('adminpanel/roles');
    }


    public function add_role() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('role_name', $this->lang->line('role_name'), 'trim|required|max_length[50]');
        $this->form_validation->set_rules('role_description', $this->lang->line('role_description'), 'trim|max_length[255]');

        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('/adminpanel/roles');
        }

        if(!$this->roles_model->create(array('role_name' => $this->input->post('role_name'), 'role_description' => $this->input->post('role_description')))) {
            $this->session->set_flashdata('error', 'Unable to add role.');
            redirect('adminpanel/roles');
        }

        $this->session->set_flashdata('success', '<p>'. $this->lang->line('role_added') .'</p>');
        redirect('adminpanel/roles');
    }


    public function save_role_permissions() {

        if ($this->input->post('role_id') == 1) { // check for admin role id - cannot be removed
            $this->session->set_flashdata('error', '<p>'. $this->lang->line('roles_admin_permissions_noedit') .'</p>');
            redirect('adminpanel/roles');
        }

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('role_id', 'ID', 'trim|required|integer');
        $this->form_validation->set_rules('role_description', $this->lang->line('role_description'), 'trim|max_length[255]');

        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('/adminpanel/roles');
        }

        $permissions = $this->roles_model->get_all_permission_ids();

        if(!isset($_POST['permissions']))
        {
            // delete all in case no checkboxes are checked and the post variable is not there
            $this->roles_model->delete_permissions_by_role();
        }
        elseif ($permissions) {

            // verify all currently existing permissions against checked permissions
            foreach ($permissions as $p) {

                $checked = false;

                foreach($_POST['permissions'] as $active_permission) {

                    if (! $this->form_validation->integer($active_permission)) {
                        $this->session->set_flashdata('error', '<p>'. $this->lang->line('illegal_input') .'</p>');
                        redirect('adminpanel/roles');
                    }

                    // permission is checked: insert ignore
                    if ($active_permission == $p->permission_id) { // match currently looped permissions using unique key in DB
                        $this->roles_model->insert_checked_permission($p->permission_id);
                        $checked = true;
                    }
                }

                if (!$checked) {
                    // permission was not found in post variables, delete now
                    $this->roles_model->remove_unchecked_permission($p->permission_id);
                }
            }
        }

        $this->session->set_flashdata('success', '<p>'. $this->lang->line('role_permission_updated') .'</p>');
        redirect('adminpanel/roles');
    }

}
