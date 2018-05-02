<?php
defined('BASEPATH') OR exit('No direct script allowed');

class Logout extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		$this->session->set_userdata('logged',0);
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		redirect(base_url());
	}
}
?>