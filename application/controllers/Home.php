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
            $this->load->model("download_model");
            $data['books']=$this->download_model->getBooksByCategoryId($categoryId);
            $this->load->view('books/contents',$data);
            $this->load->view('footer');
        }
		else
        {
        $this->load->model("download_model");
		$data['categorylist']=$this->download_model->getCategory();
		$this->load->view('categories/contents',$data);
		$this->load->view('footer');
            
            
        }
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
			var_dump($str);
			$this->load->model('upload_model');
			$this->upload_model->uploadBookAndCategory($str);
			redirect("/home/addbook/added");
		}
    }
	public function addProblem()
	{
		if(!null==$this->input->post('categoryId'))
		{
			$this->load->model('upload_model');
			$this->upload_model->uploadProblem($this->input->post('categoryId'),
				$this->input->post('bookId'),
				$this->input->post('fromPage'),
				$this->input->post('toPage'),
				$this->input->post('post'),
				$this->input->post('name')
				);
			$this->load->view('messages/added');

		}
		$this->load->view('addProblem/contents');
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
	public function search()
	{
		$this->load->view('search/content');
		if(!null==$this->input->post('categoryId'))
		{

			$this->load->model('download_model');
			$data['problems'] = $this->download_model->searchProblem($this->input->post('categoryId'),
			$this->input->post('bookId'),
			$this->input->post('fromPage'),
			$this->input->post('toPage'))->result();

			$this->load->view('search/result',$data);

		}
		$this->load->view('footer');
	}
	public function problem()
	{
		$id=$this->uri->segment(3);
		if(!null==$this->input->post('answer'))
		{
			$this->load->model('upload_model');
			$this->upload_model->addAnswer($id,$this->input->post('answer'));
		}
		$this->load->model('download_model');
		$data['problem']=$this->download_model->problemById($id)->result()[0];
		$data['answers']=$this->download_model->problemAnswers($id)->result();
		$this->load->view('problem/content',$data);
	}
}
