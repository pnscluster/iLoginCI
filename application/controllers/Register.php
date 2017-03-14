<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("Register_model");
	}
	
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function index()
	{
		$this->themeci->loadtheme('Register/RegisterForm');
		
	}
	
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function RegisterData()
	{
		
		$data['oauth_id'] 			=  null;
		$data['oauth_provider'] 	=  'iLogin';
		$data['first_name'] 		=  $this->input->post('FirstName');
		$data['last_name'] 			=  $this->input->post('LastName');
		$data['email'] 				=  $this->input->post('Email');
		$data['password'] 			=  md5($this->input->post('Password'));
		$data['birthday'] 			=  $this->input->post('Birthday');
		$data['gender'] 			=  $this->input->post('Gender');
		$data['picture'] 			=  null;
		$data['register_date'] 		=  date('Y-m-d H:i:s');
		
		$this->Register_model->register_data($data);
		
		return true;
	}
	
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function RegisterWithFacebook()
	{
	
		$data['oauth_id'] 			=  $this->input->post('oauth_id');
		$data['oauth_provider'] 	=  'Facebook';
		$data['first_name'] 		=  $this->input->post('first_name');
		$data['last_name'] 			=  $this->input->post('last_name');
		$data['email'] 				=  $this->input->post('email');
		$data['password'] 			=  NUll;
		$data['birthday'] 			=  $this->input->post('birthday');
		$data['gender'] 			=  $this->input->post('gender');
		$data['picture_url'] 		=  $this->input->post('picture_url');
		$data['register_date'] 		=  date('Y-m-d H:i:s');
	
		$this->Register_model->register_data($data);
	}
	
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	
}
