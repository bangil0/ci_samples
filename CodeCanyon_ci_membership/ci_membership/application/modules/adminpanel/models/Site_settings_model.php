<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_settings_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     *
     * save_settings: save the new settings to the DB
     *
     * @param int $order_by order by this data column
     * @return boolean
     *
     */

    public function save_settings($data) {
        $this->db->update(DB_PREFIX .'settings', $data);
        if($this->db->affected_rows() == 1) {
            return true;
        }
        return false;
    }

    public function clear_sessions() {
        $this->db->where('id != ', $this->session->userdata('session_id'));
        $this->db->delete(DB_PREFIX .'ci_sessions');
        if($this->db->affected_rows() == 1) {
            return true;
        }
        return false;
    }
}