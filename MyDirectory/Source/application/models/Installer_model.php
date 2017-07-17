<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Installer_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
   }
   
/*function settingsDetails(){ 
 

   $query=$this->db->get('settings'); 
   $query=$query->row();

    return $query;
}*/
     
function db_connect($data){ 
	
 
 error_reporting(0);

 $filename = 'sql/my_directory.sql';
 // MySQL host
  $mysql_host = $data['db_host'];
  // MySQL username
  $mysql_username = $data['db_user'];
  // MySQL password
  $mysql_password = $data['db_password'];
  // Database name
   $mysql_database = $data['db_name'];

 $con = mysqli_connect($mysql_host, $mysql_username, $mysql_password,$mysql_database) or die('Error connecting to MySQL server');
 // Select database


  // Temporary variable, used to store current query
  $templine = '';
  // Read in entire file
  $lines = file($filename);
  // Loop through each line
  foreach ($lines as $line)
  {
  // Skip it if it's a comment
  if (substr($line, 0, 2) == '--' || $line == '')
                        continue;

   // Add this line to the current segment
   $templine .= $line;
   // If it has a semicolon at the end, it's the end of the query
   if (substr(trim($line), -1, 1) == ';')
   {
     // Perform the query
     mysqli_query($con,$templine);
     // Reset temp variable to empty
     $templine = '';
    }
    }

		/*echo '<div id="dup-step1-dbconn-status" >
			  <div style="padding: 0px 10px 10px 10px;">		
			  <div id="dbconn-test-msg" style="min-height:80px;text-align:center"><div class="dup-db-test">Tables imported successfully</div><label>Database :</label>
	          <div class="dup-fail">"'.$mysql_database.'"</div><br><label>Username :</label>
	          <div class="dup-fail">"'.$mysql_username.'"</div><br><label>Password :</label>
	          <div class="dup-fail">"'.$mysql_password.'"</div></div>
			  </div>
			  </div>';*/
					 
					 

					$myfile = fopen("application/config/database.php", "w") or die("Unable to open file!");
					$active_record='';
					$txt = '<?php defined("BASEPATH") OR exit("No direct script access allowed");$active_group = "default";
					$query_builder = TRUE;'."\r\n";

					$txt .='$db["default"] = array("dsn"	=> "",'."\r\n";
					$txt .='"hostname" => "'.$mysql_host.'", '."\r\n";
					$txt .='"username" => "'.$mysql_username.'" ,'."\r\n";
					$txt .='"password" => "'.$mysql_password.'",'."\r\n";
					$txt .='"database" => "'.$mysql_database.'",'."\r\n";
					$txt .='"dbdriver" => "mysqli",'."\r\n";
					$txt .='"pconnect" => FALSE,'."\r\n";
					$txt .='"db_debug" => (ENVIRONMENT !== "production"),'."\r\n";
					$txt .='"cache_on" => FALSE,'."\r\n";
					$txt .='"cachedir" => "",'."\r\n";
					$txt .='"char_set" => "utf8",'."\r\n";
					$txt .='"dbcollat" => "utf8_general_ci",'."\r\n";
					$txt .='"swap_pre" => "",'."\r\n";
					$txt .='"encrypt" => FALSE,'."\r\n";
					$txt .='"compress" => FALSE,'."\r\n";
					$txt .='"stricton" => FALSE,'."\r\n";
					$txt .='"failover" => array(),'."\r\n";
					$txt .='"save_queries" => TRUE);'."\r\n";
					
					

					fwrite($myfile, $txt);
					fclose($myfile);

					$myfile1 = fopen("my_admin/application/config/database.php", "w") or die("Unable to open file!");
					$active_record='';
					$txt = '<?php defined("BASEPATH") OR exit("No direct script access allowed");$active_group = "default";
					$query_builder = TRUE;'."\r\n";

					$txt .='$db["default"] = array("dsn"	=> "",'."\r\n";
					$txt .='"hostname" => "'.$mysql_host.'", '."\r\n";
					$txt .='"username" => "'.$mysql_username.'" ,'."\r\n";
					$txt .='"password" => "'.$mysql_password.'",'."\r\n";
					$txt .='"database" => "'.$mysql_database.'",'."\r\n";
					$txt .='"dbdriver" => "mysqli",'."\r\n";
					$txt .='"pconnect" => FALSE,'."\r\n";
					$txt .='"db_debug" => (ENVIRONMENT !== "production"),'."\r\n";
					$txt .='"cache_on" => FALSE,'."\r\n";
					$txt .='"cachedir" => "",'."\r\n";
					$txt .='"char_set" => "utf8",'."\r\n";
					$txt .='"dbcollat" => "utf8_general_ci",'."\r\n";
					$txt .='"swap_pre" => "",'."\r\n";
					$txt .='"encrypt" => FALSE,'."\r\n";
					$txt .='"compress" => FALSE,'."\r\n";
					$txt .='"stricton" => FALSE,'."\r\n";
					$txt .='"failover" => array(),'."\r\n";
					$txt .='"save_queries" => TRUE);'."\r\n";
					
					

					fwrite($myfile1, $txt);
					fclose($myfile1);


}

			
function addData($data){ 

	 $email=array('admin_email'=>$data);
						
  $this->db->where('id',1);
  $result = $this->db->update('settings', $email); 
						
 return $result;	
}

   
  }