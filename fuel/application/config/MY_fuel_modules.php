<?php 
/*
|--------------------------------------------------------------------------
| MY Custom Modules
|--------------------------------------------------------------------------
|
| Specifies the module controller (key) and the name (value) for fuel
*/


/*********************** EXAMPLE ***********************************

$config['modules']['quotes'] = array(
	'preview_path' => 'about/what-they-say',
);

$config['modules']['projects'] = array(
	'preview_path' => 'showcase/project/{slug}',
	'sanitize_images' => FALSE // to prevent false positives with xss_clean image sanitation
);

*********************** EXAMPLE ***********************************/
$config['modules']['images'] = array(
'instructions' =>'Add Images for the Carousel and main pages here',
'default_col' => 'carousel',
'default_order' =>'asc'
);

$config['modules']['portfolio'] = array(
'instructions' =>'Add Text for the Portfolio Item here, add its images in the Images section.',
'default_col' => 'precedence',
'default_order' =>'asc'
);

/*********************** OVERWRITES ************************************/
$config['module_overwrites']['categories']['hidden'] = TRUE; // change to FALSE if you want to use the generic categories module
$config['module_overwrites']['tags']['hidden'] = TRUE; // change to FALSE if you want to use the generic tags module
//$config['module_overwrites']['notification']['library_name'] = 'MY_Fuel_notification';
//$config['module_overwrites']['notification']['location'] = 'app';