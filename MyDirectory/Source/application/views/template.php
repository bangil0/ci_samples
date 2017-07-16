<?php 


$this->load->view('Templates/header_script');
$this->load->view('Templates/header');

if(isset($search))
{
$this->load->view('Templates/search_tab');	
}


$this->load->view($page);

$this->load->view('Templates/footer');
$this->load->view('Templates/footer_script');

?>
