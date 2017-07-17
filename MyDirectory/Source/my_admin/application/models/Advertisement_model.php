<?php 

class Advertisement_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	

	 
	 public function get_businessname() {
		 
				$this->db->select("id, business_name, advertisement_status");
				$this->db->where("status",1);
				$this->db->from("business_information");
				$result = $this->db->get()->result();
				return $result;
	 }
	
	  public function get_advertisement() {			 
		         				 
				 $this->db->where("advertisement_status",1);
				 $query=$this->db->get('business_information');
				 $result = $query->result();			
				 return $result;
     }
	
	  public function businessname_count() {
		         
				 //$this->db->where('status', 1);
				 $this->db->where('advertisement_status', 1);
				 $this->db->from('business_information');
				 $count = $this->db->count_all_results();
				 return $count;
	 }
	
	 
	  public function update_businessname($data){	
	 
				 $this->db->where('id', $data['id']);
				 $result = $this->db->update('business_information', $data);
				 //var_dump($data);
				 //exit();
				 return $result;	
	 }
	 
	 function update_business($data, $id) {
		
			     $this->db->where('id', $id);
			     $result = $this->db->update('business_information', $data); 
			   
			     if($result) {
				 return true;
			     }
			     else {
				 return false;
			     }
     }
	 
	  
}