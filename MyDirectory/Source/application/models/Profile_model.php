<?php
class Profile_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();

           
        }
 
//user review details
  function userReviewDetails($user_id){
      

      $this->db->select('business.*,reviews.user_id,reviews.comments,reviews.rating,reviews.created_date as cdate,reviews.business_id,category.id as catid,category.business_category_name');
      $this->db->from('business_information business');
      $this->db->join('reviews','reviews.business_id=business.id','left');
      $this->db->join('business_categories category','category.id=business.categories','left');
      $this->db->where('reviews.user_id',$user_id);
      $query=$this->db->get();
      $query=$query->result();

       return $query;
  }

//user gallery details
  function userImageDetails($user_id){
      

      $this->db->select('gallery.*,business.id as bid,business.business_name');
      $this->db->from('business_gallery gallery');
      $this->db->join('business_information business','business.id=gallery.business_id','left');
      $this->db->where('gallery.user_id',$user_id);
      $query=$this->db->get();
      $query=$query->result();
     

       return $query;
  }

//add profile image
  function saveProfileimage($data) {
        
        $uId=$data['id'];

      $this->db->where('id',$uId);
      $value=$this->db->get('users');
      $get=$value->row();
      
      if($get)
       {

         $this->db->where('id',$uId);
         $query = $this->db->update('users', $data); 
        
          return $query;
       }
       else
       { 

         $this->db->where('id',$uId);
         $query=$this->db->insert('users', $data); 
       
          return $query;
       } 
     
      
  }  

//user image get
  function userImage($user_id){
      

      $this->db->where('id',$user_id);
      $query=$this->db->get('users');
      $query=$query->row();
     

      return $query;
  }

//aboutme
  function aboutme($data){
      

      $query=$this->db->where('id',$data['id']);
      $query=$this->db->update('users',$data); 

        return $query;
      
  }

//getnames
    function getUserValues($user_id){
      

      $query=$this->db->where('id',$user_id);
      $query=$this->db->get('users');
      $query=$query->row(); 

        return $query;
      
    }

//email
    function email($data){
      
      $email=array(
                  'email'=>$data['new_email']
                  );
      $query=$this->db->where('id',$data['id']);
      $query=$this->db->update('users',$email); 

        return $query;
      
    }

//location
    function location($data){

      $query=$this->db->where('id',$data['id']);
      $query=$this->db->update('users',$data); 

        return $query;
      
    }    

//sum of rating
    function countRating($user_id){

      $query=$this->db->where('user_id',$user_id);
      $this->db->select_sum('rating');
      $query=$this->db->get('reviews'); 
      $query=$query->result();
    
        return $query;
    }


//count of photos
    function countPhotos($user_id){
      
      $this->db->from('business_gallery'); 
      $query=$this->db->where('user_id',$user_id);
      $query=$query->count_all_results();
   
        return $query;
    }

//count of favourite
    function countFavourite($user_id){
      
      $this->db->from('favourite'); 
      $query=$this->db->where('user_id',$user_id);
      $query=$query->count_all_results();
   
        return $query;
    }           

//delete review
    function delReview($data){
      
      
      $this->db->where('business_id',$data['rId']);
      $query=$this->db->delete('reviews');

       return $query;
    }               
 

//edit business rating
  function editRating($data){
      
     
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

//featured collections  in collection page 

  function collectionFeatured() {      
         
      /*$this->db->select('cat.*,business.categories,business.image');
      $this->db->from('business_categories as cat');
      $this->db->join('business_information as business', 'business.categories = cat.id','left');
      $this->db->where('cat.featured_category','1');
      $this->db->group_by('cat.id');
      $query=$this->db->get();
      $query=$query->result();
     
          return $query;*/
		        $this->db->where('featured_category',1);
		        $query = $this->db->get('business_categories');
			    $result = $query->result();
			    return $result; 
  }

//collections default

  function defaultCollection() {      
         
      
      /*$this->db->select('cat.*,business.categories,cat.image,business.id as bid');
      $this->db->from('business_categories as cat');
      $this->db->join('business_information as business', 'business.categories = cat.id','left');
      $this->db->where('cat.featured_category','1');
      $this->db->group_by('cat.id');
      $query=$this->db->get();
      $query=$query->result();
     
          return $query;*/
		        $this->db->where('featured_category',1);
		        $query = $this->db->get('business_categories');
			    $result = $query->result();
			    return $result; 
				
		
  }


//add image
  function saveclctnimage($data) {
      
      $result = $this->db->insert('user_category', $data); 
       
          return $result;
      
  }

// collection view

  function busiCollection($categ_id,$user_id) {      
    
    $this->db->select('business.*,reviews.user_id,reviews.comments,reviews.rating,reviews.created_date as cdate,reviews.business_id,category.id as catid,category.business_category_name,fav.business_id,fav.user_id');
    $this->db->from('business_information business');
    $this->db->join('reviews','reviews.business_id=business.id','left');
    $this->db->join('business_categories category','FIND_IN_SET(category.id,business.categories) > 0','left');
    $this->db->join('favourite fav','fav.business_id=business.id','left');
    $this->db->where('category.id',$categ_id);
    $this->db->where('fav.user_id',$user_id);
    $query=$this->db->get();
    $query=$query->result();
     
      return $query; 

  }

//delete user added image
  function delUserAddedImage($imgId){
      
      
    $this->db->where('id',$imgId);
    $query=$this->db->delete('business_gallery');

      return $query;
  }   

//user added business details
  function UserbusinessDetails($user_id){
 
    $this->db->where('created_by',$user_id);
    $query=$this->db->get('business_information');
    $query=$query->result();
     
        return $query;
   
  }

 }
?>