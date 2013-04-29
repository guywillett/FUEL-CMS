<?php  //$this->load->view('_blocks/header');?>
<div class="page-header">
<?php $p = $portfolio;
		$image = $images;
		$active = "active";  
		
		$skills = $skills;
		?>
	<div class="container">
		<h1><?=$p[0]['name']?> <small><?=$p[0]['type']?></small></h1>
	</div><!--/container-->
</div><!--/page-header-->

<div class="container inner-page" id="portfolio-inner">
	<div class="row margin-bottom25">
		<div class="span9">
			<div id="portfolioCarousel" class="carousel slide">
				<!-- Carousel items -->
                <?php foreach($image as $i): ?>
				<div class="carousel-inner">
					<div class="<?=$active?> item">
						<img src="<?=img_path('general/'.$i['photo'])?>" alt="" />
					</div><!--/item-->
                 <?php $active = ""; ?>
                <?php endforeach ?>
				</div><!--/carousel-inner-->
				<!-- Carousel nav -->
				<a class="carousel-control left" href="#portfolioCarousel" data-slide="prev">&lsaquo;</a><a class="carousel-control right" href="#portfolioCarousel" data-slide="next">&rsaquo;</a>
			</div><!--/portfolioCarousel-->
			<h3>Project Overview</h3>
			<p><?=$p[0]['content']?></p>
		</div><!--/span9-->
		<div class="span3">
			<div class="widget">
				<h4>Project Details</h4>
				<ul>
                <?php foreach($skills as $s): ?>
					<li><i class="icon-ok"></i> <?=$s?></li>
                <?php endforeach ?>
				</ul>
				<a href="<?=$p[0]['link']?>" target="_blank" class="btn btn-primary">Visit Website</a>
			</div><!--/widget-->
			<div class="widget">
				<h4>Client Testimonial</h4>
				<blockquote>
					<p><?=$p[0]['testimonial']?></p>
					<small><cite><?=$p[0]['name']?></cite></small>
				</blockquote>
			</div><!--/widget-->
		</div><!--/span3-->
	</div><!--/row-->
</div><!--/container-->

<?php // $this->load->view('_blocks/footer');?>