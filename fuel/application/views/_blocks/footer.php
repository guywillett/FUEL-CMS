	<?php	
	$CI =& get_instance();
		$CI->load->library('session');
		$CI->load->library('form_builder');
		
		/*if (!empty($_POST) )
		{
			// put your processing code here... we show what we do for emailing. You will need to add a correct email address
			if ($this->_process($_POST))
			{
				$this->session->set_flashdata('success', TRUE);
				//redirect('contact');
				redirect(current_url());
			}
		}*/
		
		$fields = array();
		$fields['name'] = array('required' => TRUE, 'type' => 'text','display_label' => FALSE, 'class' => 'input-block-level', 'placeholder' => 'Name');
		//$fields['last_name'] = array('required' => TRUE, 'size' => 39);
		$fields['email'] = array('required' => TRUE, 'type' => 'text','display_label' => FALSE, 'class' => 'input-block-level', 'placeholder' => 'Email');
		$fields['message'] = array('required' => TRUE, 'type' => 'textarea','display_label' => FALSE, 'class' => 'input-block-level','rows' => 3, 'placeholder' => 'Message');
		//$fields['submit'] = array('type' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Send Message', 'display_label' => FALSE);
		
		$CI->form_builder->set_fields($fields);
		
		 // will set the values of the fields if there is an error... must be after set_fields
		$CI->form_builder->set_validator($this->validator);
		$CI->form_builder->set_field_values($_POST);
		$CI->form_builder->display_errors = TRUE;
		$CI->form_builder->required_text = '<span><span class="required">*</span>required fields<span>';
		$CI->form_builder->submit_value = "Send Message";
		$CI->form_builder->submit_class= "btn btn-primary";
		$form = $CI->form_builder->render();
        ?>
        
        </div>
	<!--</div>-->
	<div id="footer" data-type="page" data-name="footer">
		<div id="footer_top">
		<footer>
	<div class="logos-bar">
		<div class="container">
			<ul class="logos">
				<li><a href="http://kokopelliproperty.com" target="_blank"><img src="/assets/images/big_logo.png" alt="kokopelli property" /></a></li>
				<li><a href="http://chachacha-chamonix.com" target="_blank"><img style="background-color:#999" src="/assets/images/logo.png" alt="cha cha cha" /></a></li>
				<li><a href="http://www.dream-guides.com" target="_blank"><img src="/assets/images/logo-11.png" alt="dream guides" /></a></li>
				<li><a href="http://skibikechamonix.com" target="_blank"><img src="/assets/images/logo-sbc.png" alt="ski bike chamonix" /></a></li>
                <li><a href="http://www.bepurefit.com" target="_blank"><img style="background-color:#000" src="/assets/images/logo_bepurefit.png" alt="be pure fit" /></a></li>
			</ul>
		</div><!--/container-->
	</div><!--logos-bar-->
	<div class="footer-bar">
		<div class="container">
			<div class="row">
				<div class="span3">
					<h3>Stay Connected</h3>
					<ul class="social-media">
						<li><a href="#" class="facebook"><i class="icon-facebook"></i></a></li>
						<li><a href="#" class="twitter"><i class="icon-twitter"></i></a></li>
						<!--<li><a href="#" class="googleplus"><i class="icon-google-plus"></i></a></li>
						<li><a href="#" class="pinterest"><i class="icon-pinterest"></i></a></li>-->
						<li><a href="#" class="github"><i class="icon-github"></i></a></li>
						<li><a href="#" class="linkedin"><i class="icon-linkedin"></i></a></li>
					</ul>
					<h4>Contact Us</h4>
					<p>
					Chamsoft Ltd<br>
					14 Cautley Avenue<br>
					London SW4 9HU<br>
					<strong>Mobile: </strong><a href="tel:0033689846055">0033 (0) 689846055</a><br>
					<strong>Office: </strong>0033 (0) 689846055<br>
					<strong>Email: </strong><a href="mailto:info@chamsoft.co.uk">info@chamsoft.co.uk</a>
					</p>
				</div><!--/span3-->
				<div class="span5">
					<h3>Latest Tweets</h3>
					<div class="row tweet">
						<!--<div class="span1">
							<img src="http://placehold.it/75x75" alt="" />
						</div>--><!--/span1-->
						<div class="span4 tweet-text">
							Cras dictum mauris a dolor viverra fermentum. Nullam porta placerat ligula non tincidunt.
						</div><!--/span4-->
					</div><!--/row-->
					<div class="row tweet">
						<!--<div class="span1">
							<img src="http://placehold.it/75x75" alt="" />
						</div>--><!--/span1-->
						<div class="span4 tweet-text">
							Aliquam id nulla nisi, a varius massa. Cum sociis natoque penatibus et magnis dis part.
						</div><!--/span4-->
					</div><!--/row-->
					<div class="row tweet">
						<!--<div class="span1">
							<img src="http://placehold.it/75x75" alt="" />
						</div>--><!--/span1-->
						<div class="span4 tweet-text">
							Cras ut gravida leo. Aliquam erat volutpat. Vestibulum sed purus diam, eu sodales est.
						</div><!--/span4-->
					</div><!--/row-->
				</div><!--/span5-->
				<div class="span4">
					<h3>Get In Touch!</h3>
					<!--<form id="contact-form">
					<input type="text" class="input-block-level" id="inputNameContact" placeholder="Name">
					<input type="text" class="input-block-level" id="inputEmailContact" placeholder="Email">
					<textarea rows="3" id="inputMessageContact" class="input-block-level" placeholder="Message"></textarea>
					<button type="submit" class="btn btn-primary">Send Message</button>
				</form>-->
                <?php  echo $form; ?>
				</div><!--/span4-->
			</div><!--/row-->
		</div><!--/container-->
	</div><!--/footer-bar-->
</footer>
		</div>
		<div id="footer_bot">
			<div id="copyright">Copyright &copy; <?php echo date('Y')?> Chamsoft ltd,  All Rights Reserved.</div>
		</div>
	</div>
<!--</div>-->
<?php //echo jquery('1.9.1').js('main').js($js); ?>
<?php echo js('main').js($js); ?>
<script type="text/javascript">	
	$(function() {
		var Page = (function() {
			var $nav = $( '#nav-dots > span' ),
				slitslider = $( '#slider' ).slitslider( {
					onBeforeChange : function( slide, pos ) {
						$nav.removeClass( 'nav-dot-current' );
						$nav.eq( pos ).addClass( 'nav-dot-current' );
					}
				} ),
				init = function() {
					initEvents();
				},
				initEvents = function() {
					$nav.each( function( i ) {
						$( this ).on( 'click', function( event ) {
							var $dot = $( this );
							if( !slitslider.isActive() ) {
								$nav.removeClass( 'nav-dot-current' );
								$dot.addClass( 'nav-dot-current' );
							}
							slitslider.jump( i + 1 );
							return false;
						} );
					} );
				};
				return { init : init };
		})();
		Page.init();
		/**
		 * Notes: 
		 * 
		 * example how to add items:
		 */

		/*
		var $items  = $('<div class="sl-slide sl-slide-color-2" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1"><div class="sl-slide-inner bg-1"><div class="sl-deco" data-icon="t"></div><h2>some text</h2><blockquote><p>bla bla</p><cite>Margi Clarke</cite></blockquote></div></div>');
		// call the plugin's add method
		ss.add($items);
		*/
	});
</script>

</body>
</html>