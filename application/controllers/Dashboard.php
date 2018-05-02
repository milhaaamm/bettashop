<?php
defined('BASEPATH') OR exit('No direct script allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');

		if($this->session->userdata('logged'))
		{

		}
		else
		{
			redirect(site_url('login'));
		}
	}

	public function index()
	{
		redirect(site_url('Dashboard/home'));
	}

	public function home()
	{
		$data['activetab'] = 'home';
		$this->load->view('template/dashboard_header');
		$this->load->view('template/dashboard_nav',$data);
		$this->load->view('template/dashboard_breadcrumb');
		$this->load->view('dashboard_home');
		$this->load->view('template/dashboard_footer');
	}

	public function threads()
	{
		$this->load->model('Thread_Model');
		$mythreaddata['mythread'] = $this->Thread_Model->get_my_thread($this->session->userdata('username'));
		$data['activetab'] = 'threads';
		$this->load->view('template/dashboard_header');
		$this->load->view('template/dashboard_nav',$data);
		$this->load->view('template/dashboard_breadcrumb');
		$this->load->view('template/threads_mythread',$mythreaddata);
		$this->load->view('dashboard_threads');
		$this->load->view('template/dashboard_footer');

	}

	public function shop()
	{
		$data['activetab'] = 'shop';
		$this->load->view('template/dashboard_header');
		$this->load->view('template/dashboard_nav',$data);
		$this->load->view('template/dashboard_breadcrumb');
		$this->load->view('dashboard_shop');
		$this->load->view('template/dashboard_footer');

	}

	public function bio()
	{
		$this->load->model('User_Model');
		$this->load->model('Pathgetter_Model');
		$data = $this->User_Model->get_profile_data($this->session->userdata('username'));
		$data->imgpath = base_url().$this->Pathgetter_Model->get_path('userprofile').$this->session->userdata('username').'.jpg';
		$current['activetab'] = 'bio';
		$this->load->view('template/dashboard_header');
		$this->load->view('template/dashboard_nav',$current);
		$this->load->view('template/dashboard_breadcrumb');
		$this->load->view('dashboard_bio',$data);
		$this->load->view('template/dashboard_footer');
	}

	public function notif()
	{
		$data['activetab'] = 'notif';
		$this->load->view('template/dashboard_header');
		$this->load->view('template/dashboard_nav',$data);
		$this->load->view('template/dashboard_breadcrumb');
		$this->load->view('dashboard_notif');
		$this->load->view('template/dashboard_footer');
	}

	public function threads_listbyidcat($idcategory,$sorttype='datecreated',$order='desc')
	{
		$this->load->model('Thread_Model');
		$this->load->model('User_Model');
		$this->load->model('Pathgetter_Model');
		$mythreaddata['mythread'] = $this->Thread_Model->get_my_thread($this->session->userdata('username'));
		$categorydata['threadrecords'] = $this->Thread_Model->get_list_by_id($idcategory,$sorttype,$order);
		foreach ($categorydata['threadrecords'] as $thread => $value):
			$categorydata['imgpath'][$value->author] = base_url().$this->Pathgetter_Model->get_path('userprofile').$value->author.'.jpg';
			$categorydata['authordata'][$value->author] = $this->User_Model->get_profile_data($value->author);
		endforeach;
		$categorydata['catinfo'] = $this->Thread_Model->get_category_detail($idcategory);
		$data['activetab'] = 'threads';
		$this->load->view('template/dashboard_header');
		$this->load->view('template/dashboard_nav',$data);
		$this->load->view('template/dashboard_breadcrumb');
		$this->load->view('template/threads_mythread',$mythreaddata);
		$this->load->view('thread_listbycat',$categorydata);
		$this->load->view('template/dashboard_footer');

	}

	public function threads_openthread($idthread)
	{
		$this->load->model('Pathgetter_Model');
		$this->load->model('User_Model');
		$this->load->model('Thread_Model');
		$data['activetab'] = 'threads';
		$threaddata['data'] = $this->Thread_Model->get_thread_data($idthread);
		$threaddata['path']	= base_url().$this->Pathgetter_Model->get_path('threadfolder').$idthread.'/';
		$this->load->view('template/dashboard_header');
		$this->load->view('template/dashboard_nav',$data);
		$this->load->view('template/dashboard_breadcrumb');
		$this->load->view('thread_space',$threaddata);
		$this->load->view('template/dashboard_footer');

	}
}
?>