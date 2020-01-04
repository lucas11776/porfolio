<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://website/contact
	 */
	public function index()
	{
		$this->form_validation->set_rules('name', 'name', 'required|min_length[3]|max_length[20]');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('subject', 'subject', 'required|min_length[10]|max_length[50]');
		$this->form_validation->set_rules('message', 'message', 'required|min_length[10]|max_length[500]');

		if($this->form_validation->run() == false) {
			return $this->load->view('home');
		}

        $message = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'subject' => $this->input->post('subject'),
            'message' => $this->input->post('message')
        ];

        // store message in database as unread message
        if($this->messages->insert($message)) {
            $error = ['error' => 'Something went wrong when tring to connect to database please try again later.'];
            return $this->load->view('home', $error);
        }

        // send message to Developer email address
        if(false) {
            $error = ['warning' => 'Message failed to send in my email inbox I will check your message if I view my website dashboard.'];
            return $this->load->view('home', $error);
        }
        
        $success = ['success' => 'Message has been successfully sent to my email inbox.'];
        return $this->load->view('home', $success);
	}
}
