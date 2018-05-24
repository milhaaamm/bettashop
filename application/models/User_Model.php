<?php
	class User_Model extends CI_Model
	{
		var $authtable = 'userauth';
		var $profiletable = 'userprofile';
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function get_profile_data($username)
		{
			$query = $this->db->get_where($this->profiletable,array('username'=>$username));
			$row = $query->row();
			return $row;
		}

		public function check_login($data)
		{
			$query = $this->db->get_where($this->authtable,$data);
			if($query->num_rows()>= 1)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function get_user_level($data)
		{
			$query = $this->db->get_where($this->authtable,$data);
			$row = $query->row();
			return $row->level;
		}

		public function user_registration($datauser,$dataauth)
		{
			$this->db->insert($this->authtable,$dataauth);
			$this->db->insert($this->profiletable,$datauser);
			return true;
		}

		public function get_userimgpath_byresult($resultpage)
		{
			$img_path = [];
			foreach ($resultpage as $eachrow => $eachmsg):
				$img_path[$eachmsg->id] = base_url().'assets/user/imgprofile/'.$eachmsg->msgauthor.'.jpg';
			endforeach;
			return $img_path;
		}

		public function get_allmember($sort=null,$order=null)
		{
			$this->db->from($this->profiletable);
			if($sort != null):
				$this->db->order_by($sort,$order);
			else:

			endif;
			$query = $this->db->get();
			return $query->result();
		}

		public function get_allstaff()
		{
			$this->db->from($this->authtable);
			$this->db->where('level !=',1);
			$query = $this->db->get();
			return $query->result();
		}
	}
?>