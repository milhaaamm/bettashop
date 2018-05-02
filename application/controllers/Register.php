<?php
defined('BASEPATH') OR exit('No direct script allowed');

class Register extends CI_Controller
{
	public function __contstruct()
	{
		parent::__contstruct();
	}

	public function index()
	{
		$this->load->view('reg_view');
	}

	public function user_register()
	{
		$this->load->model('User_Model');
		$datauser = array(
			'fullname' => $this->input->post('fullname'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'));
		$dataauth = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'level' => 1);
		$this->User_Model->user_registration($datauser,$dataauth);
		redirect(site_url('login'));
	}
}
?>