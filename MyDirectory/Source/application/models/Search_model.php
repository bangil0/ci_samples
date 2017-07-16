<?php
class Search_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();

           
        }
  
  //get search datas of city
   function get_city_search($data) {
     
    
        $this->db->distinct();
        $this->db->group_by('city');
        $this->db->order_by('id', 'DESC');
        $this->db->like('city', $data);
        $query=$this->db->get('business_information');
        $query=$query->result_array();
      
       return $query;
     
   }

  //get search datas of business
   function get_business_search($data) {



     /* $this->db->distinct();
      $this->db->group_by('categories.business_category_name');
      $this->db->order_by('categories.id', 'DESC');
      $this->db->select('business.business_name,business.id,business.categories,categories.id as catid,categories.business_category_name ');
      $this->db->from('business_information business');
      $this->db->join('business_categories categories','categories.id =business.categories','left');
      $this->db->like('categories.business_category_name', $data);
      $this->db->or_like('business.business_name', $data);
      $query=$this->db->get();
      $query=$query->result_array();*/
     
      $this->db->distinct();
      $this->db->group_by('business_category_name');
      $this->db->order_by('id', 'DESC');
      $this->db->like('business_category_name', $data);
      $query=$this->db->get('business_categories');
      $query=$query->result_array();
      
       return $query;
     
   }
       

}
?>