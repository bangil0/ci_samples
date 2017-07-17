<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct(){
    
    parent::__construct();
    
    $this->load->model('Profile_model','profile');
    if(!($this->session->userdata('userdatas')))
    {
      redirect(base_url());
    }
      

    }

//profile
    public function profile(){
   
      $template['page_title'] = "Profile";
      $template['page'] = "Profile/profile";
      $template['search']="search";
       
      $user_details=$this->session->userdata('userdatas');
      $user_id=$user_details['id'];
      $template['userReview']=$this->profile->userReviewDetails($user_id);
      $template['prfImages']=$this->profile->userImageDetails($user_id);
      $template['getImage']=$this->profile->userImage($user_id);
      $template['rating']=$this->profile->countRating($user_id);
      $template['photos']=$this->profile->countPhotos($user_id);
      $template['favourite']=$this->profile->countFavourite($user_id);
      $template['businessDetails']=$this->profile->UserbusinessDetails($user_id);

      

     
      $this->load->view('template',$template);
      
             
    }

//profile
  public function Deleterating(){ 

    $data['rId']=$this->uri->segment(3);
    $result=$this->profile->delReview($data);

    if($result) {
          
     
      redirect(base_url().'Profile/profile');
    }
      
          else { 
         
          
            redirect(base_url().'Profile/profile');
          }

  }   

//add profile images
  public function profileImage(){
      

      $template['page_title']="Profile";
      $template['page']="Profile/profile";
      $template['search']="search";
     
      $user_details=$this->session->userdata('userdatas');
      $user_id=$user_details['id'];

    if($_POST) {
    
      $data = $_POST;
      //var_dump(  $data );exit;
      $data['id']=$user_id;
     
      unset($data['submit']);
      $config = $this->set_upload_options();
      $path = $_FILES['image']['name'];
      $ext = pathinfo($path, PATHINFO_EXTENSION);
      
      $new_name = time().".".$ext;
      
      $config['file_name'] = $new_name;

      $this->upload->initialize($config);
      
        if (!$this->upload->do_upload('image')) {
        
          $this->session->set_flashdata('message', array('message' => 'Error Occured While Uploading Files','class' => 'unsucessfull'));
        
        }
        else {

        $upload_data = $this->upload->data();  
      
        $data['image'] = base_url().$config['upload_path']."/".$upload_data['file_name'];
        $result = $this->profile->saveProfileimage($data);
         //var_dump($result);
         if($result) {
          
           $this->session->set_flashdata('message', array('message' => 'Image Saved successfully','class' => 'sucessfull'));
           redirect(base_url().'Profile/profile');
          }
      
          else { 
         
           $this->session->set_flashdata('message', array('message' => 'Cannot Uploaded','class' => 'unsucessfull'));
            redirect(base_url().'Profile/profile');
          }
         
        }
    }
    else {
      
        $this->load->view('template',$template);
    }

    

  }   

 //upload an image options
  private function set_upload_options() {   
    
    $config = array();
    $config['upload_path'] = 'assets/uploads/img';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']      = '5000';
    $config['overwrite']     = FALSE;
  
    return $config;
  }

//settings
  public function settings(){
      

      $template['page_title']="Settings";
      $template['page']="Profile/settings";
      $template['search']="search";
      
      $user_details=$this->session->userdata('userdatas');
      $user_id=$user_details['id'];
      $template['values']=$this->profile->getUserValues($user_id);

      if($_POST)
      {
        $data=$this->input->post();
        $data['id']=$user_id;
      
       
        $result=$this->profile->aboutme($data);

        if($result)
         {
              $this->session->set_flashdata('msg', array('message' => 'Successfully  Updated','class' => 'sucessfull abtmemsg')   ); 
              redirect(base_url().'Profile/settings');
         }
         else
         {
             $this->session->set_flashdata('msg', array('message' => 'Error','class' => 'unsucessfull'));
             redirect(base_url().'Profile/settings');  
         }

      }   
      else
      {
        $this->load->view('template',$template);
      }   
      
  }

//email
  public function email(){
      

      $template['page_title']="Settings";
      $template['page']="Profile/settings";
      $template['search']="search";
      
      $user_details=$this->session->userdata('userdatas');
      $user_id=$user_details['id'];
  

      if($_POST)
      {
        $data=$this->input->post();
        $data['id']=$user_id;
      

          $result=$this->profile->email($data);

        if($result)
         {
              $this->session->set_flashdata('msg', array('message' => 'Successfully Email Updated','class' => 'sucessfull')   ); 
              redirect(base_url().'Profile/settings');  
         }
         else
         {
              $this->session->set_flashdata('msg', array('message' => 'Error','class' => 'unsucessfull'));
              redirect(base_url().'Profile/settings');   
         }
      }   
      else
      {
        $this->load->view('template',$template);
      }     
  }


//location
  public function location(){

     
     $template['page_title']="Settings";
     $template['page']="Profile/settings";
     $template['search']="search";
     
     $user_details=$this->session->userdata('userdatas');
     $user_id=$user_details['id']; 

      if($_POST)
      {
         $data=$this->input->post();
         $data['id']=$user_id;
         $result=$this->profile->location($data);

         if($result)
         {
            $this->session->set_flashdata('msg', array('message' => 'Successfully Updated','class' => 'sucessfull')   ); 
            redirect(base_url().'Profile/settings'); 
         }
         else
         {
            $this->session->set_flashdata('msg', array('message' => 'Error','class' => 'unsucessfull'));
            redirect(base_url().'Profile/settings');   
         }
      }
      else
      { 
      
         $this->load->view('template',$template); 
      }
    
  }

//edit business rating
    public function editRating(){

      $template['page_title']="Profile";
      $template['page']='Profile/profile';
      $template['search']="search";

      $user_details=$this->session->userdata('userdatas');
      $user_id=$user_details['id'];
     
      $data['user_id']=$user_id;
      $data['business_id'] =$_GET['bid'];
      $data['rating'] =$_GET['score'];
      $data['comments'] =$_GET['comments'];
      
      
      $result = $this->profile->editRating($data);
       
        if($result){
           
            redirect(base_url().'Profile/profile');
            
        }
        else{
            
            redirect(base_url().'Profile/profile');
        }
     

    }

//collection
  public function collection(){

    $user_details=$this->session->userdata('userdatas');
    $user_id=$user_details['id'];

     $template['page_title']="Profile";
     $template['page']='Profile/collection';
     $template['search']="search";
     $template['collection'] = $this->profile->collectionFeatured();
     $template['defaultClc'] = $this->profile->defaultCollection();
    

      

      if($_POST) {
    
        $data = $_POST;

       // var_dump($data);exit;
        $data['user_id']=$user_id;

        unset($data['submit']);
        $config = $this->set_upload_clctn_options();


        $this->upload->initialize($config);
      
        if (!$this->upload->do_upload('image')) {
        
        $this->session->set_flashdata('message', array('message' => 'Error Occured While Uploading Files','class' => 'danger'));
        
        }
        else {
      
          $data['image'] = base_url().$config['upload_path']."/".$_FILES['image']['name'];
          $result = $this->profile->saveclctnimage($data);
         
          if($result) {
          
            redirect(base_url().'Profile/collection');
          }
      
          else { 
         
            redirect(base_url().'Profile/collection');  
          }
      
           
        }
      }
      else {
      
       $this->load->view('template',$template); 
      }

  }
//upload an image options
  private function set_upload_clctn_options() {   
    
    $config = array();
    $config['upload_path'] = 'assets/collectionimage';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']      = '5000';
    $config['overwrite']     = FALSE;
  
    return $config;
  }

//collection view
  public function collectionView(){

     $template['page_title']="Collection";
     $template['page']='Profile/collection_view';
     $template['search']="search";

     $user_details=$this->session->userdata('userdatas');
     $user_id=$user_details['id'];
     
     $categ_id=$this->uri->segment(3);
     $template['businClctn'] = $this->profile->busiCollection($categ_id,$user_id);
    
    
        $this->load->view('template',$template); 
     
      

  }  
 
//delete user added images
  public function delImage(){
  
   $imgId=$this->uri->segment(3);

   $result = $this->profile->delUserAddedImage($imgId);
         
     if($result) {
          
       redirect(base_url().'Profile/profile');
     }
      
     else { 
         
       redirect(base_url().'Profile/profile');  
     }

  } 

                   
}
