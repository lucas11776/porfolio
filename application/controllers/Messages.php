<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller
{

    /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://website/messages
	 */
    public function index()
    {
        $page = [
            'messages' => $this->messages->get(),
            'active' => 'all' // active link
        ];
        $this->load->view('messages', $page);
    }

    /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://website/messages/unread
	 */
    public function unread()
    {
        $page = [
            'messages' => $this->messages->get(['seen' => 0]),
            'active' => 'unread' // active link
        ];
        $this->load->view('messages', $page);
    }

    /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://website/messages/read
	 */
    public function read()
    {
        $page = [
            'messages' => $this->messages->get(['seen' => 1]),
            'active' => 'read' // active link
        ];
        $this->load->view('messages', $page);
    }

    /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://website/messages/(:id)
	 */
    public function single($id)
    {
        $page = [
            'message' => $this->messages->get(['message_id' => $id])[0] ?? [],
            'active' => ''
        ];

        // check if message exist if not redirect to message route
        if(count($page['message']) == 0)
            redirect('messages');

        // check if message if seen if not mark message as seen
        if($page['message']['seen'] == 0)
            $this->messages->mark_as_read($page['message']['message_id']);
            

        $this->load->view('single_message', $page);
    }

    /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://website/messages/delete
	 */
    public function delete()
    {
        $id = is_numeric($this->input->post('id')) ? $this->input->post('id') : NULL;

        if(is_null($id))
        {
            $this->session->set_flashdata('message_error', 'Invalid message id type of id message be integer');
            redirect($this->input->post('redirect'));
        }
        
        // delete message
        if($this->messages->delete($id) == false)
            // error message
            $this->session->set_flashdata('message_error', 'Something went wrong when tring to connect to database.');
        else
            // success message
            $this->session->set_flashdata('message_success', 'Message was successfully detele.');

        redirect($this->input->post('redirect'));
    }
}
