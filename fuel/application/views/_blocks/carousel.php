<?php
$CI =& get_instance();
$CI->load->model('images_model');
$result = $CI->images_model->getCarousel();
?>
<noscript><div class="noscript grid_11"><?=lang('noscript_message')?></div></noscript>
<div id="carousel_outer">
<div id="carousel">
<?php foreach($result as $r){	?>
<a href="<?=BASE_URL.@$r['link']?>"><img src="<?=img_path('general/'.$r['photo'],null,true)?>"/></a>
<?php } ?>
 
 </div>
 <a href='#' id="ui-carousel-next"><img src="<?=img_path('r_arrow.png')?>" /></a>
 <a href='#' id="ui-carousel-prev"><img src="<?=img_path('l_arrow.png')?>" /></a>
 
 <div id="carousel_nav"></div>
</div>