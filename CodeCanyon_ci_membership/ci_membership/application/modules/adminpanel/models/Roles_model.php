<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Roles_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_roles() {
        $this->db->select('r.role_id, r.role_name, r.role_description, p.permission_id, p.permission_description')->from(DB_PREFIX .'role r');
        $this->db->join(DB_PREFIX .'role_permission rp', 'rp.role_id = r.role_id', 'left');
        $this->db->join(DB_PREFIX .'permission p', 'p.permission_id = rp.permission_id', 'left');
        $this->db->order_by('r.role_id');

        $q = $this->db->get();

        if($q->num_rows() > 0) {
            return $q->result();
        }
        return false;
    }

    public function save($id, $data) {
        $this->db->where('role_id', $id)->update(DB_PREFIX .'role', $data);
        return $this->db->affected_rows();
    }

    public function delete($id) {

        // check whether role is still linked to permissions and to users
        $this->db->trans_start();

        $this->db->where('role_id', $id)->delete(DB_PREFIX .'role_permission');
        $this->db->where('role_id', $id)->delete(DB_PREFIX .'user_role');
        $this->db->where('role_id', $id)->delete(DB_PREFIX .'role');

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return false;
        }

        return $this->db->affected_rows();
    }

    public function create($data) {
        $this->db->insert(DB_PREFIX .'role', $data);
        return $this->db->affected_rows();
    }

    public function get_all_permission_ids() {
        $this->db->select('permission_id')->from(DB_PREFIX .'permission');
        $q = $this->db->get();
        return $q->result();
    }

    public function delete_permissions_by_role() {
        $this->db->where('role_id', $this->input->post('role_id'))->delete(DB_PREFIX .'role_permission');
        return $this->db->affected_rows();
    }

    public function insert_checked_permission($permission_id) {
        $insert_query = $this->db->insert_string(DB_PREFIX .'role_permission', array('role_id' => $this->input->post('role_id'), 'permission_id' => $permission_id));
        $insert_query = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $insert_query);
        $this->db->query($insert_query);
    }

    public function remove_unchecked_permission($permission_id) {
        $this->db->where(array('role_id' => $this->input->post('role_id'), 'permission_id' => $permission_id))->delete(DB_PREFIX .'role_permission');
    }

}