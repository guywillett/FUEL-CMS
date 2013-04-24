<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once(FUEL_PATH.'models/base_module_model.php');

class Images_model extends Base_module_model {
	public $foreign_keys = array('page' => 'pages_model');
	public $boolean_fields = array('carousel');
	
function __construct($values = array()){
	parent::__construct('images');
	}
	
function list_items($limit = NULL, $offset = NULL, $col = 'carousel', $order = 'desc'){
	$this->db->join('fuel_pages', 'fuel_pages.id = images.page', 'left');
	$this->db->select('images.id, photo, carousel, precedence, fuel_pages.location AS page, link, link_fr, images.published', FALSE);
	$data = parent::list_items($limit, $offset, $col, $order);
	return $data;
	}
	
function form_fields($values){
	
	$yes = lang('form_enum_option_yes');
		$no = lang('form_enum_option_no');
		
	$fields = parent::form_fields($values);
	
	$upload_path = assets_server_path('general','images');
	
	//$fields['filename'] = array('order' => 1001, 'label' => ' ', 'displayonly' => TRUE);
	$fields['set1'] = array('type' => 'fieldset', 'class' => 'collapsible', 'label' => 'Photo', 'order' => 9);
	$fields['photo_upload'] = array('type' => 'file', 'upload_path' => $upload_path, 'display_overwrite' => FALSE, 'overwrite' => TRUE, 'order' => 10);
	$fields['photo'] = array( 'order' => 20, 'type' => 'asset', 'upload' => FALSE, 'folder' => 'images/general', 'is_image' => TRUE, 'create_thumb' => FALSE, 'hide_options' => TRUE, 'multiple' => FALSE , 'readonly' => TRUE,'required' => TRUE, 'resize_method' => 'resize_and_crop', 'width' => '718', 'height' => '322' );
	$fields['set2'] = array('type' => 'fieldset', 'class' => 'collapsible', 'label' => 'Page', 'order' => 43);
	$fields['link']['order'] = 30;
	$fields['link_fr']['order'] = 40;
	$fields['copy1'] = array('type' => 'copy', 'tag' => 'p', 'value' => ' ', 'order' => 42);
	$fields['page']['order'] = 80;
	$fields['copy2'] = array('type' => 'copy', 'tag' => 'p', 'value' => ' ', 'order' => 82);
	$fields['set3'] = array('type' => 'fieldset', 'class' => 'collapsible', 'label' => 'Carousel', 'order' => 89);
	$fields['precedence']['order'] = 100;
	$fields['copy3'] = array('type' => 'copy', 'tag' => 'p', 'value' => ' ', 'order' => 102);
	$fields['carousel']['order'] = 90;
	$fields['carousel']['options'] = array('yes' => $yes, 'no' => $no);
	$fields['copy4'] = array('type' => 'copy', 'tag' => 'p', 'value' => ' ', 'order' => 92);
	$fields['published'];
	
	return $fields; 
	}
	
function getCarousel()
{
	$result = array();
	if(SELECTED_LANGUAGE == 'english')
			{
			$link = 'link';
			}else{
			$link = 'link_fr';
			}
$sql = "select $link as link , photo from images where published = 'yes' and carousel = 'yes' order by precedence asc";
$query = $this->db->query($sql);
if($query->num_rows() > 0)
			{ 
			$result = $query->result_array();
			}
return $result;
}

}

class Image_model extends Base_module_record {
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