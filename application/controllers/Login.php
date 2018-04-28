<?php
defined('BASEPATH') OR exit('No direct script allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('login_view');
	}

	public function auth_check()
	{
		$this->load->model('User_Model');
		$datalogin = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'));

		if($this->User_Model->check_login($datalogin))
		{
			$level = $this->User_Model->get_user_level($datalogin);
			$this->session->set_userdata('username',$username);
			$this->session->set_userdata('logged',1);
			$this->session->set_userdata('level',$level);
			redirect(site_url('dashboard'));
		}
		else
		{
			redirect(site_url('login'));
		}
	}
}
?>