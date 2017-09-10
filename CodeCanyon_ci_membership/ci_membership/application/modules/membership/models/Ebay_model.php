<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ebay_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function set_site($data)
    {

        /* $this->db->where('site_id', $data['site_id']);
         $this->db->delete(DB_PREFIX .'ebay_sites');*/
        $this->db->replace(DB_PREFIX . 'ebay_sites', $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;

    }

    public function set_storage_data($data_key, $data)
    {
        $values = array(
            'data' => $data,
        );

//        $this->db->set('last_login', 'NOW()', FALSE);
        $this->db->where('data_key', $data_key);
        $this->db->update(DB_PREFIX . 'sync_data', $values);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;

    }

    public function get_storage_data($data_key)
    {

        $this->db->select('data');
        $this->db->where('data_key', $data_key);
        $query = $this->db->get(DB_PREFIX . 'sync_data');
       /* if ($query->num_rows() > 0) {
            return $query->row();
        }*/
        $row = $query->row_array();
        return $row['data'];

    }

    public function get_site()
    {
        $this->db->select('site_id , site');
        $query = $this->db->get(DB_PREFIX . 'ebay_sites');

        if ($query->num_rows() > 0){
            foreach($query->result() as $row) {
                $data[$row->site_id] = $row->site;
            }
            return $data;
        }

    }

}


