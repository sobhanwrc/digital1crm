<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

class Api extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('user_model');
        $this->load->model('firm_model');
        $this->load->model('Targets_model');
        $this->load->model('call_log_model');
        $this->load->model('send_sms_model');
    }

    function login() {
//        $company_name = $this->input->post('company_name');
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
//        $gcm_id = $this->input->post('gcm_id');
//        $cond1 = " AND firm_name='$company_name'";
//        $select1 = "firm_seq_no";
//        $fetch_company_name = $this->firm_model->fetch($cond1,$select1);
//        $company_id = $fetch_company_name[0]['firm_seq_no'];

        $cond = " AND user_id='$email' AND status='1'";
        $user_details = $this->user_model->fetch($cond);
        $salt = base64_encode($user_details[0]['salt']);
        $confirm_pw = $password . $salt;

        //fetching company_name with id 
        $receive_company_id = $this->input->post('company_id');
        if ($receive_company_id) {
            //fetch_company_details
            $company_id = $receive_company_id;
            $cond123 = " AND firm_seq_no='$company_id'";
            $select = "firm_name";
            $fetch_company_id = $this->firm_model->fetch($cond123, $select);
            $company_name = $fetch_company_id[0]['firm_name'];
            //end

            $cond1 = " AND user_id='$email' AND password='$confirm_pw' AND assign_to like '%$company_id%' AND status='1'";
            $call_user_details1 = $this->user_model->fetch($cond1);
            $call_user_id = $call_user_details1[0]['user_seq_no'];
            if (!empty($call_user_details1[0]['profile_photo'])) {
                $image = "http://www.digital1crm.com/assets/upload/employee/resize/CROP/" . $call_user_details1[0]['profile_photo'] . "";
            } else {
                $image = "Null";
            }


            // 100 MEANS SUCCESS, 200 MEANS MISSING, 300 MEANS ERROR
            if (count($call_user_details1) > 0) {
//                $data_field = array(
//                    'gcm_id' => $gcm_id
//                );
//                $edit_gcm_id = $this->user_model->edit($data_field,$call_user_id);

                echo json_encode(
                        array(
                            'server_code' => "100",
                            'name' => $call_user_details1[0]['user_first_name'] . ' ' . $call_user_details1[0]['user_last_name'],
                            'company_name' => $company_name,
                            'email' => $email,
                            'image' => $image,
                            'msg' => "success",
                            'user_id' => $call_user_id,
                            'process' => 'digital1_staff'
                        )
                );
            } else {
                echo json_encode(
                        array(
                            'server_code' => "300",
                            'msg' => 'wrong password or username or company name'
                        )
                );
            }
        } else {

            $company_id = $user_details[0]['firm_seq_no'];
            $cond123 = " AND firm_seq_no='$company_id'";
            $select = "firm_name";
            $fetch_company_name = $this->firm_model->fetch($cond123, $select);
            $company_name = $fetch_company_name[0]['firm_name'];

            $cond1 = " AND user_id='$email' AND password='$confirm_pw' AND firm_seq_no='$company_id' AND status='1'";
            $call_user_details1 = $this->user_model->fetch($cond1);
            $call_user_id = $call_user_details1[0]['user_seq_no'];
            $image = "http://www.digital1crm.com/assets/upload/employee/resize/CROP/" . $call_user_details1[0]['profile_photo'] . "";

            // 100 MEANS SUCCESS, 200 MEANS MISSING, 300 MEANS ERROR
            if (count($call_user_details1) > 0) {
//                $data_field = array(
//                    'gcm_id' => $gcm_id
//                );
//                $edit_gcm_id = $this->user_model->edit($data_field,$call_user_id);

                echo json_encode(
                        array(
                            'server_code' => "100",
                            'name' => $call_user_details1[0]['user_first_name'] . ' ' . $call_user_details1[0]['user_last_name'],
                            'company_name' => $company_name,
                            'email' => $email,
                            'image' => $image,
                            'msg' => "success",
                            'user_id' => $call_user_id,
                            'process' => 'normal'
                        )
                );
            } else {
                echo json_encode(
                        array(
                            'server_code' => "300",
                            'msg' => 'wrong password or username or company name'
                        )
                );
            }
        }
        // end
    }

    function gcm_update() {
        $gcm_id = $this->input->post('gcm_id');
        $user_id = $this->input->post('user_id');

        $data = array(
            'gcm_id' => $gcm_id
        );

        $edit_gcm = $this->user_model->edit($data, $user_id);
        if ($edit_gcm) {
            echo json_encode(
                    array(
                        'server_code' => "100",
                        'msg' => "success"
                    )
            );
        }
    }

    function check_digital1_staff() {
        $user_id = $this->input->post('email');

        $cond = " AND user_id='$user_id'  AND created_by='1' AND status='1' AND assign_to<>''";
        $select = "assign_to";
        $fetch_user_details = $this->user_model->fetch($cond, $select);

        $company_id = $fetch_user_details[0]['assign_to'];

        if ($company_id) {
            $cond123 = " AND firm_seq_no in ($company_id)";
            $fetch_all_company = $this->firm_model->fetch($cond123);

            echo json_encode(
                    array(
                        'server_code' => "100",
                        'fetch_all_company' => $fetch_all_company,
                        'msg' => "success"
                    )
            );
        } else {
            $fetch_all_company = array();
            echo json_encode(
                    array(
                        'server_code' => "300",
                        'fetch_all_company' => $fetch_all_company,
                        'msg' => "No Company Found"
                    )
            );
        }
    }

    function push_notification() {
        $logged_admin_id = $this->data['admin_id'];

        $id = $this->input->post('id');
        $from_model = $this->input->post('from_model');

        $cond = " AND target_seq_no='" . $id . "'";
        $select = "target_seq_no,firm_seq_no,company_id,target_first_name,target_last_name,phone";
        $fetch_mc_details = $this->Targets_model->fetch($cond, $select);
        $phone = $fetch_mc_details[0]['phone'];
        $new_phone = str_replace(array('(', ')'), '', $phone);
        $new_phone1 = str_replace(" ", "", $new_phone);
        $new_phone2 = substr($new_phone1,-10);
        $country_code = substr($new_phone1, 0, 3);
        $phone_nuber = $country_code.$new_phone2;
//        t($fetch_mc_details);

        $admin_id = $logged_admin_id;
        $name = $fetch_mc_details[0]['target_first_name'] . ' ' . $fetch_mc_details[0]['target_last_name'];

        $cond1 = " AND user_seq_no='$admin_id'";
        $select1 = "gcm_id";
        $fetch_gcm = $this->user_model->fetch($cond1, $select1);
        $gcm_id = $fetch_gcm[0]['gcm_id'];

        $msg = '';
        $i = 0;

        $total_array = array();
        foreach ($fetch_mc_details[0] as $key => $value) {
            echo $key;echo "<br>";
            if ($key == 'concatenated_name') {

                $total_array['data'][$key] = $value;
//                $msg .= str_replace('_', '#', $key) . '_' . $value . ',';
                if (++$i == 6) {
                    break;
                }
            } else {
                $msg = $value;
                $msg = str_replace(' ', '', rtrim($msg, ','));
                $msg1 = str_replace(array('(', ')'), '', $msg);
                $msg2 = str_replace(["-", "–"], '', $msg1);
                
                if($key=='phone'){
                    
                }else{
                    $total_array['data'][$key] = $msg2;
                }
                
                $msg .= str_replace('_', '#', $key) . '_' . $value . ',';
                if (++$i == 6) {
                    break;
                }
            }
            $total_array['data']['type'] = 'call';
            $total_array['data']['admin_id'] = $logged_admin_id;
            $total_array['data']['form_model'] = $from_model;
            $total_array['data']['phone'] = $phone_nuber;
           
        }
//        t($total_array);die();
        if (count($total_array) > 0) {
            echo json_encode(
                    array(
                        'server_code' => "100",
                        'msg' => 'Call is perfect'
                    )
            );

            $this->send_push_notification($gcm_id, $total_array);
        } else {
            echo json_encode(
                    array(
                        'server_code' => "300",
                        'msg' => 'Call push not working'
                    )
            );
        }
    }

    // SEND MESSAGES

    function msg_push_notification() {

        $admin_id = $this->input->post('admin_id');
        $id = $this->input->post('id');
        $from_model = $this->input->post('from_model');
        $text = $this->input->post('text');

        $cond = " AND target_seq_no='" . $id . "'";
        $fetch_mc_details = $this->Targets_model->fetch($cond);

        $phone = $fetch_mc_details[0]['phone'];
        $new_phone = str_replace(array('(', ')'), '', $phone);
        $new_phone1 = str_replace(" ", "", $new_phone);
        $new_phone2 = substr($new_phone1,-10);
        $country_code = substr($new_phone1, 0, 3);
        $phone_nuber = $country_code.$new_phone2;

        $name = $fetch_mc_details[0]['target_first_name'] . ' ' . $fetch_mc_details[0]['target_last_name'];

        $cond1 = " AND user_seq_no='$admin_id'";
        $select1 = "gcm_id";
        $fetch_gcm = $this->user_model->fetch($cond1, $select1);
        $gcm_id = $fetch_gcm[0]['gcm_id'];

        $total_array = array();
        $total_array['data']['type'] = 'sms';
        $total_array['data']['target_first_name'] = $fetch_mc_details[0]['target_first_name'];
        $total_array['data']['target_last_name'] = $fetch_mc_details[0]['target_last_name'];
        $total_array['data']['text'] = $text;
        $total_array['data']['target_seq_no'] = $fetch_mc_details[0]['target_seq_no'];
        $total_array['data']['phone'] = $phone_nuber;
        $total_array['data']['admin_id'] = $admin_id;
        $total_array['data']['firm_seq_no'] = $fetch_mc_details[0]['company_id'];
        $total_array['data']['form_model'] = $from_model;

        if (count($total_array) > 0) {
            echo json_encode(
                    array(
                        'server_code' => "100",
                        'msg' => 'Individual message sent successfully.'
                    )
            );

            $this->send_push_notification($gcm_id, $total_array);
        } else {
            echo json_encode(
                    array(
                        'server_code' => "300",
                        'msg' => 'Individual message sent failed.'
                    )
            );
        }
    }

    //end
    // multiple send messages
    function multiple_msg_push_notification() {
        $logged_admin_id = $this->data['admin_id'];

        $mobile = $this->input->post('mobile');
        $all_mobile_no = explode(",", $mobile);

        $text = $this->input->post('text');

        $cond10 = " AND admin_id='$logged_admin_id'";
        $select10 = "gcm_id";
        $fetch_gcm_logged_contact = $this->admin_login_model->fetch($cond10, $select10);
        $gcm_id = $fetch_gcm_logged_contact[0]['gcm_id'];

        $total_multiple_array = array();
        $name_of_contact = array();

        foreach ($all_mobile_no as $key => $value) {
            $mobile_no = $value;

            $cond = "AND admin_id='$logged_admin_id' AND mobile='$mobile_no' AND type='multiple' order by id desc limit 0,1";
            $select = "master_id";
            $fetch = $this->mc_send_msg->fetch($cond, $select);
            $fetch_contact_master_id = $fetch[0]['master_id'];

            $cond1 = " AND id='$fetch_contact_master_id'";
            $select1 = "concatenated_name";
            $fetch_contact_name = $this->master_name_model->fetch($cond1, $select1);
            $name_of_contact[] = $fetch_contact_name[0]['concatenated_name'];
        }
        $all_name = implode(",", $name_of_contact);

        $total_multiple_array['data']['mob'] = $mobile;
        $total_multiple_array['data']['name'] = $all_name;
        $total_multiple_array['data']['text'] = $text;
        $total_multiple_array['data']['type'] = 'multi';

        if (count($total_multiple_array) > 0) {
            echo json_encode(
                    array(
                        'server_code' => "100",
                        'msg' => 'Multiple messages sent successfully.'
                    )
            );

            $this->send_push_notification($gcm_id, $total_multiple_array);

            echo 2;
            exit();
        } else {
            echo json_encode(
                    array(
                        'server_code' => "300",
                        'msg' => 'Multiple messages sent failed.'
                    )
            );
        }
    }

    //end

    public function send_push_notification($registatoin_ids, $messages) {
//        $registatoin_ids = 'APA91bEgbt_qTGry2ekjyIheXL_DKSnrvh9qokBEv4e5ENxYFmpJbfUcE6DO3HtcIopFNeqzqhM0L6qq3Tc-99DtlXI3b5Q7jjSOctLTskTP0RS9CY8dqxmr1HZYl-FzKDAoUJGY_U2N';
//        $message = 'This is test message!';
//        $registatoin_ids = array($registatoin_ids);
//      echo  $registatoin_ids = json_encode($registatoin_ids);
        $all_details = $messages;

        $message = array(
            "title" => 'Digital1CRM',
            "body" => 'Welcome Digital1CRM',
            "target_seq_no" => $all_details[data]['target_seq_no'],
            "type" => $all_details[data]['type'],
            "admin_id" => $all_details[data]['admin_id'],
            "firm_seq_no" => $all_details[data]['firm_seq_no'],
            "company_id" => $all_details[data]['company_id'],
            "phone" => $all_details[data]['phone'],
            "name" => $all_details[data]['target_first_name'] . " " . $all_details[data]['target_last_name'],
            "form_model" => $all_details[data]['form_model'],
            "receive_sms_text" => $all_details[data]['text']
        );
//        t($message);die();
        // Set POST variables
        $url = 'https://fcm.googleapis.com/fcm/send';

        $fields = array(
            'notification' => $message,
            'to' => $registatoin_ids
        );
//        t($fields);

        $headers = array(
            'Authorization: key=' . 'AAAAasi98vw:APA91bHApXOOMPF7Ql7Y9td0Z167qSMVRmKEE8OxLJpoI19Oc0TZdwXbZZ0dCqJDhopWDe1OZnPPwkyuCM3k_9hlERcCJHfj54w98U5EiyTFkW4OCk_S2orBWYx-2Ku6kV2Ui8-jkN9k',
            'Content-Type: application/json'
        );
        //print_r($headers);
        // Open connection
        $ch = curl_init();
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
//        exit;
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);
//        echo $result;exit;
        return $result;
    }

    function sms_receive() {
        $user_login_id = $this->input->post('admin_id');
        $to_phone_number = $this->input->post('phone_no');
        $form_model = $this->input->post('form_model');
        $id = $this->input->post('id');
        $text = $this->input->post('text');

        $getdate = time();
        $date = date_create();
        date_timestamp_set($date, $getdate);
        $newdate = date_format($date, 'm-d-Y H:i:s');

        $cond = " AND target_seq_no='$id'";
        $fetch_mc_contact_details = $this->Targets_model->fetch($cond);
        $fetch_company_id = $fetch_mc_contact_details[0]['firm_seq_no'];
        $name = $fetch_mc_contact_details[0]['target_first_name'] . ' ' . $fetch_mc_contact_details[0]['target_last_name'];

        $data = array(
            'form_id' => $user_login_id,
            'to_id' => $id,
            'to_name' => $name,
            'to_phone_no' => $to_phone_number,
            'content' => $text,
            'send_date_time' => $newdate,
            'firm_seq_no' => $fetch_company_id,
            'added_date' => time(),
            'form_model' => $form_model
        );
        $add_sms_log = $this->send_sms_model->add($data);

        if (count($add_sms_log) > 0) {
            echo json_encode(
                    array(
                        'server_code' => "100",
                        'msg' => "SMS receive successfully"
                    )
            );
        } else {
            echo json_encode(
                    array(
                        'server_code' => "300",
                        'msg' => 'Do not receive any kind of SMS'
                    )
            );
        }
    }

    function sms_log_details() {
        $company_name = $this->input->post('company_name');
        $email = $this->input->post('email');

        $process_type = $this->input->post('process_type');

        $cond1 = " AND firm_name='$company_name'";
        $select1 = "firm_seq_no";
        $fetch_company_name = $this->firm_model->fetch($cond1, $select1);
        $company_id = $fetch_company_name[0]['firm_seq_no'];


        if ($process_type == 'digital1_staff') {
            $cond1 = " AND user_id='$email' AND assign_to like '%$company_id%' AND status='1'";
            $call_user_details1 = $this->user_model->fetch($cond1);
            $id = $call_user_details1[0]['user_seq_no'];
        } else {
            if ($process_type == 'normal') {
                $cond1 = " AND user_id='$email' AND firm_seq_no='$company_id' AND status='1'";
                $call_user_details1 = $this->user_model->fetch($cond1);
                $id = $call_user_details1[0]['user_seq_no'];
            }
        }

        $cond = "AND form_id='$id' AND firm_seq_no='$company_id' order by id desc";
        $select = "to_id,to_phone_no,to_name,send_date_time,content ";
        $fetch_sms_history = $this->send_sms_model->fetch($cond, $select);

        if (count($fetch_sms_history) > 0) {
            echo json_encode(
                    array(
                        'server_code' => "100",
                        'msg' => "success",
                        'details' => $fetch_sms_history
                    )
            );
        } else {
            echo json_encode(
                    array(
                        'server_code' => "200",
                        'msg' => 'no details found'
                    )
            );
        }
    }

    function receiveCallDetails() {
        $user_login_id = $this->input->post('admin_id');
        $to_phone_number = $this->input->post('phone_no');
        $call_duration = $this->input->post('duraion');
        $form_model = $this->input->post('form_model');

        $getdate = time();
        $date = date_create();
        date_timestamp_set($date, $getdate);
        $newdate = date_format($date, 'm-d-Y H:i:s');
//        $t1 = explode(',',$time);
//        $t2 = $t1[1];
//        $t3 = explode('/',$t1[0]);
//        $t4 = $t3[2].'-'.$t3[0].'-'.$t3[1].' '.$t2;

        $id = $this->input->post('id');

        $cond = " AND target_seq_no='$id'";
        $fetch_mc_contact_details = $this->Targets_model->fetch($cond);
        $fetch_company_id = $fetch_mc_contact_details[0]['firm_seq_no'];
        $name = $fetch_mc_contact_details[0]['target_first_name'] . ' ' . $fetch_mc_contact_details[0]['target_last_name'];

        $data = array(
            'form_id' => $user_login_id,
            'to_id' => $id,
            'to_name' => $name,
            'to_phone_no' => $to_phone_number,
            'time' => $newdate,
            'call_duration' => $call_duration,
            'firm_seq_no' => $fetch_company_id,
            'added_date' => time(),
            'form_model' => $form_model
        );
        $add_call_log = $this->call_log_model->add($data);


        if (count($add_call_log) > 0) {
            echo json_encode(
                    array(
                        'server_code' => "100",
                        'msg' => "Call receive successfully"
                    )
            );
        } else {
            echo json_encode(
                    array(
                        'server_code' => "300",
                        'msg' => 'Do not receive any kind of call'
                    )
            );
        }
    }

    function sendCallHistoryDetails() {
        $company_name = $this->input->post('company_name');
        $email = $this->input->post('email');

        $process_type = $this->input->post('process_type');

        $cond1 = " AND firm_name='$company_name'";
        $select1 = "firm_seq_no";
        $fetch_company_name = $this->firm_model->fetch($cond1, $select1);
        $company_id = $fetch_company_name[0]['firm_seq_no'];


        if ($process_type == 'digital1_staff') {
            $cond1 = " AND user_id='$email' AND assign_to like '%$company_id%' AND status='1'";
            $call_user_details1 = $this->user_model->fetch($cond1);
            $id = $call_user_details1[0]['user_seq_no'];
        } else {
            if ($process_type == 'normal') {
                $cond1 = " AND user_id='$email' AND firm_seq_no='$company_id' AND status='1'";
                $call_user_details1 = $this->user_model->fetch($cond1);
                $id = $call_user_details1[0]['user_seq_no'];
            }
        }

        $cond = "AND form_id='$id' AND firm_seq_no='$company_id' order by id desc";
        $select = "to_id,to_phone_no,to_name,time,call_duration";
        $fetch_call_history = $this->call_log_model->fetch($cond, $select);

        if (count($fetch_call_history) > 0) {
            echo json_encode(
                    array(
                        'server_code' => "100",
                        'msg' => "success",
                        'details' => $fetch_call_history
                    )
            );
        } else {
            echo json_encode(
                    array(
                        'server_code' => "100",
                        'msg' => 'no details found'
                    )
            );
        }
    }
    
    function attaendence_for_1st_2nd_july(){
        $event_type = $this->input->post('event_type');
        
        if($event_type == 1){
            $cond = " AND 1st_july_event_attaendence='Active' AND firm_seq_no='107'";
            $select = "target_seq_no,firm_seq_no,target_first_name,target_last_name,email,phone";
            $fetch_attaendence_member = $this->Targets_model->fetch($cond,$select);

            if (count($fetch_attaendence_member) > 0) {
                echo json_encode(
                        array(
                            'server_code' => "100",
                            'msg' => "success",
                            'details' => $fetch_attaendence_member
                        )
                );
            } else {
                echo json_encode(
                        array(
                            'server_code' => "200",
                            'msg' => 'no details found'
                        )
                );
            }
        }
        
        if($event_type == 2){
            $cond = " AND 2nd_july_event_attaendence='Active' AND firm_seq_no='108'";
            $select = "target_seq_no,firm_seq_no,target_first_name,target_last_name,email,phone";
            $fetch_attaendence_member = $this->Targets_model->fetch($cond,$select);

            if (count($fetch_attaendence_member) > 0) {
                echo json_encode(
                        array(
                            'server_code' => "100",
                            'msg' => "success",
                            'details' => $fetch_attaendence_member
                        )
                );
            } else {
                echo json_encode(
                        array(
                            'server_code' => "200",
                            'msg' => 'no details found'
                        )
                );
            }
        }
        
        
    }
    
    function qr_code_scan_for_event(){
        $target_seq_no = intval($this->input->post('target_seq_no'));
        
        $cond = " AND target_seq_no=$target_seq_no";
        $fetch_details_of_user = $this->Targets_model->fetch($cond);
        $firm_seq_no_of_user = $fetch_details_of_user[0]['firm_seq_no'];
        
        if(count($fetch_details_of_user)>0){
            if($firm_seq_no_of_user == 107){
                $cond = " AND target_seq_no=$target_seq_no AND firm_seq_no='107' AND 1st_july_event_attaendence='Active'";
                $fetch_already_entrance = $this->Targets_model->fetch($cond);
                if(count($fetch_already_entrance) > 0){
                    echo json_encode(
                        array(
                            'server_code' => "300",
                            'msg' => "You are already registered."
                        )
                    );
                }else{
                    $data = array(
                        '1st_july_event_attaendence' => 'Active',
                        'modified_date' => time()
                    );
                    $edit = $this->Targets_model->edit($data,$target_seq_no);
                    
                    if($edit){
                        echo json_encode(
                            array(
                                'server_code' => "100",
                                'msg' => "edit success"
                            )
                        );
                    }else{
                        echo json_encode(
                            array(
                                'server_code' => "200",
                                'msg' => "edit failed"
                            )
                        );
                    }
                }                
                                
            }
            if($firm_seq_no_of_user == 108){
                $cond = " AND target_seq_no=$target_seq_no AND firm_seq_no='108' AND 2nd_july_event_attaendence='Active'";
                $fetch_already_entrance = $this->Targets_model->fetch($cond);
                if(count($fetch_already_entrance) > 0){
                    echo json_encode(
                        array(
                            'server_code' => "300",
                            'msg' => "You are already registered."
                        )
                    );
                }else{
                    $data = array(
                        '2nd_july_event_attaendence' => 'Active',
                        'modified_date' => time()
                    );
                    $edit = $this->Targets_model->edit($data,$target_seq_no);
                    
                    if($edit){
                        echo json_encode(
                            array(
                                'server_code' => "100",
                                'msg' => "edit success"
                            )
                        );
                    }else{
                        echo json_encode(
                            array(
                                'server_code' => "200",
                                'msg' => "edit failed"
                            )
                        );
                    }
                }
                
            }
        }else{
            echo json_encode(
                array(
                    'server_code' => "200",
                    'msg' => "Your QR code is invalid."
                )
            );
        }
    }

    /*     * *************Santanu-FileUpload ******************** */

    function upload() {
        $id = $this->input->post('id');
        $phone = $this->input->post('phone');

        //t($id);
        //t($phone);die();
        $config['upload_path'] = './assets/uploads/';
//                $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '50000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $this->load->library('upload', $config);
        $this->upload->do_upload('file_name');
        $file_detail = $this->upload->data();
        $file_name = $file_detail['file_name'];
        $data = array(
            'id' => $id,
            'phone' => $phone,
            'file_name' => $file_name
        );
        t($data);
        die();
        $add = $this->master_name_model->insert('tbl_file_details', $data);
        if ($add) {

            echo "Inserted Succesfully";
        }
    }

}

?>