<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
$dir = str_replace('controllers', '', __DIR__);

require $dir . 'third_party/twilio/twilio-php-master/Twilio/autoload.php';

require $dir . 'third_party/PHPMailer-master/PHPMailerAutoload.php';

use Twilio\Rest\Client;

class Twilio extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('targets_model');
    }

    function index() {
        //$this->data['error'] = "";
        $this->load->view('twilio');
    }

    function test() {
        try {
            $checked_ids = $this->input->post('checked_ids');

            foreach ($checked_ids as $key => $value) {
                $cond = " AND target_seq_no=$value AND status=1";
                $fetch_contact_details = $this->targets_model->fetch($cond);
                
                $name = $fetch_contact_details[0]['target_first_name'];

                $to_email = trim($fetch_contact_details[0]['email']);
                
                $phone_number = $fetch_contact_details[0]['phone'];
                $msg = str_replace(' ', '', rtrim($phone_number, ','));
                $msg1 = str_replace(array('(', ')'), '', $msg);
                $msg2 = str_replace(["-", "–"], '', $msg1);

                $total_no = substr($msg2, -10);
                
                $this->load->library('ciqrcode');
                $params['data'] = $value;
                $params['level'] = 'H';
                $params['size'] = 10;
                $params['savename'] = FCPATH . 'assets/upload/qr_code/' . $value . '.png';
                $this->ciqrcode->generate($params);
                
                
               if ($total_no != "+440") {
                   $sid = 'AC5d9552692b97e1fc3159975fe5eba8a6';
                   $token = '3a986cf91d8a436982fb98f72cc75e9e';
                   $client = new Client($sid, $token);
                   $send = $client->messages->create(
                           // the number you'd like to send the message to
                           '+44' . $total_no, array(
                       // A Twilio phone number you purchased at twilio.com/console
                       'from' => '+441244470576',
                       // the body of the text message you'd like to send
                       'body' => "Hi $name,
WELCOME TO ROCKSTAR WEALTH BOOTCAMP!

Confirming that you are registered to come on Saturday, 1st of July.

TIME:     9am (Registration)
9.30am - 5.30pm

VENUE: London Excel,
South Galleries,
Royal Victoria Dock,
1 Western Gateway,
London E16 1XL
                                      
Please show the QR code at the entrace.

Any problem, or to change the day of attendance please email admin@rshi.co 

Or call our office on 0203 283 8585

Please click on the below link to get QR code." . '<a href="http://www.digital1crm.com/assets/upload/qr_code/' . $value . '.png" target="_blank">'
                           )
                   );
               }
               
                }
               echo "1";  
            }

            
            catch (Exception $e) {
            echo "0";
        }
        } 
    

    public function genqrcode($vendor_id = '1') {
        $mail = new PHPMailer;
        $mail->CharSet = 'UTF-8';
        $mail->IsSMTP();
        $mail->Host = 'tls://smtp.office365.com';
        $mail->Port = '587';
        $mail->SMTPAuth = true;
        $mail->Username = 'admin@rshi.co';
        $mail->Password = 'RSHI62006200!!';
        $mail->SMTPSecure = 'tls';


        $mail->From = 'admin@rshi.co';
        $mail->FromName = 'RSHI';
        $mail->IsHTML(true);
        $mail->Subject = "Test Email";
        $mail->Body = "Test BODY";
        $mail->addAddress('manomit@wrctechnologies.com');
        $mail->AltBody = strip_tags($mail->Body);
        if (!$mail->Send()) {
            print($mail->ErrorInfo);
        }
        else {
            echo "Send";
        }
    }

}
