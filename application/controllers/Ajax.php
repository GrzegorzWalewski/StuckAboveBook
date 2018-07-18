<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends MY_Controller {
	public function __construct()
        {
                parent::__construct();
               	$this->load->helper('url');
				$this->load->helper('form');
				if($this->verify_min_level(1) )
					{
						$data["is_logged_in"]=TRUE;
					}
					else
					{
						$data["is_logged_in"]=FALSE;
						$data['username']=$this->auth_username;
						$data['user_id']=$this->auth_user_id;
					}
		       	$this->load->view('header');
        }
	public function loadCategories()
	{
		$data['q']=str_replace("_"," ",$this->uri->segment(3));
		$this->load->model("download_model");
		$data['categorylist']=$this->download_model->getCategory();
		$this->load->view('helpers/categoriesAJAX',$data);
	}
	public function loadBooks()
	{ 
		$data['categoryId']=$this->uri->segment(3);
		$data['q']=str_replace("_"," ",$this->uri->segment(4));
		$this->load->model("download_model");
		$data['bookslist']=$this->download_model->getBooksByCategoryId($data['categoryId']);
		$this->load->view('helpers/booksAJAX',$data);
	}
	public function rate()
	{
		$userid=$this->uri->segment(3);
		$id=$this->uri->segment(4);
		$rate=$this->uri->segment(5);
		$this->load->model('download_model');
		if(isset($this->auth_user_id)&&$userid==$this->auth_user_id)
		{
			$this->load->model('upload_model');
			$this->upload_model->rate($userid,$id,$rate);
		}
		echo $this->download_model->rate($id)->rate;

	}
}
