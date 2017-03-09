<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facebook extends CI_Controller {
	
	//private $fb;
	public function __construct(){
		parent::__construct();
		//$this->load->library('FacebookSDK');
		//$this->fb = $this->Facebooksdk;
	}
	
	public function login()
	{
		//$data['url'] = $this->facebooksdk->getLoginUrl(base_url('Facebook/callback'));
		//$this->load->view('Login/index', $data);
		
		$this->themeci->loadtheme('Login/index');
		
	}
	
	public function callback()
	{
		$access_token 	= $this->facebooksdk->getAccessToken();
		$data['user']	= $this->facebooksdk->getUserData($access_token);
		
		$this->session->set_userdata('userid', $data['user']['id']);
		//echo $this->session->userdata('userid');
		
		$this->load->view('Login/user_profile', $data);

	}
	
	public function logout()
	{
		$userid 	= $this->session->userdata('userid');
		$next_url 	= $this->facebooksdk->getLoginUrl(base_url('Facebook/callback'));
		
		// getLogoutUrl($session, $next_url)
		$this->facebooksdk->getLogoutUrl($userid, $next_url);
		$this->session->unset_userdata('userid');
		
		redirect('Facebook/login');
	}
	
}
