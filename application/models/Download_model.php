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
		public function problemById($id)
		{
			$this->db->select('*');
			$this->db->where('posts.id',$id);
			$this->db->from('posts');
			$this->db->join('users','users.user_id = posts.author_id');
			return $this->db->get();
		}
		public function problemAnswers($id)
		{
			$this->db->where('post_id',$id);
			$this->db->from('answers');
			$this->db->join('users','users.user_id = answers.author_id');
			return $this->db->get();
		}
}