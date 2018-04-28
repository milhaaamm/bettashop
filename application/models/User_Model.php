<?php
	class User_Model extends CI_Model
	{
		var $table = 'userauth';
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
/*
		public function get_user_data($username)
		{
			$query = $this->db->get_where($this->table,array('username'=>$username));
			$row = $query->row();
			return $row;
		}
*/
		public function check_login($data)
		{
			$query = $this->db->get_where($this->table,$data);
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
			$query = $this->db->get_where($this->table,$data);
			$row = $query->row();
			return $row->level;
		}
	}
?>