<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Mycommon 

{

	var $CI = NULL;

	

	// Constructor

	function Mycommon()

	{

		$this->CI = & get_instance();

	}

	

	//private function	

	function ______get_cat_list($selectd_dir_cat_id=0)

	{

		$this->CI->load->model('dircat_model');

		$list = "";

		$cond="AND parent_id='0' AND status='1' ";

		

		$parent_arr = $this->CI->dircat_model->fetch($cond);

		$mainlist = "<ul class='parent'>";

		if(count($parent_arr)>0)

		{

			foreach($parent_arr as $key=>$val)

			{

				 $mainlist .= $this->cat_terr($list,$val,$append = 0,$selectd_dir_cat_id);

			}

			

		}

		$list .= "</ul>";

		return $mainlist;

	}

	

	//private function	

	function ______cat_terr($list,$parent,$append,$selectd_dir_cat_id=0)

	{

		

		//$field_str=' [<input name="add_parent_id"  id="add_parent_id"  type="radio" value="'.$parent['id'].'" />ADD | <input name="edit_id"  id="edit_id"  type="radio" value="'.$parent['id'].'" />EDIT | <input name="del_id"  id="del_id"  type="radio" value="'.$parent['id'].'" />DELETE ]';

		//$selectd_dir_cat_id=$this->data['selectd_dir_cat_id'];

		if($parent['id']==$selectd_dir_cat_id)

		{

			$checked='checked';

		}

		$list = '<li>'.$parent['cat_name'].'<input name="id" id="id_'.$parent['id'].'"  type="radio" value="'.$parent['id'].'" '.$checked.'/></li>';

		$cond="AND parent_id = ' " . $parent['id'] . " ' AND status='1' ";

		$child_arr = $this->CI->dircat_model->fetch($cond);

		if (count($child_arr)>0) // check if the id has a child

		{

			$append++; // this is our basis on what level is the category e.g. (child1,child2,child3)

			$list .= "<ul class='child child".$append." '>";

			foreach($child_arr as $key=>$val)

			{

				$list .= $this->cat_terr($list,$val,$append,$selectd_dir_cat_id);

			}

			$list .= "</ul>";

		}

		return $list;

	}

	

	



	//menu mngt

	//private function	

	function get_menu_list($selectd_dir_cat_id=0)

	{

		$this->CI->load->model('menu_model');

		$list = "";

		$cond="AND parent_id='0' AND status='1' ";

		

		$parent_arr = $this->CI->menu_model->fetch($cond);

		$mainlist = "<ul class='parent'>";

		if(count($parent_arr)>0)

		{

			foreach($parent_arr as $key=>$val)

			{

				 $mainlist .= $this->menu_terr($list,$val,$append = 0,$selectd_dir_cat_id);

			}

			

		}

		$list .= "</ul>";

		return $mainlist;

	}

	

	//private function	

	function menu_terr($list,$parent,$append,$selectd_dir_cat_id=0)

	{

		

		//$field_str=' [<input name="add_parent_id"  id="add_parent_id"  type="radio" value="'.$parent['id'].'" />ADD | <input name="edit_id"  id="edit_id"  type="radio" value="'.$parent['id'].'" />EDIT | <input name="del_id"  id="del_id"  type="radio" value="'.$parent['id'].'" />DELETE ]';

		//$selectd_dir_cat_id=$this->data['selectd_dir_cat_id'];

		if($parent['id']==$selectd_dir_cat_id)

		{

			$checked='checked';

		}

		$list = '<li>'.$parent['cat_name'].'<input name="id" id="id_'.$parent['id'].'"  type="radio" value="'.$parent['id'].'" '.$checked.'/></li>';

		$cond="AND parent_id = ' " . $parent['id'] . " ' AND status='1' ";

		$child_arr = $this->CI->menu_model->fetch($cond);

		if (count($child_arr)>0) // check if the id has a child

		{

			$append++; // this is our basis on what level is the category e.g. (child1,child2,child3)

			$list .= "<ul class='child child".$append." '>";

			foreach($child_arr as $key=>$val)

			{

				$list .= $this->menu_terr($list,$val,$append,$selectd_dir_cat_id);

			}

			$list .= "</ul>";

		}

		return $list;

	}

	

	

	

	//start advertise format type array add display like video, text,photo

	function advertise_format_type()

	{

		return array(

						'text'=>'Text',

						'image'=>'Image',

						'embed'=>'Embed Code'

					);

	}

	//end advertise format type array

	

	function generatePassword($length=6, $strength=4)

	{

		$vowels = 'aeuy';

		$consonants = 'bdghjmnpqrstvz';

		if ($strength & 1) {

			$consonants .= 'BDGHJLMNPQRSTVWXZ';

		}

		if ($strength & 2) {

			$vowels .= "AEUY";

		}

		if ($strength & 4) {

			$consonants .= '23456789';

		}

		if ($strength & 8) {

			$consonants .= '@#$%';

		}

	 

		$password = '';

		$alt = time() % 2;

		for ($i = 0; $i < $length; $i++) {

			if ($alt == 1) {

				$password .= $consonants[(rand() % strlen($consonants))];

				$alt = 0;

			} else {

				$password .= $vowels[(rand() % strlen($vowels))];

				$alt = 1;

			}

		}

		return $password;

	}

	

	//start marital status type array add display like single, married etc

	function marital_status()

	{

		return array(

						'Single'=>'Single',

						'Married'=>'Married',

						'Committed'=>'Committed',

						'OpenMarriage'=>'Open Marriage',

						'OpenRelationship'=>'Open Relationship',

					);

	}

	//end marital status type array

	

	function upload_rss($xml_content,$rss_file_path)

	{

			if($xml_content):

			  $fh = fopen($rss_file_path, 'w+'); //create new file if not exists

			  fwrite($fh, $xml_content); //write contents to new XML file

			  fclose($fh); //close resource stream

			else:

			  //echo("Failed to read contents of feed at $feedurl");

			endif;

			

			return;

	}
	
	
	public function key_index($all_tags,$tag){
		
		 $language=$this->CI->session->userdata('operator_language');
		
		if(strlen($all_tags[$language]["'".$tag."'"])==0)
		{
			$language="Default";
			$temp_array=array_keys($all_tags[$language]);
			
			$temp_index=array_keys($temp_array,"'".$tag."'");
			return ' [ '."$temp_index[0]".' ] ';
		}
		//echo $tag;
		else if($language=='Default'){
			$temp_array=array_keys($all_tags[$language]);
			
			$temp_index=array_keys($temp_array,"'".$tag."'");
			return ' [ '."$temp_index[0]".' ] ';
			}
		
		
		
		}
	public function key_index1($all_tags,$tag){
		
		 $language='Default';
		
		if(strlen($all_tags[$language]["'".$tag."'"])==0)
		{
			$language="Default";
			$temp_array=array_keys($all_tags[$language]);
			
			$temp_index=array_keys($temp_array,"'".$tag."'");
			return ' [ '."$temp_index[0]".' ] ';
		}
		//echo $tag;
		else if($language=='Default'){
			$temp_array=array_keys($all_tags[$language]);
			
			$temp_index=array_keys($temp_array,"'".$tag."'");
			return ' [ '."$temp_index[0]".' ] ';
			}
		
		
		
		}

  public function is_exixts_any($rackgroup=NULL,$logistic_truck=NULL,$service_center=NULL){
//echo '$rackgroup'.	  count($rackgroup).$rackgroup;
	//echo '$logistic_truck'.	  count($logistic_truck);
	//echo '$service_center'.	  count($service_center).'<br/>';  
	
	
	
	if(count($rackgroup)==1 && count($logistic_truck)==0 && count($service_center)==0){
		//echo 'hi';
		 $CI=& get_instance();
		$CI->load->model('stockin_model');
		$cond="AND rackGroupId='$rackgroup'";
		 $result=$CI->stockin_model->fetch($cond); 
		 //$this->CI->db->last_query();
		 //print_r($result);
		 if(count($result)>0){
			 return $rackgroup;
			 }
		}
		if(count($rackgroup)==0 && count($logistic_truck)==1 && count($service_center)==0){
		//echo 'hi';
		 $CI=& get_instance();
		$CI->load->model('stockin_model');
		$cond="AND logistic_truck_id='$logistic_truck' or stock_out_truck_id='$logistic_truck'";
		 $result=$CI->stockin_model->fetch($cond); 
		 //$this->CI->db->last_query();
		 //print_r($result);
		 if(count($result)>0){
			 return $logistic_truck;
			 }
		}
		if(count($rackgroup)==0 && count($logistic_truck)==0 && count($service_center)==1){
		//echo 'hi';
		 $CI=& get_instance();
		$CI->load->model('stockin_model');
		$cond="AND repair_service_id='$service_center'";
		 $result=$CI->stockin_model->fetch($cond); 
		 //$this->CI->db->last_query();
		 //print_r($result);
		 if(count($result)>0){
			 return $service_center;
			 }
		}
	 // exit(0);
	  }
	  
	  
function requirement($cond='',$select='*', $limit = NULL, $offset = NULL , $table=NULL)
{
	if($cond)

		{

			$where = ' 1 '.$cond;

			$this->CI->db->where($where, null, false);

		}

		$this->CI->db->select($select);

		

		$this->CI->db->limit($limit, $offset);

		//$this->db->orderby("attribute_name", "ASC");

		$query = $this->CI->db->get($table);

		return $query->result_array();
	}
	

}