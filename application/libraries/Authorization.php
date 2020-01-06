<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authorization
{
    /**
     * CodeIgniter super-object
     * 
     * @var object
     */
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('session');
        $this->CI->load->helper('url');
    }

    /**
     * Check if user is logged in
     * 
     * @return boolean
     */
    public function loggedin(bool $protect = TRUE)
    {
        $loggedin = is_null($this->CI->session->userdata('user_id')) ? false : true;
        $redirect_url = uri_string() == '' ? '' : '?redirect=' . uri_string();
        
        if($protect && $loggedin == false)
            redirect('login' . $redirect_url);

        return $loggedin;
    }

    /**
     * Check if user loggedout
     * 
     * @return boolean
     */
    public function loggedout(bool $protect = TRUE)
    {
        $loggedout = $this->loggedin(false) == false;
        
        if($protect && $loggedout == false)
            redirect('');

        return $loggedout;
    }
}