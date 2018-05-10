<?php
	class Message_Model extends CI_Model
	{
		var $msgtable = 'messagesdata';
		
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function get_page_messages($threadid,$page=1)
		{
			$this->db->from($this->msgtable);
			$this->db->where(array('thread'=>$threadid));
			$this->db->order_by('dateposted');
			$this->db->limit($page*20,($page*20)-20);
			$query = $this->db->get();
			return $query->result();
		}

		public function get_msg_path($resultpage)
		{
			$msg_path = [];
			foreach ($resultpage as $eachrow => $eachmsg):
				$msg_path[$eachmsg->id] = base_url().'assets/thread/'.$eachmsg->thread.'/msg/'.$eachmsg->id.'.txt';
			endforeach;
			return $msg_path;
		}
	}
?>