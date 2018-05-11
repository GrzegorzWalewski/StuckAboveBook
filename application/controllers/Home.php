<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
        {
                parent::__construct();
               	$this->load->helper('url');
        }
	public function index()
	{
		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('contents');
		$this->load->view('footer');
	}
	public function categories()
	{
		$this->load->model("download_Model");
		$data['categorylist']=$this->download_Model->getCategory();
		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('categories/contents',$data);
		$this->load->view('footer');
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
		if(!empty($this->uri->segment(3)))
		{
			echo "duad";
			$this->load->model('upload_Model');
			$this->upload_Model->uploadBookAndCategory($this->uri->segment(3),$this->uri->segment(4),$this->uri->segment(5),$this->uri->segment(6));
		}
	}
	public function addProblem()
	{
		$this->load->view('header');
		$this->load->view('nav');
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
		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('book/contents');
		$this->load->view('footer');
	}
}
