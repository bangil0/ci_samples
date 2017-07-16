<html ng-app='myApp'>
   <head>
      <?php
$query=$this->db->get('settings');
$query=$query->row();
$favicon=$query->favicon;


?>
      
      <link rel="shortcut icon" type="image/x-icon" href="<?php echo $favicon; ?>">
      <title> <?php echo $page_title; ?> </title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  
      <link href="<?php echo base_url();?>assets/css/yp.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url();?>assets/css/cascade.css" rel="stylesheet" type="text/css">
     
      <link href="<?php echo base_url();?>assets/css/demo.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" type="text/css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      <link href="<?php echo base_url();?>assets/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
      <link href="<?php echo base_url();?>assets/css/parsley/parsley.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/autocomplete.css">
	   <link rel="stylesheet" href="<?php echo base_url();?>assets/css/select2.min.css">
	   <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css">
      
      <link href="<?php echo base_url();?>assets/css/jquery.nailthumb.1.1.min.css" rel="stylesheet" type="text/css">
	  
	  <link href="<?php echo base_url();?>assets/css/lightslider.css" rel="stylesheet" type="text/css">
	  <link href="<?php echo base_url();?>assets/css/shadowbox.css" rel="stylesheet" type="text/css">
      <script> var base_url = '<?php echo base_url();?>';</script>
   </head>
      
  