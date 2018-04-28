<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('dashboard_view');
	}

	public function logout()
	{
		redirect(base_url());
	}
}
?>