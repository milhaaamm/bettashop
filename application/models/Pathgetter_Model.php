<?php
	class Pathgetter_Model extends CI_Model
	{
		var $pathtable = 'path';
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function get_path($object)
		{
			$query = $this->db->get_where($this->pathtable,array('object'=>$object));
			$row = $query->row();
			return $row->constpath;
		}

		public function get_extension($object)
		{
			$query = $this->db->get_where($this->pathtable,array('object'=>$object));
			$row = $query->row();
			return $row->ext;
		}
	}
?>