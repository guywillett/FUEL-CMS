<!DOCTYPE html>

<html lang="en-US">
<head>
	<meta charset="utf-8">

	<title>
		<?php 
			if (!empty($is_blog))
			{
				echo $CI->fuel_blog->page_title($page_title, ' : ', 'right');
			}
			else
			{
				echo fuel_var('page_title', '');
			}
		?>
	</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="keywords" content="<?php echo fuel_var('meta_keywords')?>">
	<meta name="description" content="<?php echo fuel_var('meta_description')?>">

<!-- //facebook stuff-->
    <meta property="og:title" content="Chamsoft" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://www.chamsoft.co.uk" />
<meta property="og:image" content="http://www.chamsoft.co.uk/assets/images/logo3.png" />
<meta property="og:site_name" content="Chamsoft Web Development" />
<!--<meta property="fb:admins" content="707836603" />-->
<!--<meta property="fb:admins" content="pages/ChaChaCha/133907349988388" />-->
<meta property="fb:admins" content="guy.willett.1" />
<script>document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script>
	<?php
		echo css('main').css($css);

		if (!empty($is_blog))
		{
			echo $CI->fuel_blog->header();
		}
	?>
    <script type="text/javascript" src="/assets/js/modernizr.custom.79639.js"></script>
<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Lato:900,700,400italic,300,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700' rel='stylesheet' type='text/css'>
	<?php echo jquery('1.8.2');	?>
</head>

<body class="<?php echo fuel_var('body_class', ''); ?>" data-spy="scroll" data-target=".navbar">
<div id="fb-root"></div>
<script>
<!--
/*(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));*/
//-->
</script>

<!--<div id="container">
	<div id="container_inner">-->
		<div id="header" data-type="page" data-name="">
        <?php if(HAS_MULTIPLE) : ?>
            <?php $language_options = unserialize(OPTIONS); ?>
           <!-- <div id="langnav" class="">-->
            <?php /*
			$this->load->library('form_builder');
			$fields['language'] = array('type' => 'select', 'id' => 'langnav-select', 'name' => 'new_language', 'display_label' => FALSE, 'options' => $language_options, 'first_option' => SELECTED_LANGUAGE_LABEL);
			$this->form_builder->set_params(array('id' => 'change_language'));
			$this->form_builder->set_fields($fields);
			$form = $this->form_builder->render($fields);
			echo $form;*/
			?>
            
            <!--<form method="post" id="change_language">-->
            <!--<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="8a8ae5bda7204c0b8d71c23b40e6792d"/>
            the csrf value changes frequently (hourly??) so use form-builder if you want to use it...-->
            	<!--<select name="new_language" id="langnav-select">
                	<?php foreach($language_options as $key => $option) : ?>
                    <option value="<?=$key?>" <?=SELECTED_LANGUAGE == $key ? 'selected' : ''?>><?=$option?></option>
                    <?php endforeach ?>
                </select>
              </form>-->
              
          <!-- </div>--><!--end langnav-->
			<?php endif ?>
            <div id="home" data-type="page" data-name="home"><!--</div>--><!--just for onepage nav-->
            <div class="navbar navbar-static-top">
	<div class="navbar-inner">
		<div class="container" >
		<!-- Phone navbar button --> 
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> 
			<a class="brand" href="<?=site_url()?>">cham<span>soft</span></a>
			<!-- Phone navigation -->
			<div class="nav-collapse collapse pull-right">
				<ul id="nav" class="nav">
					<li class="active"><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
					<li><a href="#portfolio">Portfolio</a></li>
					<!--<li class="dropdown">
					<a href="#" id="a" class="dropdown-toggle" data-toggle="dropdown">
					Just 4 fun
					<b class="caret"></b>
					</a>
						<ul class="dropdown-menu">
							<li><a href="#">I</a></li>
							<li><a href="#">Thought I</a></li>
							<li><a href="#">Would put</a></li>
							<li><a href="#">These</a>
							<li><a href="#">In too</a>
							<li><a href="404.html">404 Page</a></li>
						</ul>
					</li>-->
					<li><a href="#blog">Blog</a></li>
					<li><a href="#footer">Contact</a></li>
				</ul>
			</div><!--/nav-collapse--> 
		</div><!--/container-->
	</div><!--/navbar-inner--> 
</div><!--/navbar-->
</div><!--end id=home-->
            
		</div>
<a href="#" id="scroll_top"><span>top</span></a>
		<div id="main">
