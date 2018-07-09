<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
	public function __construct()
        {
                parent::__construct();
               	$this->load->helper('url');
				$this->load->helper('form');
		       	$this->load->view('header');
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
		       	$this->load->view('nav',$data);

        }
	public function yourProblems()
	{
		$id=$this->auth_user_id;
		$this->load->model('download_model');
		$data['problems']=$this->download_model->problemsByUser($id)->result();
		$this->load->view('user/problems',$data);
		$this->load->view('footer');
	}
}
