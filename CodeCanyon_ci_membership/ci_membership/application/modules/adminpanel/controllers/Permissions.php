<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permissions extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        if (! self::check_permissions(13)) {
            redirect("/adminpanel/no_access");
        }
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('adminpanel/permissions_model');
    }

    public function index(){
        $content_data['permissions'] = $this->permissions_model->get_permissions();

        $this->quick_page_setup(Settings_model::$db_config['adminpanel_theme'], 'adminpanel', 'Permissions', 'permissions', 'header', 'footer', '', $content_data);
    }

    public function permissions_multi() {
        $this->form_validation->set_error_delimiters('<p>', '</p>');
        $this->form_validation->set_rules('permission_id', 'id', 'trim|required|integer');
        $this->form_validation->set_rules('permission_description', $this->lang->line('permission_description'), 'trim|alpha_numeric_spaces|max_length[255]');
        $this->form_validation->set_rules('permission_order', $this->lang->line('permission_order'), 'trim|required|integer');

        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('/adminpanel/permissions');
        }

        if (isset($_POST['edit'])) {
            $this->_edit($this->input->post('permission_id'), array('permission_description' => $this->input->post('permission_description'), 'permission_order' => $this->input->post('permission_order')));
        }elseif(isset($_POST['delete'])) {
            $this->_delete($this->input->post('permission_id'));
        }
    }

    private function _edit($id, $data) {
        $result = $this->permissions_model->save($id, $data);

        if (!$result || $result == "system") {
            $this->session->set_flashdata('error', '<p>'. $this->lang->line('permission_system_noedit') .'</p>');
            redirect('/adminpanel/permissions');
        }

        $this->session->set_flashdata('success', '<p>'. sprintf($this->lang->line('permission_updated'), $id) .'</p>');
        redirect('adminpanel/permissions');
    }

    private function _delete($id) {
        $result = $this->permissions_model->delete($id);

        if (!$result || $result == "system") {
            $this->session->set_flashdata('error', '<p>'. $this->lang->line('permission_system_nodelete') .'</p>');
            redirect('/adminpanel/permissions');
        }

        $this->session->set_flashdata('success', '<p>'. $this->lang->line('permission_removed') .'</p>');
        redirect('adminpanel/permissions');
    }

    public function add_permission() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('permission_description', $this->lang->line('permission_description'), 'trim|required|alpha_numeric_spaces|max_length[255]');
        $this->form_validation->set_rules('permission_order', $this->lang->line('permission_order'), 'trim|required|integer');

        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('/adminpanel/permissions');
            exit();
        }

        if(!$this->permissions_model->create(array('permission_description' => $this->input->post('permission_description'), 'permission_order' => $this->input->post('permission_order')))) {
            $this->session->set_flashdata('error', '<p>'. $this->lang->line('permission_unable_add') .'</p>');
            redirect('adminpanel/permissions');
        }

        $this->session->set_flashdata('success', '<p>'. sprintf($this->lang->line('permission_created'), $this->input->post('permission_description')) .'</p>');
        redirect('adminpanel/permissions');
    }

}
