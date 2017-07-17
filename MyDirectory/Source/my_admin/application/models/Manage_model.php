<?php 

class Manage_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	
	
	 public function get_managecollection(){
				
			     /*$this->db->select('uc.id as id, uc.user_category, uc.description, users.username');
			     $this->db->from('user_category as uc' );
				 $this->db->join('users', 'uc.user_id = users.id','left');
				 $this->db->group_by("uc.id"); 
						
				 $query = $this->db->get();
			     $result = $query->result();
			     return $result;*/	
				 $query = $this->db->get('users');
			     $result = $query->result();
			     return $result;
	 }
       
	 function update_delete_status($data,$data1){
		 
				 $this->db->where('id',$data);
				 $result = $this->db->update('users',$data1);
				 return "success";
	 }
	
}
?>