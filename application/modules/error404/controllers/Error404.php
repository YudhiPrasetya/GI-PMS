<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Error404 extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->output->set_status_header('404');
		$this->load->view('404_not_found');
	}
}
