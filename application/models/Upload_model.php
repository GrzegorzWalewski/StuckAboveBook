<?php
Class Upload_model extends CI_Model
{
		function _construct(){
			parent::_construct;
			$this->load->database();
		}
		public function uploadProblem($categoryId,$bookId,$fromPage,$toPage,$post,$name)
		{
			$data=array(
				'categoryid'=> $categoryId,
				'problem' 	=> $post,
				'page_from' => $fromPage,
				'page_to' 	=> $toPage,
				'book_id' 	=> $bookId,
				'author_id' => $this->auth_user_id,
				'name'		=> $name);
			$this->db->insert('posts',$data);

		}
		public function uploadBookAndCategory($all)
		{
            $all=explode("/",$all);
            $title=$all[0];
            $author=$all[1];
            $pages=$all[2];
            $category=$all[3];
            //Check if there is category
			$this->db->where('name',$category);
			$r=$this->db->get('category')->result();
			$z="";
			foreach ($r as $a) {
				$z=$a->id;
			}
            //check if there is book
            $this->db->where('name',$title);
			$r=$this->db->get('books')->result();
            $g="";
            foreach ($r as $a) {
				$g=$a->id;
			}
            //if there isn't category
			if($z=="")
			{
				$this->db->set('name',$category);
				$this->db->insert('category');
				$categoryid=$this->db->insert_id();
			}
            //if there is category
			else
			{
				$categoryid=$z;
			}
            //IF there isn't book
            if($g=="")
			{
                $data = array('name' => $title,'author'=>$author,'pages'=>$pages,'category_id'=>$categoryid );
			     $this->db->insert('books',$data);
			}
		}
		public function rate($userid,$id,$rate)
		{
			$this->db->select('rate');
			$this->db->where('userid',$userid);
			$this->db->where('answerid',$id);
			$result=$this->db->get('rate')->row();
			if($rate=="up")
			{
				$rate="1";
			}
			else
			{
				$rate="-1";
			}
			if(null==$result)
			{	
				$this->db->set('userid',$userid);
				$this->db->set('answerid',$id);
				$this->db->set('rate',$rate);
				$this->db->insert('rate');

				$this->db->set('rate', 'rate + ' . (int) $rate, FALSE);
				$this->db->where('id',$id);
				$this->db->update('answers');
			}
			else
			{
				if($result->rate!=$rate)
				{
						$this->db->where('userid',$userid);
						$this->db->where('answerid',$id);
						$this->db->set('rate',$rate);
						$this->db->update('rate');
					if($rate==1)
					{
						$this->db->set('rate', 'rate + 2', FALSE);
						$this->db->where('id',$id);
						$this->db->update('answers');
					}
					else
					{
						$this->db->set('rate', 'rate - 2', FALSE);
						$this->db->where('id',$id);
						$this->db->update('answers');
					}
				}
			}
		}
}