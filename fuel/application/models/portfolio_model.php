<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once(FUEL_PATH.'models/base_module_model.php');

class Portfolio_model extends Base_module_model {
	//public $foreign_keys = array('page' => 'pages_model', 'portfolio' => 'portfolio_model');
	//public $boolean_fields = array('carousel');
	
function __construct($values = array()){
	parent::__construct('portfolio');
	}
	
function list_items($limit = NULL, $offset = NULL, $col = 'precedence', $order = 'asc'){
	/*$this->db->join('fuel_pages', 'fuel_pages.id = images.page', 'left');
	$this->db->join('portfolio', 'portfolio.id = images.porfolio', 'left');
	$this->db->select('images.id, photo, carousel, precedence, fuel_pages.location AS page, portfolio.name AS portfolio, link, images.published', FALSE);*/
	$this->db->select('id, name, type, precedence, published',FALSE);
	$data = parent::list_items($limit, $offset, $col, $order);
	return $data;
	}
	
function form_fields($values){
	
	$yes = lang('form_enum_option_yes');
		$no = lang('form_enum_option_no');
		
	$fields = parent::form_fields($values);
	
	
	//$fields['set2'] = array('type' => 'fieldset', 'class' => 'collapsible', 'label' => 'Page', 'order' => 43);
	$fields['name']['order'] = 29;
	$fields['slug']['order'] = 30;
	$fields['type']['order'] = 31;
	$fields['copy1'] = array('type' => 'copy', 'tag' => 'p', 'value' => ' ', 'order' => 32);
	$fields['content']['order'] = 34;
	$fields['snippet']['order'] = 40;
	$fields['link']['order'] = 42;
	$fields['skills']['order'] = 80;
	$fields['testimonial']['order'] = 81;
	$fields['copy4'] = array('type' => 'copy', 'tag' => 'p', 'value' => ' ', 'order' => 92);
	$fields['precedence']['order'] = 100;
	$fields['published'];
	
	return $fields; 
	}
	
function getPortfolio($slug = NULL)
{
	$result = array();
	$andslug = $slug != NULL ? "and slug = '".$slug."'" : "";
$sql = "select * from portfolio where published = 'yes' $andslug order by precedence asc";
$query = $this->db->query($sql);
if($query->num_rows() > 0)
			{ 
			$result = $query->result_array();
			}
return $result;
}

}

class Portfolioitem_model extends Base_module_record {
	function get_image(){
		if($this->photo){
		return '<img src = "'.img_path($this->photo).'" />';
		}else {return false;}
		}
		
		function get_thumbnail(){
		if($this->photo){
			$str = explode(".", $this->photo);
			$thumb = $str[0]."_thumb.".$str[1];
		return '<img src = "'.img_path($thumb).'" />';
		}else {return false;}
		}
}