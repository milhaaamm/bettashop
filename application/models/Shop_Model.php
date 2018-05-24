<?php
	class Shop_Model extends CI_Model
	{
		var $itemtable = 'shopitemdata';
		var $catshoptable = 'shopcategory';
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function get_list_item($idcategory,$order=FALSE,$limit=FALSE)
		{
			$this->db->from($this->itemtable);
			$this->db->where('category',$idcategory);
			is_bool($order) ? null:$this->db->order_by($order[0],$order[1]);
			is_bool($limit) ? null:$this->db->limit($limit[1],$limit[0]);
			$query = $this->db->get();
			return $query->result();

		}

		public function get_category_detail($idcat)
		{
			$this->db->from($this->catshoptable);
			$this->db->where('id',$idcat);
			$query = $this->db->get();
			return $query->row();
		}
		public function get_all_category()
		{
			$this->db->from($this->catshoptable);
			$query = $this->db->get();
			return $query->result();
		}

		public function get_all_item()
		{
			$this->db->from($this->itemtable);
			$query = $this->db->get();
			return $query->result();
		}

		public function get_item_by_id($id)
		{
			$query = $this->db->get_where($this->itemtable,array('id'=>$id));
			return $query->row();
		}
	}
?>