<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_member_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function send_message() {

    }

    public function get_email() {
        $this->db->select('email')->from(DB_PREFIX .'users')->where('user_id', $this->uri->segment(3))->limit(1);
        $q = $this->db->get();
        return $q->row()->email;
    }

}