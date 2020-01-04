<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://website/
	 *	- or -
	 * 		http://website/home
	 */
	public function index()
	{
		$this->form_validation->set_rules('name', 'name', 'required|min_lenght[3]|max_lenght[20]');
		$this->from_validation->set_rules('email', 'email', 'required|email_valid');
		$this->from_validation->set_rules('subject', 'subject', 'required|min_lenght[10]|max_lenght[50]');
		$this->from_validation->set_rules('message', 'message', 'required|min_lenght[10]|max_lenght[500]');

		if($this->form_validation->run() == false) {
			$this->load->view('home');
		}

		// store message in database as unread message

		// send message to 
		
	}
}
