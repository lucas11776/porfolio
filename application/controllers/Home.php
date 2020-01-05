<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	
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
		$this->load->view('home');	
	}
}
