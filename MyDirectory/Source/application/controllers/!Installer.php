<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Installer extends CI_Controller {

	  public function __construct(){
		parent::__construct();
	      
	  $this->load->model('Installer_model','installer');
		 
	}
	
public  function index(){

  //$data['data']=$this->installer->settingsDetails();
 	 
  
  $this->load->view('Installer/installer');
}	

public function dbconnect(){
  
  $data=$_POST;	
  $ad_email=$data['admin_email'];	

   $this->session->set_userdata('admin_email',$ad_email);

  $delete=$this->installer->db_connect($data);
}


public function addData(){
	
	$data= $this->session->userdata('admin_email');
	$result=$this->installer->addData($data);

	if($result){
    redirect(base_url().'Login/first_show');
    }
    else{

     redirect(base_url().'Installer');
    
    }
				 
}
	
}