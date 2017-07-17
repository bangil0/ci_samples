<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     *
     * get_profile: get the member pages
     *
     * @return mixed
     *
     */

    public function get_profile() {
        $this->db->select('user_id, first_name, last_name, email');
        $this->db->from(DB_PREFIX .'users');
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1) {
            return $query->row();
        }
        return false;
    }

    /**
     *
     * set_profile: update pages
     *
     * @param string $first_name
     * @param string $last_name
     * @param string $email
     * @return boolean
     *
     */

    public function set_profile($first_name, $last_name, $email = "") {
        $data = array(
               'first_name' => $first_name,
               'last_name' => $last_name,
            );
        if (!empty($email)) {
            $data['email'] = $email;
        }

        $this->db->where('username', $this->session->userdata('username'));
        $this->db->update(DB_PREFIX .'users', $data);

        return $this->db->affected_rows();
    }

    /**
     *
     * set_password: update member password
     *
     * @param string $password
     * @return boolean
     *
     */

    public function set_password($password) {
        $this->load->helper('password');
        $new_nonce = md5(uniqid(mt_rand(), true));
        $data = array(
               'password' => hash_password($password, $new_nonce),
               'nonce' => $new_nonce
            );

        $this->db->where('username', $this->session->userdata('username'));
        $this->db->update(DB_PREFIX .'users', $data);

        return $this->db->affected_rows();
    }
	
	/**
     *
     * delete_membership: remove a whole user account
     *
     * @return bool
     *
     */
	 
	public function delete_membership() {

        $this->db->trans_start();

        // remove roles
        $this->db->where('user_id', $this->session->userdata('user_id'))->delete(DB_PREFIX .'user_role');

		$this->db->where('username', $this->session->userdata('username'))->delete(DB_PREFIX .'users');

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return false;
        }

        return true;

	}

    public function update_profile_img($image_name) {
        $this->db->where('user_id', $this->session->userdata('user_id'))->update(DB_PREFIX .'users', array('profile_img' => $image_name));

        return $this->db->affected_rows();
    }

}