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
  $delete=$this->installer->db_connect($data);
}


public function addData(){
	
	$data=$_POST;
	$this->installer->addData($data);				 
}
	
}