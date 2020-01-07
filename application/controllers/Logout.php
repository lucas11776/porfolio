<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller
{

    /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://website/contact
	 */
    public function index()
    {
        $this->session->unset_userdata('user_id');
        redirect('');
    }

}