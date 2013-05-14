	<?php	
	$CI =& get_instance();
		$CI->load->library('session');
		$CI->load->library('form_builder');
		
		//$this->load->library('session');
		//$this->load->library('form_builder');
		//mail('guy@chamsoft.co','testFF','test','from: guy@chamsoft.co');
		//print_r($_POST);//die("dead");
		if (!empty($_POST) )
		{
			//mail('guy@chamsoft.co','testSS','test'.$_POST,'from: guy@chamsoft.co');
			//print_r($_POST);//die("dead");
			// put your processing code here... we show what we do for emailing. You will need to add a correct email address
			if (_process($_POST))
			{
				$CI->session->set_flashdata('success', TRUE); 
				//redirect('contact'); //redirect(current_url());
				redirect('/?s=s/#/contactform');
			}
		}
		
		
		
		function _process($data)
	{
		$CI =& get_instance();
		$CI->load->library('validator');
		/*
		Set rules up here so we can pass them to the form_builder to display errors.
		validator_helper contains the valid_email function... validator helper automatically gets' looded with Validation Class'
		*/
		
		
		$CI->validator->add_rule('name', 'required', 'Please enter in your name', $CI->input->post('name'));
		//$this->validator->add_rule('last_name', 'required', lang('Please_enter_in_an_last_name'), $this->input->post('last_name'));
		$CI->validator->add_rule('email', 'valid_email', 'Please enter in a valid email', $CI->input->post('email'));
		$CI->validator->add_rule('message', 'required', 'Please enter in a message', $CI->input->post('message'));
		
		
		if ($CI->validator->validate())
		{
			$CI->load->library('email');
			$CI->load->helper('inflector');

			// send email
			$CI->email->from($data['email'], $data['name']);

			/*********************************************************************
			YOU MUST FILL OUT THE CORRECT dev_email config in application/config/MY_config.php
			AND/OR THE CORRECT TO email address
			*********************************************************************/
			// check config if we are in dev mode
			if ($CI->config->item('dev_mode'))
			{
				//$this->email->to($this->config->item('dev_email'));
				$CI->email->to('guy@chamsoft.co');
			}
			else
			{
				// need to fill this out to work
				$CI->email->to('info@chamsoft.co.uk, guy@chamsoft.co');
			}
			$CI->email->subject('Website Contact Form');
			$msg = "The following information was submitted:\n\n";
			foreach($data as $key => $val)
			{
				$msg .= humanize($key, 3).": ".$val."\n\n";
			}
			$CI->email->message($msg);
			
			// let her rip
			if (!$CI->email->send())
			{
				add_error('There was an error notifying');
				return FALSE;
			} 

			return TRUE;
		}
	}
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
		$CI->form_builder->set_validator($CI->validator);
		$CI->form_builder->set_field_values($_POST);
		$CI->form_builder->display_errors = TRUE;
		$CI->form_builder->required_text = '<span><span class="required">*</span>required fields<span>';
		$CI->form_builder->submit_value = "Send Message";
		$CI->form_builder->submit_class= "btn btn-primary";
		$CI->form_builder->form_attrs = 'method="post" action="/#/contactform"';
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
	<div class="footer-bar" >
		<div class="container">
			<div class="row">
				<div class="span3" id="contact" data-type="page" data-name="contact">
					<h3>Stay Connected</h3>
					<ul class="social-media">
						<li><a href="https://www.facebook.com/chamsoft1" class="facebook"><i class="icon-facebook"></i></a></li>
						<li><a href="https://twitter.com/GuyChamsoft" class="twitter"><i class="icon-twitter"></i></a></li>
						<!--<li><a href="#" class="googleplus"><i class="icon-google-plus"></i></a></li>
						<li><a href="#" class="pinterest"><i class="icon-pinterest"></i></a></li>-->
						<li><a href="https://github.com/guywillett" class="github"><i class="icon-github"></i></a></li>
						<li><a href="http://uk.linkedin.com/pub/guy-willett/44/697/490" class="linkedin"><i class="icon-linkedin"></i></a></li>
					</ul>
					<h4 >Contact Us</h4>
					<p>
					Chamsoft Ltd<br>
					14 Cautley Avenue<br>
					London SW4 9HU<br>
					<strong>Tel: </strong><a href="tel:0033689846055">0033 (0) 689846055</a><br>
					<strong>Email: </strong><a href="mailto:info@chamsoft.co.uk">info@chamsoft.co.uk</a>
					</p>
				</div><!--/span3-->
				<div class="span5">
					<h3>Latest Tweets</h3>
				<!--ajax tweets in here-->
                <div id="tweet-ajax"></div>
				</div><!--/span5-->
				<div class="span4" id="contactform" data-type="page" data-name="contactform">
                
					<h3>Get In Touch!</h3>
                    <ul class ="message-success" style="display:none;"><li class ="message-success" style="display:none;">Thank you for your Message!</li></ul>
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

</body>
</html>