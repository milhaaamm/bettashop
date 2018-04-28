<?php
defined('BASEPATH') OR exit('No direct script allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		if($this->session->get_userdata('logged'))
			$this->load->view('dashboard_view');
		else
			redirect(site_url('login'));
	}

}
?>