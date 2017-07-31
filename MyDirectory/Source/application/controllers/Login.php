<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	  public function __construct(){
		parent::__construct();
		
		$this->load->model('Login_model','login');
		
	   
		}

//installer 
   public function first_show(){

     unlink(APPPATH.'controllers/Installer.php');
     redirect(base_url());
   }		

//login and featured collections
    public function index() {

     $s =file_exists(APPPATH.'controllers/Installer.php');
      if($s ==1)
      {
        redirect(base_url().'Installer');
      }   
        $template['page_title'] ="Home";
		$template['page'] ='Login/home';
		$template['header'] ='home';
	    $template['collection'] = $this->login->featuredcollection();

//	    var_dump($template['collection']);

        $request = file_get_contents("php://input");
        $data = json_decode($request);
	  	
	  	if($data)
	     {

		   $result=$this->login->login($data);

		    if($result)
		    {

			    $sess_values=array(
				                 'id'=>$result->id,
                                 'username'=>$result->username
				                  );
			
                $this->session->set_userdata('userdatas',$sess_values);

                 if($this->uri->segment(3)=="rating")
                 {
                 $rating_business_id=$this->uri->segment(4);
                 }
               
                $finresult[] = array('status' => 'success','message' => 'Successfully Logged in','class' => 'sucessfull');
                print json_encode($finresult);
		    }
		    else
		    {
		        $finresult[] = array('status' => 'failed','message' => 'Unknown credential , Please try again!','class' => 'unsucessfull');
                print json_encode($finresult);
		    }	
	     }
	  
	    else
	     {
		   $this->load->view('template',$template);
		 } 
	}

  //registration	
	public function registration(){

		$template['page_title'] ="Yellow Pages"; 
		$template['page'] ='Login/home';

		 $request = file_get_contents("php://input");
         $data = json_decode($request);	
          

	      if($data)
	      {
	 	
	 	     unset($data->confirm_password);
		     $result=$this->login->user_registration($data);

		
		     if($result=="UsernameExist")
		     {
               $finresult[] = array('status' => 'username');
               print json_encode($finresult);
		     }
		     elseif($result=="EmailExist")
		     {
               $finresult[] = array('status' => 'email');
               print json_encode($finresult);
		     }
		     elseif($result=="Success")
		     {
               $finresult[] = array('status' => 'success');
               print json_encode($finresult);
		     }
		     else
		     {
               $finresult[] = array('status' => 'failed');
               print json_encode($finresult);
		     }		
	       }     
	       else
	       {
	  	     $this->load->view('template',$template);
	       }	
		
		
	}     
//forget password	
	public function forgetpassword(){

		$template['page_title'] ="Yellow Pages"; 
		$template['page'] ='Login/home';

		 $request = file_get_contents("php://input");
         $data = json_decode($request);

		if($data)
		{
          
          $result=$this->login->forgetpassword($data);
           
           
           if($result="EmailSend")
           {
               $finresult[] = array('status' => 'emailsend');
               print json_encode($finresult);
           	//echo 1;
           }

           else
           {
               $finresult[] = array('status' => 'failed');
               print json_encode($finresult);
           } 
		}
		else
		{
           $this->load->view('template',$template);
		}	

	   

	}

   //set cookie    
    public function settings() {
		
		if(isset($_POST)) {
			$data = $_POST;
			if(isset($data['city'])) {
				$city = trim($data['city'])." ";
				$expire = time()+86500;
				$cookie= array(
					'name'   => 'md_homecity',
					'value'  => $data['city'],
					'expire' => $expire,
				);
				
				$this->input->set_cookie($cookie);
				echo $city;
			}
		}
		}

}
