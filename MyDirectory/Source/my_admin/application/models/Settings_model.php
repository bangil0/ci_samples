<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
   }
   

	  
	 function settings_view(){
		 
		  $query = $this->db->query(" SELECT * FROM `settings` order by id DESC ")->row();
		  return $query ;
	 }
	 
	 public function get_single_settings($id){
		
		  
		       $query = $this->db->where('id',$id);
			   $query = $this->db->get('settings');
			   $result = $query->row();
			   return $result;  
	 }	
	 
	 public function update_settings($data){
		 
		           //$this->db->where('id', $id);
				   $result = $this->db->update('settings', $data); 
				   return $result;
	 }
	 
  
   }
  ?>