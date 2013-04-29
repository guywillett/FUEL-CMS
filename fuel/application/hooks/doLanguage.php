<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/***UNCOMMENT THIS
require_once(FUEL_PATH."libraries/Fuel_base_library.php");
require_once(FUEL_PATH."libraries/Fuel_language.php");
***/
/*
*post_controller_constructer hook - triggered every page load
*define the SELECTED_LANGUAGE constant as the selected language (detected from query-string or cookie)
*if the language has been changed by user ($_POST via form in Header view), then set the cookie and qury-string to new language first
*and then find/load the appropriate page in the new language. 
*Each translation of the same page should have a navigation record with the same nav_key (but different location and label).
*If the 'query-segments can't be found in the navigation table, then the cookies etc are set to the new language but a different page is not loaded.
*Things like categories and products that probably have a complex tree structure/hierarchy should only have one record with a seperate field for each traslation (rather than a different record for each language version) to save having to replicate the structure/hieracrchy for each language...I think this will be better for the clients too.
*/
class doLanguage{
	function doLanguage(){
		@define("SELECTED_LANGUAGE", "english");
		@define("HAS_MULTIPLE", FALSE);
		
		}
	}
/***UNCOMMENT HERE
class doLanguage extends Fuel_language{
	
function __construct(){
	parent::__construct();
	}
	
function doLanguage(){
	
	//constants used by language-select drop down in Header view
	 define("HAS_MULTIPLE", $this->fuel->language->has_multiple());
	 define("OPTIONS", serialize($this->fuel->language->options()));
	if(isset($_POST['new_language']) && $this->fuel->language->has_language($_POST['new_language'])){
		//user has changed language...
		//set selected language and update url and cookie
		$this->fuel->language->set_selected($_POST['new_language'],TRUE);//this updates cookie and query-str anyway
		define ("SELECTED_LANGUAGE", $this->fuel->language->selected());
		$this->CI->load->database();
		
		if(uri_segment(1) == 'region' || uri_segment(1) == 'event' || uri_segment(1) == 'product'){//region is in url...check the fuel_categories table...
				$uri = uri_segment(2);
				if(uri_segment(1) == 'region'){
					$table = 'fuel_categories';
					}
				if(uri_segment(1) == 'event'){
					$table = 'events';
					}
				if(uri_segment(1) == 'product'){
					$table = 'products';
					}
				$slug = SELECTED_LANGUAGE == 'english' ? 'slug_fr' : 'slug';
				$new_slug = $slug == 'slug' ? 'slug_fr' : 'slug';
									  $q = $this->CI->db->get_where($table, array($slug => $uri));
						  if($q->num_rows() > 0){
							  $q_array = $q->result_array();
							  $location = $q_array[0][$new_slug];
								  if(!empty($location)){
								  header('location: '.BASE_URL.uri_segment(1).'/'.@$location);
								  }
								  }
				}else{
		//
		$uri = uri_string();
		//echo $uri;
		//$this->CI->load->database();
		$q = $this->CI->db->get_where('fuel_navigation', array('location' => $uri));
			//if(!empty($q)){
			if($q->num_rows() > 0){
				$q_array = $q->result_array();
				$location_result = $this->CI->db->get_where('fuel_navigation', array('nav_key' => $q_array[0]['nav_key'], 'language' => SELECTED_LANGUAGE));
				$location = $location_result->result_array();
					if(!empty($location)){
					header('location: '.BASE_URL.@$location[0]['location']);
					}
				}
			}
		}else{//user has not chnged language...
			//detect language from cookie/qury-str and set the selected language (but no need to chage url or cookie)
			define ("SELECTED_LANGUAGE", $this->fuel->language->detect(TRUE));
			//$this->fuel->language->set_selected(SELECTED_LANGUAGE);
			}
			//below is helpful if using formbuilder on Header view...
			//define("SELECTED_LANGUAGE_LABEL", $this->fuel->language->selected_label());
			//LOAD LANGUAGE FILES:
			$this->CI->lang->load(SELECTED_LANGUAGE, SELECTED_LANGUAGE);
			$this->CI->lang->load('fuel_inline_edit', SELECTED_LANGUAGE);
			$this->CI->lang->load('fuel', SELECTED_LANGUAGE);
			$this->CI->lang->load('model', SELECTED_LANGUAGE);
			//$this->CI->lang->load('blog', SELECTED_LANGUAGE);
	}
}
UNCOMMENT HERE***/
/* End of file doLanguage.php */
/* Location: ./application/hooks/doLanguage.php */