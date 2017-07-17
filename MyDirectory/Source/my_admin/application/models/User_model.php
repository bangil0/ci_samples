<?php 

class User_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	
	
	 function get_userdetails(){
	   
			   $query = $this->db->get('users');
			   $result = $query->result();
			   return $result;
     }
	   
	 function userdetails_get($id){
		
			   $query = $this->db->where('id',$id);
			   $query = $this->db->get('users');
			   $result = $query->row();
			   return $result; 
			    
	 }	
	 
	 function  userdetails_add($data){
		   
			   $result =$this->db->insert('users',$data);
			   return "success";
     }
	 
	 function get_single_user($id){
		  
		       $query = $this->db->where('id',$id);
			   $query = $this->db->get('users');
			   $result = $query->row();
			   return $result;  
	   }
	   
	 function userdetails_edit($data, $id){
		    
			   $this->db->where('id', $id);
			   $result = $this->db->update('users', $data); 
			   return "Success";
	 }
	   
	 function userdetails_delete($id){
		 
			   var_dump($id);
			   $this->db->where('id', $id);
			   $result = $this->db->delete('users');	
			   if($result){
			   return "success";
			   
		       }
		       else
			   {
			   return "error";
		       }
	 }
	 
	 function get_usercategori($id){
				        
			   $query = $this->db->where('id',$id);
			   $query = $this->db->get('users');
			   $result = $query->row();
               return $result; 		    
	 }
	 
	 function get_usercategory($id){
		   
			   //get Business name and Category name
			   $this->db->select('fr.id as id, bi.business_name, fr.category, fr.category_status, bc.business_category_name');
		       $this->db->from('favourite as fr' );	
			   $this->db->join('business_information as bi', 'fr.business_id = bi.id','left');
			   //$this->db->join('user_category as uc', 'fr.category = uc.id','left');
			   $this->db->join('business_categories as bc', 'fr.category = bc.id','left');
				
			   $query = $this->db->where('fr.user_id',$id);	
			   $query = $this->db->get();
			   $result = $query->result();
			   return $result;
	 }
	 
	 function update_user_status($data,$data1){
		 
				 $this->db->where('id',$data);
				 $result = $this->db->update('users',$data1);
				 return "success";
				 
	 }
	 
		
}
?>