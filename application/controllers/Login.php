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
        $this->auth->loggedout();

        $this->form_validation->set_rules('email', 'email', 'required|callback_email_exist');
        $this->form_validation->set_rules('password', 'password', 'required');

        if($this->form_validation->run() == false)
            return $this->load->view('login');

        // decrypt account password
        $decrypted_password = $this->encryption->decrypt($this->account['password']);
        $user_password = $this->input->post('password');

        // check if password match account password
        if($decrypted_password != $user_password)
        {
            $this->session->set_flashdata('login_error', 'Invalid login creaditials please enter correct login credatials.');
            return $this->load->view('login');
        }

        // store user data in session
        $this->session->set_userdata([
            'user_id' => $this->account['user_id']
        ]);

        // redirect to uread message page
        redirect($this->input->post('redirect') ? $this->input->post('redirect') : 'messages/unread');
    }
    

    /**
     * Check if email address exist in database
     * 
     * @param string $email
     * @return boolean
     */
    public function email_exist(string $email)
    {
        $this->account = $this->accounts->get_account($email);
        
        if(count($this->account) == 0)
            $this->form_validation->set_message('email_exist', 'The {field} deos not exist in database.');

        return count($this->account) == 0 ? false : true;
    }

}
