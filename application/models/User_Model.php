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
	}
?>