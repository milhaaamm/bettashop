<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		redirect(site_url('Dashboard/threads'));
	}

	public function listthread()
	{
		$this->load->model('Thread_Model');
		$idcategory = $this->uri->segment('3');
		$categorydata['records'] = $this->Thread_Model->get_list_by_id($idcategory);
		$data['activetab'] = 'threads';
		$this->load->view('template/dashboard_header');
		$this->load->view('template/dashboard_nav',$data);
		$this->load->view('template/dashboard_breadcrumb');
		$this->load->view('forum_threadlist',$categorydata);
		$this->load->view('template/dashboard_footer');
	}
}
?>