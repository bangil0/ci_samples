<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_member extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');

        if (! self::check_permissions(15)) {
            redirect("/adminpanel/no_access");
        }
    }

    public function _remap($method, $params = array()) {

        if (method_exists($this, $method))
        {
            return call_user_func_array(array($this, $method), $params);
        }

        if ( ! $this->form_validation->is_natural_no_zero($this->uri->segment(3))) {
            $this->session->set_flashdata('error', '<p>'. $this->lang->line('illegal_request') .'</p>');
            redirect('adminpanel/list_members');
        }

        $this->template->set_js('js', base_url() .'assets/js/vendor/parsley.min.js');

        $this->load->model('contact_member_model');
        $content_data['email'] = $this->contact_member_model->get_email();

        $this->quick_page_setup(Settings_model::$db_config['adminpanel_theme'], 'adminpanel', $this->lang->line('contact_member_title'), 'contact_member', 'header', 'footer', '', $content_data);
    }

    public function send_message() {

        $this->form_validation->set_error_delimiters('<p>', '</p>');
        $this->form_validation->set_rules('user_id', 'user_id', 'trim|required|integer');
        $this->form_validation->set_rules('email', 'email', 'trim|required|max_length[255]|is_valid_email');
        $this->form_validation->set_rules('message', 'message', 'trim|required|max_length[99999]');

        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('/adminpanel/contact_member/'. $this->input->post('user_id'));
        }


        $this->load->helper('send_email');
        $this->load->library('email', load_email_config(Settings_model::$db_config['email_protocol']));
        $this->email->from(Settings_model::$db_config['admin_email_address'], $_SERVER['HTTP_HOST']);
        $this->email->to($this->input->post('email'));
        $this->email->subject("Email from administrator:");
        $this->email->message($this->input->post('message'));
        $this->email->send();

        $this->session->set_flashdata('success', $this->lang->line('contact_member_success'));

        redirect('adminpanel/contact_member/'. $this->input->post('user_id'));

    }

}