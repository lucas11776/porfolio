<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller
{

    /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://website/dashboard
	 */
    public function index()
    {
        $page = [
            'messages' => $this->messages->get(),
            'active' => 'all'
        ];
        $this->load->view('messages', $page);
    }

    /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://website/dashboard/unread
	 */
    public function unread()
    {
        $page = [
            'messages' => $this->messages->get(['seen' => 0]),
            'active' => 'unread'
        ];
        $this->load->view('messages', $page);
    }

    /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://website/dashboard/read
	 */
    public function read()
    {
        $page = [
            'messages' => $this->messages->get(['seen' => 1]),
            'active' => 'read'
        ];
        $this->load->view('messages', $page);
    }

}
