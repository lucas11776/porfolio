<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mail_model extends CI_Model
{

    /**
     * initialize email Gmail creditails
     */
    public function __construct()
    {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => $this->developer::EMAIL,           // email address
            'smtp_pass' => $this->developer::EMAIL_PASSWORD,  // email password
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );
        
        # initialize
        $this->email->initialize($config);
    }


    public function send(array $data)
    {
        $this->email->set_newline("\r\n");
        $this->email->from($data['from'], $data['name'] ?? '');
        $this->email->to($data['to']);
        $this->email->subject($data['subject']);
        $this->email->message($data['message']);

        # send email
        $mail_sent = $this->email->send();

        # email error (debugging)
        #show_error($this->email->print_debugger());

        return $mail_sent;
    }
}