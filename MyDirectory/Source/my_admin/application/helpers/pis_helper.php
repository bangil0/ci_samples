<?php
function set_upload_options($path) {   
	//upload an image options
	$config = array();
	$config['upload_path'] = $path;
	$config['allowed_types'] = 'gif|jpg|png';
	$config['max_size']      = '0';
	$config['overwrite']     = FALSE;

	return $config;
}

function set_upload_faviconoptions($path) {   
	//upload an image options
	$config = array();
	$config['upload_path'] = $path;
	$config['allowed_types'] = 'ico';
	$config['max_size']      = '0';
	$config['overwrite']     = FALSE;

	return $config;
}


function set_upload_logooptions($path) {   
	//upload an image options
	$config = array();
	$config['upload_path'] = $path;
	$config['allowed_types'] = 'gif|jpg|png';
	$config['width'] = 619;
    $config['height'] = 821;
	$config['overwrite']     = FALSE;

	return $config;
}

//Category Add
function set_upload_categoryoptions($path) {   
	//upload an image options
	$config = array();
	$config['upload_path'] = $path;
	$config['allowed_types'] = 'gif|jpg|png';
	$config['min_width'] = 1600;
    $config['min_height'] = 500;
	$config['overwrite']     = FALSE;
	return $config;
}



?>	
