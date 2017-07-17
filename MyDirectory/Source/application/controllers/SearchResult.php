<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchResult extends CI_Controller {

    public function __construct(){
    
    parent::__construct();
    
    $this->load->model('SearchResult_model','sresult');
    
    }

//search result
    public function result(){

      $template['page_title']="Business";
      $template['page']='Search/search';
      $template['search']="search";
    
     if((isset($_GET)) and (!empty($_GET)))
     {
       $data=$_GET;

     }
     else
     {
      
       $data['city']=get_cookie('md_homecity');
       $data['business']="";
     } 
    
         
          $sess_datas=array(
                          'business'=>$data['business'],
                          'city'=>$data['city']
                           );
        $this->session->set_userdata('searchResult',$sess_datas);
             
      
      if($data)
      {
         $template['result']=$this->sresult->searchResult($data);
         $template['data']=$data;
          
      
         if($template['result'])
         {  
            
            $template['ad']=$this->sresult->adShow($data);
            $template['Catid']=$this->sresult->CategId($data);
            $this->load->view('template',$template);
         }
         else
         {
        
             $this->session->set_flashdata('msg', array('message' => 'No Result','class' => 'unsucessfull'));  
             $template['page']='Noresult/noresultfound';  
             $this->load->view('template',$template);
         }
      }
      else
      { 
                    
        $this->load->view('template',$template);
      } 

    }

   

//business details(3rd page)
    public function businessDetails(){

      $template['page_title']="Business";
      $template['page']='Search/business_details';
      $template['search']="search";
    

      $business_id=$this->uri->segment(3);
      $template['details']=$this->sresult->business_details($business_id);
      $template['review']=$this->sresult->review_details($business_id); 
      $template['gallery']=$this->sresult->gallery($business_id); 
      $template['limitgallery']=$this->sresult->limitgallery($business_id);
      $template['advertisement']=$this->sresult->advertisement($business_id);
      $template['favourite']=$this->sresult->check_favourite($business_id);
      $template['buSId']=$business_id;  
      
      if($template['details'])
      {
         $this->load->view('template',$template);
      }
      else
      {
         redirect(base_url().'SearchResult/result');
      } 
     

    }

//business rating
    public function rating(){

      $template['page_title']="Business";
      $template['page']='Search/business_details';
      $template['search']="search";

      $user_details=$this->session->userdata('userdatas');
      $user_id=$user_details['id'];
      $data['user_id']=$user_id;
      $data['business_id'] =$_GET['bid'];
      $data['rating'] =$_GET['score'];
      $data['comments'] =trim($_GET['comments']);
    
     
      
      $result = $this->sresult->rating($data);
        
        if($result){
           
           redirect(base_url().'SearchResult/businessDetails/'.$data['business_id']);
            
        }
        else{
            
           redirect(base_url().'SearchResult/businessDetails/'.$data['business_id']);
        }
     

    }

//add business images
  public function addBusinessImage(){
      

      $template['page_title']="Business";
      $template['page']='Search/business_details';
      $template['search']="search";

      $user_details=$this->session->userdata('userdatas');
      $user_id=$user_details['id'];

    if($_POST) {
    
      $data = $_POST;
     
      $data['user_id']=$user_id;
      $business_id=$data['business_id'];

      unset($data['submit']);
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
        $result = $this->sresult->saveimage($data);
       
         if($result) {
          
           $this->session->set_flashdata('message', array('message' => 'Image Saved successfully','class' => 'sucessfull'));
           redirect(base_url().'SearchResult/businessDetails/'.$business_id);
          }
      
          else { 
         
           $this->session->set_flashdata('message', array('message' => 'Cannot Uploaded','class' => 'unsucessfull'));
           redirect(base_url().'SearchResult/businessDetails/'.$business_id); 
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
    $config['upload_path'] = 'assets/businessimage';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']      = '5000';
    $config['overwrite']     = FALSE;
  
    return $config;
  }

//add favourite  
  public function favourite(){
    
    $template['page_title']="Business";
    $template['page']='Search/business_details';
    $template['search']="search";

    $business_id=$_GET['business_id'];
    $category_id=$_GET['category'];

    $result=$this->sresult->add_favourite($business_id,$category_id);

     if($result)
      {
        echo 1;
      }
      else
      {
         echo 0;
      } 
     

  }  

//map show in search page
  public function mapShow(){

    $template['page_title']="Business";
    $template['page']='Search/Smapview';
    $template['search']="search";

    $data['CaTid']=$this->uri->segment(3);
    $data['city']=get_cookie('md_homecity');

    $template['sMap']=$this->sresult->Smapdetails($data);
   // var_dump($data['city']);exit;
  
   $this->load->view('template',$template);
  }  

//map show in search page
  public function BusMapShow(){

    $template['page_title']="Business";
    $template['page']='Search/BusMapview';
    $template['search']="search";

    $data['b_id']=$this->uri->segment(3);
    $data['city']=get_cookie('md_homecity');

    $template['bMap']=$this->sresult->Bmapdetails($data);
  
   $this->load->view('template',$template);
  } 

              

}
