<?php
class Login_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }
 

//user login  
  function login($data){
       
        $email=$data->email;
        $password=$data->password;
                 
         $this->db->where('email',$email);
         $this->db->where('password',$password);
         $query=$this->db->get('users');
         $query=$query->row();

         return $query;
     
  } 

//user registration      
    function user_registration($data) {


      $username = $data->username;
      $email = $data->email;

      $this->db->where('username', $username);
      $query= $this->db->get('users');
  
     
       if ($query->num_rows()==0)
        {
      
          $this->db->where('email', $email);
          $query1= $this->db->get('users');
  
           if($query1->num_rows() ==0)
            {
               $reg = $this->db->insert('users', $data); 
                return "Success";

            }
            else
            {
               return "EmailExist";
            }
          
        }
        else 
        {
         return "UsernameExist";
             
        }
         
    }
 
 //forgetpassword  
    function forgetpassword($data){


       $f_email=$this->db->get('settings');
       $f_email=$f_email->row();
       $fr_email=$f_email->admin_email;
      
        
        $email=$data->email;
       
               
         $this->db->where('email',$email);
         $query=$this->db->get('users');
         $query=$query->row();

         if($query)
         {
         
           $username=$query->username;
           $from_email=$fr_email;

           $rand_pwd= random_string('alnum', 8);
           $password=array('password'=>$rand_pwd);
           
            $this->db->where('email',$email);
            $querym=$this->db->update('users',$password);


               if($querym)
               {
                

                $this->email->from($from_email, $username);
                $this->email->to($email);
                $this->email->subject('Forget Password');
                $this->email->message('New Password is '.$password['password'].' ');
                $this->email->send();
         
                  return "EmailSend";
                }
           }
           else
           {
               return "EmailNotExist";
           }

         

    } 
 
 //featured collections   
    function featuredcollection() {			 
		     
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

}
?>