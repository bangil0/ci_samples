<?php
class Feature_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }
		
	public function get_category(){
		  
		        
               /* $this->db->select('bi.id as id, bi.categories, bi.business_name, bi.image, GROUP_CONCAT(business_categories.business_category_name ORDER BY business_categories.id) as business_category_name');
				$this->db->from('business_information as bi' );	
				$this->db->join('business_categories','FIND_IN_SET(business_categories.id,bi.categories) > 0','left');
				$this->db->group_by("bi.id"); 
				
				$query = $this->db->get();
			    $result = $query->result();
				//echo "<pre>";
				//var_dump($result);
				//exit();
			    return $result;		*/	
				
				
                $query = $this->db->get('business_information');
				$this->db->group_by("id"); 
			    $result = $query->result();
				//echo "<pre>";
				//var_dump($result);
			    return $result;				
				
              
	}
	 
	public function get_featurecategory(){
		        
				$this->db->limit(3);
		        $query = $this->db->get('business_categories');
			    $result = $query->result();
				//echo "<pre>";
				//var_dump($result);
			    return $result; 
				 
	}
	 
	public function get_categoryname(){
		 
				$query = $this->db->get('business_categories');
				$result = $query->result();		
				return $result;
	}
	
}
	
?>