<?php //$CI->load->module_view('app', '_install') ?>
<section id="feature_slider" class="">
        <!-- 
            Each slide is composed by <img> and .info
            - .info's position is customized with css in index.css
            - each <img> parallax effect is declared by the following params inside its class:
            
            example: class="asset left-472 sp600 t120 z3"
            left-472 means left: -472px from the center
            sp600 is speed transition
            t120 is top to 120px
            z3 is z-index to 3
            Note: Maintain this order of params

            For the backgrounds, you can combine from the bgs folder :D
            GUY HAS MADE THIS SLIDER AWESOME!
        -->
       <article class="slide" id="showcasing" style="background: url('/assets/images/backgrounds/aqua.jpg') repeat-x top center;">
            <img class="asset left-60 sp600 t120 z1" src="/assets/images/general/BANNER-guy.png" />
            <div class="info">
                <h2>Software & Web Development</h2>
            </div>
        </article>
        <article class="slide" id="ideas" style="background: url('/assets/images/backgrounds/aqua.jpg') repeat-x top center;">
            <div class="info">
                <h2>Websites</h2>
            </div>
            <img class="asset left-480 sp450 t260 z1" src="/assets/images/general/cha_home_medium.png" />
            <img class="asset left-210 sp600 t213 z2" src="/assets/images/general/why_medium.png" />
            <img class="asset left60 sp650 t260 z1" src="/assets/images/general/dg_home_medium.png" />
        </article>
        <article class="slide" id="tour" style="background: url('/assets/images/backgrounds/color-splash.jpg') repeat-x top center;">
            <img class="asset left-452 sp650 t210 z3" src="/assets/images/slides/scene3/ipad.png" />
            <img class="asset left-345 sp600 t270 z4" src="/assets/images/slides/scene3/iphone.png" />
            <img class="asset left-330 sp550 t135 z2" src="/assets/images/desktop.png" />
           <!-- <img class="asset left-185 sp550 t220 z1" src="/assets/images/slides/scene3/macbook.png" />-->
            <div class="info">
                <h2>LAMP Stack, FileMaker & Python/Django</h2>
                <a class="onepage" href="#services">What we can do for you ></a>
            </div>
        </article>
        <article class="slide" id="responsive" style="background: url('/assets/images/backgrounds/indigo.jpg') repeat-x top center;">
            <img class="asset left-472 sp600 t120 z3" src="/assets/images/slides/scene4/html5.png" />
            <img class="asset left-190 sp500 t120 z2" src="/assets/images/slides/scene4/css3.png" />
            <div class="info">
                <h2>
                    Responsive Web Design & Mobile Apps
                </h2>                
            </div>
        </article>        
    </section>

<!--/home-slider-->

<div class="white-bg-full">
	<h3 class="centered">Hire a Coding RockStar!</h3>
</div><!--white-bg-full-->
<!----------ABOUT-------------------------------------------------------------------------->

<div class="container inner-page" id="about" data-type="page" data-name="about">
	<h2>Meet the team</h2>
	<div class="row margin-bottom25">
		<div class="span4">
			<img src="/assets/images/photo.jpg" alt="Guy Willett of Chamsoft" />
			<h4 class="centered"><strong>Guy Willett</strong></h4>
			<p class="centered">Guy is the man behind Chamsoft and uses any and all of PHP, MySQL, CSS3, HTML5, JavaScript, jQuery, FileMaker and Python/Django. When not coding, he is an avid skier, climber and cyclist.</p>
		</div><!--/span4-->

		<div class="span4">
			<h3>Our Mission</h3>
			<p>TOP NOTCH Apps and Websites are what we are all about.</p>  <p>But we also like to get home, satisfied after a productive day at the keyboard, and head into the mountains for a ski or out on the roads for a bike ride.</p> <p>Inspiration is all around us, particularly here at Chamsoft. </p>
            <p>We hope that using your Chamsoft-built website or App (created just for <em>you</em>) will give you that spring in your step and help keep you ahead of the curve.</p>
			
		</div><!--/span8-->
		<div class="span4">
			<h3>Skills and Services</h3>
				<h4>Web Development</h4>
			    <div class="progress">
					<div class="bar" style="width: 90%;"></div>
				</div><!--/progress-->
				<h4>Mobile Development</h4>
				<div class="progress">
					<div class="bar" style="width: 70%;"></div>
				</div><!--/progress-->
				<h4>Website Design</h4>
				<div class="progress">
					<div class="bar" style="width: 80%;"></div>
				</div><!--/progress-->
                <h4>Desktop Applications</h4>
				<div class="progress">
					<div class="bar" style="width: 60%;"></div>
				</div><!--/progress-->
				<h4>FileMaker</h4>
				<div class="progress">
					<div class="bar" style="width: 75%;"></div>
				</div><!--/progress-->
		</div><!--/span4-->
	</div><!--/row-->
</div>

<!----------SERVICES----------------------------------------------------------------------------->
<div class="container" id="services" data-type="page" data-name="services">
<div class="page-header">
	<div class="container">
		<h1>What we do <small>The feathers in our cap</small></h1>
	</div><!--/container-->
</div><!--/page-header-->
	<div class="row">
		<div class="span4 featured">
			<!--<img src="assets/images/4.jpg" alt="" />-->
			<h2><i class="icon-ok"></i> Websites <!--<a class="btn btn-primary pull-right" href="#">Learn More</a>--></h2>
			<p>Use your own designers or ours, we don't mind - the important thing is a top quality product.<br/><br/>  The majority of our websites use Crunch CMS (our Content Management System). This makes updating content and keeping it SEO friendly a breeze. It also means you can have a client log-in area and stuff like that...</p>
		</div><!--/span4-->
		<div class="span4 featured">
			<!--<img src="assets/images/3.jpg" alt="" />-->
			<h2><i class="icon-cogs"></i> Web Apps<!--<a class="btn btn-primary pull-right" href="#">Learn More</a>--></h2>
			<p>Booking systems, invoicing, automatic emailing, document storage and serving, contact management, calendars - the world is your oyster. It is all about making your workflow more friendly and efficient. </p>
		</div><!--span4-->
		<div class="span4 featured">
			<!--<img src="assets/images/5.jpg" alt="" />	-->	
			<h2><i class="icon-laptop"></i> Fully Responsive Designs<!--<a class="btn btn-primary pull-right" href="#">Learn More</a>--></h2>
			<p>We can build fully responsive websites - just like this one! Go ahead and resize your browser window and see how it <i>responds</i>.<br/><br/>
            With an ever increasing proportion of visitors using tablets and smart phones, catering for these users is a really good idea. Responsive design means one website that optimizes itself for the device being used. Cool, huh?</p>
		</div><!--/span4-->
        <div class="span4 featured">
			<!--<img src="assets/images/5.jpg" alt="" />	-->	
			<h2><i class="icon-bookmark-empty"></i> FileMaker<!--<a class="btn btn-primary pull-right" href="#">Learn More</a>--></h2>
            <p>A cross platform, easy-to-use database system.<br/><br/>An initial outlay for the software is quickly recouped in time saved developing your project. From contact management, to booking systems, invoicing and even online shops. FileMaker can be integrated with other popular technologies like MySQL and has a PHP api, so we can build a web-based front end too!</p>
		</div><!--/span4-->
        <div class="span4 featured">
			<!--<img src="assets/images/5.jpg" alt="" />	-->	
			<h2><i class="icon-tablet"></i> Mobile<!--<a class="btn btn-primary pull-right" href="#">Learn More</a>--></h2>
            <p>Sometimes you need access to parts of a mobile device's system that websites just can't do.<br/><br/>  Or you specifically want your app to be available on GooglePlay/Apple Appstore. Step in PhoneGap (or Kivvy if we use Python :) ). We can write the app once in JavaScript and wrap it with PhoneGap before deploying the same code for both Android and iOS.</p>
		</div><!--/span4-->
        <div class="span4 featured">
			<!--<img src="assets/images/5.jpg" alt="" />	-->	
			<h2><i class="icon-cloud"></i> Web Hosting<!--<a class="btn btn-primary pull-right" href="#">Learn More</a>--></h2>
            <p>We can look after domain registration, hosting your website and, if you want, your email too.<br/><br/>Located in UK datacentres (great for SEO and performance), we make sure our servers are secure, backed up, fast and never overloaded</p>
		</div><!--/span4-->
	</div><!--/row-->
	
	<hr>
	<div class="well well-large centered">
		<h3>Lead the pack with a beautifully designed website backed by an awesome framework</h3>
		<p>Thanks to Chamsoft, this is now within your grasp and surprisingly affordable. Get in touch and let's get the ball rolling...</p>
	</div><!--/well-->
</div>

<!--PORTFOLIO------------------------------------------------------------------ -->
<div class="container inner-page" id="portfolio" data-type="page" data-name="portfolio">
<div class="page-header">
	<div class="container">
		<h1>Portfolio <small>Our best and latest</small></h1>
	</div><!--/container-->
</div><!--/page-header-->
	<div class="row">
		<div class="span12">
					<ul class="thumbnails">
                    <?php 
					$CI =& get_instance();
					$CI->load->model('portfolio_model');
					$CI->load->model('images_model');
					$portfolios = $CI->portfolio_model->getPortfolio(); ?>
                    <?php foreach($portfolios as $p):?>
                    <?php $i = $CI->images_model->getPortfolioImages($p['slug']);?>
						<li class="span4">
							<div class="thumbnail">
								<a href="portfolio/<?=$p['slug']?>">
									<img data-toggle="tooltip" title="<?=$p['type']?>" src="<?=img_path('general/'.$i[0]['photo'])?>" alt="<?=$p['name']?>">
								</a>
								<div class="caption">
									<h3><?=$p['name']?></h3>
									<p><?=$p['snippet']?></p>
									<p><a class="" href="portfolio/<?=$p['slug']?>">View Project Details</a></p>
								</div><!--/caption-->
							</div><!--/thumbnail-->
						</li>
					<?php  endforeach ?>	
						
					</ul>
                    </div>
                    </div>
                    </div>
<!---------BLOG--------------------------------------------------------------------------------->                    
<div class="container inner-page" id="blog" data-type="page" data-name="blog">
<div class="page-header">
	<div class="container">
		<h1>The Blog <small>A little bit of juju</small></h1>
	</div><!--/container-->
</div><!--/page-header-->
	<div class="row">
		<div class="span9">
        <?php $posts = $CI->fuel->blog->get_recent_posts(3);?>
        <?php if(! empty($posts)):?>
        <?php foreach($posts as $p):?>
        <?php $link = date("Y/m/d", strtotime($p->post_date)).'/'.$p->slug;  ?>
			<div class="row blog-post">
				<div class="span3">
					<a href="<?=$this->fuel->blog->url($link)?>"><img src="<?=img_path($p->list_image)?>" alt="<?=$p->title?>" /></a>
				</div><!--/row-->
				<div class="span6">
					<h3><a href="<?=$this->fuel->blog->url($link)?>"><?=$p->title?> </a></h3>
					<blockquote><small>Posted by <cite><a href="#"><?=$p->author_name?></a></cite> on <?=date("jS F Y", strtotime($p->post_date))?> in <a href="#"><?=$p->categories_linked?></a></a></small>
						<p><?=$p->excerpt?><br><a href="<?=$this->fuel->blog->url($link)?>">Keep reading...</a></p>
					</blockquote>
				</div><!--/span6-->
			</div><!--/row-->
        <?php endforeach?>
        <?php endif ?>
            
		
		</div><!--/span9-->
		<div class="span3 sidebar">
			
			<div class="widget">
				<h4>Blog Categories</h4>
				<ul>
                <?php $categories = $CI->fuel->blog->get_published_categories(); ?>
<?php if ( ! empty($categories)) : ?>
<?php foreach($categories as $c): ?>
<li><a href="<?=$c->url?>"><i class="icon-angle-right"></i><?=$c->name?></a> (<?=$c->posts_count?>)</li>
                    <?php endforeach ?>
                    <?php endif ?>
				</ul>
                <p>We like to write about what has intrigued, excited and occasionally annoyed us!</p>
			</div><!--/widget-->
            <div class="widget">
            <h4>Archives</h4>
            <ul>
            <?php $archives_by_month = $CI->fuel->blog->get_post_archives(); ?>
<?php if (!empty($archives_by_month)) : ?>
<?php foreach($archives_by_month as $month => $archives) : 
			$month_str = date('F Y', strtotime(str_replace('/', '-', $month).'-01'));
			?>
		<li><a href="<?=$this->fuel->blog->url($month)?>"><i class="icon-angle-right"></i><?=$month_str?></a> (<?=count($archives)?>)</li>
		<?php endforeach; ?>
<?php endif ?>
            </ul>
            </div><!--/widget-->
			<!--<div class="widget">
				<h4>Newsletter Signup</h4>
				<form>
					<input type="text" class="input-block-level" id="inputNewsletter" placeholder="Enter your email">
					<button type="submit" class="btn btn-primary">Sign Up!</button>
				</form>	
			</div>--><!--/widget-->
		</div><!--/span3-->
	</div><!--/row-->
</div>