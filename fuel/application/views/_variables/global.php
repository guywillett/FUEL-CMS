<?php 

// declared here so we don't have to in each controller's variable file
$CI =& get_instance();

// generic global page variables used for all pages
$vars = array();
$vars['layout'] = 'main';
$vars['page_title'] = fuel_nav(array('render_type' => 'page_title', 'delimiter' => ' : ', 'order' => 'desc', 'home_link' => 'Home'));
$vars['page_title'] = "chamsoft web development London UK Chamonix";
$vars['meta_keywords'] = 'chamsoft, web development, responsive design, website, web design';
$vars['meta_description'] = 'Chamsoft web development, web apps, websites, web design and filemaker development in London, UK and Chamonix. Responsive designs for websites and mobile applications.';
$vars['js'] = array('bootstrap.min', 'jquery.ba-cond.min', 'jquery.slitslider', 'onepage');
$vars['css'] = array('font-awesome.min', 'app','responsive');
$vars['body_class'] = uri_segment(1).' '.uri_segment(2);

// page specific variables
$pages = array();
?>