<?php
Class Download_model extends CI_Model
{
		function _construct(){
			parent::_construct;
			$this->load->database();
		}
		public function getCategory()
		{
			$r=$this->db->get('category');
			return $r->result();
		}
		public function getBooksByCategoryId($categoryId)
		{
			$this->db->where('category_id',$categoryId);
			$r=$this->db->get('books');
			return $r->result();
		}
}