<?php
Class upload_Model extends CI_Model
{
		function _construct(){
			parent::_construct;
			$this->load->database();
		}
		public function uploadProblem($categoryId,$bookId,$fromPage,$toPage,$post)
		{
			$data=array(
				'categoryid' => $categoryId,
				'problem' => $post,
				'page_from' => $fromPage,
				'page_to' => $toPage,
				'book_id' => $bookId);
			$this->db->insert('posts',$data);

		}
		public function uploadBookAndCategory($title,$author,$pages,$category)
		{
			$this->db->where('name',$category);
			$r=$this->db->get('category')->result();
			$z="";
			foreach ($r as $a) {
				$z=$a->id;
			}
			if($z=="")
			{
				$this->db->set('name',$category);
				$this->db->insert('category');
				$categoryid=$this->db->insert_id();
			}
			else
			{
				$categoryid=$z;
			}
			$data = array('name' => $title,'author'=>$author,'pages'=>$pages,'category_id'=>$categoryid );
			$this->db->insert('books',$data);

		}
}