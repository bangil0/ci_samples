<?php
class Collection_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }
		
		
		public function get_businessname($id){
			
					$this->db->where('id', $id);
					$query = $this->db->get('business_categories');
					$result = $query->row();
					return $result; 		
		}
		
		public function get_businessdetails($id){
				
				    $this->db->select('bi.id as id, bi.business_name, bi.image, bi.description, bi.street_address, bi.categories');
			        $this->db->from('business_information as bi' );					
				    $this->db->group_by("bi.id"); 
				
				    $this->db->where("FIND_IN_SET('$id',bi.categories) !=", 0);
				    //$this->db->where('FIND_IN_SET(bi.categories,$id)');
				    $query = $this->db->get();
			        $result = $query->result();
			        return $result;	
		}
		
		
}
	
?>