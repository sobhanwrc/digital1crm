<?php

// test_helper.php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function get_short_desc_by_code($fcode = '', $firm_seq_no = '') {
    $CI = & get_instance();
    $sql = "SELECT plma_codes.code,plma_codes.category_type, IF(plma_codes.firm_customization=1,plma_firm_codes.short_description,plma_codes.short_description) as short_description"
            . " FROM plma_codes inner join plma_firm_codes on plma_codes.code_seq_no=plma_firm_codes.code_seq_no WHERE plma_codes.code = '$fcode' "
            . " AND plma_firm_codes.firm_seq_no=$firm_seq_no";
    $query = $CI->db->query($sql);
    $codes = $query->result_array();
//    echo $CI->db->last_query();
   // print_r($codes); die();
    return $codes[0]['short_description'];

//        foreach ($codes as $key=>$value) { 
//           foreach ($value as $key2 => $value2) { 
//               if ($value2['code'] == $a) {  
//                   return $CI->data['codes'][$key][$key2]['short_description'];
//               }
//           }
//        }
}

?>