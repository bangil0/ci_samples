<?php
class Business_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();

           
        }
 
//add business 
  function add_business($data){

    $array = $data['categories'];
    $comma_separated = implode(",", $array);
    $data['categories']=$comma_separated;
     
    $query=$this->db->insert('business_information', $data); 
        
    return $query;
          
  }

//get business  category
  function getCategory(){
     
    $query=$this->db->get('business_categories');
    $query=$query->result();
     
    return $query;
          
  }
//get business  category
  function getCategoryBus(){
     
    $query=$this->db->get('business_categories');
    $query=$query->result();
     
    return $query;
          
  }
//view business details
  function editBusInfoView($businesid){
   
   $this->db->select('business.*,categories.id as cid,GROUP_CONCAT(categories.business_category_name ORDER BY categories.id) as business_category_name');
   $this->db->from('business_information business');
   $this->db->join('business_categories categories','FIND_IN_SET(categories.id,business.categories) > 0','left');
   $this->db->where('business.id',$businesid);
   $query=$this->db->get();
   $query=$query->row();
     
       return $query;

  } 

//delete review
  function delUserbusiness($bId){
      
      
    $this->db->where('id',$bId);
    $query=$this->db->delete('business_information');

      return $query;
  }               

//edit business details
  function editBusiness($data){

    $array = $data['categories'];
    $comma_separated = implode(",", $array);
    $data['categories']=$comma_separated;

   

    $this->db->where('id',$data['id']);
    $this->db->where('created_by',$data['created_by']);
    $query=$this->db->update('business_information',$data);

      return $query;

  }  
   
  
 }
?>