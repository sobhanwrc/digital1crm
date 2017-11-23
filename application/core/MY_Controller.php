<?php



class MY_Controller extends CI_Controller {



    public $view_dir = 'backend/';

    public $header = '';

    public $banner = '';

    public $footer = '';

    public $data = array();


    

    function __construct() {

        ini_set('memory_limit', '512M');

        parent::__construct();



        $this->security->xss_clean();

        //############################################################################## getting the language #######################\\

        //################################################# getting the language ##############################\\

        // Setting CSS, JS, Images, Upload Path

        $base_url = base_url();

        $this->data['base_url'] = $base_url;

        $this->data['admin_base_url'] = $base_url;

        $this->data['assets_path'] = $base_url . $this->config->item('assets_path');

        $this->data['css_path'] = $base_url . $this->config->item('css_path');

        $this->data['js_path'] = $base_url . $this->config->item('js_path');

        $this->data['images_path'] = $base_url . $this->config->item('images_path');

        $this->data['upload_path'] = $base_url . $this->config->item('upload_path');

        $this->data['email_template_path'] = $base_url . $this->config->item('email_template_path');



        $this->data['ck_base_url'] = $base_url . $this->config->item('ckeditor_base_url');

        $this->data['ck_base_path'] = $this->config->item('ckeditor_base_path_front');



        // Controller, Method Name

        $this->data['controller_name'] = $this->uri->rsegment('1');

        $this->data['method_name'] = $this->uri->rsegment('2') ? $this->uri->rsegment('2') : 'index';

        $this->data['limit'] = 10;



//$this->load->library('session');

        $admin_all_session = $this->session->userdata('admin_session_data');



//        t($admin_all_session);exit;



        $admin_id = $admin_all_session['admin_id'];

        $original_id = $admin_all_session['original_id'];

        $role_code = $admin_all_session['role_code'];

        $first_name = $admin_all_session['first_name'];

        $last_name = $admin_all_session['last_name'];





        if ($admin_id) {



            $this->load->model('user_model');

            $cond = "AND user_seq_no=$admin_id";

            $logeed_in_details = $this->user_model->fetch($cond);



//            $session = $logeed_in_details[0]['session'];

//            if ($session) {

//                redirect($base_url . 'login/logout');

//            }

//            t($logeed_in_details);



            $this->data['admin_id'] = $admin_id;

            $this->data['original_id'] = $original_id;

            //echo $this->data['original_id'],123; exit();

            $this->data['name'] = $first_name . ' ' . $last_name;

            $this->data['profile_photo'] = $logeed_in_details[0]['profile_photo'];

            

            $this->data['firm_seq_no'] = $admin_all_session['firm_seq_no'];

//           exit;

            $this->data['role_code'] = $role_code;

            $this->data['approver'] = $logeed_in_details[0]['approver'];

            $this->data['site_admin'] = $logeed_in_details[0]['created_by'];



            if ($role_code == 'ATTRMGR' || $role_code == 'ATTR') {



                $sql = "SELECT f.firm_name,f.firm_seq_no,a.attorney_seq_no from plma_firm as f inner join plma_attorney as a on f.firm_seq_no=a.firm_seq_no where a.user_seq_no=$admin_id";

                $query = $this->db->query($sql);

                $firm_name = $query->result_array();



//                echo $this->db->last_query();

//                t($firm_name);die();

                if($firm_name) {

                    $this->data['firm_name'] = $firm_name[0]['firm_name'];



                    $firm_seq_no = $firm_name[0]['firm_seq_no'];

                    $this->data['firm_seq_no'] = $firm_seq_no;

                    $this->data['firm_admin'] = $logeed_in_details[0]['created_by'];

                    $this->data['attorney_seq_no'] = $firm_name[0]['attorney_seq_no'];



                    $sql = "SELECT firm_seq_no from plma_firm where firm_admin_seq_no = $admin_id";

                    $query = $this->db->query($sql);

                    $attorney_details = $query->result_array();

                    if(count($attorney_details)>0){

                        $this->data['is_firm']=1;

                    }

                }

                else {

                    

                    $this->data['firm_seq_no'] = $admin_all_session['firm_seq_no'];

                    

                    $select = "SELECT `attorney_seq_no` FROM plma_attorney WHERE user_seq_no=$admin_id";

                    $query = $this->db->query($select);

                    $attorney_details = $query->result_array();

                    $this->data['attorney_seq_no'] = $attorney_details[0]['attorney_seq_no'];

                }

                

            }

            if($role_code == 'APPT')

            {

                $shq="select * from plma_appointment_user where user_seq_no='".$admin_id."'";

                $query=$this->db->query($shq);

                $firm_name=$query->result_array();

                $this->data['appt_seq_no'] = $firm_name[0]['appt_seq_no'];



            }

            if ($role_code == 'FIRMADM') {





                $sql = "SELECT firm_seq_no,firm_name from plma_firm where firm_admin_seq_no = $admin_id";

                $query = $this->db->query($sql);

                $firm_name = $query->result_array();

                $this->data['firm_name'] = $firm_name[0]['firm_name'];

                $firm_seq_no = $firm_name[0]['firm_seq_no'];

                $this->data['firm_seq_no'] = $firm_seq_no;

                $this->data['site_admin'] = $logeed_in_details[0]['created_by'];



                $sql = "SELECT firm_seq_no from plma_attorney where user_seq_no = $admin_id";

                $query = $this->db->query($sql);

                $attorney_details = $query->result_array();



                $this->data['attorney_seq_no'] = $attorney_details[0]['attorney_seq_no'];



                if(count($attorney_details)>0){

                    $this->data['is_attorney']=1;

                }

                

                if(!empty($this->data['original_id'])) {

                 $sql = "SELECT user_seq_no from plma_user where user_seq_no = $admin_id";

                $query = $this->db->query($sql);

                $site_details = $query->result_array();



                $this->data['user_seq_no'] = $site_details[0]['user_seq_no'];

                

                if(count($site_details)>0){

                    $this->data['is_site']=1;

                }

            }

                

            }



        }





  

    }





    function get_include() {



        $this->data['header'] = $this->load->view($this->view_dir . 'templates/header', $this->data, true);

        $this->data['footer'] = $this->load->view($this->view_dir . 'templates/footer', $this->data, true);

        $this->data['left_sidebar'] = $this->load->view($this->view_dir . 'templates/left_sidebar', $this->data, true);

        $this->data['right_sidebar'] = $this->load->view($this->view_dir . 'templates/right_sidebar', $this->data, true);

        $this->data['breadcrumb'] = $this->load->view($this->view_dir . 'templates/breadcrumb', $this->data, true);



        $this->data['dashboard_header_link'] = $this->load->view($this->view_dir . 'templates/dashboard_header_link', $this->data, true);

        $this->data['dashboard_footer_link'] = $this->load->view($this->view_dir . 'templates/dashboard_footer_link', $this->data, true);

        $this->data['profile_header_link'] = $this->load->view($this->view_dir . 'templates/profile_header_link', $this->data, true);

        $this->data['profile_footer_link'] = $this->load->view($this->view_dir . 'templates/profile_footer_link', $this->data, true);

        $this->data['header_link'] = $this->load->view($this->view_dir . 'templates/header_link', $this->data, true);

        $this->data['footer_link'] = $this->load->view($this->view_dir . 'templates/footer_link', $this->data, true);

        $this->data['firm_dashboard_header_link'] = $this->load->view($this->view_dir . 'templates/firm_dashboard_header_link', $this->data, true);

        $this->data['firm_dashboard_footer_link'] = $this->load->view($this->view_dir . 'templates/firm_dashboard_footer_link', $this->data, true);

    }



    function isLogin() {



//        $admin_all_session = $this->session->userdata('admin_session_data');



        $admin_id = $this->data['admin_id'];

        $role_code = $this->data['role_code'];



        if ($admin_id) {

            /**

             * fetch the notifications for activity invitation

             */

            $sql_act_notify = "SELECT pact.activity_name, pa.attorney_first_name, pa.attorney_last_name, pact.activity_seq_no FROM 

            plma_act_attorney pac 

            LEFT JOIN plma_activity pact ON pact.activity_seq_no = pac.activity_seq_no  

            LEFT JOIN plma_attorney pa ON pa.attorney_seq_no = pact.origin_attorney_seq_no          

            WHERE pac.attorney_seq_no = (select d.attorney_seq_no from plma_attorney d where d.user_seq_no = '" . $admin_id . "') and pac.seen = 0";





            $qry_act_notify = $this->db->query($sql_act_notify);

            $res_act_notify = $qry_act_notify->result_array(); //t($res_act_notify); exit;



            $notify = array();

            foreach ($res_act_notify as $key => $value) {

                $notify[] = array(

                    'msg' => 'Invitation for an activity ' . $value['activity_name'] . ' from ' . $value['attorney_first_name'] . ' ' . $value['attorney_last_name'],

                    'activity_seq_no' => $value['activity_seq_no']

                );

            }

            //t($res_act_notify); exit;

            $this->data['notify'] = $notify;

            $this->data['notify_count'] = count($notify);

        } else {

            $msg = 'You have to log in first!';

            $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg"></font>' . $msg . '</span>');

            redirect($base_url . 'login');

        }

    }



    public function email_config($param = array()) {

        $this->load->library('email');

//        $config['protocol'] = 'localhost';

        // $config['smtp_host'] = 'mail.semmediadesign.com';

        // $config['smtp_user']='dipanjan@semmediadesign.com';

//        $config['smtp_pass'] = '';

//        $config['smtp_port'] = '';

//        $config['smtp_timeout'] = '7';

        $config['charset'] = 'utf-8';

        $config['newline'] = "\r\n";

        $config['mailtype'] = 'html'; // text or html

        $config['validation'] = TRUE; // bool whether to validate email or not      

        $this->email->initialize($config);

        //echo $this->email->print_debugger();

    }



    function maskPhoneformate($mobile_no) {



        $mobile_no = preg_replace('/[^A-Za-z0-9]/', '', $mobile_no);



        $mobile_no1 = substr($mobile_no, 0, 3);

        if ($mobile_no1) {

            $mobile_no1 = "(" . $mobile_no1 . ")";

        }

        $mobile_no2 = substr($mobile_no, 3, 3);

        if ($mobile_no2) {

            $mobile_no2 = " " . $mobile_no2;

        }

        $mobile_no3 = substr($mobile_no, 6, 4);

        if ($mobile_no3) {

            $mobile_no3 = "-" . $mobile_no3;

        }



        $mobile_no = $mobile_no1 . $mobile_no2 . $mobile_no3;



        return $mobile_no;

    }



    function removePhoneMask($mobile_no) {



        $mobile_no_array = explode('-', $mobile_no);



        $mobile_no_2array = $mobile_no_array[0];

        $mobile_no3 = $mobile_no_array[1];



        $mobile_no_2array = explode(' ', $mobile_no_2array);

        $mobile_no1 = $mobile_no_2array[0];

        $mobile_no2 = $mobile_no_2array[1];



        $mobile_no1 = substr($mobile_no1, 1, -1);



        $mobile_no = $mobile_no1 . $mobile_no2 . $mobile_no3;

        return $mobile_no;

    }



    function removePhoneMask1($mobile_no) {



//      $mobile_no='+1343243 337-237-6062';



        if ($mobile_no == 'no data') {

            return $mobile_no;

        } else {

            $mobile_no = preg_replace('/[^A-Za-z0-9]/', '', $mobile_no);



            $length = strlen($mobile_no);



            if ($length == 10) {

                $mobile_no1 = '';

            } else if ($length == 11) {

                $mobile_no1 = substr($mobile_no, 0, 1);

            } else if ($length == 12) {

                $mobile_no1 = substr($mobile_no, 0, 2);

            } else if ($length == 13) {

                $mobile_no1 = substr($mobile_no, 0, 3);

            } else if ($length == 14) {

                $mobile_no1 = substr($mobile_no, 0, 4);

            }



            $mobile_no = substr($mobile_no, -10);



            $mobile_no2 = substr($mobile_no, 0, 3);

            if ($mobile_no2) {

                $mobile_no2 = $mobile_no2;

            }

            $mobile_no3 = substr($mobile_no, 3, 3);

            if ($mobile_no3) {

                $mobile_no3 = $mobile_no3;

            }

            $mobile_no4 = substr($mobile_no, 6, 4);

            if ($mobile_no4) {

                $mobile_no4 = $mobile_no4;

            }



            $mobile_no = $mobile_no2 . $mobile_no3 . $mobile_no4;



//        echo $mobile_no;exit;

            return $mobile_no;

        }

    }



    function removeSSNMask($ssn) {

        return str_replace('-', '', $ssn);

    }



    function removesalMask($sal) {

        return str_replace('$', '', $sal);

    }



    function removebenMask($ben) {

        return str_replace('$', '', $ben);

    }



    function removecompMask($b) {

        return str_replace('$', '', $b);

    }



    function removeovrMask($v) {

        return str_replace('$', '', $v);

    }



    function removebilMask($j) {

        return str_replace('$', '', $j);

    }



    /* function code_desc($code = '')

      {

      foreach ($this->data['codes'] as $key=>$value) {

      foreach ($value as $key2 => $value2) {

      if ($value2['code'] == $code) {

      return $this->data['codes'][$key][$key2]['short_description'];

      }

      }

      }

      } */

}

