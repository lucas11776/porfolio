<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

    /**
     * User Account
     * 
     * @var array
     */
    private $account = [];

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://website/login
	 */
    public function index()
    {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if($this->form_validation->run() == false) {
            return $this->load->view('login');
        }

        // $this->session->set_userdata('uid', $this->account['uid']);

        // redirect('dashboard');
    }
    

    /**
     * Check if email address exist in database
     * 
     * @param string $email
     * @return boolean
     */
    public function email_exist(string $email)
    {

    }

}
