<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller
{

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

		// send message details
        $message = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'subject' => $this->input->post('subject'),
            'message' => $this->input->post('message')
        ];

        // save message in database as unread message
        if($this->messages->insert($message) == false) {
            $this->session->set_flashdata('contact_form_danger', 'Something went wrong when tring to connect to database please try again later.');
            return $this->load->view('home', $error);
        }

        // email message (html)
        $message_html = "
            <br/>Name : {$message['name']}
            <br/>Email: <a href=\"mailto:{$message['email']}\">{$message['email']}</a>
            <br/><br/><hr/><br/>
            {$message['message']}
            <br/><br/><br/>
            <a href=\"".base_url('messages/' . $this->db->insert_id())."\">View message in portfilio</a>";

        // send message to Developer email address
        $email_data = [
            'from' => $this->input->post('email'),
            'to' => $this->developer::EMAIL,
            'name' => $this->input->post('name'),
            'subject' => $this->input->post('subject'),
            'message' => $message_html
        ];

        // send mail to developer email account
        if($this->mail->send($email_data) == false) {
            $this->session->set_flashdata('contact_form_warning', 'Message failed to send to my email inbox I will check your message if I view my website dashboard.');
            redirect('#contact');
        }
        
        $this->session->set_flashdata('contact_form_success', 'Message has been successfully sent to my email inbox I will get back to you as soon as possible.');
        redirect('#contact');
	}
}
