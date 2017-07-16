<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Business extends CI_Controller {

    public function __construct(){
    
    parent::__construct();
    
    $this->load->model('Business_model','business');

    if(!($this->session->userdata('userdatas')))
    {
      redirect(base_url());
    }
    
    }

//search result
    public function addBusiness(){

      $template['page_title']="Add Business";
      $template['page']='Business/business';
     
      $template['category']=$this->business->getCategory();
 
      
      if($_POST)
      {
        
        $user_details=$this->session->userdata('userdatas');
        $user_id=$user_details['id'];
        $data=$_POST;
        $data['created_by']=$user_id;

         
         $config = $this->set_upload_options();

         $path = $_FILES['image']['name'];
         $ext = pathinfo($path, PATHINFO_EXTENSION);
      
         $new_name = time().".".$ext;
      
         $config['file_name'] = $new_name;

         $this->upload->initialize($config);
      
          if(!$this->upload->do_upload('image')) {
        
            $this->session->set_flashdata('message', array('message' => 'Error Occured While Uploading Files','class' => 'unsucessfull'));
          
          }
          else {

           $upload_data = $this->upload->data();    
      
           $data['image'] = base_url().$config['upload_path']."/".$upload_data['file_name'];

           $result=$this->business->add_business($data);

            if($result)
            {
              $this->session->set_flashdata('msg', array('message' => 'Successfully Added','class' => 'sucessfull left')); 
              redirect(base_url().'Business/addBusiness');
            }
            else
            {
              $this->session->set_flashdata('msg', array('message' => 'Error','class' => 'unsucessfull'));
              redirect(base_url().'Business/addBusiness');  
            }
          }

      }
      else
      {
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


//search result
  public function editBusiness(){

      $template['page_title']="Edit Business";
      $template['page']='Business/edit_business';


      $user_details=$this->session->userdata('userdatas');
      $user_id=$user_details['id'];
      $businesid=$this->uri->segment(3);
      
      if($_POST)
      {

        $data=$_POST;

         if (false === strpos($data['website'], '://')) {
          $data['website'] = 'http://' . $data['website'];
        }
        
          if (false === strpos($data['social_links'], '://')) {
          $data['social_links'] = 'http://' . $data['social_links'];
        }
        
        if (false === strpos($data['other_link'], '://')) {
          $data['other_link'] = 'http://' . $data['other_link'];
        }

        

        $data['created_by']=$user_id;
                
         $config = $this->set_upload_options();

         $path = $_FILES['image']['name'];
         $ext = pathinfo($path, PATHINFO_EXTENSION);
      
         $new_name = time().".".$ext;
      
         $config['file_name'] = $new_name;

         $this->upload->initialize($config);
      
          if(!$this->upload->do_upload('image')) {
        
            $this->session->set_flashdata('message', array('message' => 'Error Occured While Uploading Files','class' => 'unsucessfull'));
          
          }
          else {

           $upload_data = $this->upload->data();    
      
           $data['image'] = base_url().$config['upload_path']."/".$upload_data['file_name'];
           //var_dump($data);exit;
           $result=$this->business->editBusiness($data);


          if($result)
          {
            $this->session->set_flashdata('msg', array('message' => 'Successfully Updated','class' => 'sucessfull left')); 
            redirect(base_url().'Business/editBusiness/'.$data['id']);
          }
          else
          {
            $this->session->set_flashdata('msg', array('message' => 'Error','class' => 'unsucessfull'));
            redirect(base_url().'Business/editBusiness/'.$data['id']);  
          }

       }
      }
      else
      {

        $template['categry']=$this->business->getCategoryBus();
        $template['editBus']=$this->business->editBusInfoView($businesid);
        $this->load->view('template',$template);  
      } 
  }

 //delete user added images
  public function deleBusiness(){
  
    $bId=$this->uri->segment(3);

    $result = $this->business->delUserbusiness($bId);
         
     if($result) {
          
       redirect(base_url().'Profile/profile');
     }
      
     else { 
         
       redirect(base_url().'Profile/profile');  
     }
  }                

}
