<?php // test_helper.php
if(!defined('BASEPATH')) exit('No direct script access allowed');

	function code_desc($a = '')
    { 
    	$CI =& get_instance(); 
        foreach ($CI->data['codes'] as $key=>$value) { 
           foreach ($value as $key2 => $value2) { 
               if ($value2['code'] == $a) {  
                   return $CI->data['codes'][$key][$key2]['short_description'];
               }
           }
        }
    }

?>