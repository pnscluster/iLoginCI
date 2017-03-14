<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model("Login_model");
	}

	public function index()
	{
		$this->themeci->loadtheme('Login/index');
	}
	
	public function check_login()
	{
		$data = $this->Login_model->check_login($this->input->post());
		
		return $data;
		
	}
	
	public function login()
	{
		$data = $this->check_login($this->input->post());
		
		return $data;
	}
	
	public function home()
	{
		$this->themeci->loadtheme('iTheme/Body');
	}

	
}
