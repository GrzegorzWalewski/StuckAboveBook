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
		public function searchProblem($categoryId,$bookId,$fromPage,$toPage)
		{
			$this->db->where('categoryid',$categoryId);
			$this->db->where('book_id',$bookId);
			$this->db->where('page_from <=',$fromPage);
			$this->db->where('page_to >=',$toPage);
			$this->db->select('problem');
			$r=$this->db->get('posts');
			return $r;
		}
}