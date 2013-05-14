<?php class Home extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		}
		
	function index(){
		$this->load->library('session');
		$this->load->library('form_builder');
		//mail('guy@chamsoft.co','testFF','test','from: guy@chamsoft.co');
		if (!empty($_POST) )
		{//mail('guy@chamsoft.co','testSS','test');
			//print_r($_POST);die("dead");
			// put your processing code here... we show what we do for emailing. You will need to add a correct email address
			if ($this->_process($_POST))
			{
				$this->session->set_flashdata('success', TRUE);
				//redirect('contact');
				redirect(current_url());
			}
		}
		
		$vars['layout'] = 'main';
		//$vars['models'] = array('images_model', 'portfolio_model');
		//$vars['models'] = 'portfolio_model';
		$vars['page_title'] = 'chamsoft : web development';
		$vars['meta_description'] = "Chamsoft web development, web apps, websites and filemaker development in London, UK and Chamonix. Responsive designs for websites and mobile applications.";
		
		/*$fields = array();
		$fields['name'] = array('required' => TRUE, 'type' => 'text','display_label' => FALSE, 'class' => 'input-block-level', 'placeholder' => 'Name');
		//$fields['last_name'] = array('required' => TRUE, 'size' => 39);
		$fields['email'] = array('required' => TRUE, 'type' => 'text','display_label' => FALSE, 'class' => 'input-block-level', 'placeholder' => 'Email');
		$fields['message'] = array('required' => TRUE, 'type' => 'textarea','display_label' => FALSE, 'class' => 'input-block-level','rows' => 3, 'placeholder' => 'Message');
		//$fields['submit'] = array('type' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Send Message', 'display_label' => FALSE);
		
		$this->form_builder->set_fields($fields);
		
		 // will set the values of the fields if there is an error... must be after set_fields
		$this->form_builder->set_validator($this->validator);
		$this->form_builder->set_field_values($_POST);
		$this->form_builder->display_errors = TRUE;
		$this->form_builder->required_text = '<span><span class="required">*</span>required fields<span>';
		$this->form_builder->submit_value = "Send Message";
		$this->form_builder->submit_class= "btn btn-primary";
		$form = $this->form_builder->render();*/
		
		// use Fuel_page to render so it will grab all opt-in variables and do any necessary parsing
		$page_init = array('location' => 'home');
		$this->load->module_library(FUEL_FOLDER, 'Fuel_pages', $page_init);
		//print_r($vars);
		$this->fuel->pages->create('home');
		$this->fuel->page->add_variables($vars);
		$this->fuel->page->render();
		}
		
		function _process($data)
	{
		$this->load->library('validator');
		/*
		Set rules up here so we can pass them to the form_builder to display errors.
		validator_helper contains the valid_email function... validator helper automatically gets' looded with Validation Class'
		*/
		
		
		$this->validator->add_rule('name', 'required', 'Please enter in your name', $this->input->post('first_name'));
		//$this->validator->add_rule('last_name', 'required', lang('Please_enter_in_an_last_name'), $this->input->post('last_name'));
		$this->validator->add_rule('email', 'valid_email', 'Please enter in a valid email', $this->input->post('email'));
		$this->validator->add_rule('message', 'required', 'Please enter in a message', $this->input->post('message'));
		
		
		if ($this->validator->validate())
		{
			$this->load->library('email');
			$this->load->helper('inflector');

			// send email
			$this->email->from($data['email'], $data['name']);

			/*********************************************************************
			YOU MUST FILL OUT THE CORRECT dev_email config in application/config/MY_config.php
			AND/OR THE CORRECT TO email address
			*********************************************************************/
			// check config if we are in dev mode
			if ($this->config->item('dev_mode'))
			{
				$this->email->to($this->config->item('dev_email'));
			}
			else
			{
				// need to fill this out to work
				$this->email->to('info@chamsoft.co.uk, guy@chamsoft.co');
			}
			$this->email->subject('Website Contact Form');
			$msg = "The following information was submitted:\n\n";
			foreach($data as $key => $val)
			{
				$msg .= humanize($key, 3).": ".$val."\n\n";
			}
			$this->email->message($msg);
			
			// let her rip
			if (!$this->email->send())
			{
				add_error('There was an error notifying');
				return FALSE;
			} 

			return TRUE;
		}
		
	}
	}