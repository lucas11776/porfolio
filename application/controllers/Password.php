<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller
{

    /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://website/generate/password
	 */
    public function generate()
    {
        $page = [
            'encrypt_password' => is_null($this->input->post('password')) ? '' : $this->encryption->encrypt($this->input->post('password'))
        ];
        $this->load->view('password_generate', $page);
    }
}