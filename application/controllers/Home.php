<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
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
					$this->load->view('nav',$data);
        }
	public function index()
	{
		$this->load->view('contents');
		$this->load->view('footer');
	}
	public function categories()
	{
        if(!empty($this->uri->segment(3)))
        {
            $categoryId=$this->uri->segment(3);
            $this->load->model("download_Model");
            $data['books']=$this->download_Model->getBooksByCategoryId($categoryId);
            $this->load->view('books/contents',$data);
            $this->load->view('footer');
        }
		else
        {
        $this->load->model("download_Model");
		$data['categorylist']=$this->download_Model->getCategory();
		$this->load->view('categories/contents',$data);
		$this->load->view('footer');
            
            
        }
	}
	public function loadCategories()
	{
		$data['q']=$this->uri->segment(3);
		$this->load->model("download_Model");
		$data['categorylist']=$this->download_Model->getCategory();
		$this->load->view('helpers/categoriesAJAX',$data);
	}
	public function loadBooks()
	{ 
		$data['categoryId']=$this->uri->segment(3);
		$data['q']=$this->uri->segment(4);
		$this->load->model("download_Model");
		$data['bookslist']=$this->download_Model->getBooksByCategoryId($data['categoryId']);
		$this->load->view('helpers/booksAJAX',$data);
	}
	public function addBooks()
	{    
		echo "<h1>Pracujemy nad tym...</h1>";
		if(!empty($this->input->get('link')))
		{
			$data['q']=$this->input->get('link');
			$this->load->view('helpers/addBooks',$data);
		}
		if(!empty($this->input->post("str")))
        {
           $str = $this->input->post("str");
			$this->load->model('upload_Model');
			$this->upload_Model->uploadBookAndCategory($str);
		}
    }
	public function addProblem()
	{
		if(!null==$this->input->post('categoryId'))
		{
			$this->load->model('upload_Model');
			$this->upload_Model->uploadProblem($this->input->post('categoryId'),
				$this->input->post('bookId'),
				$this->input->post('fromPage'),
				$this->input->post('toPage'),
				$this->input->post('post'));
			$this->load->view('messages/added');

		}
		$this->load->view('problem/contents');
		$this->load->view('footer');
	}
	public function addBook()
	{
		if($this->uri->segment(3)=="added")
        {
            $this->load->view('messages/added');
        }
		$this->load->view('book/contents');
		$this->load->view('footer');
	}
}
