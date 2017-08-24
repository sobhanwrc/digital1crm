<?php
ob_start();
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Attorney extends MY_Controller {

    function __construct() {
        ob_clean();
        

        parent::__construct();

        $this->isLogin();

        $this->load->model('firm_model');
        $this->load->model('user_model');
        $this->load->model('app_users_model');
        $this->load->model('address_model');
        $this->load->model('country_model');
        $this->load->model('county_model');
        $this->load->model('states_model');
        $this->load->model('city_model');
        $this->load->model('firm_codes_model');
        $this->load->model('codes_model');
        $this->load->model('firm_attorney_model');
        $this->load->model('attorney_model');
        $this->load->model('attorney_rpt_model');
        $this->load->model('attorney_sg_model');
        $this->load->model('attorney_sec_model');
        $this->load->model('section_model');
        $this->load->model('designation_model');
        $this->load->model('group_model');
        $this->load->model('managelist_model');
        
    }

    function index() {

        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $admin_session_data = $this->session->userdata('admin_session_data');
        $firm_seq_no = $admin_session_data['firm_seq_no'];
        
        $sql = '';
        if ($role_code == 'SITEADM') {
            $sql = "Select attr.*,f.firm_name,f.firm_seq_no from plma_attorney as attr inner join plma_firm as f "
                    . " on attr.firm_seq_no=f.firm_seq_no ";
        } elseif ($role_code == 'FIRMADM') {
            $sql = "Select attr.*,f.firm_name, f.firm_seq_no from plma_attorney as attr inner join plma_firm as f "
                    . " on attr.firm_seq_no=f.firm_seq_no  where  attr.firm_seq_no=$firm_seq_no";
        } elseif ($role_code == 'ATTR') {
            $sql = "Select attr.*,f.firm_name, f.firm_seq_no from plma_attorney as attr inner join plma_firm as f "
                    . " on attr.firm_seq_no=f.firm_seq_no where  attr.firm_seq_no=$firm_seq_no";
        }

        $res = $this->db->query($sql);
        $row = $res->result_array();




        if ($role_code == 'SITEADM') {
            $select = "firm_seq_no,firm_name";
            $this->data['firms'] = $this->firm_model->fetch('', $select);
        }

        $this->data['attorneys'] = $row;

        if ($firm_seq_no != '') {
            $cond = " and firm_seq_no = '" . $firm_seq_no . "'";
            $row = $this->managelist_model->fetch($cond);
            $this->data['managelist'] = $row;
        }

        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/attorney/listing',$this->data);
    }

    function fetchFirmCodes($param) {

        $firm_id = $this->input->post('fimrs');

        if ($firm_id == 'all' || $firm_id == '') {
            $sql = "Select attr.*,f.firm_name, f.firm_seq_no from plma_attorney as attr inner join plma_firm as f "
                    . " on attr.firm_seq_no=f.firm_seq_no";
        } else {
            $sql = "Select attr.*,f.firm_name, f.firm_seq_no from plma_attorney as attr inner join plma_firm as f "
                    . " on attr.firm_seq_no=f.firm_seq_no where f.firm_seq_no=$firm_id";
        }

        $query = $this->db->query($sql);
        // echo $this->db->last_query(); exit;
        $all_attorneys = $query->result_array();
        $this->data['attorneys_1'] = $all_attorneys;


        $this->data['attorneys'] = $all_attorneys;



        $select = "firm_seq_no,firm_name";
        $this->data['firms'] = $this->firm_model->fetch('', $select);
        

        $this->data['firm_id'] = $firm_id;

        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/attorney/listing', $this->data);
    }

    function add() {

        $admin_id = $this->data['admin_id'];
        
        //fetch company admin details 
        $cond = " AND user_seq_no=$admin_id";
        $fetch_admin_details = $this->user_model->fetch($cond);
//        echo $this->db->last_query();
//        t($fetch_admin_details);die();
        $admin_name = $fetch_admin_details[0]['user_first_name']." ".$fetch_admin_details[0]['user_last_name'];
        //end
        
        $role_code = $this->data['role_code'];
        $admin_session_data = $this->session->userdata('admin_session_data');
        $firm_seq_no = $admin_session_data['firm_seq_no'];
        

        if ($role_code != 'FIRMADM' && $role_code != 'SITEADM') {
            redirect($base_url . 'attorney');
        }

        $add_new_attorney_btn = $this->input->post('add_new_attorney_btn');
        if (isset($add_new_attorney_btn)) {

            ///////////// Insert address into address table ///////////////////
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $email = $this->input->post('email');
            
            $mobile = $this->input->post('mobile');
            $country_code3 = $this->input->post('country_code3');
//            $mobile = $this->removePhoneMask($mobile);
            
            $phone1 = $this->input->post('phone1');
            $country_code1 = $this->input->post('country_code1');
//            $phone1 = $this->removePhoneMask($phone1);
            
            $phone2 = $this->input->post('phone2');
            $country_code2 = $this->input->post('country_code2');
//            $phone2 = $this->removePhoneMask($phone2);
            $position = $this->input->post('position');
            $date_of_appointment = $this->input->post('date_of_appointment');
            
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $email_appointment_user = $this->input->post('email_appointment_user');
            
            $password = md5($this->input->post('password'));
            $this->load->helper('string');
            $random = random_string('alnum', 16);
            $random1 = base64_encode($random);

            $final_password = $password . $random1;
            
            $mobile_appointment_user = $this->input->post('mobile_appointment_user');
            $mobile_appointment_user = $this->removePhoneMask($mobile_appointment_user);
            $phone1_appointment_user = $this->input->post('phone1_appointment_user');
            $phone1_appointment_user = $this->removePhoneMask($phone1_appointment_user);
            $phone2_appointment_user = $this->input->post('phone2_appointment_user');
            $phone2_appointment_user = $this->removePhoneMask($phone2_appointment_user);
            $position_appointment_user = $this->input->post('position_appointment_user');
            $date_of_appointment_user = $this->input->post('date_of_appointment_user');

            $config['upload_path'] = './assets/upload/employee/resize/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';
            $this->load->library('upload', $config);
            //$this->upload->do_upload('santanu');
            if ($this->upload->do_upload('profile_image')) {
                $upload_data = $this->upload->data();
                $image_config["image_library"] = "gd2";
                $image_config["source_image"] = $upload_data["full_path"];
                $image_config['create_thumb'] = FALSE;
                $image_config['maintain_ratio'] = FALSE;
                //$image_config['maintain_ratio'] = TRUE;
                $image_config['new_image'] = $upload_data["file_path"] . $data['file_name'];
                $image_config['quality'] = "100%";
                $image_config['width'] = 250;
                $image_config['height'] = 80;
                $dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
                $image_config['master_dim'] = ($dim > 0) ? "height" : "width";
                $this->load->library('image_lib');
                $this->image_lib->initialize($image_config);
                $this->image_lib->resize();
                $image = $upload_data['file_name'];

                //$this->load->view('upload_form', $error);
            }
            
           
            $data1 = array(
                'firm_seq_no' => $firm_seq_no,
                'user_first_name' => $firstname,
                'user_last_name' => $lastname,
                'user_id' => $email,
                'mobile' => $country_code3.$mobile,
                'phone1' => $country_code1.$phone1,
                'phone2' => $country_code2.$phone2,
                'position' => $position,
                'profile_photo' => $image,
                'date_of_appointment' => $date_of_appointment,
//                'first_name' => $first_name,
//                'last_name' => $last_name,
//                'email_appointment_user' => $email_appointment_user,
                'password' => $final_password,
                'role_code' => 'ATTR',
                'salt' => $random,
                'created_by' => $admin_id,
                'created_date' => time(),
                'status' => 1
//                'mobile_appointment_user' => $mobile_appointment_user,
//                'mobile_appointment_user' => $mobile_appointment_user,
//                'phone1_appointment_user' => $phone1_appointment_user,
//                'phone2_appointment_user' => $phone2_appointment_user,
//                'position_appointment_user' => $position_appointment_user,
//                'date_of_appointment_user' => $date_of_appointment_user,
            );
            
//            t($data1);die();
            $user_add = $this->user_model->add($data1); //echo $this->db->last_query(); exit;
            
            /////////// Insert user details into User table ////////////
            $data2 = array(
                'firm_seq_no' => $firm_seq_no,
                'user_seq_no' => $user_add,
                'attorney_first_name' => $firstname,
                'attorney_last_name' => $lastname,
                'attorney_email1' => $email,
                'profile_photo' => $image,
                'mobile' => $country_code3.$mobile,
                'phone1' => $country_code1.$phone1,
                'phone2' => $country_code2.$phone2,
                'position' => $position,
                'date_of_appointment' => $date_of_appointment,
                'created_by' => $admin_id,
                'created_date' => time()
            );
//            echo "<pre>";
//            print_r($data2);
//            exit;

            $insertid2 = $this->attorney_model->add($data2);
            
            if($insertid2)
            {
                //email send code//
//                $this->load->library('email');
//                $this->email->initialize($config);
                
                $message_tpl = file_get_contents($this->config->item('assets_path') . 'email/manage_call_user.html');
                $patterns = array();
                $patterns[0] = '/!!!#name#!!!/';
                $patterns[1] = '/!!!#company_admin_name#!!!/';
                $patterns[2] = '/!!!#email_id#!!!/';
                $patterns[3] = '/!!!#password#!!!/';
                $replacements = array();
                $replacements[0] = $firstname . ' ' . $lastname;
                $replacements[1] = $admin_name;
                $replacements[2] = $email;
                $replacements[3] = $this->input->post('password');
                $message_content = preg_replace($patterns, $replacements, $message_tpl);
                
                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'sitemail.isqweb.it',
                    'smtp_port' => 587,
                    'smtp_user' => 'digital1crm@isqweb.com',
                    'smtp_pass' => 'grT54rDDy6k',
                    'mailtype'  => 'html', 
                    'charset'   => 'iso-8859-1'
                );

                $subject = "Added as manage call user";
//                $this->email_config();
                
                $this->load->library('email');                
                
                $this->email->from('digital1crm@isqweb.com', 'Digital1CRM');
                $this->email->to($email);
                $this->email->subject($subject);
                $this->email->message($message_content);
                
                $this->email->initialize($config);
                
                $send = $this->email->send();
                //end//
                if($send){
                    $msg = 'Attorney added successfully';
                    $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                    redirect($base_url . 'attorney');
                }else {
                    $msg = 'Error in adding attorney';
                    $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                    redirect($base_url . 'attorney');
                }
                
            } else {
                $msg = 'Error in adding attorney';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney/add');
            }
        } else {
            
            

            $this->data['all_firms'] = $this->firm_model->fetch();

            //  $cond1 = " and category_type = 'Gender' ";
            //  $this->data['all_genders'] = $this->codes_model->fetch($cond1);
            //  $cond10 = " and category_type = 'Groups' ";
            //  $this->data['all_groups'] = $this->codes_model->fetch($cond10);
            //  $cond11 = " and category_type = 'Approvers' ";
            //  $this->data['all_approvers'] = $this->codes_model->fetch($cond11);
            //  $cond9 = " and category_type = 'Attorney Type' ";
            //  $this->data['all_attorney_type'] = $this->codes_model->fetch($cond9);
            //  $cond2 = " and category_type = 'Job Type' ";
            //  $this->data['all_jobtypes'] = $this->codes_model->fetch($cond2);

            $cond3 = " and category_type = 'Jurisdictions' ";
            $this->data['all_jurisdictions'] = $this->codes_model->fetch($cond3);

            //  $cond4 = " and category_type = 'Industry Type' ";
            //  $this->data['all_industry'] = $this->codes_model->fetch($cond4);
            //  $cond4 = " and category_type = 'Industry Type' ";
            //  $this->data['all_industry'] = $this->codes_model->fetch($cond4);

            $cond8 = " and role_code = 'ATTR' and status = '1' and user_seq_no not in (select user_seq_no from plma_attorney)";
            $this->data['all_user_to_be_attorney'] = $this->user_model->fetch($cond8);
            $this->data['all_designations'] = $this->designation_model->fetch();
            $this->data['all_groups'] = $this->group_model->fetch();
            // echo $this->db->last_query(); exit;
//             t($this->data['all_designations']);
//             exit;

            $role_code = $this->data['role_code'];
            if ($role_code == 'FIRMADM') {
                $sql = "select pfirm.firm_seq_no from plma_firm pfirm where pfirm.firm_admin_seq_no=$admin_id";
                $res = $this->db->query($sql);
                $row = $res->result_array();
                $firm_seq_no = $row[0]['firm_seq_no'];

                $this->load->model('section_model');
                $cond = "AND firm_seq_no=$firm_seq_no";
                $firm_sections = $this->section_model->fetch($cond);
//                echo $this->db->last_query();
                $this->data['firm_sections'] = $firm_sections;
//                t($this->data['firm_sections']); exit;
            }



            $this->get_include();
            $this->load->view($this->view_dir . 'operation_master/attorney/add', $this->data);
        }
    }
    
    function duplicate_email_check(){
        $email = $this->input->post('email');
        
        $cond = " AND user_id='$email' AND status=1";
        $fetch_user_details = $this->user_model->fetch($cond);
        if(count($fetch_user_details) > 0){
            $return = 'false';
            echo $return;
            exit;
        }else{
            $return = 'true';
            echo $return;
            exit;
        }
    }
    
    function view($code='')
    {
      $code = base64_decode($code);
      $cond = " and attorney_seq_no = '".$code."'";
      $row = $this->attorney_model->fetch($cond);
//      echo $this->db->last_query();
//      t($row);die();
      
      //for add contact phone number
        $phone_no = $row[0]['mobile'];
        $original_phone_no = $phone_no;
        $length = strlen($original_phone_no);
    //        echo $length;die();
        if ($length == 10) {
            $add_contact_country_code = '';
        } else if ($length == 11) {
            $add_contact_country_code = substr($original_phone_no, 0, 1);
        } else if ($length == 12) {
            $add_contact_country_code = substr($original_phone_no, 0, 2);
        } else if ($length == 13) {
            $add_contact_country_code = substr($original_phone_no, 0, 3);
        } else if ($length == 14) {
            $add_contact_country_code = substr($original_phone_no, 0, 4);
        }
        else if ($length == 17) {
            $add_contact_country_code = substr($original_phone_no, 0, 3);
        }
        $add_contact_phone_number = substr($original_phone_no, -11);
        $this->data['country_code_3'] = $add_contact_country_code;
        $this->data['mobile'] = $add_contact_phone_number;

        $phone_no_1 = $row[0]['phone1'];
        $original_phone_no_1 = $phone_no_1;
        $length = strlen($original_phone_no_1);
    //        echo $length;die();
        if ($length == 10) {
            $add_contact_country_code_1 = '';
        } else if ($length == 11) {
            $add_contact_country_code_1 = substr($original_phone_no_1, 0, 1);
        } else if ($length == 12) {
            $add_contact_country_code_1 = substr($original_phone_no_1, 0, 2);
        } else if ($length == 13) {
            $add_contact_country_code_1 = substr($original_phone_no_1, 0, 3);
        } else if ($length == 14) {
            $add_contact_country_code_1 = substr($original_phone_no_1, 0, 4);
        }
        else if ($length == 17) {
            $add_contact_country_code_1 = substr($original_phone_no_1, 0, 3);
        }
        $add_contact_phone_number_1 = substr($original_phone_no_1, -11);
        $this->data['country_code_1'] = $add_contact_country_code_1;
        $this->data['phone_1'] = $add_contact_phone_number_1;

        $phone_no_2 = $row[0]['phone2'];
        $original_phone_no_2 = $phone_no_2;
        $length = strlen($original_phone_no_2);
    //        echo $length;die();
        if ($length == 10) {
            $add_contact_country_code_2 = '';
        } else if ($length == 11) {
            $add_contact_country_code_2 = substr($original_phone_no_2, 0, 1);
        } else if ($length == 12) {
            $add_contact_country_code_2 = substr($original_phone_no_2, 0, 2);
        } else if ($length == 13) {
            $add_contact_country_code_2 = substr($original_phone_no_2, 0, 3);
        } else if ($length == 14) {
            $add_contact_country_code_2 = substr($original_phone_no_2, 0, 4);
        }
        else if ($length == 17) {
            $add_contact_country_code_2 = substr($original_phone_no_2, 0, 3);
        }
        $add_contact_phone_number_2 = substr($original_phone_no_2, -11);
        $this->data['country_code_2'] = $add_contact_country_code_2;
        $this->data['phone_2'] = $add_contact_phone_number_2;
     
      $this->data['attorney']=$row;
      $this->get_include();
      $this->load->view($this->view_dir . 'operation_master/attorney/attorney_view', $this->data);

    }
    /*
     * Upload image function by Satyam
     */

    function crop_image(){
        $data = $_POST['image'];

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);

        $data = base64_decode($data);
        $imageName = time().'.png';
        file_put_contents('assets/upload/employee/resize/CROP/'.$imageName, $data);

        echo 'done';
    }

    function files_up($admin_id,$profile_id) {
        $admin_id = $this->input->post('admin_id');
        $profile_id = $this->input->post('user_id');

        $data = $_POST['image'];

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);

        $data = base64_decode($data);
        $imageName = time().'.png';
        file_put_contents('assets/upload/employee/resize/CROP/'.$imageName, $data);

        echo 'done';

        $sql_attorney = "UPDATE `plma_attorney` SET `profile_photo` = '$imageName' WHERE `plma_attorney`.`attorney_seq_no` = '$profile_id'";
        $this->db->query($sql_attorney);

        $this->db->select('user_seq_no')->from('plma_attorney')->where('attorney_seq_no',$profile_id);
        $details = $this->db->get()->result_array();

        $sql ="UPDATE `plma_user` SET `profile_photo` = '{$imageName}' WHERE `plma_user`.`user_seq_no` = '".$details[0]['user_seq_no']."'";
        $this->db->query($sql);


    }
    
    function make_thumb($src, $dest, $desired_width,$extension) {

        
       // var_dump($src);
      list( $width,$height) = getimagesize($src);
              
            //echo $width;
            //echo $height;
           // die();
            /* read the source image */
        //check extension of image
        if($extension =='jpg' or $extension == 'jpeg')
        {
           // echo $extension;
            $source_image = imagecreatefromjpeg($src);
        }
        elseif ($extension =='png' or $extension =='pneg') {
            
         $source_image = imagecreatefrompng($src);
    }
    elseif ($extension =='gif') {
        $source_image = imagecreatefromgif($src);
    
}
else {
    return false;
}
           

            /* find the "desired height" of this thumbnail, relative to the desired width  */
            //$desired_height = floor($height * ($desired_width / $width));

            /* create a new, "virtual" image */
            $virtual_image = imagecreatetruecolor($desired_width, $desired_width);

            /* copy source image at a resized size */
            imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_width, $width, $height);
//print_r($dest);
            /* create the physical thumbnail image to its destination */
            imagejpeg($virtual_image, $dest);
    }
    /*
     * Code end by Satyam
     */
    function edit_save($code='')
    {
        $admin_all_session = $this->session->userdata('admin_session_data');

        // $this->files_up($admin_all_session['admin_id'],base64_decode($code));
        //print_r($_FILES);
        //die();
        $admin_id = $admin_all_session['admin_id'];
        $code=base64_decode($code);

        // $this->data['user_number'] = $code;
        // $this->data['admin_id'] = $admin_id;
        
        $arry_user=$this->input->post();
//        t($arry_user);
        
        unset($arry_user['add_new_attorney_btn']);
        $user_email=$arry_user['attorney_email1'];
        $user_first_name=$arry_user['attorney_first_name'];
        $user_last_name=$arry_user['attorney_last_name'];
        $date_of_appointment=$arry_user['date_of_appointment'];
        $position=$arry_user['position'];
        
        $country_code1 = $arry_user['country_code1'];
        $country_code2 = $arry_user['country_code2'];
        $country_code3 = $arry_user['country_code3'];
        
        $phone1 = $arry_user['phone1'];
        $phone2 = $arry_user['phone2'];
        $mobile = $arry_user['mobile'];
        

        $user_seq_no=$arry_user['user_seq_no'];
//        $password=$arry_user['password'];
//        $password=md5($password);

         unset($arry_user['user_seq_no']);
         $this->load->helper('string');
         $random = random_string('alnum', 16);
         $random1 = base64_encode($random);

//         $final_password = $password.$random1;
        
        //$sql_qr="update plma_user set user_id='".$user_email."' where  user_seq_no='".$admin_id."'  ";
       // $this->db->query($sql_qr);
        $data1=array(
            'user_id'=>$user_email,
//            'password'=>$final_password,
//            'salt'=>$random
            'user_first_name' => $user_first_name,
            'user_last_name' => $user_last_name,
            'mobile' => $country_code3.$mobile,
            'phone1' => $country_code1.$phone1,
            'phone2' => $country_code2.$phone2,
            'position' => $position,
            'date_of_appointment' => $date_of_appointment
         );
//        t($data1);die();
        /*$this->db->set('user_id',$user_email);
        $this->db->where('user_seq_no',$user_seq_no);
        $res=$this->db->update('plma_user');
        $result =  $this->db->affected_rows();*/
        
        $this->db->where('user_seq_no',$user_seq_no);
        $this->db->update('plma_user',$data1);
       /* $this->db->set('username',$username);
        $this->db->where('email', $email);
        $this->db->update('user');
         $result =  $this->db->affected_rows(); */
        
        $data = array(
            'attorney_first_name' => $user_first_name,
            'attorney_last_name' => $user_last_name,
            'mobile' => $country_code3.$mobile,
            'phone1' => $country_code1.$phone1,
            'phone2' => $country_code2.$phone2,
            'position' => $position,
            'date_of_appointment' => $date_of_appointment,
            'attorney_email1' => $user_email
        );

     $updatedata = $this->attorney_model->edit($data, $code);

     if($updatedata)
     {
       $this->session->set_flashdata('suc_message', 'Attorney updated successfully');
       
     }
     else {
       $this->session->set_flashdata('suc_message', 'No Updates Done');
     }
     if($admin_all_session['role_code'] == "FIRMADM") {
        redirect($base_url . 'attorney/index');
     }
     elseif($admin_all_session['role_code'] == "ATTR") {
        redirect($base_url . 'attorney/edit/'.base64_encode($code));
     }
     
    }
    function edit($code = '', $view = '') {
        $admin_all_session = $this->session->userdata('admin_session_data');
        $admin_id = $admin_all_session['admin_id'];
        $role_code = $admin_all_session['role_code'];
        
        $code = base64_decode($code);

        // $admin_id = $admin_all_session['admin_id'];
        // $code=base64_decode($code);

        $this->data['user_number'] = $code;
        $this->data['admin_id'] = $admin_id;
        
        $cond = " AND attorney_seq_no='$code'";
        $fetch_attorney_details = $this->attorney_model->fetch($cond);
        $this->data['attorney_edt'] = $fetch_attorney_details;
        
        $cond = "AND user_seq_no='".$admin_id."'";
        $attorney_edt = $this->user_model->fetch($cond);
        
       // echo "<pre>";
        //print_r($this->data['attorney_edt']);
        //echo "</pre>";
        //die();
 // t($attorney);
        //////////fetch all firms//////////
        $row = $this->firm_model->fetch();
        $this->data['all_firms'] = $row;
//        t($this->data['all_firms'], 1);

 
        $sql = '';
        $sql = "SELECT attr.firm_seq_no,"
                . "attr.user_seq_no,attr.attorney_id,attr.attorney_code,attr.attorney_first_name,attr.attorney_last_name,"
                . "attr.attorney_dob,attr.attorney_gender,attr.address_seq_no,attr.attorney_education,attr.attorney_type,"
                . "attr.bar_registration_no,attr.practice_date,attr.firm_join_date,attr.full_part_time,attr.profile_photo,attr.web_bio_page_url,attr.attorney_jurisdiction"
                . ",attr.industry_type,attr.hourly_comp_cost,attr.benefit_factor,attr.overhead_amount,attr.billing_rate_opp_cost,attr.remarks_notes as att_remarks, "
                . "puser.user_id,puser.add_flage, puser.user_seq_no,puser.group_code,puser.designation, puser.approver, puser.user_approver_type" 
                . " FROM plma_attorney as attr "
                . "left JOIN plma_user as puser ON attr.user_seq_no = puser.user_seq_no "
                . "WHERE attr.attorney_seq_no=$code";
//        echo $sql;
        $res1 = $this->db->query($sql);
        $attorney = $res1->result_array();
     
      // echo $this->db->last_query();
       // t($attorney, 1);
       // exit;
        
        if (count($attorney) > 0) {

                $this->data['country_info'] = $this->fetch_country($attorney[0]['country']);
                $this->data['state_info'] = $this->fetch_state($attorney[0]['country'], $attorney[0]['state']);
                $this->data['county_info'] = $this->fetch_county($attorney[0]['country'], $attorney[0]['state'], $attorney[0]['county']);
                $this->data['city_info'] = $this->fetch_city($attorney[0]['country'], $attorney[0]['state'], $attorney[0]['county'], $attorney[0]['city']);
            }

        $year = explode('-', $attorney[0]['attorney_dob']);
        $this->data['year'] = $year;

        $this->data['attorney'] = $attorney[0];
        $this->data['att_code'] = $code;

        //for add contact phone number
        $phone_no = $fetch_attorney_details[0]['mobile'];
        $original_phone_no = $phone_no;
        $length = strlen($original_phone_no);
//        echo $length;die();
        if ($length == 10) {
            $add_contact_country_code = '';
        } else if ($length == 11) {
            $add_contact_country_code = substr($original_phone_no, 0, 1);
        } else if ($length == 12) {
            $add_contact_country_code = substr($original_phone_no, 0, 2);
        } else if ($length == 13) {
            $add_contact_country_code = substr($original_phone_no, 0, 3);
        } else if ($length == 14) {
            $add_contact_country_code = substr($original_phone_no, 0, 4);
        }
        else if ($length == 17) {
            $add_contact_country_code = substr($original_phone_no, 0, 3);
        }
        $add_contact_phone_number = substr($original_phone_no, -11);
        $this->data['country_code_3'] = $add_contact_country_code;
        $this->data['mobile'] = $add_contact_phone_number;
        
        $phone_no_1 = $fetch_attorney_details[0]['phone1'];
        $original_phone_no_1 = $phone_no_1;
        $length = strlen($original_phone_no_1);
//        echo $length;die();
        if ($length == 10) {
            $add_contact_country_code_1 = '';
        } else if ($length == 11) {
            $add_contact_country_code_1 = substr($original_phone_no_1, 0, 1);
        } else if ($length == 12) {
            $add_contact_country_code_1 = substr($original_phone_no_1, 0, 2);
        } else if ($length == 13) {
            $add_contact_country_code_1 = substr($original_phone_no_1, 0, 3);
        } else if ($length == 14) {
            $add_contact_country_code_1 = substr($original_phone_no_1, 0, 4);
        }
        else if ($length == 17) {
            $add_contact_country_code_1 = substr($original_phone_no_1, 0, 3);
        }
        $add_contact_phone_number_1 = substr($original_phone_no_1, -11);
        $this->data['country_code_1'] = $add_contact_country_code_1;
        $this->data['phone_1'] = $add_contact_phone_number_1;
        
        $phone_no_2 = $fetch_attorney_details[0]['phone2'];
        $original_phone_no_2 = $phone_no_2;
        $length = strlen($original_phone_no_2);
//        echo $length;die();
        if ($length == 10) {
            $add_contact_country_code_2 = '';
        } else if ($length == 11) {
            $add_contact_country_code_2 = substr($original_phone_no_2, 0, 1);
        } else if ($length == 12) {
            $add_contact_country_code_2 = substr($original_phone_no_2, 0, 2);
        } else if ($length == 13) {
            $add_contact_country_code_2 = substr($original_phone_no_2, 0, 3);
        } else if ($length == 14) {
            $add_contact_country_code_2 = substr($original_phone_no_2, 0, 4);
        }
        else if ($length == 17) {
            $add_contact_country_code_2 = substr($original_phone_no_2, 0, 3);
        }
        $add_contact_phone_number_2 = substr($original_phone_no_2, -11);
        $this->data['country_code_2'] = $add_contact_country_code_2;
        $this->data['phone_2'] = $add_contact_phone_number_2;
        
        $this->data['all_designations'] = $this->designation_model->fetch();
        $this->data['all_groups'] = $this->group_model->fetch();
        $this->get_include();
        if ($view != '') {
            $this->load->view($this->view_dir . 'operation_master/attorney/attorney_view', $this->data);
        } else {
            $this->load->view($this->view_dir . 'operation_master/attorney/edit', $this->data);
        }
        
    }

    function update_general_info($code = '') {

        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $this->data['firm_seq_no'];
        
        
        
        $code = base64_decode($code);
        $cond = " and attorney_seq_no = '" . $code . "'";
        $res_attorney = $this->attorney_model->fetch($cond);
//        $old_password = $res_attorney[0]['password'];
//        $old_salt = $res_attorney[0]['salt'];


        $edit_attorney_btn = $this->input->post('edit_attorney_btn_main');

        ///////////// Edit Address ///////////////////
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $phone = $this->removePhoneMask($phone);
        $mobile = $this->input->post('mobile');
        $mobile = $this->removePhoneMask($mobile);
        $fax = $this->input->post('fax');
        $fax = $this->removePhoneMask($fax);
        $web_url = $this->input->post('web_url');
        $social_url = $this->input->post('social_url');
        $addr_line_1 = $this->input->post('addr_line1');
        $addr_line_2 = $this->input->post('addr_line2');
        $addr_line_3 = $this->input->post('addr_line3');
        $country = $this->input->post('country');
        $state = $this->input->post('state');
        $city = $this->input->post('city');
        $postal_code = $this->input->post('postal_code');
        $data1 = array(
            'address_line1' => $addr_line_1,
            'address_line2' => $addr_line_2,
            'address_line3' => $addr_line_3,
            'city' => $city,
            'state' => $state,
            'postal_code' => $postal_code,
            'country' => $country,
            'email' => $email,
            'phone' => $phone,
            'fax' => $fax,
            'mobile_cell' => $mobile,
            'website_url' => $web_url,
            'social_media_url' => $social_url,
//                'remarks_notes' => $addr_remarks,
            'updated_by' => $admin_id,
            'updated_date' => time()
        );
//             echo "<pre>"; print_r($data1); exit;
        $editid2 = $this->address_model->edit_cond($data1, " address_seq_no = '" . $res_attorney[0]['address_seq_no'] . "' ");
//            echo $this->db->last_query(); exit;
        //when site admin add attorney
        if ($role_code == 'SITEADM') {
            $firm_seq_no = $this->input->post('firm_seq_no');
        }

        //when firm admin add attorney
        if ($role_code == 'FIRMADM') {
            $sql = "select pfirm.firm_seq_no from plma_firm pfirm where pfirm.firm_admin_seq_no=$admin_id";
            $res = $this->db->query($sql);
//                 echo $this->db->last_query(); exit;
            $row = $res->result_array();
            $firm_seq_no = $row[0]['firm_seq_no'];
        }
        ////////////////// Edit Users Details ////////////////////////
//        if ($role_code == 'FIRMADM') {
            $designation = $this->input->post('designation');
            $group = $this->input->post('group_code');
            $approver = ($this->input->post('approver[]')) ? '1' : '';
//            $approver_type = $this->input->post('user_approver_type');
//        }

        $attorney_id = $this->input->post('attorney_id');

        $password = $this->input->post('password1');
        if ($password) {
            $password = md5($password);
            $this->load->helper('string');
            $random = random_string('alnum', 16);
            $random1 = base64_encode($random);
            $final_password = $password . $random1;
        } else {
            $final_password = $old_password;
            $random         = $old_salt;
        }

        $attorney_code = $this->input->post('attorney_code');
        $attorney_first_name = $this->input->post('attorney_first_name');
        $attorney_last_name = $this->input->post('attorney_last_name');
        $attorney_gender = $this->input->post('attorney_gender');
        $attorney_type = $this->input->post('attorney_type');
        $attorney_education = $this->input->post('attorney_education');
        $bar_registration_no = $this->input->post('bar_registration_no');
        $practice_date = $this->input->post('practice_date');
        $firm_join_date = $this->input->post('firm_join_date');
        $full_part_time = $this->input->post('full_part_time');
        $attorney_jurisdiction = $this->input->post('attorney_jurisdiction');
        $hourly_comp_cost = $this->input->post('hourly_comp_cost');
        $hourly_comp_cost = $this->removecompMask($hourly_comp_cost);
        $industry_type = $this->input->post('industry_type');
        $benefit_factor = $this->input->post('benefit_factor');
        $overhead_amount = $this->input->post('overhead_amount');
        $overhead_amount = $this->removeovrMask($overhead_amount);
        $billing_rate_opp_cost = $this->input->post('billing_rate_opp_cost');
        $billing_rate_opp_cost = $this->removebilMask($billing_rate_opp_cost);
        $remarks = $this->input->post('remarks');
//            $user_seq_no = $this->input->post('user_seq_no');
//            $section = $this->input->post('section');

        $year = $this->input->post('year');
        $month = $this->input->post('month');
        $day = $this->input->post('day');
        $whole_date = array($day, $month, $year);
        $attorney_dob = implode("-", $whole_date);

        $profile_photo = $this->input->post('pre_photo');

        $image_field_name = 'profile_photo';

        if ($_FILES[$image_field_name]['name'] != "") {
            $this->load->library('mycommon');
            list($width, $height, $type, $attr) = getimagesize($_FILES[$image_field_name]['tmp_name']);
            $config['upload_path'] = $this->config->item('upload_path') . 'users/';
            $config['allowed_types'] = '*';
            $config['max_size'] = $this->config->item('max_size');

            $img_name = strtolower($_FILES[$image_field_name]["name"]);
            $img_name = preg_replace('/[^a-zA-Z0-9\.]/', "_", $img_name);

            $config['file_name'] = date("YmdHis") . rand(0, 9999999) . "_" . $img_name;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload($image_field_name)) {

                if ($code) {
                    unlink($config['upload_path'] . $profile_photo);
                    unlink($config['upload_path'] . '50X50_' . $profile_photo);
                    unlink($config['upload_path'] . '72X72_' . $profile_photo);
                    unlink($config['upload_path'] . '140X120_' . $profile_photo);
                }

                $data = array();
                $data = $this->upload->data();
                $data_field = array();
                $profile_photo = $data['file_name'];

                $this->load->library('resize');
                // Resize Image
                if ($data['is_image'] == 1) {
                    $source_image = $data['full_path'];
                    $file_path = $data['file_path'];

                    $resizeObj = new resize($source_image);
                    // Resize image for carddeck listing
                    $resizeObj->resizeImage(50, 50, 'exact');
                    $thumb_img_path = $file_path . 50 . "X" . 50 . "_" . $data['orig_name'];
                    $resizeObj->saveImage($thumb_img_path, 100);
//                            
                    $resizeObj->resizeImage(72, 72, 'crop');
                    $thumb_img_path = $file_path . 72 . "X" . 72 . "_" . $data['orig_name'];
                    $resizeObj->saveImage($thumb_img_path, 100);

                    // Crop image for home page slider
                    $resizeObj->resizeImage(140, 120, 'crop');
                    $thumb_img_path = $file_path . 140 . "X" . 120 . "_" . $data['orig_name'];
                    $resizeObj->saveImage($thumb_img_path, 100);
                }
            } else {
                echo $this->upload->display_errors();
                exit;
            }
        }
        if ($password) {
            $data_pass = array(
                'password' => $final_password,
                'salt' => $random
                    );
//            t($data_pass);
            $editid = $this->user_model->edit_cond($data_pass, "user_seq_no = '" . $res_attorney[0]['user_seq_no'] . "'");
//           echo $this->db->last_query(); exit; 
        }

        //if ($role_code == 'FIRMADM') {
            $data_user = array(
                'designation' => $designation,
                'group_code' => $group,
                'approver' => $approver,
                'gender' => $attorney_gender,
//                'user_approver_type' => $approver_type,
                'profile_photo' => $profile_photo,
                'updated_by' => $admin_id,
                'updated_date' => time()
            );
//        } else {
//            $data_user = array(
//                'gender' => $attorney_gender,
//                'profile_photo' => $profile_photo,
//                'updated_by' => $admin_id,
//                'updated_date' => time()
//            );
//        }
//            t($data_user); exit;
        $editid = $this->user_model->edit_cond($data_user, "user_seq_no = '" . $res_attorney[0]['user_seq_no'] . "' ");
//            echo $this->db->last_query();
//            exit;

        $data2 = array(
//                'firm_seq_no' => $firm_seq_no,
            'address_seq_no' => $res_attorney[0]['address_seq_no'],
            'attorney_id' => $attorney_id,
            'attorney_code' => $attorney_code,
            'attorney_first_name' => $attorney_first_name,
            'attorney_last_name' => $attorney_last_name,
            'attorney_dob' => $attorney_dob,
            'attorney_gender' => $attorney_gender,
            'attorney_type' => $attorney_type,
            'attorney_education' => $attorney_education,
            'bar_registration_no' => $bar_registration_no,
            'practice_date' => $practice_date,
            'firm_join_date' => $firm_join_date,
            'full_part_time' => $full_part_time,
            'attorney_jurisdiction' => $attorney_jurisdiction,
            'hourly_comp_cost' => $hourly_comp_cost,
            'industry_type' => $industry_type,
            'benefit_factor' => $benefit_factor,
            'overhead_amount' => $overhead_amount,
            'billing_rate_opp_cost' => $billing_rate_opp_cost,
            'remarks_notes' => $remarks,
            'profile_photo' => $profile_photo,
            'updated_by' => $admin_id,
            'updated_date' => time()
        );
//        t($data2); exit;
        //echo $code; exit;
        $insertid2 = $this->attorney_model->edit_cond($data2, " attorney_seq_no = '" . $code . "'");
//        echo $this->db->last_query(); exit;
        if ($insertid2) {

            $data = array(
//               'firm_sgsec_seq_no' => $section,
                'updated_by' => $admin_id,
                'updated_date' => time()
            );
            $this->load->model('attorney_sec_model');
            $this->attorney_sec_model->edit_cond($data, " attorney_seq_no = '" . $code . "'");

            $msg = 'Attorney updated successfully';
            $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
            redirect($base_url . 'attorney/edit/' . base64_encode($code));
        } else {
            $msg = 'Error in updating attorney';
            $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
            redirect($base_url . 'attorney/edit/' . base64_encode($code));
        }
    }

    function user_id_check() {

        $user_id = $this->input->post('user_id');

        if ($user_id != '') {
            $cond = " and user_id = '" . $user_id . "'";
            $row = $this->app_users_model->fetch($cond);
//            echo $this->db->last_query();
            $this->data['user_id'] = $row;
//            t($row, 1);
            $row_1 = count($this->data['user_id']);
            if ($row_1 > 0) {
                echo 'false';
            } else {
                echo 'true';
            }
        }
    }

    function edit_id_check() {
        $user_id = $this->input->post('user_id');
        $orig_user_id = $this->input->post('original_user_id');
        if ($user_id != '') {
            if ((!isset($orig_user_id) && $orig_user_id != '') || $user_id == $orig_user_id) {
                echo 'true';
            } else {
                $cond = " and user_id = '" . $user_id . "'";
                $row = $this->app_users_model->fetch($cond);
//            echo $this->db->last_query();
                $this->data['user_id'] = $row;
                $row_1 = count($this->data['user_id']);
                if ($row_1 > 0) {
                    echo 'false';
                } else {
                    echo 'true';
                }
            }
        }
    }

    function add_attorney_manager() {

        $save_mgr_att = $this->input->post('save_mgr_att');
        if (isset($save_mgr_att)) {

//            $admin_all_session = $this->session->userdata('admin_session');
            $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

            $user_seq_no_amg1 = $this->input->post('attorney_seq_no');
            $attorney_manager = $this->input->post('attorney_manager');
            $remarks_amg = $this->input->post('remarks_amg');
            $data2 = array(
                'attorney_seq_no' => base64_decode($user_seq_no_amg1),
                'mgr_attorney_seq_no' => $attorney_manager,
                'remarks_notes' => $remarks_amg,
                'created_by' => $admin_id,
                'created_date' => time()
            );

            $insertid2 = $this->attorney_rpt_model->add($data2);
            //echo $this->db->last_query(); exit;
            if ($insertid2) {
                $msg = 'Attorney manager edited successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney/edit/' . $this->input->post('attorney_seq_no'));
            } else {
                $msg = 'Error in editing attorney manager';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney/edit/' . $this->input->post('attorney_seq_no'));
            }
        }
    }

    function edit_attorney_manager($code = '') {

        $code = base64_decode($code);
        $cond = " and art_relation_seq_no = '" . $code . "'";
        $row = $this->attorney_rpt_model->fetch($cond);
//        echo $this->db->last_query(); exit;

        $save_mgr_att = $this->input->post('edit_mgr_att');
        if (isset($save_mgr_att)) {
//            echo "ok"; die();

//            $admin_all_session = $this->session->userdata('admin_session');
          $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

            $user_seq_no_amg1 = $this->input->post('attorney_seq_no');
            $attorney_manager = $this->input->post('mgr_attorney_manager');
            $remarks_amg = $this->input->post('remarks_amg');
            $data2 = array(
                'attorney_seq_no' => base64_decode($user_seq_no_amg1),
                'mgr_attorney_seq_no' => $attorney_manager,
                'remarks_notes' => $remarks_amg,
                'updated_by' => $admin_id,
                'updated_date' => time()
            );

            $insertid2 = $this->attorney_rpt_model->edit($data2, $code);
//            echo $this->db->last_query(); exit;
            if ($insertid2) {
                $msg = 'Attorney manager edited successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney/edit/' . $this->input->post('attorney_seq_no'));
            } else {
                $msg = 'Error in editing attorney manager';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney/edit/' . $this->input->post('attorney_seq_no'));
            }
        }
    }

    function add_attorney_strategy_group() {
        $save_sg_att = $this->input->post('save_sg_att');
        if (isset($save_sg_att)) {

//            $admin_all_session = $this->session->userdata('admin_session');
            $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

            $attorney_seq_no = $this->input->post('attorney_seq_no');
            $firm_sgsec_seq_no = $this->input->post('firm_sgsec_seq_no');
            $remarks_sg = $this->input->post('remarks_sg');
            $data2 = array(
                'attorney_seq_no' => base64_decode($attorney_seq_no),
                'firm_sgsec_seq_no' => $firm_sgsec_seq_no,
                'remarks_notes' => $remarks_sg,
                'created_by' => $admin_id,
                'created_date' => time()
            );

            $insertid2 = $this->attorney_sg_model->add($data2);
            //echo $this->db->last_query(); exit;
            if ($insertid2) {
                $msg = 'Attorney strategy sgroup added successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney/edit/' . $this->input->post('attorney_seq_no'));
            } else {
                $msg = 'Error in adding attorney strategy sgroup';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney/edit/' . $this->input->post('attorney_seq_no'));
            }
        }
    }

    function edit_attorney_strategy_group($code = '') {
        $code = base64_decode($code);

        $cond = " and asg_relation_seq_no = '" . $code . "'";
        $row = $this->attorney_sg_model->fetch($cond);

//         echo $this->db->last_query(); exit;
        $save_sg_att = $this->input->post('save_sg_att_edit');
        if (isset($save_sg_att)) {

//            $admin_all_session = $this->session->userdata('admin_session');
            $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

            $attorney_seq_no = $this->input->post('attorney_seq_no');
            $firm_sgsec_seq_no = $this->input->post('firm_sgsec_seq_no');
            $remarks_sg = $this->input->post('remarks_sg');
            $data2 = array(
                'attorney_seq_no' => base64_decode($attorney_seq_no),
                'firm_sgsec_seq_no' => $firm_sgsec_seq_no,
                'remarks_notes' => $remarks_sg,
                'created_by' => $admin_id,
                'created_date' => time()
            );
//                echo "<pre>"; print_r($data2); exit;
            $insertid2 = $this->attorney_sg_model->edit($data2, $code);
//            echo $this->db->last_query(); exit;
            if ($insertid2) {
                $msg = 'Attorney strategy sgroup edited successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney/edit/' . $this->input->post('attorney_seq_no'));
            } else {
                $msg = 'Error in editing attorney strategy sgroup';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney/edit/' . $this->input->post('attorney_seq_no'));
            }
        }
    }

    function add_attorney_section() {
        $save_sec_att = $this->input->post('save_sec_att');
        if (isset($save_sec_att)) {

//            $admin_all_session = $this->session->userdata('admin_session');
           $admin_id  =  $this->data['admin_id'];
           $role_code = $this->data['role_code'];

            $attorney_seq_no = $this->input->post('attorney_seq_no');
            $firm_sgsec_seq_no = $this->input->post('firm_sgsec_seq_no');
            $remarks_sec = $this->input->post('remarks_sec');
            $data2 = array(
                'attorney_seq_no' => base64_decode($attorney_seq_no),
                'firm_sgsec_seq_no' => $firm_sgsec_seq_no,
                'remarks_notes' => $remarks_sec,
                'created_by' => $admin_id,
                'created_date' => time()
            );

            $insertid2 = $this->attorney_sec_model->add($data2);
            //echo $this->db->last_query(); exit;
            if ($insertid2) {
                $msg = 'Attorney section added successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney/edit/' . $this->input->post('attorney_seq_no'));
            } else {
                $msg = 'Error in adding attorney section';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney/edit/' . $this->input->post('attorney_seq_no'));
            }
        }
    }

    function edit_attorney_section($code = '') {

        $code = base64_decode($code);

        $cond = " and asec_relation_seq_no = '" . $code . "'";
        $row = $this->attorney_sec_model->fetch($cond);

//         echo $this->db->last_query(); exit;
        $save_sec_att = $this->input->post('save_sec_att');
        if (isset($save_sec_att)) {

//            $admin_all_session = $this->session->userdata('admin_session');
            $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

            $attorney_seq_no = $this->input->post('attorney_seq_no');
            $firm_sgsec_seq_no = $this->input->post('firm_sgsec_seq_no');
            $remarks_sec = $this->input->post('remarks_sec');
            $data2 = array(
                'attorney_seq_no' => base64_decode($attorney_seq_no),
                'firm_sgsec_seq_no' => $firm_sgsec_seq_no,
                'remarks_notes' => $remarks_sec,
                'created_by' => $admin_id,
                'created_date' => time()
            );
            //echo "<pre>"; print_r($data2); exit;
            $insertid2 = $this->attorney_sec_model->edit($data2, $code);
            //echo $this->db->last_query(); exit;
            if ($insertid2) {
                $msg = 'Attorney section edited successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney/edit/' . $this->input->post('attorney_seq_no'));
            } else {
                $msg = 'Error in editing attorney section';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney/edit/' . $this->input->post('attorney_seq_no'));
            }
        }
    } 

    function is_attorney_exist() {

        $email = $this->input->post('email');
        $email2 = $this->input->post('original_email');

        if ($email != '') {
            if ((!isset($email2) && $email2 != '') || $email == $email2) {
                echo 'true';
            } else {
                $sql = "select * FROM plma_address pa where pa.email = '" . $email . "'";
                $res = $this->db->query($sql);
                $row = count($res->result());
                if ($row > 0) {
                    echo 'false';
                } else {
                    echo 'true';
                }
            }
        }
    }

    function delete($code = '') {
       $this->db->select('user_seq_no')->from('plma_attorney')->where('attorney_seq_no',base64_decode($code));
       $attorney_details = $this->db->get()->result_array();
       
       $this->db->select('COUNT(*) as total_count')->from('plma_module2')->where('admin_id',base64_decode($attorney_details[0]['user_seq_no']));
       $result = $this->db->get()->result_array();
       
       if($result[0]['total_count'] > 0) {
        $this->session->set_flashdata('suc_message', 'This call user can not be deleted');
       }
       else {
        
        $this->db->delete('plma_user', array('user_seq_no' => $attorney_details[0]['user_seq_no'])); 
        $this->db->delete('plma_attorney', array('attorney_seq_no' => base64_decode($code))); 
        $this->session->set_flashdata('suc_message', 'Call user successfully deleted');
       }

       redirect($base_url . 'attorney/');
    }

    function fetch_country($selected = '') {

        $cond = "order by country_id='US' desc";
        $return = $this->country_model->fetch($cond);
        $array1 = array();
        $opt = '<option value="">Country</option>'; //<option value="">Country</option>
        foreach ($return as $key => $value) {
            if ($value['country_seq_no'] == $selected) {
                $opt .= '<option value="' . $value['country_seq_no'] . '" selected="selected">' . $value['name'] . '</option>';
            } else {
                $opt .= '<option value="' . $value['country_seq_no'] . '" >' . $value['name'] . '</option>';
            }
        }
//        echo 123; exit;
//        t($opt); exit;
        return $opt;
    }

    function fetch_state($country_id = '', $selected = '') {

        if ($country_id == '') {
            $country_id = $this->input->post('country_id');
        }

        $cond = " and country_seq_no = '" . $country_id . "'";
        $return = $this->states_model->fetch($cond);
        $array1 = array();
        $opt = ''; //<option value="">State</option>
        foreach ($return as $key => $value) {
            if ($value['state_seq_no'] == $selected) {
                $opt .= '<option value="' . $value['state_seq_no'] . '" selected="selected">' . $value['state_name'] . '</option>';
            } else {
                $opt .= '<option value="' . $value['state_seq_no'] . '" >' . $value['state_name'] . '</option>';
            }
        }
//        echo 123; exit;
//        t($opt); exit;
        return $opt;
    }

    function fetch_county($country_id = '', $state_id = '', $selected = '') {
//        echo 123; exit;
        if ($country_id == '') {
            $country_id = $this->input->post('country_id');
        }
        if ($state_id == '') {
            $state_id = $this->input->post('state_id');
        }
        $cond = " and country_seq_no = '" . $country_id . "' and state_seq_no = '" . $state_id . "'";
        $return = $this->county_model->fetch($cond);
        $opt = ''; //<option value="">County</option>
        foreach ($return as $key => $value) {
            if ($value['county_seq_no'] == $selected) {
                $opt .= '<option value="' . $value['county_seq_no'] . '" selected="selected">' . $value['county_name'] . '</option>';
            } else {
                $opt .= '<option value="' . $value['county_seq_no'] . '" >' . $value['county_name'] . '</option>';
            }
        }
        $cond2 = " and country_seq_no = '" . $country_id . "' and state_seq_no = '" . $state_id . "' "; //and county_seq_no = '".$value['county_seq_no']."'
        $return2 = $this->city_model->fetch($cond2);
        foreach ($return2 as $key => $value) {
            if ($value['city_seq_no'] == $selected) {
                $opt2 .= '<option value="' . $value['city_seq_no'] . '" selected="selected">' . $value['city_name'] . '</option>';
            } else {
                $opt .= '<option value="' . $value['city_seq_no'] . '" >' . $value['city_name'] . '</option>';
            }
        }

        $a = array(
            'county' => $opt,
            'city' => $opt2
        );
//            echo 123; exit;
//            t($a); exit;
        return $a;
    }

    function fetch_city($country_id = '', $state_id = '', $county_seq_no = '', $selected = '') {
        if ($country_id == '') {
            $country_id = $this->input->post('country_id');
        }
        if ($state_id == '') {
            $state_id = $this->input->post('state_id');
        }
        if ($county_seq_no == '') {
            $county_seq_no = $this->input->post('county_seq_no');
        }

        $cond = " and country_seq_no = '" . $country_id . "' and state_seq_no = '" . $state_id . "'";
        $return = $this->city_model->fetch($cond);
        $opt = ''; //<option value="">City/Town</option>
        foreach ($return as $key => $value) {
            if ($value['city_seq_no'] == $selected) {
                $opt .= '<option value="' . $value['city_seq_no'] . '" selected="selected">' . $value['city_name'] . '</option>';
            } else {
                $opt .= '<option value="' . $value['city_seq_no'] . '" >' . $value['city_name'] . '</option>';
            }
        }
//        t($opt); exit;
        return $opt;
    }

    function getFirmSections($firm_seq_no) {

        $firm_seq_no = $this->input->post('firm_seq_no');
        $cond = " AND firm_seq_no=$firm_seq_no";
        $return = $this->section_model->fetch($cond);

        $array1 = array();
        $opt = '<option value="">Select Section</option>';
        foreach ($return as $key => $value) {
            $opt .= '<option value="' . $value['firm_section_seq_no'] . '" >' . $value['section_name'] . '</option>';
        }

        echo $opt;
    }

    function remove_managingPartner(){
            $admin_id = $this->data['admin_id'];
            $role_code = $this->data['role_code'];
            
            $designation = $this->input->post('designation'); 
            $section = $this->input->post('section');
            $txt = "";
            if($role_code == 'SITEADM'){
                
                $firm_seq_no = $this->input->post('firm_seq_no');
                
                if($designation == 'MP'){
                   $sql_designation_check = "SELECT frm.*, usr.designation, usr.user_seq_no FROM plma_firm as frm "
                         . "INNER JOIN plma_user as usr on frm.firm_admin_seq_no = usr.user_seq_no "
                         . "WHERE frm.firm_seq_no = '" . $firm_seq_no . "' AND usr.designation = '" . $designation . "'";
                   // $txt = "A firm cannot have more than one managing partner.";
                  
                } else if($designation == 'SECH'){
                  $sql_designation_check = "SELECT att.*, usr.designation, usr.user_seq_no, frm.firm_seq_no, frm.firm_admin_seq_no, frm.firm_name "
                        . "FROM plma_attorney att "
                        . "INNER JOIN plma_user usr ON att.user_seq_no=usr.user_seq_no "
                        . "INNER JOIN plma_firm frm ON att.firm_seq_no=frm.firm_seq_no "
                        . "INNER JOIN plma_attorney_sec asec ON att.attorney_seq_no=asec.attorney_seq_no "
                        . "WHERE frm.firm_seq_no = '" . $firm_seq_no . "' AND asec.firm_sgsec_seq_no= '" . $section . "' AND usr.designation = '" . $designation . "'"; 
                  // $txt = "This section already has a section head";
                  
                }
                 $res_designation_check = $this->db->query($sql_designation_check);
                // echo $this->db->last_query();
                 $row_designation_check = $res_designation_check->result_array();
                // t($row_designation_check); 
                // exit;
                 if(count($row_designation_check)> 0){
                     $resp = 'FALSE';
                 }else{
                     $resp = 'TRUE';
                 }
                 echo json_encode(array('resp'=>$resp));
                 exit;
            } 
            else if($role_code == 'FIRMADM'){
//                
              $firm_seq_no = $this->data['firm_seq_no']; 
//              
//              if($designation == 'MP'){
                   $sql_designation_check = "SELECT frm.*, usr.designation, usr.user_seq_no FROM plma_firm as frm "
                         . "INNER JOIN plma_user as usr on frm.firm_admin_seq_no = usr.user_seq_no "
                         . "WHERE frm.firm_seq_no = '" . $firm_seq_no . "' AND usr.designation = '" . $designation . "'";
                   // $txt = "A firm cannot have more than one managing partner.";
                  
                } else if($designation == 'SECH'){
                  $sql_designation_check = "SELECT att.*, usr.designation, usr.user_seq_no, frm.firm_seq_no, frm.firm_admin_seq_no, frm.firm_name "
                        . "FROM plma_attorney att "
                        . "INNER JOIN plma_user usr ON att.user_seq_no=usr.user_seq_no "
                        . "INNER JOIN plma_firm frm ON att.firm_seq_no=frm.firm_seq_no "
                        . "INNER JOIN plma_attorney_sec asec ON att.attorney_seq_no=asec.attorney_seq_no "
                        . "WHERE frm.firm_seq_no = '" . $firm_seq_no . "' AND asec.firm_sgsec_seq_no= '" . $section . "' AND usr.designation = '" . $designation . "'"; 
                  // $txt = "This section already has a section head";
                  
                }
                 $res_designation_check = $this->db->query($sql_designation_check);
//                 echo $this->db->last_query();
                 $row_designation_check = $res_designation_check->result_array();
//                 t($row_designation_check); 
//                 exit;
                 if(count($row_designation_check)> 0){
                     $resp = 'FALSE';
                 }else{
                     $resp = 'TRUE';
                 }
                 echo json_encode(array('resp'=>$resp,'msg'=>$txt));

        }
         function meeting_appointment()
         {
             $this->get_include();
             $this->load->view($this->view_dir . 'operation_master/meeting/listing', $this->data);
         }

         function d1_employee_list() {
            $admin_all_session = $this->session->userdata('admin_session_data');
            $this->db->select('plma_attorney.*,plma_user.assign_to')->from('plma_attorney')
            ->join('plma_user','plma_user.user_seq_no = plma_attorney.user_seq_no','INNER')
            ->where('plma_user.assign_to <>',NULL);
            $employee_list = $this->db->get()->result_array();
            $rows = array();

            foreach ($employee_list as  $value) {
                $assign_to = explode(",", $value['assign_to']);
                if(in_array($admin_all_session['firm_seq_no'], $assign_to)) {
                    $rows[] = $value;
                }
            }

            $this->data['employee_list'] = $rows;
            if ($role_code == 'SITEADM') {
                $select = "firm_seq_no,firm_name";
                $this->data['firms'] = $this->firm_model->fetch('', $select);
            }

            $this->data['attorneys'] = $row;

            if ($admin_all_session['firm_seq_no'] != '') {
                $cond = " and firm_seq_no = '" . $admin_all_session['firm_seq_no'] . "'";
                
                $this->data['managelist'] = $this->managelist_model->fetch($cond);
            }
            $this->get_include();
            $this->load->view($this->view_dir . 'operation_master/attorney/emp_listing',$this->data);
         }
}
