<?php
Class download_Model extends CI_Model
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
}