<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends MY_Controller {
	public function __construct()
        {
                parent::__construct();
               	$this->load->helper('url');
				$this->load->helper('form');
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
	public function ajaxSearch()
	{
		
	}
}
