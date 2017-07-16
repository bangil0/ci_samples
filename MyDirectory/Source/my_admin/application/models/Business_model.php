<?php 

class Business_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	

	function get_businessinformation(){
		
				/*$this->db->select('bi.id as id, bi.business_name, bi.status, bi.phone_number, bi.email, bi.street_address, bi.categories, bi.city, bi.state, bi.zip_code, bi.created_by, users.first_name,
				GROUP_CONCAT(business_categories.business_category_name ORDER BY business_categories.id) as business_category_name');
				$this->db->join('business_categories', 'FIND_IN_SET(business_categories.id, bi.categories) > 0','left');
				*/		
                 $this->db->select('bi.id as id, bi.business_name, bi.status, business_categories.business_category_name, bi.phone_number, bi.email, bi.street_address, bi.categories, bi.city, bi.state, bi.zip_code, bi.created_by, users.first_name');
			     $this->db->from('business_information as bi' );
			     $this->db->join('users', 'bi.created_by = users.id','left');
			     $this->db->join('business_categories', 'bi.categories = business_categories.id','left');
				 $this->db->group_by("bi.id"); 
				
				    $menu = $this->session->userdata('admin');
					if($menu!='1'){						
						$user = $this->session->userdata('id');
						$this->db->where('bi.created_by', $user);
					}
			  
				 $query = $this->db->get();
			     $result = $query->result();
			     return $result;				
     }
		
	function get_businessinfo($id){
		
				        
                $this->db->select('bi.id as id, bi.business_name, bi.status, bi.first_name, bi.last_name, bi.year_established, bi.image, business_categories.business_category_name, bi.phone_number, bi.email, bi.street_address, bi.categories, bi.city, bi.state, bi.zip_code, bi.created_by, GROUP_CONCAT(business_categories.business_category_name ORDER BY business_categories.id) as business_category_name');
				$this->db->from('business_information as bi' );
				//$this->db->join('business_categories', 'bi.categories = business_categories.id','left');
				$this->db->join('business_categories', 'FIND_IN_SET(business_categories.id, bi.categories) > 0','left');
				$this->db->group_by("bi.id"); 			
				
			    $this->db->where('bi.id',$id);					
				$query = $this->db->get();
			    $result = $query->row();				
			    return $result;					
	}

	function get_reviews($id){
		    
		        $this->db->select('reviews.id as id, reviews.rating, reviews.business_id,  business_categories.business_category_name, business_information.business_name, reviews.comments, reviews.user_id, users.image, users.first_name');   
				$this->db->from('reviews' );
				$this->db->join('business_information', 'reviews.business_id = business_information.id','left');
				$this->db->join('business_categories', 'business_information.categories = business_categories.id','left');
				$this->db->join('users', 'reviews.user_id = users.id','left');
								
                $this->db->where('reviews.business_id',$id);			
				$query = $this->db->get();			
			    $result = $query->result();								
			    return $result;					
	}
	 
	function get_map($id){
		
		        $query = $this->db->where('id',$id);
			    $query = $this->db->get('business_information');
			    $get_details=$query->row();
				
				if($get_details)
				{
				   return $get_details;
				}
				else
				{
				  return "Novalue";
				}  
			    return $result;
	 }	 
     function  businessinfo_add($data){
		    
              $array = $data['categories'];
              $comma_separated = implode(",", $array);
              $data['categories']=$comma_separated;
			  //$data['website']="http://".$data['website'];
			  //$data['social_links']="http://".$data['social_links'];
			  //$data['other_link']="http://".$data['other_link'];
			  //var_dump($data['social_links']);exit;
			           /* $data['website'] =  $data['website'];

						if(strpos($data['website'], 'http://') !== 0) {
						   $data['website']= 'http://' .  $data['website'];
						} else {
						   $data['website']= $data['website'];
						}
						
						 $data['social_links'] =  $data['social_links'];

						if(strpos($data['social_links'], 'http://') !== 0) {
						   $data['social_links']= 'http://' .  $data['social_links'];
						} else {
						   $data['social_links']= $data['social_links'];
						}
						
						 $data['other_link'] =  $data['other_link'];

						if(strpos($data['other_link'], 'http://') !== 0) {
						   $data['other_link']= 'http://' .  $data['other_link'];
						} else {
						   $data['other_link']= $data['other_link'];
						}*/
			  $result = $this->db->insert('business_information' ,$data);
			  return $result;	  
     }    
 
	public function get_single_business($id){
		
		  
		       $query = $this->db->where('id',$id);
			   
			   	$menu = $this->session->userdata('admin');
				if($menu!='1'){
					$user = $this->session->userdata('id');
					$this->db->where('business_information.created_by', $user);
				}
			   
			   $query = $this->db->get('business_information');
			   $result = $query->row();
			   return $result;  
	}		
    public function businessinfo_edit($data, $id){
			   
			   $array = $data['categories'];
               $comma_separated = implode(",", $array);
               $data['categories']=$comma_separated;

                        /*if(strpos($data['website'], 'http://') !== 0) {
						   $data['website']= 'http://' .  $data['website'];
						} 
						/*elseif(strpos($data['website'], 'https://') !== 0) {
							   $data['website']= 'https://' .  $data['website'];
						}*/	
						/*else {
						   $data['website']= $data['website'];
						}
						
						 $data['social_links'] =  $data['social_links'];

						if(strpos($data['social_links'], 'http://') !== 0) {
						   $data['social_links']= 'http://' .  $data['social_links'];
						} else {
						   $data['social_links']= $data['social_links'];
						}
						
						 $data['other_link'] =  $data['other_link'];

						if(strpos($data['other_link'], 'http://') !== 0) {
						   $data['other_link']= 'http://' .  $data['other_link'];
						} else {
						   $data['other_link']= $data['other_link'];
						}*/
			   
			   $this->db->where('id', $id);
			   $result = $this->db->update('business_information', $data); 
			   return "Success";
	}				 
	public function businessinformation_delete($id){

			    $this->db->where('id', $id);
	
				   $menu = $this->session->userdata('admin');
				   if($menu!='1'){
				   $user = $this->session->userdata('id');
				   $this->db->where('business_information.created_by', $user);
	            }
			   
			   $result = $this->db->delete('business_information');	
			   if ($this->db->affected_rows()) {
			   return "success";
			   
		       }
		       else{
			   return "error";
		       }
	}
	
	 function update_business_status($data,$data1){
		 
				 $this->db->where('id',$data);
				 $result = $this->db->update('business_information',$data1);
				 return "success";
	 }
	
	 public function get_category() {
		
			   
				$query = $this->db->get('business_categories');
			    $result = $query->result();
			    return $result; 				
	 }
  
	
	
	
	
	
	
	
}
?>