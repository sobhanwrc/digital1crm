<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class City_state_country extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->isLogin();

        $this->load->model('user_model');
        $this->load->model('city_model');
        $this->load->model('states_model');
        $this->load->model('country_model');
        $this->load->model('zips_model');
        $this->load->model('world_cities_model');

        $this->data['page'] = 'Dashboard';
        
        if($this->data['role_code']!='SITEADM'){
            redirect($base_url . 'login/logout');
        }
    }

    function index() {
        
    /*$sql = "SELECT 'United States of America' as country, plma_states.state_code, plma_states.state_name, plma_zips.city, plma_zips.zip, plma_zips.lat, plma_zips.lng
    FROM plma_states, plma_zips
    WHERE plma_states.state_code = plma_zips.state
    UNION
    SELECT plma_world_cities.country, ' ' as state_code, plma_world_cities.province, plma_world_cities.city_ascii, ' ' as zip, plma_world_cities.lat, plma_world_cities.lng
    FROM plma_world_cities
    WHERE plma_world_cities.country <> 'United States of America' LIMIT 2000";
    $query = $this->db->query($sql);
    $states = $query->result_array();*/
    //$this->data['states'] = $states;
//    t($states); exit;

        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/city_state_country/listing', $this->data);
    }
    function add()
    {
//        $admin_all_session = $this->session->userdata('admin_session');
    }

    function fetch_datatable()
    {
                $mysearch = $this->input->post('search');
                $myorder = $this->input->post('order');
                
                $columns = explode(',', "country,statename,city,zip,lat,lng,action");
                /*$sql = "SELECT 
                            'United States of America' country,
                            CONCAT_WS('-', pstate.state_code, pstate.state_name) statename,
                            pzip.city, 
                            pzip.zip, 
                            pzip.lat, 
                            pzip.lng,
                            '' action                          
                        FROM 
                            plma_zips pzip,
                            plma_states pstate
                        WHERE 
                            pstate.state_code = pzip.state ";*/

                            $select1 = "SELECT 
                                'United States of America' as country, 
                                    CONCAT_WS('-', plma_states.state_code, plma_states.state_name) statename, 
                                    plma_zips.city, 
                                    plma_zips.zip, 
                                    plma_zips.lat, 
                                    plma_zips.lng,
                                    ' ' action,
                                    ' ' pop,
                                    ' ' iso2,
                                    ' ' iso3
                                FROM 
                                    plma_states, 
                                    plma_zips
                                WHERE 
                                    plma_states.state_code = plma_zips.state ";

                        $union = " UNION ";

                        $select2 = " SELECT 
                                    plma_world_cities.country, 
                                    plma_world_cities.province statename, 
                                    plma_world_cities.city, 
                                    ' ' as zip, 
                                    plma_world_cities.lat, 
                                    plma_world_cities.lng,
                                    ' ' action,
                                    plma_world_cities.pop,
                                    plma_world_cities.iso2,
                                    plma_world_cities.iso3
                                FROM 
                                    plma_world_cities
                                WHERE 
                                    plma_world_cities.country = 'United States of America' ";
                $where1 = $where2 = '';
                /*if ($client_history_id) {
                    $where = " where  1=1 AND `admin_id`='$admin_id' AND `master_id`='$client_history_id' AND current_status!='Active'";
                } elseif ($filter_condition) {
                    $where = " where  1=1 AND `admin_id`='$admin_id' AND ($filter_condition) AND current_status='Active'";
                } else {
                    $where = " where 1=1 AND admin_id=$admin_id AND current_status='Active'";
                }*/
                $odr = " order by city asc ";

                $sql1 = $select1 . $union . $select2;

                $query = $this->db->query($sql1);
                // echo $this->db->last_query();exit;

                $totalData = $query->num_rows();
                $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

                $sql .= $where;

                if (!empty($mysearch['value']) && $mysearch['value'] != '') {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
                    //$sql.=" AND (( $columns[0] LIKE '%" . $mysearch['value'] . "%') ";
                    $select1.=" AND ((state_code LIKE '%" . $mysearch['value'] . "%') ";
                    $select1.=" OR (state_name LIKE '%" . $mysearch['value'] . "%') ";
                    $select1.=" OR ($columns[2] LIKE '%" . $mysearch['value'] . "%' )";
                    $select1.=" OR ($columns[3] LIKE '%" . $mysearch['value'] . "%' )";
                    $select1.=" OR ($columns[4] LIKE '%" . $mysearch['value'] . "%' )";
                    $select1.=" OR ($columns[5] LIKE '%" . $mysearch['value'] . "%' ))";

                    $select2.=" AND ((province LIKE '%" . $mysearch['value'] . "%') ";
                    $select2.=" OR (city_ascii LIKE '%" . $mysearch['value'] . "%')) ";
                    //  $sql.=" OR ($columns[6] LIKE '%" . $mysearch['value'] . "%' ))";
                }
               $sql = $select1 . $union . $select2;
                $query = $this->db->query($sql);

                $totalFiltered = $query->num_rows(); // when there is a search parameter then we have to modify total number filtered rows as per search result.
                if ($myorder[0]['column'] == 0) {
                    $sortcol = 0;
                } else if ($myorder[0]['column'] > 0) {
                    $sortcol = $myorder[0]['column'] - 1;
                }
                //echo $myorder[0]['column']; exit;
                //        $sql.=" ORDER BY " . $columns[$sortcol] . "   " . $myorder[0]['dir'] . "  LIMIT " . $this->input->post('start') . " ," . $this->input->post('length') . "   ";
                //        $query = $this->db->query($sql);

                $start = $this->input->post('start');
                $length = $this->input->post('length');
                //t($columns); exit;
                if ($length == '-1') {
                    $sql.=" ORDER BY " . $columns[$sortcol] . "   " . $myorder[0]['dir'];
                } else {
                    $sql.=" ORDER BY " . $columns[$sortcol] . "   " . $myorder[0]['dir'] . "  LIMIT " . $start . " ," . $length . "   ";
                }
                //echo $sql; exit;
                $query = $this->db->query($sql);

                $data = array();

                $res = $query->result_array();

                //t($res); exit;
                //$base_url = $this->base_url();
                $index = 0;
                foreach ($res as $key => $value) {

                    $nestedData = array();

                    $al = count($value);
                    $i = 1;
                    $index++;

                    $nestedData[] = $index;
                    $adata = '';
                    foreach ($value as $key1 => $value1) {

                        if ($i <= ($al - 4)) {
                            $nestedData[] = $value1;
                        }
                        $i++;
                    }
                    foreach ($value as $key2 => $value2) {
                            $adata .= $value2 . '!!!';
                    }
                    /*if ($value['current_status'] != 'Active') {
                        $tmp1 = '<li><a href="' . $base_url . 'client/add/' . base64_encode($value['id']) . '"><i class="fa fa-user"></i> View Details </a></li>';
                    } else {*/
                        // $tmp2 = '<li><a href="' . $base_url . 'client/add/' . base64_encode($value['id']) . '"><i class="fa fa-user"></i> Edit Details </a></li>
                        //         <li><a href="' . $base_url . 'master_name/edit/' . base64_encode($value['master_id']) . '"><i class="fa fa-user"></i> Edit in Master Contact </a></li>
                        //         <li><a href="' . $base_url . 'active_prospect/activePropectHistory/' . base64_encode($value['master_id']) . '"><i class="fa fa-user"></i> View AP History </a></li>                                                           
                        //         <li><a href="' . $base_url . 'client/clientHistory/' . base64_encode($value['master_id']) . '"><i class="fa fa-user"></i> View Client History </a></li>                                                           
                        //         <li><a href="' . $base_url . 'team/teamHistory/' . base64_encode($value['master_id']) . '"><i class="fa fa-user"></i> View Team History </a></li>    
                        //         <li><a href="' . $base_url . 'drip/dripHistory/' . base64_encode($value['id']) . '"><i class="fa fa-user"></i> View Drip History </a></li>        
                        //         <li><a href="javascript:void(0)" id="delete_client" rel="' . $value['master_id'] . '"><i class="fa fa-trash-o" aria-hidden="true"></i> Remove from Client </a></li>
                        //         <li><a href="#"><i class="fa fa-phone"></i> Call (Future) </a></li>
                        //         <li><a href="' . $base_url . 'client/view/' . $value['id'] . '"><i class="fa fa-envelope-o"></i> Message (Future) </a></li>';

//                        $tmp2 = '
//                                <li>
//                                    <a href="">
//                                        <i class="icon-docs"></i> Activities
//                                    </a>
//                                </li>
//                                <li>
//                                    <a href="">
//                                        <i class="icon-docs"></i> Clients
//                                    </a>
//                                </li>
//                                <li>
//                                    <a href="#" data="'.$adata.'" id="modal_city_'.$index.'" onclick="fn_city_det('.$index.')">
//                                        <i class="icon-docs"></i> View </a>
//                                </li>
//                                <li>
//                                    <a href="">
//                                        <i class="icon-tag"></i> Edit </a>
//                                </li>
//                                <li>
//                                    <a href="javascript:;">
//                                        <i class="icon-tag"></i> Delete </a>
//                                </li>
//                             
//                            ';
                        $tmp2 = '
                                <li>
                                    <a href="#" data="'.$adata.'" id="modal_city_'.$index.'" onclick="fn_city_det('.$index.')">
                                        <i class="icon-docs"></i> View </a>
                                </li>
                            ';
                
                    $nestedData[] = '<div class="btn-group">
                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                                    ' . $tmp2 . '
                                        </ul>
                                    </div>';

                    $data[] = $nestedData;
                }

                $json_data = array(
                    "draw" => intval($this->input->post('draw')), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
                    "recordsTotal" => intval($totalData), // total number of records
                    "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
                    "data" => $data
                );

                echo json_encode($json_data);  // send data as json format
        
    }

   
}

