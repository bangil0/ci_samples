<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activate_account extends Auth_Controller {

    public function index() {
		redirect('login');
    }

    /**
     *
     * check: verify and activate account
     *
     * @param int $email the e-mail address that received the activation link
     * @param string $nonce the account nonce associated with the e-mail address
     *
     */

    public function check($email = NULL, $nonce = NULL) {

        $this->load->library('form_validation');

		if (empty($email)
            || !$this->form_validation->is_valid_email(urldecode($email))
            || empty($nonce)
            || !$this->form_validation->alpha_numeric($nonce)
            || !$this->form_validation->exact_length($nonce, 32))
        {
			redirect('login');
		}
        
		$this->load->model('auth/activate_account_model');

        $content_data = array();

        $validation = $this->activate_account_model->activate_member(urldecode($email), $nonce);

        switch ($validation) {
            case "nomatch":
                $content_data['error'] = $this->lang->line('account_not_found');
                break;
            case "banned":
                $content_data['error'] = $this->lang->line('account_is_banned');
                break;
            case "active":
                $content_data['error'] = $this->lang->line('account_active');
                break;
            case "expired":
                $content_data['error'] = $this->lang->line('account_activation_link_expired');
                break;
            case "validated":
                $content_data['success'] = $this->lang->line('account_activated');
                break;
            default:
                $content_data['error'] = $this->lang->line('account_error');
        }

        $this->quick_page_setup(Settings_model::$db_config['active_theme'], 'main', $this->lang->line('resend_activation'), 'activate_account', 'header', 'footer', '', $content_data);
    }

}
