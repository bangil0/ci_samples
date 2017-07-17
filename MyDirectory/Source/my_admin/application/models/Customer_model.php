<?php 

class Customer_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
 	}
	
	 public function get_customerdetails(){
		 
		 $query = $this->db->get('customer');
		 $result = $query->result();
		 return $result;
		 
	 }
	 
	 public function customer_add($data){
		 
		  $data = array(                 
              'username' => $data['username'],
              'password' => md5($data['password']),
              'first_name' => $data['first_name'],
              'last_name' => $data['last_name'],
              'phone_number' => $data['phone_number'],
              'email'    => $data['email'],                
              'city'    => $data['city'],               
              'country'    => $data['country'],                 
              'profile_picture'    => $data['profile_picture'], 
			  'created_by' => $data['created_by'],
              'status'    => $data['status']                                
          );
		  
		  $result = $this->db->insert('customer', $data);
		  return 'success';
	 }
	 
	 public function get_singlecustomer($id){
		  
		       $query = $this->db->where('id',$id);
			   $query = $this->db->get('customer');
			   $result = $query->row();
			   return $result;  
	 }

     public function customer_edit($data, $id){
		       md5($data, id);
			   $this->db->where('id', $id);
			   $result = $this->db->update('customer', $data); 
			   return "Success";
	 }

     public function customer_delete($id){
		 
			   $this->db->where('id', $id);
			   $result = $this->db->delete('customer');	
			   if($result){
			   return "success";
			   
		       }
		       else
			   {
			   return "error";
		       }
	 }	

      public function get_customerview($id) {
		  
				$query = $this->db->get('customer');
				$result = $query->result();
				return $result;
	 }	

      public function get_customernfo($id){
				        
			    $query = $this->db->where('id',$id);
			    $query = $this->db->get('customer');
			    $result = $query->row();
			    return $result; 		    
	 }



      public function get_single_profile($id) {
		  
				$query = $this->db->where('id', $id);
				$query = $this->db->get('customer');
				$result = $query->row();
				return $result;
	  }	

      public function update_user($data, $id) {
		
					$username = $data['username'];
					$email_id = $data['email_id'];
		
				 $this->db->where("id !=",$id);
				 
				 $this->db->where("(username = '$username' OR email_id = '$email_id' )");
				 //$this->db->where('username', $username);
				// $this->db->or_where('email_id', $email_id);
				 $query= $this->db->get('customer');
				 
				   
					if($query -> num_rows() >0 ) {
					
					 return "Exist";
						   }
				 else {
				 $this->db->where('id', $id);
				 $result = $this->db->update('customer', $data); 
					 return "Success";
				 
				 }
				}	  
}