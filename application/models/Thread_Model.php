<?php
	class Thread_Model extends CI_Model
	{
		var $thtable = 'threaddata';
		var $cattable = 'categorydata';
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function get_list_by_id($id,$sort,$order)
		{
			$this->db->from($this->thtable);
			$this->db->where(array('category'=>$id));
			$this->db->order_by($sort,$order);
			$query = $this->db->get();
			return $query->result();
		}

		public function get_category_detail($id)
		{
			$query = $this->db->get_where($this->cattable,array('catid'=>$id));
			return $query->row();
		}

		public function get_my_thread($username)
		{
			$query = $this->db->get_where($this->thtable,array('author'=>$username));
			return $query->result();
		}

		public function get_thread_data($thid)
		{
			$query = $this->db->get_where($this->thtable,array('threadid'=>$thid));
			return $query->row();
		}

		public function get_category_name($id)
		{
			$query = $this->db->get_where($this->cattable,array('catid'=>$id));
			return $query->row()->catname;
		}
	}
?>