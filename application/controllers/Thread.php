<?php
defined('BASEPATH') OR exit('No direct script allowed');

class Dashboard extends CI_Controller
{
	public function index()
	{
		redirect(site_url('Dashboard/threads'));
	}
}
?>