<?php class Portfolio extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		}
		
	function index(){
		$s = uri_segment(2);
		if(! empty($s)){
			//$this->load->library('session');
		//$this->load->library('form_builder');
		$this->load->model('portfolio_model');
		$this->load->model('images_model');
		$vars['portfolio'] = $this->portfolio_model->getPortfolio($s);
		$skill = strip_tags($vars['portfolio'][0]['skills']);
		$vars['skills'] = explode(',,', $skill);
		$vars['images'] = $this->images_model->getPortfolioImages($s);
		$vars['layout'] = 'main';
		//$vars['models'] = array('images_model', 'portfolio_model');
		//$vars['models'] = 'portfolio_model';
		$vars['page_title'] = 'chamsoft : portfolio : '.$vars['portfolio'][0]['name'];
		$vars['meta_description'] = "Chamsoft web development, web apps, websites and filemaker development in London, UK and Chamonix. Responsive designs for websites and mobile applications. ".$vars['portfolio'][0]['name'];
		
		//$this->load->view('portfolio',$vars);
		
		// use Fuel_page to render so it will grab all opt-in variables and do any necessary parsing
		$page_init = array('location' => 'portfolio');
		$this->load->module_library(FUEL_FOLDER, 'Fuel_pages', $page_init);
		//print_r($vars);
		$this->fuel->pages->create('portfolio');
		$this->fuel->page->add_variables($vars);
		$this->fuel->page->render();
		}else{
			redirect('home');
			}
		}
		
	}