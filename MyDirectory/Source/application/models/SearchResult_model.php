<?php
class SearchResult_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();

           
        }
 
//search result  
  function searchResult($data){
    

     $categoryname=$data['business'];
     $city=$data['city'];

    

      $this->db->select('business.*,reviews.business_id as b_id,reviews.rating,categories.id as catid,GROUP_CONCAT(categories.business_category_name ORDER BY categories.id) as business_category_name');
      $this->db->from('business_information business');
      $this->db->join('reviews', 'reviews.business_id = business.id','left');
      $this->db->join('business_categories categories', 'FIND_IN_SET(categories.id,business.categories) > 0','left');
      $this->db->where("categories.business_category_name LIKE '%$categoryname%'" );
     // $this->db->or_where("business.business_name LIKE '%$categoryname%'" );
      $this->db->where('business.city',$city);
      $this->db->where('business.status',1);
      $this->db->group_by('business.id');
      $this->db->select_avg('reviews.rating');
      $query=$this->db->get();
      $query=$query->result();


       return $query;
  }

 

//business details
  function business_details($business_id){
      
      $this->db->select('business.*,reviews.business_id as b_id,reviews.rating,reviews.comments,categories.id as cid,GROUP_CONCAT(categories.business_category_name ORDER BY categories.id) as business_category_name');
      $this->db->from('business_information business');
      $this->db->join('reviews', 'reviews.business_id = business.id','left');
      $this->db->join('business_categories categories','FIND_IN_SET(categories.id,business.categories) > 0','left');
      $this->db->where('business.id',$business_id);
      $this->db->select_avg('reviews.rating');
      $query=$this->db->get();
      $query=$query->row();

       return $query;
  }     

//business rating
  function rating($data){
      
     
     $this->db->from('reviews');
     $this->db->where('business_id',$data['business_id']);
     $this->db->where('user_id',$data['user_id']);
     $get_details=$this->db->count_all_results();
    
        if($get_details)
        {  

          $this->db->where('business_id',$data['business_id']);
          $this->db->where('user_id',$data['user_id']);
          $query = $this->db->update('reviews', $data); 
        
           return $query; 
            
        }
        else
        {  
          $query = $this->db->insert('reviews', $data); 
        
          return $query;
 
        } 
  } 

//review details
  function review_details($business_id){
      
     
      $this->db->select('reviews.*,users.id as u_id,users.username,users.created_date');
      $this->db->from('users');
      $this->db->join('reviews','reviews.user_id=users.id','left');
      $this->db->where('reviews.business_id',$business_id);
      $query=$this->db->get();
      $query=$query->result();

       return $query;
  }

//add image
  function saveimage($data) {
      
      $query=$this->db->insert('business_gallery', $data); 
       
       return $query;
      
  }

//gallery details
  function gallery($business_id){
      
      $this->db->where('business_id',$business_id);
      $query=$this->db->get('business_gallery');
      $query=$query->result();

       return $query;
  }

//limit gallery details
  function limitgallery($business_id){
      
      $this->db->limit(3);
      $this->db->where('business_id',$business_id);
      $query=$this->db->get('business_gallery');
      $query=$query->result();

       return $query;
  }

//advertisement
  function advertisement($business_id){
      
       $city=get_cookie('md_homecity');
      
      $this->db->where('id',$business_id);
      $categ=$this->db->get('business_information')->row()->categories;
      
      $category=explode(",",$categ);
      $this->db->where_in('categories',$category);
      $this->db->where('city',$city);
      $this->db->where('advertisement_status',1);
      $this->db->where('status',1);
      $query=$this->db->get('business_information');
      $query=$query->result();
   
       return $query;
  }

  //add favourite 
    function add_favourite($business_id,$category_id){  
       
        $user_details=$this->session->userdata('userdatas');
        $user_id=$user_details['id'];

         $value=array(

                   'business_id'=>$business_id,
                   'user_id'=>$user_id,
                   'category'=>$category_id
                    );

       $this->db->from('favourite');
       $query=$this->db->where('user_id',$user_id);
       $query=$this->db->where('business_id',$business_id);
       $query=$this->db->count_all_results();
        
        if($query=='0')
        {
        
        $result = $this->db->insert('favourite', $value); 
        
           return $result;
        }
        else
        {
           $query=$this->db->where('user_id',$user_id);
           $query=$this->db->where('business_id',$business_id);
           $result=$this->db->delete('favourite');

           return $result;
        }
    }

  //check favourited or not
    function check_favourite($business_id)
    {
      
      $user_details=$this->session->userdata('userdatas');
      $user_id=$user_details['id'];

       $this->db->from('favourite');
       $query=$this->db->where('user_id',$user_id);
       $query=$this->db->where('business_id',$business_id);
       $query=$this->db->count_all_results();

       return $query;

    }

  //ad in search result page
    function adShow($data){

      
       $categoryName=$data['business'];
       $city=get_cookie('md_homecity');

       $this->db->where("business_category_name LIKE '%$categoryName%' ");
       $catId=$this->db->get('business_categories')->row()->id;
      
      
       $this->db->where("FIND_IN_SET($catId,categories)!=", 0);
       $this->db->where('city',$city);
       $this->db->where('advertisement_status',1);
       $this->db->where('status',1);
       $query=$this->db->get('business_information');
       $query=$query->result();
      
       return $query;
    }
  
  //catid in search result page
    function CategId($data){

      
       $categoryName=$data['business'];
       
       $this->db->where("business_category_name LIKE '%$categoryName%' ");
       $catId=$this->db->get('business_categories')->row()->id;

        return $catId;
    }   
   
  //search map details  
    function Smapdetails($data){
    

     $categorId=$data['CaTid'];
     $city=$data['city'];
     
         

      $this->db->select('business.*,reviews.business_id as b_id,reviews.rating,categories.id as catid,categories.business_category_name');
      $this->db->from('business_information business');
      $this->db->join('reviews', 'reviews.business_id = business.id','left');
      $this->db->join('business_categories categories', 'FIND_IN_SET(categories.id,business.categories) > 0','left');
      $this->db->where('categories.id',$categorId );
      $this->db->where('business.city',$city);
      $this->db->group_by('business.id');
      $this->db->select_avg('reviews.rating');
      $query=$this->db->get();
      $query=$query->result();
     

       return $query;
    }
  
      
  //business page map details  
    function Bmapdetails($data){
    

     $bId=$data['b_id'];
     $city=$data['city'];
     
         

      $this->db->select('business.*,reviews.business_id as b_id,reviews.rating');
      $this->db->from('business_information business');
      $this->db->join('reviews', 'reviews.business_id = business.id','left');
      $this->db->where('business.id',$bId );
      $this->db->where('business.city',$city);
      $this->db->group_by('business.id');
      $this->db->select_avg('reviews.rating');
      $query=$this->db->get();
      $query=$query->result();
     

       return $query;
    }
     
  
 }
?>