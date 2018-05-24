<?php
defined('BASEPATH') OR exit('No direct script allowed');

class Dashboard extends CI_Controller
{

	var $sessionuser = '';
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');

		if($this->session->userdata('logged'))
		{
			$this->sessionuser = $this->session->userdata('username');
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

	public function redirect()
	{
		$this->load->helper('url');
		$lastsegment = $this->uri->segment(2);
		redirect(site_url('Dashboard/'.$lastsegment));
	}
//========================================================================================================================//
//Fungsi Berhubungan Dengan Home==========================================================================================//
//========================================================================================================================//
	public function home()
	{
		$data['activetab'] = 'home';
		$this->load->view('template/dashboard_header');
		$this->load->view('template/dashboard_nav',$data);
		$this->load->view('template/dashboard_breadcrumb');
		$this->load->view('dashboard_home');
		$this->load->view('template/dashboard_footer');
	}

//========================================================================================================================//
//Fungsi Berhubungan Dengan Shop==========================================================================================//
//========================================================================================================================//
	public function shop()
	{
		$data['activetab'] = 'listitem';
		$this->load->model('Shop_Model');
		$data['allcat'] = $this->Shop_Model->get_all_category();
		foreach($data['allcat'] as $row => $column):
			$data2['catname'][$column->id] = $column->nama;
			$data2['alldata'][$column->id] = $this->Shop_Model->get_list_item($column->id,array('id','DESC'),array(0,4));
			
		endforeach;
		$this->load->view('template/dashboard_header');
		$this->load->view('template/dashboard_nav',$data);
		$this->load->view('template/dashboard_breadcrumb');
		$this->load->view('dashboard_shop',$data2);
		$this->load->view('template/dashboard_footer');

	}

	public function shopitem($iditem)
	{
		$current['activetab'] = 'listitem';
		$this->load->view('template/dashboard_header');
		$this->load->view('template/dashboard_nav',$current);
		$this->load->view('template/dashboard_breadcrumb');
		$this->load->model('Shop_Model');
		$data['item'] = $this->Shop_Model->get_item_by_id($iditem);
		$this->load->view('template/itemshop_space',$data);
		$this->load->view('template/dashboard_footer');
	}

	public function shopcategory($idcategory)
	{
		$current['activetab'] = 'listitem';
		$this->load->view('template/dashboard_header');
		$this->load->view('template/dashboard_nav',$current);
		$this->load->view('template/dashboard_breadcrumb');
		$this->load->model('Shop_Model');
		$data['catdetail'] = $this->Shop_Model->get_category_detail($idcategory);
		$data['item'] = $this->Shop_Model->get_list_item($idcategory,array('id','DESC'),array(0,12));
		$this->load->view('shop_category',$data);
		$this->load->view('template/dashboard_footer');
	}

	public function cart()
	{
		$current['activetab'] = 'cart';
		$this->load->view('template/dashboard_header');
		$this->load->view('template/dashboard_nav',$current);
		$this->load->view('template/dashboard_breadcrumb');
		$this->load->view('shop_cart');
		$this->load->view('template/dashboard_footer');

	}

	public function transaction($idcart=null,$iditem=null)
	{
		$current['activetab'] = 'shop';
		$this->load->view('template/dashboard_header');
		$this->load->view('template/dashboard_nav',$current);
		$this->load->view('template/dashboard_breadcrumb');
		$this->load->view('shop_transaction');
		$this->load->view('template/dashboard_footer');

	}

//========================================================================================================================//
//Fungsi Berhubungan Dengan User==========================================================================================//
//========================================================================================================================//
	public function profile($user=null)
	{
		$this->load->model('User_Model');
		$this->load->model('Pathgetter_Model');
		$current['activetab'] = 'profile';
		$this->load->view('template/dashboard_header');
		$this->load->view('template/dashboard_nav',$current);
		$this->load->view('template/dashboard_breadcrumb');
		if(is_null($user)):
			$user = $this->sessionuser;
		else:
			$user = $user;
		endif;
		$data = $this->User_Model->get_profile_data($user);
		if($data == null):
			$this->load->view('errorviews/errors_usernotfound');
		else:
			if($user == $this->sessionuser):
				$data->imgpath = base_url().$this->Pathgetter_Model->get_path('userprofile').$user.'.jpg';
				$this->load->view('dashboard_mybio',$data);
			else:
				$data->imgpath = base_url().$this->Pathgetter_Model->get_path('userprofile').$user.'.jpg';
				$this->load->view('dashboard_biouser',$data);

			endif;
		endif;
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

	public function privatemsg()
	{
		$data['activetab'] = 'privatemsg';
		$this->load->view('template/dashboard_header');
		$this->load->view('template/dashboard_nav',$data);
		$this->load->view('template/dashboard_breadcrumb');
		$this->load->view('dashboard_privatemsg');
		$this->load->view('template/dashboard_footer');

	}

//========================================================================================================================//
//Fungsi Berhubungan Dengan Members==========================================================================================//
//========================================================================================================================//
	public function members()
	{
		$data['activetab'] = 'members';
		$this->load->model('User_Model');
		$this->load->view('template/dashboard_header');
		$this->load->view('template/dashboard_nav',$data);
		$this->load->view('template/dashboard_breadcrumb');
		$members['mostmsg'] = $this->User_Model->get_allmember('totalmsg','DESC');
		$members['mostlikes'] = $this->User_Model->get_allmember('totallikes','DESC');
		$members['staff'] = $this->User_Model->get_allstaff();
		$this->load->view('dashboard_members',$members);
		$this->load->view('template/dashboard_footer');

	}

//========================================================================================================================//
//Fungsi Berhubungan Dengan Thread==========================================================================================//
//========================================================================================================================//

	public function threads()
	{
		$this->load->model('Thread_Model');
		$mythreaddata['mythread'] = $this->Thread_Model->get_my_thread($this->session->userdata('username'));
		$data['activetab'] = 'threads';
		$this->load->view('template/dashboard_header');
		$this->load->view('template/dashboard_nav',$data);
		$this->load->view('template/dashboard_breadcrumb');
		$mythreaddata['mythread'] = $this->Thread_Model->get_my_thread($this->session->userdata('username'));
		if($mythreaddata['mythread'] != null):
			$this->load->view('template/threads_mythread',$mythreaddata);
		else:
			$this->load->view('errorviews/errors_mythreadnotfound');
		endif;
		$this->load->view('dashboard_threads');
		$this->load->view('template/dashboard_footer');

	}


	public function threads_listbyidcat($idcategory,$sorttype='datecreated',$order='desc')
	{
		$this->load->model('Thread_Model');
		$this->load->model('User_Model');
		$this->load->model('Pathgetter_Model');
		$this->load->view('template/dashboard_header');
		$data['activetab'] = 'threads';
		$this->load->view('template/dashboard_nav',$data);
		$this->load->view('template/dashboard_breadcrumb');
		$mythreaddata['mythread'] = $this->Thread_Model->get_my_thread($this->session->userdata('username'));
		if($mythreaddata['mythread'] != null):
			$this->load->view('template/threads_mythread',$mythreaddata);
		else:
			$this->load->view('errorviews/errors_mythreadnotfound');
		endif;
		$categorydata['threadrecords'] = $this->Thread_Model->get_list_by_id($idcategory,$sorttype,$order);
		if($categorydata['threadrecords'] == null):
			$this->load->view('errorviews/errors_categorythreadnotfound');
		else:
			foreach ($categorydata['threadrecords'] as $thread => $value):
				$categorydata['imgpath'][$value->author] = base_url().$this->Pathgetter_Model->get_path('userprofile').$value->author.'.jpg';
				$categorydata['authordata'][$value->author] = $this->User_Model->get_profile_data($value->author);
			endforeach;
			$categorydata['catinfo'] = $this->Thread_Model->get_category_detail($idcategory);	
			$this->load->view('thread_listbycat',$categorydata);
		endif;
		$this->load->view('template/dashboard_footer');

	}

	public function threads_openthread($idthread,$page='1')
	{
		$this->load->model('Pathgetter_Model');
		$this->load->model('User_Model');
		$this->load->model('Thread_Model');
		$this->load->model('Message_Model');
		$data['activetab'] = 'threads';
		$this->load->view('template/dashboard_header');
		$this->load->view('template/dashboard_nav',$data);
		$this->load->view('template/dashboard_breadcrumb');
		$threaddata['data'] = $this->Thread_Model->get_thread_data($idthread);
		if($threaddata['data'] != null):
			$threaddata['catname'] = $this->Thread_Model->get_category_name($threaddata['data']->category);
			$threaddata['page'] = $page;
			$threaddata['msg'] = $this->Message_Model->get_page_messages($idthread,$page);
			$threaddata['msgpath'] = $this->Message_Model->get_msg_path($threaddata['msg']);
			$threaddata['imgmsgpath'] = $this->User_Model->get_userimgpath_byresult($threaddata['msg']);
			$this->load->view('template/thread_space',$threaddata);
		else:
			$this->load->view('errorviews/errors_threadnotfound');
		endif;
		$this->load->view('template/dashboard_footer');

	}

	public function thread()
	{
		redirect(site_url('Dashboard/threads'));
	}

	public function createthread()
	{
		$data['activetab'] = 'threads';
		$this->load->view('template/dashboard_header');
		$this->load->view('template/dashboard_nav',$data);
		$this->load->view('template/dashboard_breadcrumb');
		$this->load->view('thread_create');
		$this->load->view('template/dashboard_footer');
	}

//========================================================================================================================//

}
?>