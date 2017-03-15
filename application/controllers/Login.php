<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
		$this->load->model("Login_model");
	}

	public function index()
	{
		redirect('Login/application');
	}
	
	public function logout()
	{
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_name');
	
		redirect(site_url('Login/login'),"refresh");
	}
		
	public function login()
	{
		if($this->session->userdata('user_id')){
			redirect('Login',"refresh");
		}else{
			$this->themeci->loadtheme('Login/index');
		}
	}
	
	public function check_login()
	{
		$data_input = $this->input->post();
		$data['user_id'] = $this->Login_model->_check_login($data_input);
		
		echo json_encode($data);	// echo json_encode($data);
	}

	public function application()
	{
		//### Header ###//
		$data['user_id']	= $this->session->userdata('user_id');
		$data['username']  	= $this->session->userdata('user_name');
		$data['url'] 		= $this->facebooksdk->getLoginUrl(base_url('Facebook/callback'));
		
		$this->load->view('iTheme/Header', $data);
		
		//### Body ###//
		$this->load->view('iTheme/Body', $data);
		
		//### Footer ###//
		$this->load->view('iTheme/Footer');
		
	}
	
	public function home()
	{
		$this->themeci->loadtheme('iTheme/Body');
	}
	
}
