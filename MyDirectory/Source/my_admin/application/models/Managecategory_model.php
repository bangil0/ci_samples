<?php 

class Managecategory_model extends CI_Model {
	
	 public function _consruct(){
		parent::_construct();
 	 }
	
	 public function get_businessinformation() {			 
		     
				 $this->db->where("featured_category",1);
				 $query=$this->db->get('business_categories');
				 $result = $query->result();			
				 return $result;
     } 	 
	 public function category_get(){
	             
				 $this->db->select("id, business_category_name, featured_category");
				 $this->db->where("status",1);
		         $this->db->from('business_categories');
		         $result = $this->db->get()->result();			
		         return $result;
	 }

	 public function featured_category_count() {
		
				 $this->db->where('featured_category', 1);
				 $this->db->from('business_categories');
				 $count = $this->db->count_all_results();
				 return $count;
	 }
	 
	 public function update_categories($data){	
	 
				 $this->db->where('id', $data['id']);
				 $result = $this->db->update('business_categories', $data);
				 return $result;	
	 }
	 
	 public function update_category($data, $id) {
		
				 $this->db->where('id', $id);
				 $result = $this->db->update('business_categories', $data); 
				   
				 if($result) {
				 return true;
				   }
				 else {
				 return false;
				   }
	 }
	 
	 public function get_single_category(){
		 
				 $query = $this->db->get('business_categories');
				 $result = $query->result();
				 return $result;
	 }
	 
	 public function  categoryadd($data){	

                   	         /*$data = array(								 
							 'business_category_name' => $data ['business_category_name'],
							 'image'  => $data ['image'],
							 'featured_category'  => $data ['featured_category'],
                             						 
                                           );	*/									                            						 
						// $this->db->insert('ot_car_type', $data1);	 
               
			     $this->db->insert('business_categories', $data);
			     return "success";
     }     
	 
	 public function update_delete_status($data,$data1){
		 
				 $this->db->where('id',$data);
				 $result = $this->db->update('business_categories',$data1);
				 return "success";
	 }
	 
	 public function get_single_categories($id){ 
			   
			   $query = $this->db->where('id',$id);
			   $query = $this->db->get('business_categories');
			   $result = $query->row();
			   return $result;
	 }	
	 
	 public function category_edit($data, $id){
			   			
			   $this->db->where('id', $id);
			   $result = $this->db->update('business_categories', $data); 
			   return "Success";
	 }	

    
   	 
}
?>